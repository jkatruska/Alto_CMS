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
             'text' => array(
                 'name' => 'Popis modulu',
                 'required' => true),
             'title' =>array(
                 'name' => 'modul',
                 'required' => true,
                 'max' => 100
             )));
          if($validation->passed()){
              $post = new Post();
              $image = $post->addImage($_FILES["image"]);
              try{
                  $valid = $post->create('modules',array(
                      'content'=>Input::get('text'),
                      'name' =>Input::get('title'),
                      'image' => $image
                  ));
                  if($valid){
                    Session::flash('status', 'Záznam úspešne pridaný');
                  }
                  else{
                      var_dump($valid);
                  }
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
        <input type="text" name="title" placeholder="Modul" class="insert_input" autocomplete="off"><br>
        <!--
        <div class="interface">
            <img src="img/bold.svg" class="button" id="bold">
            <img src="img/italic.svg" class="button" id="italic">
            <img src="img/u_list.svg" class="button" id="u_list">
        </div>
        -->
        <textarea name="text" id="text" placeholder="Popis modulu"></textarea><br>
        <input type="file" name="image" accept="image/*" ><br /><br>
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