<?php
include("conexion.php");
$con = connection();

$sql = "SELECT * FROM carrera";
$query = mysqli_query($con, $sql);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de cursos</title>
    <link rel="stylesheet" href="css/diseño.css">
    <link rel="stylesheet" href="css/responsive--editado.css">
</head>
<body>
    <div class="login">
        <h2 class="login-header">Registro de cursos</h2>
        <form action="insertar.php" method="post" class="login-container">
            <div class="image-container"></div>
            <div class="form-group">
                <label for="nombres"><img src="IMG/icon_lapiz.png" class="form-icon">Nombres</label>
                <input type="text" id="nombres" placeholder="Ingrese sus nombres" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="apellidos"><img src="IMG/icon_lapiz.png" class="form-icon">Apellidos</label>
                <input type="text" id="apellidos" placeholder="Ingrese sus apellidos" name="apellido" required>
            </div>
            <div class="form-group">
                <label for="cedula"><img src="IMG/icon_id.png" class="form-icon">Cédula</label>
                <input type="number" id="cedula" placeholder="Ingrese su cédula" name="cedula" required>
            </div>
            <div class="form-group">
                <label for="nr-tlf"><img src="IMG/icon_telefono.png" class="form-icon">Número de Teléfono</label>
                <input type="number" id="nr-tlf" placeholder="Ingrese su número de teléfono" name="nr-tlf" required>
            </div>
            <div class="form-group">
                <label for="correo"><img src="IMG/icon_email.png" class="form-icon">Correo</label>
                <input type="email" id="correo" placeholder="Ingrese su correo: ejemplo@email.com" name="correo" required>
            </div>
            <div class="form-group">
                <label for="carrera"><img src="IMG/icon_estudiante.png" class="form-icon">Carrera</label>
                <select id="carrera" name="carrera" required>
                    <?php while ($row = mysqli_fetch_array($query)): ?>
                    <option value="<?= $row['id'] ?>"><?= $row['carrera'] ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="tipo_estudiante"><img src="IMG/icon_estudiante.png" class="form-icon">Tipo de Estudiante</label>
                <select id="tipo_estudiante" name="tipo_estudiante" required>
                    <option value="opcion1">Opción 1</option>
                    <option value="opcion2">Opción 2</option>
                </select>
            </div>
            <div class="form-group">
                <label for="residencia"><img src="IMG/icon_casa.png" class="form-icon">Residencia</label>
                <input type="text" id="residencia" placeholder="Ingrese su residencia" name="residencia" required>
            </div>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>