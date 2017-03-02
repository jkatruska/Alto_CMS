<?php 
require_once 'core/init.php';
$category = $_GET["category"];
$post = new Post();
$posts = $post->get('posts', array('category','=',$category));
?>

<div class="get">
<?php if($posts->count()<=0){
    echo '<p class="warning">Nič tu nie je!<br><a href="?page=insertPost.php&category=' . $category.'">Pridať záznam</a></p>';
}
else{
    $posts = $posts->results();
        ?>
    <a href="?page=insertPost.php&category=<?= $category ?> " class="href_addButton"><div class="addButton">Pridať článok</div></a>
    <table>
        <?php
           foreach ($posts as $single){
                echo '<tr>
                        <td><a href="?page=updatePost.php&id=' . $single->id . '"><p class="title">' . $single->title. '</p></a><br><div class="content">';
                        if (strlen($single->content)> 379)
                            echo substr($single->content,0,379). '...</p></td>';
                        else{
                            echo $single->content . '</div></td>';
                        }
                    echo'</tr>';
            }
        ?>
    </table>
<?php } ?>
</div>