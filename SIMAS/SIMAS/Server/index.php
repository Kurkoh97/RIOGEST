<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>RIOGEST</title>
    <link rel="stylesheet" href="loginstyle.css">
    <script>
        function showRegister() {
            document.getElementById('loginForm').style.display = 'none';
            document.getElementById('registerForm').style.display = 'block';
        }
        function showLogin() {
            document.getElementById('registerForm').style.display = 'none';
            document.getElementById('loginForm').style.display = 'block';
        }
    </script>
</head>
<body>
    <div class="header">
        <div class="logo">RIOGEST</div>
        <div class="nav-buttons">
            <button class="nav-btn" onclick="showSection('home')">Inicio</button>
            <button class="nav-btn" onclick="showSection('about')">Acerca de</button>
            <button class="nav-btn" onclick="showSection('services')">Servicios</button>
            <button class="nav-btn" onclick="showSection('contact')">Contacto</button>
        </div>
        <div class="user-info" id="userInfo" style="display: none;">
            <div class="user-avatar" id="userAvatar"></div>
            <span id="userName"></span>
            <button class="nav-btn" onclick="logout()">Cerrar Sesión</button>
        </div>
    </div>

    <div class="main-content">
        <!-- Login Form -->
        <div class="login-container" id="loginForm" style="display: block;">
            <h2 class="login-title">Iniciar Sesión</h2>
            <form id="loginFormElement" method="post" action="Login.php">
                <div class="form-group">
                    <label for="username">Usuario o Email</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="login-btn">Iniciar Sesión</button>
                <div class="register-link" onclick="showRegister()">
                    ¿No tienes cuenta? Regístrate aquí
                </div>
            </form>
        </div>
        <!-- Register Form -->
<div class="login-container" id="registerForm" style="display: none;">
    <h2>Crear Cuenta</h2>
    <form method="post" action="Registrar.php">
        <div class="form-group">
            <label for="document">Cedula</label>
            <input type="text" id="document" name="Cedula" required>
        </div>
        <div class="form-group">
            <label for="fullName">Nombre</label>
            <input type="text" id="fullName" name="name" required>
        </div>
        <div class="form-group">
            <label for="regEmail">Email</label>
            <input type="email" id="regEmail" name="email" required>
        </div>
        <div class="form-group">
            <label for="document">Celular</label>
            <input type="text" id="phone" name="Celular" required>
        </div>
        <div class="form-group">
            <label for="direction">Direccion</label>
            <input type="text" id="direction" name="direction" required>
        </div>
        <div class="form-group">
            <label for="regPassword">Contraseña</label>
            <input type="password" id="regPassword" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmar Contraseña</label>
            <input type="password" id="confirmPassword" name="confirmpassword" required>
        </div>
        <button type="submit" name="register" class="login-btn">Crear Cuenta</button>
    </form>
    <div class="login-switch">
        ¿Ya tienes cuenta? <a href="#" onclick="showLogin()">Iniciar Sesión</a>
    </div>
</div>
        

        
    <?php include("Registrar.php"); ?>
</body>
</html>