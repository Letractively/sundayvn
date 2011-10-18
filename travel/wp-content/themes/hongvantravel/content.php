<?php

   $tour_categories = get_terms( 'tourcategory', array(
    'order'    => 'ASC',
    'orderby'   =>'id',
    'hide_empty' => 0
    ) );
    $i = 1;
    foreach ( $tour_categories as $tourCategory)
    {
        if ($i > 4)
            break;
    ?>
    <div class="title-page01">

        <h2><a href="<?php echo get_term_link($tourCategory->slug, 'tourcategory'); ?>"><?php echo $tourCategory->name; ?></a></h2>
        <a href="<?php echo get_term_link($tourCategory->slug, 'tourcategory'); ?>"><img style="display: block; width: 100%;max-height: 200px;" src="<?php echo get_taxonomy_image($tourCategory->term_taxonomy_id); ?>"  /></a>

    </div>

    <?php
        //list 2 item
        $args = array(
            'numberposts'     => 2,
            'post_type'       => 'tour',
            'tourcategory'  => $tourCategory->name,
            'post_status'     => 'publish' );
        query_posts($args);
        if(have_posts()):
            while(have_posts()):
                the_post();
                ?>
                <div class="post hentry" id="post-<?php the_ID(); ?>">
                    <div class="indent">
                        <div class="title">
                            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>&nbsp;<i><?php echo get_post_meta($post->ID, 'time_tour',true); ?></i></h2>
                            <div class="date">
                                <?php echo get_the_date('l, F j, Y @ h:i A'); ?><br>
                            </div>
                        </div>
                        <div class="text-box">
                            <?php 
                                the_excerpt(); 
                            ?>
                        </div>
                        <div class="link-edit"></div>    
                    </div>
                </div>
                <?php
            endwhile;
        endif;
        wp_reset_query();
    ?>


    <div class="navigation nav-top nopadding">

        <div class="alignleft"></div>

        <div class="alignright"><a href="<?php echo get_term_link($tourCategory->slug, 'tourcategory'); ?>" >View all</a></div>

    </div>

    <div style=" clear: both;"></div>

    <?php
    $i++;
    }
