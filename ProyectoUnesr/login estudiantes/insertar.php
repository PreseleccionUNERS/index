<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_de_datos = "simon_bd";

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$telefono = $_POST['nr-tlf'];
$correo = $_POST['correo'];
$tipoEstudiante = $_POST['tipo_estudiante'];
$residencia = $_POST['residencia'];
$id_cargo = 2;

$conn = new mysqli($host, $usuario, $password, $base_de_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "INSERT INTO estudiantes (nombre, apellido, cedula, telefono, correo, tipo_estudiante, residencia, id_cargo) 
        VALUES ('$nombre', '$apellido', '$cedula', '$telefono', '$correo', '$tipoEstudiante', '$residencia', '$id_cargo')";

if ($conn->query($sql) === TRUE) {
    $carrera = $_POST['carrera'];
    // Realizar cualquier validación o procesamiento adicional aquí
    header("Location: ../registro de cursos/rdc.php?carrera=$carrera");
    exit;
} else {
    echo "Error al ingresar los datos: " . $conn->error;
}

$conn->close();
