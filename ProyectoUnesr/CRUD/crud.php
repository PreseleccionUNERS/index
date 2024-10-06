<?php
include("conexion.php");
$con = connection();

$sql = "SELECT * FROM admins WHERE id_cargo <> 3";
$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <title>Administración de Usuarios</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="stylesheet" href="css/diseño-p.css">
      <link rel="stylesheet" type="text/css" href="css/responsive--editado--tablas.css">
   </head>
<body>
    <header>
        <div class="container">
            <img src="IMG/Logo_unesr_valera-removebg-preview.png" alt="Logo UNESR" class="logo">
        </div>
        <h1>Administración de Usuarios</h1>
    </header>
    <a href="crear.php" class="users-table--create">Crear Usuario<img src="../CRUD/IMG/lapiz.png" alt=""></a>
    <div class="users-table">
        <h2>Usuarios registrados</h2>
        <table class="table-crud">
            <thead>
                <tr>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_array($query)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row['usuario']) ?></td>
                        <td><?= htmlspecialchars($row['contraseña']) ?></td>
                        <td><a href="actualizar.php?id=<?= $row['id'] ?>" class="users-table--edit"><img src="IMG/lapiz.png" alt="Editar"></a></td>
                        <td><a href="eliminar.php?id=<?= $row['id'] ?>" class="users-table--delete"><img src="IMG/borrar.png" alt="Eliminar"></a></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <footer>
        <div class="container">
            <p>Todos los derechos reservados. &copy; <?= date("Y") ?></p>
        </div>
    </footer>
</body>
</html>