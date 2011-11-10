<div class="main-menu">

    <div class="corner-left"><div class="corner-right">

            <div class="menu">
                <ul>
                    <li class="page_item page-item-2 current_page_parent"><a href="<?php bloginfo('url'); ?>" title="Home"><span><span>Home</span></span></a></li>
                    <li class="page_item page-item-22"><a href="#" title="Destinations"><span><span class="has_sub">Destinations</span></span></a>                                    <div class="menu_sub" >
                            <?php
                                $terms = get_terms('tourcategory');

                                foreach ($terms as $term) 
                                {

                                ?>
                                <p><a class="menu_root" menuid='<?php echo $term->term_id; ?>'  href="<?php echo get_term_link($term->slug, 'tourcategory'); ?>"><?php echo $term->name; ?></a></p>
                                <?php
                                }
                            ?>
                            <!--                            <div class="subtwo" id="menu_sub_1" >
                            <p><a href="#">Thai</a></p>
                            <p><a href="#">Thai</a></p>
                            <p><a href="#">Thai</a></p>

                            </div>
                            <div class="subtwo" id="menu_sub_2" >
                            <p><a href="#">Cam</a></p>
                            <p><a href="#">Cam</a></p>
                            <p><a href="#">Cam</a></p>

                            </div>
                            <div class="subtwo" id="menu_sub_3" >
                            <p><a href="#">Lao</a></p>
                            <p><a href="#">Lao</a></p>
                            <p><a href="#">Lao</a></p>

                            </div>-->
                            <!--                            <p><a href="#">Vietnam</a></p>
                            <p><a href="#">Cambodia</a></p>
                            <p><a href="#">Laos</a></p>-->
                        </div>
                        <?php

                            foreach ($terms as $term) 
                            {
                                $subterms = get_terms('tourcategory',  array(
                                'parent'    => (int)$term->term_id,
                                'hide_empty'=> false,
                                ));

                                if (count($subterms) > 0)
                                {
                                ?>
                                <div class="subtwo" id="menu_sub_<?php echo $term->term_id; ?>" >
                                    <?php 
                                        foreach ($subterms as $st)
                                        {
                                        ?>
                                        <p><a href="<?php echo get_term_link($st->slug, 'tourcategory'); ?>"><?php echo $term->name; ?></a></p>

                                        <?php
                                        }
                                    ?>
                                </div>
                                <?php

                                }
                            }
                        ?>
                    </li>

                    <?php 
                        $page_id = 122;
                        $page = get_page($page_id);
                    ?>

                    <li class="page_item page-item-22"><a href="<?php echo get_permalink( $page->ID ); ?>" title="<?php echo $page->post_title;  ?>"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                    <?php 
                        $page_id = 132;
                        $page = get_page($page_id);
                    ?>


                    <li class="page_item page-item-28"><a href="<?php echo get_permalink( $page->ID ); ?>" title="<?php echo $page->post_title;  ?>"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                    <?php 
                        $page_id = 214 ;
                        $page = get_page($page_id);
                    ?>


                    <li class="page_item page-item-28"><a href="<?php echo get_permalink( $page->ID ); ?>" title="<?php echo $page->post_title;  ?>"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                    <?php 
                        $page_id = 127;
                        $page = get_page($page_id);

                        //$mylinks_categories = get_terms('tourcategory', 'orderby=count&hide_empty=0');
                        //$a =the_terms(7,'tourcategory');
                        //echo "<pre>";
                        //print_r($a);
                        //echo "</pre>";

                    ?>

                    <li class="page_item page-item-24"><a href="<?php echo get_permalink( $page->ID ); ?>" title="<?php echo $page->post_title;  ?>"><span><span><?php echo $page->post_title;  ?></span></span></a></li>

                </ul>


            </div>


        </div></div>

                        </div>