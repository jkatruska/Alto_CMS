<?php 
require_once 'core/init.php';
 $user = new User();
 if (!$user->isLoggedIn() ){
     Redirect::to('includes/errors/restricted.php');
 }
else{
$post = new Post();
$posts = $post->get('modules');
?>

<div class="get">
<?php if($posts->count()<=0){
    echo '<p class="warning">Nič tu nie je!<br><a href="?page=insertModules.php">Pridať záznam</a></p>';
}
else{
    $posts = $posts->results();
        ?>
    <a href="?page=insertModules.php" class="href_addButton"><div class="addButton">Pridať modul</div></a>
    <?php
    foreach($posts as $single){
        echo'
        <a href="?page=updateModules.php&id='.$single->id.'">
            <div class="wrapper_post">
                <img src="../'.$single->image.'" class="img_post">
                <div class="txt_post">
                    <p class="title_post">'.$single->name.'</p>
                    <p class="content_post">'.$single->content.'</p>
                </div>
            </div>
        </a>';
    }
} ?>
</div>

 <?php } ?>