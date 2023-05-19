<?php

include('../conexion.php');

// Obtenemos la información del usuario
$nombre = $_POST['nombre'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
$direccion = $_POST['direccion'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

// Abrimos la conexión a la base de datos
$conexion = conectar();

// Formamos la consulta SQL
$sql = "INSERT INTO usuario (nombre, ape_paterno, ape_materno, direccion, email, telefono, password) VALUES ('$nombre', '$ape_paterno', '$ape_materno', '$direccion', '$email', '$telefono', '$password')";

// Ejecutamos la instrucción SQL
$resultado = mysqli_query($conexion, $sql);

// Cerramos la conexión
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Usuario</title>
</head>
<body>
    <h1>Nuevo Usuario</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar el usuario';
        }
        else{
            echo 'Usuario registrado';
        }
    ?>
    </h3>
    <a href="usuarios.php">Regresar</a>
</body>
</html>
