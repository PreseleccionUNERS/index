<?php
$host = "localhost";
$usuario = "root";
$password = "";
$base_de_datos = "simon_bd";

$conexion = mysqli_connect($host, $usuario, $password, $base_de_datos);

if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

$user = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
$cargo=$_POST["cargo"];

$sql = "INSERT INTO admins (usuario, contraseña, id_cargo) VALUES ('$user', '$contraseña','$cargo')";

if (mysqli_query($conexion, $sql)) {
    ?>
        <?php
            include("login.php");
        ?>
        <h1 class="fancy">cuenta creada</h1>
        <?php
} else {
    echo "Error al insertar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>

    





