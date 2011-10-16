
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US">



    <head profile="http://gmpg.org/xfn/11">

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



        <title><?php
                global $page, $paged;

                wp_title( '|', true, 'right' );

                // Add the blog name.
                bloginfo( 'name' );

                // Add the blog description for the home/front page.
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description && ( is_home() || is_front_page() ) )
                    echo " | $site_description";
        ?></title>
        <?php
            /* Always have wp_head() just before the closing </head>
            * tag of your theme, or you will break many plugins, which
            * generally use this hook to add elements to <head> such
            * as styles, scripts, and meta tags.
            */
            wp_head();
        ?>
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/themes/default/default.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/themes/pascal/pascal.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/themes/orman/orman.css" type="text/css" media="screen" />
        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/nivo-slider.css" type="text/css" media="screen" />


        <link rel="stylesheet" href="<?php bloginfo('template_url') ?>/css/style.css" type="text/css" media="screen" />



        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/scripts/jquery-1.6.1.min.js"></script>

        <script type="text/javascript" src="<?php bloginfo('template_url') ?>/scripts/jquery.nivo.slider.pack.js"></script>
        <script type="text/javascript">
            $(window).load(function() {
                $('#slider').nivoSlider();
            });
            $(document).ready(function(){
                $('.main-menu .page_item').mouseover(function(){
                    $(this).find('.menu_sub').show();
                });
                $('.main-menu .page_item').mouseout(function(){
                    $(this).find('.menu_sub').hide();
                });
                $('.main-menu .page_item .menu_sub').mouseover(function(){
                    $(this).show();
                });
            });
        </script>

        <script language="javascript">AC_FL_RunContent = 0;</script>

        <script src="<?php bloginfo('template_url') ?>/AC_RunActiveContent.js" language="javascript"></script>








    </head><body>





        <div class="tail-right"></div>

        <div class="main">



            <div class="main-width">



                <div class="main-bgr">



                    <div class="header">



                        <?php
                            get_template_part('logo');
                        ?>
                        <div class="search">

                            <div class="indent">
                                <div class="emailandcontact" align="right">

                                    <b>email:</b> <a href="mailto:vphat28@gmail.com">vphat28@gmail.com</a><br />
                                    <b>contact no:</b> 0908501056<br />


                                </div>
                                <form method="get" id="searchform" action="http://osc.template-help.com/wordpress_27338">

                                    <input type="text" class="text" value="" name="s" id="s" /><input class="but" type="image" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/search.gif" value="submit" />

                                </form>

                            </div>

                        </div>

                        <!--<object
                        classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"
                        codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=8,0,0,0"
                        >
                        <param name="wmode" value="transparent">
                        <param name="movie" value="swf/map.swf" />
                        <param name="quality" value="high" />

                        <embed src="swf/map.swf" quality="high" 
                        type="application/x-shockwave-flash"
                        pluginspage="http://www.macromedia.com/go/getflashplayer">
                        </embed>
                        </object>-->
                        <script language="javascript">

                            if (AC_FL_RunContent == 0) {

                                alert("This page requires AC_RunActiveContent.js.");

                            } else {

                                AC_FL_RunContent(

                                'codebase', 'http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0',

                                'width', '100',

                                'height', '210',

                                'src', 'Untitled-1',

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

                            <object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="100" height="210" id="Untitled-1" align="middle">

                                <param name="allowScriptAccess" value="sameDomain" />

                                <param name="allowFullScreen" value="false" />

                                <param name="movie" value="Untitled-1.swf" /><param name="quality" value="high" /><param name="wmode" value="transparent" /><param name="bgcolor" value="#ffffff" />    <embed src="Untitled-1.swf" quality="high" wmode="transparent" bgcolor="#ffffff" width="100" height="210" name="Untitled-1" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />

                            </object>

                        </noscript>



                        <?php
                            get_template_part('menu');
                        ?>




                    </div>


                    <div class="content">

                        <div id="slideshow">
                            <div class="slider-wrapper theme-default">
                                <div class="ribbon"></div>
                                <div id="slider" class="nivoSlider">
                                    <img src="images/congty1.jpg" alt="Halong Bay Boat" width="860px" height="300px" />
                                    <a href="images/anhcqHaLongBay_VietNam_02000.jpg"><img width="860px" height="300px" src="images/congty3.jpg" alt="" title="ThisThe area immediately northeast of Halong Bay is known as Bai Tu Long Bay" /></a>
                                    <img src="images/OPJIQYX91_344097-Phuket-Travel.jpg" alt="" width="860px" height="300px" />
                                    <img width="860px" height="300px" src="images/Vinpearl-Resort-Nha-Trang1.jpg" alt="" title="#htmlcaption" />
                                </div>
                                <div id="htmlcaption" class="nivo-html-caption">
                                    Are you interested in adventure trekking? If you are, this tour is a big challenge for you
                                </div>
                            </div>
                        </div>
                        <div class="content-bgr">



                            <div class="column-left">





                                <!-- Author information is disabled per default. Uncomment and fill in your details if you want to use it.

                                <li><h2>Author</h2>

                                <p>A little something about you, the author. Nothing lengthy, just an overview.</p>

                                </li>

                                -->



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

                                                        <h2><a href="#">Travelers Reviews</a></h2>

                                                    </div></div>

                                            </div>

                                            <ul>

                                                <li><a href='#' title='January 2010'>To you, your country and the team a big thank you from the Preston Family!</a><b>John Terry</b></li>
                                                <li><a href='#' title='October 2009'>Just to let you know that we had a great trip. We liked most of the hotels and the guides. The guide in Hanoi was ...</a><b>John Terry</b></li>
                                                <li><a href='#' title='January 2010'>To you, your country and the team a big thank you from the Preston Family!</a><b>Paul Garner</b></li>
                                                <li><a href='#' title='October 2009'>Just to let you know that we had a great trip. We liked most of the hotels and the guides. The guide in Hanoi was ...</a><b>Obi Mikel</b></li>                                                <li><a href='#' title='January 2010'>To you, your country and the team a big thank you from the Preston Family!</a><b>John Terry</b></li>
                                                <li><a href='#' title='October 2009'>Just to let you know that we had a great trip. We liked most of the hotels and the guides. The guide in Hanoi was ...</a><b>John Terry</b></li>
                                            </ul>

                                        </div></div>

                                </div>



                                <div class="widget widget_links linkcat" id="linkcat-2 blogroll"><div class="widget-bgr">

                                        <div class="title"><div><div><h2>				

                                                        Tours		</h2></div></div></div>					


                                        <ul class='xoxo blogroll'>
                                            <li><a href="#">Vietnam Tours</a></li>
                                            <li><a href="#">Vietnam Hotels</a></li>
                                            <li><a href="#">Cambodia Tours</a></li>
                                            <li><a href="#">Cambodia Hotels</a></li>
                                            <li><a href="#">Laos Tours</a></li>
                                            <li><a href="#">Laos Hotels</a></li>
                                            <li><a href="#">Indochina Tours</a></li>
                                            <li><a href="#">Indochina Tours</a></li>
                                        </ul>
                                    </div></div>






                                <div class="widget widget_meta">

                                    <div class="widget-bgr">

                                        <div class="title">

                                            <div><div>

                                                    <h2><a href="#">Useful information</a></h2>

                                                </div></div>

                                        </div>



                                        <ul>

                                            <li><b>Vietnam Guides</b>
                                                <a href="#">Climate</a>                                            <a href="#">Climate</a>
                                                <a href="#">Climate</a>

                                            </li>

                                            <li><b>In Vietnam</b>
                                                <a href="#" title="This page The World Wide Web Consortium (W3C)">Vietnam Currency</a>
                                                <a href="#" title="This page The World Wide Web Consortium (W3C)">Government Agencies</a>

                                            </li>   

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

                            <div class="center">

                                <div class="welcome">

                                    <div class="title">

                                        <a href="#">view all</a><h2>Popular Destinations</h2>

                                    </div>



                                    <div class="welcome-block">

                                        <div class="block">

                                            <p><a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img1.jpg" /></a></p>

                                            <p><a href="#">Ha Long Bay</a></p>


                                        </div>

                                        <div class="block">

                                            <p><a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img2.jpg" /></a></p>

                                            <p><a href="#">Co Do Hue</a></p>


                                        </div>

                                        <div class="block">

                                            <p><a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img3.jpg" /></a></p>

                                            <p><a href="#">Cang Nha Rong</a></p>



                                        </div>

                                        <div class="block right">

                                            <p><a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img4.jpg" /></a></p>

                                            <p><a href="#">Dia Dao Cu Chi</a></p>


                                        </div>

                                    </div>



                                </div>


                                <div class="column-right">



                                    <div class="widget widget-livesupport">

                                        <div class="widget-bgr">



                                            <div class="title">



                                                <div><div>

                                                        <h2>

                                                            Live Support

                                                        </h2>

                                                    </div></div>

                                            </div>

                                            <div class="widget-content">
                                                <b>Skype:</b> <a href="ymsgr:sendIM?ballackvn2000">game24h</a><br />
                                                <b>Yahoo:</b> <a href="skype:vphat28?chat">game24h</a><br />
                                                <b>Hotline:</b> 09085405624
                                            </div>

                                        </div>

                                    </div>

                                    <div class="widget widget_photos">

                                        <div class="widget-bgr">



                                            <div class="title">



                                                <div><div>

                                                        <h2>

                                                            New Photos

                                                        </h2>

                                                    </div></div>

                                            </div>



                                            <p class="posted_photes">Monday, September 22, 2009<br />

                                                @ 5:24 PM<br />

                                                posted by Admin</p>



                                            <div class="photos">

                                                <a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img5.jpg" /></a>

                                                <div class="about">

                                                    <a class="where" href="#">Caribbean, Curacao</a>

                                                    by <a class="author_photos" href="#">Jones</a>

                                                </div>

                                            </div>



                                            <div class="photos">

                                                <a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img6.jpg" /></a>

                                                <div class="about">

                                                    <a class="where" href="#">Puerta Plata</a>

                                                    by <a class="author_photos" href="#">Kerry Lescott</a>

                                                </div>

                                            </div>



                                            <div class="photos">

                                                <a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img7.jpg" /></a>

                                                <div class="about">

                                                    <a class="where" href="#">I Love Sorrento!</a>

                                                    by <a class="author_photos" href="#">Kim</a>

                                                </div>

                                            </div>



                                            <div class="photos">

                                                <a href="#"><img alt="" src="http://osc.template-help.com/wordpress_27338/wp-content/themes/theme998/images/1page-img8.jpg" /></a>

                                                <div class="about">

                                                    <a class="where" href="#">Tropical Paradise</a>

                                                    by <a class="author_photos" href="#">Simao</a>

                                                </div>

                                            </div>



                                            <a class="more" href="#">More Photos &gt;&gt;</a>



                                        </div>

                                    </div>






                                </div>



                                <div class="column-center">
                                    <?php
                                        get_template_part('content');
                                    ?>

                                </div>



                            </div>	



                        </div></div>



                </div>



            </div>

            <div class="footer">

                <div class="width">



                    <div class="corner-left"><div class="corner-right">



                            <div class="indent">

                                <p align="center">

                                    <a href="#">Home</a> | <a href="#">Payment</a> | <a href="#">Deposit</a> | <a href="#">Travel Terms</a> | <a href="#">Privacy</a>
                                </p>

                            </div>



                        </div></div>



                </div>

            </div>
            <!--Sed massa enim, sodales id commodo eget, ornare ac magna. Cras velit velit, rhoncus non viverra sit amet, laoreet et risus. Aenean ac metus metus. Duis sem neque, lacinia id porttitor nec, rutrum sit amet lectus. Cras porttitor mattis est, eget aliquet tortor malesuada quis. Vestibulum sed nunc a risus venenatis commodo. Aliquam feugiat luctus orci vitae varius. Donec orci lectus, sollicitudin sit amet sagittis nec, porttitor eget urna. Mauris fe-->
            <div id="bottom-contact" class="clearfix">
                <div class="headquarter">
                    <h3>HANOI - VIETNAM</h3>
                    Suite 707, Thang Long Bld<br />
                    115 Le Duan St, Hoan Kiem Dist, Hanoi<br />
                    T.(844) 39429444 - F.(844)39429442

                </div>  
                <div class="headquarter">
                    <h3>HCM CITY - VIETNAM</h3>
                    4th floor, Sovilaco Bld, 1 Pho Quang St,<br />
                    Tan Binh Dist, HCMC<br />
                    T.(848)39972255 - F.(848)39972256
                </div>
                <div class="headquarter">
                    <h3>SIEM REAP - CAMBODIA</h3>
                    D24 Oum Khun Street,<br />
                    Khum Svay Dankum, Siem Reap<br />
                    T.(855) 6396 7008 - F.(855) 6396 7009 
                </div>
                <div class="headquarter last">
                    <h3>YANGON - MYANMAR</h3>
                    Suite 1216, Sakura Tower<br />
                    339 Bogyoke Aung San Road, Yangon<br />
                    T: (95) 973 121 788 - (95)1 255 097
                </div>  
                <div class="clear">&nbsp;</div>
                <div id="copyright">
                    <p><b>U.S.A Office: 11445 E. Via Linda Ste 2 #207, Scottsdale AZ 85259, USA. </b></p>
                    <p><b>International Tour Operator <a href="#">Licence No: 0919/TCDL.</a></b></p>
                    <p class="all-right-re">All contents and photography © 2006 - 2011 Vietnam Today Travel.</p>
                </div>     
            </div>

        </div>





    </body></html>