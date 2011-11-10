<?php
    if ( is_front_page() )
    {
    ?>
    <div id="slideshow">
    <div class="slider-wrapper theme-default">
        <div class="ribbon"></div>
        <div id="slider" class="nivoSlider">
            <?php
                $args = array(
                'category' =>'3'
                );
                $tposts = get_posts($args);
                foreach ( $tposts as $tpost)
                {
                    $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id($tpost->ID),'fullsize');
                ?>
                <img src="<?php echo $feature_image[0]; ?>" title="<?php echo gioihankitu($tpost->post_content,300); ?>" width="860px" height="300px" />
                <?php
                }
            ?>
            <!--
            <img src="images/OPJIQYX91_344097-Phuket-Travel.jpg" title="ddd" width="860px" height="300px" />
            <img width="860px" height="300px" src="images/Vinpearl-Resort-Nha-Trang1.jpg" alt="" title="#htmlcaption" />
            </div>
            <div id="htmlcaption" class="nivo-html-caption">
            Are you interested in adventure trekking? If you are, this tour is a big challenge for you
            </div>-->
        </div>
    </div>
    <?php

    }
?>