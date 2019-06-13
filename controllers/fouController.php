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

    public function createdirectory()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dirName = $this->formatData($_POST['nameDirectory']);
        
            $this->requireFileCheckPath('models/users.php');
            $result = User::createDirector($dirName);
            if ($result === true) {
                header("Location:/FOU/views/pages/dashboard.php?success=createddirectory");
            } else {
                header("Location:/FOU/views/pages/dashboard.php?error=createDirectory");
            }
        }
    }

    public static function getFolderNameByEmail($email)
    {
        $dirArray = explode('@', $email);
        return sha1($dirArray[0]);
    }

    public static function getFiles($case, $view, $sort, $filter)
    {

        $sortFileBy = "";
        $type = "";
        $typeOfFile = "";
        $sortType = "";
        $viewDate = "";
        if ($view != "") {
            $viewDate = explode("_", $view)[0];
            $type = explode("_", $view)[1];
        }
        if ($sort != "") {
            $ar = explode("_", $sort);
            $sortFileBy = $ar[0];
            $sortType = $ar[1];
        }
        if ($filter != "") {
            $typeOfFile = explode('_', $filter)[0];
        }

        require_once '../../models/file.php';
        switch ($case) {
            case 'all':{
                    return File::getFiles('files', $_SESSION['email'], $sortFileBy, $sortType, $type, $typeOfFile, $viewDate);
                }
            default:{
                    return File::getFiles('files_' . $case, $_SESSION['email'], $sortFileBy, $sortType, $type, $typeOfFile, $viewDate);
                }
        }
    }

    public static function showFilesInFolder($folderPath)
    {
        $res = 0;
        if (is_dir($folderPath)) {
            foreach (scandir($folderPath) as $f) {
                if ($f !== '.' && $f !== '..') {
                    $res++;
                }
            }
        }
        echo $folderPath;
        return $folderPath;
    }

    public static function getNumberOfFiles($folderPath)
    {
        $res = 0;
        if (is_dir($folderPath)) {
            foreach (scandir($folderPath) as $f) {
                if ($f !== '.' && $f !== '..') {
                    $res++;
                }
            }
        }
        return $res;
    }

    public function deleteFile()
    {
        if (isset($_GET['file'])) {
            require_once '../../models/file.php';
            if (File::deleteFileByToken($_GET['file']) === true) {
                header('Location:/FOU/views/pages/dashboard.php?success=deleted');
            } else {
                header('Location:/FOU/views/pages/dashboard.php?error=noDelete');
            }
        } else {
            header('Location:/FOU/views/pages/dashboard.php?error=noDelete');
        }
    }
    public static function getNumberOfFolders($folderPath)
    {
        $res = 0;
        if (is_dir($folderPath)) {
            foreach (scandir($folderPath) as $f) {
                if ($f !== '.' && $f !== '..' && is_dir($f)) {
                    $res++;
                }
            }
        }
        return $res;
    }

    public static function getFoldersInFolder($path)
    {
        $arrayFolders = array();

        if (is_dir($path)) {
            foreach (scandir($path) as $f) {
                if ($f !== '.' && $f !== '..' && is_dir($f)) {
                    array_push($arrayFolders, $f);
                }
            }
        }
        return $arrayFolders;
    }

    public static function updateInDbAllFiles()
    {

    }

    public function generateUniq($name, $base)
    {
        $token = openssl_random_pseudo_bytes($base);
        $token = bin2hex($token);
        return trim(strrev(str_replace(' ', '-', $name)) . '21-12' . $token);
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
    }

    public static function formatSizeUnits($bytes)
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

    public function requireFileCheckPath($file)
    {
        require_once is_file($file) ? $file : '../../' . $file;
    }

    public function getFileDetailsByToken($file)
    {
        $this->requireFileCheckPath('models/file.php');
        return File::getFileByToken($file);
    }

    public function downloadfile()
    {
        if (isset($_GET['file'])) {
            $this->requireFileCheckPath('models/file.php');
            $fileToken = $_GET['file'];
            $db = Database::getInstance();
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $file = File::getFileByToken($fileToken);
            require_once is_file('views/pages/downloadPage.php') ? 'views/pages/downloadPage.php' : 'downloadPage.php';
        }
    }
    public function formatData($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public function updateFile()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fileName = $this->formatData($_POST['nameFile']);
            $extFile = $this->formatData($_POST['extFile']);
            $token = $this->formatData($_GET['file']);
            $description = $this->formatData($_POST['descFile']);
            $tagsFile = $this->formatData($_POST['tagsFile']);

            $this->requireFileCheckPath('models/file.php');
            $result = File::updateFileInDb($fileName, $extFile, $token, $description, $tagsFile);
            if ($result === true) {
                // go to dashboard
                header("Location:/FOU/views/pages/dashboard.php?success=edited");
            } else {
                header("Location:/FOU/views/pages/dashboard.php?error=edited");
            }
        }
    }

    public function upload()
    {
        $pathSpace = '';
        $innerFolder = "";
        if (isset($_SESSION['email'])) {

            $folderNameForUser = explode('@', $_SESSION['email']);
            $folderNameForUser = sha1($folderNameForUser[0]) . '/';

            if(isset($_SESSION['folder'])){
                $innerFolder = "/".$_SESSION['folder'];
            }else{
                $innerFolder = "uuuuuuuuuuuuuuuu";
            }


        } else {
            $folderNameForUser = '';
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES['files'])) {

                $errors = [];
                $path = 'upload/';
                if (isset($_GET['login'])) {
                    $pathSpace = '../../';
                }
                $path = $pathSpace . 'upload/' . $folderNameForUser.$innerFolder;
                $extensions = ['jpg', 'jpeg', 'png', 'gif', 'txt', 'pdf'];
                $allFiles = count($_FILES['files']['tmp_name']);
                if (!isset($_SESSION['email'])) {
                    if ($allFiles > 1) {
                        $errors[] = "You must log in account to upload more then 1 file.";
                    }
                }
                if (empty($errors)) {
                    for ($i = 0; $i < $allFiles; $i++) {
                        $fileName = $_FILES['files']['name'][$i];
                        $fileTmp = $_FILES['files']['tmp_name'][$i];
                        $fileType = $_FILES['files']['type'][$i];
                        $fileSize = $_FILES['files']['size'][$i];
                        list($fileNameWithoutExt, $fileExt) = explode(".", $fileName);
                        $fileExt = strtolower($fileExt);
                        $fileNameWithoutExt = strtolower($fileNameWithoutExt);
                        $newFileName = trim($this->generateTokenFile($fileNameWithoutExt, $fileExt));
                        $file = $path . $newFileName;

                        if (!in_array($fileExt, $extensions)) {
                            $errors[] = 'Extension not allowed:' . $fileName . ' [' . $fileExt . ']';
                        }

                        if ($fileSize > 2000000) {
                            $errors[] = 'File size exceeds limit';
                        }

                        if (empty($errors)) {
                            require_once $pathSpace . 'models/upload.php';
                            $generateUniqToken = $this->generateUniq($fileNameWithoutExt, 4);
                            $addToDbResult = addAnonimFile($file, $fileNameWithoutExt, $fileExt, $fileSize, $fileType, $newFileName, $generateUniqToken, $folderNameForUser);
                            if (move_uploaded_file($fileTmp, $file) && $addToDbResult === true) {
                                require_once $pathSpace . 'views/pages/successUploadFile.php';
                            } else {
                                header("Location:/FOU/?upload=failed");
                            }
                        }
                    }
                }

                if ($errors) {

                    require_once $pathSpace . 'views/pages/errorPopup.php';
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