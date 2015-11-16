<?php 
if ( !class_exists('myCustomFields') ) {

	class myCustomFields {
		/**
		* @var  string  $prefix  The prefix for storing custom fields in the postmeta table
		*/
		var $prefix = 'qode_';
		/**
		* @var  array  $postTypes  An array of public custom post types, plus the standard "post" and "page" - add the custom types you want to include here
		*/
		var $postTypes = array( "page", "post", "portfolio_page", "testimonials", "slides", "carousels");
		/**
		* @var  array  $customFields  Defines the custom fields available
		*/
		var $customFields =	array(
            array(
                "name"			=> "page_vertical_area_transparency",
                "title"			=> "Enable transparent left menu area on load",
                "description"	=> "",
                "float_left" 	=> "",
                "clear_after" 	=> "",
                "type"			=> "selectbox",
                "values"		=> array(
                    ""	=>	"",
                    "no"	=>	"No",
                    "yes"	=>	"Yes"
                ),
                "scope"			=>	array("page","post","portfolio_page"),
                "capability"	=> "manage_options",
                "dependency"	=> array("vertical_area" => array("yes")),
            ),
            array(
                "name"			=>	"page_vertical_area_background",
                "title"			=>	"Left menu area background",
                "description"	=>	"",
                "float_left" 	=>	"",
                "clear_after" 	=>	"",
                "type"			=>	"colorpicker",
                "scope"			=>	array("page","post","portfolio_page"),
                "capability"	=>	"manage_options",
                "dependency" 	=>  array("vertical_area" => array("yes")),
            ),
            array(
                "name"			=> "page_vertical_area_background_image",
                "title"			=> "Left menu area background image",
                "description"	=> "",
                "float_left" 	=> "",
                "clear_after" 	=> "",
                "type"			=> "image-title-image",
                "scope"			=>	array("page","post","portfolio_page"),
                "capability"	=> "manage_options",
                "dependency" 	=> array("vertical_area" => array("yes")),
            ),
            array(
                "name"			=> "page_scroll_amount_for_sticky",
                "title"			=> "Scroll amount for sticky header appear (px)",
                "description"	=> "",
                "float_left" 	=> "",
                "clear_after" 	=> "",
                "type"			=> "short-text-200",
                "scope"			=>	array("page","post","portfolio_page"),
                "capability"	=> "manage_options",
                "dependency" 	=> array("header_bottom_appearance" => array("stick","stick menu_bottom","stick_with_left_right_menu")),
            ),
			array(
				"name"			=> "header-style",
				"title"			=> "Header style",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""	=>	"",
					"light"	=>	"Light",
					"dark"	=>	"Dark"	
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			array(
				"name"			=>	"header_color_per_page",
				"title"			=>	"<br/> Initial header background color",
				"description"	=>	"",
				"float_left" 	=>	"yes",
				"clear_after" 	=>	"",
				"type"			=>	"colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=>	"manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "header_color_transparency_per_page",
				"title"			=> "Initial header background color transparency (0 to 1)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "show-page-title",
				"title"			=> "Don't show page title area",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "show-page-title-text",
				"title"			=> "Don't show title",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "checkbox",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page_title_position",
				"title"			=> "Page title position",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""		=>	"",
					"left"		=>	"Left",
					"center"	=>	"Center",
					"right"		=>	"Right"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "animate-page-title",
				"title"			=> "Animate page title",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""					=>	"",
					"no"				=>	"No animation",
					"text_right_left"	=>	"Text right to left",
					"area_top_bottom"	=>	"Title area top to bottom"	
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "title_text_shadow",
				"title"			=> "Title text shadow",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"no"	=> "no",
					"yes"	=>	"yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page_title_font_size",
				"title"			=> "Title Font size",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""			=>	"",
					"small"		=>	"Small",
					"medium"	=>	"Medium",
					"large"		=>	"Large"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page-title-color",
				"title"			=> "Title Color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page-title-background-color",
				"title"			=> "Title Background Color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "show-page-title-image",
				"title"			=> "Don't show page title image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			array(
				"name"			=> "responsive-title-image",
				"title"			=> "Responsive title image",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"no"	=>	"No",
					"yes"	=>	"Yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "fixed-title-image",
				"title"			=> "Parallax title image / Only if title image is not responsive",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""			=>	"",
					"no"		=>	"No",
					"yes"		=>	"Yes",
					"yes_zoom"	=>	"Yes, with zoom out"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "title-image",
				"title"			=> "Title image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-image",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "title-overlay-image",
				"title"			=> "Title pattern overlay image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-overlay-image",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "title-height",
				"title"			=> "Title height (px) / Only if title image is not responsive",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "text",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "separator_bellow_title",
				"title"			=> "Show separator bellow title",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""			=>	"",
					"no"		=>	"No",
					"yes"		=>	"Yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			array(
				"name"			=> "enable_breadcrumbs",
				"title"			=> "Enable breadcrumbs",
				"description"	=> "",
				"float_left" => "yes",
				"clear_after" => "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""			=>	"",
					"no"		=>	"No",
					"yes"		=>	"Yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "page_subtitle",
				"title"			=> "Page Subtitle",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	=> "",
				"type"			=> "text",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page_subtitle_color",
				"title"			=> "Subtitle Color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page_breadcrumbs_color",
				"title"			=> "Breadcrumbs Color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "title_separator_color",
				"title"			=> "Title Separator Color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "page_background_color",
				"title"			=> "Page Background Color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "content_bottom_background_color",
				"title"			=> "Content bottom background color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	 => "yes",
				"type"			=> "colorpicker",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "show-sidebar",
				"title"			=> "Choose sidebar",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>array(
					"default"	=> "Default",
					"1"			=> "Sidebar 1/3 right",
					"2"			=> "Sidebar 1/4 right",
					"3"			=> "Sidebar 1/3 left",
					"4"			=> "Sidebar 1/4 left"
				),
				"scope"			=>	array("page","post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "portfolio_show_sidebar",
				"title"			=> "Choose sidebar",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>array(
					""			=> "",
					"default"	=> "Default",
					"1"			=> "Sidebar 1/3 right",
					"2"			=> "Sidebar 1/4 right",
					"3"			=> "Sidebar 1/3 left",
					"4"			=> "Sidebar 1/4 left"
				),
				"scope"			=>	array("portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "choose-sidebar",
				"title"			=> "Choose sidebar to display",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	=> "yes",
				"type"			=> "selectbox-sidebar",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "enable_content_bottom_area",
				"title"			=> "Enable content bottom area",
				"description"	=> "",
				"float_left"	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"no"	=>	"no",
					"yes"	=>	"yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "choose_content_bottom_sidebar",
				"title"			=> "Choose content bottom sidebar to display",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox-sidebar",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "content_bottom_sidebar_in_grid",
				"title"			=> "Content bottom sidebar in grid",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"no"	=>	"No",
					"yes"	=>	"Yes"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "hide-featured-image",
				"title"			=> "Hide featured image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					"no"	=>	"No",
					"yes"	=>	"Yes"
				),
				"scope"			=>	array("post"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "show-animation",
				"title"			=> "Page animation",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""				=>	"",
					"no_animation"	=>	"No animation",
					"updown"		=>	"Up / Down",
					"fade"			=>	"Fade",
					"updown_fade"	=>	"Up/Down (In) / Fade (Out)",
					"leftright"		=>	"Left / Right"
				),
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "choose-blog-category",
				"title"			=> "Choose blog category",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox-category",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "show-posts-per-page",
				"title"			=> "Posts per page",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "enable-page-comments",
				"title"			=> "Enable comments",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "checkbox",
				"scope"			=>	array("page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "choose-portfolio-single-view",
				"title"			=> "Choose portfolio single view",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"	=> array(
					""	=>	"",
					"1"	=>	"Portfolio small images",
					"2"	=>	"Portfolio small slider",
					"5"	=>	"Portfolio big images",
					"3"	=>	"Portfolio big slider",
					"4"	=>	"Portfolio custom",
					"7"	=>	"Portfolio full width custom",
					"6"	=>	"Portfolio gallery"
				),
				"scope"			=>	array("portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "choose-number-of-portfolio-columns",
				"title"   		=> "Choose number of columns (Only for portfolio gallery view)",  
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"	=> array(
					""	=>	"",
					"2"	=>	"2 Columns",
					"3"	=>	"3 Columns",
					"4"	=>	"4 Columns"
				),
				"scope"			=>	array("portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "choose-portfolio-list-page",
				"title"			=> "Choose portfolio back link",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox-portfolio-list-page",
				"scope"			=>	array("portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
            array(
                "name"			=> "portfolio-external-link",
                "title"			=> "Portfolio External Link",
                "description"	=> "",
                "type"			=> "text",
                "scope"			=>	array("portfolio_page"),
                "capability"	=> "manage_options",
                "float_left" 	=> "",
                "clear_after" 	=> "",
                "dependency"    => ""
            ),
			array(
				"name"			=> "revolution-slider",
				"title"			=> "Enter Layer slider or Qode slider shortcode",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "text",
				"scope"			=>	array("page","post","portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "portfolio_type_masonry_style",
				"title"   		=> "Choose portfolio type for masonry style",  
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"	=> array(
					"default"				=>	"Default",
					"large_width"			=>	"Large width",
					"large_height"			=>	"Large height",
					"large_width_height"	=>	"Large width/height"
				),
				"scope"			=>	array("portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "testimonial-author",
				"title"			=> "Author",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "text",
				"scope"			=>	array("testimonials"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "testimonial-text",
				"title"			=> "Text",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "textarea",
				"scope"			=>	array("testimonials"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
//			array(
//				"name"			=> "testimonial-company_position",
//				"title"			=> "Company Position",
//				"description"	=> "",
//				"float_left" 	=> "",
//				"clear_after" 	=> "",
//				"type"			=> "text",
//				"scope"			=>	array("testimonials"),
//				"capability"	=> "manage_options",
//				"dependency" 	=> ""
//			),
			array(
				"name"			=> "testimonial_website",
				"title"			=> "Website",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "text",
				"scope"			=>	array("testimonials"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-hide-title",
				"title"			=> "Hide Slide Title",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	 => "",
				"type"			=> "checkbox",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-hide-shadow",
				"title"			=> "Don't show slide text shadow",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "checkbox",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-background-type",
				"title"			=> "Slide Background Type",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-background-type",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-image",
				"title"			=> "Slide Image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after"	 => "",
				"type"			=> "slide-image",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-video-webm",
				"title"			=> "Slide Video (webm)",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-video-input",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-video-mp4",
				"title"			=> "Slide Video (mp4)",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-video-input",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			array(
				"name"			=> "slide-video-ogv",
				"title"			=> "Slide Video (ogv)",
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-video-input",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-video-image",
				"title"			=> "Slide Video preview image",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-video-image",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-video-overlay",
				"title"			=> "Use transparent overlay over video",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-video-checkbox",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-video-overlay-image",
				"title"			=> "Slide Video overlay image (pattern)",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "upload",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-overlay-image",
				"title"			=> "Slide overlay image (pattern)",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-overlay-image",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
            array(
                "name"			=> "slide-content-animation",
                "title"			=> "Slide content entering animation (title/subtitle/text/buttons)",
                "description"	=> "",
                "float_left" 	=> "",
                "clear_after" 	=> "yes",
                "type"			=> "selectbox",
                "values"		=>	array(
                    "all_at_once"	=>	"All At Once",
                    "one_by_one"	=>	"One By One"
                ),
                "scope"			=>	array("slides"),
                "capability"	=> "manage_options",
                "dependency" 	=> ""
            ),
            array(
                "name"			=> "slide-thumbnail-animation",
                "title"			=> "Slide Graphic entering animation",
                "description"	=> "",
                "float_left" 	=> "",
                "clear_after" 	=> "",
                "type"			=> "selectbox",
                "values"		=>	array(
                    "flip"	=>	"Flip",
                    "fade"	=>	"Fade"
                ),
                "scope"			=>	array("slides"),
                "capability"	=> "manage_options",
                "dependency" 	=> ""
            ),
			array(
				"name"			=> "slide-thumbnail",
				"title"			=> "Slide Graphic",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "slide-thumbnail",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-thumbnail-link",
				"title"			=> "Slide Graphic Link",
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
//            array(
//                "name"			=> "slide-text-field-type",
//                "title"			=> "Slide Text field type",
//                "description"	=> "",
//                "float_left" 	=> "",
//                "clear_after" 	=> "",
//                "type"			=> "selectbox",
//                "values"		=>	array(
//                    "text"	    =>	"Text field",
//                    "content"	=>	"Content field"
//                ),
//                "scope"			=>	array("slides"),
//                "capability"	=> "manage_options",
//                "dependency" 	=> ""
//            ),
			array(
				"name"			=> "slide-subtitle",
				"title"			=> "Slide Subtitle",
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			array(
				"name"			=> "slide-subtitle-color",
				"title"			=> "Slide subtitle color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-font-size",
				"title"			=> "Slide subtitle font size (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-line-height",
				"title"			=> "Slide subtitle line height (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-letter-spacing",
				"title"			=> "Slide subtitle letter spacing (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-font-family",
				"title"			=> "Slide subtitle font family",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "font-family",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-font-style",
				"title"			=> "Slide subtitle font style",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"normal"	=>	"Normal",
					"italic"	=>	"Italic"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-font-weight",
				"title"			=> "Slide subtitle font weight",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"100"   =>	"100",
					"200"	=>	"200",
					"300"	=>	"300",
					"400"	=>	"400",
					"600"	=>	"600",
					"700"	=>	"700",
					"800"	=>	"800",
					"900"	=>	"900"

				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-background-color",
				"title"			=> "Slide subtitle background color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-bg-color-transparency",
				"title"			=> "Slide subtitle background transparency (between 0 and 1)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-subtitle-position",
				"title"			=> "Slide subtitle position",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"above_title"   =>	"Above title",
					"bellow_title"	=>	"Bellow title",


				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-text",
				"title"			=> "Slide text",
				"description"	=> "",
				"float_left"	=> "",
				"clear_after" 	=> "",
				"type"			=> "textarea",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> ""
			),
			array(
				"name"			=> "slide-title-color",
				"title"			=> "Slide title color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-font-size",
				"title"			=> "Slide title font size (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-line-height",
				"title"			=> "Slide title line height (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-letter-spacing",
				"title"			=> "Slide title letter spacing (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-font-family",
				"title"			=> "Slide title font family",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "font-family",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-font-style",
				"title"			=> "Slide title font style",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"normal"	=>	"Normal",
					"italic"	=>	"Italic"	
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-font-weight",
				"title"			=> "Slide title font weight",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"100"   =>	"100",
					"200"	=>	"200",
					"300"	=>	"300",	
					"400"	=>	"400",	
					"600"	=>	"600",	
					"700"	=>	"700",
					"800"	=>	"800",
					"900"	=>	"900"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-text-transform",
				"title"			=> "Slide title text transform",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					'' 			=> '',
					'none' 		=> 'None',
					'capitalize' => 'Capitalize',
					'uppercase' => 'Upercase',
					'lowercase' => 'Lowercase'
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-background-color",
				"title"			=> "Slide title background color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-title-bg-color-transparency",
				"title"			=> "Slide title background transparency (between 0 and 1)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-text-color",
				"title"			=> "Slide text color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-text-font-size",
				"title"			=> "Slide text font size (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-text-line-height",
				"title"			=> "Slide text line height (px)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-text-font-family",
				"title"			=> "Slide text font family",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "font-family",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-text-font-style",
				"title"			=> "Slide text font style",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"normal"	=>	"Normal",
					"italic"	=>	"Italic"	
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-text-font-weight",
				"title"			=> "Slide text font weight",
				"description"	=> "",
				"float_left" => "yes",
				"clear_after" => "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"200"	=>	"200",
					"300"	=>	"300",	
					"400"	=>	"400",	
					"600"	=>	"600",	
					"700"	=>	"700",
					"800"	=>	"800",
					"900"	=>	"900"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-separator-after-title",
				"title"			=> "Separator after title",
				"description"	=> "",
				"float_left" => "",
				"clear_after" => "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"yes"	=>  "Yes",
					"no"	=>  "No"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-separator-width",
				"title"			=> "Separator width (from 0% to 100%. Enter just number)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> "",
			),
			array(
				"name"			=> "slide-separator-color",
				"title"			=> "Separator color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> "",
			),
			array(
				"name"			=> "slide-separator-transparency",
				"title"			=> "Separator transparency (between 0 and 1)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> "",
			),
			array(
				"name"			=> "slide-border-around-title",
				"title"			=> "Border around title",
				"description"	=> "",
				"float_left" => "",
				"clear_after" => "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"yes"	=>  "Yes",
					"no"	=>  "No"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-border-around-title-color",
				"title"			=> "Title border color",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> "",
			),
			array(
				"name"			=> "slide-border-around-title-transparency",
				"title"			=> "Title border transparency (between 0 and 1)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	=> "",
			),
			array(
				"name"			=> "slide-separate-text-graphic",
				"title"			=> "Separate graphic and text positioning settings",
				"description"	=> "If 'no' is selected, use only setting for text positioning",
				"float_left" 	=> "no",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""		=>	"",
					"no"	=>	"No",
					"yes"	=>	"Yes"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-graphic-alignment",
				"title"			=> "Slide Graphic Alignment",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=>	array(
					""			=>	"",
					"left"		=>	"Left",
					"center"	=>	"Center",
					"right"		=>	"Right"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-content-alignment",
				"title"			=> "Slide Text Alignment",
				"description"	=> "",
				"float_left" => "yes",
				"clear_after" => "yes",
				"type"			=> "selectbox",
				"values"		=>	array(
					""			=>	"",
					"left"		=>	"Left",
					"center"	=>	"Center",
					"right"		=>	"Right"
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-graphic-width",
				"title"			=> "Graphic Width (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" 		=> "short-input",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-graphic-top",
				"title"			=> "Graphic From Top (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-graphic-left",
				"title"			=> "Graphic From Left (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-graphic-bottom",
				"title"			=> "Graphic From Bottom (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-graphic-right",
				"title"			=> "Graphic From Right (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-content-width",
				"title"			=> "Text Width (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	 => "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" => "short-input",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-content-top",
				"title"			=> "Text From Top (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after"	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-content-left",
				"title"			=> "Text From Left (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-content-bottom",
				"title"			=> "Text From Bottom (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "slide-content-right",
				"title"			=> "Text From Right (%)",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-button-label",
				"title"			=> "Button label 1",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" 		=> "short-input",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-button-label2",
				"title"			=> "Button label 2",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" 		=> "short-input",
				"dependency"	=> ""
			),
			array(
				"name"			=> "slide-button-link",
				"title"			=> "Button link 1",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" 		=> "short-input",
				"dependency"	=> ""
			),
			array(
				"name"			=> "slide-button-link2",
				"title"			=> "Button link 2",
				"description"	=> "",
				"float_left" 	=> "yes",
				"clear_after" 	=> "yes",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" 		=> "short-input",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-header-style",
				"title"			=> "Header style for this slide",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""	=>	"",
					"light"	=>	"Light",
					"dark"	=>	"Dark"	
				),
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency"	 => ""
			),
			array(
				"name"			=> "slide-navigation-color",
				"title"			=> "Slide navigation color",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "colorpicker",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "slide-anchor-button",
				"title"			=> "Scroll to section (Example #contact)",
				"description"	=> "Add anchor id here and you will add down arrow that scrolls to some section on your page",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "short-text-200",
				"scope"			=>	array("slides"),
				"capability"	=> "manage_options",
				"class" 		=> "short-input",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "carousel-image",
				"title"			=> "Carousel Image (Min width needs to be 220px)",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "image-title-image",
				"scope"			=>	array("carousels"),
				"capability"	=> "manage_options",
				"dependency" => ""
			),
			array(
				"name"			=> "carousel-hover-image",
				"title"			=> "Carousel Hover Image (Min width needs to be 220px)",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "carousel-image",
				"scope"			=>	array("carousels"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "carousel-item-link",
				"title"			=> "Link",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "",
				"scope"			=>	array("carousels"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "carousel-item-target",
				"title"			=> "Target",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "selectbox",
				"values"		=> array(
					""			=>	"",
					"_self"		=>	"Self",
					"_blank"	=>	"Blank",
					"_parent"	=>	"Parent"	
				),
				"scope"			=>	array("carousels"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),
			array(
				"name"			=> "portfolio-image-gallery",
				"title"			=> "Portfolio Gallery",
				"description"	=> "",
				"float_left" 	=> "",
				"clear_after" 	=> "",
				"type"			=> "hidden",
				"scope"			=>	array("portfolio_page"),
				"capability"	=> "manage_options",
				"dependency" 	=> ""
			),

		);
		
		function __construct() {
			add_action( 'admin_menu', array( &$this, 'createCustomFields' ) );
			add_action( 'save_post', array( &$this, 'saveCustomFields' ), 1, 2 );
			// Comment this line out if you want to keep default custom fields meta box
			add_action( 'do_meta_boxes', array( &$this, 'removeDefaultCustomFields' ), 10, 3 );
		}
		/**
		* Remove the default Custom Fields meta box
		*/
		function removeDefaultCustomFields( $type, $context, $post ) {
			foreach ( array( 'normal', 'advanced', 'side' ) as $context ) {
				foreach ( $this->postTypes as $postType ) {
					remove_meta_box( 'postcustom', $postType, $context );
				}
			}
		}
		/**
		* Create the new Custom Fields meta box
		*/
		function createCustomFields() {
			if ( function_exists( 'add_meta_box' ) ) {
				foreach ( $this->postTypes as $postType ) {
					add_meta_box( 'my-custom-fields', 'Qode Custom Fields', array( &$this, 'displayCustomFields' ), $postType, 'normal', 'high' );
					if($postType != "testimonials" && $postType != "slides" && $postType != "carousels") {
						add_meta_box( 'my-custom-portfolio', 'Qode Portfolio', array( &$this, 'displayCustomPortfolio' ), 'portfolio_page', 'normal', 'high' );
						add_meta_box( 'my-custom-seo', 'Qode SEO Fields', array( &$this, 'displayCustomSeo' ), $postType, 'normal', 'high' );
					}
				}
			}
		}
		/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomFields() {
			global $post;
			global $qode_options_proya;
			global $fontArrays;
			?>
			<div class="form-wrap">
				<?php
				wp_nonce_field( 'my-custom-fields', 'my-custom-fields_wpnonce', false, true );
				foreach ( $this->customFields as $customField ) {
					// Check scope
					$scope = $customField[ 'scope' ];
					$dependency = $customField[ 'dependency' ];
					$output = false;
					foreach ( $scope as $scopeItem ) {
						switch ( $scopeItem ) {
							default: {
								if ( $post->post_type == $scopeItem ){
									if($dependency != ""){
										foreach ( $dependency as $dependencyKey => $dependencyValue ) {
											foreach ( $dependencyValue as $dependencyVal ) {
												if(isset($qode_options_proya[$dependencyKey]) && $qode_options_proya[$dependencyKey] == $dependencyVal){
													$output = true;
													break;
												}
											}
										}
									}else{
										$output = true;
									}
								}else{
									break;
								}
							}
						}
						if ( $output ) break;
					}
					// Check capability
					if ( !current_user_can( $customField['capability'], $post->ID ) )
						$output = false;
					// Output if allowed
					if ( $output ) { ?>
							<?php
							switch ( $customField[ 'type' ] ) {
								case "checkbox": {
									// Checkbox
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '</div>';
									break;
								}
								case "selectbox": {
									// Selectbox
									if ( $customField[ 'float_left' ] == 'yes' ) {$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left . ' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
									?>
										<?php foreach ($customField['values'] as $valuesKey => $valuesValue) { ?>
											<option value="<?php echo $valuesKey; ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == $valuesKey ) { ?> selected="selected" <?php } ?>><?php echo $valuesValue; ?></option>
										<?php } ?>
                                    
									<?php 
									echo '</select>'; 
									echo '</div>';
									break;
								}
								case "selectbox-category": {
									$categories = get_categories(); 
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
										echo '<option value=""></option>';
										foreach($categories as $category) :
											echo '<option value="'. $category->term_id .'"';
											if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == $category->term_id ) { echo 'selected="selected"';}
											echo '>';
											echo $category->name; 
											?>&nbsp;&nbsp;&nbsp;<?php 
											echo '</option>';
										
										endforeach;
									echo '</select>';
									echo '</div>';
									break;
								}
								case "selectbox-portfolio-list-page": {
									// Selectbox
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									
									$args = array(
										'show_option_none' => ' ',
										'option_none_value' => '',
										'selected' => get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ),
										'name' => $this->prefix . $customField[ 'name' ]
									);
									wp_dropdown_pages($args);
									echo '</div>';
									break;
								}
								case "image-title-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="' . $this->prefix . $customField[ 'name' ] .'" name="' . $this->prefix . $customField[ 'name' ] . '" class="title_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									break;
								}
								case "image-title-overlay-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="title_overlay_image" name="' . $this->prefix . $customField[ 'name' ] . '" class="title_overlay_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									break;
								}
								case "slide-background-type": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;&nbsp;&nbsp;';
									echo '<label for="image_background" style="display:inline;"><b>Image</b></label>&nbsp;';
									echo '<input class="slide_background_type" data-type="image_type" type="radio" name="' . $this->prefix . $customField['name'] . '" id="image_background" value="image"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "image" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '<label for="video_background" style="display:inline;"><b>Video</b></label>&nbsp;';
									echo '<input class="slide_background_type" data-type="video_type" type="radio" name="' . $this->prefix . $customField['name'] . '" id="video_background" value="video"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "video" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '</div>';
									break;
								}
								
								case "slide-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<div class="image_type">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="slide_image" name="' . $this->prefix . $customField[ 'name' ] . '" class="slide_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									echo '</div>';
									break;
								}
								case "slide-thumbnail": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="slide_thumbnail" name="' . $this->prefix . $customField[ 'name' ] . '" class="slide_thumbnail" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									break;
								}
							
								case "slide-video-input": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<div class="video_type">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '</div>';
									echo '</div>';
									break;
								}
								case "slide-video-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<div class="video_type">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="slide_video_image" name="' . $this->prefix . $customField[ 'name' ] . '" class="slide_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									echo '</div>';
									break;
								}
								case "slide-video-overlay-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<div class="video_type">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="slide_video_overlay_image" name="' . $this->prefix . $customField[ 'name' ] . '" class="slide_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									echo '</div>';
									break;
								}
								case "slide-video-checkbox": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<div class="video_type">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<input type="checkbox" name="' . $this->prefix . $customField['name'] . '" id="' . $this->prefix . $customField['name'] . '" value="yes"';
									if ( get_post_meta( $post->ID, $this->prefix . $customField['name'], true ) == "yes" )
										echo ' checked="checked"';
									echo '" style="width: auto;" />';
									echo '</div>';
									echo '</div>';
									break;
								}
								case "font-family": {
									// Selectbox
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' ">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '"> ';
									?>
										<option value="" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == "-1" ) { ?> selected="selected" <?php } ?>>Default</option>
										<?php foreach($fontArrays as $fontArray) { ?>
											<option <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == str_replace(' ', '+', $fontArray["family"])) { echo "selected='selected'"; } ?>  value="<?php echo str_replace(' ', '+', $fontArray["family"]); ?>"><?php echo  $fontArray["family"]; ?></option>
										<?php } ?>
									<?php 
									echo '</select>';
									echo '</div>';
									break;
								}
								case "selectbox-sidebar": {
									// Selectbox
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									
									echo '<select name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '">';
									echo '<option value=""></option>';
									foreach ( $GLOBALS['wp_registered_sidebars'] as $sidebar ) {
										if(isUserMadeSidebar(ucwords($sidebar['name']))){
									?>											
										 <option value="<?php echo ucwords( $sidebar['id'] ); ?>" <?php if (get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) == ucwords( $sidebar['id'] ) ) { ?> selected="selected" <?php } ?>>
												<?php echo ucwords( $sidebar['name'] ); ?>
										 </option>	 
									<?php	}
										}
									echo '</select>';
									echo '</div>';
									break;
								}
								case "carousel-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="carousel-image" name="' . $this->prefix . $customField[ 'name' ] . '" class="title_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									break;
								}
								case "slide-overlay-image": {
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<div class="image_type">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'" style="display:inline;"><b>' . $customField[ 'title' ] . '</b></label>&nbsp;&nbsp;';
									echo '<div class="image_holder"><input type="text" id="' . $this->prefix . $customField[ 'name' ] . '" name="' . $this->prefix . $customField[ 'name' ] . '" class="slide_image" value="'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ).'" /><input class="upload_button" type="button" value="Upload file"></div>';
									echo '</div>';
									echo '</div>';
									break;
								}
								case "datepicker": {
									// Datepicker
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" class="datepicker" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '</div>';
									break;
								}
								case "colorpicker": {
									//Colorpicker
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' colorpicker_input">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<div class="colorSelector"><div style="background-color:'.htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) .'"></div></div>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" size="10" maxlength="10" />';
									echo '</div>';
									break;
								}
								case "textarea":
								case "wysiwyg": {
									// Text area
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<textarea name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" columns="30" rows="3">' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '</textarea>';
									// WYSIWYG
									if ( $customField[ 'type' ] == "wysiwyg" ) { ?>
										<script type="text/javascript">
											jQuery( document ).ready( function() {
												jQuery( "<?php echo $this->prefix . $customField[ 'name' ]; ?>" ).addClass( "mceEditor" );
												if ( typeof( tinyMCE ) == "object" && typeof( tinyMCE.execCommand ) == "function" ) {
													tinyMCE.execCommand( "mceAddControl", false, "<?php echo $this->prefix . $customField[ 'name' ]; ?>" );
												}
											});
										</script>
									<?php }
									echo '</div>';
									break;
								}
								case "short-text-200": {
									// Plain text field
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' short_text_200">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '</div>';
									break;
								}
								case "hidden": {

									break;
								}
								default: {
									// Plain text field
									if ( $customField[ 'float_left' ] == 'yes'){$float_left = 'float_left';} else {$float_left = '';}
									echo '<div class="form-field '. $float_left .' form-required">';
									echo '<label for="' . $this->prefix . $customField[ 'name' ] .'"><b>' . $customField[ 'title' ] . '</b></label>';
									echo '<input type="text" name="' . $this->prefix . $customField[ 'name' ] . '" id="' . $this->prefix . $customField[ 'name' ] . '" value="' . htmlspecialchars( get_post_meta( $post->ID, $this->prefix . $customField[ 'name' ], true ) ) . '" />';
									echo '</div>';
									break;
								}
							}
							?>
							<?php if ( $customField[ 'description' ] ) echo '<p>' . $customField[ 'description' ] . '</p>'; ?>
							<?php if ( $customField[ 'clear_after' ] == 'yes' ) echo '<div class="clear"></div>'; ?>
						
					<?php
					}
				} ?>
			</div>
			<?php
		}	/**
		* Display the new Custom Fields meta box
		*/
		function displayCustomSeo() {
			global $post;
			?>
			<div class="form-wrap">
			<div class="input form-field">
					<?php
					$seo_title = get_post_meta( $post->ID, $this->prefix . 'seo_title', true );
					?>
				<label for="seo_title"><b>SEO Title</b></label>
				<input id="seo_title" class="seo_title" type="text" value="<?php echo $seo_title; ?>" name="seo_title">
			</div>
			<div class="input form-field">
					<?php
					$seo_keywords = get_post_meta( $post->ID, $this->prefix . 'seo_keywords', true );
					?>
				<label for="seo_keywords"><b>SEO Keywords</b></label>
				<input id="seo_keywords" class="seo_keywords" type="text" value="<?php echo $seo_keywords; ?>" name="seo_keywords">
			</div>		
			<div class="input form-field">
					<?php
					$seo_description = get_post_meta( $post->ID, $this->prefix . 'seo_description', true );
					?>
				<label for="seo_description"><b>SEO Description</b></label>
				<textarea id="seo_description" class="seo_description" name="seo_description"><?php echo $seo_description; ?></textarea>
			</div>		
					

					

			
		</div>
			<?php
		}
		
		function displayCustomPortfolio() {
			global $post;
			?>
			<div class="form-wrap">
					<div class="hidden_portfolio_images">
						<div class="input form-field">
							<label><b>Order number</b></label>
							<input class="ordernumber" type="text" id="portfolioimgordernumber_x" name="portfolioimgordernumber_x" size="10" />
						</div>
						<div class="input form-field">
							<label for=""><b>Image/Video title (only for gallery layout - Portfolio Style 6)</b></label>
							<input type="text" name="portfoliotitle_x" id="portfoliotitle_x" class="portfoliotitle" />
						</div>
						<div class="input form-field">
							<label for=""><b>Image</b></label>
							<input type="text" id="portfolioimg_x" name="portfolioimg_x" class="portfolioimg" />
							<input class="upload_button" type="button" value="Upload file">
						</div>
						<div class="input form-field">
							<label for=""><b>Video type</b></label>
							<select name="portfoliovideotype_x" id="portfoliovideotype_x" class="portfoliovideotype">  
								<option value=""></option>
								<option value="youtube">Youtube</option>
								<option value="vimeo">Vimeo</option>
								<option value="self">Self hosted</option> 
							</select>
						</div>
						<div class="input form-field">
							<label for=""><b>Video ID</b></label>
							<input type="text" name="portfoliovideoid_x" id="portfoliovideoid_x" class="portfoliovideoid" />
						</div>
						<div class="input form-field">
							<label for=""><b>Video image</b></label>
							<input type="text" id="portfoliovideoimage_x" name="portfoliovideoimage_x" class="portfolio_self_video portfolioimg" />
							<input class="upload_button" type="button" value="Upload file">
						</div>
						<div class="input form-field">
							<label for=""><b>Video webm</b></label>
							<input type="text" name="portfoliovideowebm_x" id="portfoliovideowebm_x" class="portfolio_self_video" />
						</div>
						<div class="input form-field">
							<label for=""><b>Video mp4</b></label>
							<input type="text" name="portfoliovideomp4_x" id="portfoliovideomp4_x" class="portfolio_self_video" />
						</div>
						<div class="input form-field">
							<label for=""><b>Video ogv</b></label>
							<input type="text" name="portfoliovideoogv_x" id="portfoliovideoogv_x" class="portfolio_self_video" />
						</div>
					</div>
					
					<div class="hidden_portfolio">
						<div class="input form-field">
							<label><b>Order number</b></label>
							<input class="ordernumber" type="text" id="optionlabelordernumber_x" name="optionlabelordernumber_x" size="10" />
						</div>
						<div class="input form-field">
							<label for=""><b>Option Label</b></label>
							<input type="text" id="optionLabel_x" name="optionLabel_x" />
						</div>
						<div class="input form-field">
							<label for=""><b>Option Value</b></label>
							<textarea rows="8" cols="40" id="optionValue_x" name="optionValue_x"></textarea>
						</div>						
						<div class="input form-field">
							<label for=""><b>Option Url</b></label>
							<input type="text" id="optionUrl_x" name="optionUrl_x" />
						</div>	
						
					</div>
					
<div class="add_portfolio_images">
<h3>Portfolio Images (multiple upload)</h3>
<div class="add_portfolio_images_inner">

<button class="qode-gallery-upload button button-primary button-large">Browse</button>
<ul class="qode-gallery-images-holder clearfix">
<?php
$portfolio_image_gallery_val = get_post_meta( $post->ID, $this->prefix . 'portfolio-image-gallery', true );
if($portfolio_image_gallery_val!='' ) $portfolio_image_gallery_array=explode(',',$portfolio_image_gallery_val);
				
if(isset($portfolio_image_gallery_array) && count($portfolio_image_gallery_array)!=0):

	foreach($portfolio_image_gallery_array as $gimg_id):

		$gimage_wp = wp_get_attachment_image_src($gimg_id,'thumbnail', true);
		echo '<li class="qode-gallery-image-holder"><img src="'.$gimage_wp[0].'"/></li>';
	
	endforeach;
	
endif;
?>
</ul>
<input type="hidden" value="<?php echo $portfolio_image_gallery_val; ?>" id="qode_portfolio-image-gallery" name="qode_portfolio-image-gallery">	
</div>
<h3>Portfolio Images/Videos (single upload)</h3>
<div class="add_portfolio_images_inner">
<?php
$no = 1;
$portfolio_images = get_post_meta( $post->ID, $this->prefix . 'portfolio_images', true );
if (count($portfolio_images)>1) {
	usort($portfolio_images, "comparePortfolioImages");
}
while (isset($portfolio_images[$no-1])) {
	$portfolio_image = $portfolio_images[$no-1];
?>
				
<div class="portfolio_image" rel="<?php echo $no; ?>" style="display: block;">
<div class="input form-field">
<label for="portfolioimgordernumber_<?php echo $no; ?>"><b>Order number</b></label>
<input id="portfolioimgordernumber_<?php echo $no; ?>" type="text" name="portfolioimgordernumber[]" value="<?php echo isset($portfolio_image['portfolioimgordernumber'])?stripslashes($portfolio_image['portfolioimgordernumber']):""; ?>" class="ordernumber" />
</div>
<div class="input form-field">
<label for="portfoliotitle_<?php echo $no; ?>"><b>Image/Video title (only for gallery layout - Portfolio Style 6)</b></label>
<input id="portfoliotitle_<?php echo $no; ?>" type="text" name="portfoliotitle[]" value="<?php echo isset($portfolio_image['portfoliotitle'])?stripslashes($portfolio_image['portfoliotitle']):""; ?>" class="portfoliotitle" />
</div>
<div class="input form-field">
<label for="portfolioimg_<?php echo $no; ?>"><b>Image</b></label>
<input id="portfolioimg_<?php echo $no; ?>" type="text" name="portfolioimg[]" value="<?php echo stripslashes($portfolio_image['portfolioimg']); ?>" class="portfolioimg" />
<input class="upload_button" type="button" value="Upload file">
</div>
<div class="input form-field">
	<label for="portfoliovideotype_<?php echo $no; ?>"><b>Video type</b></label>
	<select name="portfoliovideotype[]" id="portfoliovideotype_<?php echo $no; ?>" class="portfoliovideotype">  
		<option value=""></option>
		<option <?php if(isset($portfolio_image['portfoliovideotype'])){ if($portfolio_image['portfoliovideotype'] == "youtube") echo "selected='selected'"; } ?> value="youtube">Youtube</option>
		<option <?php if(isset($portfolio_image['portfoliovideotype'])){ if($portfolio_image['portfoliovideotype'] == "vimeo") echo "selected='selected'"; } ?> value="vimeo">Vimeo</option>
		<option <?php if(isset($portfolio_image['portfoliovideotype'])){ if($portfolio_image['portfoliovideotype'] == "self") echo "selected='selected'"; } ?> value="self">Self hosted</option>
	</select>
</div>
<div class="input form-field">
<label for="portfoliovideoid_<?php echo $no; ?>"><b>Video ID</b></label>
<input id="portfoliovideoid_<?php echo $no; ?>" type="text" name="portfoliovideoid[]" value="<?php echo isset($portfolio_image['portfoliovideoid'])?stripslashes($portfolio_image['portfoliovideoid']):""; ?>" class="portfoliovideoid" />
</div>
<div class="input form-field">
	<label for="portfoliovideoimage_<?php echo $no; ?>"><b>Video image</b></label>
	<input type="text" id="portfoliovideoimage_<?php echo $no; ?>" name="portfoliovideoimage[]" value="<?php echo stripslashes($portfolio_image['portfoliovideoimage']); ?>" class="portfolio_self_video portfolioimg" />
	<input class="upload_button" type="button" value="Upload file">
</div>
<div class="input form-field">
	<label for="portfoliovideowebm_<?php echo $no; ?>"><b>Video webm</b></label>
	<input type="text" id="portfoliovideowebm_<?php echo $no; ?>" name="portfoliovideowebm[]" value="<?php echo isset($portfolio_image['portfoliovideowebm'])?stripslashes($portfolio_image['portfoliovideowebm']):""; ?>" class="portfolio_self_video" />
</div>
<div class="input form-field">
	<label for="portfoliovideomp4_<?php echo $no; ?>"><b>Video mp4</b></label>
	<input type="text" id="portfoliovideomp4_<?php echo $no; ?>" name="portfoliovideomp4[]" value="<?php echo isset($portfolio_image['portfoliovideomp4'])?stripslashes($portfolio_image['portfoliovideomp4']):""; ?>" class="portfolio_self_video" />
</div>
<div class="input form-field">
	<label for="portfoliovideoogv_<?php echo $no; ?>"><b>Video ogv</b></label>
	<input type="text" id="portfoliovideoogv_<?php echo $no; ?>" name="portfoliovideoogv[]" value="<?php echo isset($portfolio_image['portfoliovideoogv'])?stripslashes($portfolio_image['portfoliovideoogv']):""; ?>" class="portfolio_self_video" />
</div>
<a class="remove_image" href="/" onclick="javascript: return false;">Remove portfolio image/video</a>
</div>

					
			
<?php
	$no++;
}
?>
				<a class="add_image" onclick="javascript: return false;" href="/" >Add portfolio image/video</a>
</div>
</div>
					
<div class="add_portfolios">
<h3>Option Items</h3>
<div class="add_portfolios_inner">
<?php
$no = 1;
$portfolios = get_post_meta( $post->ID, $this->prefix . 'portfolios', true );
if (count($portfolios)>1) {
	usort($portfolios, "comparePortfolioOptions");
}
while (isset($portfolios[$no-1])) {
	$portfolio = $portfolios[$no-1];
?>
				
<div class="portfolio" rel="<?php echo $no; ?>" style="display: block;">
<div class="input form-field">
<label for="optionlabelordernumber_<?php echo $no; ?>"><b>Order number</b></label>
<input id="optionlabelordernumber_<?php echo $no; ?>" type="text" name="optionlabelordernumber[]" value="<?php echo isset($portfolio['optionlabelordernumber'])?stripslashes($portfolio['optionlabelordernumber']):""; ?>" class="ordernumber" />
</div>
<div class="input form-field">
<label for="optionLabel_<?php echo $no; ?>"><b>Option Label</b></label>
<input id="optionLabel_<?php echo $no; ?>" type="text" name="optionLabel[]" value="<?php echo stripslashes($portfolio['optionLabel']); ?>">
</div>
<div class="input form-field">
<label for="optionValue_<?php echo $no; ?>"><b>Option Value</b></label>
<textarea id="optionValue_<?php echo $no; ?>" name="optionValue[]" cols="40" rows="8"><?php echo stripslashes($portfolio['optionValue']); ?></textarea>
</div>
<div class="input form-field">
<label for="optionUrl_<?php echo $no; ?>"><b>Option Url</b></label>
<input id="optionUrl_<?php echo $no; ?>" type="text" name="optionUrl[]" value="<?php echo stripslashes($portfolio['optionUrl']); ?>">
</div>

<a class="remove_option" href="/" onclick="javascript: return false;">Remove portfolio option</a>
</div>


					
			
<?php
	$no++;
}
?>
				<a class="add_option" onclick="javascript: return false;" href="/" >Add portfolio option</a>
</div>
</div>
			<div class="input form-field">
<?php
$portfolio_date = get_post_meta( $post->ID, $this->prefix . 'portfolio_date', true );
?>
				<label for="portfolio_date<?php echo $no; ?>"><b>Portfolio Date</b></label>
				<input id="portfolio_date" class="datepicker" type="text" value="<?php echo $portfolio_date; ?>" name="portfolio_date">
			</div>
		</div>
			<?php
		}
		
		/**
		* Save the new Custom Fields values
		*/
		function saveCustomFields( $post_id, $post ) {
			if ( !isset( $_POST[ 'my-custom-fields_wpnonce' ] ) || !wp_verify_nonce( $_POST[ 'my-custom-fields_wpnonce' ], 'my-custom-fields' ) )
				return;
			if ( !current_user_can( 'edit_post', $post_id ) )
				return;
			if ( ! in_array( $post->post_type, $this->postTypes ) )
				return;
			foreach ( $this->customFields as $customField ) {
				if ( current_user_can( $customField['capability'], $post_id ) ) {

					if ( isset( $_POST[ $this->prefix . $customField['name'] ] ) && trim( $_POST[ $this->prefix . $customField['name'] ] !== '') ) {

						$value = $_POST[ $this->prefix . $customField['name'] ];
						// Auto-paragraphs for any WYSIWYG
						if ( $customField['type'] == "wysiwyg" ) $value = wpautop( $value );
						update_post_meta( $post_id, $this->prefix . $customField[ 'name' ], $value );
					} else {
						delete_post_meta( $post_id, $this->prefix . $customField[ 'name' ] );
					}
				}
			}
			
			
			$sliders = false;
			if (isset($_POST['title'])) {
			if (is_array($_POST['title'])) {
			foreach ($_POST['title'] as $key => $value) {
				$sliders_val[$key] = array('unique'=>$_POST['unique'][$key]);
				foreach ($_POST['title'][$key] as $key1 => $value1) {
					$sliders_val[$key][$key1] = array('ordernumber'=>$_POST['ordernumber'][$key][$key1],'toplabel'=>$_POST['toplabel'][$key][$key1],'title'=>$value1,'img'=>$_POST['img'][$key][$key1],'link'=>$_POST['link'][$key][$key1],'linklabel'=>$_POST['linklabel'][$key][$key1],'description'=>$_POST['description'][$key][$key1],'descposition'=>$_POST['descposition'][$key][$key1],'color'=>$_POST['color'][$key][$key1],'titlecolor'=>$_POST['titlecolor'][$key][$key1],'linkcolor'=>$_POST['linkcolor'][$key][$key1]);
					$sliders = true;
				}
			}
			}
			}
			
			 if ( current_user_can( $customField['capability'], $post_id ) ) {
						if ($sliders) {
								update_post_meta( $post_id, $this->prefix . 'sliders', $sliders_val );
						} else {
								delete_post_meta( $post_id, $this->prefix . 'sliders' );
						}
				}
				
			$portfolios = false;
			if (isset($_POST['optionLabel'])) {
			foreach ($_POST['optionLabel'] as $key => $value) {
					$portfolios_val[$key] = array('optionLabel'=>$value,'optionValue'=>$_POST['optionValue'][$key],'optionUrl'=>$_POST['optionUrl'][$key],'optionlabelordernumber'=>$_POST['optionlabelordernumber'][$key]); 
					$portfolios = true;
				
			}
			}
			
			
			 if ( current_user_can( $customField['capability'], $post_id ) ) {
						if ($portfolios) {
								update_post_meta( $post_id, $this->prefix . 'portfolios', $portfolios_val );
						} else {
								delete_post_meta( $post_id, $this->prefix . 'portfolios' );
						}
				}
				
			$portfolio_images = false;
			if (isset($_POST['portfolioimg'])) {
			foreach ($_POST['portfolioimg'] as $key => $value) {
					$portfolio_images_val[$key] = array('portfolioimg'=>$_POST['portfolioimg'][$key],'portfoliotitle'=>$_POST['portfoliotitle'][$key],'portfolioimgordernumber'=>$_POST['portfolioimgordernumber'][$key], 'portfoliovideotype'=>$_POST['portfoliovideotype'][$key], 'portfoliovideoid'=>$_POST['portfoliovideoid'][$key], 'portfoliovideoimage'=>$_POST['portfoliovideoimage'][$key], 'portfoliovideowebm'=>$_POST['portfoliovideowebm'][$key], 'portfoliovideomp4'=>$_POST['portfoliovideomp4'][$key], 'portfoliovideoogv'=>$_POST['portfoliovideoogv'][$key] );
					$portfolio_images = true;
			}
			}
			
			
			 if ( current_user_can( $customField['capability'], $post_id ) ) {
						if ($portfolio_images) {
								update_post_meta( $post_id, $this->prefix . 'portfolio_images', $portfolio_images_val );
						} else {
								delete_post_meta( $post_id, $this->prefix . 'portfolio_images' );
						}
				}
				

			$portfolio_date = "";
			if (isset($_POST['portfolio_date']))
				$portfolio_date = $_POST['portfolio_date'];
			 if ( current_user_can( $customField['capability'], $post_id ) ) {
						if ($portfolio_date) {
								update_post_meta( $post_id, $this->prefix . 'portfolio_date', $portfolio_date );
						} else {
								delete_post_meta( $post_id, $this->prefix . 'portfolio_date' );
						}
				}
				
			$seo_title="";	
			if(isset($_POST['seo_title'])){	
				$seo_title = $_POST['seo_title'];
			}
			$seo_description = "";
			if(isset($_POST['seo_description'])){	
				$seo_description = $_POST['seo_description'];
			}
			$seo_keywords = "";
			if(isset($_POST['seo_keywords'])){	
				$seo_keywords = $_POST['seo_keywords'];
			}
			if ( current_user_can( $customField['capability'], $post_id ) ) {
				if ($seo_title) {
						update_post_meta( $post_id, $this->prefix . 'seo_title', $seo_title );
				} else {
						delete_post_meta( $post_id, $this->prefix . 'seo_title' );
				}
				if ($seo_description) {
					update_post_meta( $post_id, $this->prefix . 'seo_description', $seo_description );
				} else {
					 delete_post_meta( $post_id, $this->prefix . 'seo_description' );
				}
				if ($seo_keywords) {
					update_post_meta( $post_id, $this->prefix . 'seo_keywords', $seo_keywords );
				} else {
					delete_post_meta( $post_id, $this->prefix . 'seo_keywords' );
				}
			 }
		}
		
		

		

	} // End Class

} // End if class exists statement

// Instantiate the class
if ( class_exists('myCustomFields') ) {
	$myCustomFields_var = new myCustomFields();
}
?>