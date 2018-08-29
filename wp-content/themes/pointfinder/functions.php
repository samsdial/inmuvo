<?php

/**********************************************************************************************************************************
*
* PointFinder Functions
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/

load_theme_textdomain( 'pointfindert2d',get_template_directory() . '/languages');
try {session_start();} catch (Exception $e) {}

/*------------------------------------
	Theme Support
------------------------------------*/
if ( ! function_exists( 'pointfinder_setup' ) ){
	function pointfinder_setup() {
		if (!isset($content_width)){$content_width = 1170;}
		
		add_theme_support( 'automatic-feed-links' );
		add_theme_support( 'menus' );
		add_theme_support( 'post-formats', array( 'aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat' ) );
	    add_theme_support('post-thumbnails');

	    add_theme_support( 'bbpress' );
	    add_theme_support( 'woocommerce' );
		add_theme_support( 'html5', array('search-form', 'comment-form', 'comment-list',) );

		if ( ! function_exists( '_wp_render_title_tag' ) ) {
		    add_action( 'wp_head', 'pf_theme_render_title');
		}
		add_theme_support( 'title-tag' );

		register_nav_menus(array( 
			'pointfinder-main-menu' => esc_html__('Point Finder Main Menu', 'pointfindert2d'),
			'pointfinder-footer-menu' => esc_html__('Point Finder Footer Menu', 'pointfindert2d')
	    ));

	    global $pointfinderltypes_fevars;
	    $pointfinderltypes_fevars = get_option('pointfinderltypes_fevars');

	}
};
add_action('after_setup_theme', 'pointfinder_setup');

/*------------------------------------
  Options Panel & Common functions
------------------------------------*/ 
require_once( get_template_directory(). '/admin/estatemanagement/includes/pages/dashboard/dashboard-ipnlistener.php');

add_action( 'wp', 'pointfinder_dashboard_page_check');
function pointfinder_dashboard_page_check(){
	$setup4_membersettings_dashboard = PFSAIssetControl('setup4_membersettings_dashboard','','');
	if (is_page($setup4_membersettings_dashboard)) {
		require_once( get_template_directory(). '/admin/estatemanagement/includes/pages/dashboard/dashboard-frontend.php');
	}
}

require_once( get_template_directory(). '/admin/core/admin-welcomepf.php' );


/* Geo Filter */
require_once( get_template_directory().'/admin/core/geofilter.php');

/* Quick Install */
require_once( get_template_directory() .'/admin/quick_setup/ajax-process.php' ); 
if(is_admin()){
	$is_pfsetup_done = get_option('pf_quick_setup');
	if (isset($is_pfsetup_done) && $is_pfsetup_done != 1) {
		require_once( get_template_directory() .'/admin/quick_setup/importer/radium-importer.php' ); 
		require_once( get_template_directory(). '/admin/quick_setup/init.php' );
	}
}
require_once( get_template_directory(). '/admin/estatemanagement/includes/functions/common-functions.php' );


if (class_exists('ReduxFramework')) {

	require_once( get_template_directory(). '/admin/options/PointfinderOptions.config.php' ); 
	require_once( get_template_directory(). '/admin/options/Metabox.config.php' );
	require_once( get_template_directory(). '/admin/options/PointfinderOptionsFMB.config.php' );
	require_once( get_template_directory(). '/admin/options/PFASControl.config.php' );
	require_once( get_template_directory(). '/admin/options/PFPBControl.config.php' );
	require_once( get_template_directory(). '/admin/options/CustomFields.config.php' );
	require_once( get_template_directory(). '/admin/options/SearchFields.config.php' );
	require_once( get_template_directory(). '/admin/options/MailSystem.config.php' );
	require_once( get_template_directory(). '/admin/options/SidebarGenerator.config.php' );
	require_once( get_template_directory(). '/admin/options/TwitterWidget.config.php' );
	require_once( get_template_directory(). '/admin/options/rCaptcha.config.php' );
	require_once( get_template_directory(). '/admin/options/ReviewSystem.config.php' );
	require_once( get_template_directory(). '/admin/options/PFSizeControl.config.php' );
	require_once( get_template_directory(). '/admin/options/PFPGControl.config.php' );

	if(!function_exists('pointfinder_custompoints_filter')){
		function pointfinder_custompoints_filter(){
			if (PFASSIssetControl('st8_npsys','',0) != 1) {
				require_once( get_template_directory(). '/admin/options/CustomPoints.config.php' );
			}
			if (PFASSIssetControl('st8_nasys','',0) != 1) {
				require_once( get_template_directory(). '/admin/options/PFAdvancedControl.config.php' );
			}
		}
	}
	add_action('init', 'pointfinder_custompoints_filter',10);
	
}	

