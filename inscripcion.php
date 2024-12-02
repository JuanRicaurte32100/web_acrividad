<?php
// Conectar a la base de datos
include('include/conexion.php');

// Consultar todos los cursos disponibles
$sql_cursos = "SELECT * FROM cursos";
$resultado_cursos = $conn->query($sql_cursos);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $curso_id = $_POST['curso'];

    // Validar datos antes de procesar
    if (empty($nombre) || empty($correo) || empty($curso_id)) {
        $mensaje_error = "Por favor, completa todos los campos.";
    } else {
        // Verificar si el usuario ya está inscrito en el curso
        $sql_check = "SELECT * FROM inscritos WHERE email = ? AND curso_id = ?";
        $stmt_check = $conn->prepare($sql_check);
        $stmt_check->bind_param("si", $correo, $curso_id);
        $stmt_check->execute();
        $resultado_check = $stmt_check->get_result();

        if ($resultado_check->num_rows > 0) {
            $mensaje_error = "Ya estás inscrito en este curso.";
        } else {
            // Insertar inscripción
            $sql_insert = "INSERT INTO inscritos (nombre, email, curso_id) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssi", $nombre, $correo, $curso_id);
            $stmt_insert->execute();

            // Obtener el nombre del curso inscrito
            $sql_curso = "SELECT nombre FROM cursos WHERE id = ?";
            $stmt_curso = $conn->prepare($sql_curso);
            $stmt_curso->bind_param("i", $curso_id);
            $stmt_curso->execute();
            $resultado_curso = $stmt_curso->get_result()->fetch_assoc();
            $curso_nombre = $resultado_curso['nombre'];

            // Redirigir a la página de confirmación con los datos
            header("Location: inscripcion_exitosa.php?nombre=" . urlencode($nombre) . "&correo=" . urlencode($correo) . "&curso=" . urlencode($curso_nombre));
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Cursos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Inscripción a Cursos</h1>
    </header>
    
    <main>
        <section class="form-inscripcion">
            <h2>Inscríbete en un nuevo curso:</h2>
            <?php if (isset($mensaje_error)): ?>
                <p style="color: red;"><?php echo $mensaje_error; ?></p>
            <?php endif; ?>
            <form action="inscripcion.php" method="post">
                <label for="nombre">Nombre completo:</label>
                <input type="text" id="nombre" name="nombre" required>
                
                <label for="correo">Correo electrónico:</label>
                <input type="email" id="correo" name="correo" required>
                
                <label for="curso">Selecciona un curso:</label>
                <select id="curso" name="curso" required>
                    <?php
                    if ($resultado_cursos->num_rows > 0) {
                        while ($row_curso = $resultado_cursos->fetch_assoc()) {
                            echo "<option value='" . $row_curso['id'] . "'>" . htmlspecialchars($row_curso['nombre']) . "</option>";
                        }
                    } else {
                        echo "<option value=''>No hay cursos disponibles</option>";
                    }
                    ?>
                </select>
                
                <button type="submit">Inscribirse</button>
            </form>
        </section>
    </main>

    <footer>
        <p>© <?php echo date("Y"); ?> Cursos de Formación. Todos los derechos reservados.</p>
    </footer>
    
    <?php $conn->close(); // Cerrar la conexión a la base de datos ?>
</body>
</html>