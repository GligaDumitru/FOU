<?php
$file = new FouController();
$fileToEdit = $file->getFileDetailsByToken($_GET['file']);

?>

<div class="modalContainer">
    <div class="modalBody large">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <span class="iconSuccess"><i size="5x" class="fas fa-edit fa-5x"></i></span>

        <span class="titleSuccess">Edit File: <?php echo $fileToEdit['name'] . '.' . $fileToEdit['ext']; ?></span>
        <form action="<?php echo '?controller=fou&action=updateFile&file=' . $fileToEdit['id']; ?>"
            class="loginform editFileForm" method="POST" onsubmit="return true;">

            <div class="group-items">
                <label for="nameFile">Nume Fisier</label>
                <input type="text" value="<?php echo $fileToEdit['name'] ?>" name="nameFile" maxlength="100" minlength=3
                    required />
            </div>
            <div class="group-items">
                <label for="extFile">Extensie Fisier</label>
                <input type="text" name="extFile" value="<?php echo $fileToEdit['ext'] ?>" maxlength="100" minlength=3
                    required />
            </div>
            <div class="group-items">
                <label for="extFile">Descriere Fisier</label>
                <textarea type="text" name="descFile" maxlength="100" rows="10" value="" minlength=3 required>
                <?php echo $fileToEdit['description'];  ?>
                </textarea>
            </div>
            <div class="group-items">
                <textarea name='tagsFile' placeholder='Tags for file..'><?php echo $fileToEdit['tags'];  ?></textarea>
            </div>
            <div class="group-items">
                <button class="app button submitLogin">
                    Salveaza
                </button>
            </div>
        </form>
    </div>
</div>