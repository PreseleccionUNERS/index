<?php

include("conexion.php");
$con = connection();

$id=$_POST["id"];
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

$sql="UPDATE admins SET usuario='$usuario', contraseña='$contraseña' WHERE id='$id'";
$query = mysqli_query($con, $sql);

if($query){
    Header("Location: crud.php");
}else{

}

