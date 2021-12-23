<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="resources/css/estilos.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/loading-screen2.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/animations.css" />
    <link rel="stylesheet" type="text/css" href="resources/css/hover.css" />
    <link rel="shortcut icon" type="image/x-icon" href="resources/images/logo_icono.ico" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> 
    <script src="resources/js/vue.min.js"></script>

    <title>Feria Virtual</title>
</head>

<body id="body">
    <?php session_start(); ?>
    <header class="header" id="header">
        <nav class="nav container">
            
            <div class="nav__logo-container">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-list-ul"></i>
                </div>
                    
                <img alt="FeriaLogo" id="nav__image" class="nav__logo" src="resources/images/logo.png">
                <a href="#" class="nav__logo">Feria Virtual</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <h3 class="nav__title">
                    Feria Virtual
                </h3>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="#" class="nav__link">
                            <i class="uil uil-home nav__icon"></i> Home
                        </a>
                    </li>

                    <li class="nav__item nav__opensubmenu">
                        <a href="#" class="nav__link">
                            <i class="uil uil-shop"></i> Catálogo <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subcatalogue">

                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/nuestros-productos.php" class="nav__link">
                                        <i class="uil uil-postcard"></i> Todos los Productos
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/buscador.php" class="nav__link">
                                        <i class="uil uil-search"></i> Buscador
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
                                    <a href="WEB/entregas/nuestros-repartidores.php" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Repartidores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>


                    <?php
                        if (isset($_SESSION['log'])) {
                    ?>
                            <li class="nav__item nav__account">
                                <a href="WEB/pago/transacciones.php" class="nav__link">
                                    <i class="uil uil-analytics"></i> Cuenta
                                </a>
                            </li>
                    <?php
                        }
                    ?> 
                    

                    <?php
                        if (isset($_SESSION['nombre'])) {
                            $cod_tipo = $_SESSION['cod_tipo_usuario'];
                            if ($cod_tipo == 4) {
                                echo '<li class="nav__item nav__vendor">';
                                echo '<a href="WEB/catalogo/agregar-producto.php" class="nav__link">';
                                echo '<i class="uil uil-clipboard-notes"></i> Productos';
                                echo "</a>";
                                echo "</li>";
                            }
                        }
                    ?>
                </ul>

                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="log_buttons">
            <?php
                if (isset($_SESSION['log'])) {
                    ?>
                    
                    <a id="login__button" class="nav__item button bounce-in-top" href="WEB/login/logout.php">
                    <i class="uil uil-signout"></i>Logout</a>
                    <div class="nav__login bounce-in-top">
                        <a href="WEB/perfil/miperfil.php" id="login__button profile_button" class="nav__item button">
                        <i class="uil uil-user-circle"></i> Perfil
                        </a>
                    </div>
                <?php
                } else {?>
                    <div class="nav__login bounce-in-top">
                        <a href="WEB/login/login.php" id="login__button log_button" class="nav__item button">
                            <i class="uil uil-user nav__login"></i> Conectarse
                        </a>
                    </div>
                <?php
                }
            ?>
            </div>
        </nav>
    </header>

    <main class="main" id="main">

        <!--Aside con redes sociales-->
        <aside class="main__aside" id="main-aside">
            <div class="eye__trail"></div>
            <i id="show-aside" class="uil uil-eye"></i>
            <i id="hide-aside" class="uil uil-eye-slash"></i>
            <ul class="main__list">
                <li class="main__item facebook">
                    <a href="#" class="main__link">
                        <i class="fa fa-facebook fa-2x" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="main__item instagram">
                    <a href="#" class="main__link">
                        <i class="fa fa-instagram fa-2x" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="main__item twitter">
                    <a href="#" class="main__link">
                        <i class="fa fa-twitter fa-2x" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="main__item google">
                    <a href="#" class="main__link">
                        <i class="fa fa-google fa-2x" aria-hidden="true"></i>
                    </a>
                </li>

                <li class="main__item whatsapp">
                    <a href="#" class="main__link">
                        <i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i>
                    </a>
                </li>
                
            </ul>
        </aside>
        <!--Banner-->
        <section class="main__banner">
            <div class="carousel__banner fade">
                <img class="banner__image" alt="banner" src="resources/images/banner/fondologin.jpg">
                <div class="banner__text">
                    Descripcion 1
                </div>
            </div>

            <div class="carousel__banner fade">
                <img class="banner__image" alt="banner" src="resources/images/banner/frutos secos.jpg">
                <div class="banner__text">
                    Descripcion 2
                </div>
            </div>
        </section>

        <!--Informacion del home-->
        <section class="main__information">

            <section class="home__information">
                <img class="home-logo" alt="logo" src="resources/images/logo.png">
                <div class="home-info-container">
                    <h1 class="home__title tracking-in-contract-bck">Feria Virtual</h1>
                    <p class="home__paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. Et ab sed, necessitatibus sunt perspiciatis recusandae mollitia vitae blanditiis quis. Quam autem eaque rerum doloremque consequuntur hic harum delectus soluta. Commodi vel voluptates harum provident? Dolorem eos porro maiores earum! Pariatur suscipit magni vel tempore aliquam cum provident cupiditate ipsam quibusdam.</p>
                </div>
            </section>

            
            <section class="item__information">
                <h3 class="item_first_title">¡Nuestros Productos!</h3>
                <!--La idea es sacar unos 6 productos de la BD al azar-->
                <?php
                    include 'resources/php/db.php';
                    $consulta = "SELECT * FROM producto ORDER BY RAND() LIMIT 4";
                    $resultado = mysqli_query($conexion, $consulta);

                    while ($fila = mysqli_fetch_row($resultado)) {?>

                        <div class="item__container">

                            <div class="item_image-container">
                                <img class="item_image" alt="producto" src="<?php echo "".$fila[5]; ?>">
                            </div>

                            <div class="item_content">
                                <h3 class="item_name"><?php echo "".$fila[2]; ?></h3>
                                <p class="item_description"><?php echo "".$fila[3] ?></p>
                                <i class="uil uil-shopping-bag"></i> CLP <?php echo "".$fila[4]; ?>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                
                <!---->
            </section>
                
        </section>

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

    <!--Loading Screen-->
    <div class="basket">
        <div class="apple"></div>

        <div class="orange"></div>

        <div class="cherry cherry1"></div>
        <div class="cherry cherry2"></div>
    </div>
    <!---->
    <script src="resources/js/jquery-3.6.0.min.js"></script>
    <script src="resources/js/slide.js"></script>   
    <script src="resources/js/main.js"></script>
    <script>
        $(window).on("load",function(){
            setTimeout( function(){
                $('#body').css({'background':'var(--body-color)'});
                $('.header').css({'display':'block'});
                $('.main').css({'display':'block'});
                $('.footer').css({'display':'block'});
                $('.basket').css({'display':'none'})
            }, 3)
        });
    </script>
</body>
</html>