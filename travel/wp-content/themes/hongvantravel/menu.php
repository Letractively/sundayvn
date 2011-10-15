<div class="main-menu">

    <div class="corner-left"><div class="corner-right">

            <div class="menu">
                <ul>
                    <li class="page_item page-item-2 current_page_parent"><a href="<?php bloginfo('url'); ?>" title="Home"><span><span>Home</span></span></a></li>
                    <li class="page_item page-item-22"><a href="#" title="Hotels"><span><span class="has_sub">Destinations</span></span></a>                                    <div class="menu_sub" >
                            <p><a href="#">Vietnam</a></p>
                            <p><a href="#">Cambodia</a></p>
                            <p><a href="#">Laos</a></p>
                        </div>

                    </li>

                    <?php 
                        $page_id = 124;
                        get_page($intPage_id);
                    ?>

                    <li class="page_item page-item-22"><a href="<?php the_permalink(); ?>" title="Hotels"><span><span>About Us</span></span></a></li>



                    <li class="page_item page-item-28"><a href="#" title="Ideas"><span><span>Hot Deals</span></span></a></li>

                    <li class="page_item page-item-33"><a href="#" title="Contacts"><span><span>Gallery</span></span></a></li>

                    <?php 
                        $page_id = 127;
                        get_page($intPage_id);
                    ?>

                    <li class="page_item page-item-24"><a href="<?php the_permalink(); ?>" title="Flights"><span><span>Contact Us</span></span></a></li>

                </ul>


            </div>


        </div></div>

                        </div>