/* VC includes */
if(function_exists('vc_set_as_theme')){
	require_once( get_template_directory().'/admin/includes/vcextend/pfvisualcomposeraddons.php');
	require_once( get_template_directory().'/admin/includes/vcextend/pfvisualcomposertemplates.php');
	require_once( get_template_directory().'/admin/includes/vcextend/vc_customfields.php');
	require_once( get_template_directory().'/admin/includes/vcextend/vc_extend.php');

	$setup3_pointposttype_pt6_status = PFSAIssetControl('setup3_pointposttype_pt6_status','','1');
	if ($setup3_pointposttype_pt6_status == 1) {
		require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-list-agents.php');
	}
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf_text_separator.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf_pfitem_carousel.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-grid-shortcodes.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-grid-shortcodes-static.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-map-shortcodes.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-half-map-shortcodes.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-cmap-shortcodes.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-cform-shortcodes.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-directorylist.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-locationlist.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-itemslider-shortcodes.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-search.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/vc_client_carousel.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/vc_testimonials.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/vc_pfinfobox.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-tiled-listing-type.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-tiled-locations.php');
	require_once( get_template_directory().'/admin/includes/vcextend/customshortcodes/pf-icon.php');
	
}


/*------------------------------------
	External Modules/Files
------------------------------------*/

/* Taxonomies & CPT Metaboxes */

if ( ! defined( 'RWMB_DIR' ) ){define( 'RWMB_DIR', get_template_directory() . '/admin/estatemanagement/meta-box-master/' );}
if ( ! defined( 'RWMB_URL' ) ){define( 'RWMB_URL', get_template_directory_uri() . '/admin/estatemanagement/meta-box-master/' );}

require_once( get_template_directory().'/admin/estatemanagement/meta-box-master/meta-box.php');

require_once( get_template_directory().'/admin/estatemanagement/taxonomymeta/taxonomy-meta.php');

require_once( get_template_directory().'/admin/estatemanagement/pointfinder-metabox.php');
require_once( get_template_directory().'/admin/estatemanagement/pointfinder-metabox-ex.php');
require_once( get_template_directory().'/admin/estatemanagement/taxonomymeta/locations.php');

$setup3_pointposttype_pt6_check = PFSAIssetControl('setup3_pointposttype_pt6_check','','1');
if($setup3_pointposttype_pt6_check == 1){
	require_once( get_template_directory().'/admin/core/new-features-pt.php');
}

require_once( get_template_directory().'/admin/estatemanagement/post-types.php');
if(is_admin()){require_once( get_template_directory().'/admin/estatemanagement/post-type-additionals.php');}
require_once( get_template_directory().'/admin/core/aq_resizer.php');


if ( is_active_widget( false, '', 'pf_twitter_w', true ) ) {
	require_once( get_template_directory().'/admin/core/ajax-grabtweets.php');
}

$setup4_membersettings_paymentsystem = PFSAIssetControl('setup4_membersettings_paymentsystem','','1');
if ($setup4_membersettings_paymentsystem == 2) {
	require_once( get_template_directory(). '/admin/estatemanagement/membership_packages.php' );
}else{
	require_once( get_template_directory(). '/admin/estatemanagement/ppp_packages.php' );
}

require_once( get_template_directory().'/admin/estatemanagement/includes/functions/query-builder.php');
require_once( get_template_directory().'/admin/core/scripts.php');
require_once( get_template_directory().'/admin/core/hooks.php');
require_once( get_template_directory().'/admin/core/filters.php');
require_once( get_template_directory().'/admin/core/megamenu.php');
require_once( get_template_directory().'/admin/core/dynamic_css.php');

if(is_admin()){
	require_once( get_template_directory().'/admin/tgm/plugins.php');
	require_once( get_template_directory().'/admin/core/admin-rgs.php' );
	require_once( get_template_directory().'/admin/core/pfapi/pointfinder-main.php' );
	require_once( get_template_directory().'/admin/core/admin-dash.php');
}


if (PFRECIssetControl('setupreCaptcha_general_status','','0') == 1) {
	require_once( get_template_directory().'/admin/core/recaptchalib.php');
}


