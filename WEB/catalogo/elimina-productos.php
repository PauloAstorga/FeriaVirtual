<?php

    session_start();

    include '../../resources/php/db.php';

    $codigo_puesto = $_GET['puesto'];
    $codigo = $_GET['cod'];

    $delete = "DELETE FROM producto WHERE codigo = ? AND codigo_puesto = ?";
    $resultado = mysqli_prepare($conexion, $delete);

    if (!$resultado) {
        echo "Error con resultado: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado, "ii", $codigo, $codigo_puesto);
    $ok = mysqli_stmt_execute($resultado);

    if (!$ok) {
        echo "Error con ok: ".mysqli_error($conexion);
    }

    header("Location: agregar-producto.php?del=TRUE");

?>