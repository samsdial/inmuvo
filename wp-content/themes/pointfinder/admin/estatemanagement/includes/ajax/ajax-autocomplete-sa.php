<?php

/**********************************************************************************************************************************
*
* Ajax Auto Complete Fixed Field
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/


add_action( 'PF_AJAX_HANDLER_pfget_autocomplete_sa', 'pf_ajax_autocomplete_sa' );
add_action( 'PF_AJAX_HANDLER_nopriv_pfget_autocomplete_sa', 'pf_ajax_autocomplete_sa' );
	
	
function pf_ajax_autocomplete_sa(){
	//Security
	check_ajax_referer( 'pfget_autocomplete', 'security' );
	header('Content-Type: application/json;');
	

	if(isset($_POST['lang']) && $_POST['lang']!=''){
        $pflang = esc_attr($_POST['lang']);
    }

	if(function_exists('icl_t')) {
        if (!empty($pflang)) {
            do_action( 'wpml_switch_language', $pflang );
        }
    }

	//Get form type 
	if(isset($_POST['fslug']) && $_POST['fslug']!=''){
		$fslug = sanitize_text_field($_POST['fslug']);
	}

	//Get search key
	if(isset($_POST['q']) && $_POST['q']!=''){
		$searchword = sanitize_text_field($_POST['q']);
	}


	$setup3_pointposttype_pt1 = PFSAIssetControl('setup3_pointposttype_pt1','','pfitemfinder');

	/* Get field Settings */
	$pf_searchall_title = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_title','','0');
	$pf_searchall_desc = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_content','','0');
	$pf_searchall_listingtype = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_lt','','0');
	$pf_searchall_itemtypes = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_it','','0');
	$pf_searchall_locations = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_loc','','0');
	$pf_searchall_features = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_fea','','0');
	$pf_searchall_tags = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_tags','','0');
	$searchall_click = PFSFIssetControl('setupsearchfields_'.$fslug.'_searchall_click','','0');


	/* Empty Keyword Sending & Show Listing Types & Die */
	if (empty($searchword)) {
		if (!empty($searchall_click)) {
			$output_listingtypes = array();
			$args = array(
			    'orderby'           => 'name', 
			    'order'             => 'ASC',
			    'hide_empty'        => false, 
			    'exclude'           => array(), 
			    'exclude_tree'      => array(), 
			    'include'           => array(),
			    'number'            => 15, 
			    'fields'            => 'all', 
			    'slug'              => '',
			    'parent'            => 0,
			    'hierarchical'      => true, 
			    'child_of'          => 0, 
			    'get'               => '', 
			    'name__like'        => '',
			    'description__like' => '',
			    'pad_counts'        => false, 
			    'offset'            => '',
			    'taxonomy'			=> array('pointfinderltypes'),
			    'cache_domain'      => 'core'
			); 

			$terms = get_terms('pointfinderltypes', $args);
			if(is_array($terms)){shuffle( $terms );}
			foreach ($terms as $term_val) {
				$output_listingtypes[] = array('name' => urldecode($term_val->name),'id' => $term_val->term_id);
			}

			echo json_encode(array(
			    "data"      => array(
			        "pointfinderltypes" => $output_listingtypes
			    )
			));
			die();
		}
	}


	/* Keyword received. Find all. */

		/* Title & Description */
			$output_arr_listings = array();
			if (!empty($pf_searchall_title) || !empty($pf_searchall_desc)) {

				$args = array( 'post_type' => $setup3_pointposttype_pt1, 'post_status' => 'publish','posts_per_page' => 5);
				$args['orderby'] = 'title';
				$args['order'] = 'ASC';

				if (!empty($pf_searchall_title) && !(!empty($pf_searchall_title) && !empty($pf_searchall_desc))) {
					$args['search_prod_title'] = $searchword;
				}

				if (!empty($pf_searchall_desc) && !(!empty($pf_searchall_title) && !empty($pf_searchall_desc))) {
					$args['search_prod_desc'] = $searchword;
				}

				if (!empty($pf_searchall_title) && !empty($pf_searchall_desc)) {
					$args['search_prod_desc_title'] = $searchword;
				}

				$the_query = new WP_Query( $args );
					
				if ( $the_query->have_posts() ) :
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$output_arr_listings[] = html_entity_decode(get_the_title());
				 	endwhile;
				 	wp_reset_postdata();
				endif;
			}

		/* Listing Types */
			$output_listingtypes = array();
			if (!empty($pf_searchall_listingtype)) {
				$args = array(
				    'orderby'           => 'name', 
				    'order'             => 'ASC',
				    'hide_empty'        => false, 
				    'exclude'           => array(), 
				    'exclude_tree'      => array(), 
				    'include'           => array(),
				    'number'            => 15, 
				    'fields'            => 'all', 
				    'slug'              => '',
				    'parent'            => '',
				    'hierarchical'      => true, 
				    'child_of'          => 0, 
				    'get'               => '', 
				    'name__like'        => '',
				    'description__like' => '',
				    'pad_counts'        => false, 
				    'offset'            => '',
				    'taxonomy'			=> array('pointfinderltypes'),
				    'search'			=> $searchword,
				    'cache_domain'      => 'core'
				); 

				$terms = get_terms('pointfinderltypes', $args);
				if(is_array($terms)){shuffle( $terms );}
				foreach ($terms as $term_val) {
					if (!empty($term_val->name)) {
						$output_listingtypes[] = array('name' => urldecode($term_val->name),'id' => $term_val->term_id);
					}
				}
			}

		/* Item Types */
			$output_itemtypes = array();
			if (!empty($pf_searchall_itemtypes)) {
				$args = array(
				    'orderby'           => 'name', 
				    'order'             => 'ASC',
				    'hide_empty'        => false, 
				    'exclude'           => array(), 
				    'exclude_tree'      => array(), 
				    'include'           => array(),
				    'number'            => 15, 
				    'fields'            => 'all', 
				    'slug'              => '',
				    'parent'            => '',
				    'hierarchical'      => true, 
				    'child_of'          => 0, 
				    'get'               => '', 
				    'name__like'        => '',
				    'description__like' => '',
				    'pad_counts'        => false, 
				    'offset'            => '',
				    'taxonomy'			=> array('pointfinderitypes'),
				    'search'			=> $searchword,
				    'cache_domain'      => 'core'
				); 

				$terms = get_terms('pointfinderitypes', $args);
				if(is_array($terms)){shuffle( $terms );}
				foreach ($terms as $term_val) {
					if (!empty($term_val->name)) {
						$output_itemtypes[] = array('name' => urldecode($term_val->name),'id' => $term_val->term_id);
					}
				}
			}

		/* Locations */
			$output_locations = array();
			if (!empty($pf_searchall_locations)) {
				$args = array(
				    'orderby'           => 'name', 
				    'order'             => 'ASC',
				    'hide_empty'        => false, 
				    'exclude'           => array(), 
				    'exclude_tree'      => array(), 
				    'include'           => array(),
				    'number'            => 15, 
				    'fields'            => 'all', 
				    'slug'              => '',
				    'parent'            => '',
				    'hierarchical'      => true, 
				    'child_of'          => 0, 
				    'get'               => '', 
				    'name__like'        => '',
				    'description__like' => '',
				    'pad_counts'        => false, 
				    'offset'            => '',
				    'taxonomy'			=> array('pointfinderlocations'),
				    'search'			=> $searchword,
				    'cache_domain'      => 'core'
				); 

				$terms = get_terms('pointfinderlocations', $args);
				if(is_array($terms)){shuffle( $terms );}
				foreach ($terms as $term_val) {
					if (!empty($term_val->name)) {
						$output_locations[] = array('name' => urldecode($term_val->name),'id' => $term_val->term_id);
					}
				}
			}

		/* Features */
			$output_features = array();
			if (!empty($pf_searchall_features)) {
				$args = array(
				    'orderby'           => 'name', 
				    'order'             => 'ASC',
				    'hide_empty'        => false, 
				    'exclude'           => array(), 
				    'exclude_tree'      => array(), 
				    'include'           => array(),
				    'number'            => 15, 
				    'fields'            => 'all', 
				    'slug'              => '',
				    'parent'            => '',
				    'hierarchical'      => true, 
				    'child_of'          => 0, 
				    'get'               => '', 
				    'name__like'        => '',
				    'description__like' => '',
				    'pad_counts'        => false, 
				    'offset'            => '',
				    'taxonomy'			=> array('pointfinderfeatures'),
				    'search'			=> $searchword,
				    'cache_domain'      => 'core'
				); 

				$terms = get_terms('pointfinderfeatures', $args);
				if(is_array($terms)){shuffle( $terms );}
				foreach ($terms as $term_val) {
					if (!empty($term_val->name)) {
						$output_features[] = array('name' => urldecode($term_val->name),'id' => $term_val->term_id);
					}
				}
			}

		/* Tags */
			$output_post_tags = array();
			if (!empty($pf_searchall_tags)) {
				$args = array(
				    'orderby'           => 'name', 
				    'order'             => 'ASC',
				    'hide_empty'        => false, 
				    'exclude'           => array(), 
				    'exclude_tree'      => array(), 
				    'include'           => array(),
				    'number'            => 15, 
				    'fields'            => 'all', 
				    'slug'              => '',
				    'parent'            => '',
				    'hierarchical'      => true, 
				    'child_of'          => 0, 
				    'get'               => '', 
				    'name__like'        => '',
				    'description__like' => '',
				    'pad_counts'        => false, 
				    'offset'            => '',
				    'taxonomy'			=> array('post_tags'),
				    'search'			=> $searchword,
				    'cache_domain'      => 'core'
				); 

				$terms = get_terms('post_tags', $args);
				if(is_array($terms)){shuffle( $terms );}
				foreach ($terms as $term_val) {
					if (!empty($term_val->name)) {
						$output_post_tags[] = array('name' => urldecode($term_val->name),'id' => $term_val->term_id);
					}
				}
			}
	
		echo json_encode(array(
		    "data"      => array(
		        "listings"   => $output_arr_listings,
		        "pointfinderltypes"	  => $output_listingtypes,
		        "pointfinderitypes" => $output_itemtypes,
		        "pointfinderlocations" => $output_locations,
		        "pointfinderfeatures" => $output_features,
		        "post_tags" => $output_post_tags,
		    )
		));
	die();
}

?>