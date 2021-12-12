<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" type="text/css" href="../../resources/css/estilos.css" />
    <link rel="stylesheet" type="text/css" href="../../resources/css/productos.css" />
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v3.0.6/css/line.css" />
    <link rel="shortcut icon" type="image/x-icon" href="../../resources/images/logo_icono.ico" /> 
    <script src="../../resources/js/jquery-3.6.0.min.js"></script>

    <title>Feria Virtual</title>
</head>

<body>
    
    <header class="header" id="header">
        <nav class="nav container">
            
            <div class="nav__logo-container">
                <img alt="FeriaLogo" id="nav__image" class="nav__logo" src="../../resources/images/logo.png">
                    <a href="#" class="nav__logo">Feria Virtual</a>
            </div>

            <div class="nav__menu">
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../../index.html" class="nav__link">
                            <i class="uil uil-home nav__icon"></i> Home
                        </a>
                    </li>

                    <li class="nav__item nav__opensubmenu">
                        <a href="#" class="nav__link">
                            <i class="uil uil-shop"></i> Catálogo
                            <ul class="nav__sublist nav__subcatalogue">
                                <li class="nav__subitem">
                                    <a href="#" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Frutos Secos
                                    </a>
                                </li>
                                    
                                <li class="nav__subitem">
                                    <a href="aceitunas.html" class="nav__link">
                                        <i class="uil uil-wind-sun"></i> Frutas
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="verduras.html" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Verduras
                                    </a>
                                </li>
                            </ul>
                        </a>
                    </li>

                    <li class="nav__item nav__deliver">
                        <a href="#" class="nav__link">
                            <i class="uil uil-truck"></i> Entregas
                            <ul class="nav__sublist nav__subdeliver">
                                <li class="nav__subitem">
                                    <a href="../entregas/orden-seguimiento.html" class="nav__link">
                                        <i class="uil uil-parcel"></i> Orden de Seguimiento
                                    </a>                                    
                                </li>

                                <li>
                                    <a href="../entregas/nuestros-proveedores.html" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Proveedores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>
            </div>

            <div class="nav__login">
                <a href="../login/login.html" id="login__button" class="nav__item button">
                    <i class="uil uil-user nav__login"></i> Conectarse
                </a>
                
                <a href="../login/crear-cuenta.html" id="login__button" class="nav__item button">
                    <i class="uil uil-user-plus nav__create"></i> Crear Cuenta
                </a>

                <div class="nav__login-responsive">
                    <form action="" class="form">
                        <input class="input" type="email" placeholder="Correo">
                        <input class="input" type="password" placeholder="******">
                        <input class="input" type="submit" value="Conectarse">
                        <a class="login-link" href="../login/crear-cuenta.html">Crear Cuenta</a>
                        <a class="login-link" href="../login/recuperar-cuenta.html">Recuperar Contraseña</a>
                    </form>
                </div>
            </div>
            
        </nav>
    </header>

    <main class="main">
        <h1>Frutos secos(este titulo es temporal)</h1>
        <section class="main__container">
            <!--Cada uno de estos se saca de la bd-->
            <div class="product__row">
                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>

                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>

                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>

                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>
            </div>

            <div class="product__row">
                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>

                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>

                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>

                <div class="product__container producto">
                    <div class="product__image">
                        <img id="imagen" class="product-image" alt="imagen producto"" src="../../resources/images/productos/aceitunas/almendras.png">
                    </div>
                    <div class="product__content">
                        <h2 class="product__title">Aceituna 1</h2>
                        <span class="product__subtitle">$ Precio 1</span>
                        <p class="product__description">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptates veniam hic deleniti, in sequi quam.
                        </p>
                    </div>                
                </div>
            </div>

            <!---->

        </section>

    </main>

    <footer class="footer">
        <div class="footer_bg">
            <div class="footer__container">

                <div class="footer__information">
                    <h1 class="footer__title">Feria Virtual</h1>
                    <span class="footer__subtitle">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eligendi saepe dolorum quae voluptatibus iure molestias?</span>
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
                        <i class="uil uil-facebook"></i>
                    </a>

                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-twitter"></i>
                    </a>

                    <a href="#" class="footer__social-link" target="_blank">
                        <i class="uil uil-instagram-alt"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
    <script src="../resources/js/main.js"></script>
</body>
</html>