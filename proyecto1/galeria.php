<?php
    $title = "Galería";
    require_once "./utils/utils.php";
    require_once "./utils/Forms/TextareaElement.php";
    require_once "./utils/Forms/ButtonElement.php";
    require_once "./utils/Forms/FileElement.php";
    require_once "./utils/Forms/FormElement.php";
    require_once "./utils/Forms/custom/MyFormGroup.php";
    require_once "./utils/Forms/custom/MyFormControl.php";
    require_once "./utils/Validator/NotEmptyValidator.php";
    require_once "./utils/Validator/MimetypeValidator.php";
    require_once "./utils/Validator/MaxSizeValidator.php";    
    require_once "./exceptions/FileException.php";
    require_once "./utils/SimpleImage.php";
    require_once "./entity/ImagenGaleria.php";
    require_once "./database/QueryBuilder.php";
    require_once "./database/Connection.php";
    require_once "./core/App.php";
    require_once "./repository/ImagenGaleriaRepository.php";
    require_once "./repository/CategoriaRepository.php";
    require_once "./utils/Forms/SelectElement.php";
    require_once "./utils/Forms/OptionElement.php";


    $info = $urlImagen = "";

    $description = new TextareaElement();
    $description
     ->setName('descripcion')
     ->setId('descripcion')
     ->setValidator(new NotEmptyValidator('La descripción es obligatoria', true));
    $descriptionWrapper = new MyFormControl($description, 'Descripción', 'col-xs-12');

    $fv = new MimetypeValidator(['image/jpeg', 'image/jpg', 'image/png'], 'Formato no soportado', true);
    
    $fv->setNextValidator(new MaxSizeValidator(2 * 1024 * 1024, 'El archivo no debe exceder 2M', true));
    $file = new FileElement();
    $file
      ->setName('imagen')
      ->setId('imagen')
      ->setValidator($fv);

    $labelFile = new LabelElement('Imagen', $file);

    $b = new ButtonElement('Send');
    $b->setCssClass('pull-right btn btn-lg sr-button');

    $form = new FormElement('', 'multipart/form-data');

    $config = require_once 'app/config.php'; 
    App::bind('config', $config);
    App::bind('connection', Connection::make($config['database']));

  $repositorio = new ImagenGaleriaRepository();

  $repositorioCategoria = new CategoriaRepository();

  $categoriasEl = new SelectElement(false);

  $categoriasEl
    ->setName('categoria');
    $categorias = $repositorioCategoria->findAll();
    foreach ($categorias as $categoria){
      $option = new OptionElement($categoriasEl, $categoria->getNombre());
      $option->setDefaultValue($categoria->getId());
      $categoriasEl->appendChild($option);
    }

    $categoriaWrapper = new MyFormControl($categoriasEl, 'Categoria', 'col-xs-12');

    $form
    ->setCssClass('form-horizontal')
    ->appendChild($labelFile)
    ->appendChild($file)
    ->appendChild($descriptionWrapper)
    ->appendChild($categoriaWrapper)
    ->appendChild($b);

    if ("POST" === $_SERVER["REQUEST_METHOD"]) {
        $form->validate();
        if (!$form->hasError()) {
          try {
            $file->saveUploadedFile(ImagenGaleria::RUTA_IMAGENES_GALLERY);  
              // Create a new SimpleImage object
              $simpleImage = new \claviska\SimpleImage();
              $simpleImage
              ->fromFile(ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName())  
              ->resize(975, 525)
              ->toFile(ImagenGaleria::RUTA_IMAGENES_PORTFOLIO . $file->getFileName())
              ->resize(650, 350)
              ->toFile(ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName()); 
              $info = 'Imagen enviada correctamente'; 
              $urlImagen = ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName();
              $connection = Connection::make();
              $sql = "INSERT INTO imagenes (nombre,descripcion) VALUES ('" . $file->getFileName() . "', '" . $description->getValue() . "')";
              $pdoStatement = $connection->prepare($sql);
              $parameters = [':nombre' => $file->getFileName(),
                ':descripcion' => $description->getValue()];
                
                $imagenGaleria = new ImagenGaleria($file->getFileName(), $description->getValue());
                $repositorio->save($imagenGaleria);
                $queryBuilder->save($imagenGaleria);
                $info = 'Imagen enviada correctamente';
                $urlImagen = ImagenGaleria::RUTA_IMAGENES_GALLERY . $file->getFileName();
                $form->reset();
              
            
          }catch(Exception $err) {
              $form->addError($err->getMessage());
              $imagenErr = true;
          }
          
        }  
    }

      try{
          $imagenes = $repositorio->findAll();
      }catch(QueryException $qe){
          $imagenes = [];
  }
include("./views/galeria.view.php");