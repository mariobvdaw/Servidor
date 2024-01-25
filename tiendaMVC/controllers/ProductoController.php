<?php

// if (isset($_REQUEST['Cita_Pedir'])) {
//     $_SESSION['vista'] = VIEW . 'pedirCita.php';
// } elseif (isset($_REQUEST['Cita_GuardaCita'])) {
//     $errores = array();
//     if (validaFormularioNuevaCita($errores)) {
//         $cita = new Cita(
//             1,
//             $_REQUEST['especialista'],
//             $_REQUEST['motivo'],
//             $_REQUEST['fecha'],
//             $_SESSION['usuario']->codUsuario,
//             true
//         );
//         if (!CitaDAO::insert($cita)) {
//             $errores['insertar'] = "No se ha podido generar su cita";
//         } else {
//             $sms = "Se ha registrado su cita";
//             $arrayCitas = CitaDAO::findByPaciente($_SESSION['usuario']);
//             $_SESSION['vista'] = VIEW . 'verCitas.php';
//         }
//     }
// } elseif (isset($_REQUEST['Cita_verAnterior'])) {
//     $arrayCitas = CitaDAO::findByPacienteH($_SESSION['usuario']);

// } elseif (isset($_REQUEST['Citas_verTodasCitas'])) {
//     $arrayCitas = CitaDAO::findAll();

// } elseif (isset($_REQUEST['Cita_verCita'])) {
//     $cita = CitaDAO::findById($_REQUEST['id']);
//     $_SESSION['vista'] = VIEW . 'verCita.php';


// } else {
//     $arrayCitas = CitaDAO::findByPaciente($_SESSION['usuario']);
//     $_SESSION['vista'] = VIEW . 'verCitas.php';
// }

?>