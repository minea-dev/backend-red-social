<?php
// Importaciones
require_once('logica/conexion.php');
require_once('logica/validadores.php');

// Variables
$errores = [];
$email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
$password = isset($_REQUEST['password']) ? $_REQUEST['password'] : null;


if ($_SERVER['REQUEST_METHOD'] === 'POST' && $email !== null && $password !== null) {

    if (validar_requerido($email)) {
        $errores[] = 'Es necesario el email';
    }
    if (validar_requerido($password)) {
        $errores[] = 'Es necesaria la contraseña';
    }

    if (count($errores) === 0) {
        // ¿hay algun usuario con estas claves?
        $miConsulta = $miPDO->prepare('SELECT id, password FROM usuarios WHERE email = :email');

        $miConsulta->execute([
            'email' => $email
        ]);

        $resultado = $miConsulta->fetch();

        if ($resultado && password_verify($password, $resultado['password'])) {
            // Creamos sesion
            session_start();

            $tokenSesion = bin2hex(openssl_random_pseudo_bytes(16));
            $nuevoToken = $miPDO->prepare('INSERT INTO sesiones (id_usuario, token_sesion) values (:id_usuario, :token_sesion)');
            $nuevoToken->execute([
                'id_usuario' => $resultado['id'],
                'token_sesion' => $tokenSesion
            ]);

            $_SESSION['usuario'] = $tokenSesion;
            $_SESSION['id_usuario'] = $resultado['id'];

            header('location: index.php');
        } else {
            $errores[] = 'La contraseña o email no validos';
        }
    }
}

require_once('componentes/header.php');
?>
<main>
    <h1>Iniciar sesión</h1>
    <?php require_once('componentes/listar-errores.php');?>
    <p>
        email: admin@admin.com
    </p>
    <p>
        password: Qwer1234
    </p>
    <form method="post" action="login.php">
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
            <!-- Botón submit -->
            <input type="submit" value="Login">
        </div>
    </form>
    <p>
        <a href="recuperar-password.php">Recuperar contraseña</a>
        <a href="registro.php">Registrate</a>
    </p>
</main>
<?php require_once('componentes/footer.php');?>
