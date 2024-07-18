<?php

mysqli_report(MYSQLI_REPORT_OFF);

$conexion = mysqli_connect('localhost', 'root', '', 'arias');

if (mysqli_connect_errno()) {
    header('Location: ../../error_base_de_datos.php');
    exit();
}

$query = "SELECT * FROM books";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>ISBN</th>
                <th>Nombre</th>
                <th>Autor</th>
                <th>Precio</th>
                <th>Editorial</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>";
    while ($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>
                <td>{$fila['id']}</td>
                <td>{$fila['isbn']}</td>
                <td>{$fila['nombre']}</td>
                <td>{$fila['autor']}</td>
                <td>{$fila['precio']}</td>
                <td>{$fila['editorial']}</td>
                <td><img src='{$fila['imagen']}' alt='Imagen' width='100'></td>
                <td>
                    <a href='editar.php?id={$fila['id']}'>Editar</a>
                    <a href='eliminar.php?id={$fila['id']}'>Eliminar</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron resultados.";
}

mysqli_close($conexion);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reborn bruh</title>
</head>
<body>
    <a href="/asignatura-main/admin/index.php">Regresar</a>
</body>
</html>
