<?php
/**********************************************************************************************************************************
*
* Ajax Search Elements GET
* 
* Author: Webbu Design
*
***********************************************************************************************************************************/


add_action( 'PF_AJAX_HANDLER_pfget_searchitems', 'pf_ajax_searchitems' );
add_action( 'PF_AJAX_HANDLER_nopriv_pfget_searchitems', 'pf_ajax_searchitems' );

function pf_ajax_searchitems(){
  
	//Security
	check_ajax_referer( 'pfget_searchitems', 'security');
  
	header('Content-Type: text/html; charset=UTF-8;');

    $pflang = '';
    /* WPML - Current language fix */
    if(isset($_POST['cl']) && $_POST['cl']!=''){
        $pflang = esc_attr($_POST['cl']);
        if(function_exists('icl_t')) {
            if (!empty($pflang)) {
                do_action( 'wpml_switch_language', $pflang );
            }
        }
    }

    $output = '';

	if(isset($_POST['pfcat']) && $_POST['pfcat']!=''){
		$pfcat = sanitize_text_field($_POST['pfcat']);
	}

    $setup1s_slides = PFSAIssetControl('setup1s_slides','','');
    $formvals = '';
    if(is_array($setup1s_slides)){
        if(isset($_POST['formvals']) && $_POST['formvals']!=''){
			$formvals = esc_attr($_POST['formvals']);
		}

		if(isset($_POST['widget']) && $_POST['widget']!=''){
			$widget = sanitize_text_field($_POST['widget']);
		}

        if(isset($_POST['hor']) && $_POST['hor']!=''){
            $hormode = sanitize_text_field($_POST['hor']);
        }
       	
        $PFListSF = new PF_SFSUB_Val();
        foreach ($setup1s_slides as &$value) {
        
            $PFListSF->GetValue($value['title'],$value['url'],$value['select'],$widget,$formvals,$pfcat,$hormode,$pflang);
            
        }

        $pffieldlistout = $PFListSF->FieldOutput;

        if ($hormode == 1 && !empty($pffieldlistout)) {
             $output .= '<div class="pfadditional-filters col-lg-12 col-md-12 col-sm-12 hidden-xs">'.esc_html__('ADDITIONAL FILTERS','pointfindert2d').'</div>';
        }
       
        $output .= $pffieldlistout;
        if (!empty($pffieldlistout)) {
            $output .= '<script type="text/javascript">
            (function($) {
                "use strict";
                $(function(){
                '.$PFListSF->ScriptOutput;
                $output .= '
                });'.$PFListSF->ScriptOutputDocReady;

            $output .='   
                
            })(jQuery);
            </script>';
        }
        
        
        unset($PFListSF);
        echo pointfinder_sanitize_output($output);
    }
die();
}

?>