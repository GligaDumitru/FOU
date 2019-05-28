<div class="modalContainer">
    <div class="modalBody large">
        <span class="closeSuccessModalContainer" onClick="closeContainer('modalContainer');"
            id="closeSuccessContainer"><i class="far fa-times-circle"></i></span>
        <div class="row">
            <div class="formContainerUpload">
                <form method="post" action="?controller=fou&action=upload&login=true" enctype="multipart/form-data">
                    <div class="box__input">
                        <input class="box__file" onchange="handleChangeInput(event);" type="file" name="files[]"
                            id="file" multiple style="display:none" />
                        <label class="app labelInput" for="file"><strong>Choose a file</strong><span
                                class="box__dragndrop" id="optionToDragAndDrop"> or drag it here</span>.</label>
                        <br>
                    </div>
                    <div class="boxFileUploaded">
                        <span id="fileForUpload">No file Selected</span>
                    </div>
                    <button class="app button blue" name="upload" id="submitFile" type="submit">Upload</button>
                </form>
            </div>
        </div>
    </div>
</div>