<?php
// Validar que los datos estén en la URL
if (!isset($_GET['nombre'], $_GET['correo'], $_GET['curso'])) {
    die("Error: No se recibieron los datos correctamente.");
}

// Obtener los datos pasados por la URL
$nombre = urldecode($_GET['nombre']);
$correo = urldecode($_GET['correo']);
$curso = urldecode($_GET['curso']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción Exitosa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Inscripción Exitosa</h1>
    </header>
    
    <main>
        <section class="confirmacion">
            <h2>¡Felicidades, <?php echo htmlspecialchars($nombre); ?>!</h2>
            <p>Te has inscrito exitosamente en el curso:</p>
            <h3><?php echo htmlspecialchars($curso); ?></h3>
            <p>Tu correo registrado es: <?php echo htmlspecialchars($correo); ?></p>
        </section>
        
        <div style="text-align: center; margin-top: 20px;">
            <a href="inscripcion.php" class="boton-agregar">Agregar más cursos</a>
        </div>
    </main>

    <footer>
        <p>© <?php echo date("Y"); ?> Cursos de Formación. Todos los derechos reservados.</p>
    </footer>
</body>
</html>