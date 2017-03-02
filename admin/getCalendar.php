<?php 
require_once 'core/init.php';
$food = new Post();
$cal_food = $food->get('calendar', array('product','=','food'));
$hores = new Post();
$cal_hores = $hores->get('calendar', array('product','=','hores'));
var_dump($cal_food);
?>

<div class="get">
<?php if($cal_food->count()<=0 && $cal_hores->count()<=0){
    echo '<p class="warning">Nič tu nie je!<br><a href="?page=insertCalendar.php">Pridať seminár</a></p>';
}
else{
    if($cal_food->count()<=0){

    }
    else{
    $cal_food= $cal_food->results();
        ?>
    <a href="?page=insertCalendar.php" class="href_addButton"><div class="addButton">Pridať seminár</div></a>
    <h2>Food</h2>
    <table>
        <?php
           foreach ($cal_food as $single){
                echo '<tr>
                        <td><a href="?page=updateCalendar.php&id=' . $single->id . '"><p class="title">' . $single->name.' ' . $single->date. '</p></a><br><div class="content">';
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

<div class="get">
    <?php
    if($cal_hores->count()<=0){}
    else{ 
    $cal_hores = $cal_hores->results();
        ?>
    <h2>Hores</h2>
    <table>
        <?php
           foreach ($cal_hores as $single){
                echo '<tr>
                        <td><a href="?page=updateCalendar.php&id=' . $single->id . '"><p class="title">' . $single->name.' ' . $single->date. '</p></a><br><div class="content">';
                        if (strlen($single->content)> 379)
                            echo substr($single->content,0,379). '...</p></td>';
                        else{
                            echo $single->content . '</div></td>';
                        }
                    echo'</tr>';
            }
        ?>
    </table>
<?php } }?>
</div>