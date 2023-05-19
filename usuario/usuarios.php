<?php
include('../conexion.php');

// Abrimos la conexión a la base de datos MySQL
$conexion = conectar();

// Verificamos si se ha enviado una búsqueda
if(isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];

    // Definimos la consulta SQL para buscar un usuario por su nombre
    $sql = "SELECT usuario_id, nombre, ape_paterno, ape_materno, direccion, email, telefono FROM usuario WHERE nombre LIKE '%$buscar%'";

    // Ejecutamos el query en la conexión abierta
    $resultado = mysqli_query($conexion, $sql);
} else {
    // Si no se ha enviado ninguna búsqueda, mostramos todos los usuarios
    $sql = 'SELECT usuario_id, nombre, ape_paterno, ape_materno, direccion, email, telefono FROM usuario';
    $resultado = mysqli_query($conexion, $sql);
}

// Cerramos la conexión
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
</head>
<body>
    <div class="container">
        <h1>Usuarios</h1>
        <div>
            <form method="GET" action="">
                <div class="form-group">
                    <label for="buscar">Buscar usuario por nombre:</label>
                    <input type="text" name="buscar" id="buscar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <a href="agregar.html" class="btn btn-primary">Nuevo Usuario</a>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Dirección</th>
                        <th>Email</th>
                        <th>Teléfono</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while($usuario = mysqli_fetch_array($resultado)){
                            $usuario_id = $usuario['usuario_id'];
                            $nombre = $usuario['nombre'];
                            $ape_paterno = $usuario['ape_paterno'];
                            $ape_materno = $usuario['ape_materno'];
                            $direccion = $usuario['direccion'];
                            $email = $usuario['email'];
                            $telefono = $usuario['telefono'];

                            echo '<tr>';
                            echo '<td>' . $usuario_id . '</td>';
                            echo '<td>' . $nombre . '</td>';
                            echo '<td>' . $ape_paterno . '</td>';
                            echo '<td>' . $ape_materno . '</td>';
                            echo '<td>' . $direccion . '</td>';
                            echo '<td>' . $email . '</td>';
                            echo '<td>' . $telefono . '</td>';
                            echo '<td><a href="editar_usuario.php?usuario_id=' . $usuario_id . '" class="btn btn-primary btn-sm">Editar</a></td>';
                            echo '<td><a href="eliminar_usuario.php?usuario_id=' . $usuario_id . '" class="btn btn-danger btn-sm">Eliminar</a></td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>    
            </table>
        </div>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>
