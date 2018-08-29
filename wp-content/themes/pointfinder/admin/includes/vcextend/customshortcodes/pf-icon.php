<?php

if(!class_exists('Pointfinder_Icons'))
{
	class Pointfinder_Icons
	{
		function __construct()
		{

			add_action('init',array($this,'pointfinder_icon_init'));
			
			add_shortcode('pointfinder_icons',array($this,'pointfinder_icons_shortcode'));
			add_shortcode('pointfinder_single_icon',array($this,'pointfinder_single_icon_shortcode'));
		}
		function pointfinder_icon_init()
		{
			if(function_exists('vc_map'))
			{
				vc_map(
					array(
						"name" => __("PF Icons","pointfindert2d"),
						"base" => "pointfinder_icons",
						"class" => "pointfinder_icons",
						"icon" => "pointfinder_icons",
						"category" => "Point Finder",
						"description" => __("Add a set of multiple icons and give some custom style.","pointfindert2d"),
						"as_parent" => array('only' => 'pointfinder_single_icon'), 
						"content_element" => true,
						"show_settings_on_create" => true,
						//"is_container"    => true,
						"js_view" => 'VcColumnView',
						"params" => array(
							// Play with icon selector
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Alignment","pointfindert2d"),
								"param_name" => "align",
								"value" => array(
									__("Left Align","pointfindert2d") => "uavc-icons-left",
									__("Right Align","pointfindert2d") => "uavc-icons-right",
									__("Center Align","pointfindert2d") => "uavc-icons-center"
								),
								//"description" => __("", "smile"),
							),
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Extra Class","pointfindert2d"),
								"param_name" => "el_class",
								"value" => "",
								"description" => __("Write your own CSS and mention the class name here.", "pointfindert2d"),
							),
							array(
					            'type' => 'css_editor',
					            'heading' => __( 'Css', 'pointfindert2d' ),
					            'param_name' => 'css_icon',
					            'group' => __( 'Design', 'pointfindert2d' ),
					            'edit_field_class' => 'vc_col-sm-12 vc_column no-vc-background no-vc-border creative_link_css_editor',
					        ),
						)
					)
				);
				vc_map(
					array(
					   "name" => __("Icon Item"),
					   "base" => "pointfinder_single_icon",
					   "class" => "vc_pf_icon",
					   "icon" => "vc_pf_icon",
					   "category" => "Point Finder",
					   "description" => __("Add a set of multiple icons and give some custom style.","pointfindert2d"),
					   "as_child" => array('only' => 'pointfinder_icons'), 
					   "show_settings_on_create" => true,
					   "is_container"    => false,
					   "params" => array(
							array(
								"type" => "icon_manager",
								"class" => "",
								"heading" => __("Select Icon ","pointfindert2d"),
								"param_name" => "icon",
								"value" => "",
								"admin_label" => true,
								"description" => __("Click and select icon of your choice. If you can't find the one that suits for your purpose","pointfindert2d").", ".__("you can","pointfindert2d")." <a href='admin.php?page=bsf-font-icon-manager' target='_blank' rel='noopener'>".__("add new here","pointfindert2d")."</a>.",
								"group"=> "Select Icon",
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Size of Icon", "pointfindert2d"),
								"param_name" => "icon_size",
								"value" => 32,
								"min" => 12,
								"max" => 72,
								"suffix" => "px",
								"description" => __("How big would you like it?", "pointfindert2d"),
								"group"=> "Select Icon",
							),
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Text of Icon", "pointfindert2d"),
								"param_name" => "icon_subtext",
								"value" => '',
								"description" => __("Do you want to add a text under icon?", "pointfindert2d"),
								"group"=> "Select Icon",
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Text Size", "pointfindert2d"),
								"param_name" => "icon_fontsize",
								"value" => 14,
								"min" => 9,
								"max" => 72,
								"suffix" => "px",
								"description" => __("Please write only number like 14", "pointfindert2d"),
								"group"=> "Select Icon",
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Space after Icon", "pointfindert2d"),
								"param_name" => "icon_margin",
								"value" => 5,
								"min" => 0,
								"max" => 100,
								"suffix" => "px",
								"description" => __("How much distance would you like in two icons?", "pointfindert2d"),
								"group" => "Other Settings"
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Color", "pointfindert2d"),
								"param_name" => "icon_color",
								"value" => "#333333",
								"description" => __("Give it a nice paint!", "pointfindert2d"),
								"group"=> "Select Icon",
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon Style", "pointfindert2d"),
								"param_name" => "icon_style",
								"value" => array(
									__("Simple","pointfindert2d") => "none",
									__("Circle Background","pointfindert2d") => "circle",
									__("Square Background","pointfindert2d") => "square",
									__("Design your own","pointfindert2d") => "advanced",
								),
								"description" => __("We have given three quick preset if you are in a hurry. Otherwise, create your own with various options.", "pointfindert2d"),
								"group" => "Select Icon"
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Background Color", "pointfindert2d"),
								"param_name" => "icon_color_bg",
								"value" => "#ffffff",
								"description" => __("Select background color for icon.", "pointfindert2d"),
								"dependency" => Array("element" => "icon_style", "value" => array("circle","square","advanced")),
								"group" => "Select Icon"
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Icon Border Style", "pointfindert2d"),
								"param_name" => "icon_border_style",
								"value" => array(
									__("None","pointfindert2d")=> "",
									__("Solid","pointfindert2d")=> "solid",
									__("Dashed","pointfindert2d") => "dashed",
									__("Dotted","pointfindert2d") => "dotted",
									__("Double","pointfindert2d") => "double",
									__("Inset","pointfindert2d") => "inset",
									__("Outset","pointfindert2d") => "outset",
								),
								"description" => __("Select the border style for icon.","pointfindert2d"),
								"dependency" => Array("element" => "icon_style", "value" => array("advanced")),
								"group" => "Select Icon"
							),
							array(
								"type" => "colorpicker",
								"class" => "",
								"heading" => __("Border Color", "pointfindert2d"),
								"param_name" => "icon_color_border",
								"value" => "#333333",
								"description" => __("Select border color for icon.", "pointfindert2d"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
								"group" => "Select Icon"
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Width", "pointfindert2d"),
								"param_name" => "icon_border_size",
								"value" => 1,
								"min" => 1,
								"max" => 10,
								"suffix" => "px",
								"description" => __("Thickness of the border.", "pointfindert2d"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
								"group" => "Select Icon"
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Border Radius", "pointfindert2d"),
								"param_name" => "icon_border_radius",
								"value" => 500,
								"min" => 1,
								"max" => 500,
								"suffix" => "px",
								"description" => __("0 pixel value will create a square border. As you increase the value, the shape convert in circle slowly. (e.g 500 pixels).", "pointfindert2d"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
								"group" => "Select Icon"
							),
							array(
								"type" => "number",
								"class" => "",
								"heading" => __("Background Size", "pointfindert2d"),
								"param_name" => "icon_border_spacing",
								"value" => 50,
								"min" => 30,
								"max" => 500,
								"suffix" => "px",
								"description" => __("Spacing from center of the icon till the boundary of border / background", "pointfindert2d"),
								"dependency" => Array("element" => "icon_border_style", "not_empty" => true),
								"group" => "Select Icon"
							),
							array(
								"type" => "vc_link",
								"class" => "",
								"heading" => __("Link ","pointfindert2d"),
								"param_name" => "icon_link",
								"value" => "",
								"description" => __("Add a custom link or select existing page. You can remove existing link as well.","pointfindert2d"),
								"group" => "Other Settings"
							),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Animation","pointfindert2d"),
								"param_name" => "icon_animation",
								"value" => array(
							 		__("No Animation","pointfindert2d") => "",
									__("Swing","pointfindert2d") => "swing",
									__("Pulse","pointfindert2d") => "pulse",
									__("Fade In","pointfindert2d") => "fadeIn",
									__("Fade In Up","pointfindert2d") => "fadeInUp",
									__("Fade In Down","pointfindert2d") => "fadeInDown",
									__("Fade In Left","pointfindert2d") => "fadeInLeft",
									__("Fade In Right","pointfindert2d") => "fadeInRight",
									__("Fade In Up Long","pointfindert2d") => "fadeInUpBig",
									__("Fade In Down Long","pointfindert2d") => "fadeInDownBig",
									__("Fade In Left Long","pointfindert2d") => "fadeInLeftBig",
									__("Fade In Right Long","pointfindert2d") => "fadeInRightBig",
									__("Slide In Down","pointfindert2d") => "slideInDown",
									__("Slide In Left","pointfindert2d") => "slideInLeft",
									__("Slide In Left","pointfindert2d") => "slideInLeft",
									__("Bounce In","pointfindert2d") => "bounceIn",
									__("Bounce In Up","pointfindert2d") => "bounceInUp",
									__("Bounce In Down","pointfindert2d") => "bounceInDown",
									__("Bounce In Left","pointfindert2d") => "bounceInLeft",
									__("Bounce In Right","pointfindert2d") => "bounceInRight",
									__("Rotate In","pointfindert2d") => "rotateIn",
									__("Light Speed In","pointfindert2d") => "lightSpeedIn",
									__("Roll In","pointfindert2d") => "rollIn",
									),
								"description" => __("Like CSS3 Animations? We have several options for you!","pointfindert2d"),
								"group" => "Other Settings"
						  	),
							array(
								"type" => "dropdown",
								"class" => "",
								"heading" => __("Tooltip", "pointfindert2d"),
								"param_name" => "tooltip_disp",
								"value" => array(
									__("None","pointfindert2d")=> "",
									__("Tooltip from Left","pointfindert2d") => "left",
									__("Tooltip from Right","pointfindert2d") => "right",
									__("Tooltip from Top","pointfindert2d") => "top",
									__("Tooltip from Bottom","pointfindert2d") => "bottom",
								),
								"description" => __("Select the tooltip position","pointfindert2d"),
								"group" => "Other Settings"
							),
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Tooltip Text", "pointfindert2d"),
								"param_name" => "tooltip_text",
								"value" => "",
								"description" => __("Enter your tooltip text here.", "pointfindert2d"),
								"dependency" => Array("element" => "tooltip_disp", "not_empty" => true),
								"group" => "Other Settings"
							),
							array(
								"type" => "textfield",
								"class" => "",
								"heading" => __("Custom CSS Class", "pointfindert2d"),
								"param_name" => "el_class",
								"value" => "",
								"description" => __("Ran out of options? Need more styles? Write your own CSS and mention the class name here.", "pointfindert2d"),
								"group" => "Select Icon"
							),
						),
					)
				);
			}
		}
		// Shortcode handler function for stats Icon
		function pointfinder_icons_shortcode($atts,$content = null)
		{

			wp_enqueue_style('ultimate-animate');
			wp_enqueue_style('ultimate-tooltip');

			$align = $el_class = '';
			extract(shortcode_atts(array(
				'align' => '',
				'el_class' => '',
				'css_icon' =>'',
			),$atts));
			$icon_design_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, vc_shortcode_custom_css_class( $css_icon, ' ' ), "ultimate_icons", $atts );
 			
 			$output = '<div class="'.esc_attr($icon_design_css).' '.esc_attr($align).' uavc-icons '.esc_attr($el_class).'">';
			$output .= do_shortcode($content);
			$output .= '</div>';

			return $output;
		}

		function pointfinder_single_icon_shortcode($atts){

			$icon_type = $icon_img = $img_width = $icon = $icon_color = $icon_color_bg = $icon_size = $icon_style = $icon_border_style = $icon_border_radius = $icon_color_border = $icon_border_size = $icon_border_spacing = $icon_link = $el_class = $icon_animation =  $tooltip_disp = $tooltip_text = $icon_margin = $target = $link_title  = $rel = $stylepf = '';
			extract(shortcode_atts( array(
				'icon'=> '',
				'icon_size' => '',
				'icon_subtext' => '',
				'icon_fontsize' => '',
				'icon_color' => '',
				'icon_style' => '',
				'icon_color_bg' => '',
				'icon_color_border' => '',
				'icon_border_style' => '',
				'icon_border_size' => '',
				'icon_border_radius' => '',
				'icon_border_spacing' => '',
				'icon_link' => '',
				'icon_margin' => '',
				'icon_animation' => '',
				'tooltip_disp' => '',
				'tooltip_text' => '',
				'el_class'=>'',
			),$atts));
			$ultimate_js = get_option('ultimate_js');
			if(isset($tooltip_disp) && $tooltip_disp != '' && $ultimate_js != 'enable')
				wp_enqueue_script('ultimate-tooltip');

			if($icon_animation !== 'none')
			{
				$css_trans = 'data-animation="'.esc_attr($icon_animation).'" data-animation-delay="03"';
			}
			$output = $style = $link_sufix = $link_prefix = $target = $href = $icon_align_style = '';
			$uniqid = uniqid();
			$href 			= vc_build_link($icon_link);
			if($icon_link !== ''){
				if( $href['url'] != NULL ){
					$url 			= ( isset( $href['url'] ) && $href['url'] !== '' ) ? $href['url']  : '';
					$target 		= ( isset( $href['target'] ) && $href['target'] !== '' ) ? esc_attr( trim( $href['target'] ) ) : '';
					$link_title 	= ( isset( $href['title'] ) && $href['title'] !== '' ) ? esc_attr($href['title']) : '';
					$rel 			= ( isset( $href['rel'] ) && $href['rel'] !== '' ) ? esc_attr($href['rel']) : '';
					$link_prefix .= '<a class="aio-tooltip pfspcficon-output '.esc_attr($uniqid).'" '. Ultimate_VC_Addons::uavc_link_init($url, $target, $link_title, $rel ).' data-toggle="tooltip" data-placement="'.esc_attr($tooltip_disp).'" title="'.esc_attr($tooltip_text).'">';
					$link_sufix .= '</a>';
				}
			}
			if($tooltip_disp !== '' && $href['url'] == NULL ){
				$link_prefix .= '<span class="aio-tooltip '.esc_attr($uniqid).'" data-toggle="tooltip" data-placement="'.esc_attr($tooltip_disp).'" title="'.esc_attr($tooltip_text).'">';
				$link_sufix .= '</span>';
			}

			if (!empty($icon_subtext)) {
				//$stylepf .= 'margin-top:-'.($icon_border_spacing/3).'px;';
			}
			
			if (!empty($icon_fontsize)) {
				$stylepf .='font-size:'.$icon_fontsize.'px;';
			}

			if($icon_color !== '')
				$style .= 'color:'.$icon_color.';';
				$stylepf .='color:'.$icon_color.';';
			if($icon_style !== 'none'){
				if($icon_color_bg !== '')
					$style .= 'background:'.$icon_color_bg.';';
			}
			if($icon_style == 'advanced'){
				$style .= 'border-style:'.$icon_border_style.';';
				$style .= 'border-color:'.$icon_color_border.';';
				$style .= 'border-width:'.$icon_border_size.'px;';
				$style .= 'width:'.($icon_border_spacing+10).'px;';
				$style .= 'height:'.$icon_border_spacing.'px;';
				$style .= 'line-height:'.($icon_border_spacing-10).'px;';
				$style .= 'border-radius:'.$icon_border_radius.'px;';
			}
			if($icon_size !== '')
				$style .='font-size:'.$icon_size.'px;';

			if($icon_margin !== '')
				$style .= 'margin-right:'.$icon_margin.'px;';

			if($icon !== ""){
				$output .= "\n".$link_prefix.'<div class="aio-icon pf-spcficons-icon '.esc_attr($icon_style).' '.esc_attr($el_class).'" '.$css_trans.' style="'.esc_attr($style).'">';
				$output .= "\n\t".'<i class="'.esc_attr($icon).'"></i>';
				if (!empty($icon_subtext)) {
					$output .= '<div class="pf-icon-addontext" style="'.esc_attr($stylepf).'">'.$icon_subtext.'</div>';
				}
				$output .= "\n".'</div>';
				$output .= $link_sufix;
			}
			
			//$output .= do_shortcode($content);
			if($tooltip_disp !== ""){
				$output .= '<script>
					jQuery(function () {
						jQuery(".'.esc_attr($uniqid).'").bsf_tooltip("hide");
					})
				</script>';
			}
			return $output;
		}
	}
}
if(class_exists('Pointfinder_Icons'))
{
	$Pointfinder_Icons = new Pointfinder_Icons;
}


if ( class_exists( 'WPBakeryShortCodesContainer' ) && !class_exists( 'WPBakeryShortCode_pointfinder_icons' ) ) {
    class WPBakeryShortCode_pointfinder_icons extends WPBakeryShortCodesContainer {
    }
}