<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preoferta de cursos</title>
    <link rel="stylesheet" href="css/diseño-p.css">
    <link rel="stylesheet" type="text/css" href="css/responsive--editado--tablas.css">
</head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Preoferta de cursos</title>
<link rel="stylesheet" href="css/diseño-p.css">
<link rel="stylesheet" type="text/css" href="css/responsive--editado--tablas.css">

<header("Location: preoferta_cursos.php");
    exit();>

    <body>
        <h1>Agregar Curso</h1>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Procesar el formulario cuando se envíe
            $codigo = $_POST['codigo'];
            $curso = $_POST['curso'];
            $descripcion = $_POST['descripcion'];
            $creditos = $_POST['creditos'];

            // Conectar a la base de datos
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "simon_bd";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Insertar el nuevo curso en la base de datos
            $sql = "INSERT INTO cursos (codigo, curso, descripcion, creditos) VALUES ('$codigo', '$curso', '$descripcion', '$creditos')";

            if ($conn->query($sql) === TRUE) {
                echo "Curso agregado correctamente.";
            } else {
                echo "Error al agregar el curso: " . $conn->error;
            }

            $conn->close();
        }
        ?>

        <form method="post">
            <label for="codigo">Código:</label>
            <input type="text" name="codigo" required><br><br>

            <label for="curso">Curso:</label>
            <input type="text" name="curso" required><br><br>

            <label for="descripcion">Descripción:</label>
            <input type="text" name="descripcion" required><br><br>

            <label for="creditos">Créditos:</label>
            <input type="number" name="creditos" required><br><br>

            <input type="submit" value="Agregar Curso">
        </form>
    </body>

</html>