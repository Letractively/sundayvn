<div class="post hentry" id="post-<?php the_ID(); ?>">
    <div class="indent">
        <div class="title">
            <h2><a href="<?php the_permalink(); ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>&nbsp;<i><?php echo get_post_meta($post->ID, 'time_tour',true); ?></i></h2>
            <div class="date">
                <?php echo get_the_date('l, F j, Y @ h:i A'); ?><br>
            </div>
        </div>
        <div class="text-box">
            <?php 
                the_excerpt(); 
            ?>
        </div>
        <div class="link-edit"></div>    
    </div>
</div>