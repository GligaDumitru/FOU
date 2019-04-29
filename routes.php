<?php
function invoke($controller, $action)
{
    require_once('controllers/' . $controller . 'Controller.php');

    // here will require the models
    require_once('connection.php');
    require_once('models/users.php');

    // switch through controllers options
    switch ($controller) {
        case 'auth':
            $controller = new AuthController();
            break;
        case 'pages':
            $controller = new PagesController();
            break;
    }

    // call the action received from url

    $controller->{$action}();
}

$controllersArray = array(
    'pages' => ['error', 'register', 'main', 'about', 'login', 'noConnection', 'logout'],
    'auth' => ['signup', 'signin', 'recoverPassword', 'signup'],
);

if (array_key_exists($controller, $controllersArray)) {
    if (in_array($action, $controllersArray[$controller])) {
        invoke($controller, $action);
    } else {
        invoke('pages', 'error');
    }
} else {
    invoke('pages', 'error');
}
