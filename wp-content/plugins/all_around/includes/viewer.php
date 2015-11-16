<?php

class all_around_viewer {
	public $wrapper, $main_object, $plugin_url;
	function __construct(&$wrapper, &$main_object) {
		$this->wrapper=$wrapper;
		$this->main_object=$main_object;
		$this->plugin_url=$main_object->url;
	}
	
	function generate_form ($id) {

		//$this->main_object->init_google_fonts();
		$this->generate_header();
		
		//echo '<pre>'; print_r ($this->wrapper->get_tags()); echo '</pre>';exit;
		//echo '<pre>'; print_r ($this->wrapper->get_tag_posts(3)); echo '</pre>';exit;
		//echo '<pre>'; print_r($this->wrapper->get_tag_info(3)); echo '</pre>'; exit;

		$message='Add slider';
		if (defined('ALL_AROUND_DEMO')) $message='Create a slider';
		$admin_url=$this->main_object->admin_url;
		$plugin_url=$this->main_object->url;
		$style3=array(
			'margin-right' => '5px !important',
			'margin-top' => '5px !important'
		);
		$new = all_around_visual_elements::generate_button('all_around_add_new_item', 'Add new item', 'black_clear', FALSE, $style3, FALSE, '', '', '', 0, FALSE);
		$new .= all_around_visual_elements::generate_button('all_around_add_new_from_post', 'Add new from post', 'black_clear', FALSE, $style3, FALSE, '', '', '', 0, FALSE);
		$new .= all_around_visual_elements::generate_button('all_around_add_new_from_category', 'Add new from category', 'black_clear', FALSE, $style3, FALSE, '', '', '', 0, FALSE);
		$new .= all_around_visual_elements::generate_button('all_around_add_new_from_tag', 'Add new from tag', 'black_clear', FALSE, $style3, TRUE, '', '', '', 0, FALSE);

		if ($id!='new') {
			$this->main_object->mvc->load($id);
			$this->main_object->mvc->pre_process_form ('all');
			//echo '<pre>'; print_r($this->main_object->mvc->model->loaded_items[0]['main_link']); echo '</pre>'; exit;
			$loaded_items=$this->main_object->mvc->generate_all_sub_items();
			$title_value=$this->main_object->mvc->get_loaded_name();
			$message='Edit slider';
		} else {
			$this->main_object->mvc->pre_process_form ('all');
			$loaded_items=array();
			$loaded_items['items']=array();
			$loaded_items['style']=array();
			$title_value='New slider';
			//$elements=$this->main_object->mvc->generate_html_form_part('empty_item', 0);
		}

		$cancel_url=$admin_url;
		if (defined('ALL_AROUND_DEMO')) $cancel_url='#';
		$status='<h2 class="all_around_status">'.$message.'<a href="'.$cancel_url.'">Cancel</a></h2> <span class="all_around_small_buton" id="all_around_update_notification" style="display: none;"></span>';
		$title=all_around_visual_elements::generate_input ('element_name', $title_value, NULL, array('auto_width'=>FALSE, 'margin-bottom' => '5px'));

		$ul='';
		$ul=all_around_visual_elements::generate_sortable('all_around_sortable', $loaded_items['items'], NULL, 'all_around_primary_sortable', $loaded_items['style']);

		$style_collapsible=array(
			'width' => '280px'
		);
		$buttons='';
		if (!defined('ALL_AROUND_DEMO')) {
			$style2=array(
				'width' => '70px'
			);
			$buttons=all_around_visual_elements::generate_button('all_around_save_button', 'Save', 'blue', FALSE, $style2, FALSE);
			$buttons.=all_around_visual_elements::generate_button('all_around_preview_button', 'Preview', 'center_label', FALSE, $style2, TRUE);
		} else {
			$style2=array(
				'width' => '120px',
				'margin-left' => '55px !important'
			);
			$buttons.=all_around_visual_elements::generate_button('all_around_preview_button', 'Preview', 'blue', FALSE, $style2, TRUE);		
		}
		$loader='<img src="'.$plugin_url.'images/ajax-loader2.gif" id="all_around_save_loader" style="float: right; margin-right:38px; display: none;">';
		$saved='<a class="all_around_small_buton" style="float: right; margin-right: 38px; display: none;" id="all_around_save_status">Saved</a>';
		$save_title='Save';
		if (defined('ALL_AROUND_DEMO')) $save_title='Preview';
		$save=all_around_visual_elements::generate_collapsible($save_title.$saved.$loader, $buttons, $style_collapsible, TRUE);

		$settings_form = $this->main_object->mvc->generate_html_form_part('settings');
		
		if (!defined('ALL_AROUND_DEMO')) {
		$steps=<<<eod
<h2 class="all_around_status">Step by step:</h2>
<ol class="all_around_steps">
	<li>
		<h3>Enter some name for this slider, something associative (name will not be shown on page)</h3>
	</li>
	<li>
		<h3>Add items</h3>
	</li>
	<li>
		<h3>Save it</h3>
	</li>
	<li>
		<h3>And go to <a href="$admin_url">All Around plugin main page</a></h3>
	</li>
</ol>
eod;
		} else {
		$steps=<<<eod
<h2 class="all_around_status">Step by step:</h2>
<ol class="all_around_steps">
	<li>
		<h3>Click on "Add new item" button</h3>
	</li>
	<li>
		<h3>Optionally: customize it, or add more items</h3>
	</li>
	<li>
		<h3>Click on "Preview" button (in right sidebar)</h3>
	</li>
</ol>
eod;
		}
		$settings_side=$save.$settings_form;
		$element_side=$status.$title.'<br />'.$new.'<br />'.$ul.'<br />'.$steps;

		$view = all_around_visual_elements::generate_form_layout($element_side, $settings_side);
		$hidden=all_around_visual_elements::generate_hidden('element_id', $id);
		if (defined('ALL_AROUND_DEMO')) $hidden.=all_around_visual_elements::generate_hidden('all_around_demo', 1);
		$view = all_around_visual_elements::generate_form ($hidden.$view, 'form1');
		echo $view;

		$this->close_header();
	}
	
