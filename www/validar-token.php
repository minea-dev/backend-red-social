<?php
require_once('componentes/header.php');

// Imports
require_once('logica/conexion.php');

// Variables
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : '';
$token = isset($_REQUEST['token']) ? $_REQUEST['token'] : '';

// Comprueba si hay un usuario que el correo y el token
// Prepara INSERT
$miConsulta = $miPDO->prepare('SELECT COUNT(*) as cantidad FROM usuarios WHERE email = :email AND token = :token');
// Ejecuta el nuevo registro en la base de datos
$miConsulta->execute([
    'email' => $email,
    'token' => $token
]);

$resultado = $miConsulta->fetch();

if ((int) $resultado["cantidad"] > 0) {
    // Si existe, actualizamos email_validado a true. Informamos del exito.
    echo '<h1>Cuenta validada</h1>';
    $miUpdate = $miPDO->prepare('UPDATE usuarios SET email_validado = TRUE WHERE email = :email AND token = :token');
    $miUpdate->execute([
        'email' => $email,
        'token' => $token
    ]);
} else {
    // No existe, informamos.
    echo '<h1>Ups! Ha ocurrido un problema</h1>';
}

require_once('componentes/footer.php');
?>