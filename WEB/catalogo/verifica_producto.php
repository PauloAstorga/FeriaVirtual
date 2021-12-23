<?php

    session_start();

    include '../../resources/php/db.php';

    try {

        $nombre = $_POST['nombre'];
        $categoria = $_POST['categoria'];
        $descripcion = $_POST['descripcion'];
        $precio = (int)($_POST['precio']);
        $cantidad = (int)$_POST['cantidad'];
        $imagen = $_POST['imagen_url'];
        $patente = $_POST['patente'];

        /*¿Datos validos?*/
        if (strlen($nombre)>30 or strlen($nombre)<3 or strlen($descripcion)>100 or strlen($descripcion<3)
        or $precio<0 or $precio>1000000 or $cantidad < 0 or $cantidad > 1000000 or strlen($imagen)>200
        or strlen($imagen)<3 or strlen($patente)>10 or strlen($patente)<2){

            $codigo_usuario = $_SESSION['codigo'];
            $codigo_puesto = NULL;

            $consulta = "SELECT codigo FROM puesto WHERE patente_puesto = ? AND codigo_usuario = ?";
            $resultado = mysqli_prepare($conexion, $consulta);

            if (!$resultado) {
                echo "Error con resultado consulta: ".mysqli_error($conexion);
            }

            $ok = mysqli_stmt_bind_param($resultado, "ss", $patente, $codigo_usuario);
            $ok = mysqli_stmt_execute($resultado);

            if (!$ok) {
                echo "Error con ok: ".mysqli_error($conexion);
            }

            $ok = mysqli_stmt_bind_result($resultado, $cod_puesto);
            while (mysqli_stmt_fetch($resultado)) {
                $codigo_puesto = $cod_puesto;
            }
            
            $resultado->free_result();

            $codigo_categoria = NULL;

            $select_categoria = "SELECT codigo FROM categoria WHERE tipo = ?";
            $resultado = mysqli_prepare($conexion,$select_categoria);

            if (!$resultado) {
                echo "Error con resultado: ".mysqli_error($conexion);
            }

            $ok = mysqli_stmt_bind_param($resultado, "s", $categoria);
            $ok = mysqli_stmt_execute($resultado);

            if (!$ok) {
                echo "Error con ok: ".mysqli_error($conexion);
            }

            $ok = mysqli_stmt_bind_result($resultado, $cod_categoria);
            while (mysqli_stmt_fetch($resultado)){
                $codigo_categoria = $cod_categoria;
            }

            $resultado->free_result();

            $insert = "INSERT INTO producto (codigo_tipo_categoria,nombre,descripcion,precio,imagen,cantidad,codigo_puesto)
            VALUES (?,?,?,?,?,?,?)";
            $resultado = mysqli_prepare($conexion, $insert);

            if (!$resultado) {
                echo "Error con resultado: ".mysqli_error($conexion);
            }

            $ok = mysqli_stmt_bind_param($resultado, "issisii", $codigo_categoria, $nombre, $descripcion, $precio, $imagen, $cantidad, $codigo_puesto);
            $ok = mysqli_stmt_execute($resultado);

            if (!$ok) {
                echo "Error con ok: ".mysqli_error($conexion);
            }

            header("Location: agregar-producto.php?error=FALSE");
        }
    } catch (Exception $e) {
        header("Location: agregar-producto.php?error=TRUE");
    }
    


?>