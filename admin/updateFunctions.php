<?php require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
$id = $_GET["id"];
$table = 'functions';
$post = new Post();
$from = 'getFunctions.php';
$single = $post->get($table, array('id','=',$id))->results();

if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'text' => array(
                 'name' => 'Popis Funkcie',
                 'required' => true),
             'title' =>array(
                 'name' => 'Funkcia',
                 'required' => true,
                 'max' => 100
             )));
          if($validation->passed()){
              $post = new Post();
              $image = $post->updateImage($_FILES["image"],$single[0]->image);
              try{
                  $post->update('functions',$id,array(
                      'text'=>Input::get('text'),
                      'name' =>Input::get('title'),
                      'image' => $image
                  ));
                  Session::flash('status', 'Záznam úspešne zmenený');
                  Redirect::to('?page=updateFunctions.php&id='.$id);
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
        <input type="text" name="title" placeholder="Funkcia" class="insert_input" autocomplete="off" value="<?= $single[0]->name ?>"><br>
        <textarea name="text" id="text" placeholder="Popis funkcie"><?= br2nl($single[0]->text) ?></textarea><br>
        <input type="file" name="image" accept="image/*" ><br /><br>
        <input type="hidden" name="token" value="<?php echo Token::generate() ?>">
        <input type="submit" value="Zmeniť" class="confirm_button">
        <?php 
            echo '<a href="?page=delete.php&table='.$table.'&id='. $id. '&from='.$from.'">'
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
 <?php } ?>