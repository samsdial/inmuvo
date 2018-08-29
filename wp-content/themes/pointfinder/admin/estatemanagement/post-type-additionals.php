<?php
/**********************************************************************************************************************************
*
* Additional things for post types
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/

    add_action( 'admin_head-edit-tags.php', 'pfconditions_remove_parent_category' );

    function pfconditions_remove_parent_category(){
        if ( 'pointfinderconditions' != $_GET['taxonomy'] )
            return;

        $parent = 'parent()';

        if ( isset( $_GET['action'] ) )
            $parent = 'parent().parent()';

        ?>
            <script type="text/javascript">
                jQuery(document).ready(function($)
                {     
                    $('label[for=parent]').<?php echo $parent; ?>.remove();       
                });
            </script>
        <?php
    }

    /**
    *Start: Post Type Column Filters
    **/
        /*Start:Added with v1.6.2*/
        add_action('admin_menu', 'pointfinder_remove_submenu_cpts');
        function pointfinder_remove_submenu_cpts() {
            global $submenu;
            unset($submenu['edit.php?post_type=pointfinderinvoices'][10]);
            unset($submenu['edit.php?post_type=pointfindermorders'][10]);
            unset($submenu['edit.php?post_type=pointfinderorders'][10]);
            unset($submenu['edit.php?post_type=pointfinderreviews'][10]); 
        }

        add_action('admin_head', 'pointfinder_remove_unwanted_cpts');
        function pointfinder_remove_unwanted_cpts(){
            $screen = get_current_screen();
            $setup3_pointposttype_pt11 = PFSAIssetControl('setup3_pointposttype_pt11','','testimonials');

            if (isset($screen->post_type)) {
                switch ($screen->post_type) {
                    case 'pointfinderorders':
                        echo '<style type="text/css">#titlediv{margin-bottom: 10px;}.row-actions .view {display:none;}.wrap .page-title-action{display:none;}</style>';
                        break;
                    case 'pointfindermorders':
                        echo '<style type="text/css">#titlediv{margin-bottom: 10px;}.row-actions .view {display:none;}.wrap .page-title-action{display:none;}</style>';
                        break;
                    case 'pointfinderreviews':
                        echo '<style type="text/css">#titlediv{margin-bottom: 10px;}#edit-slug-box{display: none;}#favorite-actions {display:none;}.wrap .page-title-action{display:none;}.tablenav .bulkactions{display:none;}</style>';
                        break;
                    case $setup3_pointposttype_pt11:
                        echo '<style type="text/css">#edit-slug-box{display: none;}</style>';
                        break;
                }
            }
            
        };

        function pointfinder_remove_unwanted_pra($actions, $page_object){   
            global $post;
            $setup3_pointposttype_pt11 = PFSAIssetControl('setup3_pointposttype_pt11','','testimonials');
            $setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');

            switch ($page_object->post_type) {
                case 'pointfindermorders':
                case 'pointfinderorders':
                case 'pointfinderinvoices':
                    unset($actions['edit']);unset($actions['inline hide-if-no-js']);unset($actions['edit_as_new_draft']);
                    break;
                case 'pointfinderreviews':
                    unset($actions['view']);
                    unset($actions['inline hide-if-no-js']);
                    unset($actions['edit_as_new_draft']);
                    unset( $actions['trash'] );
                    $actions['trash'] = "<a class='submitdelete' title='" . esc_attr(esc_html__('Delete this item permanently','pointfindert2d')) . "' href='" . get_delete_post_link($post->ID, '', true) . "'>" . esc_html__('Delete','pointfindert2d') . "</a>";
                    if ($post->post_status == 'pendingapproval') {
                        $actions['view'] = "<a class='submitdelete' title='" . esc_attr(esc_html__('Publish this item permanently','pointfindert2d')) . "' href='" . admin_url("edit.php?post_type=pointfinderreviews&publishrevid=".$post->ID) . "'>" . esc_html__('Publish','pointfindert2d') . "</a>";
                    }
                    break;
                case $setup3_pointposttype_pt11:
                    unset($actions['view']);
                    break;
                case $setup3_pointposttype_pt1:
                    //unset($actions['inline hide-if-no-js']);
                    if ($post->post_status == 'pendingapproval' || $post->post_status == 'pendingpayment' || $post->post_status == 'rejected') {
                        $actions['inline'] = "<a class='submitdelete' title='" . esc_attr(esc_html__('Publish this item permanently','pointfindert2d')) . "' href='" . admin_url("edit.php?post_type=".$setup3_pointposttype_pt1."&publishitemid=".$post->ID) . "'>" . esc_html__('Publish','pointfindert2d') . "</a>";
                    }

                    if ($post->post_status == 'pendingapproval' || $post->post_status == 'pendingpayment' || $post->post_status == 'publish') {
                        $actions['reject'] = "<span class='trash'><a class='submitdelete' title='" . esc_attr(esc_html__('Reject this item permanently','pointfindert2d')) . "' href='" . admin_url("edit.php?post_type=".$setup3_pointposttype_pt1."&rejectitemid=".$post->ID) . "'>" . esc_html__('Reject','pointfindert2d') . "</a></span>";
                    }
                    break;
            }
            return $actions;
        }
        add_filter('page_row_actions', 'pointfinder_remove_unwanted_pra', 10, 2);

        function pointfinder_unwanted_remove_meta_box($post_type) {
            $setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');

            switch ($post_type) {
                case 'pfmembershippacks':
                    remove_meta_box( 'mymetabox_revslider_0', 'pfmembershippacks', 'normal' );
                    break;
                case 'pointfinderorders':
                    remove_meta_box( 'submitdiv', 'pointfinderorders','side');
                    remove_meta_box( 'slugdiv', 'pointfinderorders','normal');
                    remove_meta_box( 'mymetabox_revslider_0', 'pointfinderorders', 'normal' );
                    break;
                case 'pointfindermorders':
                    remove_meta_box( 'submitdiv', 'pointfindermorders','side');
                    remove_meta_box( 'slugdiv', 'pointfindermorders','normal');
                    remove_meta_box( 'mymetabox_revslider_0', 'pointfindermorders', 'normal' );
                    break;
                case $setup3_pointposttype_pt1:
                    remove_meta_box( 'authordiv', $setup3_pointposttype_pt1, 'normal' );
                    remove_meta_box( 'mymetabox_revslider_0', $setup3_pointposttype_pt1, 'normal' );
                    break;
                case 'pointfinderreviews':
                    remove_meta_box( 'submitdiv', 'pointfinderreviews','side');
                    remove_meta_box( 'slugdiv', 'pointfinderreviews','normal');
                    remove_meta_box( 'mymetabox_revslider_0', 'pointfinderreviews', 'normal' );
                    break;
                case 'pointfinderinvoices':
                    remove_meta_box( 'submitdiv', 'pointfinderinvoices','side');
                    remove_meta_box( 'slugdiv', 'pointfinderinvoices','normal');
                    remove_meta_box( 'mymetabox_revslider_0', 'pointfinderinvoices', 'normal' );
                    break;
            }
        }
        add_action( 'add_meta_boxes', 'pointfinder_unwanted_remove_meta_box', 10,1);
        /*End:Added with v1.6.2*/

        get_template_part('admin/estatemanagement/ptfilters/pfitems-pt','filters');
        get_template_part('admin/estatemanagement/ptfilters/review-pt','filters');
        get_template_part('admin/estatemanagement/ptfilters/orders-pt','filters');
        get_template_part('admin/estatemanagement/ptfilters/invoices-pt','filters');
    /**
    *End: Post Type Column Filters
    **/


    /**
    *Start: Post Type Listing Page Works
    **/


        add_action( 'admin_head-edit.php', 'pointfinder_admin_head_custompost_listing' );
        function pointfinder_admin_head_custompost_listing() {
            global $post_type;
            
            /* Main post type filters */
            $setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');
            if($post_type == $setup3_pointposttype_pt1){
                $setup3_pointposttype_pt4_check = PFSAIssetControl('setup3_pointposttype_pt4_check','','1');
                $setup3_pointposttype_pt5_check = PFSAIssetControl('setup3_pointposttype_pt5_check','','1');
                $pftaxarray = array('pointfinderltypes');
                if($setup3_pointposttype_pt4_check == 1){$pftaxarray[] = 'pointfinderitypes';}  
                if($setup3_pointposttype_pt5_check == 1){$pftaxarray[] = 'pointfinderlocations';}
                
                
                if (PFASSIssetControl('st8_ncptsys','',0) != 1) {
                    require_once( get_template_directory().'/admin/estatemanagement/taxonomy-filter-class.php');
                    new Tax_CTP_Filter(array($setup3_pointposttype_pt1 => $pftaxarray));
                }

                /* One click item approval */
                if (isset($_GET['publishitemid']) && current_user_can( 'activate_plugins' )) {
                   if (!empty($_GET['publishitemid'])) {
                        $itemid = sanitize_text_field($_GET['publishitemid']);
                        if (get_post_status($itemid) != 'publish') {
                            wp_update_post(array('ID' => $itemid, 'post_status' => 'publish'));
                        }
                   }
                }

                /* One click item reject */
                if (isset($_GET['rejectitemid']) && current_user_can( 'activate_plugins' )) {
                   if (!empty($_GET['rejectitemid'])) {
                        $itemid = sanitize_text_field($_GET['rejectitemid']);
                        if (get_post_status($itemid) != 'rejected') {
                            wp_update_post(array('ID' => $itemid, 'post_status' => 'rejected'));
                        }
                   }
                }

            }

            /* One click review approval */
            if ($post_type == 'pointfinderreviews') {
                if (isset($_GET['publishrevid']) && current_user_can( 'activate_plugins' )) {
                   if (!empty($_GET['publishrevid'])) {
                        $revid = sanitize_text_field($_GET['publishrevid']);
                        if (get_post_status($revid) != 'publish') {
                            wp_update_post(array('ID' => $revid, 'post_status' => 'publish'));
                        }
                   }
                }
            }

        }

    /**
    *End: Post Type Listing Page Works
    **/

?>