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
    
    <header class="header" id="header">
        <nav class="nav container">
            
            <div class="nav__logo-container">
                <div class="nav__toggle" id="nav-toggle">
                    <i class="uil uil-list-ul"></i>
                </div>
                    
                <img alt="FeriaLogo" id="nav__image" class="nav__logo" src="../../resources/images/logo.png">
                <a href="#" class="nav__logo">Feria Virtual</a>
            </div>

            <div class="nav__menu" id="nav-menu">
                <h3 class="nav__title">
                    Feria Virtual
                </h3>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="../../index.html#home" class="nav__link">
                            <i class="uil uil-home nav__icon"></i> Home
                        </a>
                    </li>

                    <li class="nav__item nav__opensubmenu">
                        <a href="#" class="nav__link">
                            <i class="uil uil-shop"></i> Catálogo <i class="uil uil-arrow-right"></i>
                            <ul class="nav__sublist nav__subcatalogue">
                                <li class="nav__subitem">
                                    <a href="../catalogo/frutos_secos.html" class="nav__link">
                                        <i class="uil uil-rainbow"></i> Frutos Secos
                                    </a>
                                </li>
                                    
                                <li class="nav__subitem">
                                    <a href="../catalogo/frutas.html" class="nav__link">
                                        <i class="uil uil-wind-sun"></i> Frutas
                                    </a>
                                </li>

                                <li class="nav__subitem">
                                    <a href="../catalogo/verduras.html" class="nav__link">
                                        <i class="uil uil-cloud-showers-heavy"></i> Verduras
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
                                    <a href="../entregas/orden-seguimiento.html" class="nav__link">
                                        <i class="uil uil-parcel"></i> Orden de Seguimiento 
                                    </a>                                    
                                </li>

                                <li class="nav__subitem">
                                    <a href="../entregas/nuestros-proveedores.html" class="nav__link">
                                        <i class="uil uil-truck"></i> Nuestros Proveedores
                                    </a>                                    
                                </li>
                            </ul>
                        </a>
                    </li>
                </ul>

                <i class="uil uil-times nav__close" id="nav-close"></i>
            </div>

            <div class="back__button slide-in-right">
                <a href="../../index.html" id="back__button" class="nav__item back__link button">
                    <i class="uil uil-left-arrow-from-left"></i> Volver
                </a>
            </div>
            
        </nav>
    </header>

    <main class="main swirl-in-fwd" id="main">

        <div class="form__container" id="form-container">

            <div class="login__title">
                <h1 class="login__title-text">Login</h1>
            </div>

            <form actioN="" class="form">

                <label for="correo">Correo</label>
                <div class="input__container">
                    <i class="uil uil-user"></i>
                    <input id="correo" class="input" type="email" placeholder="mail@example.com">
                </div>

                <label for="contrasena">Contraseña</label>
                <div class="input__container">
                    <i class="uil uil-key-skeleton-alt"></i>
                    <input id="contrasena" class="input" type="password" placeholder="********">
                </div>

                <a href="recuperar-cuenta.html" id="forgot-pwd" class="login__link forgot-pwd">¿Olvidó su contraseña?</a>

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

                <a href="crear-cuenta.html" id="create-acc" class="login__link create-acc">Crea una cuenta</a>
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