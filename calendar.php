    <div class="calendar_wrapper">	
    <p class="slide_title">Kalendár seminárov</p>
	<?php
		$calendar = new Calendar();
		$results = $calendar->get('calendar','product','food'); 
		if ($results->count()<= 0){
				echo '<p class="empty_db">V najbližšom čase nie sú žiadne semináre</p>';
			} 		
           else{
			   $results_f = $calendar->get('calendar',array('product','=','food'))->results();
            	echo('<div class="calendar_food">
                	<p class="calendar_product_name">FOOD</p>
                    <div class="calendar_line"></div>');
						foreach($results_f as $resultf){
						echo('<div class="event">');
						echo('<div class="event_name">' .$resultf->name . '</div>');
						echo('<div class="event_date">' .$resultf->date . '</div>');
						echo('<div class="event_content">' .$resultf->content . '</div>');
						if(substr($resultf->link,0,4) !== "http"){
							$resultf->link = "http://" . $resultf->link;
						}
						echo('<a href="'.$resultf->link.'">
                            <div class="event_button">
                                Prihláste sa
                            </div>
                        	</a>');
						echo('</div>');
						}
               echo' </div><!--end calendar food-->';
                
                
                
               echo('<div class="calendar_hores">
					<p class="calendar_product_name">Hores</p>
                    <div class="calendar_line"></div>');
					$results_h = $calendar->get('calendar',array('product','=','hores'))->results();
						foreach($results_h as $resulth){
						echo('<div class="event">');
						echo('<div class="event_name">' .$resulth->name . '</div>');
						echo('<div class="event_date">' .$resulth->date . '</div>');
						echo('<div class="event_content">' .$resulth->content . '</div>');
						if(substr($resulth->link,0,4) !== "http"){
							$resulth->link = "http://" . $resulth->link;
						}
						echo('<a href="'.$resulth->link.'">
                            <div class="event_button">
                                Prihláste sa
                            </div>
                        	</a>');
						echo('</div>');
						}
					

              echo('  </div><!--end calendar hores-->
            </div><!--end calendar wrapper-->');
}
?>