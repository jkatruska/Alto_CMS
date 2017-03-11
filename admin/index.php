<?php 
require_once 'core/init.php';
if(Session::exists('home')){
    echo '<p>' . Session::flash('home')  . '</p>';
    
}
$user = new User();
if(!$user->isLoggedIn()){
    Redirect::to('login.php');
}
else{
?>

<head>
    <title>CMS Alto</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

    <div id="wrapper_index">
        <div id="top_menu"><?php echo ('<p class="logout">Vitaj, ') . escape($user->data()->name) . ('<a href="logout.php">Odhlásiť sa</a></p>'); ?></div>
        <div id="left_menu">
            <ul class="alto">
                <li class="header">ALTO</li>
                <a href="?page=getPost.php&category=1"><li>Články</li></a>
                <a href="?page=getCalendar.php"><li>Semináre</li></a>                
                <a href="?page=getSlideshow.php"><li>Slideshow</li></a>
                <a href="?page=getCustomers.php"><li>Zákaznici</li></a>
                <a href="?page=getNotifications.php"><li>Oznamy</li></a>

            </ul>
            <ul class="food">
                <li class="header">Food</li>
                <a href="?page=getPost.php&category=2"><li>Články Food</li></a>
                <a href="?page=getPost.php&category=3"><li>Články Kasa</li></a>
                <a href="?page=getProducts.php"><li>Produkty</li></a>
            </ul>
            <ul class="hores">
                <li class="header">Hores
                <li>Články
                <li>Semináre
            </ul>
        </div>
        <div class="back_content">
            <?php 
            if(isset($_GET['page'])){	
            $page = $_GET['page'];
            include $page;
            }
            else{
                include 'home.php';
            }
                ?>
        </div>
    </div>
    <script src="jquery.js"></script>
    <script src="form.js"></script>

<?php 
}
?>