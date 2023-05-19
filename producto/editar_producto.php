<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $stock = $_POST['stock'];
    $precio_venta = $_POST['precio_venta'];

    
    $conexion = conectar();

    
    $sql = "UPDATE producto SET nombre = '$nombre', descripcion = '$descripcion', stock = '$stock', precio_venta = '$precio_venta' WHERE id_producto = $id_producto";

    
    if (mysqli_query($conexion, $sql)) {
        
        desconectar($conexion);

        
        header('Location: productos.php');
        exit;
    } else {
        $error = 'Error al actualizar el producto: ' . mysqli_error($conexion);
    }
} else {
    
    $id_producto = $_GET['id_producto'];

    
    $conexion = conectar();

    
    $sql = "SELECT nombre, descripcion, stock, precio_venta FROM producto WHERE id_producto = $id_producto";

    
    $resultado = mysqli_query($conexion, $sql);

    
    $producto = mysqli_fetch_array($resultado);

    
    desconectar($conexion);

    
    $nombre = $producto['nombre'];
    $descripcion = $producto['descripcion'];
    $stock = $producto['stock'];
    $precio_venta = $producto['precio_venta'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Producto</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre del Producto:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
            </div>
            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" id="stock" name="stock" value="<?php echo $stock; ?>">
            </div>
            <div class="form-group">
                <label for="precio_venta">Precio de venta:</label>
                <input type="text" class="form-control" id="precio_venta" name="precio_venta" value="<?php echo $precio_venta; ?>">
            </div>
            <input type="hidden" name="id_producto" value="<?php echo $id_producto; ?>">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>