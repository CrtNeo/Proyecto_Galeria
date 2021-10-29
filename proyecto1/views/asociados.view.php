<?php

include __DIR__ . "/partials/inicio-doc.part.php";
include __DIR__ . "/partials/nav.part.php";

?>
<div id="galeria">
    <div class="container">
        <div class ="col-cs-12 col-sm-8 col-sm-push-2">
            <h1>Asociados</h1>
            <hr>
            <?php 
                include __DIR__ . "/partials/show-messages.part.php";
            ?>
                <?php if("POST" === $_SERVER["REQUEST_METHOD"]&&(empty($errores))) : ?>
                    <a href='<?=$urlImagen?>' target='_blank'>Ver Imagen</a>
                <?php endif?>
                <form class="form-horizontal" action="/asociados.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            <div class="col-xs-12">
                <label for="imagen" class="label-control">Insertar Logo</label>
                <input class="form-control-file" type="file" name="imagen">
            </div>
            </div>
            <div class="form-group">
            <div class="col-xs-12">
                <label for="description" class="label-control">Nombre</label>
                <textarea class="form-control" type="text" name="nombre" id="nombre"><?= $nombre;?></textarea>
            </div>   
            </div>
            <div class="form-group">
            <div class="col-xs-12">
                <label for="description" class="label-control">Descripcion</label>
                <textarea class="form-control" type="text" name="description" id="description"><?= $descripcion;?></textarea>
                <button class="pull-right btn btn-lg sr-button">ENVIAR</button>
                </div>
            </div>   
            </form>
        </div>
    </div>
</div>
</div>
<?php

include __DIR__ . "/partials/fin-doc.part.php";

?> 
  