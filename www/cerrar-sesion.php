<?php
// Importaciones
require_once("logica/conexion.php");
session_start();

if (isset($_SESSION['usuario'])) {
    // Desactivar token del usuario en la base de datos
    $miUpdate = $miPDO->prepare('UPDATE sesiones SET estado = 0 WHERE token_sesion = :tokenSesion;');
    $miUpdate->execute([
        'tokenSesion' => $_SESSION['usuario']
    ]);

    // Destruir las sesiones del usuario
    session_destroy();

    // Redireccionar a login
    header('location: login.php?cerrar-sesion=1');
    die();
}

// En el caso que un usuario sin login
header('location: index.php');
die();
