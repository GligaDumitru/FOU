<!DOCTYPE html>
<html lang="en">
<?php
session_start();
require_once "../../checkRoute.php";
require_once "../../routes.php";
require_once '../../controllers/fouController.php';
$totalItems = 0;
$searchName = 'all';

if (isset($_GET['folder'])) {
    $_SESSION['folder'] = $_GET['folder'];
} else if (!isset($_GET['requested'])) {
    $_SESSION['folder'] = "";
}

$folder = $_SESSION['folder'];

if (!isset($_SESSION['email'])) {
    header('Location:login.php?controller=pages&action=login&error=noaccess');
}

if (isset($_GET['requested'])) {
    if ($_GET['requested'] = 'upload') {
        require_once 'uploadfilesForm.php';
    }
}
if (isset($_GET['createdirectory'])) {

    require_once 'createDirectory.php';
}

if (isset($_GET['deletePopup']) && isset($_GET['file'])) {

    require_once 'deletePopup.php';
}
if (isset($_GET['shareFile'])) {
    $tokenSharedFile = $_GET['shareFile'];
    require_once 'shareFile.php';
}

if (isset($_GET['q'])) {
    $searchName = $_GET['q'];
}

if (isset($_GET['message'])) {
    if ($_GET['message'] == 'thankyou') {
        require_once 'thankyou.php';
    }
}
if (isset($_GET['editPopup']) && isset($_GET['file'])) {

    require_once 'editPopup.php';
}

$viewFileBy = "";
$sortFileBy = "";
$filterFileBy = "";
if (isset($_GET['viewFileBy'])) {
    $viewFileBy = $_GET['viewFileBy'];
}
if (isset($_GET['sortFileBy'])) {
    $sortFileBy = $_GET['sortFileBy'];
}
if (isset($_GET['filterFileBy'])) {
    $filterFileBy = $_GET['filterFileBy'];
}

$userName = explode(' ', $_SESSION['name']);
$userEmail = $_SESSION['email'];
$allFiles = FouController::getFiles($searchName, $viewFileBy, $sortFileBy, $filterFileBy);

$totalItems = count($allFiles);
?>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>FOU - File Online Upload</title>
    <link rel="stylesheet" href="../../assets/css/base.css" />
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <link rel="stylesheet" href="../../assets/css/responsive.css" />
    <link rel="stylesheet" href="https://yaireo.github.io/tagify/dist/tagify.css" />

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />
    <link rel="icon" href="https://cdn.pixabay.com/photo/2016/01/03/00/43/upload-1118929_960_720.png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>

