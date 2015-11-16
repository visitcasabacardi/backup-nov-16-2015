<?php
//include_once('google-fonts.php');

if (!function_exists ('add_action')) {
		header('Status: 403 Forbidden');
		header('HTTP/1.1 403 Forbidden');
		exit();
}
global $qode_options_proya;
$qode_options_proya  = get_option('qode_options_proya');



class Qode_Theme_Options {

	private $options;

	function qode_Theme_Options() {
		add_action('admin_menu', array(&$this, 'qode_admin_menu'));
		add_action('admin_init', array(&$this, 'register_qode_theme_settings'));
		$this->options = get_option('qode_options_proya');
	}

	function init_qode_theme_options() {
		global $qode_options_proya;
		if(isset($qode_options_proya['reset_to_defaults'])){
			if( $qode_options_proya['reset_to_defaults'] == 'yes' ) delete_option( "qode_options_proya");
		}
		if (! get_option("qode_options_proya")) {
			add_option( "qode_options_proya",
				array(
					"reset_to_defaults" => '',
					"number_of_chars" => 45,
					"first_color" => '',
					"second_color" => '',
					"third_color" => '',
					"fourth_color" => '',
					"background_color" => '',
					"background_color_box" => '',
					"background_color_boxes" => '',
					"highlight_color" => '',
					"selection_color" => '',
					"favicon_image" => QODE_ROOT."/img/favicon.ico",
					"background_image" => '',
					"patern_background_image" => '',
					"google_fonts" => '-1',
					"page_transitions" => '0',
					"boxed" => 'no',
					"move_content_up" => 'no',
					"content_negative_margin" => '',
					"loading_animation" => 'off',
					"loading_animation_spinner" => 'pulse',
					"spinner_color" => '',
					"qode_like" => 'on',
					"portfolio_qode_like" => 'on',
					"loading_image" => '',
					"smooth_scroll" => 'yes',
					"responsiveness" => 'yes',
					"show_back_button" => 'yes',
					"elements_animation_on_touch" => 'no',
					"parallax_minheight" => '400',
					"parallax_onoff" => 'on',
					"internal_no_ajax_links" => '',
					"custom_css" => '',
					"custom_js" => '',
					"meta_keywords" => '',
					"meta_description" => '',
					"disable_qode_seo" => 'no',
					"h1_color" => '',
					"h1_google_fonts" => '-1',
					"h1_fontsize" => '',
					"h1_lineheight" => '',
					"h1_fontstyle" => '',
					"h1_fontweight" => '',
					"h1_texttransform" => '',
					"h2_color" => '',
					"h2_google_fonts" => '-1',
					"h2_fontsize" => '',
					"h2_lineheight" => '',
					"h2_fontstyle" => '',
					"h2_fontweight" => '',
					"h2_texttransform" => '',
					"h3_color" => '',
					"h3_google_fonts" => '-1',
					"h3_fontsize" => '',
					"h3_lineheight" => '',
					"h3_fontstyle" => '',
					"h3_fontweight" => '',
					"h3_texttransform" => '',
					"h4_color" => '',
					"h4_google_fonts" => '-1',
					"h4_fontsize" => '',
					"h4_lineheight" => '',
					"h4_fontstyle" => '',
					"h4_fontweight" => '',
					"h4_texttransform" => '',
					"h5_color" => '',
					"h5_google_fonts" => '-1',
					"h5_fontsize" => '',
					"h5_lineheight" => '',
					"h5_fontstyle" => '',
					"h5_fontweight" => '',
					"h5_texttransform" => '',
					"h6_color" => '',
					"h6_google_fonts" => '-1',
					"h6_fontsize" => '',
					"h6_lineheight" => '',
					"h6_fontstyle" => '',
					"h6_fontweight" => '',
					"h6_letterspacing" => '',
					"h6_texttransform" => '',
					"text_color" => '',
					"text_google_fonts" => '-1',
					"text_fontsize" => '',
					"text_lineheight" => '',
					"text_fontstyle" => '',
					"text_fontweight" => '',
					"text_margin" => '',
					"link_color" => '',
					"link_hovercolor" => '',
					"link_fontstyle" => '',
					"link_fontweight" => '',
					"link_fontdecoration" => '',
					"top_header_text_color" => '',
					"top_header_text_hover_color" => '',
					"top_header_text_font_family" => '-1',
					"top_header_text_font_size" => '',
					"top_header_text_line_height" => '',
					"top_header_text_font_style" => '',
					"top_header_text_font_weight" => '',
					"top_header_text_letter_spacing" => '',
					"top_header_border_color" => '',
					"top_header_border_weight" => '',
					"page_title_color" => '',
					"page_title_google_fonts" => '-1',
					"page_title_fontsize" => '',
					"page_title_lineheight" => '',
					"page_title_fontstyle" => '',
					"page_title_fontweight" => '',
					"page_title_medium_fontsize" => '',
					"page_title_medium_lineheight" => '',
					"page_title_medium_fontweight" => '',
					"page_title_large_fontsize" => '',
					"page_title_large_lineheight" => '',
					"page_title_large_fontweight" => '',
					"page_subtitle_color" => '',
					"page_subtitle_font_family" => '-1',
					"page_subtitle_fontsize" => '',
					"page_subtitle_lineheight" => '',
					"page_subtitle_font_style" => '',
					"page_subtitle_fontweight" => '',
					"page_subtitle_large_fontsize" => '',
					"page_subtitle_large_lineheight" => '',
					"page_subtitle_large_fontweight" => '',
					"quote_link_blockqoute_fontsize" => '',
					"quote_link_blockqoute_lineheight" => '',
					"menu_color" => '',
					"menu_hovercolor" => '',
					"menu_activecolor" => '',
					"menu_hover_background_color" => '',
					"menu_hover_background_color_transparency" => '',
					"menu_google_fonts" => '-1',
					"menu_fontsize" => '',
					"menu_lineheight" => '',
					"menu_fontstyle" => '',
					"menu_fontweight" => '',
					"menu_letterspacing" => '',
					"menu_text_transform" => '',
					"menu_separator_between_items" => '',
					"menu_separator_color" => '',
					"header_in_grid" => 'yes',
					"header_top_area" => 'no',
					"header_top_area_scroll" => 'no',
					"enable_breadcrumbs" => 'no',
					"enable_search" => 'no',
					"search_background_color" => '',
					"search_text_color" => '',
					"header_bottom_appearance" => 'fixed',
					"header_style" => '',
					"menu_position" => '',
					"header_top_background_color" => '',
					"header_background_color" => '',
					"header_background_color_scroll" => '',
					"header_background_color_sticky" => '',
					"header_bottom_border_color" => '',
					"header_botom_border_transparency" => '',
					"header_background_transparency_initial" => '',
					"header_background_transparency_scroll" => '',
					"header_background_transparency_sticky" => '',
					"logo_image" => QODE_ROOT."/img/logo.png",
					"logo_image_light" => QODE_ROOT."/img/logo_white.png",
					"logo_image_dark" => QODE_ROOT."/img/logo_black.png",
					"logo_image_sticky" => QODE_ROOT."/img/logo_black.png",
                    "logo_image_fixed_hidden" => "",
					"center_logo_image" => 'no',
					"header_height" => '',
					"header_height_scroll" => '',
                    "header_height_scroll_hidden" => '',
					"header_height_sticky" => '',
					"scroll_amount_for_sticky" => '',
					"dropdown_background_color" => '',
					"dropdown_background_transparency" => '',
					"dropdown_color" => '',
					"dropdown_hovercolor" => '',
					"dropdown_google_fonts" => '-1',
					"dropdown_fontsize" => '',
					"dropdown_lineheight" => '',
					"dropdown_fontstyle" => '',
					"dropdown_fontweight" => '',
					"dropdown_texttransform" => '',
					"dropdown_letterspacing" => '',
					"dropdown_padding_top_bottom" => '',
					"dropdown_separator_beetwen_items" => '',
					"dropdown_wide_color" => '',
					"dropdown_wide_hovercolor" => '',
					"dropdown_wide_google_fonts" => '-1',
					"dropdown_wide_fontsize" => '',
					"dropdown_wide_lineheight" => '',
					"dropdown_wide_fontstyle" => '',
					"dropdown_wide_fontweight" => '',
					"dropdown_wide_texttransform" => '',
					"dropdown_wide_letterspacing" => '',
					"dropdown_color_thirdlvl" => '',
					"dropdown_hovercolor_thirdlvl" => '',
					"dropdown_google_fonts_thirdlvl" => '-1',
					"fixed_google_fonts" => '-1',
					"dropdown_fontsize_thirdlvl" => '',
					"dropdown_lineheight_thirdlvl" => '',
					"dropdown_fontstyle_thirdlvl" => '',
					"dropdown_fontweight_thirdlvl" => '',
					"dropdown_texttransform_thirdlvl" => '',
					"dropdown_letterspacing_thirdlvl" => '',
					"sticky_color" => '',
					"sticky_hovercolor" => '',
					"sticky_google_fonts" => '-1',
					"sticky_fontsizel" => '',
					"sticky_lineheight" => '',
					"sticky_fontstyle" => '',
					"sticky_fontweight" => '',
					"mobile_color" => '',
					"mobile_hovercolor" => '',
					"mobile_google_fonts" => '-1',
					"mobile_fontsize" => '',
					"mobile_lineheight" => '',
					"mobile_fontstyle" => '',
					"mobile_fontweight" => '',
					"mobile_separator_color" => '',
					"mobile_background_color" => '',
					"mobile_letter_spacing" => '',
					"header_separator_color" => '',
					"breadcrumbs_color" => '',
					"animate_title_area" => 'no',
					"title_text_shadow" => 'no',
					"title_background_color" => '',
					"responsive_title_image" => '',
					"fixed_title_image" => '',
					"title_image" => '',
					"title_overlay_image" => '',
					"title_height" => '',
					"page_title_position" => 'left',
					"title_separator" => 'yes',
					"title_separator_color" => '',
					"title_separator_width" => '',
					"predefined_title_sizes" => 'small',
					"border_bottom_title_area" => 'no',
					"border_bottom_title_area_color" => '',
					"margin_after_title" => '',
                    "header_buttons_color" => '',
                    "header_buttons_font_size" => '',
                    "header_buttons_color" => '',
                    "header_hover_buttons_color" => '',
                    "header_buttons_font_size" => '',
                    "header_buttons_size" => '',
					"uncovering_footer" => 'no',
					"footer_in_grid" => 'yes',
					"footer_text" => 'yes',
					"show_footer_top" => 'yes',
					"footer_top_columns" => '4',
					"footer_top_title_color" => '',
					"footer_top_text_color" => '',
					"footer_link_color" => '',
					"footer_link_hover_color" => '',
					"footer_top_background_color" => '',
					"footer_title_font_family" => '-1',
					"footer_title_font_size" => '',
					"footer_title_letter_spacing" => '',
					"footer_title_font_weight" => '',
					"footer_title_color" => '',
					"footer_title_text_transform" => '',
					"footer_bottom_text_color" => '',
					"footer_bottom_link_hover_color" => '',
					"footer_bottom_background_color" => '',
					"vertical_area" => "no",
          			"vertical_area_transparency" => "no",
					"vertical_area_background" => "",
                    "vertical_area_background_image" => "",
                    "vertical_area_text_color" => "",
                    "left_menu_alignment" => "",
					"vertical_menu_color" => "",
					"vertical_menu_hovercolor" => "",
					"vertical_menu_google_fonts" => "",
					"vertical_menu_fontsize" => "",
					"vertical_menu_lineheight" => "",
					"vertical_menu_fontstyle" => "",
					"vertical_menu_fontweight" => "",
					"vertical_dropdown_color" => "",
					"vertical_dropdown_hovercolor" => "",
					"vertical_dropdown_google_fonts" => "",
					"vertical_dropdown_fontsize" => "",
					"vertical_dropdown_lineheight" => "",
					"vertical_dropdown_fontstyle" => "",
					"vertical_dropdown_fontweight" => "",
					"vertical_dropdown_color_thirdlvl" => "",
					"vertical_dropdown_hovercolor_thirdlvl" => "",
					"vertical_dropdown_google_fonts_thirdlvl" => "",
					"vertical_dropdown_fontsize_thirdlvl" => "",
					"vertical_dropdown_lineheight_thirdlvl" => "",
					"vertical_dropdown_fontstyle_thirdlvl" => "",
					"vertical_dropdown_fontweight_thirdlvl" => "",
					"enable_side_area" => 'yes',
					"side_area_title" => '',
					"side_area_background_color" => '',
					"side_area_text_color" => '',
					"side_area_text_hover_color" => '',
					"side_area_text_font_size" => '',
					"side_area_text_font_weight" => '',
					"side_area_text_letter_spacing" => '',
					"side_area_title_color" => '',
					"side_area_title_font_size" => '',
					"side_area_title_font_weight" => '',
					"side_area_title_letter_spacing" => '',
					"side_area_close_icon_style" => '',
					"enable_popup_menu" => 'no',
					"popup_menu_color" => '',
					"popup_menu_hover_color" => '',
					"popup_menu_hover_background_color" => '',
					"popup_menu_google_fonts" => '-1',
					"popup_menu_fontsize" => '',
					"popup_menu_lineheight" => '',
					"popup_menu_fontstyle" => '',
					"popup_menu_fontweight" => '',
					"popup_menu_letterspacing" => '',
					"popup_menu_color_2nd" => '',
					"popup_menu_hover_color_2nd" => '',
					"popup_menu_hover_background_color_2nd" => '',
					"popup_menu_google_fonts_2nd" => '-1',
					"popup_menu_fontsize_2nd" => '',
					"popup_menu_lineheight_2nd" => '',
					"popup_menu_fontstyle_2nd" => '',
					"popup_menu_fontweight_2nd" => '',
					"popup_menu_letterspacing_2nd" => '',
					"popup_menu_background_color" => '',
                    "popup_menu_background_transparency" => '',
					"separator_color" => '',
					"separator_color_transparency" => '',
					"separator_thickness" => '',
					"separator_topmargin" => '',
					"separator_bottommargin" => '',
					"separator_small_thickness" => '',
					"separator_small_topmargin" => '',
					"separator_small_bottommargin" => '',
					"separator_small_width" => '',
					"separator_small_color" => '',
					"separator_small_color_transparency" => '',
					"button_title_color" => '',
					"button_title_hovercolor" => '',
					"button_title_google_fonts" => '-1',
					"button_title_fontsize" => '',
					"button_title_lineheight" => '',
					"button_title_letter_spacing" => '',
					"button_title_fontstyle" => '',
					"button_title_fontweight" => '',
					"button_size" => '',
					"button_backgroundcolor_hover" => '',
					"button_backgroundcolor" => '',
					"button_border_color" => '',
					"button_border_hover_color" => '',
					"button_border_width" => '',
					"button_border_radius" => '',
					"small_button_lineheight" => '',
					"small_button_fontsize" => '',
					"small_button_fontweight" => '',
					"small_button_padding" => '',
					"small_button_border_radius" => '',
					"large_button_lineheight" => '',
					"large_button_fontsize" => '',
					"large_button_fontweight" => '',
					"large_button_padding" => '',
					"large_button_border_radius" => '',
					"big_large_button_lineheight" => '',
					"big_large_button_fontsize" => '',
					"big_large_button_fontweight" => '',
					"big_large_button_padding" => '',
					"big_large_button_border_radius" => '',
					"button_white_border_color" => '',
					"button_white_border_color_hover" => '',
					"button_white_background_color" => '',
					"button_white_background_color_hover" => '',
					"button_white_text_color" => '',
					"button_white_text_color_hover" => '',
					"message_title_color" => '',
                    "message_title_google_fonts" => '-1',
					"message_title_fontsize" => '',
					"message_title_lineheight" => '',
					"message_title_fontstyle" => '',
					"message_title_fontweight" => '',
					"message_backgroundcolor" => '',
					"message_icon_color" => '',
					"message_icon_fontsize" => '',
					"blockquote_font_color" => '',
					"blockquote_border_color" => '',
					"blockquote_background_color" => '',
					"blockquote_quote_icon_color" => '',
					"social_icon_color" => '',
					"social_icon_background_color" => '',
					"social_icon_border_color" => '',
					"testimonaials_navigation_border_radius" => '',
					"testimonaials_font_size" => '',
					"counter_color" => '',
					"counter_text_color" => '',
					"counter_separator_color" => '',
					"counters_fontweight" => '',
					"counters_font_size" => '',
					"counters_font_family" => '-1',
					"counters_letter_spacing" => '',
					"counters_text_fontweight" => '',
					"counters_text_font_size" => '',
					"counters_text_font_family" => '-1',
					"counters_text_texttransform" => '',
					"counters_text_letterspacing" => '',
					"progress_bar_horizontal_fontsize" => '',
					"progress_bar_horizontal_fontweight" => '',
					"pie_charts_fontsize" => '',
					"pie_charts_fontweight" => '',
					"tabs_text_size" => '',
					"tabs_fontweight" => '',
					"tabs_border_color" => '',
					"tabs_border_radius" => '',
					"tabs_border_width" => '',
					"process_text_in_circle_font_weight" => '',
					"process_circle_hover_background_color" => '',
					"process_text_hover_color" => '',
					"input_background_color" => '',
					"input_border_color" => '',
					"portfolio_filter_color" => '',
					"portfolio_filter_font_weight" => '',
					"portfolio_filter_letter_spacing" => '',
					"portfolio_filter_font_family" => '-1',
					"portfolio_filter_font_size" => '',
					"portfolio_filter_line_height" => '',
					"portfolio_filter_text_transform" => '',
					"portfolio_style" => '1',
					"lightbox_single_project" => 'no',
					"portfolio_columns_number" => '2',
					"portfolio_single_sidebar" => 'default',
					"portfolio_single_sidebar_custom_display" => '',
					"portfolio_single_slug" => '',
					"portfolio_text_follow" => 'portfolio_single_follow',
					"blog_quote_link_box_color" => '',
					"pagination" => '1',
					"blog_style" => '1',
					"category_blog_sidebar" => 'default',
					"blog_hide_comments" => 'no',
                    "blog_hide_author" => 'no',
					"blog_page_range" => '',
					"number_of_chars" => '45',
					"number_of_chars_masonry" => '',
					"number_of_chars_large_image" => '',
					"number_of_chars_small_image" => '',
					"pagination_masonry" => 'pagination',
					"blog_masonry_filter" => 'no',
					"blog_large_image_text_in_box" => '',
					"blog_large_image_border" => '',
					"blog_large_image_border_color" => '',
					"blog_large_image_border_width" => '',
					"blog_large_image_background_color" => '',
					"blog_small_image_text_in_box" => '',
					"blog_small_image_border" => '',
					"blog_small_image_border_color" => '',
					"blog_small_image_border_width" => '',
					"blog_small_image_background_color" => '',
					"blog_masonry_border_color" => '',
					"blog_masonry_background_color" => '',
					"blog_masonry_border_radius" => '',
					"blog_single_sidebar" => 'default',
					"blog_single_sidebar_custom_display" => '',
					"blog_author_info" => 'no',
					"receive_mail" => '',
					"enable_contact_form" => 'no',
					"hide_contact_form_website" => 'no',
					"email_from" => '',
					"email_subject" => '',
					"use_recaptcha" => 'no',
					"recaptcha_public_key" => '',
					"recaptcha_private_key" => '',
					"contact_heading_above" => '',
					"section_between_map_form" => 'yes',
					"section_between_map_form_position" => '',
					"contact_section_above_form_title" => '',
					"contact_section_above_form_subtitle" => '',
					"enable_google_map" => 'no',
					"google_maps_pin_image" => QODE_ROOT."/img/pin.png",
					"google_maps_address" => '',
					"google_maps_address2" => '',
					"google_maps_address3" => '',
					"google_maps_address4" => '',
					"google_maps_address5" => '',
					"google_maps_zoom" => '12',
					"google_maps_height" => '750',
					"google_maps_style" => 'yes',
					"google_maps_color" => '',
					"google_maps_scroll_wheel" => 'no',
					"google_maps_iframe" => '',
					"404_title" => '',
					"404_subtitle" => '',
					"404_text" => '',
					"404_backlabel" => '',
					"enable_social_share" => 'no',
					"enable_facebook_share" => 'no',
					"enable_twitter_share" => 'no',
					"enable_google_plus" => 'no',
					"enable_linkedin" => 'no',
					"enable_tumblr" => 'no',
					"enable_pinterest" => 'no',
					"enable_vk" => 'no',
					"facebook_icon" => '',
					"twitter_icon" => '',
					"google_plus_icon" => '',
					"linkedin_icon" => '',
					"tumblr_icon" => '',
					"pinterest_icon" => '',
					"vk_icon" => '',
					"twitter_via" => ''
				)
			);
		} 
	}

	function register_qode_theme_settings() {
	    register_setting( 'qode_options_proya_page', 'qode_options_proya', array(&$this, 'validate_options') );
	}
	/*** Add Option to admin sidebar ***/
	function qode_admin_menu() {
		$this->init_qode_theme_options();
		$this->pagehook = add_menu_page('Qode Theme', esc_html__('Qode Old', 'qode'), 'manage_options', 'qode_options_proya_page', array(&$this, 'qode_generate_options_page'));
		add_action('load-'.$this->pagehook, array(&$this, 'on_load_page'));
	}

	function on_load_page() {
		
		/*** add default wordpress meta boxes ***/
		add_meta_box('qode-general-options-metabox', esc_html__('Options', 'qode'), array(&$this, 'general_options_contentbox'), $this->pagehook, 'normal', 'core');
	
	}

	function qode_generate_options_page() {

		/***  Option for number of columns ***/
		global $screen_layout_columns, $qode_options_proya;

		/*** Saved options message ***/
		if ( isset($_REQUEST['settings-updated']) || isset($_REQUEST['updated'] )) {
                    echo '<div id="message" class="updated fade"><p><strong>'.esc_html__('Settings saved.', 'qode').'</strong></p></div>';
               
                }
                
		 ?>
		<div id="qode-metaboxes-general" class="wrap">
		    <div style="float:left; padding:10px 10px 10px 0;"></div>
            <?php $current_theme = wp_get_theme(); ?>
		    <h2 style="padding-top:25px;"><?php echo $current_theme->get('Name').' - '.__('Theme Options - Version').' '.$current_theme->get('Version'); ?></h2>

		    <form method="post" action="options.php">
<?php			settings_fields( 'qode_options_proya_page' );
				$options = $this->options;
				wp_nonce_field('closedpostboxes', 'closedpostboxesnonce', false );
				wp_nonce_field('meta-box-order', 'meta-box-order-nonce', false ); ?>

			<div id="poststuff" class="metabox-holder<?php echo 2 == $screen_layout_columns ? ' has-right-sidebar' : ''; ?>">
				<div id="post-body" class="has-sidebar">
					<div id="post-body-content" class="has-sidebar-content">
<?php					    do_meta_boxes($this->pagehook, 'normal', $options); ?>
<?php					    do_meta_boxes($this->pagehook, 'additional', $options); ?>
					    <fieldset style="margin:2px 0 0;"><legend class="screen-reader-text"><span><?php esc_attr_e('Reset to defaults', 'qode') ?></span></legend>
						<label for="reset_to_defaults">
						    <input name="qode_options_proya[reset_to_defaults]" type="checkbox" id="reset_to_defaults" value="yes" />
						    <?php esc_attr_e('Reset to defaults', 'qode') ?>
						</label>
					    </fieldset>
					    <p class="submit">
						<input type="hidden" id="qode_submit" value="1" name="qode_submit" />
						<input class="button-primary" type="submit" name="submit" value="<?php esc_attr_e('Save Changes', 'qode') ?>" />
					    </p>
					</div>
				</div>
				<br class="clear"/>
			</div>
		    </form>
		</div>
		<script type="text/javascript">
		    //<![CDATA[
		    jQuery(document).ready( function($) {
			    // close qode postboxes
			    $('.if-js-closed').removeClass('if-js-closed').addClass('closed');
			    // qode postboxes setup
			    postboxes.add_postbox_toggles('<?php echo $this->pagehook; ?>');
		    });
		    //]]>
		</script>
<?php	}

	/***  Validate number option  ***/
	function validate_options( $input ) {
	global $qode_options_proya;
		$input['number_of_chars'] = is_numeric( $input['number_of_chars'] ) ? absint($input['number_of_chars']) : $qode_options_proya['number_of_chars'];
		return $input;
	}

	/*** Fields and html for meta boxes ***/

