
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Registro</h3>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" id="nombre" placeholder="unico"
                            value="<?php recuerda("nombre") ?>" class="form-control">
                        <?php
                        if (isset($errores)) {
                            echo '<span class="text-danger">' . $errores["nombre"] . ' </span>';
                        }
                        ?>
                        <br>
                        <label for="contrasenia">Contraseña</label>
                        <input type="password" name="contrasenia" id="contrasenia" placeholder="contraseña"
                            value="<?php recuerda("contrasenia") ?>" class="form-control">
                        <?php
                        if (isset($errores)) {
                            echo '<span class="text-danger">' . $errores["contrasenia"] . ' </span>';
                        }
                        ?>
                        <br>
                        <label for="contrasenia2">Repetir contraseña</label>
                        <input type="password" name="contrasenia2" id="contrasenia2" placeholder="repetir contraseña"
                            value="<?php recuerda("contrasenia2") ?>" class="form-control">
                        <?php
                        if (isset($errores)) {
                            echo '<span class="text-danger">' . $errores["contrasenia2"] . ' </span>';
                        }
                        ?>
                        <br>
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" id="correo" placeholder="ejemplo@algo.algo"
                            value="<?php recuerda("correo") ?>" class="form-control">
                            <?php
                        if (isset($errores)) {
                            echo '<span class="text-danger">' . $errores["correo"] . ' </span>';
                        }
                        ?>
                        <br>
                        <label for="fecha">Fecha</label>
                            <input type="text" name="fecha" id="fecha" placeholder="2024/01/15"
                                value="<?php recuerda("fecha") ?>" class="form-control">
                        <?php
                        if (isset($errores)) {
                            echo '<span class="text-danger">' . $errores["fecha"] . ' </span>';
                        }
                        ?>
                        <br>
                        <input type="submit" name="Login_GuardaRegistro" value="Enviar" id="enviar"
                            class="btn btn-primary mt-3">
                        <button type="submit" class="btn btn-link mt-3" name="login">¿Ya tienes cuenta?</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>