<div class="title-page01">
        <?php
        $tourCategory = get_term_by ('name',$term,'tourcategory');

?>
        <h2><?php echo $tourCategory->name; ?></h2>
        <a href="<?php echo get_term_link($tourCategory->slug, 'tourcategory'); ?>"><img style="display: block; width: 100%;max-height: 200px;" src="<?php echo get_taxonomy_image($tourCategory->term_taxonomy_id); ?>"  /></a>

    </div>
<?php            
    while (have_posts()) : the_post();

        $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'fullsize');
    ?>
        <?php
        get_template_part('tour_list_template');
        endwhile;
    wp_reset_query();
?>