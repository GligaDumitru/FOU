<?php 
    function addAnonimFile($path,$fileName,$fileExt,$fileSize,$fileType,$newFileName,$generateUniqToken) {
        $db = Database::getInstance();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO files(name,ext,size,type,path,folderName,token,origin) VALUES('$fileName','$fileExt','$fileSize','$fileType','$path','$newFileName','$generateUniqToken','anonim')";
        if($db->query($sql)){
            return true;
        }else{
            return $db->errorInfo();
        }
    
    }
?>