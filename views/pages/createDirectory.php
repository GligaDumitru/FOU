<?php
// $file = new FouController();
// $fileToEdit = $file->getFileDetailsByToken($_GET['file']);

?>

<div class="modalContainer">
    <div class="modalBody ">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <span class="iconSuccess"><i  size="7x" class="fas fa-folder-plus"></i></span>

        <span class="titleSuccess">Creaza un nou director.</span>

        <form action="<?php echo '?controller=fou&action=createdirectory'; ?>"
            class="loginform editFileForm" method="POST" onsubmit="return true;">
            <div class="group-items">
                <label for="nameDirectory">Nume Director</label>
                <input type="text" name="nameDirectory" maxlength="100" minlength=3
                    required />
            </div>
            <div class="group-items">
                <button class="app button submitLogin">
                    Creaza
                </button>
            </div>
        </form>
    </div>
</div>