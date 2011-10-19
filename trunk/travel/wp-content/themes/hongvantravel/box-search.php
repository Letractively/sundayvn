<div class="search">

    <div class="indent">
   <!-- <span style="font-size: 2.0em;">Slogan will be here</span>-->
        <div class="emailandcontact" align="right">

            <b>email:</b> <a href="mailto:<?php echo get_custom('email'); ?>"><?php echo get_custom('email'); ?></a><br />
            <b>contact no:</b> <?php echo get_custom('phone'); ?><br />


        </div>
        <form method="get" id="searchform" action="">

            <input type="text" class="text" value="<?php the_search_query(); ?>" name="s" id="s" /> <input class="but" type="image" src="<?php echo bloginfo('template_url'); ?>/images/search.gif" value="submit" />

        </form>

    </div>

                        </div>