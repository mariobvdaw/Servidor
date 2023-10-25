<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Archivo</title>
</head>
<body>
    <form action="subir.php" method="post" name="formularioArchivo" enctype="multipart/form-data">
        <input type="file" name="archivo[]" id="archivo" multiple>
        <br><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>