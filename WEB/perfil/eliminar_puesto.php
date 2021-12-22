<?php

    session_start();

    include '../../resources/php/db.php';

    $codigo_puesto = $_GET['cod'];

    $delete = "DELETE FROM puesto WHERE codigo = ?";
    $resultado = mysqli_prepare($conexion,$delete);

    if (!$resultado) {
        echo "Error con resultado: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado, "i", $codigo_puesto);
    $ok = mysqli_stmt_execute($resultado);

    if (!$ok) {
        echo "Error con ok: ".mysqli_error($conexion);
    }

    mysqli_close($conexion);
    header("Location: miperfil.php");
?>