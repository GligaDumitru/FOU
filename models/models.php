<?php 
    require_once("models/models.php");

class Model {
    public function getLogin() {
        // hardcoded data to simulate the db
        if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
            if($_REQUEST['username'] == '1' && $_REQUEST['password'] == '1'){
                return 'login';
            }else {
                return 'invalid user or password';
            }
        }
    }
}
