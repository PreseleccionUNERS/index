
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preoferta de cursos</title>
    <link rel="stylesheet" href="css/diseño-p.css">
    <link rel="stylesheet" type="text/css" href="css/responsive--editado--tablas.css">
</head>
<body>
    <header>
        <div class="container">
            <img src="IMG\Logo_unesr_valera-removebg-preview.png" alt="Imagen de la pantalla del curso" class="logo">
        </div>
        <h1>Preoferta de cursos</h1>
    </header>
    <main>
    <?php
    // Conectar a la base de datos
    $conn=mysqli_connect("localhost", "root", "","simon_bd");

    if (!$conn) {
        die("Error al conectar a la base de datos: " . mysqli_connect_error());
    }

    // Obtener el ID del curso seleccionado
    $cursoId = $_POST['curso'];

    // Consultar los estudiantes en el curso
    $query = "SELECT e.nombre, e.apellido, e.cedula 
            FROM estudiantes e
            INNER JOIN estudiante_cursos ec ON e.id = ec.id_estudiante
            WHERE ec.id_cursos = $cursoId";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) > 0) {
        // Mostrar los estudiantes
        echo "<h2>Estudiantes en el curso:</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['nombre']} {$row['apellido']} - Cédula: {$row['cedula']}</li>";
        }
        echo "</ul>";
    } else {
        echo "No se encontraron estudiantes en el curso.";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
    ?>
    </main>
    <footer>
        <div class="container">
            <p>Todos los derechos reservados. &copy; 2024</p>
        </div>
    </footer>
</body>
</html>