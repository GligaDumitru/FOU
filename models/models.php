<?php
require_once("models/models.php");

class Model
{
    public function getLogin()
    {
        // hardcoded data to simulate the db
        if (isset($_REQUEST['username']) && isset($_REQUEST['password'])) {
            if ($_REQUEST['username'] == '1' && $_REQUEST['password'] == '1') {
                return 'login';
            } else {
                return 'invalid user or password';
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

    public static function addFeedback($userN, $userE, $userM)
    {
        $email = Model::formatData($userE);
        $name = Model::formatData($userN);
        $message = Model::formatData($userM);

        $db = Database::getInstance();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = " INSERT INTO feedback (name,email,message) VALUES ('$name','$email','$message');";

        if ($db->query($sql)) {
            return true;
        } else {
            return $db->errorInfo();
        }
    }
}
