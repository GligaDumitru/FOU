<div class="modalContainer fadeIn animated">
    <div class="modalBody">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <span class="iconSuccess"><i size="7x" class="far fa-check-circle fa-10x"></i></span>
        <span class="titleSuccess">Fisier Gata de Partajat</span>
        <span class="linkToDownload">For download: <br /> <a
                href="<?php echo "http://$_SERVER[HTTP_HOST]/FOU/views/pages/dashboard.php".'?controller=fou&action=downloadfile&file='.$tokenSharedFile ?>"
                id="linkToCopy"><?php echo "http://$_SERVER[HTTP_HOST]/FOU/views/pages/dashboard.php".'?controller=fou&action=downloadfile&file='.$tokenSharedFile ?></a></span>
        <span class="copyLink" id="copyLinkForDownload" onclick="copyLink();">Copy link</span>
    </div>
</div>