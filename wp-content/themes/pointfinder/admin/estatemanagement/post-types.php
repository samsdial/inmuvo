<?php
/**********************************************************************************************************************************
*
* Custom Post Types
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/

function create_post_type_pointfinder(){	

    /**
    *Start: Get Admin Values
    **/
        $setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');
        $setup3_pointposttype_pt2 = PFSAIssetControl('setup3_pointposttype_pt2','','PF Item');
        $setup3_pointposttype_pt3 = PFSAIssetControl('setup3_pointposttype_pt3','','PF Items');
        $setup3_pointposttype_pt4 = PFSAIssetControl('setup3_pointposttype_pt4','','Item Types');
        $setup3_pointposttype_pt4s = PFSAIssetControl('setup3_pointposttype_pt4s','','Item Type');
        $setup3_pointposttype_pt4p = PFSAIssetControl('setup3_pointposttype_pt4p','','types');
        $setup3_pointposttype_pt5 = PFSAIssetControl('setup3_pointposttype_pt5','','Locations');
        $setup3_pointposttype_pt5s = PFSAIssetControl('setup3_pointposttype_pt5s','','Location');
        $setup3_pointposttype_pt5p = PFSAIssetControl('setup3_pointposttype_pt5p','','area');
        $setup3_pointposttype_pt6 = PFSAIssetControl('setup3_pointposttype_pt6','','Features');
        $setup3_pointposttype_pt6s = PFSAIssetControl('setup3_pointposttype_pt6s','','Feature');
        $setup3_pointposttype_pt6p = PFSAIssetControl('setup3_pointposttype_pt6p','','feature');
        $setup3_pointposttype_pt7 = PFSAIssetControl('setup3_pointposttype_pt7','','Listing Types');
        $setup3_pointposttype_pt7s = PFSAIssetControl('setup3_pointposttype_pt7s','','Listing Type');
        $setup3_pointposttype_pt7p = PFSAIssetControl('setup3_pointposttype_pt7p','','listing');
        $setup3_pointposttype_pt8 = PFSAIssetControl('setup3_pointposttype_pt8','','agents');
        $setup3_pointposttype_pt9 = PFSAIssetControl('setup3_pointposttype_pt9','','PF Agent');
        $setup3_pointposttype_pt10 = PFSAIssetControl('setup3_pointposttype_pt10','','PF Agents');
        $setup3_pointposttype_pt11 = PFSAIssetControl('setup3_pointposttype_pt11','','testimonials');
        $setup3_pointposttype_pt12 = PFSAIssetControl('setup3_pointposttype_pt12','','PF Testimonials');
        $setup3_pointposttype_pt13 = PFSAIssetControl('setup3_pointposttype_pt13','','Testimonial');

        $setup3_pt14 = PFSAIssetControl('setup3_pt14','','Conditions');
        $setup3_pt14s = PFSAIssetControl('setup3_pt14s','','Condition');
        $setup3_pt14p = PFSAIssetControl('setup3_pt14p','','condition');
        $setup3_pt14_check = PFSAIssetControl('setup3_pt14_check','','0');

        $setup3_pointposttype_pt4_check = PFSAIssetControl('setup3_pointposttype_pt4_check','','1');
        $setup3_pointposttype_pt5_check = PFSAIssetControl('setup3_pointposttype_pt5_check','','1');
        $setup3_pointposttype_pt6_check = PFSAIssetControl('setup3_pointposttype_pt6_check','','1');

        $setup3_pointposttype_pt6_status = PFSAIssetControl('setup3_pointposttype_pt6_status','','1');


        $setup4_membersettings_loginregister = PFSAIssetControl('setup4_membersettings_loginregister','','1');
        $setup4_membersettings_frontend = PFSAIssetControl('setup4_membersettings_frontend','','1');

        $setup11_reviewsystem_check = PFREVSIssetControl('setup11_reviewsystem_check','','0');
        $setup4_membersettings_paymentsystem = PFSAIssetControl('setup4_membersettings_paymentsystem','','1');
    /**
    *End: Get Admin Values
    **/


    /**
    *Start: Reviews Post Type
    **/
        if($setup11_reviewsystem_check == 1){
           
            register_post_type('pointfinderreviews', 
                array(
                'labels' => array(
                    'name' => esc_html__( 'PF Reviews', 'pointfindert2d' ), 
                    'singular_name' => esc_html__( 'PF Review', 'pointfindert2d' ),
                    'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'edit' => esc_html__('Edit', 'pointfindert2d'),
                    'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                    'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),esc_html__( 'Review', 'pointfindert2d' )),
                ),
                'public' => true,
        		'menu_position' => 209,
        		'menu_icon' => 'dashicons-format-status',
                'hierarchical' => true, 
        		'show_tagcloud' => false, 
                'show_in_nav_menus' => false,
                'has_archive' => true,
                'supports' => array('title','editor'), 
                'can_export' => true,
                'show_in_rest' => true,
        		'taxonomies' => array(),
        		'register_meta_box_cb' => 'pointfinder_reviews_add_meta_box',		
            ));
        	
        }	
    /**
    *End: Reviews Post Type
    **/


    /**
    *Start: Orders Post Type
    **/
        if($setup4_membersettings_frontend == 1 && $setup4_membersettings_loginregister == 1 && $setup4_membersettings_paymentsystem == 1){
           
            register_post_type('pointfinderorders', 
                array(
                'labels' => array(
                    'name' => esc_html__( 'PF Orders', 'pointfindert2d' ), 
                    'singular_name' => esc_html__( 'PF Order', 'pointfindert2d' ),
                    'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'edit' => esc_html__('Edit', 'pointfindert2d'),
                    'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),esc_html__( 'Orders', 'pointfindert2d' )),
                    'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                ),
                'public' => true,
        		'menu_position' => 208,
        		'menu_icon' => 'dashicons-feedback',
                'hierarchical' => true, 
        		'show_tagcloud' => false,
                'show_in_nav_menus' => false, 
                'has_archive' => true,
                'supports' => false,
                'can_export' => true, 
        		'taxonomies' => array(),
        		'register_meta_box_cb' => 'pointfinder_orders_add_meta_box',
        		
            ));
        	
        }	
    /**
    *End: Orders Post Type
    **/

    /**
    *Start: Orders for membership Post Type
    **/
        if($setup4_membersettings_frontend == 1 && $setup4_membersettings_loginregister == 1 && $setup4_membersettings_paymentsystem == 2){
           
            register_post_type('pointfindermorders', 
                array(
                'labels' => array(
                    'name' => esc_html__( 'PF Orders', 'pointfindert2d' ), 
                    'singular_name' => esc_html__( 'PF Order', 'pointfindert2d' ),
                    'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'edit' => esc_html__('Edit', 'pointfindert2d'),
                    'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),esc_html__( 'Orders', 'pointfindert2d' )),
                    'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                    'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),esc_html__( 'Order', 'pointfindert2d' )),
                ),
                'public' => true,
                'menu_position' => 208,
                'menu_icon' => 'dashicons-feedback',
                'hierarchical' => true, 
                'show_tagcloud' => false,
                'show_in_nav_menus' => false, 
                'has_archive' => true,
                'supports' => false,
                'can_export' => true, 
                'taxonomies' => array(),
                'register_meta_box_cb' => 'pointfinder_morders_add_meta_box',
                
            ));
            
        }   
    /**
    *End: Orders for membership Post Type
    **/

    /**
    *Start: Invoices Post Type
    **/
        if($setup4_membersettings_frontend == 1 && $setup4_membersettings_loginregister == 1){
           
            register_post_type('pointfinderinvoices', 
                array(
                'labels' => array(
                    'name' => esc_html__( 'PF Invoices', 'pointfindert2d' ), 
                    'singular_name' => esc_html__( 'PF Invoice', 'pointfindert2d' ),
                    'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'edit' => esc_html__('Edit', 'pointfindert2d'),
                    'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),esc_html__( 'Invoices', 'pointfindert2d' )),
                    'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                    'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),esc_html__( 'Invoice', 'pointfindert2d' )),
                ),
                'public' => true,
                'menu_position' => 210,
                'menu_icon' => 'dashicons-list-view',
                'hierarchical' => true, 
                'show_tagcloud' => false,
                'show_in_nav_menus' => false, 
                'has_archive' => true,
                'supports' => false,
                'can_export' => true, 
                'taxonomies' => array(),
                'register_meta_box_cb' => 'pointfinder_minvoices_add_meta_box',
                
            ));
            
        }   
    /**
    *End: Invoices Post Type
    **/


    /**
    *Start: Testimonials Post Type
    **/
        register_post_type(''.$setup3_pointposttype_pt11.'', 
            array(
            'labels' => array(
                'name' => ''.$setup3_pointposttype_pt12.'', 
                'singular_name' => ''.$setup3_pointposttype_pt13.'',
                'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'edit' => esc_html__('Edit', 'pointfindert2d'),
                'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt12),
                'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),$setup3_pointposttype_pt13),
                'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),$setup3_pointposttype_pt13),
            ),
            'public' => true,
    		'menu_position' => 207,
    		'menu_icon' => 'dashicons-format-chat',
            'hierarchical' => true, 
    		'show_tagcloud' => false, 
            'show_in_nav_menus' => false,
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
            ), 
            'can_export' => true, 
    		'taxonomies' => array(),
            'show_in_rest' => true,
    		
        ));
    /**
    *End: Testimonials Post Type
    **/



    /**
    *Start: Agents Post Type
    **/
        if($setup3_pointposttype_pt6_status == 1){
            register_post_type(''.$setup3_pointposttype_pt8.'', 
                array(
                'labels' => array(
                    'name' => ''.$setup3_pointposttype_pt10.'', 
                    'singular_name' => ''.$setup3_pointposttype_pt9.'',
                    'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'edit' => esc_html__('Edit', 'pointfindert2d'),
                    'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt10),
                    'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                    'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),$setup3_pointposttype_pt9),
                ),
                'public' => true,
        		'menu_position' => 206,
        		'menu_icon' => 'dashicons-businessman',
                'hierarchical' => true, 
        		'show_tagcloud' => false, 
                'has_archive' => true,
                'supports' => array(
                    'title',
                    'editor',
                    'thumbnail',
                ), 
                'can_export' => true, 
        		'taxonomies' => array(),
                'rewrite' => true,
                'show_in_rest' => true,
        		
            ));
        }
    /**
    *End: Agents Post Type
    **/



    /**
    *Start: PF Items Post Type
    **/
        register_post_type(''.$setup3_pointposttype_pt1.'', 
            array(
            'labels' => array(
                'name' => ''.$setup3_pointposttype_pt3.'', 
                'singular_name' => ''.$setup3_pointposttype_pt2.'',
                'add_new' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'edit' => esc_html__('Edit', 'pointfindert2d'),
                'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'new_item' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'view' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'view_item' => sprintf(esc_html__( 'View %s', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt3),
                'not_found' => sprintf(esc_html__( 'No %s found', 'pointfindert2d' ),$setup3_pointposttype_pt2),
                'not_found_in_trash' => sprintf(esc_html__( 'No %s found in Trash', 'pointfindert2d' ),$setup3_pointposttype_pt2),
            ),
            'public' => true,
    		'menu_position' => 202,
    		'menu_icon' => 'dashicons-location-alt',
            'hierarchical' => true, 
    		'show_tagcloud' => false, 
            'has_archive' => true,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
    			'excerpt',
                'page-attributes',
                'tags'
            ), 
            'can_export' => true, 
    		'taxonomies' => array('post_tag'),
            'show_in_rest' => true,
    		
        ));
    /**
    *End: PF Items Post Type
    **/



    /**
    *Start: Listing Types Taxonomy
    **/
    	  $labels = array(
    		'name' => ''.$setup3_pointposttype_pt7.'',
    		'singular_name' => ''.$setup3_pointposttype_pt7s.'',
    		'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt7),
    		'popular_items' => sprintf(esc_html__( 'Popular %s', 'pointfindert2d' ),$setup3_pointposttype_pt7),
    		'all_items' => sprintf(esc_html__( 'All %s', 'pointfindert2d' ),$setup3_pointposttype_pt7),
    		'parent_item' => null,
    		'parent_item_colon' => null,
    		'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt7s),
    		'update_item' => sprintf(esc_html__( 'Update %s', 'pointfindert2d' ),$setup3_pointposttype_pt7s),
    		'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt7s),
    		'new_item_name' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt7s),
    		'separate_items_with_commas' => sprintf(esc_html__( 'Separate %s with commas', 'pointfindert2d' ),$setup3_pointposttype_pt7),
    		'add_or_remove_items' => sprintf(esc_html__( 'Add or remove %s', 'pointfindert2d' ),$setup3_pointposttype_pt7s),
    		'choose_from_most_used' => sprintf(esc_html__( 'Choose from the most used %s', 'pointfindert2d' ),$setup3_pointposttype_pt7s),
    		'menu_name' => ''.$setup3_pointposttype_pt7.'',
    	  ); 
    	  
    	  
    	  register_taxonomy('pointfinderltypes',''.$setup3_pointposttype_pt1.'',array(
    		'hierarchical' => true,
    		'labels' => $labels,
    		'show_ui' => true,
    		'show_admin_column' => true,
            'show_in_nav_menus' => true,
    		'update_count_callback' => '_update_post_term_count',
    		'query_var' => true,
    		'rewrite' => array( 'slug' => $setup3_pointposttype_pt7p,'hierarchical'=>true ),
    		'sort' => true,
            'show_in_rest' => true
    	  ));
    /**
    *End: Listing Types Taxonomy
    **/


    	
    /**
    *Start: Item Types Taxonomy
    **/
        if($setup3_pointposttype_pt4_check == 1){
        	  $labels = array(
        		'name' => ''.$setup3_pointposttype_pt4.'',
        		'singular_name' => ''.$setup3_pointposttype_pt4.'',
        		'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt4),
        		'popular_items' => sprintf(esc_html__( 'Popular %s', 'pointfindert2d' ),$setup3_pointposttype_pt4),
        		'all_items' => sprintf(esc_html__( 'All %s', 'pointfindert2d' ),$setup3_pointposttype_pt4),
        		'parent_item' => null,
        		'parent_item_colon' => null,
        		'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt4s),
        		'update_item' => sprintf(esc_html__( 'Update %s', 'pointfindert2d' ),$setup3_pointposttype_pt4s),
        		'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt4s),
        		'new_item_name' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt4s),
        		'separate_items_with_commas' => sprintf(esc_html__( 'Separate %s with commas', 'pointfindert2d' ),$setup3_pointposttype_pt4),
        		'add_or_remove_items' => sprintf(esc_html__( 'Add or remove %s', 'pointfindert2d' ),$setup3_pointposttype_pt4s),
        		'choose_from_most_used' => sprintf(esc_html__( 'Choose from the most used %s', 'pointfindert2d' ),$setup3_pointposttype_pt4s),
        		'menu_name' => ''.$setup3_pointposttype_pt4.'',
        	  ); 
        	  
        	  
        	  register_taxonomy('pointfinderitypes',''.$setup3_pointposttype_pt1.'',array(
                'show_in_nav_menus' => true,
        		'hierarchical' => true,
        		'labels' => $labels,
        		'show_ui' => true,
        		'show_admin_column' => false,
                'show_in_nav_menus' => true,
        		'update_count_callback' => '_update_post_term_count',
        		'query_var' => true,
        		'rewrite' => array( 'slug' => $setup3_pointposttype_pt4p,'hierarchical'=>true),
        		'sort' => true,
                'show_in_rest' => true
        	  ));
        }
    /**
    *End: Item Types Taxonomy
    **/



    /**
    *Start: Locations Taxonomy
    **/
        if($setup3_pointposttype_pt5_check == 1){
        	  $labels = array(
        		'name' => ''.$setup3_pointposttype_pt5.'',
        		'singular_name' => ''.$setup3_pointposttype_pt5.'',
        		'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt5),
        		'popular_items' => sprintf(esc_html__( 'Popular %s', 'pointfindert2d' ),$setup3_pointposttype_pt5),
        		'all_items' => sprintf(esc_html__( 'All %s', 'pointfindert2d' ),$setup3_pointposttype_pt5),
        		'parent_item' => null,
        		'parent_item_colon' => null,
        		'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt5s),
        		'update_item' => sprintf(esc_html__( 'Update %s', 'pointfindert2d' ),$setup3_pointposttype_pt5s),
        		'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt5s),
        		'new_item_name' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt5s),
        		'separate_items_with_commas' => sprintf(esc_html__( 'Separate %s with commas', 'pointfindert2d' ),$setup3_pointposttype_pt5),
        		'add_or_remove_items' => sprintf(esc_html__( 'Add or remove %s', 'pointfindert2d' ),$setup3_pointposttype_pt5s),
        		'choose_from_most_used' => sprintf(esc_html__( 'Choose from the most used %s', 'pointfindert2d' ),$setup3_pointposttype_pt5s),
        		'menu_name' => ''.$setup3_pointposttype_pt5.'',
        	  ); 

        	  register_taxonomy('pointfinderlocations',''.$setup3_pointposttype_pt1.'',array(
        		'hierarchical' => true,
        		'labels' => $labels,
        		'show_ui' => true,
        		'show_admin_column' => false,
                'show_in_nav_menus' => true,
        		'update_count_callback' => '_update_post_term_count',
        		'query_var' => true,
        		'rewrite' => array( 'slug' => $setup3_pointposttype_pt5p,'hierarchical'=>true ),
                'show_in_rest' => true
        	  ));
        	  
        }
    /**
    *End: Locations Taxonomy
    **/ 
    	


    /**
    *Start: Features Taxonomy
    **/	

        if($setup3_pointposttype_pt6_check == 1){
        	  $labels = array(
        		'name' => ''.$setup3_pointposttype_pt6.'',
        		'singular_name' => ''.$setup3_pointposttype_pt6.'',
        		'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pointposttype_pt6),
        		'popular_items' => sprintf(esc_html__( 'Popular %s', 'pointfindert2d' ),$setup3_pointposttype_pt6),
        		'all_items' => sprintf(esc_html__( 'All %s', 'pointfindert2d' ),$setup3_pointposttype_pt6),
        		'parent_item' => null,
        		'parent_item_colon' => null,
        		'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pointposttype_pt6s),
        		'update_item' => sprintf(esc_html__( 'Update %s', 'pointfindert2d' ),$setup3_pointposttype_pt6s),
        		'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pointposttype_pt6s),
        		'new_item_name' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pointposttype_pt6s),
        		'separate_items_with_commas' => sprintf(esc_html__( 'Separate %s with commas', 'pointfindert2d' ),$setup3_pointposttype_pt6),
        		'add_or_remove_items' => sprintf(esc_html__( 'Add or remove %s', 'pointfindert2d' ),$setup3_pointposttype_pt6s),
        		'choose_from_most_used' => sprintf(esc_html__( 'Choose from the most used %s', 'pointfindert2d' ),$setup3_pointposttype_pt6s),
        		'menu_name' => ''.$setup3_pointposttype_pt6.'',
        	  ); 

        	  register_taxonomy('pointfinderfeatures',''.$setup3_pointposttype_pt1.'',array(
        		'hierarchical' => true,
        		'labels' => $labels,
        		'show_ui' => true,
        		'show_admin_column' => false,
                'show_in_nav_menus' => true,
        		'update_count_callback' => '_update_post_term_count',
        		'query_var' => true,
        		'rewrite' => array( 'slug' => $setup3_pointposttype_pt6p,'hierarchical'=>true ),
                'show_in_rest' => true
        	  ));
          

        	}
        	 
    /**
    *End: Features Taxonomy
    **/



    /**
    *Start: Conditions Taxonomy
    **/ 

        if($setup3_pt14_check == 1){
              $labels = array(
                'name' => ''.$setup3_pt14.'',
                'singular_name' => ''.$setup3_pt14.'',
                'search_items' =>  sprintf(esc_html__( 'Search %s', 'pointfindert2d' ),$setup3_pt14),
                'popular_items' => sprintf(esc_html__( 'Popular %s', 'pointfindert2d' ),$setup3_pt14),
                'all_items' => sprintf(esc_html__( 'All %s', 'pointfindert2d' ),$setup3_pt14),
                'parent_item' => null,
                'parent_item_colon' => null,
                'edit_item' => sprintf(esc_html__( 'Edit %s', 'pointfindert2d' ),$setup3_pt14s),
                'update_item' => sprintf(esc_html__( 'Update %s', 'pointfindert2d' ),$setup3_pt14s),
                'add_new_item' => sprintf(esc_html__( 'Add New %s', 'pointfindert2d' ),$setup3_pt14s),
                'new_item_name' => sprintf(esc_html__( 'New %s', 'pointfindert2d' ),$setup3_pt14s),
                'separate_items_with_commas' => sprintf(esc_html__( 'Separate %s with commas', 'pointfindert2d' ),$setup3_pt14),
                'add_or_remove_items' => sprintf(esc_html__( 'Add or remove %s', 'pointfindert2d' ),$setup3_pt14s),
                'choose_from_most_used' => sprintf(esc_html__( 'Choose from the most used %s', 'pointfindert2d' ),$setup3_pt14s),
                'menu_name' => ''.$setup3_pt14.'',
              ); 

              register_taxonomy('pointfinderconditions',''.$setup3_pointposttype_pt1.'',array(
                'hierarchical' => true,
                'labels' => $labels,
                'show_ui' => true,
                'show_admin_column' => false,
                'show_in_nav_menus' => true,
                'update_count_callback' => '_update_post_term_count',
                'query_var' => true,
                'rewrite' => array( 'slug' => $setup3_pt14p,'hierarchical'=>true ),
                'show_in_rest' => true
              ));
          

            }
             
    /**
    *End: Conditions Taxonomy
    **/


}

/* Disable parent selection for conditions */
add_action('init', 'create_post_type_pointfinder',0);
?>