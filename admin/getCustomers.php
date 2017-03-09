<?php 
require_once 'core/init.php';
$table = 'customers';
$from = 'getCustomers.php';
$post = new Post();
$posts = $post->get($table);
?>

<div class="get">
<?php if($posts->count()<=0){
    echo '<p class="warning">Nič tu nie je!<br><a href="?page=insertCustomers.php">Pridať záznam</a></p>';
}
else{
    $posts = $posts->results();
        ?>
    <a href="?page=insertCustomers.php" class="href_addButton"><div class="addButton">Pridať zákaznika</div></a>
    <?php
    echo '<div class="wrapper_customers">';
    foreach($posts as $single){
        echo'
        <a href="?page=delete.php&id='.$single->id.'&table='.$table.'&from='.$from.'">
            <div class="wrapper_customer">
                <div class="delete_customer"></div>
                <img src="../'.$single->image.'"class="customer_img">
                <p class="customer_txt">'.$single->name.'</p>
            </div>
        </a>';
    }
} 
echo '</div>';
?>
</div>