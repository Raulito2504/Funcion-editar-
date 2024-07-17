<?php

mysqli_report(MYSQLI_REPORT_OFF);

$conexion = mysqli_connect('localhost', 'root', '', 'arias');

if (mysqli_connect_errno()) {
    header('Location: ../../error_base_de_datos.php');
    exit();
}

$id = '';
$isbn = '';
$nombre = '';
$autor = '';
$precio = '';
$editorial = '';
$imagen = '';

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM books WHERE id='$id'";
    $resultado = mysqli_query($conexion, $query);
    $fila = mysqli_fetch_assoc($resultado);

    $isbn = $fila['isbn'];
    $nombre = $fila['nombre'];
    $autor = $fila['autor'];
    $precio = $fila['precio'];
    $editorial = $fila['editorial'];
    $imagen = $fila['imagen'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $isbn = $_POST['isbn'];
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $precio = $_POST['precio'];
    $editorial = $_POST['editorial'];
    $imagen = $_POST['imagen'];

    $peticionActualizar = "UPDATE books SET isbn='$isbn', nombre='$nombre', autor='$autor', precio='$precio', editorial='$editorial', imagen='$imagen' WHERE id='$id'";
    mysqli_query($conexion, $peticionActualizar);
    header('Location: consulta.php');
}

?>

<form method="POST" action="editar.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    ISBN: <input type="text" name="isbn" value="<?php echo $isbn; ?>"><br>
    Nombre: <input type="text" name="nombre" value="<?php echo $nombre; ?>"><br>
    Autor: <input type="text" name="autor" value="<?php echo $autor; ?>"><br>
    Precio: <input type="text" name="precio" value="<?php echo $precio; ?>"><br>
    Editorial: <input type="text" name="editorial" value="<?php echo $editorial; ?>"><br>
    Imagen: <input type="text" name="imagen" value="<?php echo $imagen; ?>"><br>
    <input type="submit" value="Actualizar">
</form>
