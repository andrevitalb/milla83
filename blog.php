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

    $queryBlog = "Select blog_ID as ID, blog_titulo, blog_thumbnail, blog_contenido, blog_fecha, usuarios_name from blog inner join usuarios on blog_autor = usuarios_ID order by ID desc";
    $resultBlog = mysqli_query($connect, $queryBlog);
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

        <title>Blog | Milla 83</title>

        <link rel="canonical" href="https://milla83.com/blog">

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
                                <li><a href="galeria" title="Galeria">Galeria</a></li>
                                <li><a href="#top" title="Blog" class="inner-link highlight-color">Blog</a></li>
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
        <section class="wow fadeIn parallax bg-blog cover-background banner-background" data-stellar-background-ratio="0.5" id = "top">
            <div class="opacity-medium bg-extra-dark-gray"></div>
            <div class="container">
                <div class="row">
                    <div class="col-12 extra-small-screen page-title-large d-flex flex-column justify-content-center text-center">
                        <h1 class="text-white-2 alt-font font-weight-600 letter-spacing-minus-1 margin-15px-bottom">Blog</h1>
                    </div>
                </div>
            </div>
        </section>

        <!-- Posts --> 
        <section class="wow fadeIn hover-option4 blog-post-style3">
            <div class="container"> 
                <div class="row">
                    <?php
                        while($rowBlog = mysqli_fetch_array($resultBlog)){
                            $title = seoUrl($rowBlog[1]);

                            $content = strstr($rowBlog[3], '<p>');
                            $content = explode("</p>", $content);
                            $content = substr($content[0], 0, 100);
                            $pos = strpos($content, '<', strpos($content, '<') + 1);
                            if($pos) $content = substr($content, 0, $pos);
                            $content .= "...</p>";

                            $date = explode('-',$rowBlog[4]);
                            $date = "$date[2] - $date[1] - $date[0]";

                            $post = "<div class='col-12 col-lg-4 col-md-6 grid-item margin-30px-bottom text-center text-md-left wow fadeInUp'><div class='blog-post bg-light-gray'><div class='blog-post-images overflow-hidden position-relative'><a href='post/$rowBlog[0]/$title'><img src='$rowBlog[2]' alt='$rowBlog[1]'><div class='blog-hover-icon'><span class='text-extra-large font-weight-300'>+</span></div></a></div><div class='post-details padding-40px-all md-padding-20px-all'><a href='post/$rowBlog[0]/$title' class='alt-font post-title text-medium text-extra-dark-gray w-100 d-block lg-width-100 margin-15px-bottom'>$rowBlog[1]</a><p>$content</p><div class='separator-line-horrizontal-full bg-medium-gray margin-20px-tb'></div><div class='author'><span class='text-medium-gray text-uppercase text-extra-small d-xl-inline-block d-block md-margin-10px-top'>por <span class='text-medium-gray'>$rowBlog[5]</span>&nbsp;&nbsp;|&nbsp;&nbsp;$date</span></div></div></div></div>";
                            echo $post;
                        }
                    ?>
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
        <script type="text/javascript" src="assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="assets/js/main.js"></script>
    </body>
</html>