<?php

class all_around_visual_elements {

	static public $last_width=0;
	static public $style_group_collapsible_string="padding: 3px 3px; background-color: black; border-radius: 8px; margin-bottom: 8px;";
	static public $style_group_collapsible_array=array('padding' => '3px 3px', 'background-color' => 'black', 'margin-bottom' => '8px', 'border-radius' => '8px');
	static public $style_collapsible_content_style='padding-left: 0px; padding-right: 15px;';
	static public $style_settings_collapsible_content_style=array();
	static public $main_object;
	static public $wrapper;
	static public $img_max_height=153;
	
	static public function init(&$main_object, &$wrapper, $style) {
		self::$main_object=$main_object;
		self::$wrapper=$wrapper;
		if ($style==2) {
			self::$style_settings_collapsible_content_style='padding-left: 15px';
			self::$img_max_height=136;
			self::$style_group_collapsible_string="padding: 3px 3px; background-color: #2b2a2b; border-radius: 8px; margin-bottom: 8px;";
			self::$style_group_collapsible_array=array('padding' => '3px 3px', 'background-color' => '#2b2a2b', 'margin-bottom' => '8px', 'border-radius' => '8px');
		}
	}

	static public function wrap_it ($buffer, &$wrapper, $class='', $id='') {
		if (!$wrapper) return $buffer;
		if (is_array($wrapper) && count($wrapper)==0) return;
		if ($class!='') $class=' '.$class;
		$style='';
		foreach ($wrapper as $var => $val) {
				if ($var=='span' || $var=='span-inline' || $var=='group') continue;
				if ($style!="") $style.=" ";
				if ($var=='empty_wrapper' && !isset($wrapper['padding']) && !isset($wrapper['padding-top'])) {
					$var='padding-top';
					$val='11px';
					$style.=$var.': '.$val.'; ';
					$var='margin-bottom';
					$val='20px';
					$style.=$var.': '.$val.';';
					continue;
				}
				$style.=$var.': '.$val.';';
		}
		//echo '<pre>'; print_r($wrapper); echo '</pre>';
		if (isset($wrapper['group'])) $class.=' '.$wrapper['group'];
		if ($style!='') $style=' style="'.$style.'"';
		$pbuffer='<div class="all_around_css_control'.$class.'"'.$style.'>';
		$span_id='';
		if ($id!='') $span_id=' id="'.$id.'_span"';
		if (isset($wrapper['span'])) $pbuffer.='<span'.$span_id.'>'.$wrapper['span'].':</span>';
		if (isset($wrapper['span-inline'])) $pbuffer.='<span class="inline">'.$wrapper['span-inline'].':</span>';
		$pbuffer.=$buffer.'</div>';
		return $pbuffer;
	}
	
	static public function generate_style ($style, $auto_width=TRUE) {
		$buffer='';
		if ($style===NULL) $style=array();
		if (isset($style['auto_width'])) $auto_width=$style['auto_width'];
		if ($auto_width && !isset($style['width'])) $style['width']='200px';
		if (isset($style['width'])) self::$last_width=intval($style['width']);
		else self::$last_width=0;
		foreach ($style as $var => $val) {
		//echo $var.'=>'.$val.'<br>';
			if ($buffer!='') $buffer.=' ';
			$buffer.=$var.': '.$val.';';
		}
		if ($buffer!='') return ' style="'.$buffer.'"';
		return '';
	}

