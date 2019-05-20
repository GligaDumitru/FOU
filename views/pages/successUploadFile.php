<div class="modalContainer">
    <div class="modalBody">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <span class="iconSuccess"><i size="7x" class="far fa-check-circle fa-10x"></i></span>
        <span class="titleSuccess">File Uploaded Successfully</span>
        <span class="linkToDownload">For download: <br /> <a
                href="<?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'?controller=fou&action=downloadfile&file='.$generateUniqToken ?>"
                id="linkToCopy"><?php echo "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]".'?controller=fou&action=downloadfile&file='.$generateUniqToken ?></a></span>
        <span class="copyLink" id="copyLinkForDownload" onclick="copyLink();">Copy link</span>
    </div>
</div>