<?php 
require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
 else{
$table = 'emails';
$from = 'getEmails.php';
$post = new Post();
$posts = $post->get($table);
?>

<div class="get">
<?php if($posts->count()<=0){
    echo '<p class="warning">Nič tu nie je!<br><a href="?page=insertMail.php">Pridať E-mail</a></p>';
}
else{
    $posts = $posts->results();
        ?>
    <a href="?page=insertMail.php" class="href_addButton"><div class="addButton">Pridať E-mail</div></a>
    <?php
    echo '<div class="wrapper_mails">';
    foreach($posts as $single){
        echo'
            <div class="wrapper_mail">
                <p class="mail_txt">'.$single->name.'</p>
                <p class="mail_mail">'.$single->email.'</p>
                <a href="?page=delete.php&id='.$single->id.'&table='.$table.'&from='.$from.'">
                    <img src="img/delete.svg" class="mail_delete">
                </a>
            </div>';
    }
} 
echo '</div>';
?>
</div>
 <?php } ?>