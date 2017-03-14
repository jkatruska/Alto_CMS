<?php 
            require_once realpath(__DIR__ ) . "/admin/core/init.php";
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Alto</title>
<meta name="description" content="Alto">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="style.css" type="text/css" rel="stylesheet">
</head>

<body>
	<?php 		
        $notification = new Post();
        $notifications = $notification->get('notifications');
        if ($notifications->count() > 0){
            $results = $notifications->results();
        ?>
				<div class="oznamy_bg">
                    <div class="oznamy_wrapper">
                        <div class="close">&times;</div>
                        <p class="oznamy_title">Dôležité oznamy</p>
                        <div class="oznamy">
                        <?php				
                            foreach($results as $result){
                                echo '<p>'.nl2br($result->content).'</p>';
                            }
                        ?>
                       </div>
                    </div>
				</div>
        <?php } ?>

    <div class="wrapper">
		<div id="header">
        <a class="open_close_nav">
        	   <div class="mobile_menu">	
                        <img src="images/menu.svg" class="m_menu">
                        <img class="m_menu_text" src="images/alto_logo.png">
                    </a>
                    <div class="topnav">
                          <a href="#products">Produkty</a>
                          <a href="#content">Novinky</a>
                          <a href="#calendar">Kalendár seminárov</a>
                          <a href="#customers">Zákaznici</a>
                          <a href="#contact">Kontakt</a>
                    </div>
               </div>
                <div class="menu">
                	<ul>
                    	<a href="#products"><li>Produkty </li></a>
                        <a href="#content"><li>Novinky</li></a>
                        <a href="#calendar"><li>Kalendár seminárov</li></a>
                        <a href="#customers"><li>Zákazníci</li></a>
                        <a href="#contact"><li>Kontakt </li></a>
                    </ul>
                </div>
        </div>
        <div id ="jumbotron">  
            <img src="images/slideshow_arrow.svg" class="arrow-next">
            <img src="images/slideshow_arrow.svg" class="arrow-prev">
	        <div id="slideshow">
                <?php 
                $image = new Post();
                $images = $image->get('slideshow');
                $results = $images->results();
                $i = 0;
                $len = count($results);
                foreach ($results as $result){
                    if($i == 0){
                    echo '<div class="slide active-slide" style="display:block">
                            <img src="'. $result->image . '">
                            <p class="main_text">'.$result->title .'</p>
                            <p class="secondary_text">'.$result->content .'</p>
                         </div>';
                    }
                    else{
                        echo '<div class="slide" style="display:none">
                            <img src="'. $result->image . '">
                            <p class="main_text">'.$result->title .'</p>
                            <p class="secondary_text">'.$result->content .'</p>
                         </div>';
                    }
                    $i++;
                }
                ?>
            </div>
            <a href="#products">
            <img src="images/jumbo_arrow.svg" class="jumbo_arrow">
            </a>
        </div>
        <!--
        <div id="about_us">
        	<p class="about_title">Alto Slovakia s.r.o</p>
            <div class="short_line"></div>
            <p class="about_content">Už 25 rokov hrdým dodávateľom reštauračného a hotelového systému</p>
        </div>
        -->
        <div id="products">
        	<div class="container_product">
            	<div class="product_blok">
                	<div class="product_img_wrapper">
                		<img class="product_img" src="images/food.svg">
                    </div>
                    <p class="product_title">Reštauračný systém</p>
                    <p class="product_content">Chcete aby prevádzka Vašej reštaurácie bola výnosná, Vaši zákazníci odchádzali spokojní a opäť sa k Vám vracali?<br>  
Sústreďte sa na hostí a ich spokojnosť a ostatné prenechajte na spoľahlivý reštauračný systém. Dotyková pokladňa s rýchlym účtovaním, prehľadná skladová evidencia, množstvo zostáv a štatistík potrebných pre riadenie prevádzky, evidencia a plánovanie akcií, prepojenie na vernostný systém - Vám zabezpečia efektívnu prácu, dokonalý prehľad, vyššie tržby a spoľahlivú kontrolu prevádzky.</p>
                    <a href="/food">
                    	<p class="product_button">Zistite viac</p>
                    </a>
                </div>
                <div class="product_blok">
                	<div class="product_img_wrapper">
                		<img class="product_img" src="images/hotel.svg">
                    </div>
                    <p class="product_title">Hotelový systém</p>
                    <p class="product_content">Potrebujete komplexne zabezpečiť všetky činnosti 
na recepcii a poskytnúť hosťom komfortné služby?<br> 
Používajte kvalitný hotelový systém a majte prevádzku hotela pod kontrolou. Rezervácie ubytovania cez internet, rýchle ubytovanie hostí, vyúčtovanie poskytnutých služieb, štatistiky potrebné pre riadenie hotela - funkcie, ktoré Vám zabezpečia plnú kontrolu nad prevádzkou hotela.</p>
                    <a href="/hores">
                    	<p class="product_button">Zistite viac</p>
                    </a>
                </div>
                <div class="product_blok">
                	<div class="product_img_wrapper">
                		<img class="product_img" src="images/credit.svg">
                    </div>
                    <p class="product_title">Kreditný systém</p>
               	    <p class="product_content">Máte športové alebo relaxačné centrum? Potrebujete predávať služby alebo tovar, sledovať čerpanie služieb a vybudovať vernostný kreditný systém?<br> 
