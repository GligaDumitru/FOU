<?php
session_start();
require_once "../../checkRoute.php";
require_once "../../routes.php";

?>
<!DOCTYPE html>
<html lang="en">


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
                <?php
if ($isLogged === true) {
    echo '
                    <li class="item mainItem">
                        <a href="dashboard.php" class="link mainLink">
                            <i class="far fa-user"></i> <span>Dashboard</span>
                        </a>
                    </li>
                    ';
} else {
    echo '
                    <li class="item mainItem">
                        <a href="login.php?controller=pages&action=login" class="link mainLink">
                            <i class="far fa-user"></i> <span>Login</span>
                        </a>
                    </li>
                    ';
}
?>
                <!-- <li class="item mainItem">
                    <a href="login.php?controller=pages&action=login" class="link mainLink">
                        <i class="far fa-user"></i> Login
                    </a>
                </li> -->
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
    </header>

    <div class="row">
        <div class="col center">
            <div class="app details aboutPage">
                <div class="app logo">
                    <img src="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" alt="logo"
                        class="logoImg" />
                </div>
                <div class="app appName">
                    <span>FOU - File Online Upload</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <h1 class="title-about">
            Despre noi
        </h1>
        <div class="app grid">
            <div class="col2 center">
                <div class="view team">
                    <div class="member logo">
                        <img src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-9/18268465_1524345054272007_10926775853686343_n.jpg?_nc_cat=110&_nc_ht=scontent-vie1-1.xx&oh=cb0d5247a8d39b323798f6a552b95e3e&oe=5D9ED323"
                            alt="">
                    </div>
                    <div class="member name">
                        Gliga Dumitru
                    </div>
                    <div class="member description">
                        <p>Salut sunt Daniel, sunt pasionat de masini, de asemenea imi place sa conduc si nu numai imi
                            place sa fiu mecanicul masinii mele. O alta pasiune a inceput inca din liceu si este cea
                            pentru web.</p>
                    </div>
                </div>
            </div>
            <div class="col2 center">
                <div class="view team">
                    <div class="member logo">
                        <img src="https://scontent-vie1-1.xx.fbcdn.net/v/t1.0-9/19959088_1382467555123328_4825945960861699455_n.jpg?_nc_cat=101&_nc_ht=scontent-vie1-1.xx&oh=c785890bc4a38ae6768fb8734bf87f3e&oe=5D9AA4F6"
                            alt="">
                    </div>
                    <div class="member name">
                        Broasca Iulian
                    </div>
                    <div class="member description">
                        <p>Salut sunt Iulian si sunt o persoana pasionata de sporturi, practic sporturi atat de sezon,
                            dar si cele care pot fi practitate mereu. O alta pasiune a inceput inca din liceu si este
                            cea de Game Dev si XR.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <h1 class="title-about">
        Despre aplicatie
    </h1>
    <div class="row">
        <div class="app grid">
            <div class="col3 center">
                <div class="view application">
                    <div class="application logo">
                        <img src="https://pkief.gallerycdn.vsassets.io/extensions/pkief/material-icon-theme/3.8.0/1558820966737/Microsoft.VisualStudio.Services.Icons.Default"
                            alt="">
                    </div>
                    <div class="application name">
                        Prelucrarea fisierelor
                    </div>
                    <div class="application description">
                        <p>Aplicatia noastra permite stocarea fisierelor tale dar si stocarea pe o durata scurta de timp
                            pentru cei care doresc sa trimita rapid un fisier. </p>
                    </div>
                </div>
            </div>
            <div class="col3 center">
                <div class="view application">
                    <div class="application logo">
                        <img src="https://cdn2.iconfinder.com/data/icons/business-1-21/100/icon-fast-2-512.png" alt="">
                    </div>
                    <div class="application name">
                        Eficient
                    </div>
                    <div class="application description">
                        <p>Poti sa iti accesezi fisiele foarte rapid si sa le impartasesti cu altii doar prin selectarea
                            lor
                            si apasarea unui buton pentru generea unui link.</p>
                    </div>
                </div>
            </div>
            <div class="col3 center">
                <div class="view application">
                    <div class="application logo">
                        <img src="http://www.ninoproperties.com/wp-content/uploads/2014/01/utilities-icon-copy.png"
                            alt="">
                    </div>
                    <div class="application name">
                        Util
                    </div>
                    <div class="application description">
                        <p>Ai acces la fisierele tale de oriunde, fiind tinute in aplicatia noastra, organizare de tine
                            fara a le mai stoca si a avea grija de device-uri externe.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <h1 class="title-about">
        Ghid de utilizare
    </h1>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/login.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        LOGIN
                    </div>
                    <div class="application description">
                        <p>Primul pas pentru a avea acces la functionalitatea aplicatiei, trebuie sa iti creezi un cont
                            sau sa te loghezi.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/create_account.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Creare cont
                    </div>
                    <div class="application description">
                        <p>Daca nu ai deja un cont, iti poti crea foarte usor unul.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/first_page.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Dashboard
                    </div>
                    <div class="application description">
                        <p>Dupa ce te-ai logat in aplicatie, iti va aparea aceasta pagina reprezentand dashboard-ul.
                            Aici vei putea sa iti adaugi contentul dorit.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/after_uploading.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Incarcarea fisierului
                    </div>
                    <div class="application description">
                        <p>Incarcarea fisierului se face de pe cel de-al treilea buton, iar dupa ce ai ales fisierului
                            si ai apasat pe Upload, iti va aparea aceasta fereastra.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/create_folder.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Crearea folderelor
                    </div>
                    <div class="application description">
                        <p>Pentru ati organiza fisierele, poti sa iti creezi foldere pentru acestea apasand pe cel de-al
                            patrulea buton.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/content.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Content
                    </div>
                    <div class="application description">
                        <p>Pentru fiecare fisier putem sa il distribuim, descarca, sterge dar si sa-l modificam. Daca
                            dorim sa cautam un fisier il putem cauta prin search-ul de sus dar si prin filtrele din
                            partea dreapta.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/distrubuie_content.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Distribuie
                    </div>
                    <div class="application description">
                        <p>Dupa apasarea butonului vom vedea acest pop-up, avand un link de descarcare catre fisierul
                            ales.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/descarca_content.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Descarca
                    </div>
                    <div class="application description">
                        <p>Daca doresti sa folosesti un fisier,
                            totul ce trebuie sa faci e sa apesi pe butonul de descarca,
                            iar fisierul se va descarca local pentru al utiliza.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/sterge_content.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Sterge
                    </div>
                    <div class="application description">
                        <p>Prin apasarea butonului Sterge, alegi sa indepartezi fisierul din folder.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="row">
        <div class="app grid">
            <div class="col center">
                <div class="view application">
                    <div class="application logo large">
                        <img src="../../assets/images/modifica_content.PNG" class="normal" alt="">
                    </div>
                    <div class="application name">
                        Modifica
                    </div>
                    <div class="application description">
                        <p>Daca doresti sa modifici numele fisierului sau sa adaugi o descriere sau un tag,
                            apasand pe acest buton poti sa iti personalizezi fisierul.</p>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <a href="../../doc/documentation.html">
        <h1 class="title-about">
            Documentatie
        </h1>
    </a>
    <footer>
        FOU - File Online Upload ..... Uploaded by : Gliga Dumitru | Broasca Iulian
    </footer>
</body>

</html>