?>
<?php
    if (1 == 0)
    {
    ?>

    <div class="title-page01">

        <h2>Vietnam</h2>
        <a href="#"><img style="display: block; width: 100%;height: 200px;" src="images/anh.jpg"  /></a>

    </div>





    <div class="post-9 post hentry category-albufeira category-corfu category-costa-del-sol category-fuerteventura tag-elit tag-fusce tag-nonummy tag-porta tag-sit tag-tetuer" id="post-9">



        <div class="indent">



            <div class="title">



                <h2><a href="#" rel="bookmark" title="Permanent Link to Royal Sea Aquarium Resort">Halong Paloma Cruise 2Days/1Night</a></h2>




                <div class="date">

                    Thursday, January 14, 2010 @ <span>06:01 AM</span>

                </div>





            </div>



            <div class="text-box">

                <p>&quot;Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi&quot; <a href="http://osc.template-help.com/wordpress_27338/?p=9#more-9" class="more-link">more</a></p>
            </div>





            <div class="link-edit"></div>    



        </div>



    </div>
    <div class="post-9 post hentry category-albufeira category-corfu category-costa-del-sol category-fuerteventura tag-elit tag-fusce tag-nonummy tag-porta tag-sit tag-tetuer" id="post-9">



        <div class="indent">



            <div class="title">



                <h2><a href="#" rel="bookmark" title="Permanent Link to Royal Sea Aquarium Resort">Hanoi-Sapa- Halong 5Days/4Nights</a></h2>




                <div class="date">

                    Thursday, January 14, 2010 @ <span>06:01 AM</span>

                </div>





            </div>



            <div class="text-box">

                <p>&quot;Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi&quot; <a href="http://osc.template-help.com/wordpress_27338/?p=9#more-9" class="more-link">more</a></p>
            </div>





            <div class="link-edit"></div>    



        </div>



    </div>


    <div class="navigation nav-top">

        <div class="alignleft"><a href="#" >View all</a></div>

        <div class="alignright"></div>

    </div>

    <div style=" clear: both;"></div>

    <!-- END VIET NAM TOUR-->


    <div class="title-page01">

        <h2>Cambodia</h2>
        <a href="#"><img style="display: block; width: 100%;height: 200px;" src="images/Phnom-Penh-Angkor-7-days,Phnom-Penh-Angkor-Travel-Phnom-Penh-Angkor-Travel-Phnom-Penh-Angkor-Tour_29716275_ANGKOR WAT1.jpg"  /></a>

    </div>





    <div class="post-9 post hentry category-albufeira category-corfu category-costa-del-sol category-fuerteventura tag-elit tag-fusce tag-nonummy tag-porta tag-sit tag-tetuer" id="post-9">



        <div class="indent">



            <div class="title">



                <h2><a href="#" rel="bookmark" title="Permanent Link to Royal Sea Aquarium Resort">Halong Paloma Cruise 2Days/1Night</a></h2>




                <div class="date">

                    Thursday, January 14, 2010 @ <span>06:01 AM</span>

                </div>





            </div>



            <div class="text-box">

                <p>&quot;Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi&quot; <a href="http://osc.template-help.com/wordpress_27338/?p=9#more-9" class="more-link">more</a></p>
            </div>





            <div class="link-edit"></div>    



        </div>



    </div>
    <div class="post-9 post hentry category-albufeira category-corfu category-costa-del-sol category-fuerteventura tag-elit tag-fusce tag-nonummy tag-porta tag-sit tag-tetuer" id="post-9">



        <div class="indent">



            <div class="title">



                <h2><a href="#" rel="bookmark" title="Permanent Link to Royal Sea Aquarium Resort">Hanoi-Sapa- Halong 5Days/4Nights</a></h2>




                <div class="date">

                    Thursday, January 14, 2010 @ <span>06:01 AM</span>

                </div>





            </div>



            <div class="text-box">

                <p>&quot;Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi&quot; <a href="http://osc.template-help.com/wordpress_27338/?p=9#more-9" class="more-link">more</a></p>
            </div>





            <div class="link-edit"></div>    



        </div>



    </div>


    <div class="navigation nav-top">

        <div class="alignleft"><a href="#" >View all</a></div>

        <div class="alignright"></div>

    </div>

    <div style=" clear: both;"></div>

    <!-- END CAMBODIA TOUR-->
    <div class="title-page01">

        <h2>Laos</h2>
        <a href="#"><img style="display: block; width: 100%;height: 200px;" src="images/250210012701-photo_lg_laos.jpg"  /></a>

    </div>

    <div class="post-9 post hentry category-albufeira category-corfu category-costa-del-sol category-fuerteventura tag-elit tag-fusce tag-nonummy tag-porta tag-sit tag-tetuer" id="post-9">



        <div class="indent">

            <div class="title">


                <h2><a href="#" rel="bookmark" title="Permanent Link to Royal Sea Aquarium Resort">Halong Paloma Cruise 2Days/1Night</a></h2>


                <div class="date">

                    Thursday, January 14, 2010 @ <span>06:01 AM</span>

                </div>


            </div>



            <div class="text-box">

                <p>&quot;Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi&quot; <a href="http://osc.template-help.com/wordpress_27338/?p=9#more-9" class="more-link">more</a></p>
            </div>



            <div class="link-edit"></div>    


        </div>


    </div>
    <div class="post-9 post hentry category-albufeira category-corfu category-costa-del-sol category-fuerteventura tag-elit tag-fusce tag-nonummy tag-porta tag-sit tag-tetuer" id="post-9">



        <div class="indent">

            <div class="title">

                <h2><a href="#" rel="bookmark" title="Permanent Link to Royal Sea Aquarium Resort">Hanoi-Sapa- Halong 5Days/4Nights</a></h2>


                <div class="date">

                    Thursday, January 14, 2010 @ <span>06:01 AM</span>

                </div>


            </div>



            <div class="text-box">

                <p>&quot;Lorem ipsum dolor sit amet, consec tetuer adipiscing elit. Praesent vestibulum molestie lacus. Aenean nonummy hendrerit mauris. Phasellus porta. Fusce suscipit varius mi&quot; <a href="http://osc.template-help.com/wordpress_27338/?p=9#more-9" class="more-link">more</a></p>
            </div>

            <div class="link-edit"></div>    


        </div>

    </div>

    <div class="navigation nav-top">
        <div class="alignleft"><a href="#" >View all</a></div>
        <div class="alignright"></div>
    </div>
    <div style=" clear: both;"></div>
    <?php
    }
?>