<body onload="emailForUser();">
    <?php
    require_once 'loader.php'; ?>
    <div class="app grid row hide fadeIn animated" style="min-width:1120px;" id="main-header">
        <div class="col6 no-padding">
            <div class="app-menu-primary">
                <div class="user-details">
                    <div class="avatar-user">
                        <a href="../../index.php">
                            <img src="https://png.pngtree.com/svg/20170331/businessman_863430.png" alt="avatar user" />
                        </a>
                    </div>
                    <div class="user">
                        <span class="bounce animated" id="userEmail"></span>
                        <span class="name">Hi, <?php echo ucfirst(strtolower($userName[0])); ?></span>
                    </div>
                </div>
                <div class="nav-bar sidebar">


                    <ul id="mainFolder" class="sidebar-list">
                        <?php require_once 'foldersTree.php'; ?>
                        <li>
                            <a href="#" disabled>
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
                        <!-- <li>
                            <a href="#">
                                <i class="fas fa-history"></i>
                                <span class="name">
                                    Istoric/Expirate
                                </span>
                            </a>
                        </li> -->
                        <!-- <li>
                            <a href="#">
                                <i class="fas fa-poll-h"></i>
                                <span class="name">
                                    Statistici
                                </span>
                            </a>
                        </li> -->
                        <li>
                            <a href="/FOU/views/pages/about.php">
                                <i class="fas fa-people-carry"></i>
                                <span class="name">
                                    Ajutor
                                </span>
                            </a>
                        </li>
                        <!-- <li>
                            <a href="#">
                                <i class="fa fa-cog"></i>
                                <span class="name">
                                    Setari
                                </span>
                            </a>
                        </li> -->
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
                <a href="/FOU/"> <button class="app button special red"> <i class="fas fa-home"></i> </button></a>
                <a href="/FOU/views/pages/about.php"> <button class="app button special blue"><i class="far fa-question-circle"></i> </button></a>

                <a href="#">
                    <a href="?requested=upload">
                        <button class="app button special green">
                            <i class="fas fa-upload"></i>
                        </button>
                    </a>

                </a>
                <a href="?createdirectory=true">
                    <button class="app button special blue">
                        <i class="fas fa-folder-plus 7x"></i>
                    </button>
                </a>

                <input type="text" id="inputSearch" value="<?php echo $searchName === 'all' ? '' : $searchName; ?>" class="app button special input" placeholder="Cauta fisiere dupa nume..">
                <button onclick="searchFiles('inputSearch');" class="app button special green">
                    <i class="fas fa-search"></i>
                </button>
            </div>
            <div class="main-options second">
                <div class="file-conter">
                    <span class="number-of-files" id="numberOfFiles"><?php echo $totalItems; ?></span>
                    <span> files</span>

                </div>
                <div class="filterContainer">
                    <?php
                    if ($sortFileBy !== "") {
                        echo '
                                    <span class="filter sort">
                                        Sortare :
                                        ' . explode('_', $sortFileBy)[0] . ' ' . explode('_', $sortFileBy)[1] . '
                                    </span>
                                ';
                    }
                    if ($folder !== "") {
                        echo '
                                    <span class="filter sort">
                                        Folder :
                                        __base/' . $folder . '
                                    </span>
                                ';
                    }
                    if ($searchName !== "" && $searchName !== "all") {
                        echo '
                                    <span class="filter sort">
                                        Cautare :
                                        ' . $searchName . '
                                    </span>
                                ';
                    }
                    if ($filterFileBy !== "") {
                        echo '
                                    <span class="filter filterBy">
                                        Extensie:
                                        ' . explode('_', $filterFileBy)[0] . '
                                    </span>
                                ';
                    }
                    if ($viewFileBy !== "") {
                        echo '
                                    <span class="filter view">
                                    Afisare dupa:
                                        ' . explode('_', $viewFileBy)[0] . '
                                    </span>
                                ';
                    }
                    if ($viewFileBy !== "" || $filterFileBy !== "" || $sortFileBy !== "" || $folder !== "" || $searchName !== "all") {
                        echo '
                                    <a href="/FOU/views/pages/dashboard.php">
                                    <button class="app button special" title="Clear All Fields">
                                    <i class="far fa-times-circle"></i>
                                    </button>
                                </a>';
                    }

                    ?>
                </div>


                <div class="view-options">
                    <ul class="view-list-options">
                        <li data-view="view">
                            <a href="#"><i class="fas fa-th-list"></i> Vezi dupa</a>
                            <ul data-view="view" class="view-mode">
                                <li><a href="#" onclick="addFilter('viewFileBy','createdAt','ASC');"><i class="fas fa-sort-numeric-down"></i> Created at ASC</a></li>
                                <li><a href="#" onclick="addFilter('viewFileBy','createdAt','DESC');"><i class="fas fa-sort-numeric-up"></i> Created at DESC</a></li>
                                <li><a href="#" onclick="addFilter('viewFileBy','updatedAt','ASC');"><i class="fas fa-sort-numeric-down"></i> Updated at ASC</a></li>
                                <li><a href="#" onclick="addFilter('viewFileBy','updatedAt','DESC');"><i class="fas fa-sort-numeric-up"></i> Updated at DESC</a></li>
                            </ul>
                        </li>
                        <li data-view="sort">
                            <a href="#"><i class="fas fa-sort-alpha-up"></i> Sort</a>
                            <ul data-view="sort" class="view-mode">
                                <li><a href="#" onclick="addFilter('sortFileBy','name','ASC');" class="<?php if ($sortFileBy == 'name_ASC') {
                                                                                                            echo 'active-filter';
                                                                                                        }
                                                                                                        ?>"><i class="fas fa-sort-numeric-down"></i> Nume ASC</a></li>
                                <li><a href="#" onclick="addFilter('sortFileBy','name','DESC');" class="<?php if ($sortFileBy == 'name_DESC') {
                                                                                                            echo 'active-filter';
                                                                                                        }
                                                                                                        ?>"><i class="fas fa-sort-numeric-up"></i> Nume DESC</a></li>
                                <li><a href="#" onclick="addFilter('sortFileBy','size','ASC');" class="<?php if ($sortFileBy == 'size_ASC') {
                                                                                                            echo 'active-filter';
                                                                                                        }
                                                                                                        ?>"><i class="fas fa-sort-numeric-down"></i> Marime ASC</a></li>
                                <li><a href="#" onclick="addFilter('sortFileBy','size','DESC');" class="<?php if ($sortFileBy == 'size_DESC') {
                                                                                                            echo 'active-filter';
                                                                                                        }
                                                                                                        ?>"><i class="fas fa-sort-numeric-up"></i> Marime DESC</a></li>
                            </ul>
                        </li>
                        <li data-view="filters">
                            <a href="#"><i class="fas fa-filter"></i> Filter</a>
                            <ul data-view="filters" class="view-mode">
                                <li><a href="#" onclick="addFilter('filterFileBy','txt');" class="<?php if ($filterFileBy == 'txt_ASC') {
                                                                                                        echo 'active-filter';
                                                                                                    }
                                                                                                    ?>"><i class="far fa-file-code"></i> txt</a></li>
                                <li><a href="#" onclick="addFilter('filterFileBy','html');" class="<?php if ($filterFileBy == 'html_ASC') {
                                                                                                        echo 'active-filter';
                                                                                                    }
                                                                                                    ?>"><i class="far fa-file-code"></i> html</a></li>
                                <li><a href="#" onclick="addFilter('filterFileBy','docs');" class="<?php if ($filterFileBy == 'docs_ASC') {
                                                                                                        echo 'active-filter';
                                                                                                    }
                                                                                                    ?>"><i class="far fa-file-code"></i> docs</a></li>
                                <li><a href="#" onclick="addFilter('filterFileBy','ppt');" class="<?php if ($filterFileBy == 'ppt_ASC') {
                                                                                                        echo 'active-filter';
                                                                                                    }
                                                                                                    ?>"><i class="far fa-file-code"></i> ppt</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-options table-view">
                <?php
                require_once 'view-table.php';
                ?>
            </div>
        </div>

    </div>
    <script src="https://yaireo.github.io/tagify/dist/tagify.js"></script>

    <script src="../../assets/js/upload.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/validate.js"></script>
</body>

</html>