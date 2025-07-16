<?php
session_start();
if(isset($_SESSION['usuario'])) {
    header("Location: main.php");
    exit();
}
include("Conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Buscar por email o nombre en la tabla correcta
    $consulta = "SELECT * FROM usuarios1 WHERE email='$username' OR name='$username' LIMIT 1";
    $resultado = mysqli_query($conex, $consulta);

    if ($resultado && mysqli_num_rows($resultado) == 1) {
        $usuario = mysqli_fetch_assoc($resultado);
        if ($usuario['password'] === $password) {
            $_SESSION['usuario'] = $usuario['name'];
            header("Location: main.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Usuario no encontrado";
    }
}
?>

