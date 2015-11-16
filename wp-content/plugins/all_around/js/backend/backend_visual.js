var all_around_events=new Array();
var all_around_control_changed_callback_for_all=null;
function all_around_control_changed(name, value) {
	if (all_around_control_changed_callback_for_all!=null) all_around_control_changed_callback_for_all(name, value);
	var i;
	var count=all_around_events.length;	
	for (i=0; i<count; i++) {
		if (all_around_events[i].name==name && all_around_events[i].active==1) all_around_events[i].func(name, value);
	}
}

function all_around_add_event(name, func) {
	var i=all_around_events.length;
	all_around_events[i]={
		'name': name,
		'func': func,
		'active': 1
	};
}

function all_around_remove_item_events (i) {
	//console.log('remove_item_events '+i);
	var i, name;
	var is=i.toString();
	var len=is.length;
	var count=all_around_events.length;	
	for (i=0; i<count; i++) {
		name=all_around_events[i].name;
		if (name.substring(0,6+len)=='item_'+is+'_') all_around_events[i].active=0;
	}
}

var all_around_create_popup;
var all_around_remove_popup;
var all_around_set_popup_content;
var all_around_init_color_picker;


(function($){

		all_around_create_popup = function(title, content, width, width_unit, height, scroll, center, loader_margin_top, loader_margin_left) {
			if (typeof title=='undefined') title='Popup';
			if (typeof content=='undefined') content='';
			if (typeof width=='undefined') width='100';
			if (typeof width_unit=='undefined') width_unit='%';
			if (typeof height=='undefined') height='500';
			if (typeof scroll=='undefined') scroll=1;
			if (typeof center=='undefined') center=1;
			var margin_left=width/2;
			var margin_top=height/2;
			var holder_height=height-30;
			var html='';
			html+='<div id="all_around_overlay"></div>';
			html+='<div id="all_around_popup" style="display: none; width: '+width+width_unit+'; margin-left: -'+margin_left+width_unit+'; height: '+height+'px; margin-top: -'+margin_top+'px; visibility: visible;">';
			html+='<div id="all_around_title">';
			html+='<div id="all_around_ajaxWindowTitle">'+title+'</div>';
			html+='<div id="all_around_closeAjaxWindow"><a id="all_around_closeWindowButton" href="#" title="Close"><img alt="Close" src="'+all_around_plugin_url+'images/tb-close.png"></a></div>';
			html+='</div>';
			var scroll_style='';
			if (scroll) scroll_style='overflow-y: scroll; ';
			var center_style='';
			if (center) center_style='text-align: center; ';
			html+='<div id="all_around_popup_holder" style="margin: 0px auto; '+scroll_style+'position: relative; width: 100%; height: '+holder_height+'px; '+center_style+'padding-top: 1px;">';
			if (content=='') {
				if (typeof loader_margin_top=='undefined') loader_margin_top=margin_top;
				var loader_margin_left_string='';
				if (typeof loader_margin_left!='undefined') loader_margin_left_string=' margin-left: '+loader_margin_left+'px';
				html += '<img style="width: 208px; margin-top:'+loader_margin_top+'px;'+loader_margin_left_string+'" id="all_around_loader" src="'+all_around_plugin_url+'images/loadingAnimation.gif" />';
			} else {
				html+=content;
			}
			html+='</div>';
			html+='</div>';
			$('body').append(html);
			$('#all_around_popup').fadeIn();
			$('#all_around_closeWindowButton').click(function(e){
				e.preventDefault();
				all_around_remove_popup();
			});
		}

		all_around_remove_popup=function() {
			$('#all_around_overlay').remove();
			$('#all_around_popup').fadeOut(400, function(){
				$(this).remove();
			});
		}
		
		all_around_set_popup_content=function(buffer) {
			$('#all_around_popup_holder').html(buffer);
		}

	$(document).ready(function(){

		$('body').prepend('<div id="all_around_css_background"></div>');
		function all_around_handle_upload(data_input, url) {
			//console.log(url);
			var img_pos=url.indexOf('<img');
			if (img_pos>-1) {
				url=url.substring(img_pos);
				img_pos2=url.indexOf('>');
				if (img_pos2>0) {
					url=url.substring(0, img_pos2+1);
					while (url.indexOf('\\"')>-1) url=url.replace('\\"','"');
					var $jurl=$(url);
					url = $jurl.attr('src');
				}
			}

			$('#'+data_input).val(url);
			$('#'+data_input+'_img').attr('src', url);
			all_around_control_changed(data_input, url);

			if (all_around_uploader_type==1) tb_remove();
		}
		
		var all_around_upload_data_input;
		window.send_to_editor = function(html) {
			if (all_around_uploader_type==1) all_around_handle_upload(all_around_upload_data_input, html);
		}

		$('.all_around_css_image_button').live('click', function(e) {
			//console.log('uploading...');
			e.preventDefault();
			var data_input=$(this).attr('data-input');
			all_around_upload_data_input=data_input;
			//console.log('all_around_uploader_type='+all_around_uploader_type);
			if (all_around_uploader_type==2) {
				wp.media.editor.send.attachment = function(props, attachment) {
					all_around_handle_upload(data_input, attachment.url);
				}
				wp.media.editor.open(this);
				if (all_around_demo) {
					$('div.media-router').find('a:last').click();
				}
			}
			if (all_around_uploader_type==1) {
				tb_show('', 'media-upload.php?type=image&amp;TB_iframe=true');

			}
			return false;
		});
		$('.all_around_css_image_holder').live('click', function(e) {
			var name=$(this).attr('id');
			name=name.replace('_holder', '_button');
			$('#'+name).click();
		});

		$( ".sortable" ).sortable();
		//$( ".sortable" ).disableSelection();

		$('.all_around_css_select')
			.live('mouseenter', function(){
				$(this).data('hover',true);
			}).live('mouseleave',function(){
				$(this).data('hover', false);
			});
			
		$('.all_around_css_select span, .all_around_css_select .drop_button').live('click', function(e){
			e.preventDefault();
			$parent = $(this).parent();
			if(!$parent.hasClass('active')) {
				$parent.addClass('active').find('ul').show();
			}
			else {
				$parent.removeClass('active').find('ul').hide();
			}
		});
		$('.all_around_css_select ul a').live('click', function(e){
			e.preventDefault();
			var $parent = $(this).parent().parent().parent();
			var name=$parent.attr('data-name');
			var $select = $('input[name='+name+']');
			var value=$(this).attr('data-value');
			$select.val(value);
			all_around_control_changed(name, value);
			//$select.val($(this).attr('data-value'));
			$parent.find('span').html($(this).html());
			$parent.removeClass('active').find('ul').hide();
			$parent.find('ul a.selected').removeClass('selected');
			$(this).addClass('selected');
			
			//all_around_cssContolChange($select);
			
		});
		$('body').click(function(){
			$('.all_around_css_select.active').each(function(){
				if(!$(this).data('hover')) {
					$(this).removeClass('active').find('ul').hide();
				}
			});
		});
		

		$( ".all_around_css_number_bar" ).each(function(){
			if(!$(this).hasClass('ui-slider')) {
				var min = parseInt($(this).attr('data-min'));
				var max = parseInt($(this).attr('data-max'));
				var std = parseInt($(this).attr('data-std'));
				var step = parseFloat($(this).attr('data-step'));
				var unit = $(this).attr('data-unit');
				$(this).slider({
					min: min,
					max: max,
					step: step,
					value: std,
					range: "min",
					slide: function( event, ui ) {
						$(this).parent().find( ".all_around_css_number_amount" ).val( ui.value );
					},
					change : function( event, ui) {
						var $input = $(this).parent().find( ".all_around_css_number_amount" );
						//all_around_cssContolChange($input);
						
					}
				});
			}
		});
		
		$('.all_around_css_checkbox').live('click', function(){
			var $input = $(this).parent().find('.all_around_css_checkbox_input');
			if($(this).hasClass('active')) {
				$input.val('0');
				var name=$input.attr('name');
				all_around_control_changed(name, 0);
				$(this).removeClass('active');
			}
			else {
				$input.val('1');
				var name=$input.attr('name');
				all_around_control_changed(name, 1);
				$(this).addClass('active');
			}
			//all_around_cssContolChange($input);			
		});
		$('.all_around_css_checkbox_label').live('click', function(){
			$(this).prevAll('.all_around_css_checkbox:first').click();
		});

		all_around_init_color_picker=function() {
			$( '.all_around_css_color' ).each(function(){
				var val=$(this).val();
				if (val=='default') val='#000000';
				$(this).parent().find('.all_around_css_color_display').css('background', val);
				$(this).iris({
					width:228,
					target:$(this).parent().find('.all_around_css_colorpicker'),
					change: function(event, ui) {
						var new_value=ui.color.toString();
						$(this).val(new_value);
						$(this).parent().find('.all_around_css_color_display').css( 'background-color', new_value);
						var name=$(this).attr('name');
						all_around_handle_upload(name, new_value);
						//all_around_cssContolChange($(this), true);
					}
				});
			});
		}
		all_around_init_color_picker();


		$( '.all_around_css_color' ).live('focus', function(){
			$(this).parent().find('.all_around_css_colorpicker').addClass('active').show();
			//$(this).parent().find('.iris-picker').show();
			$(this).iris('show');
			//all_around_cssRefreshControls();
		}).live('mouseenter', function(){
			$(this).parent().find('.all_around_css_colorpicker').data('hover', true);
		}).live('mouseleave', function(){
			$(this).parent().find('.all_around_css_colorpicker').data('hover', false);
		});
		
		$( '.all_around_css_colorpicker' ).live('mouseenter', function(){
			$(this).data('hover', true);
		}).live('mouseleave', function(){
			$(this).data('hover', false);
		});
		
		$('body').click(function(){
			$('.all_around_css_colorpicker.active').each(function(){
				if(!$(this).data('hover')) {
					$(this).removeClass('active').hide();
					//all_around_cssRefreshControls();
				}
			});
		});
		
		$('.all_around_css_collapsible_header').live('click', function() {
			//alert($(this).next().html());
			//.click();
			var bthis=$('.all_around_css_collapse_trigger', $(this));
			collapse_trigger_click(bthis);
		});
		
		function collapse_trigger_click(bthis) {
			//console.log('2 point');
			var $content = $(bthis).parent().parent().children('.all_around_css_collapsible_content');
			if(!$(bthis).hasClass('active')) {
				$(bthis).html('-').addClass('active');
				$content.show();
			}
			else {
				$(bthis).html('+').removeClass('active');
				$content.hide();
			}
			//all_around_cssRefreshControls();
		}

		//$('.all_around_css_collapse_trigger').live('click', function(){
			//console.log('1 point');
			//collapse_trigger_click(this);
		//});
		
		$('.all_around_css_textarea').live('input propertychange', function(){
			var name=$(this).attr('name');
			var value=$(this).val();
			all_around_control_changed(name, value);
		});
		$('.all_around_css_input').live('input propertychange', function(){
			var name=$(this).attr('name');
			var value=$(this).val();
			all_around_control_changed(name, value);
		});
		
	});


})(jQuery);