<?php
class User
{
    public $id;
    public $name;
    public $email;
    public $password;
    public $directory;

    public function __construct($id, $name, $email, $password, $directory)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->directory = $directory;
    }

    public function __toString()
    {
        return "My name is: {$this->name},{$this->email}\n";
    }

    public static function getUserByEmail($emailUser)
    {
        $db = Database::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array(':email' => $emailUser));
        $result = $req->fetch();
        return new User($result['idusers'], $result['name'], $result['email'], $result['password'], $result['directory']);
    }

    public static function createDirector($dirName)
    {
        $userInfo = User::getUserByEmail($_SESSION['email']);
        $userDir = $userInfo->directory;
        if ($userDir === "") {
            $userDir = $dirName;
        } else {
            $userDir .= "___" . $dirName;
        }

        $db = Database::getInstance();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE users SET directory='$userDir' WHERE idusers=$userInfo->id";

        if ($db->query($sql)) {
            return true;
        } else {
            return $db->errorInfo();
        }
    }
}
