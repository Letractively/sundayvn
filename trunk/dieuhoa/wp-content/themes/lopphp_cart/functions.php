<?php
    //error_reporting(0);
    add_theme_support( 'post-thumbnails' ); 
    add_action( 'init', 'create_post_type' );
    add_action( 'init', 'register_my_menus' );
    add_action( 'init', 'create_product_taxono' );
    add_action( 'admin_init', 'add_meta_box_for_product' );
    add_action( 'admin_init', 'add_meta_box_for_product_VAT' );
    add_action( 'admin_init', 'add_meta_box_for_product_HOT' );

    //    add_action( 'admin_init', 'add_meta_box_for_product_introtext' );
    add_action('save_post', 'save_product_data' );
    if ( function_exists('register_sidebar') )
    {
        register_sidebar(array(
        'before_widget' => '',
        'id' => 'sidebar-1',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        ));
        register_sidebar(array(
        'before_widget' => '',
        'id' => 'sidebar-2',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
        )); 
        register_sidebar(array(
        'name' => __( 'Khung bên phải' ),
        'before_widget' => '<div class="BorderBox">
        <div class="BorderBoxInner">
        <div class="BorderBoxInner1">&nbsp;</div>
        </div>
        </div>',
        'after_widget' => ' </div>
        </div><div class="BorderBox BoxWhiteBot">
        <div class="BorderBoxInner">
        <div class="BorderBoxInner1">&nbsp;</div>
        </div>
        </div>',
        'id' => 'right-sidebar',
        'description' => __( 'Các module bên này sẽ được bọc bằng khung bo góc' ),
        'before_title' => '<div class="ContentSBarBody">
        <div class="customize">
        <div class="modTitleBar">
        <div class="modTitleBarInner">
        <div class="modTitleBarInner1">',
        'after_title' => '</div></div>
        </div>'
        ));
    }
    class lopphp_news_sticker extends WP_Widget {
        function lopphp_news_sticker() {
            parent::WP_Widget(false, 'Bài trong chuyên mục');
        }
        function form($instance) {  
            $title = esc_attr($instance['category_id']);  

        ?>  
        <p><label for="<?php echo $this->get_field_id('category_id'); ?>"><?php _e('Danh mục'); ?> <input class="widefat" id="<?php echo $this->get_field_id('category_id'); ?>" name="<?php echo $this->get_field_name('category_id'); ?>" type="text" value="<?php echo $title; ?>" /></label></p>  
        <?php  
        } 
        function update($new_instance, $old_instance) {
            // processes widget options to be saved
            return $new_instance;
        }
        function widget($args, $instance) {

            $arrayS  = array(
            'numberposts'     => 4,
            'category'        => $instance['category_id']
            );
            $postss = get_posts($arrayS);
            $categoryData = get_category($instance['category_id']);
            echo $args['before_widget'] . $args['before_title'] ;
            $cat_link = get_category_link($categoryData->term_id);
            echo "<a href='{$cat_link}'>";
            echo $categoryData->name ."</a>". $args['after_title'];
            foreach ($postss as $postData)
            {
                echo '<ul class="ListModule ImageList">
                <li>
                ';
                $imgData = get_the_post_thumbnail($postData->ID);

                echo '       <p>'. $postData->post_title .'</p>';
                echo ' <p class="ImgIntro clearfix">';
                if (!empty($imgData))
                {
                    echo $imgData;
                }
                echo gioihankitu($postData->post_content,100);
                echo '</p>';
                echo '<p class="readmore"><a href="';
                echo get_permalink($postData->ID);
                echo '">Xem chi tiết &gt;&gt;</a></p>';
                echo '              </li>';


            }
            echo '</ul>';
            echo $args['after_widget'];
            // outputs the content of the widget
        }
    }
    register_widget('lopphp_news_sticker');
    function removelastatag($str)
    {
        $a = strripos($str,'<a');
        $b = substr($str,$a);
        return $b;
    }
    //$str la chuoi can xu ly
    //$limit la do dai toi da cua chuoi
    function gioihankitu($str,$limit)
    {
        if(strlen($str)> $limit)
        {
            $re =  substr($str,0,$limit);
            $re =  substr($re, 0, strrpos($re, " "));
            $re .="...";
            return $re;
        }
        else
        {
            return $str;
        }
    }
    function create_product_taxono()
    {
        $labels = array(
        'name' => _x( 'Danh mục sp', 'danh mục sản phẩm' ), 
        );
        register_taxonomy('pro_category','acme_product',array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        //'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        //'rewrite' => array( 'slug' => 'writer' ),
        ));
    }
    function add_meta_box_for_product_VAT()
    {
        add_meta_box( 'product-vat-div', __('Có VAT hay không'),  'product_vat_metabox', 'acme_product', 'advanced','high');
    }
    function add_meta_box_for_product()
    {
        add_meta_box( 'product-price-div', __('Giá'),  'product_price_metabox', 'acme_product', 'side','high');
        add_meta_box( 'product-intro-div', __('Giới thiệu'),  'product_intro_metabox', 'acme_product', 'normal','high');
        add_meta_box( 'product-feature-div', __('Các đặc tả'),  'product_feature_metabox', 'acme_product', 'normal','high');
    }  
    function add_meta_box_for_product_HOT()
    {
        add_meta_box( 'product-hot-div', __('Sản phẩm HOT'),  'product_hot_metabox', 'acme_product', 'side','high');
    }
    function product_intro_metabox()
    {
        global $post;
        $product_introtxt =  get_post_meta($post->ID, '_product_introtxt', true) ;
        echo "<input style='width:100%' type='text' name='product_introtxt' value='{$product_introtxt}' />";
    }
    function product_feature_metabox()
    {
        global $post;
        $product_features =  unserialize( get_post_meta($post->ID, '_product_features', true) );
        echo "<label style='width:100px;float:left;'>Tính năng:</label> <input type='text' name='product_feature[function]' value='{$product_features['function']}' /><br />";
        echo "<label style='width:100px;float:left;'>Model:</label> <input type='text' name='product_feature[model]' value='{$product_features['model']}' /><br />";
        echo "<label style='width:100px;float:left;'>Công suất:</label> <input type='text' name='product_feature[power]' value='{$product_features['power']}' />";

    }
    function product_vat_metabox($post)
    {
        $product_vat = get_post_meta($post->ID, '_product_vat', TRUE);
        if (!$product_vat or $product_vat=='no') $product_vat = 'no';      
        echo '<input type="radio" name="product_vat" value="yes"';
        if($product_vat=='yes') echo 'checked="checked"' ;
        echo ' />&nbsp;Có:<br />';
        echo ' <input type="radio" name="product_vat" value="no" ';
        if($product_vat=='no') echo 'checked="checked"';
        echo ' />&nbsp;Không:';
    }
    function product_hot_metabox($post)
    {
        $product_hot = get_post_meta($post->ID, '_product_hot', TRUE);
        if (!$product_hot or $product_hot=='no') $product_hot = 'no';      
        echo '<input type="radio" name="product_hot" value="yes"';
        if($product_hot=='yes') echo 'checked="checked"' ;
        echo ' />&nbsp;Có:<br />';
        echo ' <input type="radio" name="product_hot" value="no" ';
        if($product_hot=='no') echo 'checked="checked"';
        echo ' />&nbsp;Không:';
    }
    function register_my_menus() {
        register_nav_menus(
        array( 
        'header-menu' => __( 'Menu chính' ),
        'top-menu' => __( 'Menu chữ trên cùng' ),
        )
        );
    }
    function curPageURL() {
        $pageURL = 'http';
        if ($_SERVER["HTTPS"] == "on") {$pageURL .= "s";}
        $pageURL .= "://";
        if ($_SERVER["SERVER_PORT"] != "80") {
            $pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
        } else {
            $pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
        }
        return $pageURL;
    }
    function getAMenuData($menu_slug)
    {
        $locations = get_nav_menu_locations();

        if (isset($locations[$menu_slug])) {
            $menu_id = $locations[$menu_slug];
        }
        return wp_get_nav_menu_items($menu_id); 
    }


    function create_post_type() {
        register_post_type( 'acme_product',
        array(
        'labels' => array(
        'name' => 'Sản phẩm',
        'singular_name' => __( 'Sản phẩm' ),
        'not_found'=> __('Không tìm thấy sản phẩm nào'),
        'add_new' => 'Thêm mới'
        ),
        'public' => true,
        'has_archive' => true,
        'supports' => array('title','thumbnail','editor')
        )
        );
    }


    function product_price_metabox($post) 
    {
        $product_price = get_post_meta($post->ID, '_product_price', TRUE);

        if (!$product_price) $product_price = '0';      
    ?>
    <input type="hidden" name="product_price_noncename" id="product_price_noncename" value="<?php echo wp_create_nonce( 'product_price'.$post->ID );?>" />
    <input type="text" name="product_price" style="width: 100%;" value="<?php echo $product_price; ?>" />
    <?php
}

