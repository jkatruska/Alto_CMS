<?php 

require_once 'core/init.php';
$DB = DB::getInstance();
$user = $DB->update('users',3,array(
    'password' => 'u_r_useless',
    'name'=>':('
));