<?php 
    function addAnonimFile($path,$fileName,$fileExt,$fileSize,$fileType,$newFileName,$generateUniqToken,$folderName) {
        $db = Database::getInstance();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $fromWho = 'anonim';
        if(isset($_SESSION['email'])){
            $fromWho = $_SESSION['email'];
        }
        
        $sql = "INSERT INTO files(name,ext,size,type,path,folderName,token,origin) VALUES('$fileName','$fileExt','$fileSize','$fileType','$path','$folderName','$generateUniqToken','$fromWho')";
        if($db->query($sql)){
            return true;
        }else{
            return $db->errorInfo();
        }
    
    }
?>