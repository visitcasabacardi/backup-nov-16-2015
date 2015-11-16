<?php

class all_around_mvc_view_custom extends all_around_mvc_view {

	function generate_frontend_css($id) {
		if (isset($this->generated_frontend_css[$id])) return '';
		$this->generated_frontend_css[$id]=1;
		$buffer='';
		$buffer.=$this->main_object->fonts_object->echo_all_css($id);
		return $buffer;
	}


	function generate_frontend_javascript($id) {
			if (isset($this->generated_frontend_javascript[$id])) return '';
			$this->generated_frontend_javascript[$id]=1;
			if (count($this->model->loaded_items)==0) return;
			$buffer=<<<eof
	<script>
	(function($){
		$(document).ready(function(){
			var image_array = new Array();
			image_array = [

eof;
				$i=0;
				$width=$this->model->loaded_settings['settings_param_big_pic_width']['value']+39;
				$height=$this->model->loaded_settings['settings_param_big_pic_height']['value']+39;
				foreach ($this->model->loaded_items as $aid => $arr) {
					if ($this->model->loaded_items[$aid]['show']['value']==0) continue;
					$image=$this->model->loaded_items[$aid]['image']['value'];
					if ($this->model->loaded_items[$aid]['link_type']['value']==0) {
						$link=$image;
						$rel='prettyPhoto';
						$target='_self';
					}
					if ($this->model->loaded_items[$aid]['link_type']['value']==1) {
						$link=$this->model->loaded_items[$aid]['custom_link']['value'];
						$rel=$this->model->loaded_items[$aid]['custom_link_rel']['value'];
						if ($this->model->loaded_items[$aid]['custom_link_target']['value']==0) $target='_self';
						if ($this->model->loaded_items[$aid]['custom_link_target']['value']==1) $target='_blank';
					}
					if ($this->model->loaded_items[$aid]['upper_text_label_show']['value']==0) {
						$upper_text_label_show=0;
						$upper_text_label='';
						$upper_text_label_style='';
					} else {
						$upper_text_label_show=$this->model->loaded_items[$aid]['upper_text_label_show']['value'];
						$upper_text_label=$this->model->loaded_items[$aid]['upper_text_label']['value'];
						$upper_text_label=str_replace("'", '"', $upper_text_label);
						$upper_text_label_style=$this->model->loaded_items[$aid]['upper_text_label_style']['value'];
						if ($upper_text_label_style!='') $upper_text_label_style.=' ';
						$upper_text_label_style.=$this->model->loaded_items[$aid]['upper_text_label_font_generated']['value'];
						$upper_text_label_style=str_replace("'", '"', $upper_text_label_style);
					}
					if ($this->model->loaded_items[$aid]['lower_text_label_show']['value']==0) {
						$lower_text_label_show=0;
						$lower_text_label='';
						$lower_text_label_style='';
					} else {
						$lower_text_label_show=$this->model->loaded_items[$aid]['lower_text_label_show']['value'];
						$lower_text_label=$this->model->loaded_items[$aid]['lower_text_label']['value'];
						$lower_text_label=str_replace("'", '"', $lower_text_label);
						$lower_text_label_style=$this->model->loaded_items[$aid]['lower_text_label_style']['value'];
						if ($lower_text_label_style!='') $lower_text_label_style.=' ';
						$lower_text_label_style.=$this->model->loaded_items[$aid]['lower_text_label_font_generated']['value'];
						$lower_text_label_style=str_replace("'", '"', $lower_text_label_style);
					}
					if ($i) $buffer.=",\n";
					if ($image=='') $image=$this->main_object->url.'images/no_image3.jpg';
					if ($this->model->loaded_settings['settings_automatically_resize_images']['value']==1) $image=$this->main_object->get_cached_image ($image, $width, $height);
					$main_link=$this->model->loaded_items[$aid]['main_link']['value'];
					$main_link_target=$this->model->loaded_items[$aid]['main_link_target']['value'];
					$buffer.="			{image: '".$image."', link_url: '".$link."', link_rel: '".$rel."', link_target: '".$target."', main_link: '".$main_link."', main_link_target: '".$main_link_target."', upper_text_label_show: ".$upper_text_label_show.", upper_text_label: '".$upper_text_label."', upper_text_label_style: '".$upper_text_label_style."', lower_text_label_show: ".$lower_text_label_show.", lower_text_label: '".$lower_text_label."', lower_text_label_style: '".$lower_text_label_style."'}";
					$i++;
				}
				$url=$this->main_object->url;
				$buffer.=<<<eof

			];
			$('#all_around_slider_$id').content_slider({
				map: image_array,
				plugin_url: '$url',

eof;

				$i=0;
				foreach ($this->model->loaded_settings as $aid => $row) {
					$var=$row['name'];
					if (substr($var,0,15)=='settings_param_') {
						$val=$row['value'];
						$default_val=$row['default_value'];
						$skip=0;
						if (defined('ALL_AROUND_DEMO2')) {
							if ($var=='settings_param_max_shown_items') $skip=1;
						}
						if ($default_val==$val && $skip==0) continue;
						$var=substr($var, 15);
						if ($i) $buffer.=",\n";
						if (!is_numeric($val)) $val='"'.$val.'"';
						$buffer.='				'.$var.': '.$val;
						$i++;
					}
				}


				$jQuery='jQuery';
				if ($this->main_object->alternative_jquery) $jQuery='all_around_jQuery';
				$buffer.=<<<eof

			});
		});
	})($jQuery);
	</script>

eof;
			return $buffer;
	}

