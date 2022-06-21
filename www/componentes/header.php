<?php
require_once 'vendor/autoload.php';
;?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <link href="css/mobile.css" rel="stylesheet" media="all and (max-width: 600px)">
    <link href="css/desktop.css" rel="stylesheet" media="all and (min-width: 600px)">
    <title>La red social</title>
</head>
<body>
    <!-- Flash messages -->
    <?php require_once "alerta.php" ?>
    <!-- End Flash messages -->
    <header>
        <h1>La red social</h1>
        <nav>
            <ul>
                <?php if (isset($_SESSION["id_usuario"])): ?>
                    <li>
                        <a href="crear-post.php">Crear post</a>
                    </li>
                    <li>
                        <a href="cerrar-sesion.php">Salir</a>
                    </li>
                <?php else: ?>
                    <li>
                        <a href="registro.php">Registro</a>
                    </li>
                    <li>
                        <a href="login.php">Iniciar sesión</a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
