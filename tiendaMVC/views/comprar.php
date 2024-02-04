<?php
if (isset($sms)) {
    echo $sms;
}?>
<div class="row">

    <!-- FORMULARIO DE CATEGORIAS -->
    <div class="col-lg-1 col-sm-3 col-md-2">
        <div class="container mt-4">
            <form action="" class="" method="post">
                <div class="form-group">
                    <p class="border-bottom">Filtrar:</p>
                    <div class="form-check">
                        <label class="form-check-label mb-2">
                            <input class="form-check-input" type="radio" id="general" name="categoria" value="Todos"
                                checked>
                            Todos
                        </label>
                    </div>
                    <?php
                    foreach ($arr_cat as $categoria) {
                        echo '<div class="form-check">';
                        echo '<label class="form-check-label mb-2" for="' . $categoria . '">';
                        echo '<input class="form-check-input" type="radio" id="' . $categoria . '" name="categoria" value="' . $categoria . '">';
                        echo $categoria;
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>
                </div>
                <button type="submit" name="Producto_BuscarCategoria" class="btn btn-warning">Buscar</button>
            </form>
        </div>
    </div>
    <div class="col-sm-9 col-md-10 ps-md-5">
        <div class="container mt-4 ps-md-5">
            <div class="row">
                <?php
                foreach ($arr_prod as $producto) {
                    echo '<div class="col-lg-3 col-md-4 col-sm-6 mb-4">';
                    echo '<div class="card">';
                    echo '<div class="contenedor-img">';
                    echo '<img style="height:220px;" class="card-img-top" src="' . $producto->url_imagen . '" alt="">';
                    echo '</div>';
                    echo '<div class="card-body">';
                    echo '<h5 class="card-title" style="height:45px">' . $producto->descripcion . '</h5>';
                    echo '<p class="card-text">' . $producto->precio . ' €</p>';
                    echo '<form method="post">';
                    if ($producto->stock == "0") {
                        echo '<p class="card-text text-danger">Stock: ' . $producto->stock . '</p>';
                    } else {
                        echo '<p class="card-text text-muted">Stock: ' . $producto->stock . '</p>';
                    }
                    echo '<input type="hidden" name="codigo" value="' . $producto->codigo . '">';
                    echo '<label for="cantidad' . $producto->codigo . '">Seleccionar cantidad: </label>';
                    echo '<input type="number" name="cantidad" value="1" id="cantidad' . $producto->codigo . '" class="form-control mb-3" min="1" max="' . $producto->stock . '">';
                    if ($producto->stock == "0") {
                        echo '<button class="btn btn-secondary btn-block" type="submit" name="Producto_ComprarPorducto" disabled>Comprar</button>';
                    } else {
                        echo '<button class="btn btn-outline-danger btn-block" type="submit" name="Producto_ComprarPorducto">Comprar</button>';
                    }
                    echo '</form>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>