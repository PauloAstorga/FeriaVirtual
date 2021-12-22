<?php

    include '../../resources/php/db.php';

    $email = $_POST['correo'];
    $phone = $_POST['telefono'];
    $rut = $_POST['rut'];

    $pwd = md5($_POST['contrasenac']);
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $region = $_POST['region'];
    $comuna = $_POST['comuna'];
    $direccion = $_POST['direccion'];
    $tipocta = $_POST['tipo_cuenta'];
/*
    echo "<br>Email :".$email;
    echo "<br>Phone :".$phone;
    echo "<br>Rut :".$rut;

    echo "<br>Pwd: ".$pwd;
    echo "<br>Nombre: ".$nombre;
    echo "<br>Apellido: ".$apellido;
    echo "<br>Region: ".$region;
    echo "<br>Direccion: ".$direccion;
    echo "<br>Comuna :".$comuna;
    echo "<br> Tipo Cta: ".$tipocta;
*/
    $consulta = "SELECT * FROM usuario WHERE correo = ? OR telefono = ? OR rut = ?";
    $resultado = mysqli_prepare($conexion, $consulta);

    if (!$resultado) {
        echo "<br> Error con resultado <br>";
    }

    $ok = mysqli_stmt_bind_param($resultado, "sss", $email, $phone, $rut);
    $ok = mysqli_stmt_execute($resultado);

    if (!$ok){
        echo "<br>Error con ok <br>";
    } else {

        $ok = mysqli_stmt_bind_result($resultado,$cod, $dni, $nam, $ap, $cor, $tel, $con, $dir, $tip);
        while (mysqli_stmt_fetch($resultado)){
            echo "Se repite :)";
            header("Location: login.php?dupl='TRUE'");
        }
        echo "No se repite";        
        
        if ($cor) { /*Si los resultados ya existen dentro de la BD, pasa aqui,
            esto implica que ya existe un usuario con dichos datos y por tanto hay que
            mandar un mensaje de error y no crear nada.*/
            printf ("<br>Existe al menos uno <br> %s ,%s, %s\n", $email, $phone,$rut);

        } else { /*No existen dentro de los registros y hay que crear todo :D*/
            $resultado -> free_result();

            if (strlen($rut)>15 or strlen($rut)<9 or strlen($nombre)>25 or strlen($nombre)<2 or strlen($apellido)>25
            or strlen($apellido) <2 or strlen($email)>50 or strlen($email)<5 or strlen($phone)>10 or strlen($phone)<8
            or strlen($pwd)>255 or strlen($pwd)<4 or strlen($direccion)>100 or strlen($direccion)<4  or strpos($comuna,"Seleccion") !== false
            or strpos($region, "Seleccion") !== false or strpos($tipocta, "Seleccion") !== false   
            ) {/*Validacion de datos acordes a la BD*/
                header("Location: login.php?err='TRUE'");
            } else {

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

                /*Insert de usuario*/
                $insert_user = "INSERT INTO usuario (rut,nombre,apellido,correo,telefono,contrasena,codigo_direccion,codigo_tipo_usuario)
                VALUES (?,?,?,?,?,?,?,?)";
                $resultado_user = mysqli_prepare($conexion, $insert_user);

                if (!$resultado_user) {
                    echo "Error con resultado user: ".mysqli_error($conexion);; /*Lo cual no deberia de pasar pq ya se verificaron todas las cosas posibles*/
                }

                $ok = mysqli_stmt_bind_param($resultado_user,"ssssssii", $rut, $nombre, $apellido, $email, $phone, $pwd, $codigo_direccion, $codigo_tipo);
                $ok = mysqli_stmt_execute($resultado_user);

                if (!$ok) {
                    echo "Error con ok user: ".mysqli_error($conexion);
                }

                $codigo_usuario = NULL;

                $select_user = "SELECT codigo FROM usuario WHERE correo = ?";
                $resultado_user2 = mysqli_prepare($conexion, $select_user);

                if (!$resultado_user2) {
                    echo "Error resultado user 2:".mysqli_error($conexion);
                }

                $ok = mysqli_stmt_bind_param($resultado_user2, "s", $email);
                $ok = mysqli_stmt_execute($resultado_user2);

                if (!$ok) {
                    echo "Error con ok:".mysqli_error($conexion);
                }

                $ok = mysqli_stmt_bind_result($resultado_user2, $u_cod);
                while (mysqli_stmt_fetch($resultado_user2)) {
                    $codigo_usuario = $u_cod;
                }

                $resultado_user2->free_result();

                /*Creamos la cuenta del usuario ya registrado*/
                $insert_cuenta = "INSERT INTO cuenta (dinero,codigo_usuario)
                VALUES (?,?)";
                $resultado_cuenta = mysqli_prepare($conexion, $insert_cuenta);

                if (!$resultado_cuenta) {
                    echo "Error con resultado cuenta: ".mysqli_error($conexion);
                }

                $dinero_inicial = 0;

                $ok = mysqli_stmt_bind_param($resultado_cuenta, "di", $dinero_inicial, $codigo_usuario);
                $ok = mysqli_stmt_execute($resultado_cuenta);

                if (!$ok) {
                    echo "Error con ok: ".mysqli_error($conexion);
                }

                mysqli_close($conexion);
                header("Location: ../../index.php?create='TRUE'");
            }


        
        }
    }
    
    
?>