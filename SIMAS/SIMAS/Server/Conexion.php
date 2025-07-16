<?php
    $conex = mysqli_connect("localhost", "root", "", "usuarios");
    if (!$conex) {
        die("Connection failed: " . mysqli_connect_error());
    }
?>
