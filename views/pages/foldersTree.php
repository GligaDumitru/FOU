<?php

$error = '';
$currentFolder = 'default';
if (isset($_GET['folder'])) {
    $currentFolder = $_GET['folder'];
}

$__baseFolder = '../../upload/';
require_once '../../controllers/fouController.php';

$folders = User::getUserByEmail($_SESSION['email'])->directory;
$folders = explode("___", $folders);
?>
<li>
    <a href="#" class="listOfFolder">
        <div style="display: flex;align-items: baseline;">

            <i class="fas fa-folder-open"></i>
            <span class="name">Foldere</span>
        </div>
    </a>
</li>
<?php
for ($i = 0; $i < count($folders); $i++) {
    if ($folders[$i]) {
        ?>
<li>
    <a href="?folder=<?php echo $folders[$i]; ?>"
        class="listOfFolder <?php echo $_SESSION['folder'] == $folders[$i] ? " activeFolder" : ""; ?>">
        <div style="display: flex;align-items: baseline;">
            <i class="far fa-folder"></i>
            <i class="fas fa-folder-open"></i>
            <span class="name"><?php echo $folders[$i]; ?></span>
        </div>
    </a>
</li>
<?php
}
}
?>