<?php
    session_start();

    include '../../resources/php/db.php';

    $direccion = $_POST['direccion'];
    $patente = $_POST['patente'];
    $comuna = $_POST['comuna'];
    $region = $_POST['region'];

    $codigo_region = NULL;

    $select_region = "SELECT * FROM region WHERE nombre = ?";
    $resultado_region = mysqli_prepare($conexion, $select_region);

    if (!$resultado_region) {
        echo "Eror en resultado region: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado_region, "s", $region);
    $ok = mysqli_stmt_execute($resultado_region);

    if (!$ok) {
        echo "Error con ok region: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_result($resultado_region, $cod_region, $nom_region, $cod_pais);
    while (mysqli_stmt_fetch($resultado_region)) {
        $codigo_region = $cod_region;
    }

    $resultado_region->free_result();

    $codigo_comuna = NULL;

    $select_comuna = "SELECT * FROM comuna WHERE nombre = ?";
    $resultado_comuna = mysqli_prepare($conexion, $select_comuna);

    if (!$resultado_comuna) {
        echo "Error en resultado comuna :".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado_comuna, "s", $comuna);
    $ok = mysqli_stmt_execute($resultado_comuna);

    if (!$ok) {
        echo "Error con ok 2: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_result($resultado_comuna, $com_cod, $com_name, $com_region);
    while (mysqli_stmt_fetch($resultado_comuna)){
        /*No se puede ser de la region de Santiago y la comuna de Algarrobo*/
        if ($com_region!=$codigo_region) {
            echo "Region equivocada para la comuna";
            header ("Location: login.php?direrr='TRUE'");
        }
        $codigo_comuna = $com_cod;
    }

    $resultado_comuna->free_result();

    $codigo_tipo = NULL;

    $select_tipo = "SELECT * FROM tipo_usuario WHERE tipo = ?";
    $resultado_tipo = mysqli_prepare($conexion, $select_tipo);

    if (!$resultado_tipo) {
        echo "Error con resultado tipo: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado_tipo,"s", $tipocta);
    $ok = mysqli_stmt_execute($resultado_tipo);

    if (!$ok) {
        echo "Error con ok 3: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_result($resultado_tipo, $t_cod, $t_tipo);
    while (mysqli_stmt_fetch($resultado_tipo)) {
        if ($t_cod!=1 AND $t_cod!=4 AND $t_cod!=5) {/*No se permite la asignacion de otros tipos de usuario*/
            header("Location: login.php?hack='TRUE'");
        }
        $codigo_tipo = $t_cod;
    }
    
    $resultado_tipo->free_result();

    /*Crear direccion*/
    $insert_direccion = "INSERT INTO direccion (direccion,codigo_comuna)
    VALUES (?,?)";
    $resultado_direccion = mysqli_prepare($conexion, $insert_direccion);

    if (!$resultado_direccion) {
        echo "ERror con resultado direccion : ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado_direccion, "si", $direccion, $codigo_comuna);
    $ok = mysqli_stmt_execute($resultado_direccion);

    if (!$ok) {
        echo "Error con ok direccion: ".mysqli_error($conexion);
    }

    $resultado_direccion->free_result();

    $codigo_direccion = NULL;

    $select_direccion = "SELECT * FROM direccion WHERE direccion = ?";
    $resultado_direccion2 = mysqli_prepare($conexion, $select_direccion);

    if (!$resultado_direccion2){
        echo "Error con resultado direccion select: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado_direccion2, "s", $direccion);
    $ok = mysqli_stmt_execute($resultado_direccion2);

    if (!$ok) {
        echo "Error con ok direccion select: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_result($resultado_direccion2, $dir_cod, $dir_dir, $dir_comuna);
    while (mysqli_stmt_fetch($resultado_direccion2)){
        $codigo_direccion = $dir_cod;
    }

    $resultado_direccion2->free_result();

    $fecha = strval(date('Y-m-d'));
    $codigo_usuario = $_SESSION['codigo'];
    $insert_puesto = "INSERT INTO puesto (fecha_funcionamiento,patente_puesto,codigo_direccion,codigo_usuario)
    VALUES(?,?,?,?)";
    $resultado = mysqli_prepare($conexion, $insert_puesto);

    if (!$resultado) {
        echo "Error con resultado puesto: ".mysqli_error($conexion);
    }

    $ok = mysqli_stmt_bind_param($resultado,"ssii", $fecha, $patente, $codigo_direccion, $codigo_usuario);
    $ok = mysqli_stmt_execute($resultado);

    if (!$ok) {
        echo "Error con ok: ".mysqli_error($conexion);
    }

    header("Location: miperfil.php");
?>