	function generate_import_export ()  {
		$this->generate_header();

		if (!isset($_FILES['file'])) {
			echo '<h2 class="all_around_status">Export: </h2> ';

			echo all_around_visual_elements::generate_button('all_around_new', 'Export', 'blue', NULL, array('width'=>'150px', 'float' => 'none', 'display' => 'inline-block'), TRUE, $this->main_object->url.'all_around.php?export');

			echo '<br /><br /><form method="POST" enctype="multipart/form-data"><input type="hidden" name="MAX_FILE_SIZE" value="5100000"><h2 class="all_around_status">Import: </h2><input type="file" name="file">&nbsp;<input type="submit" name="submit" value="Import file"></form>';
		} else {
			//print_r ($_FILES['file']);
			$buffer=file_get_contents($_FILES['file']['tmp_name']);
			$r=$this->main_object->import_json_to_table_from_string($buffer);
			if ($r) {
				echo '<h2 class="all_around_status">Import successful</h2><br />';
				echo '<span style="color: #E0E0E0;">Go to <a href="'.$this->main_object->admin_url.'">plugin main page</a>.</span>';
			} else {
				echo '<h2 class="all_around_status">Error</h2><br />';
				echo '<span style="color: #E0E0E0;">Your file is corrupted :(</span>';
			}
			//echo $buffer;
		}
		echo '</div>';
	}
	
