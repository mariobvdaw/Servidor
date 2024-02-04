<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Editar Usuario</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <label for="user">Usuario:</label>
                        <input type="text" readonly name="user" id="user" class="form-control"
                            value="<?php echo $_SESSION['usuario']->user ?>">
                        <br>
                        <label for="email">Email:</label>
                        <input type="email" name="email" id="email" class="form-control"
                            value="<?php echo $_SESSION['usuario']->email ?>">
                        <br>
                        <label for="fecha">Fecha de Nacimiento:</label>
                            <input type="text" name="fecha" id="fecha" class="form-control"
                                value="<?php echo $_SESSION['usuario']->fechaNacimiento ?>">
                        <br>
                        <label for="perfil">Perfil:</label>
                        <input type="text" readonly name="perfil" id="perfil" class="form-control"
                            value="<?php echo $_SESSION['usuario']->perfil ?>">
                        <br>
                        <span class="text-danger">
                            <?php
                            if (isset($errores)) {
                                errores($errores, "nombre");
                            }
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                            if (isset($errores)) {
                                errores($errores, "update");
                            }
                            ?>
                        </span>
                        <span class="text-danger">
                            <?php
                            if (isset($errores)) {
                                errores($errores, "validado");
                            }
                            ?>
                        </span>
                        <br>
                        <input type="submit" name="User_Guardar" value="Guardar Cambios"
                            class="btn btn-outline-success mt-3">
                        <input type="submit" name="User_CambiaContraseña" value="Cambiar Contraseña"
                            class="btn btn-outline-danger mt-3">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>