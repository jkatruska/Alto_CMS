<div class="content_blok">
    <div class="content_title">
        <?php the_title(); ?>
    </div>
    <div class="content_text">
        <?php the_content(); ?>
    </div>
</div>
    <div class="content_img">
    <?php if(has_post_thumbnail()) {                    
        $image_src = wp_get_attachment_image_src( get_post_thumbnail_id(),'full' );
         echo '<img src="' . $image_src[0]  . '" style="object-fit:contain; width:100%;" >';
    } ?>
    </div>
