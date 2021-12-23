<?php

    session_start();

    include '../../resources/php/db.php';

    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];
    $imagen = $_POST['imagen_url'];
    $patente = $_POST['patente'];

    if (strlen($nombre)>30 or strlen($nombre)<3 or strlen($descripcion)>100 or strlen($descripcion<3)
        or $precio<0 or $precio>1000000 or $cantidad < 0 or $cantidad > 1000000 or strlen($imagen)>200
        or strlen($imagen)<3){

        $codigo_categoria = NULL;

        $select_categoria = "SELECT codigo FROM categoria WHERE tipo = ?";
        $resultado2 = mysqli_prepare($conexion,$select_categoria);

        if (!$resultado2) {
            echo "Error con resultado: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_param($resultado2, "s", $categoria);
        $ok = mysqli_stmt_execute($resultado2);

        if (!$ok) {
            echo "Error con ok: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_result($resultado2, $cod_categoria);
        while (mysqli_stmt_fetch($resultado2)){
            $codigo_categoria = $cod_categoria;
        }

        $resultado2->free_result();

        $codigo_puesto = NULL;

        $consulta = "SELECT codigo FROM puesto WHERE patente_puesto = ? AND codigo_usuario = ?";
        $resultado3 = mysqli_prepare($conexion, $consulta);

        if (!$resultado3) {
            echo "Error con resultado consulta: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_param($resultado3, "ss", $patente, $codigo_usuario);
        $ok = mysqli_stmt_execute($resultado3);

        if (!$ok) {
            echo "Error con ok: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_result($resultado3, $cod_puesto);
        while (mysqli_stmt_fetch($resultado3)) {
            $codigo_puesto = $cod_puesto;
        }
            
        $resultado3->free_result();
        
        $consulta = "UPDATE producto SET nombre = ?, codigo_tipo_categoria = ?, descripcion = ?, precio = ?, cantidad = ?, imagen = ?
        WHERE codigo_puesto = ?";
        $resultado = mysqli_prepare($conexion, $consulta);

        if (!$resultado) {
            echo "Error con resultado: ".mysqli_error($conexion);
        }

        $ok = mysqli_stmt_bind_param($resultado, "sisiisi", $nombre, $codigo_categoria, $descripcion, $precio, $cantidad, $imagen,$codigo_puesto);
        $ok = mysqli_stmt_execute($resultado);

        if (!$ok) {
            echo "Error con ok : ".mysqli_error($conexion);
        }

        header("Location: agregar-producto.php?moderr=FALSE");

    } else {
        header ("Location: agregar-producto.php?moderr=TRUE");
    }

?>