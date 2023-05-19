<?php

include('../conexion.php');

// Obtenemos la informacion del producto
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precio_venta = $_POST['precio_venta'];

// Abrimos la conexion a la base de datos
$conexion = conectar();

// formamos la consulta SQL
$sql = "INSERT INTO producto (nombre, descripcion, stock, precio_venta) VALUES ('$nombre', '$descripcion', '$stock', '$precio_venta')";

// Ejecutamos la instruccion SQL
$resultado = mysqli_query($conexion, $sql);

//Cerramos la conexion
desconectar($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>
</head>
<body>
    <h1>Nuevo Producto</h1>
    <h3>
    <?php
        if (!$resultado){
            echo 'No se ha podido registrar el producto';
        }
        else{
            echo 'Producto registrado';
        }
    ?>
    </h3>
    <a href="productos.php">Regresar</a>
</body>
</html>