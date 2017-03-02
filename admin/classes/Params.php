<?php 
Class Params{
    public static function get(){
        $config = array(
            'mysql'=> array(
                'host' => '127.0.0.1',
                'username'=> 'root',
                'password'=>'',
                'db'=> 'cms'
            ),
            'remember' => array(
                'cookie_name' => 'hash',
                'cookie_expiry' => 31556926 
            ),
            'session' => array(
                'session_name' => 'user',
                'token_name' => 'token'
            )
        );
        return $config;
    }
}

?>