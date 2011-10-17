<?php            
    while (have_posts()) : the_post();
       
        $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'fullsize');
        get_template_part('tour_list_template');
        endwhile;
    wp_reset_query();
?>