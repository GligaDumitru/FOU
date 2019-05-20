<!DOCTYPE html>
<html lang="en">
<?php

require_once "checkRoute.php";
require_once "routes.php";

if (isset($_GET['message'])) {
    if ($_GET['message'] == 'thankyou') {
        require_once 'views/pages/thankyou.php';
    }
}
// echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FOU - File Online Upload</title>
    <link rel="stylesheet" href="assets/css/base.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/responsive.css" />
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
</head>

<body>
    <!-- <div class="onLoad-loading-page" id="loading-page"></div> -->
    <div id="loader">
        <div class="loader-content">
            <div id="shadow"></div>
            <div id="box"></div>
        </div>
    </div>
    <header class="app mainHeader hide" id="main-header">
        <nav class="app mainNav">
            <ul class="mainList">
                <?php
if ($isLogged === true) {
    echo '
                    <li class="item mainItem">
                        <a href="views/pages/dashboard.php" class="link mainLink">
                            <i class="far fa-user"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    ';
} else {
    echo '
                    <li class="item mainItem">
                        <a href="views/pages/login.php?controller=pages&action=login" class="link mainLink">
                            <i class="far fa-user"></i> <span>Login</span>
                        </a>
                    </li>
                    ';
}
?>

                <li class="item mainItem">
                    <a href="views/pages/about.php?controller=pages&action=about" class="link mainLink">
                        <i class="far fa-question-circle"></i> <span>Despre</span>
                    </a>
                </li>
                <li class="item mainItem">
                    <a href="/FOU" class="link mainLink active">
                        <i class="fas fa-home"></i> <span>Acasa</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="row">
            <div class="col center">
                <div class="app details">
                    <div class="app logo">
                        <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" alt="logo"
                            class="logoImg" />
                    </div>
                    <div class="app appName">
                        <span>FOU - File Online Upload</span>
                    </div>
                    <div class="app subtitleName">
                        <span>The best file uploader in the city</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="icon-bar">
            <a href="#" class="facebook" data-title="Facebook"><i class="fa fa-facebook"></i></a>
            <a href="#" class="twitter" data-title="Twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="google" data-title="Gmail"><i class="fa fa-google"></i></a>
            <a href="#" class="linkedin" data-title="Linkedin"><i class="fa fa-linkedin"></i></a>
            <a href="#" class="youtube" data-title="youtube"><i class="fa fa-youtube"></i></a>
        </div>
        <div class="icon-bar rightPosition">
            <a href="#" class="feedback" title="Feedback"><i class="material-icons">feedback</i></a>
        </div>
        <div class="row">
            <div class="formContainerUpload">
                <form method="post" action="?controller=fou&action=upload" enctype="multipart/form-data">
                    <div class="box__input">
                        <input class="box__file" onchange="handleChangeInput(event);" type="file" name="files[]"
                            id="file" multiple style="display:none" />
                        <label class="app labelInput" for="file"><strong>Choose a file</strong><span
                                class="box__dragndrop" id="optionToDragAndDrop"> or drag it here</span>.</label>
                        <br>
                    </div>
                    <div class="boxFileUploaded">
                        <span id="fileForUpload">No file Selected</span>
                    </div>
                    <button class="app button blue" name="upload" id="submitFile" type="submit">Upload</button>

                </form>
            </div>
        </div>
    </header>
</body>
<script src="assets/js/upload.js"></script>

</html>