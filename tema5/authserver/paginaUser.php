<?php
require('./seguro/datos.php');

function isUser()
{
    if (
        $_SERVER['PHP_AUTH_USER'] == USER ||
        hash('sha256', $_SERVER['PHP_AUTH_PW']) == PASS
    ) {
        return true;
    }
    return false;
}

function isAdmin()
{
    if (
        $_SERVER['PHP_AUTH_USER'] == USERA ||
        hash('sha256', $_SERVER['PHP_AUTH_PW']) == PASSA
    ) {
        return true;
    }
    return false;
}

if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    if (!isUser()) {
        header('Location: ./index.php');
        exit;
    }
    else if(!isAdmin()){
        header('Location: ./index.php');
        exit;
    }
} else {
    header('Location: ./index.php');
    exit;
}

echo "Eres el usuario " . $_SERVER['PHP_AUTH_USER'];
?>

<a href="./cerrar.php">Cerrar</a>