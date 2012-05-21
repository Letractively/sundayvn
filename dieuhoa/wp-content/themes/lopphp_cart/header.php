<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"  
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" >
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
    <script type="text/javascript" src='<?php bloginfo('template_directory') ?>/js/jquery.min.js'></script>
    <script type="text/javascript" src='<?php bloginfo('template_directory') ?>/js/main.js'></script>
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
    <?php
        $menudata = getAMenuData('top-menu');
    ?>
    <div class="main clearfix">
        <?php 
            $i = 1;
            $count = count($menudata);  
            foreach ($menudata as $mn )
            {
            ?>
            <a href="<?php echo $mn->url; ?>"><?php echo $mn->title; ?></a>
            <?php
                if ( $i != $count)
                    echo '&nbsp;|&nbsp;';
            ?>

            <?php
                $i++;
            }
        ?>
        </ul>
    </div>
</div>
<div id="ContentWrapp">
<div id="TopBanner">
    <div class="main clearfix">
        <h1><a href="#"><img src="<?php bloginfo('template_directory') ?>/images/logoBabylon.gif" /></a></h1>
    </div>
</div>
<div id="MainMenu">
    <div class="main clearfix">
        <ul>
            <?php

                $menudata = getAMenuData('header-menu');

                $ccurl = curPageURL();
                //   wp_nav_menu(array('theme-location' =>$menu_slug ));
                $countmenudata = count($menudata);
                $i = 1;
                foreach ($menudata  as $stdMenu)
                {
                    //var_dump( stripos($stdMenu->url,$ccurl) );
                ?>
                <li>          
                    <div class="BorderBox Menuhover <?php if ($stdMenu->url!=$ccurl  ){ ?>Menunormal<?php } ?>">
                        <div class="BorderBoxInner">
                            <div class="BorderBoxInner1"><a href="<?php echo $stdMenu->url ?>"><?php  if ($stdMenu->post_title)echo $stdMenu->post_title; else echo $stdMenu->title; ?></a></div>
                        </div>
                    </div> 
                </li>
                <?php
                    if($i != $countmenudata)
                    {
                    ?>
                    <li>|</li>

                    <?php
                    }
                    $i++;
                }
            ?>
        </ul>
        <div id="Search">

            <form role="search" method="get" id="searchform" action=""><input onclick="this.value=''" type="text" value="Search..." class="textArea" name="s" id="s" /><label for="mainSearch">&nbsp;</label><input id="mainSearch" type="submit" type="submit" id="searchsubmit"  />
            </form>
        </div>
    </div>
</div>
<div id="Content">
<div class="main clearfix">
<div id="ContentTop">&nbsp;</div>
<div id="ContentBody" class="clearfix">
<div id="ContentLeft" class="left">
<div class="BorderBox">
    <div class="BorderBoxInner">
        <div class="BorderBoxInner1">&nbsp;</div>
    </div>
</div>
<div id="ContentBodyInnerB">
<?php
    global $wpdb;
    $fivesdrafts = $wpdb->get_results( 
    "
    SELECT ID, post_title,meta_key,meta_value
    FROM  $wpdb->postmeta left join $wpdb->posts
    on $wpdb->posts.`ID` =   $wpdb->postmeta.`post_id` 
    where
    $wpdb->postmeta.`meta_key` in ('_product_hot')  
    and $wpdb->postmeta.`meta_value` = 'yes' 
    group by $wpdb->postmeta.`post_id`
    "
    );
    foreach ( $fivesdrafts as $fivesdraft ) 
    {
        $fvvv = $wpdb->get_results( 
        "
        SELECT meta_key,meta_value
        FROM  $wpdb->postmeta 
        where
        meta_key = '_wp_attached_file' and
        post_id = (select meta_value from $wpdb->postmeta where $wpdb->postmeta.`post_id` ={$fivesdraft->ID} and $wpdb->postmeta.`meta_key` = '_thumbnail_id' );

        "
        );

    }
?>
<?php
    if(is_home())
    {
    ?>
    <div id="IntroArticle">
        <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
            <?php endif; ?>

    </div>
    <div class="modTitleBar">
        <div class="modTitleBarInner">
            <div class="modTitleBarInner1"><a href="#">Sản phẩm hot</a></div>
        </div>
    </div>
    <?php
    }
?>