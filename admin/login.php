<?php 
require_once('core/init.php');

if(Input::exists()){
    $validate = new Validate();
    $validation = $validate->check($_POST, array(
            'username' => array(
                'name' => 'Prihlasovacie meno',
                'required' => true
            ),
            'password' =>array(
                'name' => 'Heslo',
                'required' => true
            )
        ));
    if($validation->passed()){
        $user = new User();
        $remember = (Input::get('remember') === 'on' ) ? true : false;
        $login = $user->login(Input::get('username'), Input::get('password'),$remember);

        if($login){
            Redirect::to('index.php');
        }
        else{
            echo 'Použivateľské meno alebo heslo nie je správne';
        }
    }
    else{
        foreach($validation->getErrors() as $error){
            echo $error,'<br>';
        }
    }
}
?>
<head>
    <title>CMS Alto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<div id="wrapper_login">
    <div id="login_form">
        <p id="login_text">Prihlásenie</p>
        <form action="" method="post">
            <input type="text" id="username" name="username" value="<?php echo escape(Input::get('username'))?>" class="input_login" placeholder="Prihlasovacie meno">
            <br>
            <input type="password" id="password" name="password" class="input_login" placeholder="Heslo">
            <br>
            <input type="submit" value="Prihlásiť sa" id="login_button" class="input_login">
            <input type="reset" value="Resetovať" id="reset_button" class="input_login">
            <!--<label for="remember">Zapamätať prihlásenie</label>
            <input type="checkbox" name="remember" id="remember">
            <br>-->
        </form>
    </div>
</div>