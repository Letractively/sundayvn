<?php

    $category_id = 5;
    $cat = get_category($category_id);
    $posts = query_posts('cat=5&order=desc&orderby=ID&posts_per_page=1');
    $post = $posts[0];  
    $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'fullsize');

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

            <a href="<?php echo get_permalink($post->ID); ?>"><img class="news_photo" style="float: left; width: 70px;height: 70px;" alt="" src="<?php echo $feature_image[0]; ?>" /></a><?php echo gioihankitu($post->post_content,140); ?>
            <div class="about">
                <a class="author_photos" href="<?php echo get_category_link($category_id) ?>">Read more</a>

            </div>

        </div>



    </div>

    </div>