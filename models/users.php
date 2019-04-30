<?php
class User
{
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }

  
    public function __toString() {
        return "My name is: {$this->name},{$this->email}\n";
      }

    public static function getUserByEmail($emailUser)
    {
        $db = Database::getInstance();
        $req = $db->prepare('SELECT * FROM users WHERE email = :email');
        $req->execute(array(':email' => $emailUser));
        $result = $req->fetch();
        return new User($result['idusers'],$result['name'],$result['email'],$result['password']);

    }
}
