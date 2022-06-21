<?php
// Variables
$alertaTitulo = '';
$alertaMensaje = '';
$verAlerta = false;

if(isset($_REQUEST['creado'])) {
    $alertaTitulo = 'Nuevo post';
    $alertaMensaje = 'Acabas de publicar un nuevo post';
    $verAlerta = true;
}

if(isset($_REQUEST['cerrar-sesion'])) {
    $alertaTitulo = 'Sesion cerrada';
    $alertaMensaje = 'Has salido';
    $verAlerta = true;
}

?>

<?php if ($verAlerta): ?>
<section>
    <h1><?= $alertaTitulo ?></h1>
    <p><?= $alertaMensaje ?></p>
</section>
<?php endif; ?>