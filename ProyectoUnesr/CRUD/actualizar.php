<?php 
    include("conexion.php");
    $con=connection();

    $id=$_GET['id'];

    $sql="SELECT * FROM admins WHERE id='$id'";
    $query=mysqli_query($con, $sql);

    $row=mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Actualizar</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/style_c.css">
      <link rel="stylesheet" type="text/css" href="css/responsive--editado--tablas.css">
   </head>
    <body>
        <div class="users-form">
            <div id="informacion" class="about top_layer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="titlepage">
                               <div class="box">
                                <img src="IMG/Logo_unesr_valera-removebg-preview.png" alt="Logo UNESR">
                                <h2>Editar Usuario</h2>
                                <form action="editar.php" method="POST">
                                    <input type="hidden" name="id" value="<?= $row['id']?>">
                                    <input type="text" name="usuario" placeholder="usuario" value="<?= $row['usuario']?>">
                                    <input type="password" name="contraseña" placeholder="contraseña" value="<?= $row['contraseña']?>">
                                    <input type="submit" value="Actualizar">
                                </form>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  
        </div>
    </body>
</html>