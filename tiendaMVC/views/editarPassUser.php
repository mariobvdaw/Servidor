<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Cambiar Contraseña</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="pass">Pass:</label>
                            <input type="password" name="pass" id="pass" class="form-control">
                        <span class="error">
                            <?php
                            if (isset($errores)) {
                                errores($errores, "pass");
                            }
                            ?>
                        </span>
                        <br>
                        <label for="pass2">Repite Pass:</label>
                            <input type="password" name="pass2" id="pass2" class="form-control">
                        <span class="error">
                            <?php
                            if (isset($errores)) {
                                errores($errores, "pass2");
                            }
                            ?>
                        </span>
                        <?php
                        if (isset($errores)) {
                            errores($errores, "igual");
                            errores($errores, "update");
                        }
                        ?>
                        <span class="error">
                            <?php
                            if (isset($errores)) {
                                errores($errores, "validado");
                            }
                            ?>
                        </span>
                        <br>
                        <input type="submit" name="User_GuardaContraseña" value="Cambiar contraseña" class="btn btn-success">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>