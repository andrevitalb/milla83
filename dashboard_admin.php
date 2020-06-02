<?php session_start();
    if(!isset($_SESSION['usr'])) {
        header('Location: login');
        die();
    }

    include('connection.php');
    include('admin_func.php');

    mysqli_set_charset ($connect, "utf8");
    date_default_timezone_set('America/Mexico_City');

    $usr = $_SESSION['usr'];

    $queryUsername = "Select usuarios_name from usuarios where usuarios_ID = $usr";
    $resultUsername = mysqli_query($connect, $queryUsername);
    $rUsername = mysqli_fetch_array($resultUsername);

    $queryAppts = "Select citas_fecha, citas_hora, citas_usuario, citas_servicio, citas_auto from citas order by citas_fecha";
    $resultAppts = mysqli_query($connect, $queryAppts);

    getGallery();

    getPosts();
    $contBlog = 0;

    $queryUsers = "Select suscripciones_correo from suscripciones order by suscripciones_ID";
    $resultUsers = mysqli_query($connect, $queryUsers);
    $contUsers = 0;
?>
<!DOCTYPE html>
<html lang="es" class="no-js">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-143184290-2"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-143184290-2');
        </script>

        <title>Dashboard Admin | Milla 83</title>

        <link rel="canonical" href="https://milla83.com/dashboard_admin">

        <meta charset="utf-8">
        <meta name="theme-color" content="#000">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="author" content="André Vital">
        <meta name="msapplication-tap-highlight" content="no" />
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

        <!-- CSS -->
        <link rel="stylesheet" href="assets/dashboard/bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/metisMenu/dist/metisMenu.min.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/Waves/dist/waves.min.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/dashboard/css/bootstrap-multiselect.css">
        <link rel="stylesheet" href="assets/dashboard/js/selects/cs-select.css">
        <link rel="stylesheet" href="assets/dashboard/js/selects/cs-skin-elastic.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/DataTables/media/css/jquery.dataTables.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/datatables-tabletools/css/dataTables.tableTools.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/sweetalert/dist/sweetalert.css">
        <link rel="stylesheet" href="assets/dashboard/bower_components/smoke/dist/css/smoke.min.css">
        <link rel="stylesheet" href="assets/dashboard/js/notifications/ns-style-growl.css">
        <link rel="stylesheet" href="assets/dashboard/js/notifications/ns-style-other.css">
        <script src="assets/dashboard/js/menu/modernizr.custom.js"></script>
        <script src="assets/dashboard/js/notifications/snap.svg-min.js"></script>
        <link rel="stylesheet" href="assets/dashboard/css/style.css">
        <link rel="stylesheet" href="assets/dashboard/css/custom.css">
        <link rel="stylesheet" href="assets/css/all.min.css">

        <!-- Favicons -->
        <link rel="icon" href="assets/img/favicon.ico">
        <link rel="shortcut icon" href="assets/img/favicon.png">
        <link rel="apple-touch-icon" href="assets/images/apple-touch-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/images/apple-touch-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/images/apple-touch-icon-114x114.png">
        <!--[if lt IE 9]>
        <script src="assets/dashboard/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="assets/dashboard/bower_components/respondJs/dest/respond.min.js"></script>
        <![endif]-->
    </head>

    <body>
        <div id="main-wrapper" class="main-wrapper">
            <!--Preloader-->
            <div id="preloader" class="preloader table-wrapper">
                <div class="table-row">
                    <div class="table-cell">
                        <div class="la-ball-scale-multiple la-3x">
                            <div></div>
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="nav-cont">
                <div id = "go_back">
                    <a href = "cerrar">
                        <i class="mdi mdi-arrow-left"></i>   Regresar
                    </a>
                </div>
                <ul id="gn-menu" class="navbar gn-menu-main">
                    <li>
                        <a href="dashboard_admin.php" class="logo">
                            <img src="assets/img/logo_white.svg" alt="Milla 83">
                        </a>
                    </li>
                    <li class="container-fluid pull-right">
                        <ul class="nav navbar-right right-menu">
                            <li class="user_info">
                                <p id = "user_name">
                                    <strong><?php echo $rUsername[0]; ?></strong>
                                </p>
                                <div id = "spacer-header"></div>
                                <a href = "cerrar" id = "log_out" style = "padding: 0;">Cerrar Sesión</a>
                            </li>
                            <li class="user_icon">
                                <a href="#"><i class="mdi mdi-account"></i></a>
                            </li>
                        </ul>
                    </li>
                    <li class="gn-trigger">
                        <a id="menu-toggle" class="menu-toggle gn-icon gn-icon-menu"></a>
                        <nav class="gn-menu-wrapper"></nav>
                    </li>
                </ul>
            </div>

            <div class="content container-fluid" id = "content">
                <div class="col-lg-12">
                    <div class="content-box big-box" id = "apptsList">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Citas agendadas:</h2>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="datatable display">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Horario</th>
                                        <th>Nombre</th>
                                        <th>Servicios</th>
                                        <th>Auto</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($rowAppts = mysqli_fetch_array($resultAppts)):;?>
                                        <?php 
                                            $date = explode('-',$rowAppts[0]);
                                            $date = $date[2] .'-'. $date[1] .'-'. $date[0];
                                        ?>
                                        <tr>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo $rowAppts[1];?></td>
                                            <td><?php echo $rowAppts[2];?></td>
                                            <td><?php echo $rowAppts[3];?></td>
                                            <td><?php echo $rowAppts[4];?></td>
                                        </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="content-box big-box" id = "newImg">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Agregar imágen:</h2>
                            </div>
                        </div>

                        <form action = "" method = "post" enctype = "multipart/form-data">
                            <div class="row form-data-holder">
                                <div class="content-form form-horizontal">
                                    <div class="col-12 col-sm-6 col-md-4 form-group">
                                        <label for="titleGallery" class="col-sm-3 control-label">Título</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "titleGallery" class="form-control material" id="titleGallery" placeholder="Título" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 form-group">
                                        <label for="servGallery" class="col-sm-3 control-label">Servicios</label>
                                        <div class="col-sm-9">
                                            <select name="servGallery[]" id="servGallery" class="form-control material multSelec" required multiple="multiple">
                                                <option value="Wrapping">Wrapping</option>
                                                <option value="Pintura de Rines">Pintura de Rines</option>
                                                <option value="Personalización de Calipers">Personalización de Calipers</option>
                                                <option value="Polarizado">Polarizado</option>
                                                <option value="PPF">PPF</option>
                                                <option value="Ahumado de Faros">Ahumado de Faros</option>
                                                <option value="Detallado">Detallado</option>
                                                <option value="Pintura removible">Pintura removible</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 form-group">
                                        <label for="imgGallery" class="col-sm-3 control-label">Imagen</label>
                                        <div class="col-sm-9" style = "padding-top: 10px;">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <span class="input-group-addon btn btn-default btn-file">
                                                    <span class="fileinput-new">
                                                        <i class="fa fa-file"></i> Seleccionar archivo</span>
                                                        <span class="fileinput-exists">Cambiar</span>
                                                    <input type="file" name="imgGallery" id="imgGallery">
                                                </span>

                                                <div class="form-control" data-trigger="fileinput">
                                                    <span class="fileinput-filename"></span>
                                                </div>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type = "submit" class = "btn btn-primary" name = "addImg">Crear</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6 notifClear">
                                        <?php 
                                            if(isset($_POST['addImg'])) {
                                                addImg(); 
                                                echo '<meta http-equiv="refresh" content=".5;URL=dashboard_admin"/>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="content-box big-box" id = "imgList">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Imágenes en galería:</h2>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="datatable display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Servicios</th>
                                        <th>Imágen</th>
                                        <th><i class="fas fa-pencil-alt"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($rowGallery = mysqli_fetch_array($resultGallery)):;?>
                                        <tr>
                                            <td><?php echo $rowGallery[0];?></td>
                                            <td><?php echo $rowGallery[1];?></td>
                                            <td><?php echo $rowGallery[2];?></td>
                                            <td class = "text-center"><img src="<?php echo $rowGallery[3];?>" width="250"></td>
                                            <td><?php echo '<form method = "post"><button type = "button" class="btn btn-info tableButton editImgs" name = "editImg" id = "editImg'.$rowGallery[0].'" value = "'.$rowGallery[0].'">Editar</button><button type = "button" class="btn btn-danger tableButton deleteImgs" name = "deleteImg" id = "deleteImg'.$rowGallery[0].'">Deshabilitar</button></form>'; ?></td>
                                        </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>

                            <form action="" method = "post" style="display:none;"><input type = "hidden" name = "deleteImgID" id = "deleteImgID"><button type="button" name="delImg" id="delImg"></button><button type="submit" name="confDelImg" id="confDelImg"></button></form>
                        </div>
                    </div>

                    <div class="content-box big-box" id = "updImg">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Editar imágen:</h2>
                            </div>
                        </div>

                        <form action = "" method = "post" enctype = "multipart/form-data">
                            <div class="row form-data-holder">
                                <div class="content-form form-horizontal">
                                    <div class="col-12 col-sm-6 col-md-4 form-group">
                                        <label for="updTitleGallery" class="col-sm-3 control-label">Título</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "updTitleGallery" class="form-control material" id="updTitleGallery" placeholder="Título" required>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 form-group">
                                        <label for="updServGallery" class="col-sm-3 control-label">Servicios</label>
                                        <div class="col-sm-9">
                                            <select name="updServGallery[]" id="updServGallery" class="form-control material multSelec" required multiple="multiple">
                                                <option value="Wrapping">Wrapping</option>
                                                <option value="Pintura de Rines">Pintura de Rines</option>
                                                <option value="Personalización de Calipers">Personalización de Calipers</option>
                                                <option value="Polarizado">Polarizado</option>
                                                <option value="PPF">PPF</option>
                                                <option value="Ahumado de Faros">Ahumado de Faros</option>
                                                <option value="Detallado">Detallado</option>
                                                <option value="Pintura removible">Pintura removible</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-4 form-group">
                                        <label for="updImgGallery" class="col-sm-3 control-label">Imagen</label>
                                        <div class="col-sm-9" style = "padding-top: 10px;">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <span class="input-group-addon btn btn-default btn-file">
                                                    <span class="fileinput-new">
                                                        <i class="fa fa-file"></i> Seleccionar archivo</span>
                                                        <span class="fileinput-exists">Cambiar</span>
                                                    <input type="file" name="updImgGallery" id="updImgGallery">
                                                </span>

                                                <div class="form-control" data-trigger="fileinput">
                                                    <span class="fileinput-filename"></span>
                                                </div>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <input type="text" name = "updIdGallery" id = "updIdGallery" style = "display: none;">
                                        <button type = "submit" class = "btn btn-primary" name = "updImg">Actualizar</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6 notifClear">
                                        <?php 
                                            if(isset($_POST['updImg'])) {
                                                updImg(); 
                                                echo '<meta http-equiv="refresh" content=".5;URL=dashboard_admin"/>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="content-box big-box" id = "newPost">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Crear nuevo post de blog:</h2>
                            </div>
                        </div>

                        <form action = "" method = "post" enctype = "multipart/form-data">
                            <div class="row form-data-holder">
                                <div class="content-form form-horizontal">
                                    <div class="col-md-1"></div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="titlePost" class="col-sm-3 control-label">Título post</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "titlePost" class="form-control material" id="titlePost" placeholder="Título post" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label for="thumbPost" class="col-sm-4 control-label">Miniatura</label>
                                        <div class="col-sm-8" style = "padding-top: 10px;">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <span class="input-group-addon btn btn-default btn-file">
                                                    <span class="fileinput-new">
                                                        <i class="fa fa-file"></i> Seleccionar archivo</span>
                                                        <span class="fileinput-exists">Cambiar</span>
                                                    <input type="file" name="thumbPost" id="thumbPost">
                                                </span>

                                                <div class="form-control" data-trigger="fileinput">
                                                    <span class="fileinput-filename"></span>
                                                </div>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <div class="col-md-1"></div>
                                        <label for="textPost" class="col-sm-12 col-md-11 control-label">Contenido</label>
                                        <div class="col-md-1"></div>
                                        <div class="col-sm-12 col-md-10">
                                            <textarea name = "textPost" class="form-control material postEditor" id="textPost" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <button type = "submit" class = "btn btn-primary" name = "addPost">Crear</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6 notifClear">
                                        <?php 
                                            if(isset($_POST['addPost'])) {
                                                addPost($usr);
                                                echo '<meta http-equiv="refresh" content=".5;URL=dashboard_admin"/>';
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="content-box big-box" id = "postList">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Posts en blog:</h2>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="datatable display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Título</th>
                                        <th>Miniatura</th>
                                        <th>Fecha de publicación</th>
                                        <th><i class="fas fa-pencil-alt"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php while($rowBlog = mysqli_fetch_array($resultBlog)):;?>
                                        <?php 
                                            $date = explode('-',$rowBlog[4]);
                                            $date = "$date[2] - $date[1] - $date[0]"; 
                                        ?>
                                        <tr>
                                            <td><?php echo ++$contBlog;?></td>
                                            <td><?php echo $rowBlog[1];?></td>
                                            <td class = "text-center"><img src="<?php echo $rowBlog[2];?>" width="250"></td>
                                            <td><?php echo $date;?></td>
                                            <td><?php echo '<form method = "post"><button type = "button" class="btn btn-info tableButton editPosts" name = "editPost" id = "editPost'.$rowBlog[0].'" value = "'.$rowBlog[0].'">Editar</button><button type = "button" class="btn btn-danger tableButton deletePosts" name = "deletePost" id = "deletePost'.$rowBlog[0].'">Deshabilitar</button></form>'; ?></td>
                                        </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>

                            <form action="" method = "post" style="display:none;"><input type = "hidden" name = "deletePostID" id = "deletePostID"><button type="button" name="delPost" id="delPost"></button><button type="submit" name="confDelPost" id="confDelPost"></button></form>
                        </div>
                    </div>

                    <div class="content-box big-box" id = "updPost">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Modificar post de blog:</h2>
                            </div>
                        </div>

                        <form action = "" method = "post" enctype = "multipart/form-data">
                            <div class="row form-data-holder">
                                <div class="content-form form-horizontal">
                                    <div class="col-md-1"></div>
                                    <div class="col-sm-12 col-md-6 form-group">
                                        <label for="updTitlePost" class="col-sm-3 control-label">Título post</label>
                                        <div class="col-sm-9">
                                            <input type="text" name = "updTitlePost" class="form-control material" id="updTitlePost" placeholder="Título post" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-4 form-group">
                                        <label for="updThumbPost" class="col-sm-4 control-label">Miniatura</label>
                                        <div class="col-sm-8" style = "padding-top: 10px;">
                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                <span class="input-group-addon btn btn-default btn-file">
                                                    <span class="fileinput-new">
                                                        <i class="fa fa-file"></i> Seleccionar archivo</span>
                                                        <span class="fileinput-exists">Cambiar</span>
                                                    <input type="file" name="updThumbPost" id="updThumbPost">
                                                </span>

                                                <div class="form-control" data-trigger="fileinput">
                                                    <span class="fileinput-filename"></span>
                                                </div>
                                                <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Eliminar</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 form-group">
                                        <div class="col-md-1"></div>
                                        <label for="updTextPost" class="col-sm-12 col-md-11 control-label">Contenido</label>
                                        <div class="col-md-1"></div>
                                        <div class="col-sm-12 col-md-10">
                                            <textarea name = "updTextPost" class="form-control material postEditor" id="updTextPost" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 text-right">
                                        <input type="text" name = "updIdBlog" id = "updIdBlog" style = "display: none;">
                                        <button type = "submit" class = "btn btn-primary" name = "updPost">Guardar</button>
                                    </div>
                                    <div class="col-lg-3"></div>
                                    <div class="col-lg-6 notifClear">
                                        <?php if(isset($_POST['updPost'])) updPost(); ?>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="content-box big-box" id = "subsUsers">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>Usuarios suscritos a newsletter:</h2>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="datatable display">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Correo Electrónico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($resultUsers) while($rowUsers = mysqli_fetch_array($resultUsers)):;?>
                                        <tr>
                                            <td><?php echo ++$contUsers;?></td>
                                            <td><?php echo $rowUsers[0];?></td>
                                        </tr>
                                    <?php endwhile;?>
                                </tbody>
                            </table>
                        </div>
                        <form action="export.php" method = "post" class="col-md-12 caption text-center">
                            <button class = "btn btn-primary" type = "submit" name = "export-users">Exportar tabla</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class = "footer">
                <p>
                    &copy; <?php echo date('Y'); ?> <b id="normal">Milla 83</b>. Todos los derechos reservados. <b><a target="_blank" href="aviso_de_privacidad.pdf" id="aviso"> Aviso de Privacidad</a></b>.<br>
                    Sitio desarrollado por <b><a target="_blank" href="https://andrevital.com/" id="av">André Vital</a></b>
                </p>
            </div>
        </div>

        <script src="assets/dashboard/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="assets/dashboard/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="assets/dashboard/bower_components/metisMenu/dist/metisMenu.min.js"></script>
        <script src="assets/dashboard/bower_components/Waves/dist/waves.min.js"></script>
        <script src="assets/dashboard/bower_components/moment/min/moment.min.js"></script>
        <script src="assets/dashboard/bower_components/summernote/dist/summernote.min.js"></script>
        <script src="assets/dashboard/bower_components/summernote/dist/summernote-es-ES.min.js"></script>
        <script src="assets/dashboard/bower_components/slimScroll/jquery.slimscroll.min.js"></script>
        <script src="assets/dashboard/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.js"></script>
        <script src="assets/dashboard/bower_components/cta/dist/cta.min.js"></script>
        <script src="assets/dashboard/bower_components/DataTables/media/js/jquery.dataTables.js"></script>
        <script src="assets/dashboard/bower_components/datatables.net-responsive/js/dataTables.responsive.js"></script>
        <script src="assets/dashboard/bower_components/datatables-tabletools/js/dataTables.tableTools.js"></script>
        <script src="assets/dashboard/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.js"></script>
        <script src="assets/dashboard/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>

        <script src="assets/dashboard/js/menu/classie.js"></script>
        <script src="assets/dashboard/js/menu/gnmenu.js"></script>
        <script src="assets/dashboard/js/selects/selectFx.js"></script>
        <script src="assets/dashboard/js/bootstrap-multiselect.js"></script>
        <script src="assets/dashboard/js/common.js"></script>

        <script type="text/javascript">
            $('.fileinput').fileinput();

            $(function () {
                $('.datatable').DataTable({
                    "language": {
                        "lengthMenu": 'Mostrar <select>'+
                        '<option value="10">10</option>'+
                        '<option value="25">25</option>'+
                        '<option value="50">50</option>'+
                        '<option value="100">100</option>'+
                        '<option value="250">250</option>'+
                        '<option value="500">500</option>'+
                        '</select> entradas'
                    },
                    displayLength: 10,
                    dom: 'T<"clear">lfrtip',
                    tableTools: {
                        "sSwfPath": "assets/dashboard/js/datatables/copy_csv_xls_pdf.swf"
                    },
                    responsive: true
                });

                $('.multSelec').multiselect({
                    includeSelectAllOption: true
                });
            });

            $('.editImgs').click(function(){
                let imgSelector = $(this).val();
                $('#updImg').css('display', 'block');
                $('#updIdGallery').val(imgSelector);

                <?php getGallery(); ?>

                <?php if($resultGallery) while($itemGallery = mysqli_fetch_array($resultGallery)):;?>
                    let checkName = "<?php echo $itemGallery[0];?>";
                    if(checkName == imgSelector){
                        $("#updTitleGallery").val("<?php echo $itemGallery[1];?>");
                    }
                <?php endwhile;?>

                $('html, body').animate({
                    scrollTop: $("#updImg").offset().top - 75
                }, 500);
            });

            $('.deleteImgs').click(function(){
                let id = $(this).attr('id').replace(/deleteImg/,'');
                $('#deleteImgID').val(id);
                $('#delImg').click();
            });

            $('#delImg').click(function(){
                swal({
                    title: '¿Está seguro?',
                    text: "Esto eliminará permanentemente esta imagen. Esta operación no es reversible.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3BDF6D',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, deseo continuar',
                    closeOnConfirm: false
                }, function(){
                    $('#confDelImg').click();
                });
            });

            $('.editPosts').click(function(){
                let postSelector = $(this).val();
                $('#updPost').css('display', 'block');
                $('#updIdBlog').val(postSelector);

                <?php getPosts(); ?>

                <?php if($resultBlog) while($itemBlog = mysqli_fetch_array($resultBlog)):;?>
                    let checkName = "<?php echo $itemBlog[0];?>";
                    if(checkName == postSelector){
                        $("#updTitlePost").val("<?php echo $itemBlog[1];?>");
                        $("#updTextPost").summernote("code", "<?php echo $itemBlog[3];?>");
                    }
                <?php endwhile;?>

                $('html, body').animate({
                    scrollTop: $("#updPost").offset().top - 75
                }, 500);
            });

            $('.deletePost').click(function(){
                let id = $(this).attr('id').replace(/deletePost/,'');
                $('#deletePostID').val(id);
                $('#delPost').click();
            });

            $('#delPost').click(function(){
                swal({
                    title: '¿Está seguro?',
                    text: "Esto eliminará permanentemente esta entrada del blog.",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3BDF6D',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, deseo continuar',
                    closeOnConfirm: false
                }, function(){
                    $('#confDelPost').click();
                });
            })
        </script>
        <?php
            if(isset($_POST['confDelImg'])) {
                deleteImg($_POST['deleteImgID']);
                echo '<meta http-equiv="refresh" content="1;URL=dashboard_admin"/>';
            }

            if(isset($_POST['confDelPost'])){
                deletePost($_POST['deletePostID']);
                echo '<meta http-equiv="refresh" content="1;URL=dashboard_admin"/>';
            }
        ?>
    </body>
</html>