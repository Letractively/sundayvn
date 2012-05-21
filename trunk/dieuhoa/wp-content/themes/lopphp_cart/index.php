<?php
    get_template_part( 'header' );

?>
    <div id="TwoColProduct" class="clearfix">

        <?php
            global $wpdb;
            $hotproducts = $wpdb->get_results( 
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
            $i =1;
            foreach ( $hotproducts as $hotproduct ) 
            {
                // echo $fivesdraft->ID;
                $fvvv = $wpdb->get_row( 
                "
                SELECT meta_key,meta_value
                FROM  $wpdb->postmeta 
                where
                meta_key = '_wp_attached_file' and
                post_id = (select meta_value from $wpdb->postmeta where $wpdb->postmeta.`post_id` ={$hotproduct->ID} and $wpdb->postmeta.`meta_key` = '_thumbnail_id' );

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
                post_id = {$hotproduct->ID}

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
                <div class="ProItemTitle"><a href="<?php echo get_permalink($hotproduct->ID); ?>"><?php echo $hotproduct->post_title ?></a></div>
                <div class="ProItemBody clearfix">
                    <p class="Intro"><?php if ($product_introtxt)echo  $product_introtxt; else echo '&nbsp;'; ?></p>
                    <div class="ImageInfo">
                        <p class="imageContain"><img src="<?php echo get_bloginfo('url') ?>/wp-content/uploads/<?php echo $fvvv->meta_value; ?>" /></p>
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
            }
        ?>


    </div>

<?php
    get_template_part( 'rightcol' );
    get_template_part( 'footer' );
?>
