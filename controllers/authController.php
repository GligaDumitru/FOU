<?php
class AuthController
{
    public $error = '';
    public function register()
    { }
    public function recoverPassword()
    { }

    public function signIn()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $emailUser = $_POST['email'];
            $passwordUser = $_POST['password'];

            if (empty($emailUser) || empty($passwordUser)) {
                $error = 'The email or password are empty!';
                exit();
            } else {
                require_once('models/signin.php');

                if (checkEmailAndPassword($emailUser, $passwordUser)) {
                    header("Location:views/pages/dashboard.php");
                } else {
                    header('Location:views/pages/login.php?controller=pages&action=login&error=badrequest');
                }
            }
        }
    }

    public function formatData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function signup()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $this->formatData($_POST['email']);
            $name = $this->formatData($_POST['name']);
            $password = md5($this->formatData($_POST['password']));

            require_once('models/signup.php');
            $result = createUser($name, $email, $password);
            if ($result === true) {
                // go to dashboard
                header("Location:views/pages/login.php?success=account");
            } else {
                header("Location:views/pages/register.php?controller=pages&action=register&error=$result");
            }
        }
    }
}
