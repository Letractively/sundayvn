<?php
     $date = new DateTime($post->post_date);
?>
<div class="post hentry" id="post-<?php echo $post->ID; ?>">
        <div class="indent">

            <div class="title">

                <h2>
                <a href="<?php echo get_permalink($post->ID); ?>" rel="bookmark" title="<?php echo $post->post_title; ?>"><?php echo $post->post_title; ?></a>&nbsp;<i><?php echo get_post_meta($post->ID, 'time_tour',true); ?></i>
                </h2>
                
                <div class="date">

                    <?php echo $date->format('F'); ?>, <?php echo intToDayName($date->format('w')); ?> <?php echo $date->format('d') ?>, <?php echo $date->format('Y') ?> @ <span><?php echo $date->format('H:i A'); ?></span>
                </div>

            </div>

            <div class="text-box">

                <p><?php echo gioihankitu($post->post_content,150); ?>&nbsp;<a href="<?php echo get_permalink($post->ID); ?>" class="more-link">more</a></p>
            </div>
            <div class="link-edit"></div>    
        </div>
    </div>