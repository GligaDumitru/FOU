<?php
class PagesController
{
    public function error()
    {
        require_once('views/pages/error.php');
    }

    public function register()
    { }

    public function main()
    { }
    public function about()
    { }
    public function login()
    { }
    public function noConnection()
    {
        require_once('views/pages/error.php');
    }
    public function logout()
    {
        header("Location:/FOU");
      session_unset();
      session_destroy();
    }
}
