<?php
    include('connection.php');

    function seoUrl($string){
        $string = strtolower($string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }

    mysqli_set_charset ($connect, "utf8");
    date_default_timezone_set('America/Mexico_City');

    $queryGallery = "Select galeria_ID, galeria_titulo, galeria_servicio, galeria_imagen from galeria order by galeria_ID desc";
    $resultGallery = mysqli_query($connect, $queryGallery);
    $contGall = 0;

    $queryBlog = "Select blog_ID as ID, blog_titulo, blog_thumbnail, blog_contenido, blog_fecha, usuarios_name from blog inner join usuarios on blog_autor = usuarios_ID order by ID desc";
    $resultBlog = mysqli_query($connect, $queryBlog);
    $contBlog = 0;
?>
<!DOCTYPE html>
<html class="no-js" lang="es">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143184290-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-143184290-2');
        </script>

        <title>Milla 83 | Autoboutique</title>

        <link rel="canonical" href="https://milla83.com">

        <meta charset="utf-8">
        <meta name="theme-color" content="#000" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="André Vital">
        <meta name="description" content="Milla 83 es una empresa dedicada a la personalización automotriz  ubicados en Aguascalientes, Ags. México. Contamos con certificación de las marcas lideres en Wrap, PPF y Detallado automotriz.">

        <meta property="og:site_name" content="Milla 83">
        <meta property="og:title" content="Milla 83 | Autoboutique"/>
        <meta property="og:type" content="website"/>
        <meta property="og:url" content="https://milla83.com"/>
        <meta property="og:image" content="https://milla83.com/assets/img/sitess.jpg" />
        <meta property="og:description" content="Milla 83 es una empresa dedicada a la personalización automotriz  ubicados en Aguascalientes, Ags. México. Contamos con certificación de las marcas lideres en Wrap, PPF y Detallado automotriz." />

        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="https://milla83.com">
        <meta property="twitter:title" content="Milla 83 | Autoboutique">
        <meta property="twitter:description" content="Milla 83 es una empresa dedicada a la personalización automotriz  ubicados en Aguascalientes, Ags. México. Contamos con certificación de las marcas lideres en Wrap, PPF y Detallado automotriz.">
        <meta property="twitter:image" content="https://milla83.com/assets/img/sitess.jpg">
        <meta name="twitter:image:alt" content="Milla 83 | Autoboutique">

        <!-- Favicons -->
        <link rel="icon" href="assets/img/favicon.ico">
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <link rel="apple-touch-icon" href="assets/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">

        <!-- CSS -->
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/justified-gallery.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="assets/revolution/css/settings.css" media="screen">
        <link rel="stylesheet" type="text/css" href="assets/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="assets/revolution/css/navigation.css">
        <link rel="stylesheet" href="assets/css/bootsnav.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/custom.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css">

        <!-- Icons -->
        <link rel="stylesheet" href="assets/css/et-line-icons.css">
        <link rel="stylesheet" href="assets/css/themify-icons.css">
        <link rel="stylesheet" href="assets/css/all.min.css">

        <!--[if IE]>
            <script src="assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navbar -->
        <header>
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-dark background-transparent nav-box-width white-link padding-four-lr menu-logo-center navbar-expand-lg">
                <div class="container nav-header-container">
                    <div class="center-logo">
                        <a href="index" title="Milla 83" class="logo">
                            <img src="assets/img/logo_white.svg" data-rjs="assets/images/custom/logo.svg" alt="Logo" class="logo-light logo-display default">
                        </a>
                    </div>

                    <div class="col col-lg-12 accordion-menu">
                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#navbar-collapse-toggle-1">
                            <span class="sr-only">toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                        <div class="navbar-collapse collapse justify-content-between" id="navbar-collapse-toggle-1">
                            <ul class="nav navbar-nav alt-font text-normal width-45 md-width-100 sm-text-center justify-content-end nav-l" data-in="fadeIn" data-out="fadeOut">
                                <li><a href="#inicio" title="Inicio" class="inner-link highlight-color">Inicio</a></li>
                                <li><a href="acerca-de" title="Acerca de">Acerca de</a></li>
                                <li><a href="servicios" title="Servicios">Servicios</a></li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right no-margin alt-font text-normal width-45 md-width-100 sm-text-center justify-content-start nav-r" data-in="fadeIn" data-out="fadeOut">
                                <li><a href="galeria" title="Galeria">Galeria</a></li>
                                <li><a href="blog" title="Blog">Blog</a></li>
                                <li><a href="contacto" title="Contacto">Contacto</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto pr-0 text-right">
                        <div class="header-social-icon d-none d-md-inline-block">
                            <a href="https://api.whatsapp.com/send?phone=5214494690450" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                            <a href="https://www.instagram.com/milla83.autoboutique/" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        <!-- Inicio -->
        <section class="no-padding height-100 wow fadeIn" id = "inicio">
            <div class="height-100 width-100 black-move">
                <div class="cover-background">
                    <div class="opacity-extra-medium bg-extra-dark-gray z-index-0"></div>
                    <div class="container position-relative full-screen">
                        <div class="col-md-12 slider-typography text-center text-md-left sm-no-padding-lr">
                            <div class="slider-text-middle-main sm-padding-ten-top sm-padding-15px-lr">
                                <div class="slider-text-middle">
                                    <h1 class="alt-font text-white-2 font-weight-700 letter-spacing-minus-1 line-height-80 width-55 margin-35px-bottom lg-width-60 md-width-70 lg-line-height-auto sm-width-100 sm-margin-15px-bottom">Amor por lo que hacemos y pasión por los autos</h1>
                                    <div class="btn-dual">
                                        <a href="servicios" class="btn btn-white btn-rounded btn-small no-margin-lr">Cotiza tu servicio</a>
                                        <a href="#galeria" class="btn btn-transparent-white btn-rounded btn-small margin-20px-lr sm-margin-5px-top inner-link">Ver galería</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Mini Portafolio -->
        <section class="bg-light-gray wow fadeIn" id = "galeria">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-md-6 margin-five-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center">
                        <div class="alt-font text-medium-gray margin-5px-bottom text-uppercase text-small">Proyectos previos</div>
                        <h5 class="alt-font text-extra-dark-gray font-weight-600 mb-0">Algunos de nuestros útlimos trabajos</h5>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 p-0 sm-padding-15px-lr">
                        <div class="row hover-option4 blog-post-style3 galleryPreviews justify-content-center">
                            <?php
                                while(($rowGallery = mysqli_fetch_array($resultGallery)) && $contGall < 8) {
                                    $delay = ($contGall % 4) * 2;
                                    $services = preg_replace('/[,]+/', ' / ', trim($rowGallery[2]));
                                    $gal = "<div class='grid-item col-12 col-md-4 col-lg-3 margin-10px-tb text-center wow fadeInUp' data-src='$rowGallery[3]' data-sub-html='$rowGallery[1] | $services' data-wow-delay='0.".$delay."s'><div class='blog-post bg-light-gray'><div class='blog-post-images overflow-hidden position-relative'><a href='#'><img src='$rowGallery[3]' alt='$rowGallery[1] | $services'><div class='blog-hover-icon'><span class='text-medium font-weight-300'><i class='far fa-eye'></i></span></div></a></div><div class='post-details padding-15px-all'><a href='#' class='alt-font post-title text-large text-extra-dark-gray w-100 d-block' title='$rowGallery[1] | $services'>$rowGallery[1]</a><p class='m-0'>$services</p></div></div></div>";
                                    echo $gal;
                                    $contGall++;
                                }
                            ?>
                        </div>
                    </div>
                    <div class="col-12 col-md-10 p-5 text-center">
                        <a href="galeria" class="btn btn-deep-pink btn-rounded btn-small no-margin-lr wow zoomIn">Ver la galeria completa</a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Blog -->
        <section class="wow fadeIn" id = "blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-xl-5 col-md-6 margin-eight-bottom md-margin-40px-bottom sm-margin-30px-bottom text-center">
                        <div class="alt-font text-medium-gray margin-5px-bottom text-uppercase text-small">Últimas publicaciones</div>
                        <h5 class="alt-font text-extra-dark-gray font-weight-600 mb-0">Contenido generado para amantes de los autos</h5>
                    </div>
                </div>
                <div class="row hover-option4 blog-post-style3 justify-content-center">
                    <?php
                        while(($rowBlog = mysqli_fetch_array($resultBlog)) && $contBlog < 3) {
                            $title = seoUrl($rowBlog[1]);
                            $delay = $contBlog * 2;

                            $content = strstr($rowBlog[3], '<p>');
                            $content = explode("</p>", $content);
                            $content = substr($content[0], 0, 100);
                            $pos = strpos($content, '<', strpos($content, '<') + 1);
                            if($pos) $content = substr($content, 0, $pos);
                            $content .= "...</p>";

                            $date = explode('-',$rowBlog[4]);
                            $date = "$date[2] - $date[1] - $date[0]";

                            $blog = "<div class='grid-item col-12 col-md-6 col-lg-4 margin-30px-bottom text-center text-md-left wow fadeInUp' data-wow-delay='0.".$delay."s'><div class='blog-post bg-light-gray'><div class='blog-post-images overflow-hidden position-relative'><a href='post/$rowBlog[0]/$title'><img src='$rowBlog[2]' alt='$rowBlog[1]'><div class='blog-hover-icon'><span class='text-extra-large font-weight-300'>+</span></div></a></div><div class='post-details padding-40px-all md-padding-20px-all'><a href='post/$rowBlog[0]/$title' class='alt-font post-title text-medium text-extra-dark-gray w-100 d-block lg-width-100 margin-15px-bottom'>$rowBlog[1]</a>$content<div class='separator-line-horrizontal-full bg-medium-gray margin-20px-tb'></div><div class='author'><span class='text-medium-gray text-uppercase text-extra-small d-xl-inline-block d-block md-margin-10px-top'>por $rowBlog[5]&nbsp;&nbsp;|&nbsp;&nbsp;$date</span></div></div></div></div>";
                            echo $blog;
                            $contBlog++;
                        }
                    ?>
                </div>
                <div class="row justify-content-center padding-six-top">
                    <a href="blog" class="btn btn-deep-pink btn-rounded btn-small no-margin-lr wow zoomIn">Ver más publicaciones</a>
                </div>
            </div>
        </section>

        <!-- Subscribe Pop-Up -->
        <a class="popup-with-zoom-anim" href="#subscribe_modal" id = "subscribe_caller"></a>

        <div id="subscribe_modal" class="zoom-anim-dialog mfp-hide col-md-6 col-11 mx-auto bg-extra-dark-gray text-center modal-popup-main padding-50px-all">
            <h4 class="font-weight-300 text-white-2 margin-20px-bottom sm-margin-15px-bottom alt-font">¡Suscríbete!</h4>
            <p class="text-medium width-70 mx-auto margin-40px-bottom sm-width-100 sm-margin-15px-bottom">Recibe las mejores ofertas y las últimas noticias del mundo automovilístico</p>
            <form class="search-box2 row justify-content-center" id="subscribenewsletterform2" action="javascript:void(0)" method="post">
                <div id="success-subscribe-newsletter2" class="mx-0 col-12 col-md-8" style="display: none;"></div>
                <div class="input-group add-on width-75 mx-auto sm-width-100 col-12 col-md-10">
                    <input name="subscribeEmail" id="subscribeEmail" type="email" placeholder="Ingresa tu correo electrónico" class="form-control">
                    <div class="input-group-append">
                        <button id="button-subscribe-newsletter2" type="submit" class="btn btn-default"><i class="ti-angle-right text-small m-0"></i></button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <footer class="footer-strip-dark bg-black padding-50px-tb sm-padding-30px-tb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center text-lg-left sm-margin-20px-bottom">
                        <a href="index"><img class="footer-logo" src="assets/img/logo_white.svg" alt="Milla 83"></a>
                    </div>
                    <div class="col-md-6 text-center text-small-medium sm-margin-10px-bottom">
                        &copy; 2020 <strong>Milla 83</strong>. Desarrollo por <a href="https://andrevital.com/" target="_blank" title="André Vital"><strong>André Vital</strong></a>.
                    </div>
                    <div class="col-md-3 text-center text-lg-right">
                        <div class="elements-social social-icon-style-10 vertical-align-middle">
                            <ul class="small-icon mb-0">
                                <li><a class="facebook text-white-2" href="https://www.facebook.com/Milla83autoboutique/" target="_blank"><i class="fab fa-facebook-f" aria-hidden="true"></i><span></span></a></li>
                                <li><a class="instagram text-white-2" href="https://www.instagram.com/milla83.autoboutique/" target="_blank"><i class="fab fa-instagram mr-0" aria-hidden="true"></i><span></span></a></li>
                                <li><a class="youtube text-white-2" href="https://www.youtube.com/channel/UCGLbtmsKKlYqt_Z-uGPtNCA" target="_blank"><i class="fab fa-youtube"></i><span></span></a></li>
                                <li><a class="whatsapp text-white-2" href="https://api.whatsapp.com/send?phone=5214494690450" target="_blank"><i class="fab fa-whatsapp"></i><span></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <div class="bookingWidget">
            <div class="bWButton">
                <i class="fal fa-calendar-alt"></i>
            </div>
            <div class="bWContainer">
                <div id="bookingInput">
                    <div style="overflow:hidden;">
                        <div class="form-group">
                            <div class="row justify-content-center">
                                <form action="assets/email-templates/bookingAppointment.php" method="post" class="bookingAppoint">
                                    <div class="col-md-12">
                                        <div class="bookingService active">
                                            <h4 class="alt-font">Selecciona tu servicio:</h4>
                                            <select name="bookService" id="bookService" required>
                                                <option disabled selected> - Selecciona uno</option>
                                                <option value="Wrapping">Wrapping</option>
                                                <option value="Pintura de Rines">Pintura de Rines</option>
                                                <option value="Personalización de Calipers">Personalización de Calipers</option>
                                                <option value="Polarizado">Polarizado</option>
                                                <option value="PPF">PPF</option>
                                                <option value="Ahumado de Faros">Ahumado de Faros</option>
                                                <option value="Detallado">Detallado</option>
                                                <option value="Pintura removible">Pintura removible</option>
                                            </select>
                                            <h4 class="alt-font">Ingresa tu nombre</h4>
                                            <input type="text" class = "bookInput" name = "bookName" id = "bookName" placeholder = "Marca de tu vehículo" required>
                                            <h4 class="alt-font">Marca y modelo del vehículo:</h4>
                                            <input type="text" class = "bookInput" name = "bookCar" id = "bookCar" placeholder = "Marca y modelo del vehículo:" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bookingDate">
                                            <h4 class="alt-font">Selecciona una fecha:</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="bookingTime">
                                            <h4 class="alt-font">Selecciona un horario:</h4>
                                        </div>
                                    </div>
                                    <div class="col-md-12 bookingNotif"></div>
                                    <div class="col-md-12 bookingButtonHolder page1" data-current="1">
                                        <button type="button" data-action="prev" class="bookingButton">Anterior</button>
                                        <button type="button" data-action="next" class="bookingButton">Siguiente</button>
                                        <button type="button" data-action="appt" class="bookingButton">Hacer cita</button>
                                        <input type="hidden" name="bookingDate" id="bookingDate" required>
                                        <input type="hidden" name="bookingTime" id="bookingTime" required>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- JS -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/modernizr.js"></script>
        <script type="text/javascript" src="assets/js/moment.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="assets/js/skrollr.min.js"></script>
        <script type="text/javascript" src="assets/js/smooth-scroll.js"></script>
        <script type="text/javascript" src="assets/js/jquery.appear.js"></script>
        <script type="text/javascript" src="assets/js/bootsnav.js"></script>
        <script type="text/javascript" src="assets/js/jquery.nav.js"></script>
        <script type="text/javascript" src="assets/js/wow.min.js"></script>
        <script type="text/javascript" src="assets/js/page-scroll.js"></script>
        <script type="text/javascript" src="assets/js/swiper.min.js"></script>
        <script type="text/javascript" src="assets/js/jquery.count-to.js"></script>
        <script type="text/javascript" src="assets/js/jquery.stellar.js"></script>
        <script type="text/javascript" src="assets/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="assets/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="assets/js/classie.js"></script>
        <script type="text/javascript" src="assets/js/hamburger-menu.js"></script>
        <script type="text/javascript" src="assets/js/counter.js"></script>
        <script type="text/javascript" src="assets/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="assets/js/skill.bars.jquery.js"></script>
        <script type="text/javascript" src="assets/js/justified-gallery.min.js"></script>
        <script type="text/javascript" src="assets/js/instafeed.min.js"></script>
        <script type="text/javascript" src="assets/js/bootstrap-datetimepicker.min.js"></script>
        <script type="text/javascript" src="assets/js/lightgallery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
        <script type="text/javascript" src="assets/js/bookingwidget.js"></script>
        <script>
            $(document).ready(function(){
                setTimeout(function(){ $('#subscribe_caller').click(); }, 10000);
            });
        </script>
    </body>
</html>