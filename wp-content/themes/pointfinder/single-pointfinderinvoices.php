<?php 
	
	$post_id = get_the_id();
	$current_user = wp_get_current_user();

	/*Check invoice if belongs to this user.*/
	if (isset($current_user->ID)) {
		$current_user_id = $current_user->ID;

		if(function_exists('icl_t')) {
			$lang = PF_current_language();
			$post_id = apply_filters( 'wpml_object_id', $post_id, 'pointfinderinvoices',false,''.$lang.'' );
		}
		
		global $wpdb;
		$post_author = $wpdb->get_var($wpdb->prepare("SELECT post_author FROM $wpdb->posts WHERE post_type = %s and ID = %d",'pointfinderinvoices',$post_id));
		$post_status = $wpdb->get_var($wpdb->prepare("SELECT post_status FROM $wpdb->posts WHERE post_type = %s and ID = %d",'pointfinderinvoices',$post_id));

		if (($post_author == $current_user_id)) {
			if ($post_status != 'pendingpayment') {
				get_template_part('/admin/estatemanagement/includes/functions/invoice','functions' );
				echo pointfinder_invoicesystem_template_html(array('invoiceid'=>$post_id,'userid'=>$current_user_id));
			}else{
				echo '<div style="margin-top:30px;margin-left:auto;margin-right:auto;width: 100%;text-align: center;font-family: Arial;">'.esc_html__("Sorry this invoice not ready yet. Please complete payment.","pointfindert2d").'</div>';
			}
		}elseif(current_user_can('activate_plugins')){
			if ($post_status != 'pendingpayment') {
				get_template_part('/admin/estatemanagement/includes/functions/invoice','functions' );
				echo pointfinder_invoicesystem_template_html(array('invoiceid'=>$post_id,'userid'=>$post_author));
			}else{
				echo '<div style="margin-top:30px;margin-left:auto;margin-right:auto;width: 100%;text-align: center;font-family: Arial;">'.esc_html__("Sorry this invoice not ready yet. Please complete payment.","pointfindert2d").'</div>';
			}
		}else{PFPageNotFound();}
	}else{PFPageNotFound();}
			
?>