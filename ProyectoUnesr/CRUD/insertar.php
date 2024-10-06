<?php
include("conexion.php");
$con = connection();

$id = null;
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$id_cargo = 1;

$sql = "INSERT INTO admins VALUES('$id','$usuario','$contraseña', '$id_cargo')";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: crud.php");
}else{

}
