<?php 

require_once 'core/init.php';
$DB = DB::getInstance();
$result = $DB->get("users", array("username", "=", "billy"));
if($result->rowCount() > 0 ){
    echo 'user found';
} 
elseif($result->rowCount()>1){
    echo 'users found';
}
else {
    echo 'user not found';
}
