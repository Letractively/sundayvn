<?php
    get_template_part( 'header' );

    if(get_query_var('page'))
    {$paged= get_query_var('page');}
    else
    {$paged = get_query_var('paged');}
    if (empty($paged))
    {
        $paged = 1;
    }
    $cat_id = get_query_var('cat');
   
?>
<h1>Tag: <?php single_tag_title(); ?></h1>
<?php
        $i=1;
        
        while ( $wp_query->have_posts() ) : $wp_query->the_post();     
        $id= get_the_ID();                  

        ?>
           <div class="clearfix postlistitem">
                <p class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                <p class="post-content"><?php echo gioihankitu(get_the_excerpt(),200); ?></p>
           </div>        
        <?php
            $i++;
        ?>

        <?php endwhile; ?>

<?php
get_template_part( 'rightcol' );
get_template_part( 'footer' );
