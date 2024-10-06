<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina principal</title>
    <link rel="stylesheet" href="css/diseño.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>
<body>
    <header>
        <img src="IMG/simon_logo-blanco.png" alt="Logo">
        <h1>Universidad Nacional experimental Simón Rodriguez</h1>
    </header>
    <?php
    if (isset($_GET['success']) && $_GET['success'] === 'true') {
        echo '<h1 class="fancy">El registro se realizo con exito</h1>';
    }
    ?>
    <div class="container">
        <div class="option">
            <div class="image-admin"></div>
            <h2><a href="../login admins/login.php">administracion</a></h2>
        </div>
        <div class="option">
            <div class="image-estu"></div>
            <h2><a href="../login estudiantes/login.php">estudiantes</a></h2>
        </div>
    </div>
</body>
</html>