require_once( get_template_directory().'/admin/includes/pfgetcustomfields.php');
require_once( get_template_directory().'/admin/includes/pfgetsearchfields.php');
require_once( get_template_directory().'/admin/includes/pfgetsubsearchfields.php');
require_once( get_template_directory().'/admin/includes/pfcustomwidgets.php');


require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-infowindow.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-taxpoint.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-poidata.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-listdata.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-modalsystem.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-modalsystemhandler.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-reportsystem.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-searchitems.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-featuresfilter.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-claimsystem.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-autocomplete.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-autocomplete-sa.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-ownerworks.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-listingtypelimits.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-listingtypes.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-featuresystem.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-getuserforchange.php');

if($setup4_membersettings_paymentsystem == 2){
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-membershipsystem.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-membershippaymentsystem.php');
}

if (PFREVSIssetControl('setup11_reviewsystem_check','','0') == 1) {
	require_once( get_template_directory().'/admin/estatemanagement/includes/functions/review-functions.php');
	require_once( get_template_directory().'/admin/estatemanagement/review-metabox.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/functions/modified-review-functions.php');
}
require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-revflagsystem.php');

require_once( get_template_directory().'/admin/estatemanagement/includes/functions/additional-cpt-statusses.php');
require_once( get_template_directory().'/admin/estatemanagement/includes/functions/mailsender-functions.php');

if(PFSAIssetControl('setup4_membersettings_loginregister','','1') == 1){

	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-imageupload.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-imagesystem.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-filesystem.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-fileupload.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-usersystem.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-paymentsystem.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-usersystemhandler.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-favoritesystem.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/user-profilemods.php');
	require_once( get_template_directory().'/admin/estatemanagement/includes/modules/social-logins.php');

	if(PFSAIssetControl('setup4_membersettings_frontend','','1') == 1){
		require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-onoffsystem.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-listingpaymentsystem.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-posttag.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/functions/common-user-functions.php' );
		require_once( get_template_directory().'/admin/estatemanagement/includes/modules/paypall-class.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/functions/modified-functions.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/functions/statuschange-functions.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/schedule-config.php');
		require_once( get_template_directory().'/admin/estatemanagement/payment-metabox.php');
		require_once( get_template_directory().'/admin/estatemanagement/invoices-metabox.php');

		require_once( get_template_directory().'/admin/estatemanagement/includes/pages/dashboard/dashboard-functions.php');
		require_once( get_template_directory().'/admin/estatemanagement/includes/ajax/ajax-itemsystem.php');

		add_filter( 'body_class', 'pointfinder_body_class_filter' );
		if(!function_exists('pointfinder_body_class_filter')){
			function pointfinder_body_class_filter( $classes ) {
				$setup4_membersettings_dashboard = PFSAIssetControl('setup4_membersettings_dashboard','','');
			    if ( is_page($setup4_membersettings_dashboard) ) {
			    	if(isset($_GET['ua'])){ $ua_action = esc_attr($_GET['ua']);}else{$ua_action ='';}
			    	if ($ua_action == 'newitem' || $ua_action == 'edititem') {
			    		$classes[] = 'pfdashboardpagenewedit';
			    	}else{
			    		$classes[] = 'pfdashboardpage';
			    	}
			    }
			    return $classes;
			}
		}
	}    
}



remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
add_action('wp_enqueue_scripts', 'pf_styleandscripts'); 
add_action('get_header', 'pf_enable_threaded_comments'); 
add_action('widgets_init', 'pointfinder_remove_recent_comments_style'); 
add_action('widgets_init', 'pointfinder_widgets_init',0 );
add_action('admin_enqueue_scripts','pf_admin_styleandscripts',10);

add_filter('avatar_defaults', 'pointfindert2dgravatar'); 
add_filter('body_class', 'pf_add_slug_to_body_class');
add_filter('widget_text', 'do_shortcode'); 
add_filter('widget_text', 'shortcode_unautop');
add_filter('wp_nav_menu_args', 'pointfinder_wp_nav_menu_args');
add_filter('the_category', 'pf_remove_category_rel_from_category_list'); 
add_filter('the_excerpt', 'shortcode_unautop'); 
add_filter('the_excerpt', 'do_shortcode'); 
add_filter('style_loader_tag', 'pointfinderh_style_remove');
add_filter('post_thumbnail_html', 'pointfinder_remove_thumbnail_dimensions', 10); 
add_filter('image_send_to_editor', 'pointfinder_remove_thumbnail_dimensions', 10);