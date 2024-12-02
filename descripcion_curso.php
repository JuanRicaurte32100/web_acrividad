<?php 
// Conectar a la base de datos
include('include/conexion.php'); 

// Verificar si se pasa un ID de curso en la URL
if (isset($_GET['id'])) {
    $curso_id = $_GET['id']; 

    // Consultar la información del curso
    $sql = "SELECT nombre, descripcion FROM cursos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $curso_id);
    $stmt->execute();
    $resultado = $stmt->get_result();

    // Verificar si el curso existe
    if ($resultado->num_rows > 0) {
        $curso = $resultado->fetch_assoc();
    } else {
        echo "Curso no encontrado.";
        exit;
    }
} else {
    echo "ID de curso no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descripción del Curso</title>
    <!-- Correcta referencia al archivo style.css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Contenedor principal -->
    <div class="contenedor">
        <!-- Encabezado con el título del curso -->
        <header class="titulo-curso">
            <h1>Descripción del Curso</h1>
        </header>

        <!-- Sección de descripción del curso -->
        <section class="descripcion-curso">
            <h2><?php echo htmlspecialchars($curso['nombre']); ?></h2>
            <p><?php echo nl2br(htmlspecialchars($curso['descripcion'])); ?></p>
            <!-- Enlace para regresar al inicio -->
            <a href="index.php" class="btn-volver">Volver al inicio</a>
        </section>
    </div>
</body>
</html>

<?php 
// Cerrar la conexión a la base de datos
$conn->close(); 
?>