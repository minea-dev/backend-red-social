<?php if(!$esPrimera):?>
    <div>
        <a href="index.php?pagina=<?= $paginaActual - 1;?>">Retroceder</a>
    </div>
<?php endif;?>
<?php if(!$esUltima):?>
    <div>
        <a href="index.php?pagina=<?= $paginaActual + 1;?>">Avanzar</a>
    </div>
<?php endif;?>