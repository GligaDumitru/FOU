<?php
require_once('models/models.php');
class Controller
{
    public $model;

    public function __construct()
    {
        $this->models = new Model();
    }

    public function invoke()
    {
        $result = $this->models->getLogin();

        if ($result == 'login') {
            include 'views/afterLogin.php';
        } else {
            include 'views/login.php';
        }
    }
}
