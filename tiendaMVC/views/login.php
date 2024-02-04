<?php
if (isset($_SESSION['error'])) {
    echo $_SESSION['error'];
}
if (isset($sms)) {
    echo $sms;
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="form-group">
                            <label for="user">Nombre:</label>
                            <input type="text" name="user" id="user" class="form-control" placeholder="Introduce tu usuario">
                            <?php
                            if (isset($errores) && isset($errores['user'])) {
                                echo '<span class="text-danger">' . $errores["user"] . ' </span>';
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label for="pass">Contraseña:</label>
                            <input type="password" name="pass" id="pass" class="form-control" placeholder="Introduce tu contraseña">
                            <?php
                            if (isset($errores) && isset($errores['pass'])) {
                                echo '<span class="text-danger">' . $errores["pass"] . ' </span>';
                            }
                            if (isset($errores) && isset($errores['validado'])) {
                                echo '<span class="text-danger">' . $errores["validado"] . ' </span>';
                            }
                            ?>
                        </div>
                        <input type="submit" value="Iniciar" name="Login_IniciarSesion" id="enviar"
                            class="btn btn-primary mt-3">
                        <button type="submit" class="btn btn-link mt-3" name="Login_Registro">¿No tienes
                            cuenta?</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>