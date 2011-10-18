  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />


  <base href="<?php bloginfo('url'); ?>/" />
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




