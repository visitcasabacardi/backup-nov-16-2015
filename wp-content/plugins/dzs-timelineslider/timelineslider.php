<?php
/*
  Plugin Name: DZS Timeline Slider
  Plugin URI: http://digitalzoomstudio.net/
  Description: Creates and manages cool timeline sliders.
  Version: 2.41
  Author: Digital Zoom Studio
  Author URI: http://digitalzoomstudio.net/
 */

require_once dirname(__FILE__).'/dzs_functions.php';

if (!function_exists('replace_in_matrix')) {

    function replace_in_matrix($arg1,$arg2,&$argarray) {
        foreach ($argarray as &$newi) {
            //print_r($newi);
            if (is_array($newi)) {
                foreach ($newi as &$newj) {
                    if (is_array($newj)) {
                        foreach ($newj as &$newk) {
                            if (!is_array($newk)) {
                                $newk = str_replace($arg1,$arg2,$newk);
                            }
                        }
                    } else {
                        $newj = str_replace($arg1,$arg2,$newj);
                    }
                }
            } else {
                $newi = str_replace($arg1,$arg2,$newi);
            }
        }
    }

}
$dzsts = new DZSTimelineSlider();

class DZSTimelineSlider {

    public $theurl;
    public $sliders_index = 0;
    public $the_shortcode = 'timelineslider';
    public $admin_capability = 'manage_options';
    public $dbitemsname = 'dzsts_items';
    public $dboptionsname = 'dzsts_options';
    public $mainitems;
    public $mainoptions;
    public $pluginmode = "plugin";
    public $alwaysembed = "on";
    public $httpprotocol = 'https';
    private $adminpagename = 'dzsts_menu';
    public $currSlider = '';
    public $currDb = '';

