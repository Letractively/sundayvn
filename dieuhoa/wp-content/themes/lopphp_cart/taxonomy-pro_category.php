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
    $wp_query->query('post_type=acme_product&paged='.$paged.'&posts_per_page=3&pro_category=may-cham-cong-the');
?>
<div id="TwoColProduct" class="clearfix">
    <?php
        $cat_name = get_query_var('pro_category');
        $cat_data = get_term_by('slug',$cat_name,'pro_category');
    ?>
    <div class="modTitleBar">
        <div class="modTitleBarInner">
            <div class="modTitleBarInner1"><a href="<?php echo get_term_link($cat_data->slug, 'pro_category') ?>"><?php echo $cat_data->name; ?></a></div>
        </div>
    </div>
    <?php
        $i=1;

        while ( $wp_query->have_posts() ) : $wp_query->the_post();     
            $id= get_the_ID();                        $fvvv = $wpdb->get_row( 
            "
            SELECT meta_key,meta_value
            FROM  $wpdb->postmeta 
            where
            meta_key = '_wp_attached_file' and
            post_id = (select meta_value from $wpdb->postmeta where $wpdb->postmeta.`post_id` ={$id} and $wpdb->postmeta.`meta_key` = '_thumbnail_id' );

            "
            );
            //get others
            $attrs = $wpdb->get_results( 
            "
            SELECT meta_key,meta_value
            FROM  $wpdb->postmeta 
            where
            meta_key in ('_product_vat',
            '_product_price',
            '_product_features',
            '_product_introtxt'
            ) and
            post_id = {$id}

            "
            );
            $product_price;$product_vat;$product_introtxt;$product_features;
            foreach ($attrs as $attrV)
            {
                switch ($attrV->meta_key)
                {
                    case '_product_price':
                        $product_price = $attrV->meta_value;
                        break;
                    case '_product_vat':
                        $product_vat = $attrV->meta_value;
                        break; 
                    case '_product_introtxt':
                        $product_introtxt = $attrV->meta_value;
                        break;
                    case '_product_features':
                        $product_features = unserialize(unserialize( $attrV->meta_value ));
                        break;
                }
            }

        ?>
        <div class="ProItem <?php if($i%2==0)echo 'NoMarginR' ?>">
            <div class="ProItemTitle"><a href="<?php echo get_permalink($id); ?>"><?php the_title(); ?></a></div>
            <div class="ProItemBody clearfix">
                <p class="Intro"><?php if ($product_introtxt)echo  $product_introtxt; else echo '&nbsp;'; ?></p>
                <div class="ImageInfo">
                    <?php if (!empty($fvvv->meta_value)){?><p class="imageContain"><img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/<?php echo $fvvv->meta_value; ?>" /></p>
                        <?php } ?>
                    <p class="price">Giá: <b><?php echo $product_price; ?></b><br /><?php if ($product_vat =='yes') echo '(Đã bao gồm VAT)'; else echo '(Chưa bao gồm VAT)'; ?></p>
                </div>
                <ul class="FeatureInfo">
                    <li>Tính năng: <?php
                        echo $product_features['function']; ?></li>
                    <li>Model: <?php echo $product_features['model']; ?></li>
                    <li>Công suất: <?php echo $product_features['power']; ?></li>
                </ul>
            </div>
        </div>
        <?php
            $i++;
        ?>

        <?php endwhile; ?>
</div>

<?php
$wp_query->query('post_type=acme_product&paged='.$paged.'&pro_category=may-cham-cong-the');

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
