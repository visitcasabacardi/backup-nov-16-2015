
var sliderIndex = 0;
var itemIndex = [0];
var currSlider_nr=-1;
var currSlider;
var targetInput;

function sliders_ready(){
    dzsts_settings.currSlider = parseInt(dzsts_settings.currSlider, 10);


    jQuery('.saveconfirmer').fadeOut('slow');
	jQuery('.add-slider').bind('click', sliders_click_addslider);

	//currSlider = jQuery('.slider-con').eq(currSlider_nr);
    jQuery('.master-save').bind('click', sliders_saveall);
    jQuery('.slider-save').bind('click', sliders_saveslider);


    jQuery(document).delegate('.item-preview', 'click', item_open);

	jQuery(document).delegate('.main-id', 'change', sliders_change_mainid);
	jQuery(document).delegate('.slider-edit','click', sliders_click_slideredit)
	jQuery(document).delegate('.slider-duplicate','click', sliders_click_sliderduplicate)
	jQuery(document).delegate('.slider-delete', 'click', sliders_click_sliderdelete)
	jQuery(document).delegate('.item-delete','click', sliders_click_itemdelete)
    jQuery(document).delegate(".slider-sliderexport", "click", sliders_click_sliderexport);
	jQuery(document).delegate('.item-duplicate','click', sliders_click_itemduplicate)
	jQuery(document).delegate('.upload_file', 'click', sliders_wpupload);
	jQuery(document).delegate('.item-type','change', sliders_itemchangetype);

    jQuery(document).delegate(".slider-embed", "click", sliders_click_sliderembed);

	jQuery('.item-type').trigger('change');
    jQuery(document).delegate('.main-thumb', 'change', sliders_change_mainthumb);
	
	
	jQuery(document).delegate('.picker-con .the-icon', 'click', function(){
		var _t = jQuery(this);
		var _c = _t.parent().children('.picker');
		if(_c.css('display')=='none'){
			_c.fadeIn('fast');
		}else{
			_c.fadeOut('fast');
		}
	})
	
	jQuery('.import-export-db-con .the-toggle').click(function(){
		var _t = jQuery(this);
		var $cont = _t.parent().children('.the-content-mask');
		/*
		if($cont.css('display')=='none')
		$cont.slideDown('slow');
		else
		$cont.slideUp('slow');
		*/
		var cont_h = $cont.children('.the-content').height() + 50;
		if($cont.css('height')=='0px')
		$cont.stop().animate({
			'height' : cont_h
		}, 200);
		else
		$cont.stop().animate({
			'height' : 0
		}, 200);
		
	});


    jQuery('.dzs-multi-upload').multiUploader();

    setTimeout(function(){
        jQuery('.main-thumb').trigger('change');
    })

	

	
}


function sliders_click_sliderexport(){
    var _t = jQuery(this);
    var par = _t.parent().parent().parent();
    var ind = par.parent().children().index(par);
    var sname = par.children('td').eq(0).html()
    //console.log(_t, ind);
    tb_show('Slide Editor', dzsts_settings.wpurl + '?dzsts_show_generator_export_slider=on&KeepThis=true&width=400&height=200&slidernr=' + ind + '&slidername=' + sname + '&currdb=' + window.dzsts_settings.currdb + '&TB_iframe=true');
    return false;
}


function sliders_allready(){


    jQuery('table.main_sliders').find('.slider-in-table').eq(dzsts_settings.currSlider).addClass('active');

    setTimeout(function(){
        return;
        jQuery.get( "http://thezoomer.net/cronjobs/cache/dzsts_get_version.static.html", function( data ) {

//            console.info(data);
            var newvrs = Number(data);
            if(newvrs > Number(jQuery('.version-number .now-version').html())){
                jQuery('.version-number').append('<span class="new-version info-con" style="width: auto;"> <span class="new-version-text">/ new version '+data+'</span><div class="sidenote">Download the new version by going to your CodeCanyon accound and accessing the Downloads tab.</div></div> </span>')
            }
        });
    }, 2000);

}


