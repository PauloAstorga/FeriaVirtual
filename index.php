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
                                        <i class="uil uil-rainbow"></i> Todos los Productos
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/frutos-secos.php" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Frutos Secos
                                    </a>
                                </li>
                                    
                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/frutas.php" class="nav__link">
                                        <i class="uil uil-wind-sun"></i> Frutas
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/verduras.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Verduras
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/carnes.php" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Carnes
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="WEB/catalogo/varios.php" class="nav__link">
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
                                    <a href="#" class="nav__link">
                                        <i class="uil uil-parcel"></i> Orden de Seguimiento 
                                    </a>                                    
                                </li>

                                <li class="nav__subitem">
                                    <a href="#" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Proveedores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>

                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="nav__login bounce-in-top">
                <a href="WEB/login/login.php" id="login__button" class="nav__item button">
                    <i class="uil uil-user nav__login"></i> Conectarse
                </a>
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

            <section class="product__information">
                <!--La idea es sacar unos 6 productos de la BD al azar-->
                <div class="product__container">
                    <img class="product__image" alt="product-image" src="resources/images/maravilla.png">
                    <h3 class="product__title">Product Title</h3>
                    <p class="product_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus animi soluta amet itaque alias, quam labore expedita ducimus reiciendis ratione.</p>
                    <i class="uil uil-shopping-bag"></i> 1500 CLP
                </div>

                <div class="product__container">
                    <img class="product__image" alt="product-image" src="resources/images/maravilla.png">
                    <h3 class="product__title">Product Title</h3>
                    <p class="product_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus animi soluta amet itaque alias, quam labore expedita ducimus reiciendis ratione.</p>
                    <i class="uil uil-shopping-bag"></i> 1500 CLP
                </div>

                <div class="product__container">
                    <img class="product__image" alt="product-image" src="resources/images/maravilla.png">
                    <h3 class="product__title">Product Title</h3>
                    <p class="product_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus animi soluta amet itaque alias, quam labore expedita ducimus reiciendis ratione.</p>
                    <i class="uil uil-shopping-bag"></i> 1500 CLP
                </div>

                <div class="product__container">
                    <img class="product__image" alt="product-image" src="resources/images/maravilla.png">
                    <h3 class="product__title">Product Title</h3>
                    <p class="product_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus animi soluta amet itaque alias, quam labore expedita ducimus reiciendis ratione.</p>
                    <i class="uil uil-shopping-bag"></i> 1500 CLP
                </div>

                <div class="product__container">
                    <img class="product__image" alt="product-image" src="resources/images/maravilla.png">
                    <h3 class="product__title">Product Title</h3>
                    <p class="product_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus animi soluta amet itaque alias, quam labore expedita ducimus reiciendis ratione.</p>
                    <i class="uil uil-shopping-bag"></i> 1500 CLP
                </div>

                <div class="product__container">
                    <img class="product__image" alt="product-image" src="resources/images/maravilla.png">
                    <h3 class="product__title">Product Title</h3>
                    <p class="product_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus animi soluta amet itaque alias, quam labore expedita ducimus reiciendis ratione.</p>
                    <i class="uil uil-shopping-bag"></i> 1500 CLP
                </div>
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
            }, 3900)
            
            
        });
    </script>
</body>
</html>