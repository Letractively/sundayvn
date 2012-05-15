<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" >
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width" />
        <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
        <title><?php
                /*
                * Print the <title> tag based on what is being viewed.
                */
                global $page, $paged;

                wp_title( '|', true, 'right' );

                // Add the blog name.
                bloginfo( 'name' );

                // Add the blog description for the home/front page.
                $site_description = get_bloginfo( 'description', 'display' );
                if ( $site_description && ( is_home() || is_front_page() ) )
                    echo " | $site_description";

                // Add a page number if necessary:
                if ( $paged >= 2 || $page >= 2 )
                    echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

        ?></title>
    </head>
    <body>
        <div id="TopLink">
            <div class="main clearfix">
                <a href="#">Trang chủ</a>&nbsp;|&nbsp;<a href="#">Liên hệ</a>
                </ul>
            </div>
        </div>
        <div id="ContentWrapp">
            <div id="TopBanner">
                <div class="main clearfix">
                    <h1><a href="#"><img src="images/logoBabylon.gif" /></a></h1>
                </div>
            </div>
            <div id="MainMenu">
                <div class="main clearfix">
                    <ul>
                        <li><a href="#">Trang chủ</a></li>
                        <li>|</li>
                        <li><a href="#">Giới thiệu</a></li>
                        <li>|</li>
                        <li><a href="#">Sản phẩm</a></li>
                        <li>|</li>
                        <li><a href="#">Tải báo giá</a></li>
                        <li>|</li>
                        <li><a href="#">Kiến thức</a></li>
                        <li>|</li>
                        <li><a href="#">Hỏi đáp</a></li>
                        <li>|</li>
                        <li><a href="#">Tin tức</a></li>
                    </ul>
                    <div id="Search">
                    <form action=""><input onclick="this.value=''" type="text" value="Search..." class="textArea" /><label for="mainSearch">&nbsp;</label><input id="mainSearch" type="submit" />
                        </form>
                    </div>
                </div>
            </div>
            <div id="Content">
                <div class="main clearfix">
                    <div id="ContentTop">&nbsp;</div>
                    <div id="ContentBody">
                        <div id="ContentBodyInnerT">&nbsp;</div>
                        <div id="ContentBodyInnerB">&nbsp;</div>
                        
                    </div>
                </div>
            </div>
            <div id="Copyright">
                <div class="main clearfix">
                    <div class="customize">
                Bản quyền thuộc Babylon.vn &copy;. Liên hệ với chúng tôi - Hotline: 1900 6655
                    </div>
                </div>
            </div>
            <div id="TagsCloud">
                <div class="main clearfix">
                    <ul class="clearfix">
                        <li><a href="#">May lanh</a></li>
                        <li>|</li>
                        <li><a href="#">May lanh</a></li>
                        <li>|</li>
                        <li><a href="#">May lanh</a></li>
                        <li>|</li>
                        <li><a href="#">May lanh</a></li>
                        <li>|</li>
                    </ul>
                </div>
            </div>
        </div>
        <?php
            //get_template_part( 'loop', 'index' );
        ?>
    </body>
</html>