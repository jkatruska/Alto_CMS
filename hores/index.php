<?php 
    require_once realpath(__DIR__ . '/..') . "/admin/core/init.php";
?>
<!Doctype>
<html>
    <head>
        <Title>Hores</Title>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div id="wrapper">
            <div id="jumbotron">
                <div class="menu">
                    <ul>
                        <a href="#features"><li>Vlastonosti systému</a>
                        <a href="#functions"><li>Funkcie</a>
                        <a href="#modules"><li>Moduly</a>
                    </ul>
                </div>
                <div class="jumbo_bg">
                    <img src="images/jumbotron.png">
                </div>
                <p class="jumboheader">Hotelový systém<br> Hores</p>
            </div>
            <h1 id="features">Vlastnosti systému</h1>
            <div id="hores_tiles">
                <div class="tile">
                    <img src="images/reserv_ubyt.svg" class="tile_img">
                        <div class="tile_txt">
                            Komplexné riešenie rezervácií a ubytovania hostí
                        </div>
                </div>
                <div class="tile">
                    <img src="images/graphic.svg" class="tile_img">
                        <div class="tile_txt">
                            Jednoduché ovládanie a grafický prehľad o obsadenosti hotela
                        </div>
                </div>
                <div class="tile">
                    <img src="images/www.svg" class="tile_img">
                        <div class="tile_txt">
                            Využívanie online rezervácií cez webovú stránku
                        </div>
                </div>
                <div class="tile">
                    <img src="images/invoice.svg" class="tile_img">
                        <div class="tile_txt">
                            Možnosť vystavovať potvrdenie rezervácie, zálohovú fakturu a posielať ich cez e-mail hosťovi
                        </div>
                </div>
                <div class="tile">
                    <img src="images/reports.svg" class="tile_img">
                        <div class="tile_txt">
                            Prehľadné štatistiky pre riadenie hotela, manažérske štatistiky a reporty
                        </div>
                </div>
                <div class="tile">
                    <img src="images/connect.svg" class="tile_img">
                        <div class="tile_txt">
                            Prepojenie na ďalšie hotelové systémy
                        </div>
                </div>
            </div>
            <div id="hores_posts">
            <?php
            $post = new Post;
            $category = '4';
            $posts = $post->get('posts',array('category','=',$category))->results();
            $rowCount = 0;

                foreach($posts as $single){
                    if($rowCount++ %2 == 0){
                        echo '<div class="content_wrapper odd">';
                    }
                    else{
                        echo '<div class="content_wrapper even">';
                    }
                    echo '<div class="content_blok">
                               <div class="content_title">' .$single->title. '</div>
                              <div class="content_text"> ' .$single->content. '</div>
                            </div>
                            <div class="content_img">
                            <img src="../' .$single->image. '" style="width:100%;">
                            </div>
                            </div>';          
                    }
            
            ?>
            </div>
            <div id="functions" class="dark-bg">
                <h1>Funkcie systému</h1>
                <div class="functions_wrapper">
                     <?php 
                     $results = $post->get('functions')->results();
                     foreach($results as $result){
                         echo '<div class="function">
                                    <img src="../'.$result->image.'" class="function_img">
                                    <p class="function_txt">'.$result->name.'</p>
                                    <div class="function_content">'.$result->text.'</div>
                                </div>';
                     }
                    ?>
                </div>
            </div>
           <div id="modules">
                <h1>Moduly</h1>
                <div class="modules_wrapper">
                <?php 
                     $results = $post->get('modules')->results();
                     foreach($results as $result){
                         echo '<div class="function">
                                    <img src="../'.$result->image.'" class="module_img">
                                    <p class="module_name">'.$result->name.'</p>
                                    <p class="module_content">'.$result->content.'</div>
                                </div>';
                     }
                    ?>
                </div>
           </div>
         </div>  
         </body>
         <script src="jquery.js"></script>
         <script src="features.js"></script>
         </html>