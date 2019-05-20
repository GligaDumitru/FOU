<?php
class AuthController
{
    public $error = '';
    public function register()
    { }
    public function recoverPassword()
    {
        // $to = "iulianbroasca@yahoo.ro"; // this is your Email address
        // $from = "iuli_uly_2009@yahoo.com"; // this is the sender's Email address
        // $first_name = "Iulian";
        // $last_name = "IOIO";
        // $subject = "Form submission";
        // $subject2 = "Copy of your form submission";
        // $message = $first_name . " " . $last_name . " wrote the following:" . "\n\n" . "mess1";
        // $message2 = "Here is a copy of your message " . $first_name . "\n\n" . "mess2";
    
        // $headers = "From:" . $from;
        // $headers2 = "From:" . $to;
        // mail($to,$subject,$message,$headers);
        // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender
        // echo "Mail Sent. Thank you " . $first_name . ", we will contact you shortly.";
        // // You can also use header('Location: thank_you.php'); to redirect to another page.
    }

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
