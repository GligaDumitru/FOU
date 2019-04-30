<?php
class File
{
    public $id;
    public $name;
    public $ext;
    public $size;
    public $type;
    public $path;
    public $folderName;
    public $token;
    public $origin;

    public function __construct(
        $id,
        $name,
        $ext,
        $size,
        $type,
        $path,
        $folderName,
        $token,
        $origin) {

        $this->$id = $id;
        $this->$name = $name;
        $this->$ext = $ext;
        $this->$size = $size;
        $this->$type = $type;
        $this->$path = $path;
        $this->$folderName = $folderName;
        $this->$token = $token;
        $this->$origin = $origin;
    }

    public static function getFileByToken($token)
    {
        $db = Database::getInstance();
        $sql = $db->prepare('SELECT * FROM files WHERE token = :token');
        $sql->execute(array(':token' => $token));
        $result = $sql->fetch();
        // return new File(
        //     $result['id'],
        //     $result['name'],
        //     $result['ext'],
        //     $result['size'],
        //     $result['type'],
        //     $result['path'],
        //     $result['folderName'],
        //     $result['token'],
        //     $result['origin']
        // );

        return array("id" => $result['id'],
            "name" => $result['name'],
            "ext" => $result['ext'],
            "size" => $result['size'],
            "type" => $result['type'],
            "path" => $result['path'],
            "folderName" => $result['folderName'],
            "token" => $result['token'],
            "origin" => $result['origin']);
    }

    public function __toString()
    {
        return "File: {$this->name},{$this->token}\n";
    }

}
