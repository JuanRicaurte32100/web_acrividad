<?php
// Incluir archivo de conexión a la base de datos
include('include/conexion.php');

// Verificar que el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recibir y sanitizar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $correo = htmlspecialchars($_POST['correo']);
    $curso_id = $_POST['curso'];

    // Validar si los campos están vacíos
    if (empty($nombre) || empty($correo) || empty($curso_id)) {
        echo "Todos los campos son obligatorios.";
        exit;
    }

    // Verificar si el usuario ya está inscrito en el curso
    $sql_check = "SELECT * FROM inscritos WHERE email = ? AND curso_id = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("si", $correo, $curso_id);
    $stmt_check->execute();
    $resultado_check = $stmt_check->get_result();

    if ($resultado_check->num_rows > 0) {
        echo "Ya estás inscrito en este curso.";
        exit;
    }

    // Insertar la inscripción en la base de datos
    $sql_insert = "INSERT INTO inscritos (nombre, email, curso_id) VALUES (?, ?, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    $stmt_insert->bind_param("ssi", $nombre, $correo, $curso_id);

    if ($stmt_insert->execute()) {
        echo "Te has inscrito exitosamente en el curso.";
    } else {
        echo "Error al procesar la inscripción. Intenta nuevamente.";
    }

    // Cerrar la conexión
    $stmt_insert->close();
    $conn->close();
}
?>