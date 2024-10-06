<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesión</title>
    <link rel="stylesheet" href="css/diseño.css">
    <link rel="stylesheet" href="css/responsive--editado.css">
</head>
<body>
    <div class="login">
        <h2 class="login-header">Inicio de Sesión de Administradores</h2>
        <form action="validar.php" method="post" class="login-container">
            <div class="image-container"></div>
            <div class="form-group">
                <label for="usuario"><img src="IMG/icon_user.png" class="form-icon">Usuario</label>
                <input type="text" id="usuario" placeholder="Ingrese su usuario" name="usuario" required>
            </div>
            <div class="form-group">
                <label for="contraseña"><img src="IMG/icon_contraseña.png" class="form-icon">Contraseña</label>
                <input type="password" id="contraseña" placeholder="Ingrese su contraseña" name="contraseña" required minlength="8">
            </div>
            <div class="form-group">
                <a href="recuperar-contraseña.html">¿Olvidó su contraseña?</a>
            </div>
            <input type="submit" value="Ingresar" class="submit-button">
        </form>
    </div>
</body>
</html>