<?php

    session_start();

    include '../../resources/php/db.php';

    $codigo_producto = (int)$_POST['codigo_prod'];
    $codigo_usuario = (int)$_SESSION['codigo'];
    $total = (int)$_POST['total'];
    $cantidad = (int)$_POST['cantidad'];
    $fecha = strval(date('Y-m-d'));

    $select_cuenta = "SELECT * FROM cuenta WHERE codigo_usuario = ?";

    /*Bendito modo procecdural*/

    $dinero_cuenta = NULL;
    $cons = mysqli_prepare($conexion, $select_cuenta);
    $cons->bind_param("i",$codigo_usuario);
    $cons->execute();
    $cons->store_result();
    $cons->bind_result($cuenta_codigo,$cuenta_dinero, $cuenta_codigo_usuario);
    if ($cons->num_rows>0) {
        while ($cons->fetch()) {
            $dinero_cuenta = (int)$cuenta_dinero;
        }
    }

    $cons->free_result();

    if ($dinero_cuenta < $total) { /*No se realiza ninguna operacion ya que no tiene fondos*/
        echo "Error, no tiene fondos o.O";
        $_SESSION['dinero'] = $dinero_cuenta;
        header ("Location: ../error/error.php");
    } else {
        /*Se realiza el insert a transaccion y se descuenta dinero de cuenta, se actualiza cantidad
        de producto y todo queda ok*/
        $dinero_update = (int)$dinero_cuenta- (int)$total;

        $consulta = "INSERT INTO transaccion (codigo_producto,cantidad,codigo_usuario,fecha,total)
        VALUES (?,?,?,?,?)";

        $resultado = mysqli_prepare($conexion, $consulta);

        if (!$resultado) {
            echo "Error con resultado: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_param($resultado, "iiisi", $codigo_producto, $cantidad, $codigo_usuario, $fecha, $total);
        $ok = mysqli_stmt_execute($resultado);

        if (!$ok) {
            echo "Error con ok 1: ".mysqli_error($conexion);
        }

        $resultado->free_result();


        $update_cuenta = "UPDATE cuenta SET dinero = ? WHERE codigo_usuario = ?";
        $resultado_cuenta = mysqli_prepare($conexion, $update_cuenta);

        if (!$resultado_cuenta) {
            echo "Error con resultado cuenta: ".mysqli_error($conexion);
        }

        $ok_cuenta = mysqli_stmt_bind_param($resultado_cuenta, "ii", $dinero_update, $codigo_usuario);
        $ok_cuenta = mysqli_stmt_execute($resultado_cuenta);

        if (!$ok_cuenta) {
            echo "Error con ok cuenta: ".mysqli_error($conexion);
        }

        $resultado_cuenta->free_result();

        $select_producto = "SELECT cantidad FROM producto WHERE codigo = ?";

        $cant_update = NULL;

        $cons = mysqli_prepare($conexion, $select_producto);
        $cons->bind_param("i",$codigo_producto);
        $cons->execute();
        $cons->store_result();
        $cons->bind_result($cantidad_select);
        if ($cons->num_rows>0) {
            while ($cons->fetch()) {
                $cant_update = (int)$cantidad_select - (int)$cantidad;
            }
        }

        $cons->free_result();

        $update_producto = "UPDATE producto SET cantidad = ? WHERE codigo = ?";
        $resultado_producto = mysqli_prepare($conexion, $update_producto);

        if (!$resultado_producto) {
            echo "Error con resultado producto: ".mysqli_error($conexion);
        }

        $ok_producto = mysqli_stmt_bind_param($resultado_producto, "ii", $cant_update, $codigo_producto);
        $ok_producto = mysqli_stmt_execute($resultado_producto);

        if (!$ok_producto) {
            echo "Error con ok producto: ".mysqli_error($conexion);
        } else {
            header('Location: transacciones.php');
        }
        $_SESSION['dinero'] = $dinero_update;
        $resultado_producto->free_result();
    }
    mysqli_close($conexion);
    

?>