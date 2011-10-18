
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">



    <head profile="http://gmpg.org/xfn/11">

        <?php
            get_template_part('head_tag');
        ?>



    </head>

    <body>





        <div class="tail-right"></div>

        <div class="main">



            <div class="main-width">



                <div class="main-bgr">



                    <?php
                        get_template_part('head');
                    ?>

                    <div class="content">
                        <?php
                            get_template_part('slideshow');
                        ?>
                        <div class="content-bgr">

                            <?php
                                get_template_part('left');    
                            ?>
                            <div class="center">

                                <?php
                                    get_template_part('right');    
                                ?>




                                <div class="column-center">
                                    <?php            
                                        while (have_posts()) : the_post();

                                            $feature_image = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()),'fullsize');
                                        ?>
                                        <?php
                                            get_template_part('tour_list_template');
                                            endwhile;
                                        wp_reset_query();
                                    ?>
                                </div>

                            </div>    

                        </div>

                    </div>



                </div>



            </div>

            <?php 
                get_template_part('bottom');
            ?>
        </div>





    </body>

</html>
