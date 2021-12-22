<?php

    session_start();

    include '../../resources/php/db.php';

    $codigo = (int)$_POST['codigo'];
    $patente = $_POST['patente'];
    $direccion = (int)$_POST['direccion'];

    $update = "UPDATE puesto SET patente_puesto = ?, codigo_direccion = ? WHERE codigo = ?";

    $resultado = mysqli_prepare($conexion,$update);

    if (!$resultado) {
        echo "Error con resultado :".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado, "sii", $patente, $direccion, $codigo);
    $ok = mysqli_stmt_execute($resultado);

    if (!$ok) {
        echo "Error con ok: ".mysqli_error($conexion);
    }

    header('Location: miperfil.php');
?>