function save_product_data($post_id) {    
    // verify this came from the our screen and with proper authorization.
    if ( !wp_verify_nonce( $_POST['product_price_noncename'], 'product_price'.$post_id )) {
        return $post_id;
    }

    // verify if this is an auto save routine. If it is our form has not been submitted, so we dont want to do anything
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
        return $post_id;

    // Check permissions
    if ( !current_user_can( 'edit_post', $post_id ) )
        return $post_id;

    $post =get_post($post_id);


    if ($post->post_type == 'acme_product') { 


        delete_post_meta($post_id, '_product_price');
        add_post_meta($post_id, '_product_price', esc_attr($_POST['product_price']) );

        delete_post_meta($post_id, '_product_vat');
        add_post_meta($post_id, '_product_vat', esc_attr($_POST['product_vat']) );

        delete_post_meta($post_id, '_product_hot');
        add_post_meta($post_id, '_product_hot', esc_attr($_POST['product_hot']) );

        delete_post_meta($post_id, '_product_introtxt');
        add_post_meta($post_id, '_product_introtxt', esc_attr($_POST['product_introtxt']));

        delete_post_meta($post_id, '_product_features');

        add_post_meta($post_id, '_product_features', serialize($_POST['product_feature'] ));

        return(esc_attr($_POST['product_price']));
    }
    return $post_id;
}

