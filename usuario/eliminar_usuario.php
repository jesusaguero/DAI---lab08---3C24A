<?php
include('../conexion.php');

if(isset($_GET['usuario_id'])) {
    
    $usuario_id = $_GET['usuario_id'];

    
    $conexion = conectar();

    
    $sql = "DELETE FROM usuario WHERE usuario_id = $usuario_id";

    
    if(mysqli_query($conexion, $sql)) {
        
        header("Location: usuarios.php");
    } else {
        
        $error = "Error al eliminar el usuario: " . mysqli_error($conexion);
    }

    
    desconectar($conexion);
} else {
    
    $error = "No se ha especificado el usuario a eliminar";
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Eliminar Usuario</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } else { ?>
            <div class="alert alert-success">El usuario ha sido eliminado correctamente</div>
        <?php } ?>
        <a href="usuarios.php" class="btn btn-primary">Volver a usuarios</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
