<?php

function conectar(){
    $conn = mysqli_connect('localhost','root','','eval02');
    return $conn;
}

function desconectar($conexion){
    mysqli_close($conexion);
}


?>