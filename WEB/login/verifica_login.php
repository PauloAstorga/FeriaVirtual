<?php

    include '../../resources/php/db.php';

    session_start();
    $correo = $_POST['correo'];
    $pwd = md5($_POST['contrasena']);

    echo "Correo : ".$correo;

    echo "Pwd :".$pwd;

    $codigo_de_usuario = NULL;
    $select_user = "SELECT * FROM usuario WHERE correo = ? AND contrasena = ?";
    $resultado = mysqli_prepare($conexion, $select_user);

    if (!$resultado) {
        echo "<br>Error con resultado".mysqli_error($conexion)."<br>";
        header ("Location: login.php?log='FALSE'");
    }

    $ok = mysqli_stmt_bind_param($resultado, "ss", $correo, $pwd);
    $ok = mysqli_stmt_execute($resultado);

    if (!$ok) {
        echo "<br> Error con ok".mysqli_error($conexion)."<br>";
        header ("Location: login.php?log='FALSE'");
    }
    else {
        $ok = mysqli_stmt_bind_result($resultado, $u_cod, $u_rut, $u_nombre, $u_apellido, $u_correo, $u_telefono, $u_pwd, $u_cod_dire, $u_cod_tipo);
        while (mysqli_stmt_fetch($resultado)) {
            $_SESSION['codigo'] = $u_cod;
            $_SESSION['log'] = TRUE;
            $_SESSION['nombre'] = $u_nombre;
            $_SESSION['apellido'] = $u_apellido;
            $_SESSION['rut'] = $u_rut;
            $_SESSION['correo'] = $u_correo;
            $codigo_de_usuario = $u_cod;
        }


        $resultado->free_result();

        $select_cuenta = "SELECT * FROM cuenta WHERE codigo_usuario = ?";
        $resultado_cuenta = mysqli_prepare($conexion, $select_cuenta);

        $okc = mysqli_stmt_bind_param($resultado_cuenta, "i", $codigo_de_usuario);
        $okc = mysqli_stmt_execute($resultado_cuenta);

        $okc = mysqli_stmt_bind_result($resultado_cuenta, $c_cod, $c_cash, $c_user);
        while (mysqli_stmt_fetch($resultado_cuenta)) {
            $_SESSION['dinero'] = $c_cash;
        }

        $resultado_cuenta->free_result();

        $select_tipo_user = "SELECT codigo_tipo_usuario FROM usuario WHERE codigo= ?";
        $resultado_tipo = mysqli_prepare($conexion, $select_tipo_user);

        $okd = mysqli_stmt_bind_param($resultado_tipo, "i", $codigo_de_usuario);
        $okd = mysqli_stmt_execute($resultado_tipo);

        $okc = mysqli_stmt_bind_result($resultado_tipo, $codigo_tipo_usuario);
        while (mysqli_stmt_fetch($resultado_tipo)) {
            $_SESSION['cod_tipo_usuario'] = $codigo_tipo_usuario;
        }
        
        header("Location: ../../index.php?log='TRUE'");
    
    }

    

    
?>