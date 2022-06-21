<?php
// Varialbes
$hostDB = getenv('MARIADB_HOST');
$nombreDB = getenv('MARIADB_DATABASE');
$usuarioDB = getenv('MARIADB_USER');
$contrasenyaDB = getenv('MARIADB_PASSWORD');
// Url actual
$url = $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"];
$uri = $_SERVER["REQUEST_URI"];

// Conexión
$hostPDO = "mysql:host=$hostDB;dbname=$nombreDB";
$miPDO = new PDO($hostPDO, $usuarioDB, $contrasenyaDB);
// Arreglamos el fallo de los numeros
$miPDO->setAttribute( PDO::ATTR_EMULATE_PREPARES, FALSE);