Používajte počítačovú registračnú pokladňu s prepojením na vernostný kreditný systém, prístupový systém a internetový rezervačný systém. Prepojenie týchto systémov do jedného celku Vám zabezpečí všetky činnosti potrebné pre prevádzku športového či relaxačného centra.</p>
                    <a href="/food#kredit">
                    	<p class="product_button">Zistite viac</p>
                    </a>
                </div>

            </div>
        </div>
        <div class="line"></div>
        <div id="content" class="green_bg">
        	<?php
            $post = new Post;
            $category = '1';
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
                    echo    '<img src="' .$single->image. '" style="object-fit:contain;width:100%;">';
                    echo '</div>';
                    echo '</div>';             
                    }
            
            ?>
        </div><!--end content-->
        <div id="calendar">
        	<?php include 'calendar.php';  ?>
        </div> <!-- end #calendar-->
        <div id="customers" class="green_bg">
        	<?php include 'customers.php';  ?>
        </div><!--end #customers-->
        <div id="contact">
        <?php 
		if(isset($_POST["submit_email"])){
			$to= "jkatruska@gmail.com";
			$name=$_POST["name"];
			$subject=$_POST["subject"];
			$email=$_POST["email"];
			$mobil=$_POST["mobil"];
			$text=$_POST["text"];
			$headers = 'From:' . $email . "\r\n" .
						'Reply-To:'. $email. "\r\n" .
						'X-Mailer: PHP/' . phpversion();
			$message = $name . ' ' . $email . ' ' . $mobil . ' ' . $text;
						
			if(mail($to, $subject, $message, $headers)){
				$message = "sprava odoslaná";	
			}
			else{
				$message = "you prick";	
			}
		}
		?>
        	<div class="contact_wrapper">
            	<p class="slide_title">Kontaktujte nás</p>
                <?php $message='' ?>
            	<form method="post">
                	<div class="udaje">
                    	<div class="udaj">
                            <img class="input" src="images/person.svg">
                            <input type="text" class="pole" placeholder="Meno" name="name">
                        </div>
                        <div class="udaj">
                            <img class="input" src="images/pencil.svg">
                            <input type="text" class="pole" placeholder="Predmet" name="subject">
                        </div>
                    	<div class="udaj">
                            <img class="input" src="images/mail.svg">
                            <input type="text" class="pole" placeholder="Email" name="email">
                        </div>
                        <div class="udaj">
                            <img class="input" src="images/mobile.svg">
                            <input type="text" class="pole" placeholder="Telefón" name="mobil">
                        </div>
                    </div>
                    <div class="text_area">
                    	<textarea class="text_textarea" placeholder="Správa" name="text"></textarea> 
                    </div>
                    <button type="submit" class="submit" name="submit_email">Odoslať</button>
                    <?php echo $message; ?>
                </form>
                <p class="slide_title">Kde nás nájdete</p>
                <div class="svit">
                	<p class="nazov_firma">Svit</p>
                    <div class="popis">
                    	ADRESA:<br>
                        E-Mail:<br>
                        Telefón:<br>
                        Podpora:<br>
                    </div>
                    <div class="popis_full">
                    	SLÁDKOVIČOVA 33, 059 21 SVIT<br>
                        alto@alto.sk<br>
                        +421 52 3210400<br>
                        podpora@alto.sk 
                    </div>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2614.5314728256285!2d20.19803681529818!3d49.05753147930754!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473e2581d13a9cf9%3A0x62faa14639a79388!2sSl%C3%A1dkovi%C4%8Dova+159%2F33%2C+059+21+Svit!5e0!3m2!1ssk!2ssk!4v1477178626635"  frameborder="0" style="border:0" allowfullscreen class="map"></iframe>
                </div>
                <div class="blava">
                	<p class="nazov_firma">Bratislava</p>
                    <div class="popis">
                    	ADRESA:<br>
                        E-Mail:<br>
                        Telefón:<br>
                        Podpora:<br>
                    </div>
                    <div class="popis_full">
                        KUTLÍKOVÁ 17, 852 12 BRATISLAVA<br>
                        altoba@alto.sk<br>
                        +421 52 3210400<br>
                        altoba@alto.sk
                    </div>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2663.9429892505987!2d17.108620415257654!3d48.11133547922136!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476c89a4be209235%3A0x340054904e822565!2sKutl%C3%ADkova+1755%2F17%2C+851+02+Petr%C5%BEalka!5e0!3m2!1ssk!2ssk!4v1477179212310" frameborder="0" style="border:0" allowfullscreen class="map"></iframe>
                </div>
            </div><!--end wrapper_contact-->
        </div> <!--end contact-->
        <div id="footer" style="text-align:center">
        ALTO Slovakia, s.r.o., Sládkovičova 33, 059 21 SVIT, IČO: 31664881
        </div>
        </div>
    </div>
<script src="jquery.js"></script>
<script src="features.js"></script>
<script src="slideshow.js"></script>
</body>
</html>