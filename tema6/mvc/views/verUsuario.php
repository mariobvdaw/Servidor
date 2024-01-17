<?php
if (isset($sms)) {
    echo $sms;
}
// ES NECESARIO QUE ANTERIORMENTE EL CONTROLADORA HAYA BUSCADO UN USUARIO


?>

<p>CodUsuario:
    <?php echo $_SESSION['usuario']->codUsuario ?>
</p>
<p>DescUsuario:
    <?php echo $_SESSION['usuario']->descUsuario ?>
</p>
<p>fechaUltimaConexion:
    <?php echo $_SESSION['usuario']->fechaUltimaConexion ?>
</p>
<p>Perfil:
    <?php echo $_SESSION['usuario']->perfil ?>
</p>

<form action="" method="post">
    <input type="submit" name="User_editar" value="Editar">
</form>