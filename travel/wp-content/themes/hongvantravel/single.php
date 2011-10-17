
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
                                    <div class="post hentry" id="post-<?php echo $post->ID; ?>">
                                        <div class="indent">

                                            <div class="title">
<?php
     $date = new DateTime($post->post_date);
?>

                                                <h2>
                                                    <a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a>&nbsp;<i><?php echo get_post_meta($post->ID, 'time_tour',true); ?></i>
                                                </h2>

                                                <div class="date">

                                                    <?php echo $date->format('F'); ?>, <?php echo intToDayName($date->format('w')); ?> <?php echo $date->format('d') ?>, <?php echo $date->format('Y') ?> @ <span><?php echo $date->format('H:i A'); ?></span>
                                                </div>

                                            </div>

                                            <div class="text-box">

                                                <p><?php echo gioihankitu($post->post_content,362); ?>&nbsp;</p>
                                            </div>
                                            <div class="link-edit"></div>    
                                        </div>
                                    </div>
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
