<?php 
require_once 'core/init.php';
$table = 'notifications';
$post = new Post();
$posts = $post->get($table);
?>

<div class="get">
<?php if($posts->count()<=0){
    echo '<p class="warning">Nič tu nie je!<br><a href="?page=insertNotification.php">Pridať záznam</a></p>';
}
else{
    $posts = $posts->results();
        ?>
    <a href="?page=insertNotification.php" class="href_addButton"><div class="addButton">Pridať upozornenie</div></a>
    <?php
    foreach($posts as $single){
        echo'
        <a href="?updateNotification&id='.$single->id.'">
            <div class="wrapper_post">
                <div class="txt_post" style="padding-left: 2%; padding-bottom:1%;">
                    <p class="title_post">'.$single->content.'</p>
                </div>
            </div>
        </a>';
    }
} ?>
</div>