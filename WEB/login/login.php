<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../resources/css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/login.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/animations.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/hover.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
    <link rel="shortcut icon" type="image/x-icon" href="../../resources/images/logo_icono.ico" /> 
    <script src="../../resources/js/jquery-3.6.0.min.js"></script>

    <title>Feria Virtual</title>
</head>

<body id="body">
    <?php session_start();?>
    <header class="header" id="header">
        <nav class="nav container">
            
            <div class="nav__logo-container">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-list-ul"></i>
                </div>
                    
                <img alt="FeriaLogo" id="nav__image" class="nav__logo" src="../../resources/images/logo.png">
                <a href="../../index.php" class="nav__logo">Feria Virtual</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <h3 class="nav__title">
                    Feria Virtual
                </h3>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../../index.php" class="nav__link">
                            <i class="uil uil-home nav__icon"></i> Home
                        </a>
                    </li>

                    <li class="nav__item nav__opensubmenu">
                        <a href="#" class="nav__link">
                            <i class="uil uil-shop"></i> Catálogo <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subcatalogue">

                                <li class="nav__subitem">
                                    <a href="../catalogo/nuestros-productos.php" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Todos los Productos
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/frutos-secos.php" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Frutos Secos
                                    </a>
                                </li>
                                    
                                <li class="nav__subitem">
                                    <a href="../catalogo/frutas.php" class="nav__link">
                                        <i class="uil uil-wind-sun"></i> Frutas
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/verduras.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Verduras
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/carnes.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Carnes
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/varios.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Varios
                                    </a>
                                </li>
                            </ul>
                        </a>
                    </li>

                    <li class="nav__item nav__deliver">
                        <a href="#" class="nav__link">
                            <i class="uil uil-truck"></i> Entregas <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subdeliver">

                                <li class="nav__subitem">
                                    <a href="../entregas/nuestros-repartidores.html" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Repartidores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>

                <div class="user__info">
                    <?php
                    if (isset($_SESSION['nombre'])) { ?>
                        <div class="user_name">
                            <?php
                            echo "Nombre: ".$_SESSION['nombre'];
                            ?>
                        </div>

                        <div class="user_mail">
                            <?php
                            echo "Correo :".$_SESSION['correo'];
                            ?>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="back__button slide-in-right">
                <a href="../../index.php" id="back__button" class="nav__item back__link button">
                    <i class="uil uil-left-arrow-from-left"></i> Volver
                </a>
            </div>
            
        </nav>
    </header>

    <main class="main" id="main">
        
        <div class="form__container puff-in-ver" id="form-container">

            <div class="flip-card">
                <div class="flip-card-inner" id="flip-card-inner">
                    <!--Login Card-->
                    <div id="flip-login" class="flip-card-login">
                        <div class="login__title">
                            <h1 class="login__title-text">Login</h1>
                        </div>

                        <div class="error_msg">
                            <?php
                                if (isset($_GET['log'])){
                                    if ($_GET['log']=='FALSE') {
                                        echo '<h4 style="color:red">Credenciales Incorrectas</h4>';
                                    }
                                }
                            ?>
                        </div>

            
                        <form action="verifica_login.php" method="POST" class="form">
            
                            <label for="correo">Correo</label>
                            <div class="input__container">
                                <i class="uil uil-user"></i>
                                <input id="correo" name="correo" class="input" type="email" placeholder="mail@example.com">
                            </div>
            
                            <label for="contrasena">Contraseña</label>
                            <div class="input__container">
                                <i class="uil uil-key-skeleton-alt"></i>
                                <input id="contrasena" name="contrasena" class="input" type="password" placeholder="********">
                            </div>
            
                            <a href="#" id="recover-test log" class="login__link forgot-pwd">¿Olvidó su contraseña?</a>
            
                            <div class="input__container remember">
                                <input type="checkbox" id="remember" name="remember" class="checkbox-remember">
                                Recordar cuenta
                            </div>
            
                            <input id="conectarse" class="input submit-button" type="submit" value="Conectarse">
                        </form>
            
                        <div class="login__footer">
                            <span class="login__subtitle">O conectate utilizando</span>
                            <div class="login__social">
            
                                <ul class="login__list">
                                    <li class="login__item">
                                        <a href="#" target="_blank" class="login__link">
                                            <img class="login__social-image" alt="google logo" src="../../resources/images/social/g-login.png">
                                        </a>
                                    </li>
            
                                    <li class="login__item">
                                        <a href="#" target="_blank" class="login__link">
                                            <img class="login__social-image" alt="facebook logo" src="../../resources/images/social/f-login.png">
                                        </a>
                                    </li>
            
                                    <li class="login__item">
                                        <a href="#" target="_blank" class="login__link">
                                            <img class="login__social-image" alt="twitter logo" src="../../resources/images/social/t-login.png">
                                        </a>
                                    </li>
                                </ul>
                                
                            </div>
            
                            <a href="#" id="create-test log" class="login__link create-acc">Crea una cuenta</a>
                        </div>
                    </div>
                    <!--Recover Card-->
                    <div id="flip-recover" class="flip-card-recover">
                        <div class="login__title">
                            <h1 class="login__title-text">Recupera tu cuenta</h1>
                            <a id="login-test rec" class="login-back" href="#">
                            <i class="uil uil-left-arrow-from-left"></i> Volver
                            </a>
                        </div>
            
                        <form action="" method="POST" class="form">
            
                            <p class="recover__disclaimer">
                                Si la direccion de correo coincide con alguna registrada, enviaremos un enlace de recuperación de contraseña.
                            </p>
                            <label for="correo">Correo</label>
                            <div class="input__container">
                                <i class="uil uil-user"></i>
                                <input id="correo" class="input" type="email" placeholder="mail@example.com">
                            </div>
                            
                            <input id="conectarse" class="input submit-button" type="submit" value="Enviar">
                        </form>
                    </div>
                    <!--Create Card-->
                    <div id="flip-create" class="flip-card-create">
                        <div class="login__title">
                            <h1 class="login__title-text">¡Crea tu cuenta!</h1>
                            <a id="login-test cre" class="login-back" href="#">
                                <i class="uil uil-left-arrow-from-left"></i> Volver
                            </a>
                        </div>
            
                        <form action="crear_usuario.php" method="POST" class="form">
            

                            <label for="rut">Rut</label>
                            <div class="input__container">
                                <i class="uil uil-book-reader"></i>
                                <input required id="rut" name="rut" class="input" type="text" placeholder="Rut(solo con guion)">
                            </div>

                            <label for="nombre">Nombre</label>
                            <div class="input__container">
                                <i class="uil uil-elipsis-double-v-alt"></i>
                                <input required id="nombre" name="nombre" class="input" type="text" placeholder="Nombre">
                            </div>
            
                            <label for="apellido">Apellido</label>
                            <div class="input__container">
                                <i class="uil uil-document-layout-left"></i>
                                <input required id="apellido" name="apellido" class="input" type="text" placeholder="Apellido">
                            </div>
            
                            <label for="correo">Correo</label>
                            <div class="input__container">
                                <i class="uil uil-user"></i>
                                <input required id="correo" name="correo" class="input" type="email" placeholder="mail@example.com">
                            </div>
            
                            <label for="contrasenac">Contraseña</label>
                            <div class="input__container">
                                <i class="uil uil-key-skeleton-alt"></i>
                                <input required id="contrasenac" name="contrasenac" class="input" type="password" placeholder="********">
                            </div>
            
                            <label for="contrasena2c">Repita su Contraseña</label>
                            <div class="input__container">
                                <i class="uil uil-key-skeleton-alt"></i>
                                <input required id="contrasena2c" class="input" type="password" placeholder="********">
                            </div>

                            <div id="equalpwd"></div>
                            <script>
                                const pwd1 = document.getElementById('contrasenac'),
                                        pwd2 = document.getElementById('contrasena2c'),
                                        divPwd = document.getElementById('equalpwd')
                                
                                pwd1.addEventListener('click', ()=>{
                                    if (pwd1.value!=pwd2.value) {
                                    divPwd.style.color = "red";
                                    divPwd.innerHTML = "Las contraseñas no coinciden"
                                    } else {
                                        divPwd.style.color = "green";
                                        divPwd.innerHTML = "Las contraseñas coinciden :)"
                                    }
                                })

                                pwd2.addEventListener('click', ()=>{
                                    if (pwd1.value!=pwd2.value) {
                                    divPwd.style.color = "red";
                                    divPwd.innerHTML = "Las contraseñas no coinciden"
                                    } else {
                                        divPwd.style.color = "green";
                                        divPwd.innerHTML = "Las contraseñas coinciden :)"
                                    }
                                })
                                
                            </script>

                            <label for="telefono">Telefono</label>
                            <div class="input__container">
                                <i class="uil uil-phone"></i>
                                <input required id="telefono" name="telefono" class="input" type="text" placeholder="Telefono">
                            </div>

                            <?php

                                include '../../resources/php/db.php';

                                $numeroRegiones = NULL;
                                $numeroCiudades = NULL;
                                $numeroComunas = NULL;

                                $consulta_numero = "SELECT COUNT(codigo) AS 'cont' FROM region";
                                $resultado = mysqli_query($conexion, $consulta_numero);

                                if (!$resultado) {
                                    echo "Error con resultado: ".mysqli_error($conexion);
                                }

                                while ($fila = mysqli_fetch_row($resultado)) {
                                    $numeroRegiones=$fila[0];
                                }

                                $resultado->free_result();

                                $consulta_regiones = "SELECT nombre FROM region";
                                $consulta_ciudades = "SELECT nombre FROM ciudad";
                                $consulta_comunas = "SELECT nombre FROM comuna";
                                $consulta_tipo = "SELECT tipo FROM tipo_usuario WHERE codigo=1 OR codigo=4 OR codigo=5";

                                $resultado = mysqli_query($conexion, $consulta_regiones);

                                if (!$resultado) {
                                    echo "Error con resultado: ".mysqli_error($conexion);
                                }

                            ?>
                            <label for="">Region</label>
                            <div class="input__container">
                                <i class="uil uil-sign-alt"></i>
                                <select id="region" name="region" required>
                                    <option id="vacio" name="vacio">Seleccione una Región</option>
                                    <?php
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            ?>
                                            <option><?php echo "".$fila[0]; ?></option>
                                            <?php
                                        }
                                        $resultado->free_result();
                                    ?>
                                </select>
                            </div>
            
                            <label for="">Comuna</label>
                            <div class="input__container">
                                <i class="uil uil-sign-alt"></i>
                                <select id="comuna" name="comuna" required>
                                    <option id="vacio" name="vacio">Seleccione una Comuna</option>
                                    <?php
                                    $resultado = mysqli_query($conexion, $consulta_comunas);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            ?>
                                            <option><?php echo "".$fila[0]; ?></option>
                                            <?php
                                        }
                                        $resultado->free_result();
                                    ?>
                                </select>
                            </div>

                            <label for ="">Direccion</label>
                            <div class="input__container">
                                <i class="uil uil-compass"></i>
                                <input type="text" name="direccion" id="direccion" class="input" placeholder="Direccion">
                            </div>
            
                            <label for="">Tipo de Cuenta</label>
                            <div class="input__container">
                                <i class="uil uil-sign-alt"></i>
                                <select id="tipo_cuenta" name="tipo_cuenta">
                                    <option id="vacio" name="vacio">Seleccione Tipo</option>
                                    <?php
                                    $resultado = mysqli_query($conexion, $consulta_tipo);
                                        while ($fila = mysqli_fetch_row($resultado)) {
                                            ?>
                                            <option><?php echo "".$fila[0]; ?></option>
                                            <?php
                                        }
                                        $resultado->free_result();
                                    ?>
                                </select>
                            </div>
            
                            <input id="conectarse" class="input submit-button" type="submit" value="Crear Cuenta">
                        </form>
                        
                    </div>
                </div>
            </div>

            

        </div>

    </main>

    <footer class="footer">
        <div class="footer_bg">
            <div class="footer__container">

                <div class="footer__information">
                    <h1 class="footer__title">Feria Virtual</h1>
                    <span class="footer__subtitle">¡Un lugar para ti!</span>
                </div>

                <ul class="footer__links">
                    <li class="footer__item">
                        <a class="footer__link" href="#">
                            <i class="uil uil-keyhole-circle"></i> Politica de Privacidad
                        </a>
                    </li>

                    <li class="footer__item">
                        <a class="footer__link" href="#">
                            <i class="uil uil-comments"></i> Objetivo
                        </a>
                    </li>

                    <li class="footer__item">
                        <a class="footer__link" href="#">
                            <i class="uil uil-archway"></i> Socios
                        </a>
                    </li>

                </ul>

                <div class="footer__social">
                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-facebook social-ul-logo"></i>
                    </a>

                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-twitter social-ul-logo"></i>
                    </a>

                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-instagram-alt social-ul-logo"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="../../resources/js/jquery-3.6.0.min.js"></script>    
    <script src="../../resources/js/main.js"></script>
</body>
</html>