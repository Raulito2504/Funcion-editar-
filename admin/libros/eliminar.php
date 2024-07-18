<?php
// Configurar la conexión a la base de datos
$conexion = mysqli_connect('localhost', 'root', '', 'arias');

if (mysqli_connect_errno()) {
    header('Location: ../../error_base_de_datos.php');
    exit();
}

// Obtener el ID del libro a eliminar
$id = $_GET['id'];

// Preparar la consulta de eliminación
$query = "DELETE FROM books WHERE id = $id";

// Ejecutar la consulta
if (mysqli_query($conexion, $query)) {
    // Redirigir a la página principal después de eliminar
    header('Location: /asignatura-main/admin/index.php');
} else {
    echo "Error al eliminar el libro: " . mysqli_error($conexion);
}

// Cerrar la conexión
mysqli_close($conexion);
?>
