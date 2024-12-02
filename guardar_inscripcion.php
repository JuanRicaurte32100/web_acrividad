<?php
// Conectar a la base de datos
include('include/conexion.php');

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['correo'];
$curso_id = $_POST['curso'];

// Verificar si el usuario ya está inscrito en el curso
$sql_check = "SELECT * FROM inscritos WHERE email = ? AND curso_id = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("si", $email, $curso_id);
$stmt_check->execute();
$result_check = $stmt_check->get_result();

if ($result_check->num_rows > 0) {
    // Si ya está inscrito, mostrar un mensaje de error
    echo "Ya estás inscrito en este curso.";
    exit();
}

// Si no está inscrito, proceder con la inserción
$sql = "INSERT INTO inscritos (nombre, email, curso_id) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssi", $nombre, $email, $curso_id);

if ($stmt->execute()) {
    // Si la inscripción fue exitosa, redirigir a la página de agradecimiento
    header("Location: gracias.php");
    exit();
} else {
    // Si ocurrió un error al insertar, mostrar mensaje de error
    echo "Error al inscribirse en el curso.";
}

$stmt->close();
$conn->close();
?>