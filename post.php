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

    $id = $_GET['id'];

    $queryBlogPost = "Select blog_ID, blog_titulo, blog_thumbnail, blog_contenido, blog_fecha, usuarios_name from blog inner join usuarios on blog_autor = usuarios_ID where blog_ID = $id";
    $resultBlogPost = mysqli_query($connect, $queryBlogPost);
    if(gettype($resultBlogPost) != "boolean") $rBlogPost = mysqli_fetch_array($resultBlogPost);

    $date = explode('-',$rBlogPost[4]);
    $date = "$date[2] - $date[1] - $date[0]";

    $bId = $rBlogPost[0] + 1;
    $tId = $bId + 2;
    $queryNextPost = "Select blog_ID, blog_titulo, blog_thumbnail, blog_contenido, blog_fecha, usuarios_name from blog inner join usuarios on blog_autor = usuarios_ID where blog_ID between $bId and $tId order by blog_ID desc";
    $resultNextPost = mysqli_query($connect, $queryNextPost);    
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

        <title><?php echo $rBlogPost[1]; ?> | Milla 83</title>

        <link rel="canonical" href="https://milla83.com/post">

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
        <link rel="icon" href="../../assets/img/favicon.ico">
        <link rel="shortcut icon" href="../../assets/img/favicon.png">
        <link rel="apple-touch-icon" href="../../assets/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="../../assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="../../assets/images/apple-touch-icon-114x114.png">

        <!-- CSS -->
        <link rel="stylesheet" href="../../assets/css/animate.css">
        <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="../../assets/css/swiper.min.css">
        <link rel="stylesheet" href="../../assets/css/justified-gallery.min.css">
        <link rel="stylesheet" href="../../assets/css/magnific-popup.css">
        <link rel="stylesheet" type="text/css" href="../../assets/revolution/css/settings.css" media="screen">
        <link rel="stylesheet" type="text/css" href="../../assets/revolution/css/layers.css">
        <link rel="stylesheet" type="text/css" href="../../assets/revolution/css/navigation.css">
        <link rel="stylesheet" href="../../assets/css/bootsnav.css">
        <link rel="stylesheet" href="../../assets/css/style.css">
        <link rel="stylesheet" href="../../assets/css/custom.css">
        <link rel="stylesheet" href="../../assets/css/responsive.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/css/lightgallery.min.css">

        <!-- Icons -->
        <link rel="stylesheet" href="../../assets/css/et-line-icons.css">
        <link rel="stylesheet" href="../../assets/css/themify-icons.css">
        <link rel="stylesheet" href="../../assets/css/all.min.css">

        <!--[if IE]>
            <script src="../../assets/js/html5shiv.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- Navbar -->
        <header>
            <nav class="navbar navbar-default bootsnav navbar-fixed-top header-dark background-black nav-box-width white-link padding-four-lr menu-logo-center navbar-expand-lg">
                <div class="container nav-header-container">
                    <div class="center-logo">
                        <a href="../../index" title="Milla 83" class="logo">
                            <img src="../../assets/img/logo_white.svg" data-rjs="../../assets/images/custom/logo.svg" alt="Logo" class="logo-light logo-display default">
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
                                <li><a href="../../index" title="Inicio">Inicio</a></li>
                                <li><a href="../../acerca-de" title="Acerca de">Acerca de</a></li>
                                <li><a href="../../servicios" title="Servicios">Servicios</a></li>
                            </ul>

                            <ul class="nav navbar-nav navbar-right no-margin alt-font text-normal width-45 md-width-100 sm-text-center justify-content-start nav-r" data-in="fadeIn" data-out="fadeOut">
                                <li><a href="../../galeria" title="Galeria">Galeria</a></li>
                                <li><a href="../../blog" title="Blog" class="highlight-color">Blog</a></li>
                                <li><a href="../../contacto" title="Contacto">Contacto</a></li>
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

        <!-- Título -->
        <section class="wow fadeIn bg-light-gray padding-35px-tb page-title-medium top-space">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-md-6 d-flex flex-column justify-content-center text-center text-md-left">
                        <h1 class="alt-font text-extra-dark-gray font-weight-600 no-margin-bottom"><?php echo $rBlogPost[1]; ?></h1>
                    </div>
                    <div class="col-xl-4 col-md-6 alt-font breadcrumb justify-content-center justify-content-md-end text-small sm-margin-10px-top">
                        <ul class="text-center text-md-left text-uppercase">
                            <li><span class="text-dark-gray"><?php echo $date; ?></span></li>
                            <li><span class="text-dark-gray">por <?php echo $rBlogPost[5]; ?></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- Post -->
        <section class = "padding-45px-top">
            <div class="container">
                <div class="row">
                    <main class="col-12 col-lg-9 right-sidebar md-margin-60px-bottom sm-margin-40px-bottom pl-0 md-no-padding-right">
                        <div class="col-12 blog-details-text last-paragraph-no-margin">
                            <img src="../../<?php echo $rBlogPost[2];?>" alt="<?php echo $rBlogPost[1];?>" width="100%" class = "margin-35px-bottom">
                            <?php echo $rBlogPost[3]; ?>
                        </div>
                        <div class="col-12 margin-two-bottom margin-two-top">
                            <div class="divider-full bg-medium-light-gray"></div>
                        </div>
                        <div class="col-12 d-flex flex-wrap p-0">
                            <div class="col-12 mx-auto text-center margin-80px-tb md-margin-50px-tb sm-margin-30px-tb">
                                <div class="position-relative overflow-hidden width-100">
                                    <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase text-extra-dark-gray">Posts relacionados</span>
                                </div>
                            </div>

                            <?php 
                                $contNext = 0;
                                if($resultNextPost) while(($rowNextPost = mysqli_fetch_array($resultNextPost)) && $contNext < 3){
                                    $title = seoUrl($rowNextPost[1]);
                                    $delay = $contNext * 2;

                                    $content = strstr($rowNextPost[3], '<p>');
                                    $content = explode("</p>", $content);
                                    $content = substr($content[0], 0, 100);
                                    if(strpos($content, '<', strpos($content, '<') + 1)) {
                                        $pos = strpos($content, '<', strpos($content, '<') + 1);
                                        $content = substr($content, 0, $pos);
                                    }
                                    $content .= "...</p>";

                                    $nDate = explode('-',$rowNextPost[4]);
                                    $nDate = "$nDate[2] - $nDate[1] - $nDate[0]";

                                    $nPost = "<div class='col-12 col-lg-4 col-md-6 last-paragraph-no-margin md-margin-50px-bottom sm-margin-30px-bottom wow fadeIn' data-wow-delay='0.".$delay."s'><div class='blog-post blog-post-style1 text-center text-md-left'><div class='blog-post-images overflow-hidden margin-25px-bottom md-margin-20px-bottom'><a href='https://milla83.com/post/$rowNextPost[0]/$title'><img src='../../$rowNextPost[2]' alt='$rowNextPost[1]'></a></div><div class='post-details'><span class='post-author text-extra-small text-medium-gray text-uppercase d-block margin-10px-bottom sm-margin-5px-bottom'>$nDate | por $rowNextPost[5]</span><a href=''https://milla83.com/post/$rowNextPost[0]/$title' class='post-title text-medium text-extra-dark-gray width-90 d-block md-width-100'>$rowNextPost[1]</a><div class='separator-line-horrizontal-full bg-medium-light-gray margin-20px-tb md-margin-15px-tb'></div><p class='width-90 sm-width-100'>$content</p></div></div></div>";
                                    echo $nPost;
                                    $contNext++;
                                }
                                $contNext = 0;
                                $resultNextPost = "";
                                $resultNextPost = mysqli_query($connect, $queryNextPost);
                            ?>
                        </div>
                        <div class="col-12 margin-eight-top">
                            <div class="divider-full bg-medium-light-gray"></div>
                        </div>
                    </main>

                    <!-- Sidebar -->
                    <aside class="col-12 col-lg-3 float-right blog-sidebar">
                        <!-- Social -->
                        <div class="margin-50px-bottom">
                            <div class="text-extra-dark-gray margin-20px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Síguenos</span></div>
                            <div class="social-icon-style-1 text-center">
                                <ul class="extra-small-icon">
                                    <li><a class="facebook" href="https://www.facebook.com/Milla83autoboutique/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                    <li><a class="instagram" href="https://www.instagram.com/milla83.autoboutique/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                    <li><a class="youtube" href="https://www.youtube.com/channel/UCGLbtmsKKlYqt_Z-uGPtNCA" target="_blank"><i class="fab fa-youtube"></i></a></li>
                                    <li><a class="whatsapp" href="https://api.whatsapp.com/send?phone=5214494690450" target="_blank"><i class="fab fa-whatsapp"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Quote -->
                        <div class="bg-deep-pink padding-30px-all text-white-2 text-center margin-45px-bottom sm-margin-25px-bottom">
                            <i class="fas fa-quote-left icon-small margin-15px-bottom d-block"></i>
                            <span class="text-extra-large font-weight-300 margin-20px-bottom d-block">Amor por lo que hacemos y pasión por los autos.</span>
                        </div>
                        <!-- Últimos posts -->
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Últimos posts</span></div>
                            <ul class="latest-post position-relative">
                                <?php 
                                    if($resultNextPost) while(($rowNextPost = mysqli_fetch_array($resultNextPost)) && $contNext < 3){
                                        $title = seoUrl($rowNextPost[1]);
                                        $nDate = explode('-',$rowNextPost[4]);
                                        $nDate = "$nDate[2] - $nDate[1] - $nDate[0]";

                                        $nPost = "<li class='media'><figure><a href='https://milla83.com/post/$rowNextPost[0]/$title'><img src='../../$rowNextPost[2]' alt='$rowNextPost[1]'></a></figure><div class='media-body text-small'><a href='https://milla83.com/post/$rowNextPost[0]/$title' class='text-extra-dark-gray'><span class='d-inline-block margin-5px-bottom'>$rowNextPost[1]</span></a><span class='d-block text-medium-gray text-small'>$nDate</span></div>";
                                        echo $nPost;
                                        $contNext++;
                                    }
                                ?>
                            </ul>
                        </div>
                        <!-- Newsletter -->
                        <div class="margin-45px-bottom sm-margin-25px-bottom">
                            <div class="text-extra-dark-gray margin-25px-bottom alt-font text-uppercase font-weight-600 text-small aside-title"><span>Suscríbete</span></div>
                            <div class="d-inline-block width-100">
                                <form id="subscribenewsletterform2" action="javascript:void(0)" method="post">
                                    <div class="position-relative">
                                        <div id="success-subscribe-newsletter2" class="mx-0" style="display: none;"></div>
                                        <input type="email" name = "subscribeEmail" id = "subscribeEmail" class="bg-transparent text-small m-0 border-color-extra-light-gray medium-input float-left" placeholder="Ingresa tu correo electrónico">
                                        <button type="submit" id = "button-subscribe-newsletter2" class="bg-transparent text-large btn position-absolute right-0 top-3"><i class="far fa-envelope ml-0"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="footer-strip-dark bg-black padding-50px-tb sm-padding-30px-tb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 text-center text-lg-left sm-margin-20px-bottom">
                        <a href="../../index"><img class="footer-logo" src="../../assets/img/logo_white.svg" alt="Milla 83"></a>
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
        <script type="text/javascript" src="../../assets/js/jquery.js"></script>
        <script type="text/javascript" src="../../assets/js/modernizr.js"></script>
        <script type="text/javascript" src="../../assets/js/bootstrap.bundle.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.easing.1.3.js"></script>
        <script type="text/javascript" src="../../assets/js/skrollr.min.js"></script>
        <script type="text/javascript" src="../../assets/js/smooth-scroll.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.appear.js"></script>
        <script type="text/javascript" src="../../assets/js/bootsnav.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.nav.js"></script>
        <script type="text/javascript" src="../../assets/js/wow.min.js"></script>
        <script type="text/javascript" src="../../assets/js/page-scroll.js"></script>
        <script type="text/javascript" src="../../assets/js/swiper.min.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.count-to.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.stellar.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.magnific-popup.min.js"></script>
        <script type="text/javascript" src="../../assets/js/isotope.pkgd.min.js"></script>
        <script type="text/javascript" src="../../assets/js/imagesloaded.pkgd.min.js"></script>
        <script type="text/javascript" src="../../assets/js/classie.js"></script>
        <script type="text/javascript" src="../../assets/js/hamburger-menu.js"></script>
        <script type="text/javascript" src="../../assets/js/counter.js"></script>
        <script type="text/javascript" src="../../assets/js/jquery.fitvids.js"></script>
        <script type="text/javascript" src="../../assets/js/skill.bars.jquery.js"></script>
        <script type="text/javascript" src="../../assets/js/justified-gallery.min.js"></script>
        <script type="text/javascript" src="../../assets/js/instafeed.min.js"></script>
        <script type="text/javascript" src="../../assets/js/lightgallery.min.js"></script>
        <script type="text/javascript" src="../../assets/revolution/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="../../assets/revolution/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="../../assets/js/main.js"></script>
    </body>
</html>