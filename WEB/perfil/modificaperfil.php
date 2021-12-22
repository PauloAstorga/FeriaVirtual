<?php

    include '../../resources/php/db.php';

    session_start();

    $newPwd = md5($_POST['newcontrasena']);
    $oldPwd = md5($_POST['contrasena']);
    $codUsuario = $_SESSION['codigo'];

    $oldPwdBD = NULL;

    $select_user = "SELECT contrasena FROM usuario WHERE codigo = ?";
    $resultado1 = mysqli_prepare($conexion, $select_user);

    if (!$resultado1) {
        echo "Error con resultado 1: ".mysqli_error();
    }

    $ok1 = mysqli_stmt_bind_param($resultado1, "i", $codUsuario);
    $ok1 = mysqli_stmt_execute($resultado1);

    if (!$ok1) {
        echo "Error con ok 1: ".mysqli_error();
    } else {
        $ok1 = mysqli_stmt_bind_result($resultado1,$pwd);
        while (mysqli_stmt_fetch($resultado1)) {
            $oldPwdBD = $pwd;
        }
    }

    if ($oldPwdBD!=$oldPwd) {
        echo "Contraseña incorrecta o.O";
        header ("Location: miperfil.php?pwd='FALSE'");
    } else {
        $resultado1->free_result();

        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $telefono = $_POST['telefono'];

        $consulta = "UPDATE usuario SET nombre = ?, apellido = ?, correo = ?, telefono = ?, contrasena = ?
        WHERE codigo = ?";
        $resultado = mysqli_prepare($conexion, $consulta);

        if (!$resultado) {
            echo "Error con resultado: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_param($resultado, "sssssi", $nombre, $apellido, $correo, $telefono, $newPwd, $codUsuario);
        $ok = mysqli_stmt_execute($resultado);
        header("Location: miperfil.php?change='TRUE'");
    }

?>