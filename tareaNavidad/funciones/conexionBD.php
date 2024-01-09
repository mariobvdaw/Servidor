<?php
require('./funciones/confBD.php');
function crearBase()
{
    $DSN = "mysql:host=" . IP . ';dbname=mysql';
    try {
        $con = new PDO($DSN, USERINICIO, PASSINICIO);
        $script = file_get_contents("./script.sql");
        $con->exec($script);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function validaUsuario($user, $pass)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM usuarios WHERE user = ? AND pass = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute(array($user, $pass));
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            unset($con);
            return $usuario;
        }
        return false;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function findUser($user)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM usuarios WHERE user = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$user]);
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario) {
            unset($con);
            return $usuario;
        }
        return false;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function registrarUsuario($nombre, $contrasenia, $correo, $fecha)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "INSERT INTO usuarios VALUES (?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$nombre, $contrasenia, $correo, $fecha, 'cliente']);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function modificarUsuario($nombre, $contrasenia, $correo, $fecha)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "UPDATE usuarios SET pass = ?, email = ?, fecha_nacimiento = ? WHERE user = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$contrasenia, $correo, $fecha, $nombre]);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function cargarProductos()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM productos";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function cargarProductosInicio()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM productos ORDER BY precio DESC LIMIT 5";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function cargarProductosCategoria($categoria)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM productos WHERE categoria = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$categoria]);

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function cargarCategorias()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT DISTINCT categoria FROM productos";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $categorias = array();
        while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($categorias, $cat['categoria']);
        }
        return $categorias;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function aumentarStock($codigo, $sumaStock)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "UPDATE productos SET stock = stock + ? WHERE codigo = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$sumaStock, $codigo]);

        $categorias = array();
        while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($categorias, $cat['categoria']);
        }
        return $categorias;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function restarStock($codigo, $restaStock)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "UPDATE productos SET stock = stock - ? WHERE codigo = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$restaStock, $codigo]);

        $categorias = array();
        while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($categorias, $cat['categoria']);
        }
        return $categorias;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function findProduct($codigo)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM productos WHERE codigo = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$codigo]);
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($producto) {
            unset($con);
            return $producto;
        }
        return false;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;

            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function altaProducto($codigo, $descripcion, $precio, $stock, $url_imagen, $categoria)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "INSERT INTO productos VALUES (?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$codigo, $descripcion, $precio, $stock, $url_imagen, $categoria]);

        $categorias = array();
        while ($cat = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($categorias, $cat['categoria']);
        }
        return $categorias;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function modificarProducto($codigo, $descripcion, $precio)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "UPDATE productos SET descripcion = ?, precio = ? WHERE codigo = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$descripcion, $precio, $codigo]);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function comprarProducto($usuario, $fecha, $producto, $cantidad, $precio)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "INSERT INTO compras (comprador, fecha, cod_producto, cantidad, total, activo) VALUES (?,?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$usuario, $fecha, $producto, $cantidad, $precio,"1"]);

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function cargarCompras()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM compras";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function borrarCompra($id)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "UPDATE compras SET activo = 0 WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function cargarAlbaranes()
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "SELECT * FROM albaranes";
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function generarAlbaran($fecha, $producto, $cantidad, $usuario)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "INSERT INTO albaranes (fecha, cod_producto, cantidad, usuario, activo) VALUES (?,?,?,?,?)";
        $stmt = $con->prepare($sql);
        $stmt->execute([$fecha, $producto, $cantidad, $usuario,"1"]);

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}
function borrarAlbaran($id)
{
    try {
        $DSN = "mysql:host=" . IP . ';dbname=' . BD;
        $con = new PDO($DSN, USER, PASS);
        $sql = "UPDATE albaranes SET activo = 0 WHERE id = ?";
        $stmt = $con->prepare($sql);
        $stmt->execute([$id]);

        $productos = array();
        while ($producto = $stmt->fetch(PDO::FETCH_ASSOC)) {
            array_push($productos, $producto);
        }
        return $productos;

    } catch (\Throwable $th) {
        switch ($th->getCode()) {
            case '1049':
                crearBase();
                break;
            default:
                echo $th->getMessage();
                echo $th->getCode();
        }
    } finally {
        unset($con);
    }
}

?>