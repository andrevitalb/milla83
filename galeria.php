<?php 
    include('connection.php');

    mysqli_set_charset ($connect, "utf8");
    date_default_timezone_set('America/Mexico_City');

    $queryGallery = "Select galeria_ID, galeria_titulo, galeria_servicio, galeria_imagen from galeria order by galeria_ID desc";
    $resultGallery = mysqli_query($connect, $queryGallery);
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

        <title>Galeria | Milla 83</title>

        <link rel="canonical" href="https://milla83.com/galeria">

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
                                <li><a href="index" title="Inicio">Inicio</a></li>
                                <li><a href="acerca-de" title="Acerca de">Acerca de</a></li>
                                <li><a href="servicios" title="Servicios">Servicios</a></li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right no-margin alt-font text-normal width-45 md-width-100 sm-text-center justify-content-start nav-r" data-in="fadeIn" data-out="fadeOut">
                                <li><a href="#top" title="Galeria" class="inner-link highlight-color">Galeria</a></li>
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
        <section class="wow fadeIn bg-gallery cover-background banner-background" id = "top">
            <div class="opacity-extra-medium bg-extra-dark-gray z-index-0"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 d-flex flex-column justify-content-center text-center extra-small-screen page-title-medium">
                        <h1 class="alt-font text-white-2 font-weight-600 m-0 text-uppercase letter-spacing-1">Galeria</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Galeria -->
        <section class="wow fadeIn padding-90px-top md-padding-50px-top md-padding-30px-top">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <ul class="portfolio-filter nav nav-tabs justify-content-center border-0 portfolio-filter-tab-1 font-weight-600 alt-font text-uppercase text-center margin-80px-bottom text-small md-margin-40px-bottom md-margin-20px-bottom">
                            <li class="nav active"><a href="javascript:void(0);" data-filter="*" class="light-gray-text-link text-very-small">Todo</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".wrapping" class="light-gray-text-link text-very-small">Wrapping</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".rimPaint" class="light-gray-text-link text-very-small">Pintura de Rines</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".calipPer" class="light-gray-text-link text-very-small">Personalización de Calipers</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".polar" class="light-gray-text-link text-very-small">Polarizado</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".ppf" class="light-gray-text-link text-very-small">PPF</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".ahumFar" class="light-gray-text-link text-very-small">Ahumado de faros</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".detall" class="light-gray-text-link text-very-small">Detallado</a></li>
                            <li class="nav"><a href="javascript:void(0);" data-filter=".removPaint" class="light-gray-text-link text-very-small">Pintura removible</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 px-3 p-md-0">
                        <ul class="portfolio-grid work-3col hover-option5 gutter-medium galleryPreviews">
                            <li class="grid-sizer"></li>
                            <?php
                                while($rowGallery = mysqli_fetch_array($resultGallery)){
                                    $gal = "<li class='grid-item grid-item wow fadeInUp last-paragraph-no-margin ";
                                    $servs = explode(',', $rowGallery[2]);
                                    $size = sizeof($servs);
                                    for($i = 0; $i < $size; $i++){
                                        if($servs[$i] == "Wrapping") $gal .= ' wrapping';
                                        else if($servs[$i] == "Pintura de Rines") $gal .= ' rimPaint';
                                        else if($servs[$i] == "Personalización de Calipers") $gal .= ' calipPer';
                                        else if($servs[$i] == "Polarizado") $gal .= ' polar';
                                        else if($servs[$i] == "PPF") $gal .= ' ppf';
                                        else if($servs[$i] == "Ahumado de Faros") $gal .= ' ahumFar';
                                        else if($servs[$i] == "Detallado") $gal .= ' detall';
                                        else if($servs[$i] == "Pintura removible") $gal .= ' removPaint';
                                    }
                                    $services = str_replace(',', ' / ', $rowGallery[2]);
                                    $altText = "$rowGallery[1] | $services";
                                    $gal .= "' data-src='$rowGallery[3]' data-sub-html='$altText'><a href='#'><figure><div class='portfolio-img'><img src='$rowGallery[3]' alt='$altText'></div><figcaption><div class='portfolio-hover-main text-center'><div class='portfolio-hover-box align-middle'><div class='portfolio-hover-content position-relative last-paragraph-no-margin'><div class='bg-deep-pink mx-auto separator-line-horrizontal-medium-light2 position-relative'></div><span class='font-weight-600 letter-spacing-1 alt-font text-white-2 text-uppercase margin-5px-bottom d-block'>$rowGallery[1]</span><p class='text-medium-gray letter-spacing-1 text-uppercase text-extra-small'>$services</p></div></div></div></figcaption></figure></a></li>";
                                    echo $gal;
                                }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- CTA Servicios -->
        <section class="wow fadeIn padding-50px-tb border-top border-color-extra-light-gray" id = "cta">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-lg-8 md-margin-30px-bottom text-center text-lg-left wow fadeInDown">
                        <span class="alt-font text-extra-large text-extra-dark-gray margin-5px-top md-no-margin-top d-inline-block width-100">¿Te interesa realizar un trabajo con nosotros?</span>
                    </div>
                    <div class="col-12 col-lg-4 text-center text-lg-left wow fadeInDown">
                        <a href="servicios" class="btn btn-medium btn-rounded btn-deep-pink" data-wow-delay="0.4s">Conoce nuestros servicios <i class="ti-arrow-right" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </section>

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

        <a class="scroll-top-arrow" href="javascript:void(0);"><i class="ti-arrow-up"></i></a>

        <!-- JS -->
        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/modernizr.js"></script>
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
        <script type="text/javascript" src="assets/js/lightgallery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>
        <script type="text/javascript" src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>