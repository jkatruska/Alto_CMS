<?php 
require_once 'core/init.php';
if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'main_title' => array(
                 'name' => 'Hlavný text',
                 'required' => true),
             'secondary_title' =>array(
                 'name' => 'Vedľajší text'
             )));
          if($validation->passed()){
              $post = new Post();
              $image = $post->addImage($_FILES["image"]);
              try{
                  $post->create('slideshow',array(
                      'title'=>Input::get('main_title'),
                      'content' =>Input::get('secondary_title'),
                      'image' => $image
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
        <input type="text" name="main_title" placeholder="Hlavný text" class="insert_input" autocomplete="off"><br>
        <input type="text" name="secondary_title" placeholder="Vedľajší text" class="insert_input" autocomplete="off"><br>
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