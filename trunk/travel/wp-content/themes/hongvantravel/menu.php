<div class="main-menu">

    <div class="corner-left"><div class="corner-right">

            <div class="menu">
                <ul>
                    <li class="page_item page-item-2 current_page_parent"><a href="<?php bloginfo('url'); ?>" title="Home"><span><span>Home</span></span></a></li>
                    <li class="page_item page-item-22"><a href="#" title="Hotels"><span><span class="has_sub">Destinations</span></span></a>                                    <div class="menu_sub" >
                            <?php
                                $terms = get_terms('tourcategory');

                                foreach ($terms as $term) 
                                {
                                ?>
                                <p><a href="<?php echo get_term_link($term->slug, 'tourcategory'); ?>"><?php echo $term->name; ?></a></p>
                                <?php
                                }
                            ?>

<!--                            <p><a href="#">Vietnam</a></p>
                            <p><a href="#">Cambodia</a></p>
                            <p><a href="#">Laos</a></p>-->
                        </div>

                    </li>

                    <?php 
                        $page_id = 122;
                        $page = get_page($page_id);
                    ?>

                    <li class="page_item page-item-22"><a href="<?php echo get_permalink( $page->ID ); ?>" title="Hotels"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                    <?php 
                        $page_id = 132;
                        $page = get_page($page_id);
                    ?>


                    <li class="page_item page-item-28"><a href="<?php echo get_permalink( $page->ID ); ?>" title="Ideas"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                    <li class="page_item page-item-33"><a href="#" title="Contacts"><span><span>Gallery</span></span></a></li>

                    <?php 
                        $page_id = 127;
                        $page = get_page($page_id);

                        //$mylinks_categories = get_terms('tourcategory', 'orderby=count&hide_empty=0');
                        //$a =the_terms(7,'tourcategory');
                        //echo "<pre>";
                        //print_r($a);
                        //echo "</pre>";

                    ?>

                    <li class="page_item page-item-24"><a href="<?php echo get_permalink( $page->ID ); ?>" title="Flights"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                </ul>


            </div>


        </div></div>

                        </div>