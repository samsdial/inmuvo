<?php

/**********************************************************************************************************************************
*
* Ajax Listing Types
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/

add_action( 'PF_AJAX_HANDLER_pfget_listingtype', 'pf_ajax_listingtype' );
add_action( 'PF_AJAX_HANDLER_nopriv_pfget_listingtype', 'pf_ajax_listingtype' );
	
	
function pf_ajax_listingtype(){
	
	check_ajax_referer( 'pfget_listingtype', 'security' );
	header('Content-Type: text/html; charset=UTF-8;');

	$id = $default = $lang = '';

	if(isset($_POST['id']) && $_POST['id']!=''){
		$id = sanitize_text_field($_POST['id']);
	}

	if(isset($_POST['lang']) && $_POST['lang']!=''){
		$lang = sanitize_text_field($_POST['lang']);
	}

	if(isset($_POST['default']) && $_POST['default']!=''){
		$default = sanitize_text_field($_POST['default']);
		if (strpos($default, ",")) {
			$default = pfstring2BasicArray($default);
		}
	}

	if(isset($_POST['sname']) && $_POST['sname']!=''){
		$sname = sanitize_text_field($_POST['sname']);
	}

	if(isset($_POST['stext']) && $_POST['stext']!=''){
		$stext = sanitize_text_field($_POST['stext']);
	}

	if(isset($_POST['stype']) && $_POST['stype']!=''){
		$stype = sanitize_text_field($_POST['stype']);
	}

	if(isset($_POST['stax']) && $_POST['stax']!=''){
		$stax = sanitize_text_field($_POST['stax']);
	}

	if(isset($_POST['multiple']) && $_POST['multiple']!=''){
		$multiple = sanitize_text_field($_POST['multiple']);
	}else{
		$multiple = 0;
	}

	/* WPML Fix */
	if(function_exists('icl_t')) {
		if (!empty($lang)) {
			do_action( 'wpml_switch_language', $lang );
		}
	}
	

	if (!empty($id) && !empty($sname) && !empty($stext)) {
		$as_mobile_dropdowns = PFASSIssetControl('as_mobile_dropdowns','','0');
		$fields_output_arr = array(
			'listname' => $sname,
	        'listtype' => $stype,
	        'listtitle' => $stext,
	        'listsubtype' => $stax,
	        'listdefault' => $default,
	        'listmultiple' => $multiple,
	        'parent' => $id,
	        'as_mobile_dropdowns' => $as_mobile_dropdowns
		);

		$output = Pointfinder_GET_LType_FUP($fields_output_arr);
		echo pointfinder_sanitize_output($output);
	}
	
	die();
}

?>