	function pre_generate_html_form_part($for, $id=0) {
		if ($for=='settings') {
			/*$hv=0;
			foreach ($this->model->loaded_settings as $id => $field) {
				if (isset($field['name'])) {
					if ($field['name']=='settings_param_hv_switch') $hv=$field['value'];
					if ($field['name']=='settings_param_wrapper_text_max_height' && $hv==1) $this->model->loaded_settings[$id]['label']='Slider width';
				}
			}
			if ($hv==1) {
				foreach ($this->model->loaded_settings as $id => $field) {
					if (isset($field['name'])) {
						if ($field['name']=='settings_param_wrapper_text_max_height') $this->model->loaded_settings[$id]['label']='Slider width';
					}
				}
			}*/
			if (isset($this->model->loaded_settings['settings_param_hv_switch']) && intval($this->model->loaded_settings['settings_param_hv_switch']['value'])==1) {
				$this->model->loaded_settings['settings_param_wrapper_text_max_height']['label']='Slider width';
			}
		}
	}

	function generate_frontend_html($id) {
		$class='content_slider_wrapper';
		if ($this->model->loaded_settings['settings_param_hv_switch']['value']==1) $class='content_slider_wrapper_vertical';
		$buffer='';
		if (defined('ALL_AROUND_DEMO2')) $buffer.='<br />';
		$buffer.='<div class="'.$class.'" id="all_around_slider_'.$id.'">'."\n";
		$i=0;
		foreach ($this->model->loaded_items as $aid => $arr) {
			if ($this->model->loaded_items[$aid]['show']['value']==0) continue;
			$buffer.='	<div class="circle_slider_text_wrapper" id="sw'.$i.'" style="display: none;">'."\n";
			$buffer.='		<div class="content_slider_text_block_wrap">'."\n";
			//$buffer.=print_r($this->model->item_loaded_custom_forms[$aid], true)."\n";
			$buffer.=$this->model->loaded_items[$aid]['content']['value']."\n";
			$buffer.='		</div>'."\n";
			$buffer.='		<div class="clear"></div>'."\n";
			$buffer.='	</div>'."\n";
			$i++;
		}
	
		$buffer.="</div>";
		return $buffer;
	}
}

class all_around_mvc_model_custom extends all_around_mvc_model {

	function get_item_registry_values_from_post_array(&$arr) {
		if (!isset($arr)) return FALSE;
		if ($arr==NULL) return FALSE;
		$rarr=array();

		$rarr['content_type']=4;
		if (!isset($arr['title'])) $arr['title']='New post';
		if (!isset($arr['content'])) $arr['content']='';
		$rarr['title']=$arr['title'];
		if (!empty($arr['thumbnail'])) $rarr['image']=$arr['thumbnail'];
		$rarr['content']="<h3>".$arr['title']."</h3><br /><br />\n".$arr['content'];
		if (!empty($arr['link'])) {
			$rarr['custom_link']=$arr['link'];
			$rarr['link_type']=1;
		}

		return $rarr;
	}