class Paging
{

    var $items = NULL;

    var $itemonpage = 5;

    var $pageOnTwoSide = 10;

    var $pages;

    var $pageToBreak;

    var $firstPages = array();

    var $afterPages = array();

    var $curPage;
    function Paging($itemNumber,$itemonpage,$pageFromURL=NULL)
    {
        $this->items = $itemNumber;
        $this->itemonpage = $itemonpage;
        $this->pages = ceil($this->items/$this->itemonpage);
        $this->pageToBreak = $this->pageOnTwoSide+1;

        if($pageFromURL!=NULL)
        {
            $page = intval($pageFromURL);
        }

        else

        {
            $page = 1;
        }
        $curPage = $page;

        if($curPage>$this->pages)
        {
            die();
        }

        if($page<$this->pageToBreak)
        {
            $page--;

            while($page>0)
            {
                $this->firstPages[]=$page;
                $page--;
            }
            $page = $curPage+1;

            while($page<=$this->pages)
            {
                $this->afterPages[]=$page;

                if($page==($curPage+$this->pageOnTwoSide))
                {

                    break;
                }
                $page++;
            }
        }

        else

        {
            $page = $curPage-1;

            while($page>=($curPage-$this->pageOnTwoSide))
            {
                $this->firstPages[]=$page;
                $page--;
            }
            $page = $curPage+1;

            while($page<=$this->pages)
            {
                $this->afterPages[]=$page;

                if($page==($curPage+$this->pageOnTwoSide))
                {

                    break;
                }
                $page++;
            }
        }
        $this->firstPages = array_reverse($this->firstPages);
        $this->curPage = $curPage;
    }
    function getBefore()
    {

        return $this->firstPages;
    }
    function getAfter()
    {

        return $this->afterPages;
    }
    function getCurrent()
    {

        return $this->curPage;
    }
    function getFinalPage()
    {

        return $this->pages;
    }
    function generateLink()
    {
        $html = '';

        if($this->curPage!=1)
        {
            $html .= "<a href='?page=1'>First</a>";
            $html .= "<a href='?page=".($this->curPage-1)."'>Previous</a>";
        }

        foreach($this->firstPages as $i)
        {
            $html .= "<a href='?page=$i'>$i</a>";
        }
        $html .= "<a class='current' href='?page=".$this->curPage."'>".$this->curPage."</a>";

        foreach($this->afterPages as $i)
        {
            $html .= "<a href='?page=$i'>$i</a>";
        }

        if($this->curPage!=$this->pages)
        {
            $html .= "<a href='?page=".($this->curPage+1)."'>Next</a>";
            $html .= "<a href='?page=".($this->pages)."'>Last</a>";
        }

        return $html;
    }
}

