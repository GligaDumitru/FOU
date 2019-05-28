<div class="modalContainer">
    <div class="modalBody">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <span class="iconSuccess"><i size="7x" class="far fa-check-circle fa-10x"></i></span>
        <span class="titleSuccess">File Ready To Download</span>
        <span class="linkToDownload">For download: <br />
        <a id="linkForDownloadTheFileDirect" onclick="redirectToPage('?message=thankyou');" download="<?php echo $file['name'].'.'.$file['ext']; ?>" href="<?php echo $file['path']; ?>" id="linkToCopy"><i class="fas fa-download"></i> <?php echo $name . '.' . $file['ext'] . ' (' . $size . ')'; ?></span></a>
    </div>
</div>
