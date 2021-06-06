<?php
    $conexion = new mysqli('localhost','root','123456','gdlwebcamp');
    if($conexion->connect_error){
        echo $error->$conexion->connect_error;
    }
?>