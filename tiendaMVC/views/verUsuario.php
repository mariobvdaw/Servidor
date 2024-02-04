<?php
if (isset($sms)) {
    echo $sms;
} ?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-4">
                <div class="card-header">
                    <h3 class="text-center">Datos del Usuario</h3>
                </div>
                <div class="card-body">
                    <?php
                    echo '<p><strong>Usuario: </strong>' . $_SESSION['usuario']->user . '</p>';
                    echo '<p><strong>Email: </strong>' . $_SESSION['usuario']->email . '</p>';
                    echo '<p><strong>Fecha de nacimiento:</strong> ' . $_SESSION['usuario']->fechaNacimiento . '</p>';
                    echo '<p><strong>Perfil: </strong> ' . $_SESSION['usuario']->perfil . '</p>';

                    ?>
                    <form action="" method="post">
                        <input type="submit" name="User_editar" value="Editar" class="btn btn-outline-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>