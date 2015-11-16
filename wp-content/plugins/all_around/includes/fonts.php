<?php

class all_around_fonts {
	public $assoc, $wrapper, $main_object;
	public $selected_type, $selected_font, $selected_variant, $selected_subset, $selected_size, $selected_color, $selected_bold, $selected_italic, $selected_underline, $selected_size_unit;
	public $available_variants, $available_subsets;

	function __construct(&$wrapper, &$main_object) {
		$this->wrapper=$wrapper;
		$this->main_object=$main_object;

		$this->reset();

		if ($this->main_object->mode=='backend') {
			$this->wrapper->add_ajax_hook('all_around_get_font_listboxes', array(&$this, 'ajax_get_font_listboxes'));
		}
	}

	function set_fonts_assoc(&$assoc) {
		$this->assoc=$assoc;
	}
	
	function reset() {
		$this->selected_type='google';
		$this->selected_font='default';
		$this->selected_variant='regular';
		$this->selected_subset='latin';
		$this->selected_size='default';
		$this->selected_color='default';
		$this->selected_bold=0;
		$this->selected_italic=0;
		$this->selected_underline=0;
		$this->selected_size_unit='px';

		$this->available_variants=array('regular'=>'regular');
		$this->available_subsets=array('latin'=>'latin');
	}

	function set_selection($arr, $reset=TRUE) {
		if ($reset) $this->reset();
		
		if (isset($arr['type'])) $this->selected_type=$arr['type'];
		if (isset($arr['font'])) $this->selected_font=$arr['font'];
		if (isset($arr['variant'])) $this->selected_variant=$arr['variant'];
		if (isset($arr['subset'])) $this->selected_subset=$arr['subset'];
		if (isset($arr['size'])) $this->selected_size=$arr['size'];
		if (isset($arr['color'])) $this->selected_color=$arr['color'];
		if (isset($arr['bold'])) $this->selected_bold=$arr['bold'];
		if (isset($arr['italic'])) $this->selected_italic=$arr['italic'];
		if (isset($arr['underline'])) $this->selected_underline=$arr['underline'];
		if (isset($arr['size_unit'])) $this->selected_size_unit=$arr['size_unit'];
		
		if (isset($arr['font'])) {
			if ($this->selected_type=='google') {
				if ($this->selected_font!='default') {
					$font=$this->selected_font;
					$this->available_variants=$this->assoc[$font]['variants'];
					$this->available_subsets=$this->assoc[$font]['subsets'];
				} else {
					$this->available_variants=array('regular'=>'regular', 'italic' => 'italic', '600' => '600', '600italic' => '600italic', );
					$this->available_subsets=array('latin'=>'latin');
				}
			} else {
				$this->available_variants=array('regular'=>'regular');
				$this->available_subsets=array('latin'=>'latin');
			}
		}
	}

	function ajax_get_font_listboxes() {
		$this->main_object->ajax_call=1;

		$with_font_list=0;
		if (isset($_POST['with_font_list'])) $with_font_list=intval($_POST['with_font_list']);

		$arr=array();
		if (isset($_POST['type'])) $arr['type']=$_POST['type'];
		if (isset($_POST['font'])) $arr['font']=$_POST['font'];
		if (isset($_POST['variant'])) $arr['variant']=$_POST['variant'];
		if (isset($_POST['subset'])) $arr['subset']=$_POST['subset'];

		$this->set_selection($arr);

		if ($this->selected_type=='google') {
			if ($_POST['with_font_list']) $rarr['font_list']=$this->generate_font_listbox('all_around_font_name', $this->selected_font);
			$rarr['variant_list']=$this->generate_listbox('all_around_font_variant', $this->available_variants, $this->selected_variant);
			$rarr['subset_list']=$this->generate_listbox('all_around_font_subset', $this->available_subsets, $this->selected_subset);
			$this->main_object->ajax_return(1, $rarr);
		}
	}

