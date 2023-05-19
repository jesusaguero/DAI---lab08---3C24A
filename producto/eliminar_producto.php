<?php
include('../conexion.php');

if(isset($_GET['id_producto'])) {
    
    $id_producto = $_GET['id_producto'];

    
    $conexion = conectar();

    
    $sql = "DELETE FROM producto WHERE id_producto = $id_producto";

    
    if(mysqli_query($conexion, $sql)) {
        
        header("Location: productos.php");
    } else {
        
        $error = "Error al eliminar el producto: " . mysqli_error($conexion);
    }

    
    desconectar($conexion);
} else {
    
    $error = "No se ha especificado el producto a eliminar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Producto</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } else { ?>
            <div class="alert alert-success">El producto ha sido eliminado correctamente</div>
        <?php } ?>
        <a href="productos.php" class="btn btn-primary">Volver a productos</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>