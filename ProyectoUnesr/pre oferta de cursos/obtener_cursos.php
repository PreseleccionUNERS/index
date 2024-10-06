<?php
// Conectar a la base de datos
$conn = mysqli_connect("localhost", "root", "", "simon_bd");

if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

if (isset($_GET['carrera'])) {
    $carrera = $_GET['carrera'];

    // Consultar los cursos según la carrera seleccionada
    $query = "SELECT cursos.codigo, cursos.curso, cursos.descripcion, cursos.creditos FROM cursos INNER JOIN carrera_curso ON cursos.codigo = carrera_curso.id_curso INNER JOIN carrera ON carrera_curso.id_carrera = carrera.id WHERE carrera.carrera = '$carrera'";
    $result = mysqli_query($conn, $query);

    $cursos = array();

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $curso = array(
                "codigo" => $row['codigo'],
                "curso" => $row['curso'],
                "descripcion" => $row['descripcion'],
                "creditos" => $row['creditos']
            );
            $cursos[] = $curso;
        }
    }

    // Devolver los cursos en formato JSON
    header("Content-Type: application/json");
    echo json_encode($cursos);
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);