<?php

include("Conexion.php");

if(isset($_POST['register'])) {
    if(
        strlen($_POST['name']) >= 1 &&
        strlen($_POST['email']) >= 1 &&
        strlen($_POST['direction']) >= 1 &&
        strlen($_POST['Cedula']) >= 1 &&
        strlen($_POST['Celular']) >= 1 &&
        strlen($_POST['password']) >= 1 &&
        strlen($_POST['confirmpassword']) >= 1 
     ){
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $direction = trim($_POST['direction']);
        $Cedula = trim($_POST['Cedula']);
        $phone = trim($_POST['Celular']);
        $password = trim($_POST['password']);
        $confirmpassword = trim($_POST['confirmpassword']);
        $fecha_registro = date("d/m/y");

        $consulta = "INSERT INTO usuarios1 (Cedula, name, email, direction, phone, password) VALUES ('$Cedula', '$name', '$email', '$direction', '$phone', '$password')";

        $resultado = mysqli_query($conex, $consulta);

        if($resultado) {
            echo "Usuario registrado correctamente";
        } else {
            echo "Error al registrar el usuario";
        }
     } else {
        echo "Por favor complete todos los campos";
     }
}
?>