function sliders_click_sliderembed(){
    var _t = jQuery(this);
    var par = _t.parent().parent().parent();
    var ind = par.parent().children().index(par);
    var sname = par.children('td').eq(0).html()
    //console.log(_t, ind);
    //jQuery('#preparedforsliderembed').html('use this shortcode for embedding: [slider id="' + sname + '"]');
    //jQuery('#preparedforsliderembed').delay(4000).fadeOut('slow');




    var aux = 'use this shortcode for embedding: [dzs_timelineslider id="' + sname + '"';

    if(window.dzsts_settings.currdb!=''){
        aux+=' db="'+window.dzsts_settings.currdb+'"';
    }

    aux+=']';

    jQuery('.saveconfirmer').html(aux);
    jQuery('.saveconfirmer').stop().fadeIn('fast').delay(4000).fadeOut('fast');
    //tb_show('Slide Editor', themesettings.thepath + 'admin/slidersadmin/sliderembed.php?KeepThis=true&width=400&height=200&slidernr=' + ind + '&slidername=' + sname + '&TB_iframe=true');
    return false;
}

function extra_handleChangeType(_t){

    if(_t.hasClass('item-con')){
        _t = _t.find('.item-type').eq(0);
    }

//    console.info(_t.attr('class'));
    if(_t.hasClass('item-type')==false){
        return;
    }
    var _icon = _t.parent().parent().parent();
    if(!_icon.hasClass("item-con")){
        _icon = _t.parent().parent().parent().parent();
    }
//    console.info('t is ',_t , _t.val())
    var val = _t.val();
    
    //if the slider we are on is not selected then we have no business here
    //console.log(_icon.parent().attr('class'));


    if(val=='image'){
        if(!_icon.parent().hasClass('comp-images')){
            currSlider.find('.comp-images').append(_icon);
        }
    }
    if(val=='mark'){
        if(!_icon.parent().hasClass('comp-marks')){
            currSlider.find('.comp-marks').append(_icon);
        }
    }
    if(val=='milestone'){
        if(!_icon.parent().hasClass('comp-milestones')){
            currSlider.find('.comp-milestones').append(_icon);
        }
    }
    //console.log(_icon);
    _icon.removeClass('type_image').removeClass('type_mark').removeClass('type_milestone');
    _icon.addClass("type_"  + val);
}
function sliders_reinit(){
var $ = jQuery.noConflict();
	
    //$('#picker1').farbtastic('#color1');
    $('.with_colorpicker').each(function(){
    	var _t = $(this);
    	if(_t.hasClass('treated')){
    		return;
    	}
        if(jQuery.farbtastic){
    	_t.next().find('.picker').farbtastic(_t);
        }
    	_t.addClass('treated');
    })
}
function sliders_itemchangetype(){

    var _t = jQuery(this);
    extra_handleChangeType(_t);
	var selval = _t.find(':selected').val();
	//var 
	var target = _t.parent().parent().parent().find('.main-source');
	//console.log(target);
	if(selval!='inline'){
		target.css({
			'height' : 80
			,'resize' : 'both'
		});
	}else{
		target.css({
			'height' : 80
			,'resize' : 'both'
		});
	}
	
}
function sliders_wpupload(){


    //console.log(jQuery(this));
    targetInput = jQuery(this).prev();

    dzsts_frame = wp.media.frames.downloadable_file = wp.media({
        title: 'Add Items to Timeline Slider',
        button: {
            text: 'Add to timeline'
        },
        multiple: false
    });

    dzsts_frame.on( 'select', function() {

        var selection = dzsts_frame.state().get('selection');
        selection = selection.toJSON();

        var ik=0;
        for(ik=0;ik<selection.length;ik++){

            var _c = selection[ik];
            //console.info(_c);
            if(_c.id==undefined){
                continue;
            }
            targetInput.val(_c.url);


            targetInput.trigger('change');



        }
    });
    dzsts_frame.open();

return false;
}
function sliders_click_slideredit(){

    if(dzsts_settings.is_safebinding == 'on' ){

    }else{
        var index = jQuery('.slider-edit').index(jQuery(this));
        sliders_showslider(index);
        return false;
    }
}
function sliders_click_sliderduplicate(){
var $ = jQuery.noConflict();
	var index = $('.slider-duplicate').index(jQuery(this));
	//sliders_showslider(index);
	
	$('.main_sliders').children('tbody').append('<tr class="slider-in-table"><td class="the-id">'+jQuery('.slider-con').eq(index).find('.main-id').eq(0).val()+'</td><td class="button_view"><strong><a href="#" class="slider-action slider-edit">Edit</a></strong></td><td class="button_view"><strong><a href="#" class="slider-action slider-duplicate">Duplicate</a></strong></td><td class="button_view"><strong><a href="#" class="slider-action slider-delete">Delete</a></strong></td></tr>')
	$('.master-settings').append(jQuery('.slider-con').eq(index).clone());
	for(i=0; i<$('.slider-con').eq(sliderIndex).find('.textinput').length;i++){
		var $cache = $('.slider-con').eq(sliderIndex).find('.textinput').eq(i);
		sliders_rename($cache, sliderIndex, 'same')
	}
	
	
	for(i=0;i<$('.slider-con').eq(index).find('textarea').length;i++){
		var $c = $('.slider-con').last().find('textarea').eq(i);
		//console.log($c);
		$c.val($('.slider-con').eq(index).find('textarea').eq(i).val());
	}
	
	sliders_addlisteners();
	itemIndex[sliderIndex] = 0;
	++sliderIndex;
	
	
	
	return false;
}
function sliders_click_itemdelete(){
    var index = currSlider.find('.item-delete').index(jQuery(this));
    //console.log(index, itemIndex[currSlider_nr])

    var arg=index;
    sliders_delete_item(arg);
    return false;
}
function sliders_delete_item(arg){
    currSlider.find('.item-con').eq(arg).remove();
    if(arg<itemIndex[currSlider_nr]-1){
        for(i=arg;i<itemIndex[currSlider_nr]-1;i++){
            var _c = currSlider.find('.item-con').eq(i);
            for(j=0; j<_c.find('.textinput').length;j++){
                sliders_rename(_c.find('.textinput').eq(j), currSlider_nr, i);
            }
        }
    }
    itemIndex[currSlider_nr]--;
    return false;
}
function sliders_click_itemduplicate(){
var $ = jQuery.noConflict();
	var index = currSlider.find('.item-duplicate').index(jQuery(this));
	var $cache = currSlider.find('.items-con').eq(0);
	$cache.append(jQuery(this).parent().clone());
	//console.log($cache.children().last());
	for(i=0;i<$cache.children().last().find('.textinput').length;i++){
		sliders_rename($cache.children().last().find('.textinput').eq(i), currSlider_nr, itemIndex[currSlider_nr]);
	}
	for(i=0;i<$cache.children().last().find('textarea').length;i++){
		var $c = $cache.children().last().find('textarea').eq(i);
		$c.val($cache.children().eq(index).find('textarea').eq(i).val());
	}
        $cache.children().last().find('.item-type').trigger('change');
        
	setTimeout(reskin_select, 10)
		itemIndex[currSlider_nr]++;
		
	return false;
	//sliders_showslider(index);
	
}
function sliders_click_sliderdelete(){

    var r=confirm("are you sure you want to delete ?");
    if (r==true){
    }
    else{
        return false;
    }

    if(dzsts_settings.is_safebinding == 'on' ){

    }else{
        var index = jQuery('.slider-delete').index(jQuery(this));
        sliders_deleteslider(index);
        return false;
    }
}
function sliders_deleteslider(arg){
    //console.log(arg, sliderIndex);
    jQuery('.main_sliders').children('tbody').children().eq(arg).remove();
    jQuery('.slider-con').eq(arg).remove();
    if(arg<sliderIndex-1){
        for(i=arg;i<sliderIndex-1;i++){
            _cache = jQuery('.slider-con').eq(i);
            for(j=0; j<_cache.find('.textinput').length;j++){
                var _c2 = _cache.find('.textinput').eq(j);
                sliders_rename(_c2, i, 'same')
            }
        }
    }

    sliderIndex--;
    if(arg==currSlider_nr){
        currSlider_nr=-1;
        sliders_showslider(arg);
    }
}
function sliders_addlisteners(){
var $ = jQuery.noConflict();
	$('.add-item').unbind();
	$('.add-item').bind('click', click_additem);
        
	$('.items-con > .comp-images').sortable({
		placeholder: "ui-state-highlight",
		update: item_onsorted
	});
	$('.items-con > .comp-marks').sortable({
		placeholder: "ui-state-highlight",
		update: item_onsorted
	});
	$('.items-con > .comp-milestones').sortable({
		placeholder: "ui-state-highlight",
		update: item_onsorted
	});
        jQuery('.dzs-upload').singleUploader();
}


