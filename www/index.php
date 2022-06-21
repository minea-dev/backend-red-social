<?php
require_once('logica/conexion.php');
session_start();

$paginaActual = isset($_REQUEST['pagina']) ? intval($_REQUEST['pagina']) : 1;
$esPrimera = $paginaActual === 1;
$numeroResultados = 2;

if (isset($_SESSION['usuario'])) {
    // Funciones
    $tokenEsValido = $miPDO->prepare('SELECT COUNT(*) AS es_valido FROM sesiones  WHERE token_sesion = :token_sesion AND estado = 1');

    $tokenEsValido->execute([
        'token_sesion' => $_SESSION['usuario'],
    ]);

    $resultado = $tokenEsValido->fetch();

    if (!$resultado['es_valido']) {
        session_destroy();
        header('Location: http://localhost/login.php');
        die();
    }

    // Obtener publicaciones
    $consultaPost = $miPDO->prepare('SELECT publicaciones.titulo, publicaciones.contenido, usuarios.email, (SELECT COUNT(*) FROM publicaciones WHERE publicaciones.estado = 1) AS cantidad FROM publicaciones INNER JOIN usuarios ON usuarios.id = publicaciones.id_usuario WHERE publicaciones.estado = 1 order by publicaciones.fecha DESC LIMIT :empezar_en, :limite;');

    $consultaPost->execute([
        'empezar_en' => ($paginaActual - 1) * $numeroResultados,
        'limite' => $numeroResultados
    ]);

    $publicaciones = $consultaPost->fetchAll();

    $esUltima = intval(ceil($publicaciones[0]['cantidad'] / $numeroResultados)) === intval($paginaActual);
} else {
    header('Location: http://localhost/login.php');
    die();
}
?>
<?php require_once('componentes/header.php');?>
    <main>
        <section>
            <?php foreach ($publicaciones as $posicion => $fila):?>
                <?php require('componentes/post.php');?>
            <?php endforeach;?>
        </section>
    </main>
<?php require_once('componentes/paginador.php');?>
<?php require_once('componentes/footer.php');?>
