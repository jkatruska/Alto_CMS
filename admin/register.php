<?php 
    require_once 'core/init.php';
     $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
if(Input::exists()){
    if(Token::check(Input::get('token'))){
        $validate = new Validate();
        $validation = $validate->check($_POST, array(
            'username' => array(
                'name' => 'Prihlasovacie meno',
                'required' => true,
                'min' => 3,
                'max' => 20,
                'unique' => 'users'
            ),
            'password' =>array(
                'name' => 'Heslo',
                'required' => true,
                'min' => 5
            ),
            'password_again' => array(
                'name' => 'Heslo znova',
                'required' => true,
                'matches' => 'password'
            ),
            'name' => array(
                'name' => 'Meno',
                'required' => true,
                'min' => 2,
                'max' => 50
            )
        ));
        if($validation->passed()){
            $user = New User();
            $salt = Hash::salt(32);
            try{
                $user->create(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password'),$salt),
                    'salt' => $salt,
                    'name' => Input::get('name')
                ));
                 Session::flash('home', 'Používateľ bol úspešne zaregistrovaný');
                 Redirect::to('index.php');
            }
            catch(Exception $e){
                    die($e->getMessage());
                }
        }
        else{
            foreach($validate->getErrors() as $error);
            echo $error . "<br>";
        }
    }   
}
?>

<form action ="" method="POST">
    <label for="username">Prihlasovacie meno:</label>
    <input type="text" name="username" id="username" value="<?php echo escape(Input::get('username'))?>">
    <br>    
    <label for="name">Skutočné meno:</label>
    <input type="text" name="name" id="name" value="<?php echo  escape(Input::get('name'))?>">
    <br>
    <label for="password">Heslo:</label>
    <input type="password" name="password" id="password" value="">
    <br>
    <label for="password_again">Zadajte heslo znova:</label>
    <input type="password" name="password_again" id="password_again" value="">
    <br>
    <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
    <input type="submit" value="Zaregistrovať">
</form>
 <?php } ?>