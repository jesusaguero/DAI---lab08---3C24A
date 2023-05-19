<?php
include('../conexion.php');

// Abrimos la conexion a la BD MySql
$conexion = conectar();

// Verificamos si se ha enviado una busqueda
if(isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];

    // Definimos la consulta SQL para buscar un producto por su nombre
    $sql = "SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto WHERE nombre LIKE '%$buscar%'";

    // Ejecutamos el query en la conexion abierta
    $resultado = mysqli_query($conexion, $sql);
} else {
    // Si no se ha enviado ninguna busqueda, mostramos todos los productos
    $sql = 'SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto';
    $resultado = mysqli_query($conexion, $sql);
}

// Cerramos la conexion
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Productos</h1>
        <div>
            <form method="GET" action="">
                <div class="form-group">
                    <label for="buscar">Buscar producto por nombre:</label>
                    <input type="text" name="buscar" id="buscar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <a href="agregar.html" class="btn btn-primary">Nuevo Producto</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Precio de la venta</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($producto = mysqli_fetch_array($resultado)){
                            $id_producto = $producto['id_producto'];
                            $nombre = $producto['nombre'];
                            $descripcion = $producto['descripcion'];
                            $stock = $producto['stock'];
                            $precio_venta = $producto['precio_venta'];

                            echo '<tr>';
                            echo '<td>' . $id_producto . '</td>';
                            echo '<td>' . $nombre . '</td>';
                            echo '<td>' . $descripcion . '</td>';
                            echo '<td>' . $stock . '</td>';
                            echo '<td>' . $precio_venta . '</td>';
                            echo '<td><a href="editar_producto.php?id_producto=' . $id_producto . '" class="btn btn-primary btn-sm">Editar</a></td>';
                            echo '<td><a href="eliminar_producto.php?id_producto=' . $id_producto . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>