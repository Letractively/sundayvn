
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
                                    <div class="title-page01">
                                        <?php
                                            $term_data = get_term_by('slug',$term,'tourcategory');
                                        ?>
                                        <h2><?php echo $term_data->name ?></h2>
                                        <p></p>
                                        <img style="display: block; width: 100%;max-height: 200px;" src="<?php echo get_taxonomy_image($term_data->term_taxonomy_id); ?>"  />
                                        <p></p>
                                        <div class="text-box"><?php echo $term_data->description ?></div>
                                        <p></p>
                                    </div>
                                    <?php
                                        get_template_part('loop_tour');
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
