<?php

require('./config/config.php');
session_start();

if (isset($_REQUEST['login'])) {
    $_SESSION['vista'] = VIEW . 'login.php';
    $_SESSION['controller'] = CON . 'LoginController.php';

} elseif (isset($_REQUEST['home'])) {
    $_SESSION['vista'] = VIEW . 'home.php';

} elseif (isset($_REQUEST['logout'])) {
    session_destroy();
    header('Location: ./index.php');

} elseif (isset($_REQUEST['User_verPerfil'])) {
    $_SESSION['vista'] = VIEW . 'verUsuario.php';
    $_SESSION['controller'] = CON . 'UserController.php';
}elseif (isset($_REQUEST['Citas_verCitas'])) {
    $_SESSION['vista'] = VIEW . 'verCitas.php';
    $_SESSION['controller'] = CON . 'CitasController.php';
}



// SI EXISTE UN CONTROLADOR LO REQUIERE
if (isset($_SESSION['controller'])) {
    require($_SESSION['controller']);
}
require('./views/layout.php');


echo "<pre>";

// USUARIOS
// // print_r(UserDAO::findAll());
// print_r(UserDAO::findById("mario"));

// // $usuario = new User('54', sha1('pepi'), 'pepiasds111', '2026-01-11', "", true);
// $usuario2 = new User('62', sha1('pepi'), 'pepi2', '2022-01-11', "", true);
$usuario3 = new User('51', sha1('pepi'), 'pepiasds', '2024-01-11', "", true);
// $usuario = new User('1', sha1('mario'), 'pepiasds', '2024-01-11', "", true);
// UserDAO::insert($usuario);
// // UserDAO::insert($usuario2);
// // UserDAO::insert($usuario3);
// UserDAO::update($usuario);
// // print_r(UserDAO::findAll());
// UserDAO::delete($usuario);
// echo "<br>";
// print_r(UserDAO::findAll());
// echo "<br>";
// UserDAO::activar($usuario);
// // print_r(UserDAO::findAll());
// // echo "<br>";
// // print_r(UserDAO::buscarPorNombre("pepi"));

// if ($usuario = UserDAO::validarUsuario("1", "mario")) {
//     echo "<p>Login correcto </p>";
//     print_r($usuario);
// } else {
//     echo "Login incorrecto";
// }


// CITAS
// print_r(CitaDAO::findAll());
// // print_r(CitaDAO::findById(3));


// $cita = new Cita(14, 'dermatologo', 'consulta', '2024-01-11', 1, true);
// $cita = new Cita(3, 'dermatologo', 'revision', '2028-11-11', 51);
// // CitaDAO::insert($cita);
// // CitaDAO::update($cita);
// $cita = new Cita(5, 'dermatologo', 'revision', '2028-01-11', 54);
// // CitaDAO::delete($cita);
// // CitaDAO::activar($cita);
// echo "<p>Citas de".$usuario3->descUsuario. "</p>";
// print_r(CitaDAO::findByPaciente($usuario3));
// echo "<p>Citas pasadas de".$usuario3->descUsuario. "</p>";
// print_r(CitaDAO::findByPacienteH($usuario3));


?>