function sliders_click_addslider(){

    if(dzsts_settings.is_safebinding == 'on' ){

    }else{
        sliders_addslider();
        return false;
    }
}
function sliders_addslider(args){



    var sliderslen = jQuery('.main_sliders').children('tbody').children().length;
    var auxurl = (dzsts_settings.urlcurrslider).replace('_currslider_', sliderslen);
    var auxdelurl = (dzsts_settings.urldelslider).replace('_currslider_', sliderslen);
    var auxname = 'default';

    if(args!=undefined && args.name!=undefined){
        auxname = args.name;
    }


    //console.info(auxname);

    var auxs = '<tr class="slider-in-table"><td>'+auxname+'</td><td class="button_view"><strong><a href="'+auxurl+'" class="slider-action slider-edit">Edit</a></strong></td><td class="button_view"><strong><a href="#" class="slider-action slider-embed">Embed</a></strong></td><td class="button_view"><strong><a href="#" class="slider-action slider-sliderexport">Export</a></strong></td>';

    if(dzsts_settings.is_safebinding == 'on' ){
        auxs+='<td class="button_view"><form method="POST" class="slider-duplicate-form"><input type="hidden" name="dzsts_duplicateslider" value="'+sliderslen+'"/><input class="button-secondary" type="submit" value="Duplicate"/></form></td>';
    }else{
        auxs+='<td class="button_view"><strong><a href="#" class="slider-action slider-duplicate">Duplicate</a></strong></td>';
    }
    auxs+='<td class="button_view"><form method="POST" class="slider-delete"><input type="hidden" name="dzsts_deleteslider" value="'+sliderslen+'"/><input class="button-secondary" type="submit" value="Delete"/></form></td></tr>';

    jQuery('.main_sliders').children('tbody').append(auxs);


	jQuery('.master-settings').append(sliderstructure);
	for(i=0; i<jQuery('.slider-con').eq(sliderIndex).find('.textinput').length;i++){
		var _cache = jQuery('.slider-con').eq(sliderIndex).find('.textinput').eq(i);
		sliders_rename(_cache, sliderIndex, 'settings')
	}
	sliders_addlisteners();
	itemIndex[sliderIndex] = 0;
	++sliderIndex;
	sliders_reinit();
	return false;
}
function sliders_additem(arg1, arg2, arg3, argsettings){
var $ = jQuery.noConflict();
var j =0;
	var $cache = $('.items-con').eq(arg1);
	$cache.append(itemstructure);
	for(i=0;i<$cache.children().last().find('.textinput').length;i++){
		sliders_rename($cache.children().last().find('.textinput').eq(i), arg1, itemIndex[arg1]);
	}
        var ind = ($cache.children().length) - 8;
        $cache.children().last().attr('data-ind', ind);
        $cache.children().last().attr('data-sliderind', arg1);
	if(arg2!=undefined){
		$cache.children().last().find('.textinput').eq(0).val(arg2)
		$cache.children().last().find('.textinput').eq(0).trigger('change');
	}
	if(arg3!=undefined){
            if(arg3.title!=undefined){
		$cache.children().last().find('.textinput').eq(3).val(arg3.title)
		$cache.children().last().find('.textinput').eq(3).trigger('change');
            }
            if(arg3.thumb!=undefined){
		$cache.children().last().find('.textinput').eq(1).val(arg3.thumb)
		$cache.children().last().find('.textinput').eq(1).trigger('change');
            }
            if(arg3.type!=undefined){
                var _c = $cache.children().last().find('.textinput').eq(2);
		_c.find(':selected').attr('selected', '');
                
                for(j=0;j<_c.children().length;j++){
                        if(_c.children().eq(j).text() == arg3.type)
                        _c.children().eq(j).attr('selected', 'selected');
                }
               // console.log(_c);
		_c.trigger('change');
            }
        }
        if(argsettings!=undefined){
            if(argsettings.forcomp!=undefined){
                var _c = $cache.children().last();
                //console.log(_c);
                _c.find('.item-type').children().each(function(){
                    if(jQuery(this).val() == argsettings.forcomp){
                        jQuery(this).attr('selected', 'selected')
                    }
                })
                if(argsettings.forcomp == 'image'){
                    $cache.find('.comp-images').append(_c);
                }
                if(argsettings.forcomp == 'mark'){
                    $cache.find('.comp-marks').append(_c);
                }
                if(argsettings.forcomp == 'milestone'){
                    $cache.find('.comp-milestones').append(_c);
                }
                _c.find('.item-type').trigger('change');
            }
        }
	setTimeout(reskin_select, 10)
		itemIndex[arg1]++;
		
	return false;
}
function sliders_showslider(arg1) {
    if (arg1 == currSlider_nr){
        return;
    }

	jQuery('.slider-con').eq(currSlider_nr).fadeOut('fast');
    jQuery('.slider-con').eq(arg1).fadeIn('fast');
	currSlider_nr = arg1;
	currSlider = jQuery('.slider-con').eq(currSlider_nr);
}
function click_additem(){
    var $ = jQuery.noConflict();
    var argsettings = {  
    };
    if($(this).hasClass('for-comp-images')){
        argsettings.forcomp = 'image';
    }
    if($(this).hasClass('for-comp-marks')){
        argsettings.forcomp = 'mark';
    }
    if($(this).hasClass('for-comp-milestones')){
        argsettings.forcomp = 'milestone';
    }
	sliders_additem(currSlider_nr,undefined,undefined,argsettings)
	sliders_addlisteners();
	
	return false;
}
function sliders_change_mainid(){
    var _t=jQuery(this);
    var index=jQuery('.main-id').index(_t);
    if(dzsts_settings.is_safebinding!='on'){
    }else{
        index = (dzsts_settings.currSlider);
    }


    jQuery('.main_sliders tbody').children().eq(index).children().eq(0).text(_t.val());
}
function sliders_change_mainthumb(){
	var _t=jQuery(this);
    var _par = _t.parent().parent().parent();

//    extra_handleChangeType(_par);

    //console.info(_par)


//    console.info(_t, _par, _par.hasClass('type_mark'));

    setTimeout(function(){

        if(jQuery('.comp-marks').has(_t).length>0){
            //console.info(jQuery('.comp-marks').has(_t));
            return false;
        }

        if(_par.hasClass('type_mark')){
            _par.find('.item-preview').html(_t.val());
        }else{
            _par.find('.item-preview').css('background-image', "url(" + _t.val() + ")");
        }
    },100)


}
function sliders_change(arg1,arg2,arg3,arg4){
var $ = jQuery.noConflict();
	var $cache = $('.slider-con').eq(arg1);
	if(arg2=="settings"){
		for(i=0;i<$cache.find('.settings-con').find('.textinput').length;i++){
			
			var $c2 = $cache.find('.settings-con').find('.textinput').eq(i);
			var aux = arg1 + "-" + arg2 + "-" + arg3;
			if($c2.attr('name') == aux){
			$c2.val(arg4);
			if($c2[0].nodeName=='SELECT'){
				for(j=0;j<$c2.children().length;j++){
					if($c2.children().eq(j).text() == arg4)
					$c2.children().eq(j).attr('selected', 'selected');
				}
			}
			if($c2[0].nodeName=='INPUT' && $c2.attr('type')=='checkbox'){
				if(arg4=='on'){
					$c2.attr('checked', 'checked');
				}
			}
				$c2.change();
			}
		}
	}else{
                //console.log(arg1,arg2,arg3,arg4);
                var $c2 = $cache.find('.item-con[data-ind=' + arg2 + ']');
                var $c3;
                var _tar;
		for(i=0;i<$c2.find('.textinput').length;i++){
			$c3 = $c2.find('.textinput').eq(i);
			var aux = arg1 + "-" + arg2 + "-" + arg3;
                        _tar = $c3;
			if($c3.attr('name') == aux){
                            _tar.val(arg4);
                        
			if(_tar[0].nodeName=='SELECT'){
				for(j=0;j<$c3.children().length;j++){
					if($c3.children().eq(j).text() == arg4)
					$c3.children().eq(j).attr('selected', 'selected');
				}
			}
				$c3.change();
			
			}
		}
                //console.log($c2, arg2, arg3, arg4);
                if(arg3=='type'){
                    if(arg4=='image'){
                        $cache.find('.comp-images').append($c2);
                    }
                    if(arg4=='mark'){
                        //console.log($cache, $c2);
                        $cache.find('.comp-marks').append($c2);
                    }
                    if(arg4=='milestone'){
                        $cache.find('.comp-milestones').append($c2);
                    }
                    //console.log($c2);
                }
		
	}
}
function sliders_rename(arg1, arg2, arg3, arg4){
var $ = jQuery.noConflict();
		var name = arg1.attr('name');
		var aname = name.split('-');
		
		if(arg2!='same'){
		if(arg2==undefined){
		aname[0] = currSlider_nr;
		}else{
		aname[0]= arg2;
		}
		}
		if(arg3!='same'){
		if(arg3==undefined){
		aname[1] = itemIndex[currSlider_nr];
		}else{
		aname[1]= arg3;
		}
		}
		var str = aname[0] + '-' + aname[1] + '-' + aname[2];
		arg1.attr('name', str);
	
}
function item_onsorted(){
var $ = jQuery.noConflict();
	//console.log(currSlider.find('.item-con'))
	for(i=0;i<currSlider.find('.item-con').length;i++){
		var $cache = currSlider.find('.item-con').eq(i);
		for(j=0;j<$cache.find('.textinput').length;j++){
			var $cache2 = $cache.find('.textinput').eq(j);
			sliders_rename($cache2, undefined, i);
		}
	}
}
function item_open(){
	var _t = jQuery(this);
        var _itemCon = _t.parent();

        if(_itemCon.parent().hasClass('comp-milestones')){
            _itemCon.find('.main-source').css({
                'width' : 400
                ,'height' : 300
            })
        }

    _itemCon.toggleClass('active');
}



