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
             'name' => array(
                 'name' => 'Názov',
                 'required' => true,
                 'max'=>150),
             'mail' => array(
                 'name' =>'E-mail',
                 'required'=> true,
                 'max' =>80
             )));
          if($validation->passed()){
              $post = new Post();
              try{
                  $post->create('emails',array(
                      'name'=>Input::get('name'),
                      'email'=>Input::get('mail'),
                  ));
                  Session::flash('status', 'Záznam úspešne pridaný');
              }
              catch(Exception $e){
                  die($e->getMessage());
              }
          }
                  else{
            foreach($validate->getErrors() as $error);
            echo '<p class="status">' . $error .'</p>';
          }
    }
}
?>

 <div class="insert">
    <form action ="" method="POST" enctype="multipart/form-data">
        <input type="text" name="name" placeholder="Názov" class="insert_input" autocomplete="off"><br>
        <input type="text" name="mail" placeholder="E-mail" class="insert_input" autocomplete="off"><br>
        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
        <input type="submit" value="Pridať" class="confirm_button">
    </form>
    <?php 
        if(Session::exists('status')){
            echo '<p class="status">' . Session::flash('status')  . '</p>';
        }
    ?>
</div>
 <?php } ?>