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
    $wp_query->query('paged='.$paged.'&posts_per_page=3&cat='.$cat_id);
?>

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
$wp_query->query('post_type=post&cat='.$cat_id);

$paging = new Paging($wp_query->post_count,3,$paged);//Fill the number of result, item on one page, current page


$afters = $paging->getAfter();
$befores = $paging->getBefore();
$current = $paging->getCurrent();
$final = $paging->getFinalPage();
echo '<p class="paging"> ';
$link = get_pagenum_link(0);
echo "<a href='{$link}'>Đầu tiên</a>";
foreach ($befores as $before)
{
    $link = get_pagenum_link($before);
    echo "<a href='{$link}'>{$before}</a>";
}
$link = get_pagenum_link($current);
echo "<a class='active' href='{$link}'>{$current}</a>";
foreach ($afters as $after)
{
    $link = get_pagenum_link($after);
    echo "<a href='{$link}'>{$after}</a>";
}
$link = get_pagenum_link($final);
echo "<a href='{$link}'>Cuối</a>";

echo '</p>';
get_template_part( 'rightcol' );
get_template_part( 'footer' );
