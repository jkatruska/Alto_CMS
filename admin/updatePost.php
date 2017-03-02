<?php require_once 'core/init.php';
$id = $_GET["id"];
$table = 'posts';
$post = new Post();
$single = $post->get($table, array('id','=',$id))->results();

if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'text' => array(
                 'name' => 'Obsah',
                 'required' => true),
             'title' =>array(
                 'name' => 'Titulok',
                 'required' => true,
                 'max' => 90
             )));
          if($validation->passed()){
              $image = $post->updateImage($_FILES['image'], $single[0]->image);
              try{
                  $post->update($table,$id, array(
                      'content'=>Input::get('text'),
                      'title' =>Input::get('title'),
                      'image' => $image
                  ));
                  Session::flash('status', 'Záznam úspešne upravený');
                  Redirect::to('?page=updatePost.php&id='.$id);
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
        <input type="text" name="title" placeholder="Titulok" class="insert_input" autocomplete="off" value="<?php  echo escape($single[0]->title) ?>"><br>
        <textarea name="text" id="text" placeholder="Popis"><?php echo escape($single[0]->content)?></textarea><br>
        <input type="file" name="image" ><br /><br>
        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
        <input type="submit" value="Zmeniť" class="confirm_button">
        <?php 
            echo '<a href="?page=delete.php&table='.$table.'&id='. $id. '">'
        ?>
            <div class="delete_button">Vymazať</div>
            </a>
    </form>
    <?php 
        if(Session::exists('status')){
            echo '<p class="status">' . Session::flash('status')  . '</p>';
        }
    ?>
</div>