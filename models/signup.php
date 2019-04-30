<?php
function createUser($name, $email, $pass)
{
    $db = Database::getInstance();
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = " INSERT INTO users (email,password,name) VALUES ('$email','$pass','$name');";

        if($db->query($sql)){
            return true;
        }else{
            return $db->errorInfo();
        }
    }
