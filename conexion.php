<?php

$servidor = "localhost";
$usuario = "root";
$contraseña = "";
$base_datos = "inscripcion_curso";

$conn = new mysqli($servidor, $usuario, $contraseña, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>