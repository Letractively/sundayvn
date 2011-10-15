<?php
    /**Custom post type Tour*/
    add_action('init', 'codex_custom_init');
    function codex_custom_init() 
    {
        $labels = array(
        'name' => _x('Tours', 'post type general name'),
        'singular_name' => _x('Tour', 'post type singular name'),
        'add_new' => _x('Add New', 'tour'),
        'add_new_item' => __('Add New Tour'),
        'edit_item' => __('Edit Tour'),
        'new_item' => __('New Tour'),
        'all_items' => __('All Tours'),
        'view_item' => __('View Tour'),
        'search_items' => __('Search Tours'),
        'not_found' =>  __('No tours found'),
        'not_found_in_trash' => __('No tours found in Trash'), 
        'parent_item_colon' => '',
        'menu_name' => 'Tours'

        );
        $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true, 
        'show_in_menu' => true, 
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'has_archive' => true, 
        'hierarchical' => false,
        'menu_position' => 5,
        'supports' => array('title','editor','author','thumbnail','comments')
        ); 
        register_post_type('tour',$args);

        //Add custom field
        function add_tour_box() {
            add_meta_box('tour_box', 'Tour Information', 'tour_box', 'tour', 'side', 'core');
        }
        function add_theme_menus() {
            if (!is_admin())
                return;
            add_action('admin_menu', 'add_tour_box');
            add_action('save_post', 'save_tour_data');
        }
        function tour_box($post) {
            $time_tour = get_post_meta($post->ID, 'time_tour', true);
        ?>
        <input type="hidden" name="theme_custom_fields" value="1" />
        <input type="hidden" name="eventmeta_noncename" id="eventmeta_noncename" value="<?php echo wp_create_nonce(plugin_basename(__FILE__)); ?>" />
        <table border="0">
            <tbody>
                <tr>
                    <td>Time</td>
                    <td>: <input type="text" name="time_tour" value="<?php echo $time_tour; ?>" size="35"/></td>
                </tr>
            </tbody>
        </table>
        <?php    
        }
        function save_tour_data($post_id) {
            if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
                return $post_id;

            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id))
                    return $post_id;
            } else {
                if (!current_user_can('edit_post', $post_id))
                    return $post_id;
            }

            $post = get_post($post_id);
            if ($post->post_type == 'tour') {
                if ($_POST['theme_custom_fields']) {

                    $metas = array('time_tour');
                    foreach ($metas as $k => $v) {
                        if (add_post_meta($post_id, $v, $_POST[$v], true) == false)
                            update_post_meta($post_id, $v, $_POST[$v]);
                    }
                }
            }
            return $theme;
        }
        add_theme_menus();    

        //Add taxonomy for Tour
        $labels = array(
        'name' => _x( 'Tour Categories', 'taxonomy general name' ),
        'singular_name' => _x( 'Tour Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Tour Categories' ),
        'all_items' => __( 'All Tour Categories' ),
        'parent_item' => __( 'Parent Tour Category' ),
        'parent_item_colon' => __( 'Parent Tour Category:' ),
        'edit_item' => __( 'Edit Tour Category' ), 
        'update_item' => __( 'Update Tour Category' ),
        'add_new_item' => __( 'Add New Tour Category' ),
        'new_item_name' => __( 'New Tour Category Name' ),
        'menu_name' => __( 'Tour Categories' ),
        );     

        register_taxonomy('tourcategory',array('tour'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'tourcategory' ),
        ));

        //Edit columns
        add_filter('manage_edit-tour_columns', 'add_new_tour_columns');
        function add_new_tour_columns($tour_columns) {
            $new_columns['cb'] = '<input type="checkbox" />';

            $new_columns['id'] = __('ID');
            $new_columns['title'] = _x('Tour Name', 'column name');         
            $new_columns['tourcategory'] = __('Tour Categories');
            $new_columns['author'] = __('Author'); 
            $new_columns['date'] = _x('Date', 'column name');

            return $new_columns;
        }
        add_action('manage_tour_posts_custom_column', 'manage_tour_columns', 10, 2);

        function manage_tour_columns($column_name, $id) {
            global $wpdb;
            switch ($column_name) {
                case 'id':
                    echo $id;
                    break;

                case 'tourcategory':
                    $temp = wp_get_post_terms($id, 'tourcategory', array("fields" => "names"));
                    $text = "";
                    foreach($temp as $t){
                        if($text==""){
                            $text .= $t;
                        }else{
                            $text .= ", " . $t;
                        }
                    }
                    echo $text; 
                    break;
                default:
                    break;
            }
        }    
    }

