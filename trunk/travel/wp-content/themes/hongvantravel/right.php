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
                <?php
                    $skype = preg_split('/\,/',get_custom('skype'));
                    if(is_array($skype)){
                        foreach($skype as $k){
                            echo "<b>Skype:</b> <a href='skype:$k?chat'>$k</a><br />";    
                        }
                    }
                ?>
                <?php
                    $yahoo = preg_split('/\,/',get_custom('yahoo'));
                    if(is_array($yahoo)){
                        foreach($yahoo as $y){
                            echo "<b>Yahoo:</b> <a href='ymsgr:sendIM?$y'>$y</a><br />";    
                        }
                    }
                ?>
                <?php
                    $hotline = preg_split('/\,/',get_custom('hotline'));
                    if(is_array($hotline)){
                        foreach($hotline as $h){
                            echo "<b>Hotline:</b> $h<br />";    
                        }
                    }
                ?>
            </div>

        </div>

    </div>

    <?php
        get_template_part('news-mod');
    ?>
    <div class="textwidget">
    <?php
        $intpage_id = 179;
            $page = get_page($intpage_id);
     
    ?>
        <h3 class="alonelabel"><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></h3>
        <?php
            $intpage_id = 171;
            $page = get_page($intpage_id);
        ?>
        <?php
            echo $page->post_content;
        ?>
         <?php
        $intpage_id = 183;
            $page = get_page($intpage_id);
     
    ?>
 
        <h3 class="alonelabel"><a href="<?php echo get_permalink($page->ID); ?>"><?php echo $page->post_title; ?></a></h3>
      
       <?php
            $intpage_id = 175;
            $page = get_page($intpage_id);
        ?>
        <?php
            echo $page->post_content;
        ?>   

    </div>
    <p align="center">  
        <object

            classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"

            codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0"

            id="Movie2"

            width="155" height="250"

            >

            <param name="movie" value="Movie2.swf">

            <param name="bgcolor" value="#FFFFFF">

            <param name="quality" value="high">

            <param name="allowscriptaccess" value="samedomain">

            <embed

                type="application/x-shockwave-flash"

                pluginspage="http://www.adobe.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash"

                name="Movie2"

                width="155" height="250"

                src="Movie2.swf"

                bgcolor="#FFFFFF"

                quality="high"

                allowscriptaccess="samedomain"

                >

                <noembed>

                </noembed>

            </embed>

        </object>
    </p>
</div>