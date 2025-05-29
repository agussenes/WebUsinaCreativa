<?php
session_start();
require_once 'config.php';

if (isset($_POST['user']) && isset($_POST['pass'])) {
    if ($_POST['user'] === USUARIO_ENV && $_POST['pass'] === PASSWORD_ENV) {
        $_SESSION['logueado'] = true;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Usuario o contraseña incorrectos';
    }
}
?>
