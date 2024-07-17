<?php
$conexion = mysqli_connect('localhost', 'root', '', 'sm31');

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isbn = $_POST['isbn'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $precio = $_POST['precio'];
    $editorial = $_POST['editorial'];
    $imagen = $_POST['imagen'];


    $peticionInsertar = "INSERT INTO libros (isbn, nombre, autor, precio, editorial, imagen) VALUES ('$isbn','$nombre','$autor','$precio','$editorial','$imagen')";

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

    echo "<pre>";
    var_dump($errores);
    echo "</pre>";

    if (mysqli_query($conexion, $peticionInsertar)) {
        echo "Datos insertados correctamente";
    } else {
        echo "Error al insertar los datos";
    }

}
