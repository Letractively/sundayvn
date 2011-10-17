<?php
    $tour_categories = get_terms( 'tourcategory' );

    foreach ( $tour_categories as $tourCategory)
    {

        //        $img = wp_get_attachment_image_src( $tourCategory->image_id, 'thumbnail' );
        //        if ( isset( $img[0] ) ) {
        //            $src = $img[0];
        //        }
    ?>
    <div class="title-page01">

        <h2><?php echo $tourCategory->name; ?></h2>
        <a href="<?php echo get_term_link($tourCategory->slug, 'tourcategory'); ?>"><img style="display: block; max-width: 100%;max-height: 200px;" src="<?php echo get_taxonomy_image($tourCategory->term_taxonomy_id); ?>"  /></a>

    </div>

    <?php
        global $wpdb;

        //list 2 item
        $termPosts = $wpdb->get_results
        ( "SELECT *  
        FROM 
        {$wpdb->posts},{$wpdb->term_relationships}
        WHERE
        `post_type`                 =       'tour'
        AND
        `term_taxonomy_id`          =       '{$tourCategory->term_id}'
        AND
        `object_id`                 =       {$wpdb->posts}.`ID`
        
        ORDER BY
        ID DESC
        limit 0,2
        " );
        $wpdb->flush(); 
        /*
        [0] => stdClass Object
        (
        [ID] => 115
        [post_author] => 1
        [post_date] => 2011-10-14 15:16:23
        [post_date_gmt] => 2011-10-14 15:16:23
        [post_content] => Get well and truly ‘off the beaten track’ in these two fascinating countries. Instead of flying between the major destinations, why not travel overland and cross the border near the 4000 islands area of the Mekong? After discovering ancient Khmer temples in southern Laos venture to remote Ratanakiri province in northeastern Cambodia. Enter a world of mountains, elephants and ethnic minorities before ending your adventure in Phnom Penh, the capital of the Kingdom.
        [post_title] => Undiscovered Laos and Cambodia
        [post_excerpt] => 
        [post_status] => publish
        [comment_status] => open
        [ping_status] => open
        [post_password] => 
        [post_name] => undiscovered-laos-and-cambodia
        [to_ping] => 
        [pinged] => 
        [post_modified] => 2011-10-14 15:16:23
        [post_modified_gmt] => 2011-10-14 15:16:23
        [post_content_filtered] => 
        [post_parent] => 0
        [guid] => http://localhost/travel/?post_type=tour&p=115
        [menu_order] => 0
        [post_type] => tour
        [post_mime_type] => 
        [comment_count] => 0
        [object_id] => 115
        [term_taxonomy_id] => 7
        [term_order] => 0
        )
        */
        
        foreach ( $termPosts as $post )
        {
               $date = new DateTime($post->post_date);
        ?>
        <div class="post hentry" id="post-<?php echo $post->ID; ?>">
            <div class="indent">

                <div class="title">

                    <h2><a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a></h2>
                    <?php echo get_post_meta($post->ID, 'time_tour',true); ?>
                    <div class="date">
           
                        <?php echo $date->format('F'); ?>, <?php echo intToDayName($date->format('w')); ?> <?php echo $date->format('d') ?>, <?php echo $date->format('Y') ?> @ <span><?php echo $date->format('H:i A'); ?></span>
                    </div>

                </div>

                <div class="text-box">

                    <p><?php echo gioihankitu($post->post_content,362); ?>&nbsp;<a href="<?php echo get_permalink($post->ID); ?>" class="more-link">more</a></p>
                </div>
                <div class="link-edit"></div>    
            </div>
        </div>  
        <?php
        }
    ?>


    <div class="navigation nav-top">

        <div class="alignleft"><a href="<?php echo get_term_link($tourCategory->slug, 'tourcategory'); ?>" >View all</a></div>

        <div class="alignright"></div>

    </div>

    <div style=" clear: both;"></div>

    <?php
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