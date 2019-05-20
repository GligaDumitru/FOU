<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "../../checkRoute.php";
require_once "../../routes.php";

if (!isset($_SESSION['email'])) {
    header('Location:login.php?controller=pages&action=login&error=noaccess');
}

$userName = explode(' ', $_SESSION['name']);
$userEmail = $_SESSION['email'];

?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FOU - File Online Upload</title>
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <!-- <link rel="stylesheet" href="../../assets/fontawesome/css/fontawesome-all.css" /> -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" />
</head>

<body>
    <div class="app grid row " style="min-width:1120px;">
        <div class="col6 no-padding">
            <div class="app-menu-primary">
                <div class="user-details">
                    <div class="avatar-user">
                        <a href="index.html">
                            <img src="https://png.pngtree.com/svg/20170331/businessman_863430.png" alt="avatar user" />
                        </a>
                    </div>
                    <div class="user">
                        <span><?php echo $userEmail ?></span>
                        <span class="name">Hi, <?php echo ucfirst(strtolower($userName[0])); ?></span>
                    </div>
                </div>
                <div class="nav-bar sidebar">
                    <ul id="mainFolder" class="sidebar-list">
                        <li>

                            <a href="#" class="listOfFolder">
                                <div style="display: flex;align-items: baseline;">
                                    <i id="caretChange" onclick="toggleFolder('subfolder level-1','caretChange');"
                                        class="fa fa-caret-right folder-show"></i>

                                    <i class="fas fa-folder-open"></i>
                                    <span class="name">Foldere</span>
                                </div>
                                <div>
                                    <span class="amount">10</span>
                                </div>

                            </a>
                            <ul class="subfolder level-1" style="display: none;">
                                <li>
                                    <a href="#" class="listOfFolder">
                                        <div style="display: flex;align-items: baseline;">
                                            <i id="caretChangeTest1"
                                                onclick="toggleFolder('subfolder level-2 test1','caretChangeTest1');"
                                                class="fa fa-caret-right folder-show"></i>

                                            <i class="fas fa-folder-open"></i>
                                            <span class="name">Foldere</span>
                                        </div>
                                        <div>
                                            <span class="amount">10</span>
                                        </div>

                                    </a>
                                    <ul class="subfolder level-2 test1" style="display: none;">
                                        <li>
                                            <a href="#" class="listOfFolder">
                                                <div style="display: flex;align-items: baseline;">
                                                    <i id="caretChangeTest11"
                                                        onclick="toggleFolder('subfolder level-3 test11','caretChangeTest11');"
                                                        class="fa fa-caret-right folder-show"></i>

                                                    <i class="fas fa-folder-open"></i>
                                                    <span class="name">Foldere</span>
                                                </div>
                                                <div>
                                                    <span class="amount">10</span>
                                                </div>

                                            </a>
                                            <ul class="subfolder level-3 test11" style="display: none;">
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-folder"></i>
                                                        <span class="name">Folder 1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-folder"></i>
                                                        <span class="name">Folder 1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-folder"></i>
                                                        <span class="name">Folder 1</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-folder"></i>
                                                        <span class="name">Folder 1</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" class="listOfFolder">
                                        <div style="display: flex;align-items: baseline;">
                                            <i id="caretChangeTest2"
                                                onclick="toggleFolder('subfolder level-2 test2','caretChangeTest2');"
                                                class="fa fa-caret-right folder-show"></i>

                                            <i class="fas fa-folder-open"></i>
                                            <span class="name">Foldere</span>
                                        </div>
                                        <div>
                                            <span class="amount">10</span>
                                        </div>

                                    </a>
                                    <ul class="subfolder level-2 test2" style="display: none;">
                                        <!-- <li>
                                            <a href="#" class="listOfFolder"
                                                onclick="toggleFolder('subfolder level-1');">
                                                <div style="display: flex;align-items: baseline;">
                                                    <i id="caretChange" class="fa fa-caret-right folder-show"></i>

                                                    <i class="fas fa-folder-open"></i>
                                                    <span class="name">Foldere</span>
                                                </div>
                                                <div>
                                                    <span class="amount">10</span>
                                                </div>

                                            </a>

                                        </li> -->
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-folder"></i>
                                                <span class="name">Folder 1</span>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- <li>
                                    <a href="#">
                                        <i class="fa fa-folder"></i>
                                        <span class="name">Folder 1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-folder"></i>
                                        <span class="name">Folder 1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-folder"></i>
                                        <span class="name">Folder 1</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="fa fa-folder"></i>
                                        <span class="name">Folder 1</span>
                                    </a>
                                </li> -->
                            </ul>
                        </li>

                        <li>
                            <a href="#">
                                <i class="fa fa-clock"></i>
                                <span class="name">
                                    Fisiere Recente
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-trash"></i>
                                <span class="name">
                                    Cos de gunoi
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-history"></i>
                                <span class="name">
                                    Istoric/Expirate
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-poll-h"></i>
                                <span class="name">
                                    Statistici
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fas fa-people-carry"></i>
                                <span class="name">
                                    Ajutor
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span class="name">
                                    Setari
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="/FOU?controller=pages&action=logout">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="name">
                                    Deconectare
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-dashboard-page">

            <div class="main-options">
                <a href="/FOU/"> <button class="app button special red"> <i class="fas fa-home"></i> Home</button></a>
                <a href="/FOU/views/pages/about.php"> <button class="app button special blue"><i
                            class="far fa-question-circle"></i> Detalii</button></a>

                <a href="#">
                    <button class="app button special green">
                        <i class="fas fa-upload"></i>
                    </button>
                </a>
                <a href="#">
                    <button class="app button special blue">
                        <i class="fas fa-folder-plus 7x"></i>
                    </button>
                </a>
            </div>
            <div class="main-options second">
                <div class="file-conter">
                    <span class="number-of-files">0</span>
                    <span> files</span>
                </div>
                <div class="view-options">
                    <ul class="view-list-options">
                        <li data-view="view">
                            <a href="#"><i class="fas fa-th-list"></i> View</a>
                            <ul data-view="view" class="view-mode">
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                            </ul>
                        </li>
                        <li data-view="sort">
                            <a href="#"><i class="fas fa-sort-alpha-up"></i> Sort</a>
                            <ul data-view="sort" class="view-mode">
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                            </ul>
                        </li>
                        <li data-view="filters">
                            <a href="#"><i class="fas fa-filter"></i> Filter</a>
                            <ul data-view="filters" class="view-mode">
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                            </ul>
                        </li>
                        <li data-view="notifications">
                            <a href="#"><i class="fas fa-bell"></i> Notifications</a>
                            <ul data-view="notifications" class="view-mode">
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                                <li><a href="#">Link 1</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-options table-view">
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox" /></th>
                            <th><i class="fas fa-id-card-alt"></i> Nr.</th>
                            <th> <i class="fas fa-file-signature"></i> Nume</th>
                            <th><i class="fab fa-typo3"></i> Extensie</th>
                            <th><i class="fas fa-expand"></i> Marime</th>
                            <th><i class="fas fa-file-code"></i> Tip</th>
                            <th><i class="far fa-folder-open"></i> Number Director</th>
                            <th>
                                <i class="fas fa-share-alt"></i> Distribuie
                            </th>
                            <th>
                                <i class="fas fa-download"></i> Descarca
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>22</td>
                            <td>
                                <button class="app button special red">
                                    <i class="fas fa-share"></i>
                                </button>
                            </td>
                            <td>
                                <button class="app button special green">
                                    <i class="fas fa-download"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <script src="../../assets/js/main.js"></script>
</body>

</html>