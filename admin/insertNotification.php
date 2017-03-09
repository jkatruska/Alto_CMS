<?php 
require_once 'core/init.php';
if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'content' => array(
                 'name' => 'Oznam',
                 'required' => true)));
          if($validation->passed()){
              $post = new Post();
              try{
                  $post->create('notifications',array(
                      'content'=>Input::get('content'),
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
        <input type="text" name="content" placeholder="Oznam" class="insert_input" autocomplete="off"><br>
        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
        <input type="submit" value="Pridať" class="confirm_button">
    </form>
    <?php 
        if(Session::exists('status')){
            echo '<p class="status">' . Session::flash('status')  . '</p>';
        }
    ?>
</div>