<?php require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
$id = $_GET["id"];
$table = 'notifications';
$post = new Post();
$from = 'getNotifications.php';
$single = $post->get($table, array('id','=',$id))->results();

if(Input::exists()){
    if(Token::check(Input::get('token'))){
         $validate = new Validate();
         $validation = $validate->check($_POST, array(
             'content' => array(
                 'name' => 'Oznam',
                 'required' => true)));
          if($validation->passed()){
              $post = new Post();
              $image = $post->updateImage($_FILES["image"],$single[0]->image);
              try{
                  $post->update('notifications',$id,array(
                      'content'=>Input::get('content'),
                  ));
                  Session::flash('status', 'Záznam úspešne zmenený');
                  Redirect::to('?page=updateNotification.php&id='.$id);
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
        <input type="text" name="content" placeholder="Oznam" class="insert_input" autocomplete="off" value="<?= $single[0]->content?>"><br>
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