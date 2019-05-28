<?php

$error = '';
$currentFolder = 'default';
if (isset($_GET['folder'])) {
    $currentFolder = $_GET['folder'];
}

$__baseFolder = '../../upload/';
require_once '../../controllers/fouController.php';
$i = 1;
$folderNameDefault = FouController::getFolderNameByEmail($_SESSION['email']);
$fullPathDefault = $__baseFolder . $folderNameDefault;

if (is_dir($fullPathDefault)) {
    $foldersInBaseDirectory = FouController::getNumberOfFolders('../../upload/' . $folderNameDefault);
    // FouController::updateInDbAllFiles(); #TODO
    $arrayOfFolders = FouController::getFoldersInFolder('../../upload/' . $folderNameDefault);
    ?>
<li>
    <a href="#" class="listOfFolder">
        <div style="display: flex;align-items: baseline;">
            <?php if ($foldersInBaseDirectory > 0) {
        ?>
            <i id="caretChange" onclick="toggleFolder('subfolder level-1','caretChange');"
                class="fa fa-caret-right folder-show"></i>
            <?php
}?>

            <i class="fas fa-folder-open"></i>
            <span class="name">Directoare</span>
        </div>
        <div>
            <span class="amount"><?php echo $foldersInBaseDirectory; ?></span>
        </div>
    </a>
</li>

<?php
} else {
    ?>

<?php
}
// FouController::showFilesInFolder($__baseFolder.$folderNameDefault);
?>