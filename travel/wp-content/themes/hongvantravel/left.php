<div class="column-left">
    <div class="widget widget-flashmap ">

        <div class="widget-bgr"><div class="bgr">

                <script language="javascript">

                    if (AC_FL_RunContent == 0) {

                        alert("This page requires AC_RunActiveContent.js.");

                    } else {

                        AC_FL_RunContent(

                        'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',

                        'width', '174',

                        'height', '220',

                        'src', 'http://localhost/travel/Untitled-1',

                        'quality', 'high',

                        'pluginspage', 'http://www.macromedia.com/go/getflashplayer',

                        'align', 'middle',

                        'play', 'true',

                        'loop', 'true',

                        'scale', 'showall',

                        'wmode', 'transparent',

                        'devicefont', 'false',

                        'id', 'Untitled-1',

                        'bgcolor', '#ffffff',

                        'name', 'Untitled-1',

                        'menu', 'true',

                        'allowFullScreen', 'false',

                        'allowScriptAccess','sameDomain',

                        'movie', 'Untitled-1',

                        'salign', ''

                        ); //end AC code

                    }

                </script>

                <noscript>

                    <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="174" height="220" id="Untitled-1" align="middle">

                        <param name="allowScriptAccess" value="sameDomain" />

                        <param name="allowFullScreen" value="false" />

                        <param name="movie" value="Untitled-1.swf" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />    <embed src="http://localhost/travel/Untitled-1.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="174" height="220" name="Untitled-1" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />

                    </object>

                </noscript>

            </div>

        </div></div>
    <div class="widget widget_categories">

        <div class="widget-bgr"><div class="bgr">
                <div id="dear_customer">
                    <?php
                        $page_id = 124;
                        $page = get_page($page_id);
                    ?>
                    <h3><?php echo $page->post_title;
                            //268
                            $dear = gioihankitu($page->post_content,268);
                    ?></h3>
                    <?php echo $dear; ?>
                    <br /><a href="<?php echo get_permalink($page->ID); ?>">Read more...</a>
                </div>

            </div>

        </div></div>





    <div class="widget widget_archive">

        <div class="widget-bgr"><div class="bgr">

                <div class="title">

                    <div><div>

                            <h2>Travelers Reviews</h2>

                        </div></div>

                </div>

                <ul>
                    <?php
                        //$tterm = get_term();
                        $args = array(
                        'numberposts'     => 2,
                        'post_type'       => 'travelersreview',
                        'post_status'     => 'publish' );
                        query_posts($args);
                        if(have_posts()):
                            while(have_posts()):
                                the_post();
                            
                            ?>
                            <li class="review"><a href='<?php the_permalink(); ?>' title='January 2010'><?php echo gioihankitu( $post->post_content,150); ?></a><b><?php echo get_post_meta($post->ID, 'traveler_name',true); ?></b></li>
                            <?php
                                endwhile;
                            endif;
                        wp_reset_query();
                    ?>

                    <!--<li><a href='#' title='October 2009'>Just to let you know that we had a great trip. We liked most of the hotels and the guides. The guide in Hanoi was ...</a><b>John Terry</b></li>-->

                </ul>

            </div></div>

    </div>



    <div class="widget widget_links linkcat" id="linkcat-2 blogroll"><div class="widget-bgr">

            <div class="title"><div><div><h2>                

                            Tours        </h2></div></div></div>                    


            <ul class='xoxo blogroll'>
                <?php
                    $tour_categories = get_terms( 'tourcategory', array(
                    'order'    => 'DESC',
                    'hide_empty' => 0
                    ) );
                ?>
                <?php
                    foreach ($tour_categories as $t_c)
                    {
                    ?>
                    <li><a href="<?php echo get_term_link($t_c->slug, 'tourcategory'); ?>"><?php echo $t_c->name; ?></a></li>
                    <?php
                    }
                ?>

                <!--<li><a href="#">Vietnam Hotels</a></li>
                <li><a href="#">Cambodia Tours</a></li>
                <li><a href="#">Cambodia Hotels</a></li>
                <li><a href="#">Laos Tours</a></li>
                <li><a href="#">Laos Hotels</a></li>
                <li><a href="#">Indochina Tours</a></li>
                <li><a href="#">Indochina Tours</a></li>-->
            </ul>
        </div></div>






    <div class="widget widget_meta">

        <div class="widget-bgr">

            <div class="title">

                <div><div>

                        <h2>Useful information</h2>

                    </div></div>

            </div>



            <ul>
                <?php
                    $tcate =13;
                    $tcate = get_category($tcate);
                    $args = array(
                    'type'                     => 'post',
                    'child_of'                 => 13,

                    'orderby'                  => 'name',
                    'order'                    => 'ASC',
                    'hide_empty'               => 1,
                    'hierarchical'             => 1,
                    'taxonomy'                 => 'category',
                    'pad_counts'               => false );
                    $tcates  = get_categories($args);
                    foreach ( $tcates as $tsubcate)
                    {
                    ?>
                    <li class="useful"><b><?php echo $tsubcate->name ?></b>
                        <?php
                            $args = array(
                            'category'        => $tsubcate->term_id,
                            'orderby'         => 'post_date',
                            'order'           => 'DESC',

                            'post_type'       => 'post',

                            'post_status'     => 'publish' ); 
                            $tposts = get_posts($args);
                            foreach ($tposts as $tpost)
                            {
                            ?>
                            <a href="<?php echo get_permalink($tpost->ID); ?>"><?php echo $tpost->post_title; ?></a>
                            <?php
                            }
                        ?>                                       

                    </li>
                    <?php
                    }
                ?>

                <!--<li><b>In Vietnam</b>
                <a href="#" title="This page The World Wide Web Consortium (W3C)">Vietnam Currency</a>
                <a href="#" title="This page The World Wide Web Consortium (W3C)">Government Agencies</a>

                </li>-->   

            </ul>



        </div>

    </div>



    <!--<div class="widget widget_tag_cloud">

    <div class="widget-bgr">

    <div class="title">

    <div><div><h2>Tags</h2></div></div>

    </div>



    <div><a href='http://osc.template-help.com/wordpress_27338/?tag=consec' class='tag-link-25' title='1 topic' style='font-size: 8pt;'>consec</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=elit' class='tag-link-21' title='1 topic' style='font-size: 8pt;'>elit</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=fusce' class='tag-link-17' title='1 topic' style='font-size: 8pt;'>fusce</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=mauris' class='tag-link-23' title='1 topic' style='font-size: 8pt;'>mauris</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=nonummy' class='tag-link-20' title='1 topic' style='font-size: 8pt;'>nonummy</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=porta' class='tag-link-19' title='1 topic' style='font-size: 8pt;'>porta</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=sit' class='tag-link-22' title='2 topics' style='font-size: 22pt;'>sit</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=tetuer' class='tag-link-18' title='2 topics' style='font-size: 22pt;'>tetuer</a>
    <a href='http://osc.template-help.com/wordpress_27338/?tag=varius' class='tag-link-24' title='1 topic' style='font-size: 8pt;'>varius</a></div>



    </div>

    </div>-->





                            </div>