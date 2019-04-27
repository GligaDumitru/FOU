<!DOCTYPE html>
<html lang="en">
<?php
require_once("../../checkRoute.php");
require_once("../../routes.php");

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FOU - File Online Upload</title>
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" />
</head>

<body>
    <header class="app mainHeader">
        <nav class="app mainNav">
            <ul class="mainList">
                <li class="item mainItem">
                    <a href="login.php?controller=pages&action=login" class="link mainLink">
                        <i class="far fa-user"></i> Login
                    </a>
                </li>
                <li class="item mainItem">
                    <a href="about.php?controller=pages&action=about" class="link mainLink active">
                        <i class="far fa-question-circle"></i> Despre
                    </a>
                </li>
                <li class="item mainItem">
                    <a href="/FOU" class="link mainLink ">
                        <i class="fas fa-home"></i> Acasa
                    </a>
                </li>
            </ul>
        </nav>
        <div class="row">
            <div class="col center">
                <div class="app details aboutPage">
                    <div class="app logo">
                        <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" alt="logo" class="logoImg" />
                    </div>
                    <div class="app appName">
                        <span>FOU - File Online Upload</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
</body>

</html>