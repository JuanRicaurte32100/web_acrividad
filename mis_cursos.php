<?php
// Conectar a la base de datos
include('include/conexion.php');

// Suponiendo que el usuario se autentica por correo electrónico
$email = "usuario@example.com"; // Aquí deberías usar la sesión del usuario o alguna variable dinámica para obtener el correo

// Consultar los cursos a los que el usuario está inscrito
$sql = "SELECT c.nombre FROM inscritos i INNER JOIN cursos c ON i.curso_id = c.id WHERE i.email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$resultado = $stmt->get_result();

// Consultar todos los cursos disponibles
$sql_cursos = "SELECT * FROM cursos";
$resultado_cursos = $conn->query($sql_cursos);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Mis Cursos</h1>
    </header>
    
    <main>
        <section class="mis-cursos">
            <h2>Cursos en los que estás inscrito:</h2>
            <ul>
                <?php
                if ($resultado->num_rows > 0) {
                    while ($fila = $resultado->fetch_assoc()) {
                        echo "<li>" . htmlspecialchars($fila['nombre']) . "</li>";
                    }
                } else {
                    echo "<li>No estás inscrito en ningún curso.</li>";
                }
                ?>
            </ul>
        </section>
        
        <section class="form-inscripcion">
            <h2>Inscribirte en un nuevo curso:</h2>
            <form action="inscripcion.php" method="get">
                <button type="submit">Regresar a la inscripción</button>
            </form>
        </section>
        
    </main>

    <footer>
        <p>© <?php echo date("Y"); ?> Cursos de Formación. Todos los derechos reservados.</p>
    </footer>

    <?php $conn->close(); // Cerrar la conexión a la base de datos ?>
</body>
</html>