<?php 
    function addAnonimFile($path,$fileName,$fileExt,$fileSize,$fileType,$newFileName,$generateUniqToken,$folderName) {
        $db = Database::getInstance();
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $fromWho = 'anonim';
        $currentDate = new DateTime();
        $currentDate = $currentDate->format('Y-m-d H:i:sP');
        if(isset($_SESSION['email'])){
            $fromWho = $_SESSION['email'];
        }
        
        $sql = "INSERT INTO files(name,ext,size,type,path,folderName,token,origin,createdAt) VALUES('$fileName','$fileExt','$fileSize','$fileType','$path','$folderName','$generateUniqToken','$fromWho','$currentDate')";
        if($db->query($sql)){
            return true;
        }else{
            return $db->errorInfo();
        }
    
    }
?>