<?php

function insertarCookie($id)
{
    // setcookie("id", $id); // de sesion
    // setcookie("id", $id, time()+(3600*24)); // tiempo
    // setcookie("id", $id, time()-(3600*24)); // borrar cookie (valor timepo pasado)
    // setcookie("id", $id, time()+(3600*24),"/"); // desde cualquier lugar



    if (isset($_COOKIE['id'])) {
        // EXISTE
        if (!in_array($id, $_COOKIE['id'])) { // EL ID NO ESTÁ EN EL ARRAY
            if (isset($_COOKIE['id'][2]))
                setcookie("id[3]", $_COOKIE['id'][2], time() + (3600 * 24), "/");
            setcookie("id[2]", $_COOKIE['id'][1], time() + (3600 * 24), "/");
            setcookie("id[1]", $id, time() + (3600 * 24), "/");
        } else {
            if ($id == $_COOKIE['id'][2]) {
                setcookie("id[2]", $_COOKIE['id'][1], time() + (3600 * 24), "/");
                setcookie("id[1]", $id, time() + (3600 * 24), "/");
            } elseif ($id == $_COOKIE['id'][3]) {
                setcookie("id[3]", $_COOKIE['id'][2], time() + (3600 * 24), "/");
                setcookie("id[2]", $_COOKIE['id'][1], time() + (3600 * 24), "/");
                setcookie("id[1]", $id, time() + (3600 * 24), "/");
            }
        }
    } else {
        // NO EXISTE
        setcookie("id[1]", $id, time() + (3600 * 24), "/");

    }



}
?>