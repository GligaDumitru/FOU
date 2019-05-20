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
                    <a href="login.php?controller=pages&action=login" class="link mainLink active">
                        <i class="far fa-user"></i> Login
                    </a>
                </li>
                <li class="item mainItem">
                    <a href="about.php?controller=pages&action=about" class="link mainLink ">
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

                <form action="/FOU/?controller=fou&action=feedback" class="loginform" method="POST" onsubmit="return validateSignupForm();">
                    <span class="titleLogin">
                        Contact Form
                    </span>
                    <div class="group-items">
                        <label for="userName">Nume Prenume</label>
                        <input type="name" name="userName" id="userName" maxlength="45" minlength=5 onkeyup="checkInput(event);" required />
                    </div>
                    <div class="group-items">
                        <label for="userEmail">Email</label>
                        <input type="email" maxlength="25" id="userEmail" minlength="5" name="userEmail" onkeyup="checkInput(event);" maxlength="100" required />
                    </div>
                    <div class="group-items">
                        <label for="userPassword">Message</label>
                        <textarea type="text" name="userMessage" id="userMessage" rows=8 maxlength="300" onkeyup="checkInput(event);" required ></textarea>
                    </div>
                    <div class="errorContainerForCheck" id="errorContainerIdForCheck" style="display:none">
                        <span class="errorMessageForCheck"></span>
                        <span class="closeError" title="Close Message" id="closeErrorMessageForCheck"><i class="far fa-times-circle"></i></span>
                    </div>
                    <div class="group-items">
                        <button class="app button submitLogin">
                            Submit
                        </button>
                    </div>

                    <?php
                    if (isset($_GET['error'])) {
                        $errorMsg = "";
                        switch ($_GET['error']) {
                            case 'badrequest':
                                $errorMsg = "Email or password are incorect";
                                break;
                            case 'noaccess':
                                $errorMsg = "You need to login";
                                break;
                        }
                        echo '
                            <div class="errorContainer" id="errorContainerId">
                                <span class="errorMessage">' . $errorMsg . '</span>
                                <span class="closeError" title="Close Message" id="closeErrorMessage"><i class="far fa-times-circle"></i></span>
                            </div>';
                    }
                    ?>

                </form>
            </div>
        </div>
    </header>
</body>
<script src="../../assets/js/validate.js"></script>


</html>