    function __construct() {
        if ($this->pluginmode == 'theme') {
            $this->theurl = THEME_URL.'plugins/dzs-timelineslider/';
        } else {
            $this->theurl = plugins_url('',__FILE__).'/';
        }


        if (isset($_GET['currslider'])) {
            $this->currSlider = $_GET['currslider'];
        } else {
            $this->currSlider = 0;
        }


        $this->mainitems = get_option($this->dbitemsname);
        if ($this->mainitems == '') {
            //-- trying to preserver old name
            $auxo = get_option('zsts_items');
//            print_r($auxo);
            if ($auxo != '') {
                $this->mainitems = $auxo;
                update_option($this->dbitemsname,$this->mainitems);
            } else {
                $aux = 'a:1:{i:0;a:32:{s:8:"settings";a:14:{s:2:"id";s:14:"defaultgallery";s:5:"width";s:4:"100%";s:6:"height";s:4:"auto";s:16:"totalImagesWidth";s:1:"0";s:17:"totalImagesHeight";s:1:"0";s:17:"totalContentWidth";s:1:"0";s:18:"totalContentHeight";s:1:"0";s:12:"draggerWidth";s:2:"59";s:13:"draggerHeight";s:2:"21";s:18:"timelinesliderskin";s:9:"skin_dark";s:10:"mousewheel";s:2:"on";s:11:"audiosource";s:0:"";s:7:"bgimage";s:101:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/timelineslider/images/background.jpg";s:6:"border";s:1:"8";}i:0;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:1;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:2;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:3;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:4;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:5;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:6;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:7;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:8;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:9;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:10;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:11;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:12;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:13;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:14;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:15;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:16;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:17;a:5:{s:6:"source";s:91:"http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/admin/img/defaultthumb.png";s:4:"type";s:5:"image";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:18;a:5:{s:6:"source";s:4:"2000";s:4:"type";s:4:"mark";s:11:"description";s:4:"2000";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:19;a:5:{s:6:"source";s:4:"2002";s:4:"type";s:4:"mark";s:11:"description";s:4:"2002";s:4:"xpos";s:3:"200";s:9:"itemwidth";s:3:"200";}i:20;a:5:{s:6:"source";s:4:"2005";s:4:"type";s:4:"mark";s:11:"description";s:4:"2008";s:4:"xpos";s:3:"500";s:9:"itemwidth";s:3:"200";}i:21;a:5:{s:6:"source";s:4:"2007";s:4:"type";s:4:"mark";s:11:"description";s:4:"2010";s:4:"xpos";s:3:"600";s:9:"itemwidth";s:3:"200";}i:22;a:5:{s:6:"source";s:4:"2010";s:4:"type";s:4:"mark";s:11:"description";s:0:"";s:4:"xpos";s:3:"700";s:9:"itemwidth";s:3:"200";}i:23;a:5:{s:6:"source";s:425:"<span class="date">NOVEMBER 1978 - STARTUP</span> <span class="txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit, <strong>sed do eiusmod tempor incididunt</strong> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco.<br/><br/>Ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"200";}i:24;a:5:{s:6:"source";s:980:"<span class="date">1985</span> <span class="txt">Ut enim ad minim veniam, quis nostrud exercitation ullamco.<br/><br/>Duis aute irure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span> <span class="thumb"><a href="#extended_text1" data-rel="prettyPhoto" title=""><div class="readmore" title="READ MORE"></div></a></span> <div id="extended_text1" class="hidden"><p><strong>Sample of extended content opened with lightbox</strong><br/><br/> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip <a href="http://www.themeforest.net" target="_blank">sample of external link</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p> </div>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"100";}i:25;a:5:{s:6:"source";s:238:"<span class="date">MARCH 1992</span> <span class="txt">Ut enim ad minim veniam, quis nostrud exercitation ullamco.</span> <span class="date"><br/>NOVEMBER 1999</span> <span class="txt">Duis aute irure dolor in voluptate velit esse.</span>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"125";}i:26;a:5:{s:6:"source";s:406:"<span class="date">2002 - 20 YEARS<br/>ANNIVERSARY VIDEO</span> <span class="thumb"><a href="http://vimeo.com/24492485" data-rel="prettyPhoto" title="20 Years Anniversary Video" class="video_rollover"><img src="https://lh5.googleusercontent.com/-2CZQmQF__uE/T9jXm_p9uZI/AAAAAAAAByM/hqpUfeTuRB0/s113/video_sample_thumb.png" alt="" /></a></span> <span class="thumb_description">Short video description</span>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"125";}i:27;a:5:{s:6:"source";s:799:"<span class="date">2005</span> <span class="txt">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</span> <span class="big_link"><a href="https://lh4.googleusercontent.com/-b3NI7mpjEK4/T9jHwxAYHXI/AAAAAAAABx4/E-xJTb5c0uU/s113/image_sample_thumb.png" data-rel="prettyPhoto[sample_gallery]" title="Gallery sample 01">> IMAGE GALLERY</a></span> <div class="hidden"> <!-- SAMPLE OF HIDDEN GALLERY ITEMS --> <a href="https://lh4.googleusercontent.com/-b3NI7mpjEK4/T9jHwxAYHXI/AAAAAAAABx4/E-xJTb5c0uU/s113/image_sample_thumb.png" data-rel="prettyPhoto[sample_gallery]" title="Gallery sample 02"></a> <a href="https://lh4.googleusercontent.com/-b3NI7mpjEK4/T9jHwxAYHXI/AAAAAAAABx4/E-xJTb5c0uU/s113/image_sample_thumb.png" data-rel="prettyPhoto[sample_gallery]" title="Gallery sample 03"></a> </div>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"150";}i:28;a:5:{s:6:"source";s:434:"<span class="date">2006 - WPA PARTNERS</span> <span class="txt">Sample of external links:</span> <span class="link"><br/><a href="http://themeforest.net/user/pezflash" target="_blank">www.envato.com</a></span> <span class="link"><a href="http://themeforest.net/user/pezflash" target="_blank">www.themeforest.net</a></span> <span class="link"><a href="http://themeforest.net/user/pezflash" target="_blank">www.codecanyon.net</a></span>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"150";}i:29;a:5:{s:6:"source";s:1172:"<span class="date">2010 - WIDE COLUMN SAMPLE</span> <span><img src="https://lh3.googleusercontent.com/-Gf9pQkj1gB0/T9jHWChagBI/AAAAAAAABxs/JhY8BH2K9_s/s120/logos.png" alt="" /></span> <span class="txt">Ut enim ad minim veniam, quis nostrud exercit ullamco. Duis aute irure dolor in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </span> <span class="thumb"><a href="#extended_text2" data-rel="prettyPhoto" title=""><div class="readmore" title="READ MORE" ></div></a></span> <div id="extended_text2" class="hidden"> <!-- SAMPLE OF HIDDEN DIV WITH EXTENDED CONTENT --> <p><strong>Sample of extended content opened with lightbox</strong><br/><br/> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip <a href="http://www.themeforest.net" target="_blank">sample of external link</a>. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"175";}i:30;a:5:{s:6:"source";s:849:" <span class="date">2012 - PRESENT</span> <span class="thumb"><a href="https://lh4.googleusercontent.com/-b3NI7mpjEK4/T9jHwxAYHXI/AAAAAAAABx4/E-xJTb5c0uU/s113/image_sample_thumb.png" data-rel="prettyPhoto[sample_gallery2]" title="10 Years Anniversary Video" class="image_rollover"><img src="https://lh4.googleusercontent.com/-b3NI7mpjEK4/T9jHwxAYHXI/AAAAAAAABx4/E-xJTb5c0uU/s113/image_sample_thumb.png" alt="" /></a></span> <span class="thumb_description">Image description</span> <div class="hidden"> <!-- SAMPLE OF HIDDEN GALLERY ITEMS --> <a href="https://lh4.googleusercontent.com/-b3NI7mpjEK4/T9jHwxAYHXI/AAAAAAAABx4/E-xJTb5c0uU/s113/image_sample_thumb.png" data-rel="prettyPhoto[sample_gallery2]" title="Gallery sample 02"></a> <a href="images/gallery_sample_03.jpg" data-rel="prettyPhoto[sample_gallery2]" title="Gallery sample 03"></a></div>";s:4:"type";s:9:"milestone";s:11:"description";s:0:"";s:4:"xpos";s:1:"0";s:9:"itemwidth";s:3:"150";}}}';
                $this->mainitems = unserialize($aux);
                update_option($this->dbitemsname,$this->mainitems);
            }
        }
        $this->mainoptions = get_option($this->dboptionsname);
        if ($this->mainoptions == '') {
            $this->mainoptions = array(
                'usewordpressuploader' => 'on',
                'embed_prettyphoto' => 'on',
                'is_safebinding' => 'on',
            );
            update_option($this->dboptionsname,$this->mainoptions);
        }
        
        
            $this->mainoptions = array(
                'usewordpressuploader' => 'on',
                'embed_prettyphoto' => 'on',
                'is_safebinding' => 'on',
            );

        load_plugin_textdomain('dzsts',false,basename(dirname(__FILE__)).'/languages');

        $this->post_options();
        
        if(isset($_GET['dzsts_show_generator_export_slider']) && $_GET['dzsts_show_generator_export_slider']=='on'){
            $this->show_generator_export_slider();
        }



        $uploadbtnstring = '<button class="button-secondary action upload_file zs2-main-upload alltype_image" style="">Upload</button>';

        if ($this->mainoptions['usewordpressuploader'] != 'on') {
            $uploadbtnstring = '<div class="dzs-upload" style="">
<form name="upload" class="" action="#" method="POST" enctype="multipart/form-data">
    	<input type="button" value="Upload" class="btn_upl"/>
        <input type="file" name="file_field" class="file_field"/>
        <input type="submit" class="btn_submit zs2-main-upload"/>
</form>
</div>
<div class="feedback"></div>';
        }


        $this->sliderstructure = '<div class="slider-con" style="display:none;">
        <div class="settings-con">
        <h2>'.__('General Options','dzsts').'</h2>
        <div class="setting type_all">
            <div class="setting-label">'.__('ID','dzsts').'</div>
            <input type="text" class="textinput main-id" name="0-settings-id" value="default"/>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Width','dzsts').'</div>
            <input type="text" class="textinput" name="0-settings-width" value="100%"/>
            <div class="sidenote">'.__('Leave 100% for responsive mode','dzsts').'</div>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Height','dzsts').'</div>
            <input type="text" class="textinput" name="0-settings-height" value="auto"/>
            <div class="sidenote">Set this to <strong>auto</strong> and it will be auto calculated</div>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Total Images Width','dzsts').'</div>
            <input type="text" class="textinput" name="0-settings-totalImagesWidth" value="0"/>
            <div class="sidenote">Leave this to 0 and it will be auto calculated</div>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Total Images Height','dzsts').'</div>
            <div class="sidenote">Leave this to 0 and it will be auto calculated</div>
            <input type="text" class="textinput" name="0-settings-totalImagesHeight" value="0"/>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Total Milestone Width','dzsts').'</div>
            <div class="sidenote">Leave this to 0 and it will be auto calculated</div>
            <input type="text" class="textinput" name="0-settings-totalContentWidth" value="0"/>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Total Milestone Height','dzsts').'</div>
            <div class="sidenote">Leave this to 0 and it will be auto calculated</div>
            <input type="text" class="textinput" name="0-settings-totalContentHeight" value="0"/>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Dragger Width','dzsts').'</div>
            <input type="text" class="textinput" name="0-settings-draggerWidth" value="59"/>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Dragger Height','dzsts').'</div>
            <input type="text" class="textinput" name="0-settings-draggerHeight" value="21"/>
        </div>
        <div class="setting styleme">
            <div class="setting-label">'.__('Skin','dzsts').'</div>
            <select class="textinput styleme" name="0-settings-timelinesliderskin">
                <option>skin_dark</option>
                <option>skin_white</option>
            </select>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Mouse Wheel','dzsts').'</div>
            <select class="textinput styleme" name="0-settings-mousewheel">
                <option>on</option>
                <option>off</option>
            </select>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Audio Track','dzsts').'
                <div class="info-con">
                <div class="info-icon"></div>
                <div class="sidenote">Choose an audio track as background to the timeline slider or leave blank for no audio - mp3 format.</div>
                </div>
            </div>
            <input type="text" class="textinput" name="0-0-audiosource" value=""/>'.$uploadbtnstring.'
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Background Image','dzsts').'
            </div>
            <input type="text" class="textinput" name="0-0-bgimage" value="'.$this->theurl.'timelineslider/images/background.jpg"/>'.$uploadbtnstring.'
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Border Width','dzsts').'</div>
            <input type="text" class="textinput" name="0-settings-border" value="4"/>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Responsive','dzsts').'</div>
            <select class="textinput styleme" name="0-settings-responsive">
                <option>on</option>
                <option>off</option>
            </select>
            <div class="sidenote">Make it truly responsive, a percentage is required in the <strong>width</strong> field ( ie. 100% )</div>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Align Markers ','dzsts').'</div>
            <select class="textinput styleme" name="0-settings-alignmarkers">
                <option>off</option>
                <option>on</option>
            </select>
            <div class="sidenote">'.__('Align the markers evenly across the timeline so you do not have to position manually','dzsts').'</div>
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Align Markers with Milestones','dzsts').'</div>
            <select class="textinput styleme" name="0-settings-alignmarkerswithmilestones">
                <option>off</option>
                <option>on</option>
            </select>
            <div class="sidenote">'.__('Set each marker to point to its corresponding milestone when clicked. ','dzsts').'</div>
        </div>
        
        
        </div><!--end settings con-->
        <div class="master-items-con">
        <div class="items-con">
        <div class="controls">
        <a title="explanation" href="http://lh3.googleusercontent.com/-ZvZlB8aaI08/U-Trg0OHG0I/AAAAAAAAAZ4/ZUDapbOdMgg/s700/info.jpg"  target="_blank">(see explanation)</a>
        </div>
        <h2>Images <a href="#" class="add-item for-comp-images">add</a></h2><div class="comp-images"></div>
        <h2>Marks <a href="#" class="add-item for-comp-marks">add</a></h2><div class="comp-marks"></div>
        <h2>Milestones <a href="#" class="add-item for-comp-milestones">add</a></h2><div class="comp-milestones"></div>
        </div>
        
        </div><!--end master-items-con-->
        </div>';
        /*
         * 
         */


        $this->itemstructure = '<div class="item-con">
            <div class="item-duplicate"></div>
        <div class="item-preview" style="">2002</div>
        <div class="item-delete">x</div>
        <div class="item-settings-con">
        <div class="setting type_all ">
            <div class="setting-label">'.__('Image / Mark Date / Milestone Text','dzsts').'</div>
            
<textarea class="textinput main-source main-thumb type_image" name="0-0-source" style="width:160px; height:23px;"></textarea>'.$uploadbtnstring.'
        </div>
        <div class="setting type_all">
            <div class="setting-label">'.__('Type','dzsts').'</div>
            <select class="textinput item-type styleme type_all" name="0-0-type">
            <option>image</option>
            <option>mark</option>
            <option>milestone</option>
            </select>
        </div>
        <div class="setting">
            <div class="setting-label">'.__('Description / Mark Date','dzsts').'</div>
            <textarea class="textinput" name="0-0-description"></textarea>
        </div>
        <div class="setting type_mark">
            <div class="setting-label">'.__('Horizontal Position','dzsts').'</div>
            <input class="textinput" name="0-0-xpos" value="" type="text"/>
        </div>
        <div class="setting type_mark">
            <div class="setting-label">'.__('Link to Milestone','dzsts').'</div>
            <input class="textinput" name="0-0-linktomilestone" value="" type="text"/>
        </div>
        <div class="setting type_milestone">
            <div class="setting-label">'.__('Item Width','dzsts').'</div>
            <input class="textinput" name="0-0-itemwidth" value="200" type="text"/>
        </div>
        </div><!--end item-settings-con-->
        </div>';



        add_shortcode($this->the_shortcode,array($this,'show_shortcode'));
        add_shortcode('dzs_'.$this->the_shortcode,array($this,'show_shortcode'));


        add_action('init',array($this,'handle_init'));
        add_action('wp_ajax_dzsts_ajax_saveall',array($this,'ajax_saveall'));
        add_action('admin_menu',array($this,'handle_admin_menu'));

        add_action('admin_head',array($this,'handle_admin_head'));

        if ($this->pluginmode == 'theme') {
            $this->mainoptions['embed_prettyphoto'] = 'off';
        }


        if ($this->pluginmode != 'theme') {
            add_action('admin_init',array($this,'admin_init'));
            //add_action('save_post', array($this, 'admin_meta_save'));
        }
    }

