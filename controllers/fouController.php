<?php
class FouController
{
    public function generateTokenFile($fileName, $fileExt)
    {
        $result = "";
        $token = openssl_random_pseudo_bytes(6);

        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);
        $result = strrev(trim($fileName)) . '23' . $token . '.' . $fileExt;
        return $result;
    }

    public function generateUniq($name, $base)
    {
        $token = openssl_random_pseudo_bytes($base);
        $token = bin2hex($token);
        return strrev($name) . '21-12' . $token;
    }

    public function renameFile($old_name, $new_name)
    {
        if (file_exists($new_name)) {
            return "Error While Renaming $old_name";
        } else {
            if (rename($old_name, $new_name)) {
                return true;
            } else {
                return "A File With The Same Name Already Exists";
            }
        }
        return true;
    }

    public function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824) {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        } elseif ($bytes >= 1048576) {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        } elseif ($bytes >= 1024) {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        } elseif ($bytes > 1) {
            $bytes = $bytes . ' bytes';
        } elseif ($bytes == 1) {
            $bytes = $bytes . ' byte';
        } else {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    public function downloadfile()
    {
        if (isset($_GET['file'])) {

            require_once 'models/file.php';
            $fileToken = $_GET['file'];
            $db = Database::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $file = File::getFileByToken($fileToken);
            $size = $this->formatSizeUnits($file['size']);
            $name = $file['name'];

            require_once 'views/pages/downloadPage.php';
        }
    }

    public function upload()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['files'])) {
                $errors = [];
                $path = 'upload/';
                $extensions = ['jpg', 'jpeg', 'png', 'gif', 'txt', 'pdf'];
                $allFiles = count($_FILES['files']['tmp_name']);
                if (!isset($_SESSION['email'])) {
                    if ($allFiles > 1) {
                        $errors[] = "You must log in account to upload more the 1 file.";
                    }
                }
                if (empty($errors)) {
                    for ($i = 0; $i < $allFiles; $i++) {
                        $fileName = $_FILES['files']['name'][$i];
                        $fileTmp = $_FILES['files']['tmp_name'][$i];
                        $fileType = $_FILES['files']['type'][$i];
                        $fileSize = $_FILES['files']['size'][$i];
                        list($fileNameWithoutExt, $fileExt) = explode(".", $fileName);
                        // $fileExt = strtolower(end(explode('.',$_FILES['files']['name'][$i])));
                        $fileExt = strtolower($fileExt);
                        $fileNameWithoutExt = strtolower($fileNameWithoutExt);
                        $newFileName = $this->generateTokenFile($fileNameWithoutExt, $fileExt);
                        $file = $path . $newFileName;

                        if (!in_array($fileExt, $extensions)) {
                            $errors[] = 'Extension not allowed:' . $fileName . ' [' . $fileExt . ']';
                        }

                        if ($fileSize > 2000000) {
                            $errors[] = 'File size exceeds limit';
                        }

                        if (empty($errors)) {
                            require_once 'models/upload.php';
                            $generateUniqToken = $this->generateUniq($fileNameWithoutExt, 4);
                            $addToDbResult = addAnonimFile($file, $fileNameWithoutExt, $fileExt, $fileSize, $fileType, $newFileName, $generateUniqToken);
                            if (move_uploaded_file($fileTmp, $file) && $addToDbResult === true)
                            // header("Location:/FOU/?upload=success");
                            {
                                require_once 'views/pages/successUploadFile.php';
                            }
                        }
                    }
                }

                if ($errors) {

                    require_once 'views/pages/errorPopup.php';
                }
            }
        }
    }
    public function feedback()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userN = $_POST['userName'];
            $userE = $_POST['userEmail'];
            $userM = $_POST['userMessage'];
            
            require_once 'models/models.php';
            $result = Model::addFeedback($userN, $userE, $userM);
            if ($result === true) {
                // go to home
                header("Location:/FOU/");
            } else {
                header("Location:/FOU/views/pages/error.php?error=dbError.$result");
            }
        }
    }
}
