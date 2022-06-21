<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once('vendor/autoload.php');

// Importaciones
require_once('logica/conexion.php');
require_once('logica/validadores.php');

// Variables
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;
$passwordRepeat = isset($_REQUEST['password-repeat']) ? $_REQUEST['password-repeat'] : null;
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && $email !== null && $password !== null && $passwordRepeat !== null) {

    if (validar_requerido($email)) {
        $errores[] = 'Es necesario el email';
    }
    if (validar_email($email)) {
        $errores[] = 'Tienes que introducir un email válido';
    }
    if (validar_requerido($password)) {
        $errores[] = 'Es necesaria la contraseña';
    }
    if (validar_requerido($passwordRepeat)) {
        $errores[] = 'Es necesario repetir la contraseña';
    }
    if (validar_contrasenya($password)) {
        $errores[] = 'La contraseña tiene que tener entre 4 y 8 caracteres y al menos un número y letras mayúsculas y minúsculas';
    }
    if ($password !== $passwordRepeat) {
        $errores[] = 'Las contraseñas no coinciden';
    }

    $consultarUsuario = $miPDO->prepare('SELECT COUNT(*) AS usuario_existe FROM usuarios  WHERE email = :email AND estado = 1');

    $consultarUsuario->execute([
        'email' => $email,
    ]);

    $usuarioExiste = $consultarUsuario->fetch();

    if ($usuarioExiste['usuario_existe']) {
        $errores[] = 'Email no disponible';
    }


    if (count($errores) === 0) {
        $password_hash = password_hash($password, PASSWORD_BCRYPT);
        $token = bin2hex(openssl_random_pseudo_bytes(16));

        // Prepara INSERT
        $miNuevoRegistro = $miPDO->prepare('INSERT INTO usuarios (email, password, token) VALUES (:email, :password, :token);');
        // Ejecuta el nuevo registro en la base de datos
        $miNuevoRegistro->execute([
            'email' => $email,
            'password' => $password_hash,
            'token' => $token
        ]);

        // Enviamos correo
        // Crea objeto
        $mail = new PHPMailer();

        try {
            // Configuración servidor SMTP
            $mail->isSMTP();
            $mail->Host       = 'mailhog';
            $mail->SMTPAuth   = true;
            $mail->Username   = '';
            $mail->Password   = '';
            $mail->SMTPSecure = false;
            $mail->Port       = 1025;

            $mail->setFrom('no-reply@redsocial.com', 'Red social');
            // Quien lo recibe
            $mail->addAddress($email, 'Usuario');

            // Contenido
            $mail->isHTML(true);
            $mail->Subject = 'Verifica tu cuenta';
            $mail->Body    = "Pulsa aqui para validar la cuenta: <a href='http://localhost/validar-token.php?email=$email&token=$token'>pulsa aqui</a>";

            // Enviar
            $mail->send();

            header('Location: http://localhost/login.php');
        } catch (Exception $e) {
            // Errores
            echo $e;
        }
    }
}


;?>
<?php require_once('componentes/header.php');?>
<main>
    <h1>Registro</h1>
    <?php require_once('componentes/listar-errores.php');?>
    <form method="post" action="registro.php">
        <div>
            <!-- Campo de Email -->
            <label>
                E-mail
                <input type="text" name="email">
            </label>
        </div>
        <div>
            <!-- Campo de Contraseña -->
            <label>
                Contraseña
                <input type="text" name="password">
            </label>
        </div>
        <div>
            <!-- Campo de Repetir Contraseña -->
            <label>
                Repite contraseña
                <input type="text" name="password-repeat">
            </label>
        </div>
        <div>
            <!-- Botón submit -->
            <input type="submit" value="Registrarse">
        </div>
    </form>
</main>
<?php require_once('componentes/footer.php');?>
