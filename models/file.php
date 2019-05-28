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

    public static function deleteFileByToken($token)
    {
        $db = Database::getInstance();
        $sql = "DELETE FROM files WHERE token='" . $token . "'";
        if ($db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public static function getFiles($tableName, $origin, $sortFileBy, $sortType, $type, $typeOfFile, $viewDate)
    {
        $db = Database::getInstance();
        $list = [];
        $newList = array();
        $sql = "SELECT * FROM " . $tableName . " WHERE origin= '$origin' ";

        // if($sortType != ""){
        //     $sql = $sql . "ORDER BY ". $sortType .' '.$sortType;
        // }
        if($typeOfFile != ""){
            $sql = $sql ." AND ext= '$typeOfFile' ";
        }
        if ($sortFileBy != "") {
            // createdAT || updatedAt not done ORDER BY supplier_id DESC
            $sql = $sql . "ORDER BY " . $sortFileBy . " " . $sortType;
        }
        // $sql->execute();
        $req = $db->query($sql);
        foreach ($req->fetchAll() as $result) {
            array_push($newList,
                array("id" => $result['id'],
                    "name" => $result['name'],
                    "ext" => $result['ext'],
                    "size" => $result['size'],
                    "type" => $result['type'],
                    "path" => $result['path'],
                    "folderName" => $result['folderName'],
                    "token" => $result['token'],
                    "origin" => $result['origin'])
            );
            // $list[] = new File(
            //     $file['id'],
            //     $file['name'],
            //     $file['ext'],
            //     $file['size'],
            //     $file['type'],
            //     $file['path'],
            //     $file['folderName'],
            //     $file['token'],
            //     $file['origin']);
        }
        return $newList;
    }

    public function __toString()
    {
        return "File: {$this->name},{$this->token}\n";
    }

}
