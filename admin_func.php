<?php 
    include('connection.php');

    function getGallery(){
        global $resultGallery, $connect;

        $queryGallery = "Select galeria_ID, galeria_titulo, galeria_servicio, galeria_imagen from galeria";
        $resultGallery = mysqli_query($connect, $queryGallery);
    }

	function addImg(){
        global $connect;

		$title = $_POST['titleGallery'];
		$services = $_POST['servGallery'];

		$queryMax = "Select MAX(galeria_ID) from galeria";
        $takeMax = mysqli_query($connect, $queryMax);
        $maxInd = mysqli_fetch_array($takeMax);
        $maxInd = $maxInd[0] + 1;

        $queryNew = "Insert into galeria values ($maxInd, '$title', '";
        $size = sizeof($services);
        $cont = 0;

        foreach ($services as $serviceX) {
            $queryNew .= "$serviceX";
            if($cont++ < ($size - 1)) $queryNew .= ",";
        }

        if($_FILES['imgGallery']['size'] > 0) {
            $target_dirImg = "assets/img/gallery/";
            $imgFileName = $target_dirImg . basename($_FILES["imgGallery"]["name"]);
            $imgFileType = strtolower(pathinfo($imgFileName,PATHINFO_EXTENSION));
            $imgFileName = "gallery-" . $maxInd . "." . $imgFileType;
            $target_img = $target_dirImg . $imgFileName;
            $img = $target_img;

            $check = getimagesize($_FILES["imgGallery"]["tmp_name"]);
            if($check !== false)  $uploadOk = 1;
            else $uploadOk = 0;

            if ($uploadOk == 0) echo "Ocurrió un error, tu archivo no se pudo subir.";
            else  move_uploaded_file($_FILES["imgGallery"]["tmp_name"], $target_img);
        }

        $queryNew .= "','$img')";
        $resultNew = mysqli_query($connect, $queryNew);

        if($resultNew) echo '<div class="alert alert-success alert-dismissible" role="alert" id = "add_correct"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Éxito!</strong> Imagen agregada satisfactoriamente.</div>';
        else echo '<div class="alert alert-danger alert-dismissible" role="alert" id = "add_error"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Error!</strong> Ocurrió un problema, vuelve a intentarlo más tarde.</div>';
    }

    function updImg(){
        global $connect;

        $id = $_POST['updIdGallery'];
        $title = $_POST['updTitleGallery'];
        $services = $_POST['updServGallery'];

        $queryNew = "Update galeria set galeria_titulo = '$title', galeria_servicio = '";
        $size = sizeof($services);
        $cont = 0;

        foreach ($services as $serviceX) {
            $queryNew .= "$serviceX";
            if($cont++ < ($size - 1)) $queryNew .= ",";
        }

        $queryNew .= "'";

        if($_FILES['updImgGallery']['size'] > 0) {
            $target_dirImg = "assets/img/gallery/";
            $imgFileName = $target_dirImg . basename($_FILES["updImgGallery"]["name"]);
            $imgFileType = strtolower(pathinfo($imgFileName,PATHINFO_EXTENSION));
            $imgFileName = "gallery-" . $id . "." . $imgFileType;
            $target_img = $target_dirImg . $imgFileName;
            $img = $target_img;

            $check = getimagesize($_FILES["updImgGallery"]["tmp_name"]);
            if($check !== false)  $uploadOk = 1;
            else $uploadOk = 0;

            if ($uploadOk == 0) echo "Ocurrió un error, tu archivo no se pudo subir.";
            else {
                if(file_exists($target_img)) unlink($target_img);
                move_uploaded_file($_FILES["updImgGallery"]["tmp_name"], $target_img);
                $queryNew .= ", galeria_imagen = '$img'";
            }
        }

        $queryNew .= " where galeria_ID = $id";
        $resultNew = mysqli_query($connect, $queryNew);

        if($resultNew) echo '<div class="alert alert-success alert-dismissible" role="alert" id = "add_correct"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Éxito!</strong> Imagen actualizada satisfactoriamente.</div>';
        else echo '<div class="alert alert-danger alert-dismissible" role="alert" id = "add_error"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Error!</strong> Ocurrió un problema, vuelve a intentarlo más tarde.</div>';
    }

    function deleteImg($imgID){
        global $connect;

        $queryDelete = "Delete from galeria where galeria_ID = $imgID";
        $resultDelete = mysqli_query($connect, $queryDelete);

        if($resultDelete){
            getGallery();
            echo '<script>swal("¡Éxito!", "Imagen eliminada satisfactoriamente.", "success");</script>';
        }
        else echo '<script>swal("¡Error!", "Occurió un problema, por favor vuelve a intentarlo.", "error");</script>';
    }

    function getPosts(){
        global $resultBlog, $connect;
        
        $queryBlog = "Select blog_ID as ID, blog_titulo, blog_thumbnail, blog_contenido, blog_fecha, blog_autor from blog order by ID desc";
        $resultBlog = mysqli_query($connect, $queryBlog);
    }

    function addPost($author){
        global $connect;

        $title = $_POST['titlePost'];
        $post = $_POST['textPost'];

        $queryMax = "Select MAX(blog_ID) from galeria";
        $takeMax = mysqli_query($connect, $queryMax);
        $maxInd = mysqli_fetch_array($takeMax);
        $maxInd = $maxInd[0] + 1;

        $queryNew = "Insert into blog values ($maxInd, '$title',";

        if($_FILES['thumbPost']['size'] > 0) {
            $target_dirImg = "assets/img/blog/";
            $imgFileName = $target_dirImg . basename($_FILES["thumbPost"]["name"]);
            $imgFileType = strtolower(pathinfo($imgFileName,PATHINFO_EXTENSION));
            $imgFileName = "blog-" . $maxInd . "." . $imgFileType;
            $target_img = $target_dirImg . $imgFileName;
            $img = $target_img;

            $check = getimagesize($_FILES["thumbPost"]["tmp_name"]);
            if($check !== false)  $uploadOk = 1;
            else $uploadOk = 0;

            if ($uploadOk == 0) echo "Ocurrió un error, tu archivo no se pudo subir.";
            else  move_uploaded_file($_FILES["thumbPost"]["tmp_name"], $target_img);
        }

        $queryNew .= "'$img','$post',CURDATE(),$author)";
        $resultNew = mysqli_query($connect, $queryNew);

        if($resultNew) echo '<div class="alert alert-success alert-dismissible" role="alert" id = "add_correct"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Éxito!</strong> Entrada agregada satisfactoriamente.</div>';
        else echo '<div class="alert alert-danger alert-dismissible" role="alert" id = "add_error"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Error!</strong> Ocurrió un problema, vuelve a intentarlo más tarde.</div>';
    }

    function updPost(){
        global $connect;

        $title = $_POST['updTitlePost'];
        $post = $_POST['updTextPost'];
        $id = $_POST['updIdBlog'];
        $changeThumb = 0;

        $queryNew = "Update blog set blog_titulo = '$title', blog_contenido = '$post'";

        if($_FILES['updThumbPost']['size'] > 0) {
            $changeThumb = 1;
            $target_dirImg = "assets/img/blog/";
            $imgFileName = $target_dirImg . basename($_FILES["updThumbPost"]["name"]);
            $imgFileType = strtolower(pathinfo($imgFileName,PATHINFO_EXTENSION));
            $imgFileName = "blog-" . $id . "." . $imgFileType;
            $target_img = $target_dirImg . $imgFileName;
            $img = $target_img;

            $check = getimagesize($_FILES["updThumbPost"]["tmp_name"]);
            if($check !== false)  $uploadOk = 1;
            else $uploadOk = 0;

            if ($uploadOk == 0) echo "Ocurrió un error, tu archivo no se pudo subir.";
            else {
                if(file_exists($target_img)) unlink($target_img);
                move_uploaded_file($_FILES["updThumbPost"]["tmp_name"], $target_img);
            }
        }

        if($changeThumb) $queryNew .= ", blog_thumbnail = '$img'";
        $queryNew .= " where blog_ID = $id";
        $resultNew = mysqli_query($connect, $queryNew);

        if($resultNew) echo '<div class="alert alert-success alert-dismissible" role="alert" id = "add_correct"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Éxito!</strong> Entrada agregada satisfactoriamente.</div>';
        else echo '<div class="alert alert-danger alert-dismissible" role="alert" id = "add_error"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button><strong>¡Error!</strong> Ocurrió un problema, vuelve a intentarlo más tarde.</div>';
    }

    function deletePost($postID){
        global $connect;

        $queryDelete = "Delete from blog where blog_ID = $postID";
        $resultDelete = mysqli_query($connect, $queryDelete);

        if($resultDelete){
            getPosts();
            echo '<script>swal("¡Éxito!", "Entrada eliminada satisfactoriamente.", "success");</script>';
        }
        else echo '<script>swal("¡Error!", "Occurió un problema, por favor vuelve a intentarlo.", "error");</script>';
    }
?>