    function handle_admin_head() {

        $aux = remove_query_arg('deleteslider',dzs_curr_url());
        $params = array('currslider' => '_currslider_');
        $newurl = add_query_arg($params,$aux);

        $params = array('deleteslider' => '_currslider_');
        $delurl = add_query_arg($params,$aux);
        echo '
<script>var dzsts_settings = { theurl: "'.$this->theurl.'", is_safebinding: "'.$this->mainoptions['is_safebinding'].'", admin_close_otheritems:"'.$this->mainoptions['admin_close_otheritems'].'",wpurl : "'.site_url().'" ';

        //echo 'hmm';
        if (isset($_GET['page']) && $_GET['page'] == $this->adminpagename && ( (isset($this->mainitems[$this->currSlider]) && $this->mainitems[$this->currSlider] == '') || isset($this->mainitems[$this->currSlider]) == false )) {
            echo ', addslider:"on"';
        }
        if (isset($_GET['page']) && $_GET['page'] == $this->adminpagename_configs && $this->mainvpconfigs[$this->currSlider] == '') {
            echo ', addslider:"on"';
        }
        
        echo ', urldelslider:"'.$delurl.'", urlcurrslider:"'.$newurl.'", currSlider:"'.$this->currSlider.'", currdb:"'.$this->currDb.'"};';
        echo '</script>';
    }

    function show_shortcode($atts) {
        $fout = '';


        if ($this->mainitems == '')
            return;

        $this->front_scripts();

        $this->sliders_index++;


        $i = 0;
        $k = 0;
        $markindex = 0;
        $milestoneindex = 0;
        $id = 'default';
        if (isset($atts['id'])) {
            $id = $atts['id'];
        }

        //echo 'ceva' . $id;
        for ($i = 0; $i < count($this->mainitems); $i++) {
            if ((isset($id)) && ($id == $this->mainitems[$i]['settings']['id']))
                $k = $i;
        }
        //echo $id;
        $its = $this->mainitems[$k];

        //print_r($this->mainitems);
        $w = $its['settings']['width'].'px';
        if (strpos($its['settings']['width'],'%') !== false || $its['settings']['width'] == 'auto') {
            $w = $its['settings']['width'];
        }
        if (strpos($its['settings']['height'],'%') !== false || $its['settings']['height'] == 'auto') {
            $h = $its['settings']['height'];
        }

        $fullscreenclass = '';
        $theclass = 'timelineslider';


        //$fout.='<div class="timelineslider-con" style="width:'.$w.'; height:'.$h.'; opacity:0;">';


        $skin = 'skin_default';
        //print_r($its);
        //$fout.='ceva';




        $fout.='<div class="timeline_container_container"><div class="timeline-preloader"></div>
<div id="timeline'.$this->sliders_index.'" class="timeline_container" style="width:'.$w.'; height:'.$h.';">
<div class="timeline" style="width:'.$w.'; height:'.$h.'; ">
<div class="viewport"><div class="inner images" style="width:30000px; height:auto;"><span class="real-inner">';
//print_r($its);
        for ($i = 0; $i < count($its) - 1; $i++) {
            $it = $its[$i];
            if ($it['type'] == 'image') {
                $fout.='<img src="'.$it['source'].'" alt="'.$it['description'].'" />';
            }
        }
        $fout.='</span>';
        $fout.='</div>';

        $marknr = 0;

        if($its['settings']['alignmarkers']=='on'){
            for ($i = 0; $i < count($its) - 1; $i++) {

                $it = $its[$i];
                if ($it['type'] == 'mark') {
                    $marknr++;
                }
            }
        }


        $fout.='<div class="marks">';
//print_r($its);

        for ($i = 0; $i < count($its) - 1; $i++) {
            $it = $its[$i];
            if ($it['type'] == 'mark') {
                $fout.='<div id="m'.$markindex.'" class="mark" data-label="'.do_shortcode(stripslashes($it['source'])).'"';


                if(isset($it['xpos']) && $it['xpos']!=''){
                    $fout.=' data-xpos="'.$it['xpos'].'"';
                }else{
                    if(isset($its['settings']['alignmarkers']) && $its['settings']['alignmarkers']=='on'){
//                    echo 'ceva'.$markindex.' '.$marknr.' ' . ( 100/$marknr*($markindex) ).'cevaal';
                        $fout.=' data-xpos="'.( 100/$marknr*($markindex) ).'%"';
                    }
                }


                if(isset($its['settings']['alignmarkerswithmilestones']) && $its['settings']['alignmarkerswithmilestones']=='on'){
//                    echo 'ceva'.$i.'cevaal';
                    $fout.=' data-linktomilestone="'.$markindex.'"';
                }else{
                    if(isset($it['linktomilestone']) && $it['linktomilestone']!=''){
                        $fout.=' data-linktomilestone="'.$it['linktomilestone'].'"';
                    }
                }


                $fout.='></div>';
                $markindex++;
                //$fout.='<img src="'.$it['source'].'" alt="" />';
            }
        }
        $fout.='</div>'; //--marks END

        $fout.='</div>'; //--viewport END


        $fout.='<div class="milestones"><div class="content">';
//print_r($its);
        for ($i = 0; $i < count($its) - 1; $i++) {
            $it = $its[$i];
            if ($it['type'] == 'milestone') {

                //$fout.='<img src="'.$it['source'].'" alt="" />';
                if ($milestoneindex == 0) {
                    $fout.='<div class="column_first">';
                } else {
                    $fout.='<div class="column">';
                }

                $fout.='<div style="width: '.$it['itemwidth'].'px">'.do_shortcode(stripslashes($it['source'])).'</div>';

                $fout.='</div>';
                $milestoneindex++;
            }
        }
        $fout.='</div>';
        $fout.='</div>';


        $fout.='</div>';
        $fout.='</div>';
        $fout.='</div>';
        $jreadycall = 'jQuery(document).ready(function($){';

        $fout.='<script>'.$jreadycall;
        $fout.='jQuery("#timeline'.$this->sliders_index.' .timeline").myTimeline({
draggerWidth : "'.$its['settings']['draggerWidth'].'"
,draggerHeight : "'.$its['settings']['draggerHeight'].'"';
        $fout.=',settings_skin : "'.$its['settings']['timelinesliderskin'].'"';
        if ($its['settings']['mousewheel'] == 'on') {
            $fout.=',settings_mousewheel : "1"';
        } else {
            $fout.=',settings_mousewheel : "0"';
        };

        if ($its['settings']['totalContentHeight'] != 0 && $its['settings']['totalContentHeight'] != '') {
            $fout.=',totalContentHeight:"'.$its['settings']['totalContentHeight'].'"';
        };
        $fout.=',responsive : "'.$its['settings']['responsive'].'"';
        $fout.=',pseudoresponsive : "off"';
        $fout.='});
if(jQuery.fn.prettyPhoto){
//console.log($("a[rel^=prettyPhoto], a[data-rel^=prettyPhoto]"));
$("a[rel^=prettyPhoto], a[data-rel^=prettyPhoto]").prettyPhoto({social_tools:false});
}
    });
    </script>';