	function generate_index () {
		$this->generate_header();

		$url=$this->main_object->admin_url;
		$name=$this->main_object->plugin_name;
		$new_url=$url.'&action=new';

		echo '<h2 class="all_around_status">'.$name.'<a href="'.$new_url.'">Create new</a></h2> <span class="all_around_small_buton" id="all_around_update_notification" style="display: none;"></span>';
		echo $this->main_object->mvc->get_index_table();

		echo all_around_visual_elements::generate_button('all_around_new', 'Create new', 'blue', NULL, array('width'=>'150px', 'float'=>'right'), TRUE, $new_url);
		
		if (!isset($this->main_object->settings_in_db['use_separated_jquery'])) $this->main_object->settings_in_db['use_separated_jquery']=0;
		$use_separated_jquery=$this->main_object->settings_in_db['use_separated_jquery'];

		$separated=all_around_visual_elements::generate_checkbox ('Use separated jQuery only for this plugin in order to skip possible conflicts (activate this option only if slider fails to open)', 'use_separated_jquery', $use_separated_jquery, array('empty_wrapper'=>1), array('auto_width'=>FALSE));
		
		$skip_head_section=$this->main_object->settings['skip_head_section'];
		$skipheadsection=all_around_visual_elements::generate_checkbox ('Put CSS &amp; JS near HTML block, not in &lt;head&gt; section (this can help if your template or some other plugin screws up &lt;head&gt; section)', 'skip_head_section', $skip_head_section, array('empty_wrapper'=>1), array('auto_width'=>FALSE));

		echo <<<eof
		<script>
		(function($){
			all_around_add_event('use_separated_jquery', function(name, value) {
				all_around_send_ajax('all_around_set_settings_1val', 'var1=use_separated_jquery&val1='+value, function(response) {
					$('#all_around_save_status').fadeIn('slow', function(){
						$(this).fadeOut('slow');
					});

				});
			});
			all_around_add_event('skip_head_section', function(name, value) {
				all_around_send_ajax('all_around_set_settings_1val', 'var1=skip_head_section&val1='+value, function(response) {
					$('#all_around_save_status').fadeIn('slow', function(){
						$(this).fadeOut('slow');
					});

				});
			});
		})(jQuery);
		</script>
		<br /><span style="padding: 2px 0 0 0; font-size: 12px; display: block; float: left; font-weight: bold; position: relative; color: #E0E0E0;">Troubleshooting?</span>&nbsp;&nbsp;&nbsp;<a class="all_around_small_buton" style="top: 3px; display: none;" id="all_around_save_status">Saved</a><br /><br />
		$separated
		$skipheadsection
		<br /><br /><br />
		<h2 class="all_around_status">Step by step:</h2>
<ol class="all_around_steps">
	<li>
		<h3>Click on "Create New" button</h3>
	</li>
	<li>
		<h3>Setup your slider, save it, and come back here</h3>
	</li>
	<li>
		<h3>Copy "shortcode" from the table above and paste it in your post or page.<br />(for adding slider into .php parts of template use it like this "&lt;?php echo do_shortcode('[all_around id="X"]'); ?&gt;" where X is id of your slider)</h3>
	</li>
</ol>
eof;

		echo '</div>';
	}

	
	function generate_header() {
		$uploadertype=$this->wrapper->uploader_type;
		$ajaxreceiver=$this->wrapper->ajax_receiver;
		$ajaxactionparam=$this->wrapper->ajax_action_param;
		$ajaxsavehandler=$this->wrapper->ajax_save_handler;
		$ajaxpreviewhandler=$this->wrapper->ajax_preview_handler;
		$adminurl=$this->main_object->admin_url;
		$pluginurl=$this->main_object->url;
		$version=$this->main_object->plugin_version;
		$google_fonts_last_update=$this->main_object->settings['google_fonts_update'];
		$updategooglefonts=0;
		$shouldcheckforupdate=1;
		$now=date('m-Y');
		if ($now!=$google_fonts_last_update) $updategooglefonts=1;
		$style_group_collapsible_string=all_around_visual_elements::$style_group_collapsible_string;
		$all_around_demo=0;
		if (defined('ALL_AROUND_DEMO')) {
			$updategooglefonts=0;
			$shouldcheckforupdate=0;
			$ajaxreceiver=$this->wrapper->get_site_url().'/wp-admin/fake-ajax.php';
			$all_around_demo=1;
		}
		$style="";
		if (defined('localhost_developing')) {
			$style=<<<eod
#all_around_css_background {
	background: #ffffff !important;
}
eod;
		}
		echo <<<eof
<script>
var all_around_uploader_type = $uploadertype;
var all_around_ajax_receiver = '$ajaxreceiver';
var all_around_ajax_action_param = '$ajaxactionparam';
var all_around_ajax_save_handler = '$ajaxsavehandler';
var all_around_ajax_preview_handler = '$ajaxpreviewhandler';
var all_around_admin_url = '$adminurl';
var all_around_plugin_url = '$pluginurl';
var all_around_should_check_for_update=$shouldcheckforupdate;
var all_around_version='$version';
var all_around_update_google_fonts = $updategooglefonts;
var all_around_demo = $all_around_demo;
var all_around_style_group_collapsible_string = '$style_group_collapsible_string';
</script>
<style>
$style
</style>
<br />

<div id="all_around_css_main_wrapper">
eof;
	}
		
	function close_header()  {
		echo <<<eof
<script>
(function($){
	$(document).ready(function(){

eof;

		echo $this->main_object->mvc->generate_backend_javascript();

		echo <<<eof
	});
})(jQuery);
</script>

eof;
		echo '</div>';
	}

}


?>