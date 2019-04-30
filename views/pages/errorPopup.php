<div class="showErrorModal" >
<?php
    for($i = 0;$i < sizeof($errors);$i++){
        echo '<span class="errorModalMessage">'.$errors[$i].'</span>';
    }
?>
    <span class="closeErrorModal" title="Close Message" id="closeErrorModal"><i class="far fa-times-circle"></i></span>
</div>