        $fout.='<style>';
        if ($its['settings']['bgimage'] != '') {
            $fout.='#timeline'.$this->sliders_index.' .viewport{ background: url('.$its['settings']['bgimage'].') no-repeat scroll 0 0 transparent; }';
        }
        if ($its['settings']['border'] != '') {
            $fout.='#timeline'.$this->sliders_index.'{ border-width: '.$its['settings']['border'].'px; }';
            $fout.='#timeline'.$this->sliders_index.' .milestones{ border-width: '.$its['settings']['border'].'px; }';
        }
        $fout.='</style>';










        return $fout;








        //echo $k;
    }

    function admin_init() {
        //add_meta_box('dzsts_meta_options', __('DZS Timeline Slider Settings'), array($this,'admin_meta_options'), 'post', 'normal', 'high');
        //add_meta_box('dzsts_meta_options', __('DZS Timeline Slider Settings'), array($this,'admin_meta_options'), 'page', 'normal', 'high');
    }

    function handle_init() {
        wp_enqueue_script('jquery');
        if (is_admin()) {
            if (isset($_GET['page']) && $_GET['page'] == $this->adminpagename) {
                $this->admin_scripts();
                wp_enqueue_media();
            }
        } else {
            
        }
    }

    function handle_admin_menu() {

        if ($this->pluginmode == 'theme') {
            $dzsts_page = add_theme_page(__('DZS Timeline Slider','dzsts'),__('DZS Timeline Slider','dzsts'),$this->admin_capability,$this->adminpagename,array($this,'admin_page'));
        } else {
            $dzsts_page = add_options_page(__('DZS Timeline Slider','dzsts'),__('DZS Timeline Slider','dzsts'),$this->admin_capability,$this->adminpagename,array($this,'admin_page'));
        }
    }

    function admin_scripts() {
        wp_enqueue_script('media-upload');
        wp_enqueue_script('tiny_mce');
        wp_enqueue_script('thickbox');
        wp_enqueue_style('thickbox');
        wp_enqueue_script('dzsts_admin',$this->theurl."admin/admin.js");
        wp_enqueue_style('dzsts_admin',$this->theurl.'admin/admin.css');
        wp_enqueue_style('dzstsdzsuploader',$this->theurl.'admin/dzsuploader/upload.css');
        wp_enqueue_script('dzstsdzsuploader',$this->theurl.'admin/dzsuploader/upload.js');
        wp_enqueue_script('jquery-ui-core');
        wp_enqueue_script('jquery-ui-sortable');
    }

    function front_scripts() {
        //print_r($this->mainoptions);
        $timelinesliderscripts = array('jquery');
        //wp_enqueue_script('jquery.ui.custom', $this->theurl . "timelineslider/jquery-ui-1.8.18.custom.min.js");
        //wp_enqueue_script('jquery.ui.custom', $this->theurl . "timelineslider/jquery-ui-1.10.0.custom.min.js");
        wp_enqueue_script('jquery.tipsy',$this->theurl."timelineslider/tipsy/jquery.tipsy.js");
        wp_enqueue_style('jquery.tipsy',$this->theurl."timelineslider/tipsy/tipsy.css");

        wp_enqueue_style('dzs.timelineslider',$this->theurl."timelineslider/timelineslider.css");
        wp_enqueue_script('dzs.timelineslider',$this->theurl."timelineslider/audio.min-jquery.timeline.js");

        wp_enqueue_style('dzs.scroller',$this->theurl."dzsscroller/scroller.css");
        wp_enqueue_script('dzs.scroller',$this->theurl."dzsscroller/scroller.js");


        if ($this->mainoptions['embed_prettyphoto'] == 'on') {
            wp_enqueue_script('jquery.prettyphoto',$this->theurl."prettyphoto/jquery.prettyPhoto.js");
            wp_enqueue_style('jquery.prettyphoto',$this->theurl.'prettyphoto/prettyPhoto.css');
        }
    }

    function admin_page() {
        ?>
        <div class="wrap">
            <div class="import-export-db-con">
                <div class="the-toggle"></div>
                <div class="the-content-mask" style="overflow:hidden; height: 0px; position:relative;">
                    <div class="arrow-up"></div>
                    <div class="the-content">
                        <h3>Export Database</h3>
                        <form action="" method="POST"><input type="submit" name="dzsts_exportdb" value="Export"/></form>
                        <h3>Import Database</h3>
                        <form enctype="multipart/form-data" action="" method="POST">
                            File Location: <input name="dzsts_importdbupload" type="file" /><br />
                            <input type="submit" name="dzsts_importdb" value="Import" />
                        </form>
                        <h3>General Options</h3>
                        <form enctype="multipart/form-data" action="" method="POST">
                            <h5>Use WordPress Uploader ?</h5>
                            <?php
                            $onsel = '';
                            $offsel = '';
                            if ($this->mainoptions['usewordpressuploader'] == 'on') {
                                $onsel = ' selected';
                            } else {
                                $offsel = ' selected';
                            }
                            ?>
                            <select name="usewordpressuploader">
                                <option<?php echo $onsel; ?>>on</option>
                                <option<?php echo $offsel; ?>>off</option>
                            </select><br></br>
                            <h5>Embed Prettyphoto ?</h5>
                            <?php
                            $onsel = '';
                            $offsel = '';
                            if ($this->mainoptions['embed_prettyphoto'] == 'on') {
                                $onsel = ' selected';
                            } else {
                                $offsel = ' selected';
                            }
                            ?>
                            <select name="embed_prettyphoto">
                                <option<?php echo $onsel; ?>>on</option>
                                <option<?php echo $offsel; ?>>off</option>
                            </select><br></br>
                            <input type="submit" class="button-primary" name="dzsts_saveoptions" value="Save Options" />

                        </form>
                    </div>
                </div>
            </div>
            <h2>DZS <?php _e('Timeline Slider Admin'); ?> <img alt="" style="visibility: visible;" id="main-ajax-loading" src="<?php bloginfo('wpurl'); ?>/wp-admin/images/wpspin_light.gif"/></h2>
            <noscript>You need javascript for this.</noscript>
            <a href="<?php echo $this->theurl; ?>readme/index.html" class="button-secondary action">Documentation</a>
            <table cellspacing="0" class="wp-list-table widefat dzs_admin_table main_sliders">
                <thead> 
                    
                    <tr> 
                        <th style="" class="manage-column column-name" id="name" scope="col"><?php echo __('ID','dzsts'); ?></th>
                        <th class="column-edit"><?php echo __('Edit','dzsts'); ?></th>
                        <th class="column-edit"><?php echo __('Embed','dzsts'); ?></th>
                        <th class="column-edit"><?php echo __('Export','dzsts'); ?></th>
                        <th class="column-edit"><?php echo __('Duplicate','dzsts'); ?></th>
                        <th class="column-edit"><?php echo __('Delete','dzsts'); ?></th> 
                    </tr>
                </thead> 
                <tbody>
                </tbody>
            </table>
            <?php
            
        $url_add = '';
        $items = $this->mainitems;
        //echo count($items);

        $aux = remove_query_arg('deleteslider',dzs_curr_url());

        $nextslidernr = count($items);
        if ($nextslidernr < 1) {
            $nextslidernr = 1;
        }
        $params = array('currslider' => $nextslidernr);
        $url_add = add_query_arg($params,$aux);
        ?>
            <a class="button-secondary add-slider" href="<?php echo $url_add; ?>"><?php _e('Add Slider','dzsts'); ?></a>
            <form class="master-settings">
            </form>
            <div class="dzs-multi-upload">
                <h2>DZS Multi Uploader</h2>
                <h3>Choose file(s)</h3>
                <div>
                    <input id="files-upload" class="multi-uploader" name="file_field" type="file" multiple/>
                </div>
                <div class="droparea">
                    <div class="instructions">drag & drop files here</div>
                </div>
                <div class="upload-list-title">The Preupload List</div>
                <ul class="upload-list">
                    <li class="dummy">add files here from the button or drag them above</li>
                </ul>
                <button class="primary-button upload-button">Upload All</button>
            </div>
            <div class="notes">
                <div class="curl">Curl: <?php echo function_exists('curl_version') ? 'Enabled' : 'Disabled'.'<br />'; ?>
                </div>
                <div class="fgc">File Get Contents: <?php echo ini_get('allow_url_fopen') ? "Enabled" : "Disabled"; ?>
                </div>
                <div class="sidenote">
                </div>
            </div>
            <div class="saveconfirmer">Loading...</div>
            <div class="saveconfirmer"><?php _e('Loading...','dzsts'); ?></div>
            <a href="#" class="button-primary master-save"></a> <img alt="" style="position:fixed; bottom:18px; right:125px; visibility: hidden;" id="save-ajax-loading" src="<?php bloginfo('wpurl'); ?>/wp-admin/images/wpspin_light.gif"/>

            <a href="#" class="button-primary master-save"><?php echo __('Save All Galleries','dzsts'); ?></a>
            <a href="#" class="button-secondary slider-save"><?php echo __('Save Gallery','dzsts'); ?></a>

        </div>
        <script>
        <?php
//$jsnewline = '\\' + "\n";
        echo "window.dzs_upload_path = '".$this->theurl."admin/dzsuploader/upload/';
";
        echo "window.dzs_php_loc = '".$this->theurl."admin/dzsuploader/upload.php';
";
        $aux = str_replace(array("\r","\r\n","\n"),'',$this->sliderstructure);
        echo "var sliderstructure = '".$aux."';
";
        $aux = str_replace(array("\r","\r\n","\n"),'',$this->itemstructure);
        echo "var itemstructure = '".$aux."';
";
        ?>
            jQuery(document).ready(function($) {
                sliders_ready();
        <?php
        $items = $this->mainitems;
        for ($i = 0; $i < count($items); $i++) {
//print_r($items[$i]);
            $aux = '';
            if (isset($items[$i]) && isset($items[$i]['settings']) && isset($items[$i]['settings']['id'])) {
                //echo $items[$i]['settings']['id'];

                $aux_id = $items[$i]['settings']['id'];
                $aux_id = stripslashes($aux_id);
                $aux_id = str_replace('"',"&apos;&apos;",$aux_id);
                $aux = '{ name: "'.$aux_id.'"}';
            }
            echo "sliders_addslider(".$aux.");";
        }
        if (count($items) > 0){
            echo 'sliders_showslider(0);';
        }
        
        
        for ($i = 0; $i < count($items); $i++) {
//echo $i . $this->currSlider . 'cevava';
            if (($this->mainoptions['is_safebinding'] != 'on' || $i == $this->currSlider) && is_array($items[$i])) {

                //==== jsi is the javascript I, if safebinding is on then the jsi is always 0 ( only one gallery ) 
                $jsi = $i;
                if ($this->mainoptions['is_safebinding'] == 'on') {
                    $jsi = 0;
                }

                for ($j = 0; $j < count($items[$i]) - 1; $j++) {
                    echo "sliders_additem(".$jsi.");";
                }

                foreach ($items[$i] as $label => $value) {
                    if ($label === 'settings') {
                        if (is_array($items[$i][$label])) {
                            foreach ($items[$i][$label] as $sublabel => $subvalue) {
                                $subvalue = (string)$subvalue;
                                $subvalue = stripslashes($subvalue);
                                $subvalue = str_replace(array("\r","\r\n","\n",'\\',"\\"),'',$subvalue);
                                $subvalue = str_replace(array("'"),'"',$subvalue);
                                echo 'sliders_change('.$jsi.', "settings", "'.$sublabel.'", '."'".$subvalue."'".');';
                            }
                        }
                    } else {

                        if (is_array($items[$i][$label])) {
                            foreach ($items[$i][$label] as $sublabel => $subvalue) {
                                $subvalue = (string)$subvalue;
                                $subvalue = stripslashes($subvalue);
                                $subvalue = str_replace(array("\r","\r\n","\n",'\\',"\\"),'',$subvalue);
                                $subvalue = str_replace(array("'"),'"',$subvalue);
                                $subvalue = str_replace(array(' '),'',$subvalue);// --zwc
//                                $subvalue = str_replace('&#8203','',$subvalue);// --zwc
                                if ($label == '') {
                                    $label = '0';
                                }
                                echo 'sliders_change('.$jsi.', '.$label.', "'.$sublabel.'", '."'".$subvalue."'".');';
                            }
                        }
                    }
                }
                if ($this->mainoptions['is_safebinding'] == 'on') {
                    break;
                }
            }
        }
        ?>
                jQuery('#main-ajax-loading').css('visibility', 'hidden');
                if (dzsts_settings.is_safebinding == "on") {
                    jQuery('.master-save').remove();
                    if (dzsts_settings.addslider == "on") {
                        sliders_addslider();
                        window.currSlider_nr = -1;
                        sliders_showslider(0);
                    }
                }
                //check_global_items();
                sliders_allready();
            });
        </script>
        <?php
    }

    function post_options() {
        //// POST OPTIONS ///

        if (isset($_POST['dzsts_exportdb'])) {
            header('Content-Type: text/plain');
            header('Content-Disposition: attachment; filename="'."dzsts_backup.txt".'"');
            echo serialize($this->mainitems);
            die();
        }



        if (isset($_POST['dzsts_importdb'])) {
            //print_r( $_FILES);
            $file_data = file_get_contents($_FILES['dzsts_importdbupload']['tmp_name']);
            $this->mainitems = unserialize($file_data);


            replace_in_matrix('http://localhost/wordpress/wp-content/plugins/dzs-timelineslider/',$this->theurl,$this->mainitems);
            //replace_in_matrix('http://ammon.digitalzoomstudio.net/wp-content/themes/ammon/', THEME_URL, $this->mainitems);

            update_option($this->dbitemsname,$this->mainitems);
        }
        if (isset($_POST['dzsts_saveoptions'])) {
            $this->mainoptions = $_POST;
            update_option($this->dboptionsname,$this->mainoptions);
        }




        if (isset($_POST['dzsts_deleteslider'])) {
            //print_r($this->mainitems);
            if (isset($_GET['page']) && $_GET['page'] == $this->adminpagename) {
                unset($this->mainitems[$_POST['dzsts_deleteslider']]);
                $this->mainitems = array_values($this->mainitems);
                $this->currSlider = 0;
                //print_r($this->mainitems);
                update_option($this->dbitemsname,$this->mainitems);
            }
        }

        if (isset($_POST['dzsts_duplicateslider'])) {
            if (isset($_GET['page']) && $_GET['page'] == $this->adminpagename) {
                $aux = ($this->mainitems[$_POST['dzsts_duplicateslider']]);
                array_push($this->mainitems,$aux);
                $this->mainitems = array_values($this->mainitems);
                $this->currSlider = count($this->mainitems) - 1;
                update_option($this->dbitemsname,$this->mainitems);
            }
        }
    }

    function ajax_saveall() {
        //echo $_POST['postdata'];
        
        //---this is the main save function which saves item
        $auxarray = array();
        $mainarray = array();

        //print_r($this->mainitems);
        //parsing post data
        parse_str($_POST['postdata'],$auxarray);


        if (isset($_POST['currdb'])) {
            $this->currDb = $_POST['currdb'];
        }
        //echo 'ceva'; print_r($this->dbs);
        if ($this->currDb != 'main' && $this->currDb != '') {
            $this->dbitemsname.='-'.$this->currDb;
        }
        
        //echo $this->dbitemsname;
        if (isset($_POST['sliderid'])) {
            //print_r($auxarray);
            $mainarray = get_option($this->dbitemsname);
            foreach ($auxarray as $label => $value) {
                $aux = explode('-',$label);
                $tempmainarray[$aux[1]][$aux[2]] = $auxarray[$label];
            }
            $mainarray[$_POST['sliderid']] = $tempmainarray;
        } else {
            foreach ($auxarray as $label => $value) {
                //echo $auxarray[$label];
                $aux = explode('-',$label);
                $mainarray[$aux[0]][$aux[1]][$aux[2]] = $auxarray[$label];
            }
        }
        //echo $this->dbitemsname; print_r($_POST); print_r($this->currDb); echo isset($_POST['currdb']);
        update_option($this->dbitemsname,$mainarray);
        echo 'success - items saved';
        die();
    }
    
    
    function show_generator_export_slider() {
        ?>Please note that this feature uses the last saved data. Unsaved changes will not be exported.
        <form action="<?php echo site_url().'/wp-admin/options-general.php?page='.$this->adminpagename; ?>" method="POST">
            <input type="hidden" class="hidden" name="slidernr" value="<?php echo $_GET['slidernr']; ?>"/> 
            <input type="hidden" class="hidden" name="slidername" value="<?php echo $_GET['slidername']; ?>"/> 
            <input type="hidden" class="hidden" name="currdb" value="<?php echo $_GET['currdb']; ?>"/> 
            <input class="button-secondary" type="submit" name="dzsts_exportslider" value="Export"/>
        </form>
        <?php
    }

}

//require_once('widget.php');