	function generate_font_listbox ($name, $value) {
		$buffer='<select id="'.$name.'" name="'.$name.'">';
		if ($value=='default') $selected='selected="selected" ';
		else $selected='';
		$buffer.='<option '.$selected.'value="default">Default</option>';
		foreach ($this->assoc as $var => $val) {
			if ($var==$value) $selected='selected="selected" ';
			else $selected='';
			$buffer.='<option '.$selected.'value="'.$var.'">'.$var.'</option>';
		}
		$buffer.='</select>';
		return $buffer;
	}

	function generate_listbox ($name, &$arr, $value) {
		$buffer='<select id="'.$name.'" name="'.$name.'">';
		foreach ($arr as $var => $val) {
			if ($val==$value) $selected='selected="selected" ';
			else $selected='';
			$val2=strtoupper(substr($val,0,1)).substr($val,1);
			$buffer.='<option '.$selected.'value="'.$val.'">'.$val2.'</option>';
		}
		$buffer.='</select>';
		return $buffer;
	}
	
	function echo_all_css($id) {
		$arr=array();
		$subset_arr=array();
		foreach ($this->main_object->mvc->model->loaded_items as $pid => $items){
			foreach ($items as $var => $row) {
				if ($row['type']=='font') {
					if ($row['value']!='' && $row['value']!='{}') {
						$font=json_decode($row['value'], true);
						if (isset($font['type'])==TRUE && $font['type']=='google' && isset($font['font'])==TRUE && $font['font']!='Default' && $font['font']!='default' && $font['font']!='' && isset($this->main_object->skip_fonts[$font['font']])==FALSE) {
							$variant='400';
							$name=$font['font'];
							if (isset($font['variant'])==TRUE && $font['variant']!='regular') $variant=$font['variant'];
							if (isset($font['subset'])==TRUE) $subset_arr[$font['subset']]=$font['subset'];
							$arr[$name][$variant]=1;
						}
					}
				}
			}
			foreach ($this->main_object->mvc->model->item_loaded_custom_forms[$pid] as $custom_item_form=>$custom_item_forms) {
				foreach ($custom_item_forms as $var => $row) {
					if ($row['type']=='font') {
					if ($row['value']!='' && $row['value']!='{}') {
						$font=json_decode($row['value'], true);
						if (isset($font['type'])==TRUE && $font['type']=='google' && isset($font['font'])==TRUE && $font['font']!='Default' && $font['font']!='default' && $font['font']!='' && isset($this->main_object->skip_fonts[$font['font']])==FALSE) {
							$variant='400';
							$name=$font['font'];
							if (isset($font['variant'])==TRUE && $font['variant']!='regular') $variant=$font['variant'];
							if (isset($font['subset'])==TRUE) $subset_arr[$font['subset']]=$font['subset'];
							$arr[$name][$variant]=1;
						}
					}
					}
				}
			}
		}
		//print_r($arr); 
		$count_subset_arr=count($subset_arr);
		$subset='';
		foreach ($subset_arr as $var => $val) {
			if ($val=='latin' && $count_subset_arr==1) continue;
			if ($subset!='') $subset.=',';
			$subset.=$val;
		}
		if ($subset!='') $subset='&amp;subset='.$subset;

		if (count($arr)) {
			$fonts='';
			foreach ($arr as $font=>$sub_arr) {
				if ($fonts!='') $fonts.='|';
				$fonts.=str_replace(' ', '+', $font);
				$variants='';
				$sub_arr_count=count($sub_arr);
				foreach ($sub_arr as $var => $temp) {
					if ($var=='400' && $sub_arr_count==1) continue;
					if ($variants!='') $variants.=',';
					$variants.=$var;
				}
				if ($variants!='') $fonts.=':'.$variants;
			}
			if ($fonts!='' && $subset!='') $fonts.=$subset;
			if ($fonts!='') return "<link rel='stylesheet' id='all_around-fonts-css'  href='http://fonts.googleapis.com/css?family=".$fonts."' type='text/css' media='all' />";
		}
		return '';
	}

}
?>