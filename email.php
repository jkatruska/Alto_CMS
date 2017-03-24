<?php 
			$to= "jkatruska@gmail.com";
			$name=$_GET["name"];
			$subject=$_GET["subject"];
			$email=$_GET["email"];
			$mobil=$_GET["mobil"];
			$text=$_GET["text"];
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
        ?>