function sliders_saveslider(){
    jQuery('#save-ajax-loading').css('visibility', 'visible');
    var mainarray = currSlider.serializeAnything();

    //console.log(currSlider, currSlider.serializeAnything(), currSlider_nr);

    var auxslidernr = currSlider_nr;

    if(dzsts_settings.is_safebinding=='on'){
        auxslidernr = dzsts_settings.currSlider;
    }

    var data = {
        action: 'dzsts_ajax_saveall'
        ,postdata: mainarray
        ,sliderid : auxslidernr
        , currdb: dzsts_settings.currdb
    };
    jQuery.post(ajaxurl, data, function(response) {
        if(window.console != undefined){
            console.log('Got this from the server: ' + response);
        }
        jQuery('#save-ajax-loading').css('visibility', 'hidden');
        if(response.indexOf('success')>-1){
            jQuery('.saveconfirmer').html('Options saved.');
        }else{
            jQuery('.saveconfirmer').html('There seemed to be a problem ? Please check if options were actually saved.');
        }
        jQuery('.saveconfirmer').fadeIn('fast').delay(2000).fadeOut('fast');
    });
    return false;
}

function sliders_saveall(){
    jQuery('#save-ajax-loading').css('visibility', 'visible');
    var mainarray = jQuery('.master-settings').serialize();
    var data = {
        action: 'dzsts_ajax_saveall'
        ,postdata: mainarray
        ,currdb: dzsts_settings.currdb
    };
    jQuery('.saveconfirmer').html('Options saved.');
    jQuery('.saveconfirmer').fadeIn('fast').delay(2000).fadeOut('fast');
    jQuery.post(ajaxurl, data, function(response) {
        if(window.console !=undefined ){
            console.log('Got this from the server: ' + response);
        }
        jQuery('#save-ajax-loading').css('visibility', 'hidden');
    });

    return false;
}


