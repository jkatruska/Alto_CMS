<div class="customers_wrapper">
	<p class="slide_title">Naší spokojní zákazníci</p>
    <div class="imgs_wrapper">
		<?php 
			$image = new Post();
			$images = $image->get('customers')->results();
			foreach($images as $single){
				echo '<div class="img_wrapper">
						<img class="customer_img" src="' . $single->image .'">
						<p class="text_img">' . $single->name .'</p>
					 </div><!--end .img_wrapper-->';
			}
			?>
    </div><!--end .imgs_wrapper-->
</div>