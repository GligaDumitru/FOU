<?php
// require_once("checkRoute.php");
// require_once("checkRoute.php");
// require_once("routes.php");
if (isset($_GET['controller']) && isset($_GET['action'])) {
    $controller = $_GET['controller'];
    $action     = $_GET['action'];
    switch ($action) {
        case 'noConnection':
            echo '<p>Hmm, You dont have internet...</p>';
            break;
        default:
            echo 'error page';
    }
} else {
    echo 'errror';
}
