<?php

include('../conexion.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $usuario_id = $_POST['usuario_id'];
    $nombre = $_POST['nombre'];
    $ape_paterno = $_POST['ape_paterno'];
    $ape_materno = $_POST['ape_materno'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $password = $_POST['password'];

    
    $conexion = conectar();

    
    $sql = "UPDATE usuario SET nombre = '$nombre', ape_paterno = '$ape_paterno', ape_materno = '$ape_materno', direccion = '$direccion', email = '$email', telefono = '$telefono', password = '$password' WHERE usuario_id = $usuario_id";

    
    if (mysqli_query($conexion, $sql)) {
        
        desconectar($conexion);

        
        header('Location: usuarios.php');
        exit;
    } else {
        $error = 'Error al actualizar el usuario: ' . mysqli_error($conexion);
    }
} else {
    
    $usuario_id = $_GET['usuario_id'];

    
    $conexion = conectar();

    
    $sql = "SELECT nombre, ape_paterno, ape_materno, direccion, email, telefono, password FROM usuario WHERE usuario_id = $usuario_id";

    
    $resultado = mysqli_query($conexion, $sql);

    
    $usuario = mysqli_fetch_array($resultado);

    
    desconectar($conexion);

    
    $nombre = $usuario['nombre'];
    $ape_paterno = $usuario['ape_paterno'];
    $ape_materno = $usuario['ape_materno'];
    $direccion = $usuario['direccion'];
    $email = $usuario['email'];
    $telefono = $usuario['telefono'];
    $password = $usuario['password'];
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Editar Usuario</h1>
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php } ?>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>
            <div class="form-group">
                <label for="ape_paterno">Apellido Paterno:</label>
                <input type="text" class="form-control" id="ape_paterno" name="ape_paterno" value="<?php echo $ape_paterno; ?>">
            </div>
            <div class="form-group">
                <label for="ape_materno">Apellido Materno:</label>
                <input type="text" class="form-control" id="ape_materno" name="ape_materno" value="<?php echo $ape_materno; ?>">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="telefono" value="<?php echo $telefono; ?>">
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo $password; ?>">
            </div>
            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
