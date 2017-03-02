<?php 
    require_once realpath(__DIR__ . '/..') . "/admin/core/init.php";
?>
<!Doctype>
<html>
    <head>
        <Title>Foodman</Title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div id="wrapper">
            <div id="jumbotron">
                <img src="img/jumbotron.png" class="jumbo_bg">
                <p class="jumboheader">Reštauračný systém<br> FOODMAN</p>
                <img src="img/jumbo_arrow.svg" class="jumbo_arrow">
            </div>
            <div id="products">
                <div class="left">
                    <img src="img/sklad.svg" class="product_img">
                    <p class="product_title">Skladový systém</p>
                    <p class="product_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nunc risus, ultrices vitae lacus eget, finibus dignissim enim. Integer pharetra, ex vitae hendrerit maximus, lectus leo dictum metus, eu sollicitudin nisl nibh a elit. Integer facilisis tellus sed malesuada vestibulum. Phasellus faucibus metus et tellus consectetur semper. Vestibulum interdum gravida suscipit.</p>
                </div>
                <div class="right">
                    <img src="img/cash_register.svg" class="product_img">
                    <p class="product_title">Pokladňa</p>
                    <p class="product_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse nunc risus, ultrices vitae lacus eget, finibus dignissim enim. Integer pharetra, ex vitae hendrerit maximus, lectus leo dictum metus, eu sollicitudin nisl nibh a elit. Integer facilisis tellus sed malesuada vestibulum. Phasellus faucibus metus et tellus consectetur semper. Vestibulum interdum gravida suscipit.</p>
                </div>
            </div>
            <p class="main_title">Skladový systém</p>
            <div id="food_tiles">
                <div class="tile">
                            <img src="img/food/stat.svg" class="tile_img">
                        <div class="tile_txt">
                            Prehľadné štatistiky predaja a tržieb
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/kalkulacie.svg" class="tile_img">
                        <div class="tile_txt">
                            Prehľadná tvorba kalkulácií
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/limity.svg" class="tile_img">
                        <div class="tile_txt">
                            Nástroj na plánovanie akcií
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/polotovary.svg" class="tile_img">
                        <div class="tile_txt">
                            Jednoduchá práca s polotovarmi
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/odpisy.svg" class="tile_img">
                        <div class="tile_txt">
                            Rôzne možnosti odpisu zo skladov
                        </div>
                </div>
                <div class="tile">
                        <img src="img/food/sklad.svg" class="tile_img">
                        <div class="tile_txt">
                            Prehľadná a presná evidencia skladových zásob
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/inventura.svg" class="tile_img">
                        <div class="tile_txt">
                            Prehľadné spracovanie skladových inventúr
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/uzavierka.svg" class="tile_img">
                        <div class="tile_txt">
                            Uzávierky skladov na konci obdobia
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/exporty.svg" class="tile_img">
                        <div class="tile_txt">
                            Exporty pohybov a tržieb do účtovníctva
                        </div>
                </div>
                <div class="tile">
                            <img src="img/food/alkoholy.svg" class="tile_img">
                        <div class="tile_txt">
                            Spracovanie alkoholovej evidencie podľa zákona
                        </div>
                </div>
            </div>
            <div id="food_posts">
            <?php
            $post = new Post;
            $category = '2';
            $posts = $post->get('posts',array('category','=',$category))->results();
            $rowCount = 0;

                foreach($posts as $single){
                    if($rowCount++ %2 == 0){
                        echo '<div class="content_wrapper odd">';
                    }
                    else{
                        echo '<div class="content_wrapper even">';
                    }
                    echo '<div class="content_blok">';
                    echo           '<div class="content_title">' .$single->title. '</div>';
                    echo           '<div class="content_text"> ' .$single->content. '</div>';
                    echo '</div>';
                    echo '<div class="content_img">';
                    echo    '<img src="../' .$single->image. '" style="object-fit:contain;width:100%;">';
                    echo '</div>';
                    echo '</div>';             
                    }
            
            ?>
            </div>
            <div id="produkty">
                <?php include 'products.php'; ?> 
            </div>
            <p class="main_title">Pokladňa</p>
            <div id="food_tiles">
                <div class="tile">
                            <img src="img/kasa/dotyk.svg" class="tile_img">
                        <div class="tile_txt">
                           Rýchle a prehľadné ovládanie dotykom
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/platby.svg" class="tile_img">
                        <div class="tile_txt">
                            Používanie rôznych druhov platieb
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/prava.svg" class="tile_img">
                        <div class="tile_txt">
                            Inteligentný systém prístupových práv
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/stoly.svg" class="tile_img">
                        <div class="tile_txt">
                            Grafické rozloženie stolov na prevádzke
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/tlac.svg" class="tile_img">
                        <div class="tile_txt">
                            Tlač objednávok vo výrobných strediskách
                        </div>
                </div>
                <div class="tile">
                        <img src="img/kasa/hotel.svg" class="tile_img">
                        <div class="tile_txt">
                            Prepojenie na hotelové systémy
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/kredit.svg" class="tile_img">
                        <div class="tile_txt">
                            Prepojenie na vernostný kreditný systém
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/stats.svg" class="tile_img">
                        <div class="tile_txt">
                            Štatistiky predaja priamo na pokladni
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/funkcie.svg" class="tile_img">
                        <div class="tile_txt">
                            Rozsah funkcií prispôsobených prevádzke
                        </div>
                </div>
                <div class="tile">
                            <img src="img/kasa/alkohol.svg" class="tile_img">
                        <div class="tile_txt">
                            Evidencia predaného alkoholu priamo na predajni
                        </div>
                </div>
            </div>
            <div id="food_posts">
            <?php
            $post = new Post;
            $category = '3';
            $posts = $post->get('posts',array('category','=',$category))->results();
            $rowCount = 0;

                foreach($posts as $single){
                    if($rowCount++ %2 == 0){
                        echo '<div class="content_wrapper odd">';
                    }
                    else{
                        echo '<div class="content_wrapper even">';
                    }
                    echo '<div class="content_blok">';
                    echo           '<div class="content_title">' .$single->title. '</div>';
                    echo           '<div class="content_text"> ' .$single->content. '</div>';
                    echo '</div>';
                    echo '<div class="content_img">';
                    echo    '<img src="../' .$single->image. '" style="object-fit:contain;width:100%;">';
                    echo '</div>';
                    echo '</div>';             
                    }
            
            ?>
            </div>

    </body>
</html>