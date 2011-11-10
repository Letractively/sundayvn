<?php

    $intcategory_id = 5;
    $tcat = get_category($intcategory_id );
    $args =    array(
      'numberposts'     => 5,
    'offset'          => 0,
    'category'        => $intcategory_id,
    'orderby'         => 'post_date',
    'order'           => 'DESC',
    );
    $tposts = get_posts($args);

    //'cat=5&order=desc&orderby=ID&posts_per_page=1');
    $tpost = $tposts[0];  
    $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($tpost->ID),'fullsize');

?>
<div class="widget widget_photos">

    <div class="widget-bgr">



        <div class="title">



            <div><div>

                    <h2>

                        News

                    </h2>

                </div></div>

        </div>

        <div class="photos">

            <a href="<?php echo get_permalink($tpost->ID); ?>"><img class="news_photo" style="float: left; width: 70px;height: 70px;" alt="" src="<?php echo $feature_image[0]; ?>" /></a><?php echo gioihankitu($tpost->post_content,140); ?>
            <div class="about">
                <a class="author_photos" href="<?php echo get_category_link($intcategory_id) ?>">Read more</a>

            </div>

        </div>



    </div>

    </div>