	function set_default_values_from_post($id, $post_id, $arr=FALSE) {
		if ($arr===FALSE) $arr=$this->wrapper->post_get($post_id);
		if ($arr===NULL) return FALSE;
		if (!isset($arr['title'])) $arr['title']='New post';
		if (!isset($arr['content'])) $arr['content']='';
		foreach ($this->loaded_items[$id] as $aid => $row) {
			if ($row['base_name']=='content_type') $this->loaded_items[$id][$aid]['value']=4;
			if ($row['base_name']=='title') $this->loaded_items[$id][$aid]['value']=$arr['title'];
			if ($row['base_name']=='image') if (!empty($arr['thumbnail'])) $this->loaded_items[$id][$aid]['value']=$arr['thumbnail'];
			if ($row['base_name']=='content') $this->loaded_items[$id][$aid]['value']="<h3>".$arr['title']."</h3><br /><br />\n".$arr['content'];
			if ($row['base_name']=='custom_link') if (!empty($arr['link'])) $this->loaded_items[$id][$aid]['value']=$arr['link'];
			if ($row['base_name']=='link_type') if (!empty($arr['link'])) $this->loaded_items[$id][$aid]['value']=1;
		}
		return TRUE;
	}
	function load_scheme() {
		$style=array(
			'width' => '300px'
		);
		$wrapper=array(
			'border-top' => '1px dotted #4d4d4d',
			'padding-top' => '10px'
		);
		if ($this->main_object->backend_style==1) {
			$font_style=array(
				'width' => '265px'
			);
			$attached_form=array(
				'clear' => 'both',
				'border' => '1px dashed #7F7F7F',
				'display' => 'inline-block',
				'margin-left' => '6px',
				'padding-top' => '10px',
				'width' => '100%'
			);
		}
		if ($this->main_object->backend_style==2) {
			$font_style=array(
				'width' => '262px'
			);
			$attached_form=array(
				'clear' => 'both',
				'border' => '1px dotted #4d4d4d',
				'display' => 'inline-block',
				'margin-left' => '6px',
				'margin-bottom' => '10px',
				'padding-top' => '10px',
				'width' => '100%'
			);
		}
		$this->items_scheme=array(
			'group' => array(
				'type' => 'hidden',
				'value' => -1,
				'class' => 'all_around_group_field'
			),
			'loaded_from_post' => array(
				'type' => 'hidden',
				'value' => -1,
				'class' => 'all_around_loaded_from_post_field'
			),
			'show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Visible',
				'style' => $style,
				'without_wrapper_label' => 1,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'update_from_post' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Update content from post automatically',
				'style' => $style,
				'without_wrapper_label' => 1,
				'group' => 'item_*_DivGroup_update_from_post',
				'not_visible_if' => array (
					0 => 'item_*_loaded_from_post=-1'
				)
			),
			'title' => array(
				'type' => 'input',
				'value' => 'Item',
				'label' => 'Title',
				'style' => $style
			),
			'title_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Title font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'Image',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">',
				'html_after' => '</div>'
			),
			'link_type' => array(
				'type' => 'listbox',
				'value' => 0,
				'list' => array(
					0 => 'Full size image',
					1 =>  'Custom link'
				),
				'label' => 'Zoom icon is linking',
				'style' => $style,
				'if_value' => array (
					0 => 'hide .item_*_DivGroup_custom_link', 
					1 => 'show .item_*_DivGroup_custom_link'
				),
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'custom_link' => array(
				'type' => 'input',
				'value' => 'http://',
				'label' => 'Zoom icon custom link',
				'style' => $style,
				'group' => 'item_*_DivGroup_custom_link'
			),
			'custom_link_target' => array(
				'type' => 'listbox',
				'value' => '0',
				'list' => array(
					0 => 'The same tab',
					1 => 'New tab'
				),
				'label' => 'Open zoom icon link in',
				'style' => $style,
				'group' => 'item_*_DivGroup_custom_link'
			),
			'custom_link_rel' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Zoom icon custom link "rel" attribute',
				'style' => $style,
				'group' => 'item_*_DivGroup_custom_link'
			),
			'main_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Big circle custom link (main circle)',
				'style' => $style,
				'wrapper' => $wrapper,
				'group' => 'item_ALL_DivGroup_main_link',
			),
			'main_link_target' => array(
				'type' => 'listbox',
				'value' => '0',
				'list' => array(
					0 => 'The same tab',
					1 => 'New tab'
				),
				'label' => 'Open big circle link in',
				'style' => $style,
				'group' => 'item_ALL_DivGroup_main_link',
				'html_after' => '</div>'
			),
			'upper_text_label_show' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Text label above the small circle',
				'without_wrapper_label' => 1,
				'style' => $style,
				'if_value' => array (
					0 => 'hide .item_*_DivGroup_upper_text_label', 
					1 => 'show .item_*_DivGroup_upper_text_label'
				),
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;"><div style="width: 300px;">'
			),
			'upper_text_label' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Upper label text',
				'style' => $style,
				'group' => 'item_*_DivGroup_upper_text_label'
			),
			'upper_text_label_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Upper label text font',
				'style' => $font_style,
				'group' => 'item_*_DivGroup_upper_text_label'
			),
			'upper_text_label_font_generated' => array(
				'type' => 'hidden',
				'value' => '',
				'group' => 'item_*_DivGroup_upper_text_label'
			),
			'upper_text_label_style' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Upper label CSS style',
				'style' => $style,
				'group' => 'item_*_DivGroup_upper_text_label',
				'html_after' => '</div>'
			),
			'lower_text_label_show' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Text label under the small circle',
				'without_wrapper_label' => 1,
				'style' => $style,
				'if_value' => array (
					0 => 'hide .item_*_DivGroup_lower_text_label', 
					1 => 'show .item_*_DivGroup_lower_text_label'
				),
				'html_before' => '<div style="width: 300px;">'
			),
			'lower_text_label' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Lower label text',
				'style' => $style,
				'group' => 'item_*_DivGroup_lower_text_label'
			),
			'lower_text_label_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Lower label text font',
				'style' => $font_style,
				'group' => 'item_*_DivGroup_lower_text_label'
			),
			'lower_text_label_font_generated' => array(
				'type' => 'hidden',
				'value' => '',
				'group' => 'item_*_DivGroup_lower_text_label'
			),
			'lower_text_label_style' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Lower label CSS style',
				'style' => $style,
				'group' => 'item_*_DivGroup_lower_text_label',
				'html_after' => '</div></div>'
			),
			'content_type' => array(
				'type' => 'listbox',
				'value' => 0,
				'list' => array(
					0 => 'Our team',
					1 => 'Products',
					2 => 'Portfolio',
					3 => 'Services',
					4 => 'Custom'
				),
				'label' => 'Content type',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; clear: both; margin-left: 15px;">',
				'html_after' => '</div>',
				'if_value' => array (
					0 => 'ajax_load_form #item_*_attached_form custom_form_0',
					1 => 'ajax_load_form #item_*_attached_form custom_form_1',
					2 => 'ajax_load_form #item_*_attached_form custom_form_2',
					3 => 'ajax_load_form #item_*_attached_form custom_form_3',
					4 => 'empty #item_*_attached_form'
				)
			),
			'attached_form' => array(
				'type' => 'attached_form',
				'value' => '0',
				'style' => $attached_form,
				'if_other_fields' => array(
						array(
							'item_*_content_type=0' => 'show_form custom_form_0',
							'item_*_content_type=1' => 'show_form custom_form_1',
							'item_*_content_type=2' => 'show_form custom_form_2',
							'item_*_content_type=3' => 'show_form custom_form_3'
						)
					)
			),
			'content' => array(
				'type' => 'text',
				'value' => '',
				'wrapper' => array('clear' => 'both', 'margin-left' => '15px'),
				'label' => 'Content that will be shown'
			)
		);


		$style=array(
			'width' => '240px'
		);
		$style2=array(
			'padding-bottom' => '20px'
		);
		$style3=array(
			'width' => '205px',
			'text-align' => 'center',
			'font-weight' => 'bold'
		);
		$button_wrapper=array(
			'margin-bottom' => '20px'
		);

		$this->settings_scheme=array(
			'settings_param_max_shown_items' => array(
				'type' => 'input',
				'value' => '3',
				'label' => 'Number of visible circles',
				'style' => $style
			),
			'settings_param_active_item' => array(
				'type' => 'input',
				'value' => '0',
				'label' => 'Active item on start',
				'style' => $style
			),
			'settings_param_main_circle_position' => array(
				'type' => 'listbox',
				'value' => 0,
				'list' => array(
					0 => 'Center',
					1 => 'Left',
					2 => 'Right'
				),
				'label' => 'Main circle position',
				'style' => $style
			),
			'settings_param_responsive_by_available_space' => array(
				'type' => 'listbox',
				'value' => 0,
				'list' => array(
					0 => 'By browser window',
					1 => 'By available space'
				),
				'label' => 'Responsive by',
				'style' => $style
			),
			'settings_param_wrapper_text_max_height' => array(
				'type' => 'number',
				'value' => '810',
				'min' => 0,
				'max' => 2000,
				'unit' => 'px',
				'label' => 'Slider height',
				'style' => $style
			),
			'settings_param_automatic_height_resize' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Automatic height resize',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_hv_switch' => array(
				'type' => 'listbox',
				'value' => 0,
				'list' => array(
					0 => 'Horizontal',
					1 => 'Vertical'
				),
				'label' => 'Type',
				'style' => $style
			),
			'settings_param_middle_click' => array(
				'type' => 'listbox',
				'value' => 2,
				'list' => array(
					0 => 'No response',
					1 => 'Go to the previous circle',
					2 => 'Go to the next circle',
					3 => 'Go to custom link'
				),
				'label' => 'When main circle is clicked',
				'style' => $style,
				'if_value' => array (
					0 => 'hide .item_ALL_DivGroup_main_link', 
					1 => 'hide .item_ALL_DivGroup_main_link', 
					2 => 'hide .item_ALL_DivGroup_main_link', 
					3 => 'show .item_ALL_DivGroup_main_link'
				),
				'html_before' => '<div id="all_around_group_advanced_options" style="display: none; padding: 0; margin: 0;">'
			),
			'settings_param_bind_arrow_keys' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Slide with keyboard arrow keys',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_allow_shadow' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Shadows on/off',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_border_on_off' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Borders on/off',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_small_border' => array(
				'type' => 'number',
				'value' => '5',
				'min' => 0,
				'max' => 50,
				'unit' => 'px',
				'label' => 'Border thickness of small circle',
				'style' => $style
			),
			'settings_param_big_border' => array(
				'type' => 'number',
				'value' => '8',
				'min' => 0,
				'max' => 50,
				'unit' => 'px',
				'label' => 'Border thickness of big circle',
				'style' => $style
			),
			'settings_param_border_radius' => array(
				'type' => 'number',
				'value' => '-1',
				'min' => -1,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Border radius',
				'style' => $style
			),
			'settings_param_border_color' => array(
				'type' => 'color',
				'value' => '#282828',
				'label' => 'Border color',
				'style' => $style
			),
			'settings_param_radius_proportion' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Keep border radius proportion',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_mode' => array(
				'type' => 'listbox',
				'value' => 2,
				'list' => array(
					1 => 'Do not enlarge middle circle',
					2 => 'Enlarge middle circle'
				),
				'label' => 'While sliding',
				'style' => $style
			),
			'settings_param_small_resolution_max_height' => array(
				'type' => 'number',
				'value' => '0',
				'min' => 0,
				'max' => 1600,
				'unit' => 'px',
				'label' => 'Max slider height in small resolution',
				'style' => $style
			),
			'settings_param_small_pic_width' => array(
				'type' => 'number',
				'value' => '84',
				'min' => 1,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Width of small circle',
				'style' => $style
			),
			'settings_param_small_pic_height' => array(
				'type' => 'number',
				'value' => '84',
				'min' => 1,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Height of small circle',
				'style' => $style
			),
			'settings_param_child_div_width' => array(
				'type' => 'number',
				'value' => '104',
				'min' => 1,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Space around small circle (width)',
				'style' => $style
			),
			'settings_param_child_div_height' => array(
				'type' => 'number',
				'value' => '104',
				'min' => 1,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Space around small circle (height)',
				'style' => $style
			),
			'settings_param_big_pic_width' => array(
				'type' => 'number',
				'value' => '231',
				'min' => 1,
				'max' => 1000,
				'unit' => 'px',
				'label' => 'Width of big circle',
				'style' => $style
			),
			'settings_param_big_pic_height' => array(
				'type' => 'number',
				'value' => '231',
				'min' => 1,
				'max' => 1000,
				'unit' => 'px',
				'label' => 'Height of big circle',
				'style' => $style
			),
			'settings_param_moving_speed' => array(
				'type' => 'number',
				'value' => '70',
				'min' => 1,
				'max' => 500,
				'unit' => 'ms',
				'label' => 'Moving speed (animation)',
				'style' => $style
			),
			'settings_param_moving_speed_offset' => array(
				'type' => 'number',
				'value' => '100',
				'min' => 1,
				'max' => 500,
				'unit' => 'ms',
				'label' => 'Moving speed offset',
				'style' => $style
			),
			'settings_param_moving_easing' => array(
				'type' => 'input',
				'value' => 'linear',
				'label' => 'Moving easing',
				'style' => $style
			),
			'settings_param_use_thin_arrows' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Use thin arrows',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_arrow_color' => array(
				'type' => 'color',
				'value' => '#282828',
				'label' => 'Arrow color',
				'style' => $style
			),
			'settings_param_arrow_speed' => array(
				'type' => 'number',
				'value' => '300',
				'min' => 1,
				'max' => 1000,
				'unit' => 'ms',
				'label' => 'Arrows speed (animation)',
				'style' => $style
			),
			'settings_param_hide_arrows' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Hide arrows',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_arrow_easing' => array(
				'type' => 'input',
				'value' => 'linear',
				'label' => 'Arrows easing',
				'style' => $style
			),
			'settings_param_hover_movement' => array(
				'type' => 'number',
				'value' => '6',
				'min' => 0,
				'max' => 100,
				'unit' => 'px',
				'label' => 'Mouse over movement (hover effect)',
				'style' => $style
			),
			'settings_param_hover_speed' => array(
				'type' => 'number',
				'value' => '100',
				'min' => 1,
				'max' => 1000,
				'unit' => 'ms',
				'label' => 'Mouse over speed (hover effect)',
				'style' => $style
			),
			'settings_param_hover_easing' => array(
				'type' => 'input',
				'value' => 'linear',
				'label' => 'Hover easing',
				'style' => $style
			),
			'settings_param_prettyPhoto_color' => array(
				'type' => 'color',
				'value' => '#1AB99B',
				'label' => 'Zoom icon color',
				'style' => $style
			),
			'settings_param_prettyPhoto_img' => array(
				'type' => 'image_upload',
				'value' => '',
				'empty_image' => $this->main_object->url."images/more.png",
				'label' => 'Zoom icon image (21px * 21px)',
				'style' => $style
			),
			'settings_param_prettyPhoto_speed' => array(
				'type' => 'number',
				'value' => '200',
				'min' => 1,
				'max' => 1000,
				'unit' => 'ms',
				'label' => 'Zoom icon speed (animation)',
				'style' => $style
			),
			'settings_param_prettyPhoto_easing' => array(
				'type' => 'input',
				'value' => 'linear',
				'label' => 'Zoom icon easing',
				'style' => $style
			),
			'settings_param_prettyPhoto_width' => array(
				'type' => 'number',
				'value' => '21',
				'min' => 1,
				'max' => 100,
				'unit' => 'px',
				'label' => 'Zoom icon width',
				'style' => $style
			),
			'settings_param_prettyPhoto_start' => array(
				'type' => 'input',
				'value' => '0.93',
				'label' => 'Position of zoom icon',
				'style' => $style
			),
			'settings_param_prettyPhoto_movement' => array(
				'type' => 'number',
				'value' => '45',
				'min' => 0,
				'max' => 250,
				'unit' => 'px',
				'label' => 'Zoom icon movement',
				'style' => $style
			),
			'settings_param_hide_prettyPhoto' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Hide zoom icon',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_auto_play' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Auto play',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_auto_play_direction' => array(
				'type' => 'listbox',
				'value' => 1,
				'list' => array(
					1 => 'Slider will go to the right',
					2 => 'Slider will go to the left'
				),
				'label' => 'Auto play direction',
				'style' => $style
			),
			'settings_param_auto_play_pause_time' => array(
				'type' => 'number',
				'value' => '3000',
				'min' => 0,
				'max' => 10000,
				'unit' => 'ms',
				'label' => 'Auto play interval',
				'style' => $style
			),
			'settings_param_preload_all_images' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Preload all images',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_enable_mousewheel' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Enable Mousewheel scrolling',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_activate_border_div' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Slower but nicer border rendering',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_automatically_resize_images' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Automatically resize images',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_keep_on_top_middle_circle' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Keep on top middle circle',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_dinamically_set_class_id' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Dinamically set class id for circles',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_dinamically_set_position_class' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Dinamically set position class',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_hide_content' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Hide content',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_left_offset' => array(
				'type' => 'number',
				'name' => 'settings_param_left_offset',
				'value' => '0',
				'min' => 0,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Left offset',
				'style' => $style
			),
			'settings_param_top_offset' => array(
				'type' => 'number',
				'name' => 'settings_param_top_offset',
				'value' => '0',
				'min' => 0,
				'max' => 500,
				'unit' => 'px',
				'label' => 'Top offset',
				'style' => $style
			),
			'settings_param_circle_left_offset' => array(
				'type' => 'number',
				'name' => 'settings_param_circle_left_offset',
				'value' => '0',
				'min' => -1000,
				'max' => 1000,
				'unit' => 'px',
				'label' => 'Circle left offset',
				'style' => $style
			),
			'settings_param_minus_width' => array(
				'type' => 'number',
				'name' => 'settings_param_minus_width',
				'value' => '0',
				'min' => -1000,
				'max' => 1000,
				'unit' => 'px',
				'label' => 'Slider width minus',
				'style' => $style
			),
			'settings_param_content_margin_left' => array(
				'type' => 'number',
				'name' => 'settings_param_content_margin_left',
				'value' => '0',
				'min' => -200,
				'max' => 200,
				'unit' => 'px',
				'label' => 'Content left offset',
				'style' => $style
			),
			'settings_param_enable_scroll_with_touchmove_on_horizontal_version' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Enable scrolling with touchmove on horizontal slider',
				'without_wrapper_label' => 1,
				'style' => $style
			),
			'settings_param_enable_scroll_with_touchmove_on_vertical_version' => array(
				'type' => 'checkbox',
				'value' => 0,
				'label' => 'Enable scrolling with touchmove on vertical slider',
				'without_wrapper_label' => 1,
				'style' => $style,
				'wrapper' => $style2
			),
			'settings_param_movement_coefficient' => array(
				'type' => 'number',
				'name' => 'settings_param_movement_coefficient',
				'value' => 1,
				'min' => 0,
				'max' => 2,
				'step' => 0.1,
				'unit' => '',
				'label' => 'Drag and move sensitivity',
				'style' => $style
			),
			'settings_deleted_posts' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Deleted posts',
				'style' => $style
			),
			'advanced_button' => array(
				'type' => 'button',
				'value' => 'Advanced options',
				'without_wrapper_label' => 1,
				'style' => $style3,
				'wrapper' => $button_wrapper,
				'html_before' => '</div>'
			)
		);
		if (defined('ALL_AROUND_DEMO')) $this->settings_scheme['settings_param_max_shown_items']['value']=7;

		$style=array(
			'width' => '300px'
		);
		if ($this->main_object->backend_style==1) {
			$textarea_style=array(
				'width' => '300px',
				'height' => '200px'
			);
		}
		if ($this->main_object->backend_style==2) {
			$textarea_style=array(
				'width' => '300px',
				'height' => '238px'
			);
		}
		$this->item_custom_forms_scheme[0]=array(
			'f1_first_field' => array(
				'type' => 'input',
				'value' => 'Position:',
				'label' => 'First field',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f1_first_field_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'First field font',
				'style' => $font_style
			),
			'f1_first_field_value' => array(
				'type' => 'input',
				'value' => 'Enter here position in company',
				'label' => 'First field value',
				'style' => $style
			),
			'f1_first_field_value_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'First field value font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f1_second_field' => array(
				'type' => 'input',
				'value' => 'Address:',
				'label' => 'Second field',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f1_second_field_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Second field font',
				'style' => $font_style
			),
			'f1_second_field_value' => array(
				'type' => 'input',
				'value' => 'Enter here address',
				'label' => 'Second field value',
				'style' => $style
			),
			'f1_second_field_value_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Second field value font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f1_third_field' => array(
				'type' => 'input',
				'value' => 'E-mail:',
				'label' => 'Third field',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f1_third_field_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Third field font',
				'style' => $font_style
			),
			'f1_third_field_value' => array(
				'type' => 'input',
				'value' => '<a href="mailto:some@email.com">some@email.com</a>',
				'label' => 'Third field value',
				'style' => $style
			),
			'f1_third_field_value_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Third field value font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f1_fourth_field' => array(
				'type' => 'input',
				'value' => 'Web:',
				'label' => 'Fourth field',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f1_fourth_field_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Fourth field font',
				'style' => $font_style
			),
			'f1_fourth_field_value' => array(
				'type' => 'input',
				'value' => '<a href="http://www.">www.</a>',
				'label' => 'Fourth field value',
				'style' => $style
			),
			'f1_fourth_field_value_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Fourth field value font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f1_about' => array(
				'type' => 'text',
				'value' => '<span class="bold">About: </span> Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style,
				'html_before' => '<div style="width: 300px; float: left; clear: both; margin-left: 15px;">'
			),
			'f1_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'About font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f1_social_icons_type' => array(
				'type' => 'listbox',
				'value' => 0,
				'list' => array(
					0 => 'Default',
					1 => 'New type 1',
					2 => 'New type 2',
					3 => 'New type 3',
					4 => 'New type 4'
				),
				'label' => 'Social icons type',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f1_facebook_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Facebook link',
				'style' => $style
			),
			'f1_gplus_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Google+ link',
				'style' => $style
			),
			'f1_twitter_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Twitter link',
				'style' => $style
			),
			'f1_pinterest_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Pinterest link',
				'style' => $style
			),
			'f1_linkedin_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Linkedin link',
				'style' => $style
			),
			'f1_envato_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Envato link',
				'style' => $style
			),
			'f1_youtube_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Youtube link',
				'style' => $style
			),
			'f1_deviant_link' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'DeviantArt link',
				'style' => $style,
				'html_after' => '</div>'
			)
		);
		if ($this->main_object->backend_style==1) {
			$textarea_style=array(
				'width' => '300px',
				'height' => '189px'
			);
		}
		if ($this->main_object->backend_style==2) {
			$textarea_style=array(
				'width' => '300px',
				'height' => '238px'
			);		
		}

		$this->item_custom_forms_scheme[1]=array(
			'f2_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style,
				'html_before' => '<div style="width: 300px; float: left; clear: both; margin-left: 15px;">'
			),
			'f2_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'About font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f2_first_field' => array(
				'type' => 'input',
				'value' => 'Cost:',
				'label' => 'First field',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f2_first_field_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'First field font',
				'style' => $font_style
			),
			'f2_first_field_value' => array(
				'type' => 'input',
				'value' => 'Enter here price',
				'label' => 'First field value',
				'style' => $style
			),
			'f2_first_field_value_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'First field value font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f2_second_field' => array(
				'type' => 'input',
				'value' => 'In Stock:',
				'label' => 'Second value',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f2_second_field_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Second field font',
				'style' => $font_style
			),
			'f2_second_field_value' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Second field value',
				'style' => $style
			),
			'f2_second_field_value_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Second field value font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f2_button_text' => array(
				'type' => 'input',
				'value' => 'More Info',
				'label' => 'Button text',
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f2_button_link' => array(
				'type' => 'input',
				'value' => 'http://www.',
				'label' => 'Button link',
				'style' => $style
			),
			'f2_button_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Button font',
				'style' => $font_style
			),
			'f2_button_color' => array(
				'type' => 'color',
				'value' => '#1ab99b',
				'label' => 'Button color',
				'style' => $style
			),
			'f2_button_hover_color' => array(
				'type' => 'color',
				'value' => '#1fdab5',
				'label' => 'Button hover color',
				'style' => $style,
				'html_after' => '</div>'
			)
		);
		$textarea_style=array(
			'width' => '300px',
			'height' => '200px'
		);
		$this->item_custom_forms_scheme[2]=array(
			'f3_first_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show first column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f3_first_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'First image',
				'style' => $style
			),
			'f3_first_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'First title',
				'style' => $style
			),
			'f3_first_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'First title font',
				'style' => $font_style
			),
			'f3_first_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f3_first_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'First about font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f3_second_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show second column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f3_second_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'Second image',
				'style' => $style
			),
			'f3_second_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Second title',
				'style' => $style
			),
			'f3_second_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Second title font',
				'style' => $font_style
			),
			'f3_second_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f3_second_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Second about font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f3_third_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show third column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f3_third_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'Third image',
				'style' => $style
			),
			'f3_third_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Third title',
				'style' => $style
			),
			'f3_third_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Third title font',
				'style' => $font_style
			),
			'f3_third_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f3_third_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Third about font',
				'style' => $font_style,
				'html_after' => '</div>'
			),
			'f3_fourth_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show fourth column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f3_fourth_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'Fourth image',
				'style' => $style
			),
			'f3_fourth_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Fourth title',
				'style' => $style
			),
			'f3_fourth_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Fourth title font',
				'style' => $font_style
			),
			'f3_fourth_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f3_fourth_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Fourth about font',
				'style' => $font_style,
				'html_after' => '</div>'
			)
		);
		$this->item_custom_forms_scheme[3]=array(
			'f4_first_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show first column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f4_first_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'First title',
				'style' => $style
			),
			'f4_first_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'First title font',
				'style' => $font_style
			),
			'f4_first_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'First image',
				'style' => $style,
			),
			'f4_first_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f4_first_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'First about font',
				'style' => $font_style
			),
			'f4_first_button_text' => array(
				'type' => 'input',
				'value' => 'More Info',
				'label' => 'Button text',
				'style' => $style
			),
			'f4_first_button_link' => array(
				'type' => 'input',
				'value' => 'http://www.',
				'label' => 'Button link',
				'style' => $style
			),
			'f4_first_button_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'First button font',
				'style' => $font_style
			),
			'f4_first_button_color' => array(
				'type' => 'color',
				'value' => '#1ab99b',
				'label' => 'First button color',
				'style' => $style
			),
			'f4_first_button_hover_color' => array(
				'type' => 'color',
				'value' => '#1fdab5',
				'label' => 'First button hover color',
				'style' => $style,
				'html_after' => '</div>'
			),
			'f4_second_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show second column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f4_second_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Second title',
				'style' => $style
			),
			'f4_second_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Second title font',
				'style' => $font_style
			),
			'f4_second_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'Second image',
				'style' => $style,
			),
			'f4_second_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f4_second_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Second about font',
				'style' => $font_style
			),
			'f4_second_button_text' => array(
				'type' => 'input',
				'value' => 'More Info',
				'label' => 'Button text',
				'style' => $style
			),
			'f4_second_button_link' => array(
				'type' => 'input',
				'value' => 'http://www.',
				'label' => 'Button link',
				'style' => $style
			),
			'f4_second_button_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Second button font',
				'style' => $font_style
			),
			'f4_second_button_color' => array(
				'type' => 'color',
				'value' => '#1ab99b',
				'label' => 'Second button color',
				'style' => $style
			),
			'f4_second_button_hover_color' => array(
				'type' => 'color',
				'value' => '#1fdab5',
				'label' => 'Second button hover color',
				'style' => $style,
				'html_after' => '</div>'
			),
			'f4_third_show' => array(
				'type' => 'checkbox',
				'value' => 1,
				'label' => 'Show third column',
				'without_wrapper_label' => 1,
				'style' => $style,
				'html_before' => '<div style="width: 300px; float: left; margin-left: 15px;">'
			),
			'f4_third_title' => array(
				'type' => 'input',
				'value' => '',
				'label' => 'Third title',
				'style' => $style
			),
			'f4_third_title_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Third title font',
				'style' => $font_style
			),
			'f4_third_image' => array(
				'type' => 'image_upload',
				'value' => '',
				'label' => 'Third image',
				'style' => $style,
			),
			'f4_third_about' => array(
				'type' => 'text',
				'value' => 'Enter here text for about section...',
				'label' => 'About section',
				'style' => $textarea_style
			),
			'f4_third_about_font' => array(
				'type' => 'font',
				'value' => '{}',
				'label' => 'Third about font',
				'style' => $font_style
			),
			'f4_third_button_text' => array(
				'type' => 'input',
				'value' => 'More Info',
				'label' => 'Button text',
				'style' => $style
			),
			'f4_third_button_link' => array(
				'type' => 'input',
				'value' => 'http://www.',
				'label' => 'Button link',
				'style' => $style
			),
			'f4_third_button_font' => array(
				'type' => 'font',
				'value' => '{"variant":600,"default_bold":600}',
				'label' => 'Third button font',
				'style' => $font_style
			),
			'f4_third_button_color' => array(
				'type' => 'color',
				'value' => '#1ab99b',
				'label' => 'Third button color',
				'style' => $style
			),
			'f4_third_button_hover_color' => array(
				'type' => 'color',
				'value' => '#1fdab5',
				'label' => 'Third button hover color',
				'style' => $style,
				'html_after' => '</div>'
			),
		);
		$this->after_load_scheme();
		return TRUE;
	}

}

?>