	static public function generate_input ($name, $value, $wrapper=NULL, $style=NULL) {
		$style_string=self::generate_style($style);
		$value=htmlspecialchars($value);
		$buffer='<input class="all_around_css_input" name="'.$name.'" id="'.$name.'" value="'.$value.'"'.$style_string.' />';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_hidden ($name, $value, $class='') {
		$value=htmlspecialchars($value);
		if ($class!='') $class=' class="'.$class.'"';
		return '<input type="hidden" name="'.$name.'" id="'.$name.'" value="'.$value.'"'.$class.' />';
	}
	static public function generate_textarea ($name, $value, $wrapper=NULL, $style=NULL) {
		$style_string=self::generate_style($style);
		$value=htmlspecialchars($value);
		$buffer='<textarea class="all_around_css_textarea" name="'.$name.'" id="'.$name.'"'.$style_string.'>'.$value.'</textarea>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_checkbox ($label, $name, $value, $wrapper=NULL, $style=NULL) {
		$style_string=self::generate_style($style);
		$active=''; $fvalue=0;
		if ($value) $active=' active'; $fvalue=1;
		$buffer='<div class="all_around_css_checkbox'.$active.'"></div><input class="all_around_css_checkbox_input" name="'.$name.'" id="'.$name.'" style="display:none;" value="'.$value.'" /><div class="all_around_css_checkbox_label"><label for="checkbox_'.$name.'">'.$label.'</label></div><div style="clear:both;"></div>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_image($name, $value, $wrapper=NULL, $style=NULL, $default='') {
		$style_string=self::generate_style($style);
		$input_width=self::$last_width-80;
		$max_width_image=self::$last_width-11;
		$img_src=$value;
		$input_value=$value;
		if ($img_src=='') $img_src=$default;
		$buffer='<div id="'.$name.'_holder" class="all_around_css_image_holder"'.$style_string.'><img alt="" src="'.$img_src.'" style="max-width:'.$max_width_image.'px; max-height:'.self::$img_max_height.'px;" id="'.$name.'_img"></div><div class="all_around_css_image_input" style="width: '.$input_width.'px;"><input id="'.$name.'" class="all_around_css_input" value="'.$input_value.'" name="'.$name.'"></div><a class="all_around_css_image_button all_around_css_gradient_primary" style="width: 40px;" data-input="'.$name.'" id="'.$name.'_button" html="content">Upload</a><div style="clear:both;"></div>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_number($name, $value, $min, $max, $unit, $wrapper=NULL, $style=NULL, $step=1) {
		if ($style!=NULL) if (isset($style['width'])) {
			$width=intval($style['width']);
			$style['width']=$width-60;
			$style['width']=$style['width'].'px';
		}
		$style_string=self::generate_style($style);
		$buffer='<div class="all_around_css_number_bar" data-min="'.$min.'" data-max="'.$max.'" data-std="'.$value.'" data-step="'.$step.'" data-unit="'.$unit.'"'.$style_string.'></div><input class="all_around_css_number_amount" name="'.$name.'" id="all_around_css_number_bar_'.$name.'" value="'.$value.'" /><span class="all_around_css_number_span">&nbsp;'.$unit.'</span><div style="clear:both;"></div>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, 'all_around_css_numberbar', $name);
		return $buffer;
	}
	static public function generate_color($name, $value, $wrapper=NULL, $style=NULL) {
		$style_string=self::generate_style($style);
		$buffer='<div class="all_around_css_color_wrapper"'.$style_string.'><input class="all_around_css_color all_around_css_input" name="'.$name.'" id="'.$name.'" value="'.$value.'" /><div class="all_around_css_color_display"></div><div class="all_around_css_colorpicker"></div></div>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_listbox($name, $value, $list, $wrapper=NULL, $style=NULL) {
		if (self::$main_object->backend_style==1) $minus=56;
		if (self::$main_object->backend_style==2) $minus=76;
		$style_string=self::generate_style($style);
		$ul_width=self::$last_width;
		$span_width=self::$last_width-$minus;
		$li_width=self::$last_width-20;
		if (isset($list[$value])) $list_value=$list[$value];
		else $list_value='';
		$buffer='<div class="all_around_css_select all_around_css_gradient" data-name="'.$name.'"'.$style_string.'><input type="hidden" style="display:none;" name="'.$name.'" id="'.$name.'" value="'.$value.'"><span style="width: '.$span_width.'px; height: 14px;">'.$list_value.'</span><div class="drop_button"></div><ul style="display: none; width: '.$ul_width.'px;">';
		foreach ($list as $var => $val) $buffer.='<li><a'.($var==$value ? ' class="selected"' : '').' data-value="'.$var.'" style="width: '.$li_width.'px;">'.$val.'</a></li>';
		$buffer.='</ul></div><div class="clear"></div>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_button($name, $value, $type, $wrapper=NULL, $style=NULL, $clear=FALSE, $href='', $additional_classes='', $data_value='', $div=0, $auto_width=TRUE) {
		$style_string=self::generate_style($style, $auto_width);
		$classes='all_around_css_gradient all_around_css_button all_around_css_toggle left';
		if ($type=='black_clear') $classes='all_around_css_gradient all_around_css_button all_around_css_toggle_clear left';
		if ($type=='blue') $classes='all_around_css_gradient_primary all_around_css_button all_around_css_save left';
		if ($type=='center_label') $classes.=' center_label';
		if ($type=='blue_clear') $classes='all_around_css_gradient_primary all_around_css_button all_around_css_save left';
		if ($additional_classes!='') $classes.=' '.$additional_classes;
		if ($data_value!='') $data_value=' data-value="'.$data_value.'"';
		if ($href!='') $href=' href="'.$href.'"';
		$tag='a';
		if ($div) $tag='div';
		$buffer='<'.$tag.$href.' id="'.$name.'" class="'.$classes.'"'.$style_string.$data_value.'>'.$value.'</'.$tag.'>';
		if ($clear) $buffer.='<div class="clear"></div>';
		if (is_array($wrapper)) $buffer=self::wrap_it($buffer, $wrapper, '', $name);
		return $buffer;
	}
	static public function generate_collapsible ($title, $content, $style=NULL, $state=FALSE, $content_style='', $additional_classes='') {
		$style_string=self::generate_style($style, FALSE);
		if ($additional_classes!='') $additional_classes=' '.$additional_classes;
		if ($state) {
			if ($content_style!='') $content_style=' '.$content_style;
			$display='';
			if (strpos($content_style, 'display:')===FALSE) $display='display: block;';
			$divstyle=' style="'.$display.$content_style.'" ';
			$active=' active';
			$plus='-';
		} else {
			$divstyle='';
			if ($content_style!='') $divstyle=' style="'.$content_style.'"';
			$active='';
			$plus='+';
		}
		return '<div class="all_around_css_collapsible"'.$style_string.'><div class="all_around_css_gradient all_around_css_collapsible_header">'.$title.'<span class="all_around_css_collapse_trigger'.$active.'">'.$plus.'</span></div><div class="all_around_css_collapsible_content'.$additional_classes.'"'.$divstyle.'>'.$content.'</div></div>';
	}
	static public function generate_sortable ($name, $list, $style=NULL, $li_class='', $li_style=NULL) {
		$style_string=self::generate_style($style, FALSE);
		$buffer='<ul id="'.$name.'" class="sortable"'.$style_string.'>';
		if ($li_class!='') $li_class=' '.$li_class;
		foreach ($list as $i => $line) {
			$li_style_string='';
			if (isset($li_style[$i])) $li_style_string=self::generate_style($li_style[$i], FALSE);
			$buffer.='<li class="ui-state-default'.$li_class.'"'.$li_style_string.'>'.$line.'</li>';
		}
		$buffer.='</ul>';
		return $buffer;
	}
	static public function generate_table ($rows, $header=NULL, $style=NULL, $td_style=NULL) {
		$style_string=self::generate_style($style);
		$buffer='<table class="all_around_css_table"'.$style_string.'>';
		if ($header) {
			$buffer.='<thead><tr class="all_around_css_gradient">';
			foreach ($header as $item) $buffer.='<th>'.$item.'</th>';
			$buffer.='</tr></thead>';
		}
		$buffer.='<tbody>';
		$i=0;
		foreach ($rows as $row) {
			$buffer.='<tr>';
			$j=0;
			foreach ($row as $item) {
				$istyle='';
				if ($td_style!=NULL) if (isset($td_style[$i][$j])) $istyle=' '.$td_style[$i][$j];
				$buffer.='<td'.$istyle.'>'.$item.'</td>';
				$j++;
			}
			$buffer.='</tr>';
			$i++;
		}
		$buffer.='</tbody>';
		if ($header) {
			$buffer.='<tfoot><tr class="all_around_css_gradient">';
			foreach ($header as $item) $buffer.='<th>'.$item.'</th>';
			$buffer.='</tr></tfoot>';
		}
		$buffer.='</table>';
		return $buffer;
	}
	static public function generate_form_layout($left, $right) {
		$buffer='<div style="margin-right: 300px;"><div style="float: left; width: 100%; padding:0; ">'.$left.'</div>';
		$buffer.='<div style="float: right; margin-right: -300px; width: 280px; padding:0;">'.$right.'</div></div>';
		return $buffer;
	}
	static public function generate_form ($content, $name, $script="", $method="", $file_upload=FALSE) {
		if ($script!="") $script=' action="'.$script.'"';
		if ($method!="") $method=' method="'.$method.'"';
		$enctype='';
		if ($file_upload) $enctype=' enctype="multipart/form-data"';
		return '<form name="'.$name.'" id="'.$name.'"'.$script.$method.$file_upload.'>'.$content.'</form>';
	}
	static public function generate_div($id, $content, $style) {
		$style_string=self::generate_style($style, FALSE);
		return '<div id="'.$id.'"'.$style_string.'>'.$content.'</div>';
	}
}


?>