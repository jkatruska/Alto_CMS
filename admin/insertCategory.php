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
             'category' => array(
                 'name' => 'Kategória',
                 'required' => true)));
          if($validation->passed()){
              $post = new Post();
              try{
                  $post->create('products_categories',array(
                      'name' => Input::get('category')
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
        <input type="text" name="category" placeholder="Kategória" class="insert_input" autocomplete="off"><br>
        <!--
        <div class="interface">
            <img src="img/bold.svg" class="button" id="bold">
            <img src="img/italic.svg" class="button" id="italic">
            <img src="img/u_list.svg" class="button" id="u_list">
        </div>
        -->
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