function global_dzsmultiupload(arg){
	//console.log(arg);
        
    var argsettings = {  
    };
    argsettings.forcomp = 'image';
        
    sliders_additem(currSlider_nr, window.dzs_upload_path + arg, undefined, argsettings);
        
        
}
function sliders_resize(){
	jQuery('.master-settings').height(currSlider.height() + 250)
}


function reskin_select(){
var $ = jQuery.noConflict();
	for(i=0;i<jQuery('select').length;i++){
		var $cache = jQuery('select').eq(i);
		//console.log($cache.parent().attr('class'));
		
		if($cache.hasClass('styleme')==false || $cache.parent().hasClass('select_wrapper') || $cache.parent().hasClass('select-wrapper')){
		continue;
		}
		var sel = ($cache.find(':selected'));
		$cache.wrap('<div class="select-wrapper"></div>')
		$cache.parent().prepend('<span>' + sel.text() + '</span>')
	}
	jQuery('.select-wrapper select').unbind();
	jQuery(document).delegate('.select-wrapper select', 'change',change_select);
}

function change_select(){
var $ = jQuery.noConflict();
	var selval = (jQuery(this).find(':selected').text());
	jQuery(this).parent().children('span').text(selval);
}




/* @projectDescription jQuery Serialize Anything - Serialize anything (and not just forms!)
 * @author Bramus! (Bram Van Damme)
 * @version 1.0
 * @website: http://www.bram.us/
 * @license : BSD
 */

(function($) {

    $.fn.serializeAnything = function() {

        var toReturn    = [];
        var els         = $(this).find(':input').get();

        $.each(els, function() {
            if (this.name && !this.disabled && (this.checked || /select|textarea/i.test(this.nodeName) || /text|hidden|password/i.test(this.type))) {
                var val = $(this).val();
                toReturn.push( encodeURIComponent(this.name) + "=" + encodeURIComponent( val ) );
            }
        });

        return toReturn.join("&").replace(/%20/g, "+");

    }

})(jQuery);