<?php

    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'feria_prod';

    $conexion = mysqli_connect($host, $username, $password);

    if ( mysqli_connect_errno() ) {
        echo "Error en conexion con el servidor.";
        exit();
    }

    mysqli_select_db($conexion, $database) or die ("Error al conectar la BD.");
    mysqli_set_charset($conexion, "utf8");

?>