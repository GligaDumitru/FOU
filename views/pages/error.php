<?php
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
    if (isset($_GET['error']))
        echo $_GET['error'];
    else
        echo 'error page';
}