	function general_options_contentbox( $options ) {
		global $fontArrays;
	?>

		<div class="sections">
			<h3>Global Options</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('First main color', 'qode'); ?></td>
							<td>
								<div>
									<div class="colorSelector"><div style="<?php if ($options['first_color']){ echo 'background-color:'.esc_attr($options['first_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[first_color]" type="text" value="<?php if ($options['first_color']) { echo esc_attr($options['first_color'], 'qode'); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default main color', 'qode'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #1abc9c;" title="#1abc9c"></span></div>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Second main color', 'qode'); ?></td>
							<td>
								<div>
									<div class="colorSelector"><div style="<?php if ($options['second_color']){ echo 'background-color:'.esc_attr($options['second_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[second_color]" type="text" value="<?php if ($options['second_color']) { echo esc_attr($options['second_color'], 'qode'); } ?>" size="30" maxlength="100" />
									<?php esc_html_e('Default second main color', 'qode'); ?>
									<div class="inline" style="vertical-align:middle; margin: 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #303030; background-color: #303030;" title="#303030"></span></div>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Third main color', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['third_color']){ echo 'background-color:'.esc_attr($options['third_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[third_color]" type="text" value="<?php if(isset($options['third_color'])){ if ($options['third_color']) { echo esc_attr($options['third_color'], 'qode'); } } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default third main color', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #e3e3e3; background-color: #e3e3e3;" title="#e3e3e3"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Fourth main color', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['fourth_color']){ echo 'background-color:'.esc_attr($options['fourth_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[fourth_color]" type="text" value="<?php if(isset($options['fourth_color'])){ if ($options['fourth_color']) { echo esc_attr($options['fourth_color'], 'qode'); } } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default fourth main color', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #c0c0c0;" title="#c0c0c0"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background color (content)', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['background_color']){ echo 'background-color:'.esc_attr($options['background_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[background_color]" type="text" value="<?php if ($options['background_color']) { echo esc_attr($options['background_color'], 'qode'); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default background color', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #e0dede; background-color: #f6f6f6;" title="#f6f6f6"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background color (body)', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['background_color_box']){ echo 'background-color:'.esc_attr($options['background_color_box'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[background_color_box]" type="text" value="<?php if (isset($options['background_color_box'])) { echo esc_attr($options['background_color_box'], 'qode'); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default boxed background color', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #e0dede; background-color: #f6f6f6;" title="#f6f6f6"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background boxes color', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if (isset($options['background_color_boxes']) && $options['background_color_boxes']){ echo 'background-color:'.esc_attr($options['background_color_boxes'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[background_color_boxes]" type="text" value="<?php if (isset($options['background_color_boxes'])) { echo esc_attr($options['background_color_boxes'], 'qode'); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Background color for boxes (blog, portfolio...)', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; border: 1px solid #ededed; background-color: #fff;" title="#fff"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Highlight color', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['highlight_color']){ echo 'background-color:'.esc_attr($options['highlight_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[highlight_color]" type="text"  value="<?php if ($options['highlight_color']) { echo esc_attr($options['highlight_color'], 'qode'); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default highlight color', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #1abc9c;" title="#1abc9c"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Selection color', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['selection_color']){ echo 'background-color:'.esc_attr($options['selection_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[selection_color]" type="text"  value="<?php if ($options['selection_color']) { echo esc_attr($options['selection_color'], 'qode'); } ?>" size="30" maxlength="500" />
								<?php esc_html_e('Default selection color', 'qode'); ?>
								<div class="inline" style="vertical-align:middle; margin: 0 0 0 10px;"><span style="width: 20px; height: 20px; display: inline-block; background-color: #1abc9c;" title="#1abc9c"></span></div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background image', 'qode'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="background_image" name="qode_options_proya[background_image]" class="background_image" value="<?php if (isset($options['background_image'])) { echo esc_attr($options['background_image'], 'qode'); } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pattern background image', 'qode'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="pattern_background_image" name="qode_options_proya[pattern_background_image]" class="pattern_background_image" value="<?php if (isset($options['pattern_background_image'])) { echo esc_attr($options['pattern_background_image'], 'qode'); } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Favicon image', 'qode'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="favicon_image" name="qode_options_proya[favicon_image]" class="favicon_image" value="<?php if ($options['favicon_image']) { echo esc_attr($options['favicon_image'], 'qode'); } else { echo QODE_ROOT."/img/favicon.ico"; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Google fonts', 'qode'); ?></td>
								<td>
							<select name="qode_options_proya[google_fonts]">
							<option value="-1">Default</option>
							<?php foreach($fontArrays as $fontArray) { ?>
								<option <?php if ($options['google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
							<?php } ?>

							</select>
							<?php esc_html_e('Choose Font', 'qode'); ?>
								</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Page transition', 'qode'); ?></td>
								<td>
							<select name="qode_options_proya[page_transitions]">
								<option <?php if ($options['page_transitions'] == 0) { echo "selected='selected'"; } ?> value="0">No animation</option>
								<option <?php if ($options['page_transitions'] == 1) { echo "selected='selected'"; } ?> value="1">Up/Down</option>
								<option <?php if ($options['page_transitions'] == 2) { echo "selected='selected'"; } ?> value="2">Fade</option>
								<option <?php if ($options['page_transitions'] == 3) { echo "selected='selected'"; } ?> value="3">Up/Down (In) / Fade (Out)</option>
								<option <?php if ($options['page_transitions'] == 4) { echo "selected='selected'"; } ?> value="4">Left/Right</option>
							</select>
							<?php esc_html_e('In order for animation to work properly, you must choose "Post name" in permalinks settings', 'qode'); ?>
								</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Boxed', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[boxed]">
									<option <?php if(isset($options['boxed'])){ $boxed = $options['boxed']; if ($boxed == 'no') { echo "selected='selected'"; } }  ?> value="no">No</option>
									<option <?php if(isset($options['boxed'])){ $boxed = $options['boxed']; if ($boxed == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
<!--                        <tr valign="middle">-->
<!--                            <td scope="row" width="150">--><?php //esc_html_e('Move content up', 'qode'); ?><!--</td>-->
<!--                            <td>-->
<!--                                <select name="qode_options_proya[move_content_up]">-->
<!--                                    <option --><?php //if(isset($options['move_content_up'])){ $content_negative_top_margin = $options['move_content_up']; if ($content_negative_top_margin == 'no') { echo "selected='selected'"; } }  ?><!-- value="no">No</option>-->
<!--                                    <option --><?php //if(isset($options['move_content_up'])){ $content_negative_top_margin = $options['move_content_up']; if ($content_negative_top_margin == 'yes') { echo "selected='selected'"; } } ?><!-- value="yes">Yes</option>-->
<!--                                </select>-->
<!--                            </td>-->
<!--                        </tr>-->
<!--                        <tr valign="middle">-->
<!--                            <td scope="row" width="150">--><?php //esc_html_e('Content top margin (enter negative values in px)', 'qode'); ?><!--</td>-->
<!--                            <td>-->
<!--                                <input name="qode_options_proya[content_negative_margin]" type="text" value="--><?php //if (isset($options['content_negative_margin'])) { echo esc_attr($options['content_negative_margin'], 'qode'); } ?><!--" size="20" maxlength="30" />-->
<!--                            </td>-->
<!--                        </tr>-->
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Loading animation', 'qode'); ?></td>
								<td>
									<select name="qode_options_proya[loading_animation]">
										<option <?php if (isset($options['loading_animation'])){ $loading_animation = $options['loading_animation']; if ($loading_animation == 'on') { echo "selected='selected'"; } } ?> value="on">On</option>
										<option <?php if (isset($options['loading_animation'])){ $loading_animation = $options['loading_animation']; if ($loading_animation == 'off') { echo "selected='selected'"; } } ?> value="off">Off</option>
									</select>
							</td>
						</tr>
                        <tr valign="middle">
                            <td scope="row" width="150"><?php esc_html_e('Loading animation spinner', 'qode'); ?></td>
                            <td>
                                <div class="inline">
                                <select name="qode_options_proya[loading_animation_spinner]">
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'pulse') { echo "selected='selected'"; } } ?> value="pulse">Pulse</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'double_pulse') { echo "selected='selected'"; } } ?> value="double_pulse">Double Pulse</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'cube') { echo "selected='selected'"; } } ?> value="cube">Cube</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'rotating_cubes') { echo "selected='selected'"; } } ?> value="rotating_cubes">Rotating Cubes</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'stripes') { echo "selected='selected'"; } } ?> value="stripes">Stripes</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'wave') { echo "selected='selected'"; } } ?> value="wave">Wave</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'two_rotating_circles') { echo "selected='selected'"; } } ?> value="two_rotating_circles">2 Rotating Circles</option>
                                    <option <?php if (isset($options['loading_animation_spinner'])){ $loading_animation_spinner = $options['loading_animation_spinner']; if ($loading_animation_spinner == 'five_rotating_circles') { echo "selected='selected'"; } } ?> value="five_rotating_circles">5 Rotating Circles</option>
                                </select>
                                </div>
                                <div class="inline">
                                    <div class="colorSelector"><div style="<?php if ($options['spinner_color']){ echo 'background-color:'.esc_attr($options['spinner_color'], 'qode').';'; } ?>"></div></div>
                                    <input name="qode_options_proya[spinner_color]" type="text" value="<?php if(isset($options['spinner_color'])){ if ($options['spinner_color']) { echo esc_attr($options['spinner_color'], 'qode'); } } ?>" size="10" maxlength="10" />
                                    <?php esc_html_e('Spinner color', 'qode'); ?>
                                </div>
                            </td>
                        </tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Loading image', 'qode'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="loading_image" name="qode_options_proya[loading_image]" class="loading_image" value="<?php if (isset($options['loading_image']) && $options['loading_image'] != "") { echo esc_attr($options['loading_image'], 'qode'); } else { echo ""; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Smooth scroll', 'qode'); ?></td>
                            <td>
                                <select name="qode_options_proya[smooth_scroll]">
                                    <option <?php if(isset($options['smooth_scroll'])){ $smooth_scroll = $options['smooth_scroll']; if ($smooth_scroll == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
                                    <option <?php if(isset($options['smooth_scroll'])){ $smooth_scroll = $options['smooth_scroll']; if ($smooth_scroll == 'no') { echo "selected='selected'"; } }  ?> value="no">No</option>
                                </select>
                                <?php esc_html_e('For Chrome and Opera browsers', 'qode'); ?>
                            </td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Responsiveness', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[responsiveness]">
									<option <?php if(isset($options['responsiveness'])){ $responsiveness = $options['responsiveness']; if ($responsiveness == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									<option <?php if(isset($options['responsiveness'])){ $responsiveness = $options['responsiveness']; if ($responsiveness == 'no') { echo "selected='selected'"; } }  ?> value="no">No</option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Show back button', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[show_back_button]">
									<option <?php if(isset($options['show_back_button'])){ $show_back_button = $options['show_back_button']; if ($show_back_button == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['show_back_button'])){ $show_back_button = $options['show_back_button']; if ($show_back_button == 'yes') { echo "selected='selected'"; } }  ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Elements animation on mobile/touch devices', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[elements_animation_on_touch]">
									<option <?php if(isset($options['elements_animation_on_touch'])){ $elements_animation_on_touch = $options['elements_animation_on_touch']; if ($elements_animation_on_touch == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['elements_animation_on_touch'])){ $elements_animation_on_touch = $options['elements_animation_on_touch']; if ($elements_animation_on_touch == 'yes') { echo "selected='selected'"; } }  ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Google Analytics Account ID', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[google_analytics_code]" type="text" value="<?php if (isset($options['google_analytics_code'])) { echo esc_attr($options['google_analytics_code'], 'qode'); } ?>" size="63" maxlength="500" />
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('List of internal URLs loaded without AJAX (separated with comma)', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="internal_no_ajax_links" name="qode_options_proya[internal_no_ajax_links]" cols="60" rows="5"><?php if (isset($options['internal_no_ajax_links'])) { echo esc_attr($options['internal_no_ajax_links'], 'qode'); } ?></textarea>
								</div>

							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Custom css', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="custom_css" name="qode_options_proya[custom_css]" cols="60" rows="5"><?php if ($options['custom_css']) { echo esc_attr($options['custom_css'], 'qode'); } ?></textarea>
								</div>

							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Custom js', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="custom_js" name="qode_options_proya[custom_js]" cols="60" rows="5"><?php if ($options['custom_js']) { echo esc_attr($options['custom_js'], 'qode'); } ?></textarea>
								</div><br/>
								<?php esc_html_e('jQuery selector is "$j" because of the conflict mode', 'qode'); ?>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Meta Keywords', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="meta_keywords" name="qode_options_proya[meta_keywords]" cols="60" rows="5"><?php if ($options['meta_keywords']) { echo esc_attr($options['meta_keywords'], 'qode'); } ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top"><?php esc_html_e('Meta Description', 'qode'); ?></td>
							<td>
								<div class="inline">
									<textarea id="meta_description" name="qode_options_proya[meta_description]" cols="60" rows="5"><?php if ($options['meta_description']) { echo esc_attr($options['meta_description'], 'qode'); } ?></textarea>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Disable Qode SEO', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[disable_qode_seo]">
									<option <?php if(isset($options['disable_qode_seo'])){ $disable_qode_seo = $options['disable_qode_seo']; if ($disable_qode_seo == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['disable_qode_seo'])){ $disable_qode_seo = $options['disable_qode_seo']; if ($disable_qode_seo == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>General Font Options</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2>Headings</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H1 style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h1_color']){ echo 'background-color:'.esc_attr($options['h1_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[h1_color]" type="text" value="<?php if ($options['h1_color']) { echo esc_attr($options['h1_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[h1_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h1_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[h1_fontsize]" type="text" value="<?php if ($options['h1_fontsize']) { echo esc_attr($options['h1_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[h1_lineheight]" type="text" value="<?php if ($options['h1_lineheight']) { echo esc_attr($options['h1_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[h1_fontstyle]">
										<option <?php if ($options['h1_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h1_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['h1_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[h1_fontweight]">
										<option <?php if ($options['h1_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h1_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['h1_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['h1_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['h1_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['h1_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['h1_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['h1_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['h1_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[h1_letterspacing]" type="text" value="<?php if (isset($options['h1_letterspacing']) && $options['h1_letterspacing'] !== '') { echo esc_attr($options['h1_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[h1_texttransform]">
										<option <?php if (isset($options['h1_texttransform']) && $options['h1_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['h1_texttransform']) && $options['h1_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['h1_texttransform']) && $options['h1_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['h1_texttransform']) && $options['h1_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['h1_texttransform']) && $options['h1_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H2 style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h2_color']){ echo 'background-color:'.esc_attr($options['h2_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[h2_color]" type="text" value="<?php if ($options['h2_color']) { echo esc_attr($options['h2_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[h2_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h2_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[h2_fontsize]" type="text" value="<?php if ($options['h2_fontsize']) { echo esc_attr($options['h2_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[h2_lineheight]" type="text" value="<?php if ($options['h2_lineheight']) { echo esc_attr($options['h2_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[h2_fontstyle]">
										<option <?php if ($options['h2_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h2_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['h2_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[h2_fontweight]">
										<option <?php if ($options['h2_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h2_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['h2_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['h2_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['h2_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['h2_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['h2_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['h2_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['h2_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[h2_letterspacing]" type="text" value="<?php if (isset($options['h2_letterspacing']) && $options['h2_letterspacing'] !== '') { echo esc_attr($options['h2_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[h2_texttransform]">
										<option <?php if (isset($options['h2_texttransform']) && $options['h2_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['h2_texttransform']) && $options['h2_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['h2_texttransform']) && $options['h2_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['h2_texttransform']) && $options['h2_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['h2_texttransform']) && $options['h2_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H3 style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h3_color']){ echo 'background-color:'.esc_attr($options['h3_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[h3_color]" type="text" value="<?php if ($options['h3_color']) { echo esc_attr($options['h3_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[h3_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h3_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[h3_fontsize]" type="text" value="<?php if ($options['h3_fontsize']) { echo esc_attr($options['h3_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[h3_lineheight]" type="text" value="<?php if ($options['h3_lineheight']) { echo esc_attr($options['h3_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[h3_fontstyle]">
										<option <?php if ($options['h3_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h3_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['h3_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[h3_fontweight]">
										<option <?php if ($options['h3_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h3_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['h3_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['h3_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['h3_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['h3_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['h3_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['h3_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['h3_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[h3_letterspacing]" type="text" value="<?php if (isset($options['h3_letterspacing']) && $options['h3_letterspacing'] !== '') { echo esc_attr($options['h3_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[h3_texttransform]">
										<option <?php if (isset($options['h3_texttransform']) && $options['h3_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['h3_texttransform']) && $options['h3_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['h3_texttransform']) && $options['h3_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['h3_texttransform']) && $options['h3_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['h3_texttransform']) && $options['h3_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H4 style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h4_color']){ echo 'background-color:'.esc_attr($options['h4_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[h4_color]" type="text" value="<?php if ($options['h4_color']) { echo esc_attr($options['h4_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[h4_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h4_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[h4_fontsize]" type="text" value="<?php if ($options['h4_fontsize']) { echo esc_attr($options['h4_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[h4_lineheight]" type="text" value="<?php if ($options['h4_lineheight']) { echo esc_attr($options['h4_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[h4_fontstyle]">
										<option <?php if ($options['h4_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h4_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['h4_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[h4_fontweight]">
										<option <?php if ($options['h4_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h4_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['h4_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['h4_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['h4_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['h4_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['h4_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['h4_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['h4_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[h4_letterspacing]" type="text" value="<?php if (isset($options['h4_letterspacing']) && $options['h4_letterspacing'] !== '') { echo esc_attr($options['h4_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[h4_texttransform]">
										<option <?php if (isset($options['h4_texttransform']) && $options['h4_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['h4_texttransform']) && $options['h4_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['h4_texttransform']) && $options['h4_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['h4_texttransform']) && $options['h4_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['h4_texttransform']) && $options['h4_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H5 style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h5_color']){ echo 'background-color:'.esc_attr($options['h5_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[h5_color]" type="text" value="<?php if ($options['h5_color']) { echo esc_attr($options['h5_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[h5_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h5_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[h5_fontsize]" type="text" value="<?php if ($options['h5_fontsize']) { echo esc_attr($options['h5_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[h5_lineheight]" type="text" value="<?php if ($options['h5_lineheight']) { echo esc_attr($options['h5_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[h5_fontstyle]">
										<option <?php if ($options['h5_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h5_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['h5_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[h5_fontweight]">
										<option <?php if ($options['h5_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h5_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['h5_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['h5_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['h5_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['h5_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['h5_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['h5_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['h5_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[h5_letterspacing]" type="text" value="<?php if (isset($options['h5_letterspacing']) && $options['h5_letterspacing'] !== '') { echo esc_attr($options['h5_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[h5_texttransform]">
										<option <?php if (isset($options['h5_texttransform']) && $options['h5_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['h5_texttransform']) && $options['h5_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['h5_texttransform']) && $options['h5_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['h5_texttransform']) && $options['h5_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['h5_texttransform']) && $options['h5_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('H6 style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['h6_color']){ echo 'background-color:'.esc_attr($options['h6_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[h6_color]" type="text" value="<?php if ($options['h6_color']) { echo esc_attr($options['h6_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[h6_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['h6_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[h6_fontsize]" type="text" value="<?php if ($options['h6_fontsize']) { echo esc_attr($options['h6_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[h6_lineheight]" type="text" value="<?php if ($options['h6_lineheight']) { echo esc_attr($options['h6_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[h6_fontstyle]">
										<option <?php if ($options['h6_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h6_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['h6_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[h6_fontweight]">
										<option <?php if ($options['h6_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['h6_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['h6_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['h6_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['h6_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['h6_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['h6_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['h6_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['h6_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[h6_letterspacing]" type="text" value="<?php if (isset($options['h6_letterspacing']) && $options['h6_letterspacing'] !== '') { echo esc_attr($options['h6_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[h6_texttransform]">
										<option <?php if (isset($options['h6_texttransform']) && $options['h6_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['h6_texttransform']) && $options['h6_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['h6_texttransform']) && $options['h6_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['h6_texttransform']) && $options['h6_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['h6_texttransform']) && $options['h6_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Text</h2></td></tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Text style', 'qode'); ?></td>
								<td>
									<div class="inline">
										<?php esc_html_e('Color', 'qode'); ?>
										<div class="colorSelector"><div style="<?php if ($options['text_color']){ echo 'background-color:'.esc_attr($options['text_color'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[text_color]" type="text" value="<?php if ($options['text_color']) { echo esc_attr($options['text_color'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font family', 'qode'); ?>
										<select name="qode_options_proya[text_google_fonts]">
											<option value="-1">Default</option>
											<?php foreach($fontArrays as $fontArray) { ?>
												<option <?php if ($options['text_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'qode'); ?>
										<input name="qode_options_proya[text_fontsize]" type="text" value="<?php if ($options['text_fontsize']) { echo esc_attr($options['text_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'qode'); ?>
										<input name="qode_options_proya[text_lineheight]" type="text" value="<?php if ($options['text_lineheight']) { echo esc_attr($options['text_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[text_fontstyle]">
											<option <?php if ($options['text_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['text_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
											<option <?php if ($options['text_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[text_fontweight]">
											<option <?php if ($options['text_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['text_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
											<option <?php if ($options['text_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
											<option <?php if ($options['text_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
											<option <?php if ($options['text_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
											<option <?php if ($options['text_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
											<option <?php if ($options['text_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
											<option <?php if ($options['text_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
											<option <?php if ($options['text_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Top/Bottom margin (px)', 'qode'); ?>
										<input name="qode_options_proya[text_margin]" type="text" value="<?php if (isset($options['text_margin'])) { echo esc_attr($options['text_margin'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
								</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Link style', 'qode'); ?></td>
								<td>
									<div class="inline">
										<?php esc_html_e('Color', 'qode'); ?>
										<div class="colorSelector"><div style="<?php if ($options['link_color']){ echo 'background-color:'.esc_attr($options['link_color'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[link_color]" type="text" value="<?php if ($options['link_color']) { echo esc_attr($options['link_color'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
									<div class="inline">
										<?php esc_html_e('Hover color', 'qode'); ?>
										<div class="colorSelector"><div style="<?php if ($options['link_hovercolor']){ echo 'background-color:'.esc_attr($options['link_hovercolor'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[link_hovercolor]" type="text" value="<?php if ($options['link_hovercolor']) { echo esc_attr($options['link_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[link_fontstyle]">
											<option <?php if ($options['link_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['link_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
											<option <?php if ($options['link_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[link_fontweight]">
											<option <?php if ($options['link_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['link_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
											<option <?php if ($options['link_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
											<option <?php if ($options['link_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
											<option <?php if ($options['link_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
											<option <?php if ($options['link_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
											<option <?php if ($options['link_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
											<option <?php if ($options['link_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
											<option <?php if ($options['link_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font decoration', 'qode'); ?>
										<select name="qode_options_proya[link_fontdecoration]">
											<option <?php if ($options['link_fontdecoration'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['link_fontdecoration'] == "none") { echo "selected='selected'"; } ?> value="none">none</option>
											<option <?php if ($options['link_fontdecoration'] == "bold") { echo "selected='selected'"; } ?> value="underline">underline</option>

										</select>
									</div>
								</td>
						</tr>
						<tr><td colspan='2'><h2>Page title</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Page title style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['page_title_color']){ echo 'background-color:'.esc_attr($options['page_title_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[page_title_color]" type="text" value="<?php if ($options['page_title_color']) { echo esc_attr($options['page_title_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[page_title_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['page_title_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[page_title_fontsize]" type="text" value="<?php if ($options['page_title_fontsize']) { echo esc_attr($options['page_title_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[page_title_lineheight]" type="text" value="<?php if ($options['page_title_lineheight']) { echo esc_attr($options['page_title_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[page_title_fontstyle]">
										<option <?php if ($options['page_title_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['page_title_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['page_title_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[page_title_fontweight]">
										<option <?php if ($options['page_title_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['page_title_fontweight'] == "100") { echo "selected='selected'"; } ?> value="100">100</option>
										<option <?php if ($options['page_title_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['page_title_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['page_title_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['page_title_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['page_title_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['page_title_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['page_title_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['page_title_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Predefined medium type', 'qode'); ?></td>
							<td>

								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[page_title_medium_fontsize]" type="text" value="<?php if (isset($options['page_title_medium_fontsize']) && $options['page_title_medium_fontsize']) { echo esc_attr($options['page_title_medium_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[page_title_medium_lineheight]" type="text" value="<?php if (isset($options['page_title_medium_lineheight'])) { echo esc_attr($options['page_title_medium_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[page_title_medium_fontweight]">
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['page_title_medium_fontweight']) && $options['page_title_medium_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Predefined large type', 'qode'); ?></td>
							<td>

								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[page_title_large_fontsize]" type="text" value="<?php if (isset($options['page_title_large_fontsize']) && $options['page_title_large_fontsize']) { echo esc_attr($options['page_title_large_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[page_title_large_lineheight]" type="text" value="<?php if (isset($options['page_title_large_lineheight'])) { echo esc_attr($options['page_title_large_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[page_title_large_fontweight]">
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['page_title_large_fontweight']) && $options['page_title_large_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Page Subtitle</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Subtitle style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['page_subtitle_color'])){ echo 'background-color:'.esc_attr($options['page_subtitle_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[page_subtitle_color]" type="text" value="<?php if (isset($options['page_subtitle_color'])) { echo esc_attr($options['page_subtitle_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[page_subtitle_font_family]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (isset($options['page_subtitle_font_family']) && $options['page_subtitle_font_family'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[page_subtitle_fontsize]" type="text" value="<?php if (isset($options['page_subtitle_fontsize']) && $options['page_subtitle_fontsize']) { echo esc_attr($options['page_subtitle_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[page_subtitle_lineheight]" type="text" value="<?php if (isset($options['page_subtitle_lineheight'])) { echo esc_attr($options['page_subtitle_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[page_subtitle_font_style]">
										<option <?php if (isset($options['page_subtitle_font_style']) && $options['page_subtitle_font_style'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['page_subtitle_font_style']) && $options['page_subtitle_font_style'] == "normal") { echo "selected='selected'"; } ?> value="normal">Normal</option>
										<option <?php if (isset($options['page_subtitle_font_style']) && $options['page_subtitle_font_style'] == "italic") { echo "selected='selected'"; } ?> value="italic">Italic</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[page_subtitle_fontweight]">
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['page_subtitle_fontweight']) && $options['page_subtitle_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Subtitle for predefined large style', 'qode'); ?></td>
							<td>

								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[page_subtitle_large_fontsize]" type="text" value="<?php if (isset($options['page_subtitle_large_fontsize']) && $options['page_subtitle_large_fontsize']) { echo esc_attr($options['page_subtitle_large_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[page_subtitle_large_lineheight]" type="text" value="<?php if (isset($options['page_subtitle_large_lineheight'])) { echo esc_attr($options['page_subtitle_large_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[page_subtitle_large_fontweight]">
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['page_subtitle_large_fontweight']) && $options['page_subtitle_large_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Quote and Link blog format and Blockquote shortcode</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Font style', 'qode'); ?></td>
							<td>

								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[quote_link_blockqoute_fontsize]" type="text" value="<?php if (isset($options['quote_link_blockqoute_fontsize'])) { echo esc_attr($options['quote_link_blockqoute_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[quote_link_blockqoute_lineheight]" type="text" value="<?php if (isset($options['quote_link_blockqoute_lineheight'])) { echo esc_attr($options['quote_link_blockqoute_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Portfolio</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Categories Filter', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['portfolio_filter_color']){ echo 'background-color:'.esc_attr($options['portfolio_filter_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[portfolio_filter_color]" type="text" value="<?php if (isset($options['portfolio_filter_color'])) { echo esc_attr($options['portfolio_filter_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[portfolio_filter_font_family]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['portfolio_filter_font_family']) && $options['portfolio_filter_font_family'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[portfolio_filter_font_size]" type="text" value="<?php if (isset($options['portfolio_filter_font_size'])) { echo esc_attr($options['portfolio_filter_font_size'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[portfolio_filter_line_height]" type="text" value="<?php if (isset($options['portfolio_filter_line_height'])) { echo esc_attr($options['portfolio_filter_line_height'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[portfolio_filter_font_style]">
										<option <?php if (isset($options['portfolio_filter_font_style']) && $options['portfolio_filter_font_style'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['portfolio_filter_font_style']) && $options['portfolio_filter_font_style'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if (isset($options['portfolio_filter_font_style']) && $options['portfolio_filter_font_style'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[portfolio_filter_font_weight]">
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['portfolio_filter_font_weight']) && $options['portfolio_filter_font_weight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[portfolio_filter_letter_spacing]" type="text" value="<?php if (isset($options['portfolio_filter_letter_spacing']) && $options['portfolio_filter_letter_spacing'] !== '') { echo esc_attr($options['portfolio_filter_letter_spacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[portfolio_filter_text_transform]">
										<option <?php if (isset($options['portfolio_filter_text_transform']) && $options['portfolio_filter_text_transform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['portfolio_filter_text_transform']) && $options['portfolio_filter_text_transform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['portfolio_filter_text_transform']) && $options['portfolio_filter_text_transform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['portfolio_filter_text_transform']) && $options['portfolio_filter_text_transform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['portfolio_filter_text_transform']) && $options['portfolio_filter_text_transform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>Header and Footer</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2>Header</h2></td></tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Header in grid', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[header_in_grid]">
										<option <?php if(isset($options['header_in_grid'])){ if ($options['header_in_grid'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
										<option <?php if(isset($options['header_in_grid'])){ if ($options['header_in_grid'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Show header top area', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[header_top_area]">
										<option <?php if(isset($options['header_top_area'])){ if ($options['header_top_area'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
										<option <?php if(isset($options['header_top_area'])){ if ($options['header_top_area'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Scroll header top area', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[header_top_area_scroll]">
										<option <?php if(isset($options['header_top_area_scroll'])){ if ($options['header_top_area_scroll'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
										<option <?php if(isset($options['header_top_area_scroll'])){ if ($options['header_top_area_scroll'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>	
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Enable breadcrumbs', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[enable_breadcrumbs]">
										<option <?php if(isset($options['enable_breadcrumbs'])){ if ($options['enable_breadcrumbs'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
										<option <?php if(isset($options['enable_breadcrumbs'])){ if ($options['enable_breadcrumbs'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Enable Qode Search', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[enable_search]">
										<option <?php if(isset($options['enable_search'])){ if ($options['enable_search'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
										<option <?php if(isset($options['enable_search'])){ if ($options['enable_search'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>	
									</select>
								</div>
							</td>
						</tr>
						<?php if(isset($options['enable_search']) && $options['enable_search'] == 'yes') { ?>
							<tr>
								<td valign="middle" width="150"><?php esc_html_e('Qode Search Background Color', 'qode'); ?></td>
								<td>
									<div class="inline">
										<div class="colorSelector"><div style="<?php if (isset($options['search_background_color'])){ echo 'background-color:'.esc_attr($options['search_background_color'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[search_background_color]" type="text" value="<?php if (isset($options['search_background_color'])) { echo esc_attr($options['search_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
								</td>
							</tr>
							<tr>
								<td valign="middle" width="150"><?php esc_html_e('Qode Search Text Color', 'qode'); ?></td>
								<td>
									<div class="inline">
										<div class="colorSelector"><div style="<?php if (isset($options['search_text_color'])){ echo 'background-color:'.esc_attr($options['search_text_color'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[search_text_color]" type="text" value="<?php if (isset($options['search_text_color'])) { echo esc_attr($options['search_text_color'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
								</td>
							</tr>

						<?php } ?>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Header bottom appearance', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[header_bottom_appearance]">
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "regular") { echo "selected='selected'"; }} ?> value="regular">Regular</option>
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "fixed") { echo "selected='selected'"; }} ?> value="fixed">Fixed</option>
                                        <option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "fixed_hiding") { echo "selected='selected'"; }} ?> value="fixed_hiding">Fixed with hiding menu (logo is centered)</option>
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "stick") { echo "selected='selected'"; }} ?> value="stick">Sticky</option>
										<option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "stick menu_bottom") { echo "selected='selected'"; }} ?> value="stick menu_bottom">Sticky with menu on bottom</option>
                                        <option <?php if(isset($options['header_bottom_appearance'])){ if ($options['header_bottom_appearance'] == "stick_with_left_right_menu") { echo "selected='selected'"; }} ?> value="stick_with_left_right_menu">Sticky with left and right menu (centered logo)</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Header style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[header_style]">
										<option <?php if(isset($options['header_style'])){ if ($options['header_style'] == "") { echo "selected='selected'"; }} ?> value=""></option>
										<option <?php if(isset($options['header_style'])){ if ($options['header_style'] == "light") { echo "selected='selected'"; }} ?> value="light">Light</option>
										<option <?php if(isset($options['header_style'])){ if ($options['header_style'] == "dark") { echo "selected='selected'"; }} ?> value="dark">Dark</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Menu position', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[menu_position]">
										<option <?php if(isset($options['menu_position'])){ if ($options['menu_position'] == "") { echo "selected='selected'"; }} ?> value="">Deafult</option>
										<option <?php if(isset($options['menu_position'])){ if ($options['menu_position'] == "center") { echo "selected='selected'"; }} ?> value="center">Center</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Top background color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['header_top_background_color']){ echo 'background-color:'.esc_attr($options['header_top_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[header_top_background_color]" type="text" value="<?php if (isset($options['header_top_background_color'])) { echo esc_attr($options['header_top_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Bottom background color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Initial', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['header_background_color']){ echo 'background-color:'.esc_attr($options['header_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[header_background_color]" type="text" value="<?php if (isset($options['header_background_color'])) { echo esc_attr($options['header_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Scrolled (fixed style)', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['header_background_color_scroll'])) { if($options['header_background_color_scroll']){ echo 'background-color:'.esc_attr($options['header_background_color_scroll'], 'qode').';'; } }?>"></div></div>
									<input name="qode_options_proya[header_background_color_scroll]" type="text" value="<?php if (isset($options['header_background_color_scroll'])) { echo esc_attr($options['header_background_color_scroll'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Sticky', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['header_background_color_sticky'])) { if($options['header_background_color_sticky']){ echo 'background-color:'.esc_attr($options['header_background_color_sticky'], 'qode').';'; } }?>"></div></div>
									<input name="qode_options_proya[header_background_color_sticky]" type="text" value="<?php if (isset($options['header_background_color_sticky'])) { echo esc_attr($options['header_background_color_sticky'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Header Bottom Border Color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Initial', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['header_bottom_border_color']) && $options['header_bottom_border_color']){ echo 'background-color:'.esc_attr($options['header_bottom_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[header_bottom_border_color]" type="text" value="<?php if (isset($options['header_bottom_border_color'])) { echo esc_attr($options['header_bottom_border_color'], 'qode'); } ?>" size="10" maxlength="30" />
									<?php esc_html_e('If field is empty, header will not have border bottom', 'qode'); ?>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Header bottom border transparency', 'qode'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_proya[header_botom_border_transparency]" type="text" value="<?php if (isset($options['header_botom_border_transparency'])) { echo esc_attr($options['header_botom_border_transparency'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<?php esc_html_e('Work only if Header Bottom Border Color is filled', 'qode'); ?>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Header separator color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['header_separator_color']) && $options['header_separator_color']){ echo 'background-color:'.esc_attr($options['header_separator_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[header_separator_color]" type="text" value="<?php if (isset($options['header_separator_color'])) { echo esc_attr($options['header_separator_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Breadcrumbs color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['breadcrumbs_color']) && $options['breadcrumbs_color']){ echo 'background-color:'.esc_attr($options['breadcrumbs_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[breadcrumbs_color]" type="text" value="<?php if (isset($options['breadcrumbs_color'])) { echo esc_attr($options['breadcrumbs_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Transparency', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Initial', 'qode'); ?>
									<input name="qode_options_proya[header_background_transparency_initial]" type="text" value="<?php if (isset($options['header_background_transparency_initial'])) { echo esc_attr($options['header_background_transparency_initial'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Scrolled (fixed style)', 'qode'); ?>
									<input name="qode_options_proya[header_background_transparency_scroll]" type="text" value="<?php if (isset($options['header_background_transparency_scroll'])) { echo esc_attr($options['header_background_transparency_scroll'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Sticky', 'qode'); ?>
									<input name="qode_options_proya[header_background_transparency_sticky]" type="text" value="<?php if (isset($options['header_background_transparency_sticky'])) { echo esc_attr($options['header_background_transparency_sticky'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td valign="top" width="150"><?php esc_html_e('Logo', 'qode'); ?></td>
							<td>
								<div class="inline" style="width: 700px;">
									<?php esc_html_e('Logo image - normal', 'qode'); ?><br/>
									<input type="text" id="logo_image" name="qode_options_proya[logo_image]" class="logo_image" value="<?php if (isset($options['logo_image'])) { echo esc_attr($options['logo_image'], 'qode'); } else { echo QODE_ROOT."/img/logo.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div><br/><br/>
								<div class="inline" style="width: 700px;">
									<?php esc_html_e('Logo image - light', 'qode'); ?><br/>
									<input type="text" id="logo_image_light" name="qode_options_proya[logo_image_light]" class="logo_image_light" value="<?php if (isset($options['logo_image_light'])) { echo esc_attr($options['logo_image_light'], 'qode'); } else { echo QODE_ROOT."/img/logo.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div><br/><br/>
								<div class="inline" style="width: 700px;">
									<?php esc_html_e('Logo image - dark', 'qode'); ?><br/>
									<input type="text" id="logo_image_dark" name="qode_options_proya[logo_image_dark]" class="logo_image_dark" value="<?php if (isset($options['logo_image_dark'])) { echo esc_attr($options['logo_image_dark'], 'qode'); } else { echo QODE_ROOT."/img/logo_black.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div><br/><br/>
								<div class="inline"style="width: 700px;">
									<?php esc_html_e('Logo image - sticky header', 'qode'); ?><br/>
									<input type="text" id="logo_image_sticky" name="qode_options_proya[logo_image_sticky]" class="logo_image_sticky" value="<?php if (isset($options['logo_image_sticky'])) { echo esc_attr($options['logo_image_sticky'], 'qode'); } else { echo QODE_ROOT."/img/logo_black.png"; } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
                                <br/><br/>
                                <div class="inline"style="width: 700px;">
                                    <?php esc_html_e('Logo image - fixed header with hidden menu', 'qode'); ?><br/>
                                    <input type="text" id="logo_image_fixed_hidden" name="qode_options_proya[logo_image_fixed_hidden]" class="qode_upload_field" value="<?php if (isset($options['logo_image_fixed_hidden'])) { echo esc_attr($options['logo_image_fixed_hidden'], 'qode'); } ?>" size="70">
                                    <input class="upload_button" type="button" value="Upload file">
                                </div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Center logo', 'qode'); ?></td>
							<td>
                                <div class="inline">
                                    <select name="qode_options_proya[center_logo_image]">
                                        <option <?php if(isset($options['center_logo_image'])){ $center_logo_image = $options['center_logo_image']; if ($center_logo_image == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
                                        <option <?php if(isset($options['center_logo_image'])){ $center_logo_image = $options['center_logo_image']; if ($center_logo_image == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
                                    </select>
                                </div>
                                <div class="inline">
                                    <?php esc_html_e('Animate centered logo', 'qode'); ?>
                                    <select name="qode_options_proya[center_logo_image_animate]">
                                        <option <?php if(isset($options['center_logo_image_animate'])){ $center_logo_image = $options['center_logo_image_animate']; if ($center_logo_image == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
                                        <option <?php if(isset($options['center_logo_image_animate'])){ $center_logo_image = $options['center_logo_image_animate']; if ($center_logo_image == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
                                    </select>
                                    <?php esc_html_e('(in this case, logo is "retina")', 'qode'); ?>
                                </div>
							</td>
						</tr>
						<tr valign="top">
								<td scope="row" width="150"><?php esc_html_e('Header height', 'qode'); ?></td>
								<td>
									<div class="inline">
										<?php esc_html_e('Initial (px)', 'qode'); ?>
										<input name="qode_options_proya[header_height]" type="text" value="<?php if (isset($options['header_height'])) { echo esc_attr($options['header_height'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Scrolled - fixed style (px)', 'qode'); ?>
										<input name="qode_options_proya[header_height_scroll]" type="text" value="<?php if (isset($options['header_height_scroll'])) { echo esc_attr($options['header_height_scroll'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Sticky (px)', 'qode'); ?>
										<input name="qode_options_proya[header_height_sticky]" type="text" value="<?php if (isset($options['header_height_sticky'])) { echo esc_attr($options['header_height_sticky'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<br/>
                                    <div class="">
                                        <?php esc_html_e('Scrolled - visible part in fixed with hidden menu style (px)', 'qode'); ?>
                                        <input name="qode_options_proya[header_height_scroll_hidden]" type="text" value="<?php if (isset($options['header_height_scroll_hidden'])) { echo esc_attr($options['header_height_scroll_hidden'], 'qode'); } ?>" size="10" maxlength="10" />
                                    </div>
								</td>
						</tr>
						<tr valign="top">
								<td scope="row" width="150"><?php esc_html_e('Scroll amount for sticky appear (px)', 'qode'); ?></td>
								<td>
									<div class="inline">
										<input name="qode_options_proya[scroll_amount_for_sticky]" type="text" value="<?php if (isset($options['scroll_amount_for_sticky'])) { echo esc_attr($options['scroll_amount_for_sticky'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
								</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Dropdown main menu', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_background_color'])){ echo 'background-color:'.esc_attr($options['dropdown_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_background_color]" type="text" value="<?php if (isset($options['dropdown_background_color'])) { echo esc_attr($options['dropdown_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Transparency (From 0 to 1)', 'qode'); ?>
									<input name="qode_options_proya[dropdown_background_transparency]" type="text" value="<?php if (isset($options['dropdown_background_transparency'])) { echo esc_attr($options['dropdown_background_transparency'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('1st level menu style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['menu_color']){ echo 'background-color:'.esc_attr($options['menu_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[menu_color]" type="text" value="<?php if ($options['menu_color']) { echo esc_attr($options['menu_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['menu_hovercolor'])){ echo 'background-color:'.esc_attr($options['menu_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[menu_hovercolor]" type="text" value="<?php if (isset($options['menu_hovercolor'])) { echo esc_attr($options['menu_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Active Color', 'qode'); ?>
									<?php
									$active_color = '';
									if(isset($options['menu_activecolor'])) {
										$active_color = $options['menu_activecolor'];
									} elseif(isset($options['menu_hovercolor'])) {
										$active_color = $options['menu_hovercolor'];
									}
									?>
									<div class="colorSelector"><div style="<?php if ($active_color !== ''){ echo 'background-color:'.esc_attr($active_color).';'; } ?>"></div></div>
									<input name="qode_options_proya[menu_activecolor]" type="text" value="<?php echo esc_attr($active_color); ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['menu_hover_background_color'])){ echo 'background-color:'.esc_attr($options['menu_hover_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[menu_hover_background_color]" type="text" value="<?php if (isset($options['menu_hover_background_color'])) { echo esc_attr($options['menu_hover_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Background Color Transparency', 'qode'); ?>
									<input name="qode_options_proya[menu_hover_background_color_transparency]" type="text" value="<?php if (isset($options['menu_hover_background_color_transparency'])) { echo esc_attr($options['menu_hover_background_color_transparency'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[menu_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['menu_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[menu_fontsize]" type="text" value="<?php if ($options['menu_fontsize']) { echo esc_attr($options['menu_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[menu_lineheight]" type="text" value="<?php if ($options['menu_lineheight']) { echo esc_attr($options['menu_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[menu_fontstyle]">
										<option <?php if ($options['menu_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['menu_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['menu_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[menu_fontweight]">
										<option <?php if ($options['menu_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['menu_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
											<option <?php if ($options['menu_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
											<option <?php if ($options['menu_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
											<option <?php if ($options['menu_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
											<option <?php if ($options['menu_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
											<option <?php if ($options['menu_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
											<option <?php if ($options['menu_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
											<option <?php if ($options['menu_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[menu_letterspacing]" type="text" value="<?php if (isset($options['menu_letterspacing']) && $options['menu_letterspacing'] !== '') { echo esc_attr($options['menu_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text transform', 'qode'); ?>
									<?php $this->generate_dropdown_field('menu_text_transform', array(
										'' => '',
										'none' => 'None',
										'capitalize' => 'Capitalize',
										'uppercase' => 'Upercase',
										'lowercase' => 'Lowercase')); ?>
								</div>
								<div class="inline">
									<?php esc_html_e('Separator Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['menu_separator_color'])){ echo 'background-color:'.esc_attr($options['menu_separator_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[menu_separator_color]" type="text" value="<?php if (isset($options['menu_separator_color'])) { echo esc_attr($options['menu_separator_color'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Show Separator Between Items', 'qode'); ?>
									<input name="qode_options_proya[menu_separator_between_items]" type="checkbox" value="yes" <?php if (isset($options['menu_separator_between_items']) && $options['menu_separator_between_items'] == 'yes') { echo 'checked'; } ?> size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('2nd level menu style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_color'])){ echo 'background-color:'.esc_attr($options['dropdown_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_color]" type="text" value="<?php if (isset($options['dropdown_color'])) { echo esc_attr($options['dropdown_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_hovercolor'])){ echo 'background-color:'.esc_attr($options['dropdown_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_hovercolor]" type="text" value="<?php if (isset($options['dropdown_hovercolor'])) { echo esc_attr($options['dropdown_hovercolor'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[dropdown_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['dropdown_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'qode'); ?>
										<input name="qode_options_proya[dropdown_fontsize]" type="text" value="<?php if ($options['dropdown_fontsize']) { echo esc_attr($options['dropdown_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'qode'); ?>
										<input name="qode_options_proya[dropdown_lineheight]" type="text" value="<?php if ($options['dropdown_lineheight']) { echo esc_attr($options['dropdown_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[dropdown_fontstyle]">
											<option <?php if ($options['dropdown_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['dropdown_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
											<option <?php if ($options['dropdown_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[dropdown_fontweight]">
											<option <?php if ($options['dropdown_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if ($options['dropdown_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
											<option <?php if ($options['dropdown_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
											<option <?php if ($options['dropdown_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
											<option <?php if ($options['dropdown_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
											<option <?php if ($options['dropdown_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
											<option <?php if ($options['dropdown_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
											<option <?php if ($options['dropdown_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
											<option <?php if ($options['dropdown_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Text Transform', 'qode'); ?>
										<select name="qode_options_proya[dropdown_texttransform]">
											<option <?php if (isset($options['dropdown_texttransform']) && $options['dropdown_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if (isset($options['dropdown_texttransform']) && $options['dropdown_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
											<option <?php if (isset($options['dropdown_texttransform']) && $options['dropdown_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
											<option <?php if (isset($options['dropdown_texttransform']) && $options['dropdown_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
											<option <?php if (isset($options['dropdown_texttransform']) && $options['dropdown_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
										<input name="qode_options_proya[dropdown_letterspacing]" type="text" value="<?php if (isset($options['dropdown_letterspacing']) && $options['dropdown_letterspacing'] !== '') { echo esc_attr($options['dropdown_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Padding Top/Bottom', 'qode'); ?>
										<input name="qode_options_proya[dropdown_padding_top_bottom]" type="text" value="<?php if (isset($options['dropdown_padding_top_bottom'])) { echo esc_attr($options['dropdown_padding_top_bottom'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
								<br /><br />
								<div class="inline">
									<?php esc_html_e('Dropdow separator between items(Only for classic menu style(not wide))', 'qode'); ?>
									<select name="qode_options_proya[dropdown_separator_beetwen_items]">
										<option <?php if(isset($options['dropdown_separator_beetwen_items'])){ $dropdown_separator_beetwen_items = $options['dropdown_separator_beetwen_items']; if ($dropdown_separator_beetwen_items == '') { echo "selected='selected'"; } } ?> value=""></option>
										<option <?php if(isset($options['dropdown_separator_beetwen_items'])){ $dropdown_separator_beetwen_items = $options['dropdown_separator_beetwen_items']; if ($dropdown_separator_beetwen_items == 'no') { echo "selected='selected'"; } } ?> value="no">no</option>
										<option <?php if(isset($options['dropdown_separator_beetwen_items'])){ $dropdown_separator_beetwen_items = $options['dropdown_separator_beetwen_items']; if ($dropdown_separator_beetwen_items == 'yes') { echo "selected='selected'"; } } ?> value="yes">yes</option>
									</select>
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Border around dropdown menu', 'qode'); ?>
									<select name="qode_options_proya[dropdown_border_around]">
										<option <?php if(isset($options['dropdown_border_around'])){ $dropdown_border_around = $options['dropdown_border_around']; if ($dropdown_border_around == '') { echo "selected='selected'"; } } ?> value=""></option>
										<option <?php if(isset($options['dropdown_border_around'])){ $dropdown_border_around = $options['dropdown_border_around']; if ($dropdown_border_around == 'no') { echo "selected='selected'"; } } ?> value="no">no</option>
										<option <?php if(isset($options['dropdown_border_around'])){ $dropdown_border_around = $options['dropdown_border_around']; if ($dropdown_border_around == 'yes') { echo "selected='selected'"; } } ?> value="yes">yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('2nd level menu style for wide menu', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_wide_color'])){ echo 'background-color:'.esc_attr($options['dropdown_wide_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_wide_color]" type="text" value="<?php if (isset($options['dropdown_wide_color'])) { echo esc_attr($options['dropdown_wide_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_wide_hovercolor'])){ echo 'background-color:'.esc_attr($options['dropdown_wide_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_wide_hovercolor]" type="text" value="<?php if (isset($options['dropdown_wide_hovercolor'])) { echo esc_attr($options['dropdown_wide_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[dropdown_wide_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (isset($options['dropdown_wide_google_fonts']) && $options['dropdown_wide_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[dropdown_wide_fontsize]" type="text" value="<?php if (isset($options['dropdown_wide_fontsize'])) { echo esc_attr($options['dropdown_wide_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[dropdown_wide_lineheight]" type="text" value="<?php if (isset($options['dropdown_wide_lineheight'])) { echo esc_attr($options['dropdown_wide_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[dropdown_wide_fontstyle]">
										<option <?php if (isset($options['dropdown_wide_fontstyle']) && $options['dropdown_wide_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['dropdown_wide_fontstyle']) && $options['dropdown_wide_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if (isset($options['dropdown_wide_fontstyle']) && $options['dropdown_wide_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[dropdown_wide_fontweight]">
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['dropdown_wide_fontweight']) && $options['dropdown_wide_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[dropdown_wide_texttransform]">
										<option <?php if (isset($options['dropdown_wide_texttransform']) && $options['dropdown_wide_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['dropdown_wide_texttransform']) && $options['dropdown_wide_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['dropdown_wide_texttransform']) && $options['dropdown_wide_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['dropdown_wide_texttransform']) && $options['dropdown_wide_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['dropdown_wide_texttransform']) && $options['dropdown_wide_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[dropdown_wide_letterspacing]" type="text" value="<?php if (isset($options['dropdown_wide_letterspacing']) && $options['dropdown_wide_letterspacing'] !== '') { echo esc_attr($options['dropdown_wide_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>

							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('3rd level menu style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_color_thirdlvl'])){ echo 'background-color:'.esc_attr($options['dropdown_color_thirdlvl'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_color_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_color_thirdlvl'])) { echo esc_attr($options['dropdown_color_thirdlvl'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['dropdown_hovercolor_thirdlvl'])){ echo 'background-color:'.esc_attr($options['dropdown_hovercolor_thirdlvl'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[dropdown_hovercolor_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_hovercolor_thirdlvl'])) { echo esc_attr($options['dropdown_hovercolor_thirdlvl'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[dropdown_google_fonts_thirdlvl]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['dropdown_google_fonts_thirdlvl'])){ $dropdown_google_fonts_thirdlvl = $options['dropdown_google_fonts_thirdlvl']; if ($dropdown_google_fonts_thirdlvl == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'qode'); ?>
										<input name="qode_options_proya[dropdown_fontsize_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_fontsize_thirdlvl'])) { echo esc_attr($options['dropdown_fontsize_thirdlvl'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'qode'); ?>
										<input name="qode_options_proya[dropdown_lineheight_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_lineheight_thirdlvl'])) { echo esc_attr($options['dropdown_lineheight_thirdlvl'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[dropdown_fontstyle_thirdlvl]">
											<option <?php if(isset($options['dropdown_fontstyle_thirdlvl'])){ $dropdown_fontstyle_thirdlvl = $options['dropdown_fontstyle_thirdlvl']; if ($dropdown_fontstyle_thirdlvl == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['dropdown_fontstyle_thirdlvl'])){ $dropdown_fontstyle_thirdlvl = $options['dropdown_fontstyle_thirdlvl']; if ($dropdown_fontstyle_thirdlvl == 'normal') { echo "selected='selected'"; } } ?> value="normal">normal</option>
											<option <?php if(isset($options['dropdown_fontstyle_thirdlvl'])){ $dropdown_fontstyle_thirdlvl = $options['dropdown_fontstyle_thirdlvl']; if ($dropdown_fontstyle_thirdlvl == 'italic') { echo "selected='selected'"; } } ?> value="italic">italic</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[dropdown_fontweight_thirdlvl]">
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '200') { echo "selected='selected'"; } } ?> value="200">200</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '300') { echo "selected='selected'"; } } ?> value="300">300</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '400') { echo "selected='selected'"; } } ?> value="400">400</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '500') { echo "selected='selected'"; } } ?> value="500">500</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '600') { echo "selected='selected'"; } } ?> value="600">600</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '700') { echo "selected='selected'"; } } ?> value="700">700</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '800') { echo "selected='selected'"; } } ?> value="800">800</option>
											<option <?php if(isset($options['dropdown_fontweight_thirdlvl'])){ $dropdown_fontweight_thirdlvl = $options['dropdown_fontweight_thirdlvl']; if ($dropdown_fontweight_thirdlvl == '900') { echo "selected='selected'"; } } ?> value="900">900</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Text Transform', 'qode'); ?>
										<select name="qode_options_proya[dropdown_texttransform_thirdlvl]">
											<option <?php if (isset($options['dropdown_texttransform_thirdlvl']) && $options['dropdown_texttransform_thirdlvl'] == "") { echo "selected='selected'"; } ?> value=""></option>
											<option <?php if (isset($options['dropdown_texttransform_thirdlvl']) && $options['dropdown_texttransform_thirdlvl'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
											<option <?php if (isset($options['dropdown_texttransform_thirdlvl']) && $options['dropdown_texttransform_thirdlvl'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
											<option <?php if (isset($options['dropdown_texttransform_thirdlvl']) && $options['dropdown_texttransform_thirdlvl'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
											<option <?php if (isset($options['dropdown_texttransform_thirdlvl']) && $options['dropdown_texttransform_thirdlvl'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
										<input name="qode_options_proya[dropdown_letterspacing_thirdlvl]" type="text" value="<?php if (isset($options['dropdown_letterspacing_thirdlvl']) && $options['dropdown_letterspacing_thirdlvl'] !== '') { echo esc_attr($options['dropdown_letterspacing_thirdlvl'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Fixed menu', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['fixed_color'])){ echo 'background-color:'.esc_attr($options['fixed_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[fixed_color]" type="text" value="<?php if (isset($options['fixed_color'])) { echo esc_attr($options['fixed_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['fixed_hovercolor'])){ echo 'background-color:'.esc_attr($options['fixed_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[fixed_hovercolor]" type="text" value="<?php if (isset($options['fixed_hovercolor'])) { echo esc_attr($options['fixed_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[fixed_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['fixed_google_fonts'])){ $fixed_google_fonts = $options['fixed_google_fonts']; if ($fixed_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'qode'); ?>
										<input name="qode_options_proya[fixed_fontsize]" type="text" value="<?php if (isset($options['fixed_fontsize'])) { echo esc_attr($options['fixed_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'qode'); ?>
										<input name="qode_options_proya[fixed_lineheight]" type="text" value="<?php if (isset($options['fixed_lineheight'])) { echo esc_attr($options['fixed_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[fixed_fontstyle]">
											<option <?php if(isset($options['fixed_fontstyle'])){ $fixed_fontstyle = $options['fixed_fontstyle']; if ($fixed_fontstyle == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['fixed_fontstyle'])){ $fixed_fontstyle = $options['fixed_fontstyle']; if ($fixed_fontstyle == 'normal') { echo "selected='selected'"; } } ?> value="normal">normal</option>
											<option <?php if(isset($options['fixed_fontstyle'])){ $fixed_fontstyle = $options['fixed_fontstyle']; if ($fixed_fontstyle == 'italic') { echo "selected='selected'"; } } ?> value="italic">italic</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[fixed_fontweight]">
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '200') { echo "selected='selected'"; } } ?> value="200">200</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '300') { echo "selected='selected'"; } } ?> value="300">300</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '400') { echo "selected='selected'"; } } ?> value="400">400</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '500') { echo "selected='selected'"; } } ?> value="500">500</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '600') { echo "selected='selected'"; } } ?> value="600">600</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '700') { echo "selected='selected'"; } } ?> value="700">700</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '800') { echo "selected='selected'"; } } ?> value="800">800</option>
											<option <?php if(isset($options['fixed_fontweight'])){ $fixed_fontweight = $options['fixed_fontweight']; if ($fixed_fontweight == '900') { echo "selected='selected'"; } } ?> value="900">900</option>
										</select>
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Sticky menu', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['sticky_color'])){ echo 'background-color:'.esc_attr($options['sticky_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[sticky_color]" type="text" value="<?php if (isset($options['sticky_color'])) { echo esc_attr($options['sticky_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['sticky_hovercolor'])){ echo 'background-color:'.esc_attr($options['sticky_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[sticky_hovercolor]" type="text" value="<?php if (isset($options['sticky_hovercolor'])) { echo esc_attr($options['sticky_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[sticky_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['sticky_google_fonts'])){ $sticky_google_fonts = $options['sticky_google_fonts']; if ($sticky_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'qode'); ?>
										<input name="qode_options_proya[sticky_fontsize]" type="text" value="<?php if (isset($options['sticky_fontsize'])) { echo esc_attr($options['sticky_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'qode'); ?>
										<input name="qode_options_proya[sticky_lineheight]" type="text" value="<?php if (isset($options['sticky_lineheight'])) { echo esc_attr($options['sticky_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[sticky_fontstyle]">
											<option <?php if(isset($options['sticky_fontstyle'])){ $sticky_fontstyle = $options['sticky_fontstyle']; if ($sticky_fontstyle == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['sticky_fontstyle'])){ $sticky_fontstyle = $options['sticky_fontstyle']; if ($sticky_fontstyle == 'normal') { echo "selected='selected'"; } } ?> value="normal">normal</option>
											<option <?php if(isset($options['sticky_fontstyle'])){ $sticky_fontstyle = $options['sticky_fontstyle']; if ($sticky_fontstyle == 'italic') { echo "selected='selected'"; } } ?> value="italic">italic</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[sticky_fontweight]">
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '200') { echo "selected='selected'"; } } ?> value="200">200</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '300') { echo "selected='selected'"; } } ?> value="300">300</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '400') { echo "selected='selected'"; } } ?> value="400">400</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '500') { echo "selected='selected'"; } } ?> value="500">500</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '600') { echo "selected='selected'"; } } ?> value="600">600</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '700') { echo "selected='selected'"; } } ?> value="700">700</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '800') { echo "selected='selected'"; } } ?> value="800">800</option>
											<option <?php if(isset($options['sticky_fontweight'])){ $sticky_fontweight = $options['sticky_fontweight']; if ($sticky_fontweight == '900') { echo "selected='selected'"; } } ?> value="900">900</option>
										</select>
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Mobile menu style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['mobile_color'])){ echo 'background-color:'.esc_attr($options['mobile_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[mobile_color]" type="text" value="<?php if (isset($options['mobile_color'])) { echo esc_attr($options['mobile_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover/Active color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['mobile_hovercolor'])){ echo 'background-color:'.esc_attr($options['mobile_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[mobile_hovercolor]" type="text" value="<?php if (isset($options['mobile_hovercolor'])) { echo esc_attr($options['mobile_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[mobile_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['mobile_google_fonts'])){ $mobile_google_fonts = $options['mobile_google_fonts']; if ($mobile_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font size (px)', 'qode'); ?>
										<input name="qode_options_proya[mobile_fontsize]" type="text" value="<?php if (isset($options['mobile_fontsize'])) { echo esc_attr($options['mobile_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Line height (px)', 'qode'); ?>
										<input name="qode_options_proya[mobile_lineheight]" type="text" value="<?php if (isset($options['mobile_lineheight'])) { echo esc_attr($options['mobile_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
									<div class="inline">
										<?php esc_html_e('Font style', 'qode'); ?>
										<select name="qode_options_proya[mobile_fontstyle]">
											<option <?php if(isset($options['mobile_fontstyle'])){ $mobile_fontstyle = $options['mobile_fontstyle']; if ($mobile_fontstyle == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['mobile_fontstyle'])){ $mobile_fontstyle = $options['mobile_fontstyle']; if ($mobile_fontstyle == 'normal') { echo "selected='selected'"; } } ?> value="normal">normal</option>
											<option <?php if(isset($options['mobile_fontstyle'])){ $mobile_fontstyle = $options['mobile_fontstyle']; if ($mobile_fontstyle == 'italic') { echo "selected='selected'"; } } ?> value="italic">italic</option>
										</select>
									</div>
									<div class="inline">
										<?php esc_html_e('Font weight', 'qode'); ?>
										<select name="qode_options_proya[mobile_fontweight]">
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '') { echo "selected='selected'"; } } ?> value=""></option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '200') { echo "selected='selected'"; } } ?> value="200">200</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '300') { echo "selected='selected'"; } } ?> value="300">300</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '400') { echo "selected='selected'"; } } ?> value="400">400</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '500') { echo "selected='selected'"; } } ?> value="500">500</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '600') { echo "selected='selected'"; } } ?> value="600">600</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '700') { echo "selected='selected'"; } } ?> value="700">700</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '800') { echo "selected='selected'"; } } ?> value="800">800</option>
											<option <?php if(isset($options['mobile_fontweight'])){ $mobile_fontweight = $options['mobile_fontweight']; if ($mobile_fontweight == '900') { echo "selected='selected'"; } } ?> value="900">900</option>
										</select>
									</div><br /><br />
									<div class="inline">
										<?php esc_html_e('Separator color', 'qode'); ?>
										<div class="colorSelector"><div style="<?php if (isset($options['mobile_separator_color'])){ echo 'background-color:'.esc_attr($options['mobile_separator_color'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[mobile_separator_color]" type="text" value="<?php if (isset($options['mobile_separator_color'])) { echo esc_attr($options['mobile_separator_color'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
									<div class="inline">
										<?php esc_html_e('Background color', 'qode'); ?>
										<div class="colorSelector"><div style="<?php if (isset($options['mobile_background_color'])){ echo 'background-color:'.esc_attr($options['mobile_background_color'], 'qode').';'; } ?>"></div></div>
										<input name="qode_options_proya[mobile_background_color]" type="text" value="<?php if (isset($options['mobile_background_color'])) { echo esc_attr($options['mobile_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
									</div>
									<div class="inline">
										<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
										<input name="qode_options_proya[mobile_letter_spacing]" type="text" value="<?php if (isset($options['mobile_letter_spacing'])) { echo esc_attr($options['mobile_letter_spacing'], 'qode'); } ?>" size="10" maxlength="10" />
									</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Top Header', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['top_header_text_color'])){ echo 'background-color:'.esc_attr($options['top_header_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[top_header_text_color]" type="text" value="<?php if (isset($options['top_header_text_color'])) { echo esc_attr($options['top_header_text_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['mobile_hovercolor'])){ echo 'background-color:'.esc_attr($options['mobile_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[top_header_text_hover_color]" type="text" value="<?php if (isset($options['top_header_text_hover_color'])) { echo esc_attr($options['top_header_text_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[top_header_text_font_family]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if(isset($options['top_header_text_font_family'])){ $mobile_google_fonts = $options['top_header_text_font_family']; if ($mobile_google_fonts == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[top_header_text_font_size]" type="text" value="<?php if (isset($options['top_header_text_font_size'])) { echo esc_attr($options['top_header_text_font_size'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[top_header_text_line_height]" type="text" value="<?php if (isset($options['top_header_text_line_height'])) { echo esc_attr($options['top_header_text_line_height'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[top_header_text_font_style]">
										<option <?php if(isset($options['top_header_text_font_style'])){ $top_header_text_font_style = $options['top_header_text_font_style']; if ($top_header_text_font_style == '') { echo "selected='selected'"; } } ?> value=""></option>
										<option <?php if(isset($options['top_header_text_font_style'])){ $top_header_text_font_stylee = $options['top_header_text_font_style']; if ($top_header_text_font_style == 'normal') { echo "selected='selected'"; } } ?> value="normal">normal</option>
										<option <?php if(isset($options['top_header_text_font_style'])){ $top_header_text_font_style = $options['top_header_text_font_style']; if ($top_header_text_font_style == 'italic') { echo "selected='selected'"; } } ?> value="italic">italic</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[top_header_text_font_weight]">
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '') { echo "selected='selected'"; } } ?> value=""></option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '200') { echo "selected='selected'"; } } ?> value="200">200</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '300') { echo "selected='selected'"; } } ?> value="300">300</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '400') { echo "selected='selected'"; } } ?> value="400">400</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '500') { echo "selected='selected'"; } } ?> value="500">500</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '600') { echo "selected='selected'"; } } ?> value="600">600</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '700') { echo "selected='selected'"; } } ?> value="700">700</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '800') { echo "selected='selected'"; } } ?> value="800">800</option>
										<option <?php if(isset($options['top_header_text_font_weight'])){ $top_header_text_font_weight = $options['top_header_text_font_weight']; if ($top_header_text_font_weight == '900') { echo "selected='selected'"; } } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[top_header_text_letter_spacing]" type="text" value="<?php if (isset($options['top_header_text_letter_spacing'])) { echo esc_attr($options['top_header_text_letter_spacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<br /><br />
								<div class="inline">
									<?php esc_html_e('Border color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['top_header_border_color'])){ echo 'background-color:'.esc_attr($options['top_header_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[top_header_border_color]" type="text" value="<?php if (isset($options['top_header_border_color'])) { echo esc_attr($options['top_header_border_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Weight (px)', 'qode'); ?>
									<input name="qode_options_proya[top_header_border_weight]" type="text" value="<?php if (isset($options['top_header_border_weight'])) { echo esc_attr($options['top_header_border_weight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Title', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Animate title area', 'qode'); ?>
									<select name="qode_options_proya[animate_title_area]">
										<option <?php if(isset($options['animate_title_area'])){ $animate_title_area = $options['animate_title_area']; if ($animate_title_area == 'no') { echo "selected='selected'"; } } ?> value="no">No animation</option>
										<option <?php if(isset($options['animate_title_area'])){ $animate_title_area = $options['animate_title_area']; if ($animate_title_area == 'text_right_left') { echo "selected='selected'"; } } ?> value="text_right_left">Text right to left</option>
										<option <?php if(isset($options['animate_title_area'])){ $animate_title_area = $options['animate_title_area']; if ($animate_title_area == 'area_top_bottom') { echo "selected='selected'"; } } ?> value="area_top_bottom">Title area top to bottom</option>
									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Text shadow', 'qode'); ?>
									<select name="qode_options_proya[title_text_shadow]">
										<option <?php if(isset($options['title_text_shadow'])){ $title_text_shadow = $options['title_text_shadow']; if ($title_text_shadow == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['title_text_shadow'])){ $title_text_shadow = $options['title_text_shadow']; if ($title_text_shadow == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['title_background_color'])){ echo 'background-color:'.esc_attr($options['title_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[title_background_color]" type="text" value="<?php if (isset($options['title_background_color'])) { echo esc_attr($options['title_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Responsive title image', 'qode'); ?>
									<select name="qode_options_proya[responsive_title_image]">
										<option <?php if(isset($options['responsive_title_image'])){ $responsive_title_image = $options['responsive_title_image']; if ($responsive_title_image == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['responsive_title_image'])){ $responsive_title_image = $options['responsive_title_image']; if ($responsive_title_image == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Parallax title image', 'qode'); ?>
									<select name="qode_options_proya[fixed_title_image]">
										<option <?php if(isset($options['fixed_title_image'])){ $fixed_title_image = $options['fixed_title_image']; if ($fixed_title_image == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['fixed_title_image'])){ $fixed_title_image = $options['fixed_title_image']; if ($fixed_title_image == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
										<option <?php if(isset($options['fixed_title_image'])){ $fixed_title_image = $options['fixed_title_image']; if ($fixed_title_image == 'yes_zoom') { echo "selected='selected'"; } } ?> value="yes_zoom">Yes, with zoom out</option>
									</select>
									<?php esc_html_e('Only if title image is not responsive', 'qode'); ?>
								</div>
								<br/><br/>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Title image', 'qode'); ?>
									<input type="text" id="title_image" name="qode_options_proya[title_image]" class="title_image" value="<?php if (isset($options['title_image'])) { echo esc_attr($options['title_image'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
								<br/><br/>
								<div class="inline" style="width: 880px;">
									<?php esc_html_e('Title pattern overlay image', 'qode'); ?>
									<input type="text" id="title_overlay_image" name="qode_options_proya[title_overlay_image]" class="title_overlay_image" value="<?php if (isset($options['title_overlay_image'])) { echo esc_attr($options['title_overlay_image'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Title height (px)', 'qode'); ?>
									<input name="qode_options_proya[title_height]" type="text" value="<?php if (isset($options['title_height'])) { echo esc_attr($options['title_height'], 'qode'); } ?>" size="10" maxlength="10" />
									<?php esc_html_e('Only if title image is not responsive', 'qode'); ?>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Title position', 'qode'); ?>
									<select name="qode_options_proya[page_title_position]">
										<option <?php if ($options['page_title_position'] == 'left') { echo "selected='selected'"; } ?> value="left">Left</option>
										<option <?php if ($options['page_title_position'] == 'center') { echo "selected='selected'"; } ?> value="center">Center</option>
										<option <?php if ($options['page_title_position'] == 'right') { echo "selected='selected'"; } ?> value="right">Right</option>
									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Show title separator', 'qode'); ?>
									<select name="qode_options_proya[title_separator]">
										<option <?php if(isset($options['title_separator'])){ $title_separator = $options['title_separator']; if ($title_separator == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['title_separator'])){ $title_separator = $options['title_separator']; if ($title_separator == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Title Separator Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['title_separator_color']) && $options['title_separator_color']){ echo 'background-color:'.esc_attr($options['title_separator_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[title_separator_color]" type="text" value="<?php if (isset($options['title_separator_color'])) { echo esc_attr($options['title_separator_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Title Separator Width (px)', 'qode'); ?>
									<input name="qode_options_proya[title_separator_width]" type="text" value="<?php if (isset($options['title_separator_width'])) { echo esc_attr($options['title_separator_width'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Predefined title sizes', 'qode'); ?>
									<select name="qode_options_proya[predefined_title_sizes]">
										<option <?php if (isset($options['predefined_title_sizes']) && $options['predefined_title_sizes'] == 'small') { echo "selected='selected'"; } ?> value="small">Small</option>
										<option <?php if (isset($options['predefined_title_sizes']) && $options['predefined_title_sizes'] == 'medium') { echo "selected='selected'"; } ?> value="medium">Medium</option>
										<option <?php if (isset($options['predefined_title_sizes']) && $options['predefined_title_sizes'] == 'large') { echo "selected='selected'"; } ?> value="large">Large</option>
									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Border Bottom on Title Area', 'qode'); ?>
									<select name="qode_options_proya[border_bottom_title_area]">
										<option <?php if(isset($options['border_bottom_title_area'])){ $border_bottom_title_area = $options['border_bottom_title_area']; if ($border_bottom_title_area == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['border_bottom_title_area'])){ $border_bottom_title_area = $options['border_bottom_title_area']; if ($border_bottom_title_area == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Border Bottom on Title Area Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['border_bottom_title_area_color']) && $options['border_bottom_title_area_color']){ echo 'background-color:'.esc_attr($options['border_bottom_title_area_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[border_bottom_title_area_color]" type="text" value="<?php if (isset($options['border_bottom_title_area_color'])) { echo esc_attr($options['border_bottom_title_area_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Margin after title for default template (px)', 'qode'); ?>
									<input name="qode_options_proya[margin_after_title]" type="text" value="<?php if (isset($options['margin_after_title'])) { echo esc_attr($options['margin_after_title'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
                        <tr valign="top">
                            <td scope="row" width="150"><?php esc_html_e('Header Buttons', 'qode'); ?></td>
                            <td>
                                <div class="inline">
                                    <?php esc_html_e('Color', 'qode'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['header_buttons_color']){ echo 'background-color:'.esc_attr($options['header_buttons_color'], 'qode').';'; } ?>"></div></div>
                                    <input name="qode_options_proya[header_buttons_color]" type="text" value="<?php if (isset($options['header_buttons_color']) && $options['header_buttons_color']) { echo esc_attr($options['header_buttons_color'], 'qode'); } ?>" size="10" maxlength="30" />
                                </div>
                                <br/><br/>
                                <div class="inline">
                                    <?php esc_html_e('Hover Color', 'qode'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['header_buttons_hover_color']){ echo 'background-color:'.esc_attr($options['header_buttons_hover_color'], 'qode').';'; } ?>"></div></div>
                                    <input name="qode_options_proya[header_buttons_hover_color]" type="text" value="<?php if (isset($options['header_buttons_hover_color']) && $options['header_buttons_hover_color']) { echo esc_attr($options['header_buttons_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
                                </div>
                                <br/><br/>
                                <div class="inline">
                                    <?php esc_html_e('Font Size (px)', 'qode'); ?>
                                    <input name="qode_options_proya[header_buttons_font_size]" type="text" value="<?php if (isset($options['header_buttons_font_size']) && $options['header_buttons_font_size']) { echo esc_attr($options['header_buttons_font_size'], 'qode'); } ?>" size="10" maxlength="10" />
                                </div>
                                <br/><br/>
                                <div class="inline">
                                    <?php esc_html_e('Size for side menu/fullscreen menu button', 'qode'); ?>
                                    <select name="qode_options_proya[header_buttons_size]">
                                        <option <?php if(isset($options['header_buttons_size'])) { if ($options['header_buttons_size'] == "normal") { echo "selected='selected'"; } } ?> value="normal">Normal</option>
                                        <option <?php if(isset($options['header_buttons_size'])) { if ($options['header_buttons_size'] == "medium") { echo "selected='selected'"; } } ?> value="medium">Medium</option>
                                        <option <?php if(isset($options['header_buttons_size'])) { if ($options['header_buttons_size'] == "large") { echo "selected='selected'"; } } ?> value="large">Large</option>
                                    </select>
                                </div>
                            </td>
                        </tr>
						<tr><td colspan='2'><h2>Footer</h2></td></tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Uncovering footer', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[uncovering_footer]">
										<option <?php if(isset($options['uncovering_footer'])) { if ($options['uncovering_footer'] == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
										<option <?php if(isset($options['uncovering_footer'])) { if ($options['uncovering_footer'] == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Footer in grid', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[footer_in_grid]">
										<option <?php if(isset($options['footer_in_grid'])) { if ($options['footer_in_grid'] == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['footer_in_grid'])) { if ($options['footer_in_grid'] == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Show footer top', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[show_footer_top]">
										<option <?php if(isset($options['show_footer_top'])) { if ($options['show_footer_top'] == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
										<option <?php if(isset($options['show_footer_top'])) { if ($options['show_footer_top'] == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Footer top columns', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[footer_top_columns]">
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "1") { echo "selected='selected'"; } } ?> value="1">1</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "2") { echo "selected='selected'"; } } ?> value="2">2</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "3") { echo "selected='selected'"; } } ?> value="3">3</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "5") { echo "selected='selected'"; } } ?> value="5">3(25%+25%+50%)</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "6") { echo "selected='selected'"; } } ?> value="6">3(50%+25%+25%)</option>
										<option <?php if(isset($options['footer_top_columns'])) { if ($options['footer_top_columns'] == "4") { echo "selected='selected'"; } } ?> value="4">4</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Show footer bottom', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[footer_text]">
										<option <?php if ($options['footer_text'] == "no") { echo "selected='selected'"; } ?> value="no">No</option>
										<option <?php if ($options['footer_text'] == "yes") { echo "selected='selected'"; } ?> value="yes">Yes</option>

									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Footer top colors', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Title color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_top_title_color']){ echo 'background-color:'.esc_attr($options['footer_top_title_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_top_title_color]" type="text" value="<?php if ($options['footer_top_title_color']) { echo esc_attr($options['footer_top_title_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_top_text_color']){ echo 'background-color:'.esc_attr($options['footer_top_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_top_text_color]" type="text" value="<?php if ($options['footer_top_text_color']) { echo esc_attr($options['footer_top_text_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Link color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['footer_link_color'])){ echo 'background-color:'.esc_attr($options['footer_link_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_link_color]" type="text" value="<?php if (isset($options['footer_link_color'])) { echo esc_attr($options['footer_link_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Link hover color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['footer_link_hover_color'])){ echo 'background-color:'.esc_attr($options['footer_link_hover_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_link_hover_color]" type="text" value="<?php if (isset($options['footer_link_hover_color'])){ echo esc_attr($options['footer_link_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_top_background_color']){ echo 'background-color:'.esc_attr($options['footer_top_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_top_background_color]" type="text" value="<?php if ($options['footer_top_background_color']) { echo esc_attr($options['footer_top_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Footer top title styles', 'qode'); ?></td>
							<td>
								<?php $this->generate_font_settings_section('footer_title'); ?>
							</td>
						</tr>
						<tr>
							<td scope="row" width="150"><?php esc_html_e('Footer bottom colors', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Text color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_bottom_text_color']){ echo 'background-color:'.esc_attr($options['footer_bottom_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_bottom_text_color]" type="text" value="<?php if ($options['footer_bottom_text_color']) { echo esc_attr($options['footer_bottom_text_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Link Hover color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['footer_bottom_link_hover_color']) && $options['footer_bottom_link_hover_color'] != ''){ echo 'background-color:'.esc_attr($options['footer_bottom_link_hover_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_bottom_link_hover_color]" type="text" value="<?php if (isset($options['footer_bottom_link_hover_color']) && $options['footer_bottom_link_hover_color'] != '') { echo esc_attr($options['footer_bottom_link_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['footer_bottom_background_color']){ echo 'background-color:'.esc_attr($options['footer_bottom_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[footer_bottom_background_color]" type="text" value="<?php if (isset($options['footer_bottom_background_color'])) { echo esc_attr($options['footer_bottom_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>

					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>Elements</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2>Separator</h2></td></tr>
						<tr valign="middle">
							<td valign="middle">Separator Normal</td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['separator_color'])){ echo 'background-color:'.esc_attr($options['separator_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[separator_color]" type="text" value="<?php if (isset($options['separator_color'])) { echo esc_attr($options['separator_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Transparency (between 0 and 1)', 'qode'); ?>
									<input name="qode_options_proya[separator_color_transparency]" type="text" value="<?php if (isset($options['separator_color_transparency'])) { echo esc_attr($options['separator_color_transparency'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Thickness (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_thickness]" type="text" value="<?php if ($options['separator_thickness']) { echo esc_attr($options['separator_thickness'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Top margin (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_topmargin]" type="text" value="<?php if ($options['separator_topmargin']) { echo esc_attr($options['separator_topmargin'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Bottom margin (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_bottommargin]" type="text" value="<?php if ($options['separator_bottommargin']) { echo esc_attr($options['separator_bottommargin'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td valign="middle">Separator Small</td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['separator_small_color'])){ echo 'background-color:'.esc_attr($options['separator_small_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[separator_small_color]" type="text" value="<?php if (isset($options['separator_small_color'])) { echo esc_attr($options['separator_small_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Transparency (between 0 and 1)', 'qode'); ?>
									<input name="qode_options_proya[separator_small_color_transparency]" type="text" value="<?php if (isset($options['separator_small_color_transparency'])) { echo esc_attr($options['separator_small_color_transparency'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Thickness (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_small_thickness]" type="text" value="<?php if (isset($options['separator_small_thickness'])) { echo esc_attr($options['separator_small_thickness'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Width (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_small_width]" type="text" value="<?php if (isset($options['separator_small_width'])) { echo esc_attr($options['separator_small_width'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Top margin (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_small_topmargin]" type="text" value="<?php if (isset($options['separator_small_topmargin'])) { echo esc_attr($options['separator_small_topmargin'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Bottom margin (px)', 'qode'); ?>
									<input name="qode_options_proya[separator_small_bottommargin]" type="text" value="<?php if (isset($options['separator_small_bottommargin'])) { echo esc_attr($options['separator_small_bottommargin'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Buttons</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Default button style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['button_title_color']){ echo 'background-color:'.esc_attr($options['button_title_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_title_color]" type="text" value="<?php if ($options['button_title_color']) { echo esc_attr($options['button_title_color'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['button_title_hovercolor']){ echo 'background-color:'.esc_attr($options['button_title_hovercolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_title_hovercolor]" type="text" value="<?php if ($options['button_title_hovercolor']) { echo esc_attr($options['button_title_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[button_title_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['button_title_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[button_title_fontsize]" type="text" value="<?php if ($options['button_title_fontsize']) { echo esc_attr($options['button_title_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[button_title_lineheight]" type="text" value="<?php if ($options['button_title_lineheight']) { echo esc_attr($options['button_title_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Letter Spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[button_title_letter_spacing]" type="text" value="<?php if (isset($options['button_title_letter_spacing'])) { echo esc_attr($options['button_title_letter_spacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[button_title_fontstyle]">
										<option <?php if ($options['button_title_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['button_title_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['button_title_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[button_title_fontweight]">
										<option <?php if ($options['button_title_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['button_title_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['button_title_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['button_title_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['button_title_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['button_title_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['button_title_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['button_title_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['button_title_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_backgroundcolor']) && $options['button_backgroundcolor']){ echo 'background-color:'.esc_attr($options['button_backgroundcolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_backgroundcolor]" type="text" value="<?php if (isset($options['button_backgroundcolor']) && $options['button_backgroundcolor']) { echo esc_attr($options['button_backgroundcolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_backgroundcolor_hover']) && $options['button_backgroundcolor_hover']){ echo 'background-color:'.esc_attr($options['button_backgroundcolor_hover'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_backgroundcolor_hover]" type="text" value="<?php if (isset($options['button_backgroundcolor_hover']) && $options['button_backgroundcolor_hover']) { echo esc_attr($options['button_backgroundcolor_hover'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
                                <div class="inline">
                                    <?php esc_html_e('Border color', 'qode'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['button_border_color']){ echo 'background-color:'.esc_attr($options['button_border_color'], 'qode').';'; } ?>"></div></div>
                                    <input name="qode_options_proya[button_border_color]" type="text" value="<?php if ($options['button_border_color']) { echo esc_attr($options['button_border_color'], 'qode'); } ?>" size="10" maxlength="30" />
                                </div>
                                <div class="inline">
                                    <?php esc_html_e('Border Hover color', 'qode'); ?>
                                    <div class="colorSelector"><div style="<?php if ($options['button_border_hover_color']){ echo 'background-color:'.esc_attr($options['button_border_hover_color'], 'qode').';'; } ?>"></div></div>
                                    <input name="qode_options_proya[button_border_hover_color]" type="text" value="<?php if (isset($options['button_border_hover_color']) && $options['button_border_hover_color']) { echo esc_attr($options['button_border_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
                                </div>
								<div class="inline">
									<?php esc_html_e('Border Width', 'qode'); ?>
									<input name="qode_options_proya[button_border_width]" type="text" value="<?php if (isset($options['button_border_width']) && $options['button_border_width']) { echo esc_attr($options['button_border_width'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Radius (px)', 'qode'); ?>
									<input name="qode_options_proya[button_border_radius]" type="text" value="<?php if (isset($options['button_border_radius'])) { echo esc_attr($options['button_border_radius'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Predifined White Button', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_white_border_color'])){ echo 'background-color:'.esc_attr($options['button_white_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_white_border_color]" type="text" value="<?php if (isset($options['button_white_border_color'])) { echo esc_attr($options['button_white_border_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_white_background_color'])){ echo 'background-color:'.esc_attr($options['button_white_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_white_background_color]" type="text" value="<?php if (isset($options['button_white_background_color'])) { echo esc_attr($options['button_white_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_white_text_color'])){ echo 'background-color:'.esc_attr($options['button_white_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_white_text_color]" type="text" value="<?php if (isset($options['button_white_text_color'])) { echo esc_attr($options['button_white_text_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div><br /><br />
								<div class="inline">
									<?php esc_html_e('Hover Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_white_border_color_hover'])){ echo 'background-color:'.esc_attr($options['button_white_border_color_hover'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_white_border_color_hover]" type="text" value="<?php if (isset($options['button_white_border_color_hover'])) { echo esc_attr($options['button_white_border_color_hover'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_white_background_color_hover'])){ echo 'background-color:'.esc_attr($options['button_white_background_color_hover'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_white_background_color_hover]" type="text" value="<?php if (isset($options['button_white_background_color_hover'])) { echo esc_attr($options['button_white_background_color_hover'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Text Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['button_white_text_color_hover'])){ echo 'background-color:'.esc_attr($options['button_white_text_color_hover'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[button_white_text_color_hover]" type="text" value="<?php if (isset($options['button_white_text_color_hover'])) { echo esc_attr($options['button_white_text_color_hover'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Small Button', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Height (px)', 'qode'); ?>
									<input name="qode_options_proya[small_button_lineheight]" type="text" value="<?php if (isset($options['small_button_lineheight'])) { echo esc_attr($options['small_button_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[small_button_fontsize]" type="text" value="<?php if (isset($options['small_button_fontsize'])) { echo esc_attr($options['small_button_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[small_button_fontweight]">
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['small_button_fontweight']) && $options['small_button_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Padding left/right (px)', 'qode'); ?>
									<input name="qode_options_proya[small_button_padding]" type="text" value="<?php if (isset($options['small_button_padding'])) { echo esc_attr($options['small_button_padding'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Radius (px)', 'qode'); ?>
									<input name="qode_options_proya[small_button_border_radius]" type="text" value="<?php if (isset($options['small_button_border_radius'])) { echo esc_attr($options['small_button_border_radius'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Large Button', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Height (px)', 'qode'); ?>
									<input name="qode_options_proya[large_button_lineheight]" type="text" value="<?php if (isset($options['large_button_lineheight'])) { echo esc_attr($options['large_button_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[large_button_fontsize]" type="text" value="<?php if (isset($options['large_button_fontsize'])) { echo esc_attr($options['large_button_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[large_button_fontweight]">
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['large_button_fontweight']) && $options['large_button_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Padding left/right (px)', 'qode'); ?>
									<input name="qode_options_proya[large_button_padding]" type="text" value="<?php if (isset($options['large_button_padding'])) { echo esc_attr($options['large_button_padding'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Radius (px)', 'qode'); ?>
									<input name="qode_options_proya[large_button_border_radius]" type="text" value="<?php if (isset($options['large_button_border_radius'])) { echo esc_attr($options['large_button_border_radius'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Large Big Button', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Height (px)', 'qode'); ?>
									<input name="qode_options_proya[big_large_button_lineheight]" type="text" value="<?php if (isset($options['big_large_button_lineheight'])) { echo esc_attr($options['big_large_button_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[big_large_button_fontsize]" type="text" value="<?php if (isset($options['big_large_button_fontsize'])) { echo esc_attr($options['big_large_button_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[big_large_button_fontweight]">
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['big_large_button_fontweight']) && $options['big_large_button_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Padding left/right (px)', 'qode'); ?>
									<input name="qode_options_proya[big_large_button_padding]" type="text" value="<?php if (isset($options['big_large_button_padding'])) { echo esc_attr($options['big_large_button_padding'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Radius (px)', 'qode'); ?>
									<input name="qode_options_proya[big_large_button_border_radius]" type="text" value="<?php if (isset($options['big_large_button_border_radius'])) { echo esc_attr($options['big_large_button_border_radius'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Message box</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Message box style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['message_title_color']){ echo 'background-color:'.esc_attr($options['message_title_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[message_title_color]" type="text" value="<?php if ($options['message_title_color']) { echo esc_attr($options['message_title_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font family', 'qode'); ?>
									<select name="qode_options_proya[message_title_google_fonts]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if ($options['message_title_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[message_title_fontsize]" type="text" value="<?php if ($options['message_title_fontsize']) { echo esc_attr($options['message_title_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Line height (px)', 'qode'); ?>
									<input name="qode_options_proya[message_title_lineheight]" type="text" value="<?php if ($options['message_title_lineheight']) { echo esc_attr($options['message_title_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font style', 'qode'); ?>
									<select name="qode_options_proya[message_title_fontstyle]">
										<option <?php if ($options['message_title_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['message_title_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
										<option <?php if ($options['message_title_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[message_title_fontweight]">
										<option <?php if ($options['message_title_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if ($options['message_title_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if ($options['message_title_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if ($options['message_title_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if ($options['message_title_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if ($options['message_title_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if ($options['message_title_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if ($options['message_title_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if ($options['message_title_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<br/><br/>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['message_backgroundcolor']){ echo 'background-color:'.esc_attr($options['message_backgroundcolor'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[message_backgroundcolor]" type="text" value="<?php if ($options['message_backgroundcolor']) { echo esc_attr($options['message_backgroundcolor'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Message icon style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['message_icon_color']) && $options['message_icon_color']){ echo 'background-color:'.esc_attr($options['message_icon_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[message_icon_color]" type="text" value="<?php if (isset($options['message_icon_color']) && $options['message_icon_color']) { echo esc_attr($options['message_icon_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font size (px)', 'qode'); ?>
									<input name="qode_options_proya[message_icon_fontsize]" type="text" value="<?php if (isset($options['message_icon_fontsize']) && $options['message_icon_fontsize']) { echo esc_attr($options['message_icon_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Blockquote</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blockquote style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['blockquote_font_color']){ echo 'background-color:'.esc_attr($options['blockquote_font_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blockquote_font_color]" type="text" value="<?php if ($options['blockquote_font_color']) { echo esc_attr($options['blockquote_font_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blockquote_background_color']) && $options['blockquote_background_color']){ echo 'background-color:'.esc_attr($options['blockquote_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blockquote_background_color]" type="text" value="<?php if (isset($options['blockquote_background_color']) &&  $options['blockquote_background_color']) { echo esc_attr($options['blockquote_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blockquote_border_color']) && $options['blockquote_border_color']){ echo 'background-color:'.esc_attr($options['blockquote_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blockquote_border_color]" type="text" value="<?php if (isset($options['blockquote_border_color']) &&  $options['blockquote_border_color']) { echo esc_attr($options['blockquote_border_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Quote Icon Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blockquote_quote_icon_color']) && $options['blockquote_quote_icon_color']){ echo 'background-color:'.esc_attr($options['blockquote_quote_icon_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blockquote_quote_icon_color]" type="text" value="<?php if (isset($options['blockquote_quote_icon_color']) &&  $options['blockquote_quote_icon_color']) { echo esc_attr($options['blockquote_quote_icon_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Social Icon</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background Color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Icon Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_color']){ echo 'background-color:'.esc_attr($options['social_icon_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[social_icon_color]" type="text" value="<?php if (isset($options['social_icon_color']) && $options['social_icon_color']) { echo esc_attr($options['social_icon_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Icon Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_background_color']){ echo 'background-color:'.esc_attr($options['social_icon_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[social_icon_background_color]" type="text" value="<?php if (isset($options['social_icon_background_color']) && $options['social_icon_background_color']) { echo esc_attr($options['social_icon_background_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
                                <div class="inline">
									<?php esc_html_e('Icon Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['social_icon_border_color']){ echo 'background-color:'.esc_attr($options['social_icon_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[social_icon_border_color]" type="text" value="<?php if (isset($options['social_icon_border_color']) && $options['social_icon_border_color']) { echo esc_attr($options['social_icon_border_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Testimonials</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Testimonials style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Text Font Size', 'qode'); ?>
									<input name="qode_options_proya[testimonaials_font_size]" type="text" value="<?php if (isset($options['testimonaials_font_size']) && $options['testimonaials_font_size']) { echo esc_attr($options['testimonaials_font_size'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Navigation Border radius (px)', 'qode'); ?>
									<input name="qode_options_proya[testimonaials_navigation_border_radius]" type="text" value="<?php if (isset($options['testimonaials_navigation_border_radius']) && $options['testimonaials_navigation_border_radius'] !== '') { echo esc_attr($options['testimonaials_navigation_border_radius'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Counters</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Counters style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Counter Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['counter_color'])){ echo 'background-color:'.esc_attr($options['counter_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[counter_color]" type="text" value="<?php if (isset($options['counter_color']) && $options['counter_color']) { echo esc_attr($options['counter_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Counter Text Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['counter_text_color'])){ echo 'background-color:'.esc_attr($options['counter_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[counter_text_color]" type="text" value="<?php if (isset($options['counter_text_color']) && $options['counter_text_color']) { echo esc_attr($options['counter_text_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Counter Separator Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['counter_separator_color'])){ echo 'background-color:'.esc_attr($options['counter_separator_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[counter_separator_color]" type="text" value="<?php if (isset($options['counter_separator_color']) && $options['counter_separator_color']) { echo esc_attr($options['counter_separator_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Number Font Size (px)', 'qode'); ?>
									<input name="qode_options_proya[counters_font_size]" type="text" value="<?php if (isset($options['counters_font_size']) && $options['counters_font_size']) { echo esc_attr($options['counters_font_size'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Number Font family', 'qode'); ?>
									<select name="qode_options_proya[counters_font_family]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (isset($options['counters_font_family']) && $options['counters_font_family'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Number Letter Spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[counters_letter_spacing]" type="text" value="<?php if (isset($options['counters_letter_spacing']) && $options['counters_letter_spacing']) { echo esc_attr($options['counters_letter_spacing'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Numbers Font Weight', 'qode'); ?>
									<select name="qode_options_proya[counters_fontweight]">
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['counters_fontweight']) && $options['counters_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Text Font Size (px)', 'qode'); ?>
									<input name="qode_options_proya[counters_text_font_size]" type="text" value="<?php if (isset($options['counters_text_font_size']) && $options['counters_text_font_size']) { echo esc_attr($options['counters_text_font_size'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text Font family', 'qode'); ?>
									<select name="qode_options_proya[counters_text_font_family]">
										<option value="-1">Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (isset($options['counters_text_font_family']) && $options['counters_text_font_family'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Text Font Weight', 'qode'); ?>
									<select name="qode_options_proya[counters_text_fontweight]">
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['counters_text_fontweight']) && $options['counters_text_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Text Transform', 'qode'); ?>
									<select name="qode_options_proya[counters_text_texttransform]">
										<option <?php if (isset($options['counters_text_texttransform']) && $options['counters_text_texttransform'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['counters_text_texttransform']) && $options['counters_text_texttransform'] == "none") { echo "selected='selected'"; } ?> value="none">None</option>
										<option <?php if (isset($options['counters_text_texttransform']) && $options['counters_text_texttransform'] == "capitalize") { echo "selected='selected'"; } ?> value="capitalize">Capitalize</option>
										<option <?php if (isset($options['counters_text_texttransform']) && $options['counters_text_texttransform'] == "uppercase") { echo "selected='selected'"; } ?> value="uppercase">Uppercase</option>
										<option <?php if (isset($options['counters_text_texttransform']) && $options['counters_text_texttransform'] == "lowercase") { echo "selected='selected'"; } ?> value="lowercase">Lowercase</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Text Letter Spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[counters_text_letterspacing]" type="text" value="<?php if (isset($options['counters_text_letterspacing']) && $options['counters_text_letterspacing'] !== '') { echo esc_attr($options['counters_text_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Horizontal Progress Bar</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Percentage style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Font size', 'qode'); ?>
									<input name="qode_options_proya[progress_bar_horizontal_fontsize]" type="text" value="<?php if (isset($options['progress_bar_horizontal_fontsize']) && $options['progress_bar_horizontal_fontsize']) { echo esc_attr($options['progress_bar_horizontal_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font Weight', 'qode'); ?>
									<select name="qode_options_proya[progress_bar_horizontal_fontweight]">
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['progress_bar_horizontal_fontweight']) && $options['progress_bar_horizontal_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Pie Charts</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Percentage style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Font size', 'qode'); ?>
									<input name="qode_options_proya[pie_charts_fontsize]" type="text" value="<?php if (isset($options['pie_charts_fontsize']) && $options['pie_charts_fontsize']) { echo esc_attr($options['pie_charts_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font Weight', 'qode'); ?>
									<select name="qode_options_proya[pie_charts_fontweight]">
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['pie_charts_fontweight']) && $options['pie_charts_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Tabs</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Tabs style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Tab Text Size', 'qode'); ?>
									<input name="qode_options_proya[tabs_text_size]" type="text" value="<?php if (isset($options['tabs_text_size']) && $options['tabs_text_size']) { echo esc_attr($options['tabs_border_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Tab Font Weight)', 'qode'); ?>
									<select name="qode_options_proya[tabs_fontweight]">
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['tabs_fontweight']) && $options['tabs_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Vertical and Box tabs style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['tabs_border_color'])){ echo 'background-color:'.esc_attr($options['tabs_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[tabs_border_color]" type="text" value="<?php if (isset($options['tabs_border_color']) && $options['tabs_border_color']) { echo esc_attr($options['tabs_border_color'], 'qode'); } ?>" size="10" maxlength="12" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border radius (px)', 'qode'); ?>
									<input name="qode_options_proya[tabs_border_radius]" type="text" value="<?php if (isset($options['tabs_border_radius']) && $options['tabs_border_radius']) { echo esc_attr($options['tabs_border_radius'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border width (px)', 'qode'); ?>
									<input name="qode_options_proya[tabs_border_width]" type="text" value="<?php if (isset($options['tabs_border_width']) && $options['tabs_border_width']) { echo esc_attr($options['tabs_border_width'], 'qode'); } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Process</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Circle styles', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Hover Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['process_circle_hover_background_color'])){ echo 'background-color:'.esc_attr($options['process_circle_hover_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[process_circle_hover_background_color]" type="text" value="<?php if (isset($options['process_circle_hover_background_color']) && $options['process_circle_hover_background_color']) { echo esc_attr($options['process_circle_hover_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Text in circle style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Font Weight', 'qode'); ?>
									<select name="qode_options_proya[process_text_in_circle_font_weight]">
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['process_text_in_circle_font_weight']) && $options['process_text_in_circle_font_weight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>

									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['process_text_hover_color'])){ echo 'background-color:'.esc_attr($options['process_text_hover_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[process_text_hover_color]" type="text" value="<?php if (isset($options['process_text_hover_color']) && $options['process_text_hover_color']) { echo esc_attr($options['process_text_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Input fields</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Input fields style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Background color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if ($options['input_background_color']){ echo 'background-color:'.esc_attr($options['input_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[input_background_color]" type="text" value="<?php if(isset($options['input_background_color'])){ if ($options['input_background_color']) { echo esc_attr($options['input_background_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['input_border_color'])){ echo 'background-color:'.esc_attr($options['input_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[input_border_color]" type="text" value="<?php if(isset($options['input_border_color'])){ if ($options['input_border_color']) { echo esc_attr($options['input_border_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['input_text_color'])){ echo 'background-color:'.esc_attr($options['input_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[input_text_color]" type="text" value="<?php if(isset($options['input_text_color'])){ if ($options['input_text_color']) { echo esc_attr($options['input_text_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
            <h3>Left Menu Area</h3>
            <div>
            <table class="form-table">
            <tbody>
            <tr>
                <td valign="middle" width="150"><?php esc_html_e('Enable left menu area', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <select name="qode_options_proya[vertical_area]">
                            <option <?php if(isset($options['vertical_area'])){ if (isset($options['vertical_area']) && $options['vertical_area'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
                            <option <?php if(isset($options['vertical_area'])){ if (isset($options['vertical_area']) && $options['vertical_area'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" width="150"><?php esc_html_e('Enable transparent left menu area', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <select name="qode_options_proya[vertical_area_transparency]">
                            <option <?php if(isset($options['vertical_area_transparency'])){ if (isset($options['vertical_area_transparency']) && $options['vertical_area_transparency'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
                            <option <?php if(isset($options['vertical_area_transparency'])){ if (isset($options['vertical_area_transparency']) && $options['vertical_area_transparency'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" width="150"><?php esc_html_e('Left menu area background', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_area_background']) && $options['vertical_area_background']){ echo 'background-color:'.esc_attr($options['vertical_area_background'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_area_background]" type="text" value="<?php if (isset($options['vertical_area_background'])) { echo esc_attr($options['vertical_area_background'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" width="150"><?php esc_html_e('Left menu area background image', 'qode'); ?></td>
                <td>
                    <div class="inline" style="width: 700px;">
                        <input type="text" id="vertical_area_background_image" name="qode_options_proya[vertical_area_background_image]" class="vertical_area_background_image" value="<?php if(isset($options['vertical_area_background_image'])) { echo $options['vertical_area_background_image']; } ?>" size="70">
                        <input class="upload_button" type="button" value="Upload file">
                    </div>
                </td>
            </tr>
            <tr>
                <td valign="middle" width="150"><?php esc_html_e('Left menu area text color (for widgets)', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_area_text_color']) && $options['vertical_area_text_color']){ echo 'background-color:'.esc_attr($options['vertical_area_text_color'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_area_text_color]" type="text" value="<?php if (isset($options['vertical_area_text_color'])) { echo esc_attr($options['vertical_area_text_color'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                </td>
            </tr>
			<tr>
				<td valign="middle" width="150"><?php esc_html_e('Left Menu Area Alignment', 'qode'); ?></td>
				<td>
					<div class="inline">
						<select name="qode_options_proya[left_menu_alignment]">
							<option <?php if(isset($options['left_menu_alignment'])){ if (isset($options['left_menu_alignment']) && $options['left_menu_alignment'] == "") { echo "selected='selected'"; }} ?> value="">Default</option>
							<option <?php if(isset($options['left_menu_alignment'])){ if (isset($options['left_menu_alignment']) && $options['left_menu_alignment'] == "left") { echo "selected='selected'"; }} ?> value="left">Left</option>
							<option <?php if(isset($options['left_menu_alignment'])){ if (isset($options['left_menu_alignment']) && $options['left_menu_alignment'] == "center") { echo "selected='selected'"; }} ?> value="center">Center</option>
							<option <?php if(isset($options['left_menu_alignment'])){ if (isset($options['left_menu_alignment']) && $options['left_menu_alignment'] == "right") { echo "selected='selected'"; }} ?> value="right">Right</option>
						</select>
					</div>
				</td>
			</tr>
            <tr><td colspan='2'><h2>Left Menu</h2></td></tr>
            <tr valign="middle">
                <td scope="row" width="150"><?php esc_html_e('1st level menu style', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <?php esc_html_e('Color', 'qode'); ?>
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_menu_color'])){ echo 'background-color:'.esc_attr($options['vertical_menu_color'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_menu_color]" type="text" value="<?php if (isset($options['vertical_menu_color'])) { echo esc_attr($options['vertical_menu_color'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Hover/Active color', 'qode'); ?>
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_menu_hovercolor'])){ echo 'background-color:'.esc_attr($options['vertical_menu_hovercolor'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_menu_hovercolor]" type="text" value="<?php if (isset($options['vertical_menu_hovercolor'])) { echo esc_attr($options['vertical_menu_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font family', 'qode'); ?>
                        <select name="qode_options_proya[vertical_menu_google_fonts]">
                            <option value="-1">Default</option>
                            <?php foreach($fontArrays as $fontArray) { ?>
                                <option <?php if (isset($options['vertical_menu_google_fonts']) && $options['vertical_menu_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font size (px)', 'qode'); ?>
                        <input name="qode_options_proya[vertical_menu_fontsize]" type="text" value="<?php if (isset($options['vertical_menu_fontsize']) && $options['vertical_menu_fontsize']) { echo esc_attr($options['vertical_menu_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Line height (px)', 'qode'); ?>
                        <input name="qode_options_proya[vertical_menu_lineheight]" type="text" value="<?php if (isset($options['vertical_menu_lineheight']) && $options['vertical_menu_lineheight']) { echo esc_attr($options['vertical_menu_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font style', 'qode'); ?>
                        <select name="qode_options_proya[vertical_menu_fontstyle]">
                            <option <?php if (isset($options['vertical_menu_fontstyle']) && $options['vertical_menu_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
                            <option <?php if (isset($options['vertical_menu_fontstyle']) && $options['vertical_menu_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
                            <option <?php if (isset($options['vertical_menu_fontstyle']) && $options['vertical_menu_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
                        </select>
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font weight', 'qode'); ?>
                        <select name="qode_options_proya[vertical_menu_fontweight]">
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
                            <option <?php if (isset($options['vertical_menu_fontweight']) && $options['vertical_menu_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr valign="middle">
                <td scope="row" width="150"><?php esc_html_e('2nd level menu style', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <?php esc_html_e('Color', 'qode'); ?>
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_dropdown_color'])){ echo 'background-color:'.esc_attr($options['vertical_dropdown_color'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_dropdown_color]" type="text" value="<?php if (isset($options['vertical_dropdown_color'])) { echo esc_attr($options['vertical_dropdown_color'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Hover/Active color', 'qode'); ?>
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_dropdown_hovercolor'])){ echo 'background-color:'.esc_attr($options['vertical_dropdown_hovercolor'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_dropdown_hovercolor]" type="text" value="<?php if (isset($options['vertical_dropdown_hovercolor'])) { echo esc_attr($options['vertical_dropdown_hovercolor'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font family', 'qode'); ?>
                        <select name="qode_options_proya[vertical_dropdown_google_fonts]">
                            <option value="-1">Default</option>
                            <?php foreach($fontArrays as $fontArray) { ?>
                                <option <?php if (isset($options['vertical_dropdown_google_fonts']) && $options['vertical_dropdown_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font size (px)', 'qode'); ?>
                        <input name="qode_options_proya[vertical_dropdown_fontsize]" type="text" value="<?php if (isset($options['vertical_dropdown_fontsize']) && $options['vertical_dropdown_fontsize']) { echo esc_attr($options['vertical_dropdown_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Line height (px)', 'qode'); ?>
                        <input name="qode_options_proya[vertical_dropdown_lineheight]" type="text" value="<?php if (isset($options['vertical_dropdown_lineheight']) && $options['vertical_dropdown_lineheight']) { echo esc_attr($options['vertical_dropdown_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font style', 'qode'); ?>
                        <select name="qode_options_proya[vertical_dropdown_fontstyle]">
                            <option <?php if (isset($options['vertical_dropdown_fontstyle']) && $options['vertical_dropdown_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
                            <option <?php if (isset($options['vertical_dropdown_fontstyle']) && $options['vertical_dropdown_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
                            <option <?php if (isset($options['vertical_dropdown_fontstyle']) && $options['vertical_dropdown_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
                        </select>
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font weight', 'qode'); ?>
                        <select name="qode_options_proya[vertical_dropdown_fontweight]">
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
                            <option <?php if (isset($options['vertical_dropdown_fontweight']) && $options['vertical_dropdown_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
                        </select>
                    </div>
                </td>
            </tr>
            <tr valign="middle">
                <td scope="row" width="150"><?php esc_html_e('3rd level menu style', 'qode'); ?></td>
                <td>
                    <div class="inline">
                        <?php esc_html_e('Color', 'qode'); ?>
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_dropdown_color_thirdlvl'])){ echo 'background-color:'.esc_attr($options['vertical_dropdown_color_thirdlvl'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_dropdown_color_thirdlvl]" type="text" value="<?php if (isset($options['vertical_dropdown_color_thirdlvl'])) { echo esc_attr($options['vertical_dropdown_color_thirdlvl'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Hover/Active color', 'qode'); ?>
                        <div class="colorSelector"><div style="<?php if (isset($options['vertical_dropdown_hovercolor_thirdlvl'])){ echo 'background-color:'.esc_attr($options['vertical_dropdown_hovercolor_thirdlvl'], 'qode').';'; } ?>"></div></div>
                        <input name="qode_options_proya[vertical_dropdown_hovercolor_thirdlvl]" type="text" value="<?php if (isset($options['vertical_dropdown_hovercolor_thirdlvl'])) { echo esc_attr($options['vertical_dropdown_hovercolor_thirdlvl'], 'qode'); } ?>" size="10" maxlength="30" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font family', 'qode'); ?>
                        <select name="qode_options_proya[vertical_dropdown_google_fonts_thirdlvl]">
                            <option value="-1">Default</option>
                            <?php foreach($fontArrays as $fontArray) { ?>
                                <option <?php if(isset($options['vertical_dropdown_google_fonts_thirdlvl'])){ $vertical_dropdown_google_fonts_thirdlvl = $options['vertical_dropdown_google_fonts_thirdlvl']; if ($vertical_dropdown_google_fonts_thirdlvl == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font size (px)', 'qode'); ?>
                        <input name="qode_options_proya[vertical_dropdown_fontsize_thirdlvl]" type="text" value="<?php if (isset($options['vertical_dropdown_fontsize_thirdlvl'])) { echo esc_attr($options['vertical_dropdown_fontsize_thirdlvl'], 'qode'); } ?>" size="10" maxlength="10" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Line height (px)', 'qode'); ?>
                        <input name="qode_options_proya[vertical_dropdown_lineheight_thirdlvl]" type="text" value="<?php if (isset($options['vertical_dropdown_lineheight_thirdlvl'])) { echo esc_attr($options['vertical_dropdown_lineheight_thirdlvl'], 'qode'); } ?>" size="10" maxlength="10" />
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font style', 'qode'); ?>
                        <select name="qode_options_proya[vertical_dropdown_fontstyle_thirdlvl]">
                            <option <?php if(isset($options['vertical_dropdown_fontstyle_thirdlvl'])){ $vertical_dropdown_fontstyle_thirdlvl = $options['vertical_dropdown_fontstyle_thirdlvl']; if ($vertical_dropdown_fontstyle_thirdlvl == '') { echo "selected='selected'"; } } ?> value=""></option>
                            <option <?php if(isset($options['vertical_dropdown_fontstyle_thirdlvl'])){ $vertical_dropdown_fontstyle_thirdlvl = $options['vertical_dropdown_fontstyle_thirdlvl']; if ($vertical_dropdown_fontstyle_thirdlvl == 'normal') { echo "selected='selected'"; } } ?> value="normal">normal</option>
                            <option <?php if(isset($options['vertical_dropdown_fontstyle_thirdlvl'])){ $vertical_dropdown_fontstyle_thirdlvl = $options['vertical_dropdown_fontstyle_thirdlvl']; if ($vertical_dropdown_fontstyle_thirdlvl == 'italic') { echo "selected='selected'"; } } ?> value="italic">italic</option>
                        </select>
                    </div>
                    <div class="inline">
                        <?php esc_html_e('Font weight', 'qode'); ?>
                        <select name="qode_options_proya[vertical_dropdown_fontweight_thirdlvl]">
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '') { echo "selected='selected'"; } } ?> value=""></option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '200') { echo "selected='selected'"; } } ?> value="200">200</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '300') { echo "selected='selected'"; } } ?> value="300">300</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '400') { echo "selected='selected'"; } } ?> value="400">400</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '500') { echo "selected='selected'"; } } ?> value="500">500</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '600') { echo "selected='selected'"; } } ?> value="600">600</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '700') { echo "selected='selected'"; } } ?> value="700">700</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '800') { echo "selected='selected'"; } } ?> value="800">800</option>
                            <option <?php if(isset($options['vertical_dropdown_fontweight_thirdlvl'])){ $vertical_dropdown_fontweight_thirdlvl = $options['vertical_dropdown_fontweight_thirdlvl']; if ($vertical_dropdown_fontweight_thirdlvl == '900') { echo "selected='selected'"; } } ?> value="900">900</option>
                        </select>
                    </div>
                </td>
            </tr>
            </tbody>
            </table>
            <?php display_save_changes_button(); ?>
            </div>
			<h3>Side Area</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Enable Side Area', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[enable_side_area]">
										<option <?php if ((isset($options['enable_side_area'])) && $options['enable_side_area'] == "yes") { echo "selected='selected'"; } ?> value="yes">yes</option>
										<option <?php if ((isset($options['enable_side_area'])) && $options['enable_side_area'] == "no") { echo "selected='selected'"; } ?> value="no">no</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Side Area Title', 'qode'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_proya[side_area_title]" type="text" value="<?php if(isset($options['side_area_title'])) { if ($options['side_area_title']) { echo esc_attr($options['side_area_title'], 'qode'); } } ?>" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background Color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_background_color']) && $options['side_area_background_color']){ echo 'background-color:'.esc_attr($options['side_area_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[side_area_background_color]" type="text" value="<?php if(isset($options['side_area_background_color'])){ if ($options['side_area_background_color']) { echo esc_attr($options['side_area_background_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Text', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_text_color']) && $options['side_area_text_color']){ echo 'background-color:'.esc_attr($options['side_area_text_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[side_area_text_color]" type="text" value="<?php if(isset($options['side_area_text_color'])){ if ($options['side_area_text_color']) { echo esc_attr($options['side_area_text_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Hover Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_text_hover_color']) && $options['side_area_text_hover_color']){ echo 'background-color:'.esc_attr($options['side_area_text_hover_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[side_area_text_hover_color]" type="text" value="<?php if(isset($options['side_area_text_hover_color'])){ if ($options['side_area_text_hover_color']) { echo esc_attr($options['side_area_text_hover_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font Size (px)', 'qode'); ?>
									<input name="qode_options_proya[side_area_text_font_size]" type="text" value="<?php if(isset($options['side_area_text_font_size'])){ if ($options['side_area_text_font_size']) { echo esc_attr($options['side_area_text_font_size'], 'qode'); } } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Letter Spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[side_area_text_letter_spacing]" type="text" value="<?php if(isset($options['side_area_text_letter_spacing'])){ if ($options['side_area_text_letter_spacing']) { echo esc_attr($options['side_area_text_letter_spacing'], 'qode'); } } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[side_area_text_font_weight]">
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['side_area_text_font_weight']) && $options['side_area_text_font_weight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Title', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Title', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['side_area_title_color']) && $options['side_area_title_color']){ echo 'color:'.esc_attr($options['side_area_title_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[side_area_title_color]" type="text" value="<?php if(isset($options['side_area_title_color'])){ if ($options['side_area_title_color']) { echo esc_attr($options['side_area_title_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font Size (px)', 'qode'); ?>
									<input name="qode_options_proya[side_area_title_font_size]" type="text" value="<?php if(isset($options['side_area_title_font_size'])){ if ($options['side_area_title_font_size']) { echo esc_attr($options['side_area_title_font_size'], 'qode'); } } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Font weight', 'qode'); ?>
									<select name="qode_options_proya[side_area_title_font_weight]">
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
										<option <?php if (isset($options['side_area_title_font_weight']) && $options['side_area_title_font_weight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Letter Spacing (px)', 'qode'); ?>
									<input name="qode_options_proya[side_area_title_letter_spacing]" type="text" value="<?php if(isset($options['side_area_title_letter_spacing'])){ if ($options['side_area_title_letter_spacing']) { echo esc_attr($options['side_area_title_letter_spacing'], 'qode'); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Close Icon Style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[side_area_close_icon_style]">
										<option <?php if (isset($options['side_area_close_icon_style']) && $options['side_area_close_icon_style'] == "") { echo "selected='selected'"; } ?> value=""></option>
										<option <?php if (isset($options['side_area_close_icon_style']) && $options['side_area_close_icon_style'] == "light") { echo "selected='selected'"; } ?> value="light">Light</option>
										<option <?php if (isset($options['side_area_close_icon_style']) && $options['side_area_close_icon_style'] == "dark") { echo "selected='selected'"; } ?> value="dark">Dark</option>
									</select>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
            <h3>Fullscreen Menu</h3>
            <div>
                <table class="form-table">
                    <tbody>
                    <tr valign="middle">
                        <td scope="row" width="150"><?php esc_html_e('Enable Fullscreen Menu', 'qode'); ?></td>
                        <td>
                            <div class="inline">
                                <select name="qode_options_proya[enable_popup_menu]">
                                    <option <?php if ((isset($options['enable_popup_menu'])) && $options['enable_popup_menu'] == "no") { echo "selected='selected'"; } ?> value="no">no</option>
                                    <option <?php if ((isset($options['enable_popup_menu'])) && $options['enable_popup_menu'] == "yes") { echo "selected='selected'"; } ?> value="yes">yes</option>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr valign="middle">
                        <td scope="row" width="150"><?php esc_html_e('Logo image for Fullscreen menu', 'qode'); ?></td>
                        <td>
                            <div class="inline" style="width: 700px;">
                                <input type="text" id="logo_image_popup" name="qode_options_proya[logo_image_popup]" class="logo_image_popup" value="<?php if (isset($options['logo_image_popup'])) { echo esc_attr($options['logo_image_popup'], 'qode'); } else { echo QODE_ROOT."/img/logo_white.png"; } ?>" size="70">
                                <input class="upload_button" type="button" value="Upload file">
                            </div>
                        </td>
                    </tr>
                    <tr valign="top">
                        <td scope="row" width="150"><?php esc_html_e('1st level style', 'qode'); ?></td>
                        <td>
                            <div class="inline">
                                <?php esc_html_e('Color', 'qode'); ?>
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_color'])){ echo 'background-color:'.esc_attr($options['popup_menu_color'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_color]" type="text" value="<?php if (isset($options['popup_menu_color'])) { echo esc_attr($options['popup_menu_color'], 'qode'); } ?>" size="10" maxlength="30" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Hover color', 'qode'); ?>
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_hover_color'])){ echo 'background-color:'.esc_attr($options['popup_menu_hover_color'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_hover_color]" type="text" value="<?php if (isset($options['popup_menu_hover_color'])) { echo esc_attr($options['popup_menu_hover_color'], 'qode'); } ?>" size="10" maxlength="30" />
                            </div>
														<div class="inline">
                                <?php esc_html_e('Background hover color', 'qode'); ?>
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_hover_background_color'])){ echo 'background-color:'.esc_attr($options['popup_menu_hover_background_color'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_hover_background_color]" type="text" value="<?php if (isset($options['popup_menu_hover_background_color'])) { echo esc_attr($options['popup_menu_hover_background_color'], 'qode'); } ?>" size="10" maxlength="30" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font family', 'qode'); ?>
                                <select name="qode_options_proya[popup_menu_google_fonts]">
                                    <option value="-1">Default</option>
                                    <?php foreach($fontArrays as $fontArray) { ?>
                                        <option <?php if (isset($options['popup_menu_google_fonts']) && $options['popup_menu_google_fonts'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font size (px)', 'qode'); ?>
                                <input name="qode_options_proya[popup_menu_fontsize]" type="text" value="<?php if (isset($options['popup_menu_fontsize']) && $options['popup_menu_fontsize']) { echo esc_attr($options['popup_menu_fontsize'], 'qode'); } ?>" size="10" maxlength="10" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Line height (px)', 'qode'); ?>
                                <input name="qode_options_proya[popup_menu_lineheight]" type="text" value="<?php if (isset($options['popup_menu_lineheight']) && $options['popup_menu_lineheight']) { echo esc_attr($options['popup_menu_lineheight'], 'qode'); } ?>" size="10" maxlength="10" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font style', 'qode'); ?>
                                <select name="qode_options_proya[popup_menu_fontstyle]">
                                    <option <?php if (isset($options['popup_menu_fontstyle']) && $options['popup_menu_fontstyle'] == "") { echo "selected='selected'"; } ?> value=""></option>
                                    <option <?php if (isset($options['popup_menu_fontstyle']) && $options['popup_menu_fontstyle'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
                                    <option <?php if (isset($options['popup_menu_fontstyle']) && $options['popup_menu_fontstyle'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
                                </select>
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font weight', 'qode'); ?>
                                <select name="qode_options_proya[popup_menu_fontweight]">
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "") { echo "selected='selected'"; } ?> value=""></option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
                                    <option <?php if (isset($options['popup_menu_fontweight']) && $options['popup_menu_fontweight'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
                                </select>
                            </div>
							<div class="inline">
								<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
								<input name="qode_options_proya[popup_menu_letterspacing]" type="text" value="<?php if (isset($options['popup_menu_letterspacing']) && $options['popup_menu_letterspacing'] !== '') { echo esc_attr($options['popup_menu_letterspacing'], 'qode'); } ?>" size="10" maxlength="10" />
							</div>
                        </td>
                    </tr>
										<tr valign="top">
                        <td scope="row" width="150"><?php esc_html_e('2nd level style', 'qode'); ?></td>
                        <td>
                            <div class="inline">
                                <?php esc_html_e('Color', 'qode'); ?>
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_color_2nd'])){ echo 'background-color:'.esc_attr($options['popup_menu_color_2nd'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_color_2nd]" type="text" value="<?php if (isset($options['popup_menu_color_2nd'])) { echo esc_attr($options['popup_menu_color_2nd'], 'qode'); } ?>" size="10" maxlength="30" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Hover color', 'qode'); ?>
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_hover_color_2nd'])){ echo 'background-color:'.esc_attr($options['popup_menu_hover_color_2nd'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_hover_color_2nd]" type="text" value="<?php if (isset($options['popup_menu_hover_color_2nd'])) { echo esc_attr($options['popup_menu_hover_color_2nd'], 'qode'); } ?>" size="10" maxlength="30" />
                            </div>
														<div class="inline">
                                <?php esc_html_e('Background hover color', 'qode'); ?>
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_hover_background_color_2nd'])){ echo 'background-color:'.esc_attr($options['popup_menu_hover_background_color_2nd'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_hover_background_color_2nd]" type="text" value="<?php if (isset($options['popup_menu_hover_background_color_2nd'])) { echo esc_attr($options['popup_menu_hover_background_color_2nd'], 'qode'); } ?>" size="10" maxlength="30" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font family', 'qode'); ?>
                                <select name="qode_options_proya[popup_menu_google_fonts_2nd]">
                                    <option value="-1">Default</option>
                                    <?php foreach($fontArrays as $fontArray) { ?>
                                        <option <?php if (isset($options['popup_menu_google_fonts_2nd']) && $options['popup_menu_google_fonts_2nd'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font size (px)', 'qode'); ?>
                                <input name="qode_options_proya[popup_menu_fontsize_2nd]" type="text" value="<?php if (isset($options['popup_menu_fontsize_2nd']) && $options['popup_menu_fontsize_2nd']) { echo esc_attr($options['popup_menu_fontsize_2nd'], 'qode'); } ?>" size="10" maxlength="10" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Line height (px)', 'qode'); ?>
                                <input name="qode_options_proya[popup_menu_lineheight_2nd]" type="text" value="<?php if (isset($options['popup_menu_lineheight_2nd']) && $options['popup_menu_lineheight_2nd']) { echo esc_attr($options['popup_menu_lineheight_2nd'], 'qode'); } ?>" size="10" maxlength="10" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font style', 'qode'); ?>
                                <select name="qode_options_proya[popup_menu_fontstyle_2nd]">
                                    <option <?php if (isset($options['popup_menu_fontstyle_2nd']) && $options['popup_menu_fontstyle_2nd'] == "") { echo "selected='selected'"; } ?> value=""></option>
                                    <option <?php if (isset($options['popup_menu_fontstyle_2nd']) && $options['popup_menu_fontstyle_2nd'] == "normal") { echo "selected='selected'"; } ?> value="normal">normal</option>
                                    <option <?php if (isset($options['popup_menu_fontstyle_2nd']) && $options['popup_menu_fontstyle_2nd'] == "italic") { echo "selected='selected'"; } ?> value="italic">italic</option>
                                </select>
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Font weight', 'qode'); ?>
                                <select name="qode_options_proya[popup_menu_fontweight_2nd]">
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "") { echo "selected='selected'"; } ?> value=""></option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "200") { echo "selected='selected'"; } ?> value="200">200</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "300") { echo "selected='selected'"; } ?> value="300">300</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "400") { echo "selected='selected'"; } ?> value="400">400</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "500") { echo "selected='selected'"; } ?> value="500">500</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "600") { echo "selected='selected'"; } ?> value="600">600</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "700") { echo "selected='selected'"; } ?> value="700">700</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "800") { echo "selected='selected'"; } ?> value="800">800</option>
                                    <option <?php if (isset($options['popup_menu_fontweight_2nd']) && $options['popup_menu_fontweight_2nd'] == "900") { echo "selected='selected'"; } ?> value="900">900</option>
                                </select>
                            </div>
							<div class="inline">
								<?php esc_html_e('Letter spacing (px)', 'qode'); ?>
								<input name="qode_options_proya[popup_menu_letterspacing_2nd]" type="text" value="<?php if (isset($options['popup_menu_letterspacing_2nd']) && $options['popup_menu_letterspacing_2nd'] !== '') { echo esc_attr($options['popup_menu_letterspacing_2nd'], 'qode'); } ?>" size="10" maxlength="10" />
							</div>
                        </td>
                    </tr>
                    <tr valign="middle">
                        <td scope="row" width="150"><?php esc_html_e('Background Color', 'qode'); ?></td>
                        <td>
                            <div class="inline">
                                <div class="colorSelector"><div style="<?php if (isset($options['popup_menu_background_color']) && $options['popup_menu_background_color']){ echo 'background-color:'.esc_attr($options['popup_menu_background_color'], 'qode').';'; } ?>"></div></div>
                                <input name="qode_options_proya[popup_menu_background_color]" type="text" value="<?php if(isset($options['popup_menu_background_color'])){ if ($options['popup_menu_background_color']) { echo esc_attr($options['popup_menu_background_color'], 'qode'); } } ?>" size="10" maxlength="10" />
                            </div>
                            <div class="inline">
                                <?php esc_html_e('Transparency (From 0 to 1)', 'qode'); ?>
                                <input name="qode_options_proya[popup_menu_background_transparency]" type="text" value="<?php if (isset($options['popup_menu_background_transparency'])) { echo esc_attr($options['popup_menu_background_transparency'], 'qode'); } ?>" size="10" maxlength="10" />
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <?php		display_save_changes_button(); ?>
            </div>
			<h3>Content Bottom Area</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Enable Content Bottom Area', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[enable_content_bottom_area]">
										<option <?php if ((isset($options['enable_content_bottom_area'])) && $options['enable_content_bottom_area'] == "yes") { echo "selected='selected'"; } ?> value="yes">yes</option>
										<option <?php if ((isset($options['enable_content_bottom_area'])) && $options['enable_content_bottom_area'] == "no") { echo "selected='selected'"; } ?> value="no">no</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Content bottom sidebar to display', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[content_bottom_sidebar_custom_display]">
									<option value="" <?php if(isset($options['content_bottom_sidebar_custom_display'])){ $content_bottom_sidebar_custom_display = $options['content_bottom_sidebar_custom_display'];  if ($content_bottom_sidebar_custom_display == "" ) { echo "selected='selected'";  } }?>></option>
									<?php
									foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
										if(isUserMadeSidebar(ucwords($sidebar['name']))){
									?>
										<option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php if(isset($options['content_bottom_sidebar_custom_display'])){ $content_bottom_sidebar_custom_display = $options['content_bottom_sidebar_custom_display'];  if ($content_bottom_sidebar_custom_display == ucwords( $sidebar['id'] ) ) { echo "selected='selected'";  } }?>>
											<?php echo ucwords( $sidebar['name'] ); ?>
										</option>
										<?php
											}
										}
										?>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td valign="middle" width="150"><?php esc_html_e('Content bottom in grid', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[content_bottom_in_grid]">
										<option <?php if(isset($options['content_bottom_in_grid'])){ if ($options['content_bottom_in_grid'] == "no") { echo "selected='selected'"; }} ?> value="no">No</option>
										<option <?php if(isset($options['content_bottom_in_grid'])){ if ($options['content_bottom_in_grid'] == "yes") { echo "selected='selected'"; }} ?> value="yes">Yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Background Color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['content_bottom_background_color']) && $options['content_bottom_background_color']){ echo 'background-color:'.esc_attr($options['content_bottom_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[content_bottom_background_color]" type="text" value="<?php if(isset($options['content_bottom_background_color'])){ if ($options['content_bottom_background_color']) { echo esc_attr($options['content_bottom_background_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>Parallax</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Parallax on touch devices', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[parallax_onoff]">
									<option <?php if ($options['parallax_onoff'] == "on") { echo "selected='selected'"; } ?> value="on">on</option>
									<option <?php if ($options['parallax_onoff'] == "off") { echo "selected='selected'"; } ?> value="off">off</option>
								</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Parallax min height (px)', 'qode'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_proya[parallax_minheight]" type="text" value="<?php if ($options['parallax_minheight']) { echo esc_attr($options['parallax_minheight'], 'qode'); } ?>" size="10" maxlength="10" />
									<?php esc_html_e('Set min-height for last two stages', 'qode'); ?>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
			<h3>Portfolio</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr><td colspan='2'><h2>Portfolio single</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Portfolio style', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[portfolio_style]">
									<option <?php if ($options['portfolio_style'] == 1) { echo "selected='selected'"; } ?> value="1">Portfolio small images</option>
									<option <?php if ($options['portfolio_style'] == 2) { echo "selected='selected'"; } ?> value="2">Portfolio small slider</option>
									<option <?php if ($options['portfolio_style'] == 5) { echo "selected='selected'"; } ?> value="5">Portfolio big images</option>
									<option <?php if ($options['portfolio_style'] == 3) { echo "selected='selected'"; } ?> value="3">Portfolio big slider</option>
									<option <?php if ($options['portfolio_style'] == 4) { echo "selected='selected'"; } ?> value="4">Portfolio custom</option>
									<option <?php if ($options['portfolio_style'] == 7) { echo "selected='selected'"; } ?> value="7">Portfolio full width custom</option>
									<option <?php if ($options['portfolio_style'] == 6) { echo "selected='selected'"; } ?> value="6">Portfolio gallery</option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Portfolio Qode Like', 'qode'); ?></td>
								<td>
									<select name="qode_options_proya[portfolio_qode_like]">
										<option <?php if (isset($options['portfolio_qode_like'])){ $portfolio_qode_like = $options['portfolio_qode_like']; if ($portfolio_qode_like == 'on') { echo "selected='selected'"; } } ?> value="on">On</option>
										<option <?php if (isset($options['portfolio_qode_like'])){ $portfolio_qode_like = $options['portfolio_qode_like']; if ($portfolio_qode_like == 'off') { echo "selected='selected'"; } } ?> value="off">Off</option>
									</select>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Lightbox for single project', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[lightbox_single_project]">
										<option <?php if(isset($options['lightbox_single_project'])){ $lightbox_single_project = $options['lightbox_single_project']; if ($lightbox_single_project == 'no') { echo "selected='selected'"; } }  ?> value="no">No</option>
										<option <?php if(isset($options['lightbox_single_project'])){ $lightbox_single_project = $options['lightbox_single_project']; if ($lightbox_single_project == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Number of columns for Portfolio gallery style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[portfolio_columns_number]">
										<option <?php if(isset($options['portfolio_columns_number'])){ $portfolio_columns_number = $options['portfolio_columns_number']; if ($options['portfolio_columns_number'] == 2) { echo "selected='selected'"; } } ?> value="2">2 columns</option>
										<option <?php if(isset($options['portfolio_columns_number'])){ $portfolio_columns_number = $options['portfolio_columns_number']; if ($options['portfolio_columns_number'] == 3) { echo "selected='selected'"; } } ?> value="3">3 columns</option>
										<option <?php if(isset($options['portfolio_columns_number'])){ $portfolio_columns_number = $options['portfolio_columns_number']; if ($options['portfolio_columns_number'] == 4) { echo "selected='selected'"; } } ?> value="4">4 columns</option>
									</select>
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Sidebar layout', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[portfolio_single_sidebar]">
									<option <?php if(isset($options['portfolio_single_sidebar'])){$portfolio_single_sidebar = $options['portfolio_single_sidebar']; if ($portfolio_single_sidebar == "default") { echo "selected='selected'"; } } ?> value="default">No Sidebar</option>
									<option <?php if(isset($options['portfolio_single_sidebar'])){$portfolio_single_sidebar = $options['portfolio_single_sidebar']; if ($portfolio_single_sidebar == 1) { echo "selected='selected'"; } } ?> value="1">Sidebar 1/3 right</option>
									<option <?php if(isset($options['portfolio_single_sidebar'])){$portfolio_single_sidebar = $options['portfolio_single_sidebar']; if ($portfolio_single_sidebar == 2) { echo "selected='selected'"; } } ?> value="2">Sidebar 1/4 right</option>
									<option <?php if(isset($options['portfolio_single_sidebar'])){$portfolio_single_sidebar = $options['portfolio_single_sidebar']; if ($portfolio_single_sidebar == 3) { echo "selected='selected'"; } } ?> value="3">Sidebar 1/3 left</option>
									<option <?php if(isset($options['portfolio_single_sidebar'])){$portfolio_single_sidebar = $options['portfolio_single_sidebar']; if ($portfolio_single_sidebar == 4) { echo "selected='selected'"; } } ?> value="4">Sidebar 1/4 left</option>

								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Sidebar to display', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[portfolio_single_sidebar_custom_display]">
									<option value="" <?php if(isset($options['portfolio_single_sidebar_custom_display'])){ $portfolio_single_sidebar_custom_display = $options['portfolio_single_sidebar_custom_display'];  if ($portfolio_single_sidebar_custom_display == "" ) { echo "selected='selected'";  } }?>></option>
									<?php
									foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
										if(isUserMadeSidebar(ucwords($sidebar['name']))){
											?>
											<option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php if(isset($options['portfolio_single_sidebar_custom_display'])){ $portfolio_single_sidebar_custom_display = $options['portfolio_single_sidebar_custom_display'];  if ($portfolio_single_sidebar_custom_display == ucwords( $sidebar['id'] ) ) { echo "selected='selected'";  } }?>>
												<?php echo ucwords( $sidebar['name'] ); ?>
											</option>
										<?php
										}
									}
									?>
								</select>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Portfolio single slug', 'qode'); ?></td>
							<td>
								<div class="inline">
									<input name="qode_options_proya[portfolio_single_slug]" type="text" value="<?php if (isset($options['portfolio_single_slug']) && $options['portfolio_single_slug'] != "") { echo esc_attr($options['portfolio_single_slug'], 'qode'); } ?>" />
									<?php echo sprintf(__('When you put the slug for portfolio page, you should navigate to ','qode').'<code>%s</code>'.__(' and click save button.','qode'), '<a href="'. admin_url('options-permalink.php') .'">'. __('Settings -> Permalinks','qode') .'</a>'); ?>
								</div>
							</td>
						</tr>
						<tr>
							<td valign="middle" width="150"><?php esc_html_e('Enable Portfolio text following', 'qode'); ?></td>
							<td>
								<div class="inline">
									<select name="qode_options_proya[portfolio_text_follow]">
										<option <?php if(isset($options['portfolio_text_follow'])){ $portfolio_text_follow = $options['portfolio_text_follow']; if ($portfolio_text_follow == 'portfolio_single_follow') { echo "selected='selected'"; } }  ?> value="portfolio_single_follow">Yes</option>
										<option <?php if(isset($options['portfolio_text_follow'])){ $portfolio_text_follow = $options['portfolio_text_follow']; if ($portfolio_text_follow == 'portfolio_single_no_follow') { echo "selected='selected'"; } } ?> value="portfolio_single_no_follow">No</option>
									</select>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>Blog</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Quote/Link box color', 'qode'); ?></td>
							<td>
								<div class="colorSelector"><div style="<?php if ($options['blog_quote_link_box_color']){ echo 'background-color:'.esc_attr($options['blog_quote_link_box_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[blog_quote_link_box_color]" type="text" value="<?php if (isset($options['blog_quote_link_box_color']) && $options['blog_quote_link_box_color']) { echo esc_attr($options['blog_quote_link_box_color'], 'qode'); } ?>" size="10" maxlength="30" />
							</td>
						</tr>
						<tr><td colspan='2'><h2>Blog list</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pagination', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[pagination]">
									<option <?php if ($options['pagination'] == 0) { echo "selected='selected'"; } ?> value="0">No</option>
									<option <?php if ($options['pagination'] == 1) { echo "selected='selected'"; } ?> value="1">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Choose blog layout', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[blog_style]">
									<option <?php if ($options['blog_style'] == 1) { echo "selected='selected'"; } ?> value="1"><?php esc_html_e('Blog Large Image', 'qode'); ?></option>
									<option <?php if ($options['blog_style'] == 2) { echo "selected='selected'"; } ?> value="2"><?php esc_html_e('Blog Masonry', 'qode'); ?></option>
									<option <?php if ($options['blog_style'] == 5) { echo "selected='selected'"; } ?> value="5"><?php esc_html_e('Blog Masonry Full Width', 'qode'); ?></option>
									<option <?php if ($options['blog_style'] == 3) { echo "selected='selected'"; } ?> value="3"><?php esc_html_e('Blog Large Image Whole Post', 'qode'); ?></option>
									<option <?php if ($options['blog_style'] == 4) { echo "selected='selected'"; } ?> value="4"><?php esc_html_e('Blog Small Image', 'qode'); ?></option>
									<option <?php if ($options['blog_style'] == 6) { echo "selected='selected'"; } ?> value="6"><?php esc_html_e('Blog Large Image Simple', 'qode'); ?></option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blog sidebar', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[category_blog_sidebar]">
									<option <?php if ($options['category_blog_sidebar'] == "default") { echo "selected='selected'"; } ?> value="default">No Sidebar</option>
									<option <?php if ($options['category_blog_sidebar'] == 1) { echo "selected='selected'"; } ?> value="1">Sidebar 1/3 right</option>
									<option <?php if ($options['category_blog_sidebar'] == 2) { echo "selected='selected'"; } ?> value="2">Sidebar 1/4 right</option>
									<option <?php if ($options['category_blog_sidebar'] == 3) { echo "selected='selected'"; } ?> value="3">Sidebar 1/3 left</option>
									<option <?php if ($options['category_blog_sidebar'] == 4) { echo "selected='selected'"; } ?> value="4">Sidebar 1/4 left</option>

								</select>
								<?php esc_html_e('For category list', 'qode'); ?>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Hide comments', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[blog_hide_comments]">
									<option <?php if(isset($options['blog_hide_comments'])){ $blog_hide_comments = $options['blog_hide_comments']; if ($blog_hide_comments == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['blog_hide_comments'])){ $blog_hide_comments = $options['blog_hide_comments']; if ($blog_hide_comments == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
                        <tr valign="middle">
                            <td scope="row" width="150"><?php esc_html_e('Hide author', 'qode'); ?></td>
                            <td>
                                <select name="qode_options_proya[blog_hide_author]">
                                    <option <?php if(isset($options['blog_hide_author'])){ $blog_hide_author = $options['blog_hide_author']; if ($blog_hide_author == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
                                    <option <?php if(isset($options['blog_hide_author'])){ $blog_hide_author = $options['blog_hide_author']; if ($blog_hide_author == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
                                </select>
                            </td>
                        </tr>
						<tr valign="middle">
								<td scope="row" width="150"><?php esc_html_e('Blog Qode Like', 'qode'); ?></td>
								<td>
									<select name="qode_options_proya[qode_like]">
										<option <?php if (isset($options['qode_like'])){ $qode_like = $options['qode_like']; if ($qode_like == 'on') { echo "selected='selected'"; } } ?> value="on">On</option>
										<option <?php if (isset($options['qode_like'])){ $qode_like = $options['qode_like']; if ($qode_like == 'off') { echo "selected='selected'"; } } ?> value="off">Off</option>
									</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Page Range For Pagination', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[blog_page_range]" type="text" value="<?php if (isset($options['blog_page_range']) && $options['blog_page_range']) { echo esc_attr($options['blog_page_range'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[number_of_chars]" type="text" value="<?php if (isset($options['number_of_chars']) && $options['number_of_chars']) { echo esc_attr($options['number_of_chars'], 'qode'); } ?>" size="10" maxlength="10" />
								<?php esc_html_e('Number of words in blog listing', 'qode'); ?>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words in masonry blog template', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[number_of_chars_masonry]" type="text" value="<?php if (isset($options['number_of_chars_masonry']) && $options['number_of_chars_masonry']) { echo esc_attr($options['number_of_chars_masonry'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words in large image blog template', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[number_of_chars_large_image]" type="text" value="<?php if (isset($options['number_of_chars_large_image']) && $options['number_of_chars_large_image']) { echo esc_attr($options['number_of_chars_large_image'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr><tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Number of words in small image blog template', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[number_of_chars_small_image]" type="text" value="<?php if (isset($options['number_of_chars_small_image'])) { echo esc_attr($options['number_of_chars_small_image'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="middle">
                                <td scope="row" width="150"><?php esc_html_e('Choose Pagination on Masonry type', 'qode'); ?></td>
                                <td>
                                    <select name="qode_options_proya[pagination_masonry]">
                                        <option <?php if (isset($options['pagination_masonry'])){ $pagination_masonry = $options['pagination_masonry']; if ($pagination_masonry == 'pagination') { echo "selected='selected'"; } } ?> value="pagination">Pagination</option>
                                        <option <?php if (isset($options['pagination_masonry'])){ $pagination_masonry = $options['pagination_masonry']; if ($pagination_masonry == 'load_more') { echo "selected='selected'"; } } ?> value="load_more">Load More</option>
                                        <option <?php if (isset($options['pagination_masonry'])){ $pagination_masonry = $options['pagination_masonry']; if ($pagination_masonry == 'infinite_scroll') { echo "selected='selected'"; } } ?> value="infinite_scroll">Infinite Scroll</option>
                                    </select>
                            </td>
                        </tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Show category filter on masonry style', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[blog_masonry_filter]">
									<option <?php if (isset($options['blog_masonry_filter'])){ $blog_masonry_filter = $options['blog_masonry_filter']; if ($blog_masonry_filter == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if (isset($options['blog_masonry_filter'])){ $blog_masonry_filter = $options['blog_masonry_filter']; if ($blog_masonry_filter == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blog Large Image style', 'qode'); ?></td>
							<td>
							<div class="inline">
								<?php esc_html_e('Text in box', 'qode'); ?>
								<select name="qode_options_proya[blog_large_image_text_in_box]">
									<option <?php if (isset($options['blog_large_image_text_in_box'])){ $blog_large_image_text_in_box = $options['blog_large_image_text_in_box']; if ($blog_large_image_text_in_box == '') { echo "selected='selected'"; } } ?> value=""></option>
									<option <?php if (isset($options['blog_large_image_text_in_box'])){ $blog_large_image_text_in_box = $options['blog_large_image_text_in_box']; if ($blog_large_image_text_in_box == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if (isset($options['blog_large_image_text_in_box'])){ $blog_large_image_text_in_box = $options['blog_large_image_text_in_box']; if ($blog_large_image_text_in_box == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</div>

							<div class="inline">
								<?php esc_html_e('Text Box Border', 'qode'); ?>
								<select name="qode_options_proya[blog_large_image_border]">
									<option <?php if (isset($options['blog_large_image_border'])){ $blog_large_image_border = $options['blog_large_image_border']; if ($blog_large_image_border == '') { echo "selected='selected'"; } } ?> value=""></option>
									<option <?php if (isset($options['blog_large_image_border'])){ $blog_large_image_border = $options['blog_large_image_border']; if ($blog_large_image_border == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if (isset($options['blog_large_image_border'])){ $blog_large_image_border = $options['blog_large_image_border']; if ($blog_large_image_border == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</div>
							<div class="inline">
								<?php esc_html_e('Text Box Border Color', 'qode'); ?>
								<div class="colorSelector"><div style="<?php if (isset($options['blog_large_image_border_color'])){ echo 'background-color:'.esc_attr($options['blog_large_image_border_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[blog_large_image_border_color]" type="text" value="<?php if(isset($options['blog_large_image_border_color'])){ if ($options['blog_large_image_border_color']) { echo esc_attr($options['blog_large_image_border_color'], 'qode'); } } ?>" size="10" maxlength="30" />
							</div>
							<div class="inline">
								<?php esc_html_e('Text Box Border width(px)', 'qode'); ?>
								<input name="qode_options_proya[blog_large_image_border_width]" type="text" value="<?php if(isset($options['blog_large_image_border_width'])){ if ($options['blog_large_image_border_width']) { echo esc_attr($options['blog_large_image_border_width'], 'qode'); } } ?>" size="10" maxlength="10" />
							</div>
							<div class="inline">
								<?php esc_html_e('Text Box Background Color', 'qode'); ?>
								<div class="colorSelector"><div style="<?php if (isset($options['blog_large_image_background_color'])){ echo 'background-color:'.esc_attr($options['blog_large_image_background_color'], 'qode').';'; } ?>"></div></div>
								<input name="qode_options_proya[blog_large_image_background_color]" type="text" value="<?php if(isset($options['blog_large_image_background_color'])){ if ($options['blog_large_image_background_color']) { echo esc_attr($options['blog_large_image_background_color'], 'qode'); } } ?>" size="10" maxlength="30" />
							</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blog Medium Image style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Text in box', 'qode'); ?>
									<select name="qode_options_proya[blog_small_image_text_in_box]">
										<option <?php if (isset($options['blog_small_image_text_in_box'])){ $blog_small_image_text_in_box = $options['blog_small_image_text_in_box']; if ($blog_small_image_text_in_box == '') { echo "selected='selected'"; } } ?> value=""></option>
										<option <?php if (isset($options['blog_small_image_text_in_box'])){ $blog_small_image_text_in_box = $options['blog_small_image_text_in_box']; if ($blog_small_image_text_in_box == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if (isset($options['blog_small_image_text_in_box'])){ $blog_small_image_text_in_box = $options['blog_small_image_text_in_box']; if ($blog_small_image_text_in_box == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>

								<div class="inline">
									<?php esc_html_e('Text Box Border', 'qode'); ?>
									<select name="qode_options_proya[blog_small_image_border]">
										<option <?php if (isset($options['blog_small_image_border'])){ $blog_small_image_border = $options['blog_small_image_border']; if ($blog_small_image_border == '') { echo "selected='selected'"; } } ?> value=""></option>
										<option <?php if (isset($options['blog_small_image_border'])){ $blog_small_image_border = $options['blog_small_image_border']; if ($blog_small_image_border == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if (isset($options['blog_small_image_border'])){ $blog_small_image_border = $options['blog_small_image_border']; if ($blog_small_image_border == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline">
									<?php esc_html_e('Text Box Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blog_small_image_border_color'])){ echo 'background-color:'.esc_attr($options['blog_small_image_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blog_small_image_border_color]" type="text" value="<?php if(isset($options['blog_small_image_border_color'])){ if ($options['blog_small_image_border_color']) { echo esc_attr($options['blog_small_image_border_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text Box Border width(px)', 'qode'); ?>
									<input name="qode_options_proya[blog_small_image_border_width]" type="text" value="<?php if(isset($options['blog_small_image_border_width'])){ if ($options['blog_small_image_border_width']) { echo esc_attr($options['blog_small_image_border_width'], 'qode'); } } ?>" size="10" maxlength="10" />
								</div>
								<div class="inline">
									<?php esc_html_e('Text Box Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blog_small_image_background_color'])){ echo 'background-color:'.esc_attr($options['blog_small_image_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blog_small_image_background_color]" type="text" value="<?php if(isset($options['blog_small_image_background_color'])){ if ($options['blog_small_image_background_color']) { echo esc_attr($options['blog_small_image_background_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Blog Masonry Style', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Border Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blog_masonry_border_color'])){ echo 'background-color:'.esc_attr($options['blog_masonry_border_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blog_masonry_border_color]" type="text" value="<?php if(isset($options['blog_masonry_border_color'])){ if ($options['blog_masonry_border_color']) { echo esc_attr($options['blog_masonry_border_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Background Color', 'qode'); ?>
									<div class="colorSelector"><div style="<?php if (isset($options['blog_masonry_background_color'])){ echo 'background-color:'.esc_attr($options['blog_masonry_background_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[blog_masonry_background_color]" type="text" value="<?php if(isset($options['blog_masonry_background_color'])){ if ($options['blog_masonry_background_color']) { echo esc_attr($options['blog_masonry_background_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
								<div class="inline">
									<?php esc_html_e('Border Raidus(px)', 'qode'); ?>
									<input name="qode_options_proya[blog_masonry_border_radius]" type="text" value="<?php if(isset($options['blog_masonry_border_radius'])){ if ($options['blog_masonry_border_radius']) { echo esc_attr($options['blog_masonry_border_radius'], 'qode'); } } ?>" size="10" maxlength="10" />
								</div>
							</td>
						</tr>
						<tr><td colspan='2'><h2>Blog single</h2></td></tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Sidebar layout', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[blog_single_sidebar]">
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == "default") { echo "selected='selected'"; } } ?> value="default">No Sidebar</option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 1) { echo "selected='selected'"; } } ?> value="1">Sidebar 1/3 right</option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 2) { echo "selected='selected'"; } } ?> value="2">Sidebar 1/4 right</option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 3) { echo "selected='selected'"; } } ?> value="3">Sidebar 1/3 left</option>
									<option <?php if(isset($options['blog_single_sidebar'])){$blog_single_sidebar = $options['blog_single_sidebar']; if ($blog_single_sidebar == 4) { echo "selected='selected'"; } } ?> value="4">Sidebar 1/4 left</option>

								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Sidebar to display', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[blog_single_sidebar_custom_display]">
									<option value="" <?php if(isset($options['blog_single_sidebar_custom_display'])){ $blog_single_sidebar_custom_display = $options['blog_single_sidebar_custom_display'];  if ($blog_single_sidebar_custom_display == "" ) { echo "selected='selected'";  } }?>></option>
									<?php
									foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
										if(isUserMadeSidebar(ucwords($sidebar['name']))){
									?>
										<option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php if(isset($options['blog_single_sidebar_custom_display'])){ $blog_single_sidebar_custom_display = $options['blog_single_sidebar_custom_display'];  if ($blog_single_sidebar_custom_display == ucwords( $sidebar['id'] ) ) { echo "selected='selected'";  } }?>>
											<?php echo ucwords( $sidebar['name'] ); ?>
										</option>
										<?php
											}
										}
										?>
								</select>
							</td>
						</tr>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Show Blog Author', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[blog_author_info]">
									<option <?php if(isset($options['blog_author_info'])){$blog_author_info = $options['blog_author_info']; if ($blog_author_info == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['blog_author_info'])){$blog_author_info = $options['blog_author_info']; if ($blog_author_info == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>

							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3><?php esc_html_e('Contact Page', 'qode'); ?></h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Mail send to', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[receive_mail]" type="text" value="<?php if ($options['receive_mail']) { echo esc_attr($options['receive_mail'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Enable Contact Form', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[enable_contact_form]">
									<option <?php if ($options['enable_contact_form'] == "no") { echo "selected='selected'"; } ?> value="no">No</option>
									<option <?php if ($options['enable_contact_form'] == "yes") { echo "selected='selected'"; } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Hide Website Field', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[hide_contact_form_website]">
									<option <?php if(isset($options['hide_contact_form_website'])){ $hide_contact_form_website = $options['hide_contact_form_website']; if ($hide_contact_form_website == 'no') { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['hide_contact_form_website'])){ $hide_contact_form_website = $options['hide_contact_form_website']; if ($hide_contact_form_website == 'yes') { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Email From', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[email_from]" type="text" value="<?php if ($options['email_from']) { echo esc_attr($options['email_from'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Email Subject', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[email_subject]" type="text" value="<?php if ($options['email_subject']) { echo esc_attr($options['email_subject'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Use reCaptcha', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[use_recaptcha]">
									<option <?php if ($options['use_recaptcha'] == "no") { echo "selected='selected'"; } ?> value="no">No</option>
									<option <?php if ($options['use_recaptcha'] == "yes") { echo "selected='selected'"; } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('ReCaptcha public key', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[recaptcha_public_key]" type="text" value="<?php if ($options['recaptcha_public_key']) { echo esc_attr($options['recaptcha_public_key'], 'qode'); } ?>"  />

							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('ReCaptcha private key', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[recaptcha_private_key]" type="text" value="<?php if ($options['recaptcha_private_key']) { echo esc_attr($options['recaptcha_private_key'], 'qode'); } ?>"  />
							</td>
						</tr>
						
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Heading above contact form', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[contact_heading_above]" type="text" value="<?php if ($options['contact_heading_above']) { echo esc_attr($options['contact_heading_above'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Show Section beetwen map and form', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[section_between_map_form]">
									<option <?php if (isset($options['section_between_map_form']) && $options['section_between_map_form'] == "no") { echo "selected='selected'"; } ?> value="no">No</option>
									<option <?php if (isset($options['section_between_map_form']) && $options['section_between_map_form'] == "yes") { echo "selected='selected'"; } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Alignment of section between map and form', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[section_between_map_form_position]">
									<option <?php if (isset($options['section_between_map_form_position']) && $options['section_between_map_form_position'] == "") { echo "selected='selected'"; } ?> value="">Default</option>
									<option <?php if (isset($options['section_between_map_form_position']) && $options['section_between_map_form_position'] == "left") { echo "selected='selected'"; } ?> value="left">Left</option>
									<option <?php if (isset($options['section_between_map_form_position']) && $options['section_between_map_form_position'] == "center") { echo "selected='selected'"; } ?> value="center">Center</option>
									<option <?php if (isset($options['section_between_map_form_position']) && $options['section_between_map_form_position'] == "right") { echo "selected='selected'"; } ?> value="right">Right</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Title in section between map and form', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[contact_section_above_form_title]" type="text" value="<?php if (isset($options['contact_section_above_form_title']) && $options['contact_section_above_form_title']) { echo esc_attr($options['contact_section_above_form_title'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Subtitle in section between map and form', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[contact_section_above_form_subtitle]" type="text" value="<?php if (isset($options['contact_section_above_form_subtitle']) && $options['contact_section_above_form_subtitle']) { echo esc_attr($options['contact_section_above_form_subtitle'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Enable Google Map', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[enable_google_map]">
									<option <?php if ($options['enable_google_map'] == "no") { echo "selected='selected'"; } ?> value="no">No</option>
									<option <?php if ($options['enable_google_map'] == "yes") { echo "selected='selected'"; } ?> value="yes">Yes</option>
								</select>
								<?php esc_html_e(' If you choose Yes and save, then come back to this section and you will get additional fields for google map settings.', 'qode'); ?>
							</td>
						</tr>
						<?php if($options['enable_google_map'] == "yes") : ?>
						<tr valign="middle">
							<td scope="row" width="150"><?php esc_html_e('Pin image', 'qode'); ?></td>
							<td>
								<div class="inline" style="width: 705px;">
								<input type="text" id="google_maps_pin_image" name="qode_options_proya[google_maps_pin_image]" class="google_maps_pin_image" value="<?php if (isset($options['google_maps_pin_image'])) { echo esc_attr($options['google_maps_pin_image'], 'qode'); } else { echo QODE_ROOT."/img/pin.png"; } ?>" size="70">
								<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address', 'qode'); ?></td>
							<td>
								<input id="google_maps_address" name="qode_options_proya[google_maps_address]" value="<?php if (isset($options['google_maps_address'])) { echo esc_attr($options['google_maps_address'], 'qode'); } ?>" size="130" />
								<?php esc_html_e('Example (Louvre Museum, Paris, France)', 'qode'); ?>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 2', 'qode'); ?></td>
							<td>
								<input id="google_maps_address2" name="qode_options_proya[google_maps_address2]" value="<?php if (isset($options['google_maps_address2'])) { echo esc_attr($options['google_maps_address2'], 'qode'); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 3', 'qode'); ?></td>
							<td>
								<input id="google_maps_address3" name="qode_options_proya[google_maps_address3]" value="<?php if (isset($options['google_maps_address3'])) { echo esc_attr($options['google_maps_address3'], 'qode'); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 4', 'qode'); ?></td>
							<td>
								<input id="google_maps_address4" name="qode_options_proya[google_maps_address4]" value="<?php if (isset($options['google_maps_address4'])) { echo esc_attr($options['google_maps_address4'], 'qode'); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map address 5', 'qode'); ?></td>
							<td>
								<input id="google_maps_address5" name="qode_options_proya[google_maps_address5]" value="<?php if (isset($options['google_maps_address5'])) { echo esc_attr($options['google_maps_address5'], 'qode'); } ?>" size="130" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map zoom', 'qode'); ?></td>
							<td>
								<input id="google_maps_zoom" name="qode_options_proya[google_maps_zoom]" value="<?php if (isset($options['google_maps_zoom'])) { echo esc_attr($options['google_maps_zoom'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map height (px)', 'qode'); ?></td>
							<td>
								<input id="google_maps_height" name="qode_options_proya[google_maps_height]" value="<?php if (isset($options['google_maps_height'])) { echo esc_attr($options['google_maps_height'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map style', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[google_maps_style]">
									<option <?php if(isset($options['google_maps_style'])){ $google_maps_style = $options['google_maps_style']; if ($google_maps_style == 'no') { echo "selected='selected'"; } }  ?> value="no">No</option>
									<option <?php if(isset($options['google_maps_style'])){ $google_maps_style = $options['google_maps_style']; if ($google_maps_style == 'yes') { echo "selected='selected'"; } }  ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map color', 'qode'); ?></td>
							<td>
								<div class="inline">
									<div class="colorSelector"><div style="<?php if (isset($options['google_maps_color'])){ echo 'background-color:'.esc_attr($options['google_maps_color'], 'qode').';'; } ?>"></div></div>
									<input name="qode_options_proya[google_maps_color]" type="text" value="<?php if(isset($options['google_maps_color'])){ if ($options['google_maps_color']) { echo esc_attr($options['google_maps_color'], 'qode'); } } ?>" size="10" maxlength="30" />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map saturation (-100 to 100)', 'qode'); ?></td>
							<td>
								<input id="google_maps_saturation" name="qode_options_proya[google_maps_saturation]" value="<?php if (isset($options['google_maps_saturation'])) { echo esc_attr($options['google_maps_saturation'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map lightness (-100 to 100)', 'qode'); ?></td>
							<td>
								<input id="google_maps_lightness" name="qode_options_proya[google_maps_lightness]" value="<?php if (isset($options['google_maps_lightness'])) { echo esc_attr($options['google_maps_lightness'], 'qode'); } ?>" size="10" maxlength="10" />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google map scroll on mouse wheel', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[google_maps_scroll_wheel]">
									<option <?php if(isset($options['google_maps_scroll_wheel'])){ $google_maps_scroll_wheel = $options['google_maps_scroll_wheel']; if ($google_maps_scroll_wheel == 'no') { echo "selected='selected'"; } }  ?> value="no">No</option>
									<option <?php if(isset($options['google_maps_scroll_wheel'])){ $google_maps_scroll_wheel = $options['google_maps_scroll_wheel']; if ($google_maps_scroll_wheel == 'yes') { echo "selected='selected'"; } }  ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<?php endif; ?>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>404 Page</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Title', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[404_title]" type="text" value="<?php if ($options['404_title']) { echo esc_attr($options['404_title'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Subtitle', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[404_subtitle]" type="text" value="<?php if (isset($options['404_subtitle']) && $options['404_subtitle']) { echo esc_attr($options['404_subtitle'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Text', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[404_text]" type="text" value="<?php if ($options['404_text']) { echo esc_attr($options['404_text'], 'qode'); } ?>"  />
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Back to home label', 'qode'); ?></td>
							<td>
								<input name="qode_options_proya[404_backlabel]" type="text" value="<?php if ($options['404_backlabel']) { echo esc_attr($options['404_backlabel'], 'qode'); } ?>"  />
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
			<h3>Social</h3>
			<div>
				<table class="form-table">
					<tbody>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Enable Social Share', 'qode'); ?></td>
							<td>
								<select name="qode_options_proya[enable_social_share]">
									<option <?php if(isset($options['enable_social_share'])){ $enable_social_share = $options['enable_social_share']; if ($enable_social_share == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
									<option <?php if(isset($options['enable_social_share'])){ $enable_social_share = $options['enable_social_share']; if ($enable_social_share == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
								</select>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Facebook', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Facebook', 'qode'); ?>
									<select name="qode_options_proya[enable_facebook_share]">
										<option <?php if(isset($options['enable_facebook_share'])){ $enable_facebook_share = $options['enable_facebook_share']; if ($enable_facebook_share == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_facebook_share'])){ $enable_facebook_share = $options['enable_facebook_share']; if ($enable_facebook_share == "yes") { echo "selected='selected'"; } }?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'qode'); ?>
									<input type="text" id="facebook_icon" name="qode_options_proya[facebook_icon]" class="qode_upload_field" value="<?php if (isset($options['facebook_icon'])) { echo esc_attr($options['facebook_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Twitter', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Twitter', 'qode'); ?>
									<select name="qode_options_proya[enable_twitter_share]">
										<option <?php if(isset($options['enable_twitter_share'])){ $enable_twitter_share = $options['enable_twitter_share']; if ($enable_twitter_share == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_twitter_share'])){ $enable_twitter_share = $options['enable_twitter_share']; if ($enable_twitter_share == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'qode'); ?>
									<input type="text" id="twitter_icon" name="qode_options_proya[twitter_icon]" class="qode_upload_field" value="<?php if (isset($options['twitter_icon'])) { echo esc_attr($options['twitter_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
								<div class="inline">
									<?php esc_html_e('Via', 'qode'); ?>
									<input name="qode_options_proya[twitter_via]" type="text" value="<?php if (isset($options['twitter_via'])) { echo esc_attr($options['twitter_via'], 'qode'); } ?>"  />
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Google +', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Google +', 'qode'); ?>
									<select name="qode_options_proya[enable_google_plus]">
										<option <?php if(isset($options['enable_google_plus'])){ $enable_google_plus = $options['enable_google_plus']; if ($enable_google_plus == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_google_plus'])){ $enable_google_plus = $options['enable_google_plus']; if ($enable_google_plus == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'qode'); ?>
									<input type="text" id="google_plus_icon" name="qode_options_proya[google_plus_icon]" class="qode_upload_field" value="<?php if (isset($options['google_plus_icon'])) { echo esc_attr($options['google_plus_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('LinkedIn', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable LinkedIn', 'qode'); ?>
									<select name="qode_options_proya[enable_linkedin]">
										<option <?php if(isset($options['enable_linkedin'])){ $enable_linkedin = $options['enable_linkedin']; if ($enable_linkedin == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_linkedin'])){ $enable_linkedin = $options['enable_linkedin']; if ($enable_linkedin == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Share Icon', 'qode'); ?>
									<input type="text" id="linkedin_icon" name="qode_options_proya[linkedin_icon]" class="qode_upload_field" value="<?php if (isset($options['linkedin_icon'])) { echo esc_attr($options['linkedin_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Tumblr', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Tumblr', 'qode'); ?>
									<select name="qode_options_proya[enable_tumblr]">
										<option <?php if(isset($options['enable_tumblr'])){ $enable_tumblr = $options['enable_tumblr']; if ($enable_tumblr == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_tumblr'])){ $enable_tumblr = $options['enable_tumblr']; if ($enable_tumblr == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Tumblr Icon', 'qode'); ?>
									<input type="text" id="tumblr_icon" name="qode_options_proya[tumblr_icon]" class="qode_upload_field" value="<?php if (isset($options['tumblr_icon'])) { echo esc_attr($options['tumblr_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Pinterest', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable Pinterest', 'qode'); ?>
									<select name="qode_options_proya[enable_pinterest]">
										<option <?php if(isset($options['enable_pinterest'])){ $enable_pinterest = $options['enable_pinterest']; if ($enable_pinterest == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_pinterest'])){ $enable_pinterest = $options['enable_pinterest']; if ($enable_pinterest == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('Pinterest Icon', 'qode'); ?>
									<input type="text" id="pinterest_icon" name="qode_options_proya[pinterest_icon]" class="qode_upload_field" value="<?php if (isset($options['pinterest_icon'])) { echo esc_attr($options['pinterest_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('VK', 'qode'); ?></td>
							<td>
								<div class="inline">
									<?php esc_html_e('Enable VK', 'qode'); ?>
									<select name="qode_options_proya[enable_vk]">
										<option <?php if(isset($options['enable_vk'])){ $enable_vk = $options['enable_vk']; if ($enable_vk == "no") { echo "selected='selected'"; } } ?> value="no">No</option>
										<option <?php if(isset($options['enable_vk'])){ $enable_vk = $options['enable_vk']; if ($enable_vk == "yes") { echo "selected='selected'"; } } ?> value="yes">Yes</option>
									</select>
								</div>
								<div class="inline" style="width: 780px;">
									<?php esc_html_e('VK Icon', 'qode'); ?>
									<input type="text" id="vk_icon" name="qode_options_proya[vk_icon]" class="qode_upload_field" value="<?php if (isset($options['vk_icon'])) { echo esc_attr($options['vk_icon'], 'qode'); } ?>" size="70">
									<input class="upload_button" type="button" value="Upload file">
								</div>
							</td>
						</tr>
						<tr valign="top">
							<td scope="row" width="150"><?php esc_html_e('Show For', 'qode'); ?></td>
							<td>
							<?php
								$args_post_types = array(
								   'public'   => true
								);
								$post_types = get_post_types($args_post_types);
								foreach ($post_types as $post_type ) {
								
									$post_type_object = get_post_type_object($post_type );
									?>
								 <input type="checkbox" value="<?php echo $post_type; ?>" <?php if (isset($options["post_types_names_$post_type"]) && ($options["post_types_names_$post_type"] == "$post_type")){ echo "checked='checked'"; }?> name="qode_options_proya[post_types_names_<?php echo $post_type; ?>]" /><?php echo " " . $post_type_object->labels->singular_name;  ?><br /><br />

								<?php } ?>
							</td>
						</tr>
					</tbody>
				</table>
				<?php		display_save_changes_button(); ?>
			</div>
		</div>
<?php	}

	public function generate_font_settings_section($field_name) {
		global $fontArrays;

		$font_weight_array = array('', '200', '300', '400', '500', '600', '700', '800', '900');
		$text_transform_array = array(
			'' => '',
			'none' => 'None',
			'capitalize' => 'Capitalize',
			'uppercase' => 'Upercase',
			'lowercase' => 'Lowercase'
		);
		$font_style_array = array(
			'' => '',
			'italic' => 'Italic'
		);

		$options = $this->options;
		?>
		<div class="inline">
			<?php esc_html_e('Font family', 'qode'); ?>
			<select name="qode_options_proya[<?php echo $field_name ?>_font_family]">
				<option value="-1">Default</option>
				<?php foreach($fontArrays as $fontArray) { ?>
					<option <?php if(isset($options[$field_name.'_font_family']) && $options[$field_name.'_font_family'] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="inline">
			<?php esc_html_e('Font size (px)', 'qode'); ?>
			<input name="qode_options_proya[<?php echo $field_name ?>_font_size]" type="text" value="<?php if (isset($options[$field_name.'_font_size'])) { echo esc_attr($options[$field_name.'_font_size'], 'qode'); } ?>" size="10" maxlength="10" />
		</div>
		<div class="inline">
			<?php esc_html_e('Letter Spacing (px)', 'qode'); ?>
			<input name="qode_options_proya[<?php echo $field_name ?>_letter_spacing]" type="text" value="<?php if (isset($options[$field_name.'_letter_spacing'])) { echo esc_attr($options[$field_name.'_letter_spacing'], 'qode'); } ?>" size="10" maxlength="10" />
		</div>
		<div class="inline">
			<?php esc_html_e('Font weight', 'qode'); ?>
			<select name="qode_options_proya[<?php echo $field_name ?>_font_weight]">
				<?php foreach($font_weight_array as $font_weight) { ?>
					<option <?php if (isset($options[$field_name.'_font_weight']) && $options[$field_name.'_font_weight'] == $font_weight) { echo "selected='selected'"; } ?> value="<?php echo $font_weight; ?>"><?php echo $font_weight; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="inline">
			<?php esc_html_e('Text Transform', 'qode'); ?>
			<select name="qode_options_proya[<?php echo $field_name; ?>_text_transform]">
				<?php foreach($text_transform_array as $text_transform_value => $text_transform_label) { ?>
					<option <?php if (isset($options[$field_name.'_text_transform']) && $options[$field_name.'_text_transform'] == $text_transform_value) { echo "selected='selected'"; } ?> value="<?php echo $text_transform_value; ?>"><?php echo $text_transform_label; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="inline">
			<?php esc_html_e('Text Style', 'qode'); ?>
			<select name="qode_options_proya[<?php echo $field_name; ?>_font_style]">
				<?php foreach($font_style_array as $font_style_value => $font_style_label) { ?>
					<option <?php if (isset($options[$field_name.'_font_style']) && $options[$field_name.'_font_style'] == $font_style_value) { echo "selected='selected'"; } ?> value="<?php echo $font_style_value; ?>"><?php echo $font_style_label; ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="inline">
			<?php esc_html_e('Color', 'qode'); ?>
			<div class="colorSelector"><div style="<?php if (isset($options[$field_name.'_color']) && $options[$field_name.'_color'] !== ''){ echo 'background-color:'.esc_attr($options[$field_name.'_color'], 'qode').';'; } ?>"></div></div>
			<input name="qode_options_proya[<?php echo $field_name ?>_color]" type="text" value="<?php if (isset($options[$field_name.'_color']) && $options[$field_name.'_color']) { echo esc_attr($options[$field_name.'_color'], 'qode'); } ?>" size="10" maxlength="30" />
		</div>
	<?php }

	public function generate_color_field($field_name) {
		$options = $this->options;
		?>
		<div class="colorSelector"><div style="<?php if (isset($options[$field_name]) && $options[$field_name] !== ''){ echo 'background-color:'.esc_attr($options[$field_name], 'qode').';'; } ?>"></div></div>
		<input name="qode_options_proya[<?php echo $field_name ?>]" type="text" value="<?php if (isset($options[$field_name]) && $options[$field_name] !== '') { echo esc_attr($options[$field_name], 'qode'); } ?>" size="10" maxlength="30" />
	<?php }

	public function generate_small_text_field($field_name) {
		$options = $this->options;
		?>
		<input name="qode_options_proya[<?php echo $field_name ?>]" type="text" value="<?php if (isset($options[$field_name])) { echo esc_attr($options[$field_name], 'qode'); } ?>" size="10" maxlength="10" />
	<?php }

	public function generate_text_field($field_name) {
		$options = $this->options;
		?>
		<input name="qode_options_proya[<?php echo $field_name ?>]" type="text" value="<?php if (isset($options[$field_name])) { echo esc_attr($options[$field_name], 'qode'); } ?>" />
	<?php }

	public function generate_font_family_field($field_name) {
		$options = $this->options;
		global $fontArrays;
		?>

		<select name="qode_options_proya[<?php echo $field_name ?>]">
			<option value="-1">Default</option>
			<?php foreach($fontArrays as $fontArray) { ?>
				<option <?php if(isset($options[$field_name]) && $options[$field_name] == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
			<?php } ?>
		</select>

	<?php }

	public function generate_dropdown_field($field_name, $dropdown_options) {
		$options = $this->options;

		if(is_array($options) && count($options)) {
			?>

			<select name="qode_options_proya[<?php echo $field_name; ?>]">
				<?php
				foreach($dropdown_options as $option_key => $option_label) {
					$selected = '';

					if(isset($options[$field_name]) && $options[$field_name] == $option_key) {
						$selected = 'selected';
					} ?>
					<option value="<?php echo $option_key; ?>" <?php echo $selected; ?>><?php echo $option_label; ?></option>
				<?php }
				?>
			</select>
		<?php }
	}


}



function display_save_changes_button() {
	    echo ('
		    <table class="form-table">
			<tbody>
			    <tr valign="middle">
				<th scope="row" width="150">&nbsp;</th>
				<td>
				    <div class="submit" style="padding:10px 0 0 80px; float:right; clear:both;">
					<input type="hidden" id="qode_submit" value="1" name="qode_submit"/>
					<input class="button-primary" type="submit" name="submit" value="'.esc_attr__('Save Changes', 'qode').'" />
				    </div>
				</td>
			    </tr>
			</tbody>
		    </table>');
}




$my_Qode_Theme_Options = new Qode_Theme_Options();

//set default values if they are not initialized - start//
if(!isset( $qode_options_proya['popup_menu_google_fonts'])){
    $qode_options_proya['popup_menu_google_fonts'] = '-1';
}

if(!isset( $qode_options_proya['popup_menu_google_fonts_2nd'])){
    $qode_options_proya['popup_menu_google_fonts_2nd'] = '-1';
}

if(!isset( $qode_options_proya['vertical_area'])){
    $qode_options_proya['vertical_area'] = 'no';
}

if(!isset($qode_options_proya['top_header_text_font_family'])) {
	$qode_options_proya['top_header_text_font_family'] = '-1';
}

if(!isset($qode_options_proya['portfolio_filter_font_family']) || $qode_options_proya['portfolio_filter_font_family'] === '') {
	$qode_options_proya['portfolio_filter_font_family'] = '-1';
}

if(!isset($qode_options_proya['page_subtitle_font_family']) || $qode_options_proya['page_subtitle_font_family'] === '') {
	$qode_options_proya['page_subtitle_font_family'] = '-1';
}

if(!isset($qode_options_proya['message_title_google_fonts']) || $qode_options_proya['message_title_google_fonts'] === '') {
	$qode_options_proya['message_title_google_fonts'] = '-1';
}

if(!isset($qode_options_proya['counters_font_family']) || $qode_options_proya['counters_font_family'] === '') {
	$qode_options_proya['counters_font_family'] = '-1';
}

if(!isset($qode_options_proya['counters_text_font_family']) || $qode_options_proya['counters_text_font_family'] === '') {
	$qode_options_proya['counters_text_font_family'] = '-1';
}

if(!isset($qode_options_proya['footer_title_font_family']) || $qode_options_proya['footer_title_font_family'] === '') {
	$qode_options_proya['footer_title_font_family'] = '-1';
}
//set default values if they are not initialized - end//

if(isset($qode_toolbar)):
  if(!session_id()) {
      session_start();
  }
	if (isset($_SESSION['qode_proya_header_type'])) {
		if ($_SESSION['qode_proya_header_type'] == "big") {
			$qode_options_proya["header_bottom_appearance"] = "stick menu_bottom";
		}
	}
	if (isset($_SESSION['qode_proya_page_transitions'])) {
		$qode_options_proya["page_transitions"] = $_SESSION['qode_proya_page_transitions'];
	}

	if (isset($_SESSION['qode_proya_header_top'])) {
		$qode_options_proya["header_top_area"] = $_SESSION['qode_proya_header_top'];
	}

    if (isset($_SESSION['qode_proya_alternative_menu'])) {
        if ($_SESSION['qode_proya_alternative_menu'] == "fullscreen") {
            $qode_options_proya["enable_popup_menu"] = "yes";
        }
        if ($_SESSION['qode_proya_alternative_menu'] == "side") {
            $qode_options_proya["enable_popup_menu"] = "no";
        }
    }
endif;