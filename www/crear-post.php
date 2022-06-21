<?php
// Importaciones
require_once("logica/conexion.php");
require_once("logica/validadores.php");
session_start();

// Variables
$titulo = isset($_REQUEST['titulo']) ? $_REQUEST['titulo'] : '';
$contenido = isset($_REQUEST['contenido']) ? $_REQUEST['contenido'] : '';
$errores = [];

// Funciones
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (validar_requerido($titulo)) {
        $errores[] = 'Debes escribir un título';
    }
    if (validar_requerido($contenido)) {
        $errores[] = 'Debes escribir un contenido';
    }

    if (count($errores) === 0) {
        $miInsert = $miPDO->prepare('INSERT INTO publicaciones (titulo, contenido, id_usuario) VALUES (:titulo, :contenido, :id_usuario)');
        $miInsert->execute([
                'titulo' => $titulo,
                'contenido' => $contenido,
                'id_usuario' => $_SESSION['id_usuario']
        ]);

        header('location: index.php?creado=1');
    }
}

require_once('componentes/header.php');
;?>
<main>
    <h1>Nueva publicación</h1>
    <?php require_once('componentes/listar-errores.php');?>
    <form method="post" action="crear-post.php">
        <div>
            <label>
                Titulo
                <input type="text" name="titulo" value="<?= $titulo;?>">
            </label>
        </div>
        <div>
            <label>
                Contenido
                <input type="text" name="contenido" <?= $contenido;?>>
            </label>
        </div>
        <input type="submit" value="Publicar">
    </form>
</main>
<?php require_once('componentes/footer.php');?>
