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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" />
</head>

<body>
    <header class="app mainHeader">
        <nav class="app mainNav">
            <ul class="mainList">
                <li class="item mainItem">
                    <a href="login.html" class="link mainLink active">
                        <i class="far fa-user"></i> Schimb Parola
                    </a>
                </li>
                <li class="item mainItem">
                    <a href="despre.html" class="link mainLink ">
                        <i class="far fa-question-circle"></i> Despre
                    </a>
                </li>
                <li class="item mainItem">
                    <a href="home.html" class="link mainLink ">
                        <i class="fas fa-home"></i> Acasa
                    </a>
                </li>
            </ul>
        </nav>
        <div class="row">
            <div class="col center">
                <form 
                    class="loginform">
                    <span class="titleLogin">
                        Ai uitat ceva?
                    </span>
                    <div class="group-items">
                        <label for="tokenToReset">Token To Reset</label>
                        <input type="tokenToReset" name="tokenToReset" maxlength="100" required />
                    </div>
                    <div class="group-items options">
                        <a class="left" href="login.php">
                            Intra in cont
                        </a>
                        <a class="right" href="register.php?controller=pages&action=register">
                            Creaza cont
                        </a>
                    </div>
                    <div class="group-items">
                        <a type="text" onclick="checkForPassword();" class="app button submitLogin">
                            Vezi parola
                        </a>
                    </div>
                    <div class="successContainer" id="successContainerId">
                        <span class="successMessage" id="successMessageId" ></span>
                        <span class="closeSuccess" title="Close Message" id="closeSuccessMessage"><i
                                class="far fa-times-circle"></i></span>
                    </div>

                </form>
            </div>
        </div>
    </header>

    <script src="../../assets/js/validate.js"></script>
</body>

</html>