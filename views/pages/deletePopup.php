<div class="modalContainer">
    <div class="modalBody">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <span class="iconSuccess"><i size="7x" class="far fa-check-circle fa-10x"></i></span>
        <span class="titleSuccess">Sigur vrei sa stergi acest fisier?</span>
        <a href="/FOU/views/pages/dashboard.php"><button class="app button special">Inapoi</button></a>
        <a href="<?php echo '?controller=fou&action=deleteFile&file=' . $_GET['file']; ?>">
        <button class="app button special red">Sterge</button>
        </a>
    </div>
</div>
