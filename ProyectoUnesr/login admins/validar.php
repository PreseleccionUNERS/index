<?php

$user = $_POST["usuario"];
$contraseña = $_POST["contraseña"];
session_start();
$_SESSION['usuario']=$user;

include('conecxion.php');

$consulta="SELECT * FROM admins where contraseña='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_fetch_array($resultado);
error_reporting(0);

switch ($filas["id_cargo"]) {

    case "1":
        header("location:../pre oferta de cursos/poc.php");
        break;

    case '3':
        header("location:../pagina admins/PA.php");
        break;

    default:
        ?>
        <?php
            include("login.php");
        ?>
        <h1 class="bad">los datos que se ingresaron son invalidos</h1>
        <?php
        break;
}
mysqli_free_result($resultado);
mysqli_close($conexion);
