<?php

mysqli_report(MYSQLI_REPORT_OFF);

$conexion = mysqli_connect('localhost', 'root', '', 'arias');

if (mysqli_connect_errno()) {
    header('Location: ../../error_base_de_datos.php');
    exit();
}


$errores = [];
$isbn = '';
$nombre = '';
$autor = '';
$precio = '';
$editorial = '';
$imagen = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $precio = $_POST['precio'];
    $editorial = $_POST['editorial'];
    $imagen = $_POST['imagen'];


    $peticionInsertar = "INSERT INTO books (isbn, nombre, autor, precio, editorial, imagen) VALUES ('$isbn','$nombre','$autor','$precio','$editorial','$imagen')";

    if ($isbn === '') {
        $errores[] = 'Debes ingresar un ISBN';
    }

    if ($nombre === '') {
        $errores[] = 'Debes ingresar un Nombre';
    }
    if ($autor === '') {
        $errores[] = 'Debes ingresar un Autor';
    }
    if ($precio === '') {
        $errores[] = 'Debes ingresar un Precio';
    }
    if ($editorial === '') {
        $errores[] = 'Debes ingresar un Editorial';
    }
    if ($imagen === '') {
        $errores[] = 'Debes ingresar un Imagen';
    }


    if (empty($errores)) {

        if (mysqli_query($conexion, $peticionInsertar)) {
            // if (mysqli_errno($conexion) === 1062) {
            //     header('Location: ../../error_registro_duplicado.php');
            //     exit();
            // }
            echo "Datos Insertados Correctamente";
        } else {
            if (mysqli_errno($conexion) === 1062) {
                header('Location: ../../error_registro_duplicado.php');
                exit();
            }
        }

    }


}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear un libro</title>
</head>

<body>
    <a href="/asignatura-main/admin/index.php">Regresar</a>
    <?php foreach ($errores as $error): ?>
        <div style="background-color: black; color: red;"><?php echo $error ?></div>
    <?php endforeach ?>


    <form action="crear.php" method="POST">
        <label for="">ISBN</label>
        <input type="text" name="isbn" value="<?php echo $isbn ?>">
        <label for="">Nombre</label>
        <input type="text" name="nombre" value="<?php echo $nombre ?>">
        <label for="">Autor</label>
        <input type="text" name="autor" value="<?php echo $autor ?>">
        <label for="">Precio</label>
        <input type="number" name="precio" value="<?php echo $precio ?>">
        <label for="">Editorial</label>
        <input type="text" name="editorial" value="<?php echo $editorial ?>">
        <label for="">Imagen</label>
        <input type="text" name="imagen" value="<?php echo $imagen ?>">
        <input type="submit" value="Envíar">
    </form>
</body>

</html>