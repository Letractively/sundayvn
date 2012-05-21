<?php
    get_template_part( 'header' );
    $id = get_the_ID();
    $fvvv = $wpdb->get_row( 
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
<div id="single-product-div" class="clearfix">
    <h2><?php the_title(); ?></h2>
    <div class="ProItem no-float auto-width <?php if($i%2==0)echo 'NoMarginR' ?> " >

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

            <div class="clear">&nbsp;</div>
            <p class="product-full-text">
                <?php
                    $product = get_post($id);
                    echo $product->post_content;
                ?>
            </p>
            <p><b>Sản phẩm khác</b></p>
            <ul class="older-items">
                <?php
                    $older_posts = $wpdb->get_results("select id,post_title,post_type  from $wpdb->posts where `post_type`='acme_product' and `ID`<={$id} and `post_status`='publish' limit 0,5");
                
                    foreach ($older_posts as $op)
                    {
                    ?>
                    <li><a href="<?php echo get_permalink($op->ID);?>"><?php echo $op->post_title ?></a></li>
                    <?php
                    }
                ?>
            </ul>
        </div>


    </div>
</div>
<?php
get_template_part( 'rightcol' );
get_template_part( 'footer' );
