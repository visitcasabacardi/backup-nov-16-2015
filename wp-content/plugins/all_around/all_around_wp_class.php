<?php

class all_around_wrapper_admin {
	public $main_object, $wrapper_class_file, $plugin_code_name, $plugin_name, $plugin_version, $base_plugin_file, $wp_version, $uploader_type, $ajax_receiver, $ajax_receiver_full_path, $ajax_action_param, $ajax_save_handler, $ajax_preview_handler;

	function __construct($base_plugin_file, $code_name, $name, $version) {
		require_once dirname( __FILE__ ) . '/all_around_main_class.php';

		define('all_around_ABSPATH', ABSPATH);
		
		$this->wrapper_class_file = __FILE__;
		$this->base_plugin_file = $base_plugin_file;
		$this->plugin_code_name=$code_name;
		$this->plugin_name=$name;
		$this->plugin_version=$version;
		$this->wp_version = get_bloginfo('version');
		$version35=all_around_main_class::version_to_number('3.5');
		$current_version=all_around_main_class::version_to_number($this->wp_version);
		if ($current_version>=$version35) $this->uploader_type=2;
		else $this->uploader_type=1;
		$this->ajax_receiver_full_path=$this->get_site_url().'/wp-admin/admin-ajax.php';
		$this->ajax_receiver='admin-ajax.php';
		$this->ajax_action_param='action';
		$this->ajax_save_handler='all_around_save';
		$this->ajax_preview_handler='all_around_preview';

		if( $this->is_admin() ) {
			$mode='backend';
		} else {
			$mode='frontend';
		}

		$this->main_object = new all_around_main_class($this, __FILE__, $code_name, $name, $version, $mode);

		if( $mode=='backend' ) {
			$this->basic_backend_init();
			if (strpos($_SERVER['QUERY_STRING'], 'all_around')!==FALSE || defined('ALL_AROUND_DEMO') || defined('DOING_AJAX')) {
				$this->main_object->backend_init();
				$this->backend_init();
			}
		} else {
			$this->main_object->frontend_init();
			$this->frontend_init();
		}
	}

	function basic_backend_init() {
		add_filter( 'plugin_action_links', array(&$this, 'all_around_plugin_action_links'), 10, 2 ); // Add 'Settings' link on Plugins page
		register_activation_hook( $this->base_plugin_file, array(&$this, 'on_event_activate') );	// Add hook for activation event
		add_action('admin_menu', array(&$this, 'on_event_init_menu'));
	}

	function backend_init() {
		add_filter('admin_footer_text', array(&$this, 'dashboard_footer'));	// Add plugin name to footer
		add_action( 'admin_enqueue_scripts', array(&$this, 'load_admin_scripts') );
		foreach ($this->main_object->add_ajax_hook as $id => $arr) {	// Ajax calls
			$this->add_hook('wp_'.$id, $arr);
		}
	}

	function load_admin_scripts() {
		//add_theme_support( 'post-thumbnails' );
		if ($this->uploader_type==2) wp_enqueue_media();
	}

	function frontend_init() {
		add_action('wp_head', array(&$this, 'inline_header'));
		add_action('wp', array(&$this, 'frontend_includes'));
		add_shortcode('all_around', array(&$this, 'shortcode') );
	}

	function add_hook($hook, $arr) {
		return add_action($hook, $arr);
	}
	function add_ajax_hook($hook, $arr) {
		return add_action('wp_ajax_'.$hook, $arr);
	}
	
	function get_plugins_url () {	// without / on the end
		return plugins_url();
	}
	
	function get_admin_url() {
		return admin_url('admin.php?page='.$this->plugin_code_name);
	}

	function is_admin() {
		if (defined('ALL_AROUND_DEMO')) return true;
		return is_admin();
	}

	function get_db_prefix() {
		global $wpdb;
		return $wpdb->prefix;
	}
	function get_db_posts_table() {
		global $wpdb;
		return $wpdb->posts;
	}

	function get_db_postmeta_table() {
		global $wpdb;
		return $wpdb->postmeta;
	}

	function activation_sql($sql) {
		global $wpdb;
		require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		dbDelta($sql);
	}

	function db_query($sql) {
		global $wpdb;
		return $wpdb->query($sql);
	}
	function db_get_var($sql, $col_offset=0, $row_offset=0) {
		global $wpdb;
		return $wpdb->get_var($sql, $col_offset, $row_offset);
	}
	function db_get_row($sql, $row_offset=0) {
		global $wpdb;
		return $wpdb->get_row($sql, ARRAY_A, $row_offset);
	}
	function db_get_results($sql) {	// return array
		global $wpdb;
		return $wpdb->get_results($sql, ARRAY_A);
	}
	function db_insert_row($table, $data, $format=null) {
		global $wpdb;
		return $wpdb->insert($table, $data, $format);
	}
	function db_update($table, $data, $where, $data_format=null, $where_format=null) {
		global $wpdb;
		return $wpdb->update($table, $data, $where, $data_format, $where_format);
	}
	function db_get_insert_id() {
		global $wpdb;
		return $wpdb->insert_id;
	}
	
	function get_option($var) {	// return FALSE on error
		return get_option($var);
	}
	function add_option($var, $val) {
		return add_option($var, $val, '', 'no');
	}
	function update_option($var, $val) {
		return update_option($var, $val);
	}
	
	function on_event_activate() {
		$this->main_object->install_plugin();
	}

	function on_event_init_menu() {
		$main_menu = add_menu_page(
			$this->main_object->add_admin_menu[0]['title'],
			$this->main_object->add_admin_menu[0]['title'], 
			'manage_options', 
			$this->main_object->add_admin_menu[0]['slug'], 
			array(&$this->main_object, $this->main_object->add_admin_menu[0]['func'])
		);
		add_action('load-'.$main_menu, array(&$this, 'backend_includes')); 

		$count=$this->main_object->admin_submenu_count[0];
		for ($i=0; $i<$count; $i++) {
			$sub_menu = add_submenu_page(
				$this->main_object->add_admin_menu[0]['slug'], 
				$this->main_object->add_admin_menu[0][$i]['title'], 
				$this->main_object->add_admin_menu[0][$i]['title'], 
				'manage_options', 
				$this->main_object->add_admin_menu[0][$i]['slug'],
				array(&$this->main_object, $this->main_object->add_admin_menu[0][$i]['func'])
			);
			add_action('load-'.$sub_menu, array(&$this, 'backend_includes')); 
		}
	}
	
	function backend_includes() {
		wp_enqueue_style('farbtastic');	
		wp_enqueue_style('thickbox');
		foreach ($this->main_object->add_css as $arr) {
			if ($arr['layer']=='backend' || $arr['layer']=='both')
				wp_enqueue_style($arr['name'], $arr['url']);
		}

		wp_enqueue_script('jquery');
		wp_enqueue_script('post');
		wp_enqueue_script('farbtastic');
		wp_enqueue_script('thickbox');
		
		foreach ($this->main_object->add_js as $arr) {
			if ($arr['layer']=='backend' || $arr['layer']=='both')
				wp_enqueue_script($arr['name'], $arr['url']);
		}
	}

	function frontend_includes() {
		if ($this->main_object->settings['use_new_jquery']==1 && strlen($this->main_object->settings['new_jquery_url'])>2)
		{
			wp_deregister_script('jquery');
			wp_register_script('jquery', $this->main_object->settings['new_jquery_url']);	
		}
		wp_enqueue_script('jquery');

		$use_separated_jquery=$this->main_object->settings['use_separated_jquery'];
		if ($use_separated_jquery==0) {
			foreach ($this->main_object->add_js as $arr) {
				if ($arr['layer']=='frontend' || $arr['layer']=='both')
					wp_enqueue_script($arr['name'], $arr['url']);
			}
		}
		foreach ($this->main_object->add_css as $arr) {
			if ($arr['layer']=='frontend' || $arr['layer']=='both')
				wp_enqueue_style($arr['name'], $arr['url']);
		}

	}
	
	function inline_header() {
		$this->main_object->inline_header();
	}

	function find_all_shortcodes_on_page() {
		global $post;
		if (!isset($post->ID)) return array();
		//print_r($post); exit;
		$mypost = get_post($post->ID);
		$content = $mypost->post_content;
		$start=0;
		$arr=array();
		while (1) {
			$pos = strpos($content, '[all_around id', $start);
			if ($pos===FALSE) break;
			$end = strpos($content, ']', $pos);
			$pos2 = strpos($content, '"', $pos);
			if ($pos2===FALSE || $pos2>$end) {
				$pos2 = strpos($content, "'", $pos);
				if ($pos2===FALSE || $pos2>$end) break;
			}
			$pos3 = strpos($content, '"', $pos2+1);
			if ($pos3===FALSE || $pos3>$end) {
				$pos3 = strpos($content, "'", $pos2+1);
				if ($pos3===FALSE || $pos3>$end) break;
			}
			$start=$pos3;
			$arr[]=substr($content, $pos2+1, $pos3-$pos2-1);
		}
		return $arr;
	}

	function all_around_plugin_action_links( $links, $file ) {
		if ( $file == plugin_basename( dirname(__FILE__).'/all_around.php' ) ) {
			$links[] = '<a href="admin.php?page=all_around">'.__('Settings').'</a>';
		}

		return $links;
	}

	function dashboard_footer () {
		echo $this->plugin_name.' '.$this->plugin_version;
	}

	function admin_page() {
		include_once($this->path . '/pages/all_around_index.php');
	}
	
	function admin_edit_page() {
		include_once($this->path . '/pages/all_around_edit.php');
	}
	
	function shortcode($atts) {

		extract(shortcode_atts(array(
			'id' => ''
		), $atts));

		$buffer=$this->main_object->frontend_shortcode($id);

		$buffer = preg_replace('/\s+/', ' ',$buffer);

		return do_shortcode($buffer);
	}

	function post_search($searchVal){
		$arr=array();
		if (empty($searchVal)) return $arr;

		$query_args = array( 'posts_per_page' => -1, 'post_type' => 'any');
		$query = new WP_Query( $query_args );

		foreach ( $query->posts as $match) {
			if(strpos(strtolower($match->post_name), $searchVal) !== false){
				$thumbn = wp_get_attachment_image_src( get_post_thumbnail_id($match->ID) , 'thumbnail');
				$arr[]=array(
					'id' => $match->ID,
					'thumbnail' => $thumbn[0],
					'title' => $match->post_title
				);
			}
		}
		return $arr;
	}

	function post_get($id, $post=NULL){

		if ($post===NULL) {
			$post = get_post($id); 
		}
		if ($post===NULL) return NULL;
		$id=$post->ID;
		$title = $post->post_title;
		$date = substr($post->post_date, 8, 2) . '/' . substr($post->post_date, 5, 2) . '/' . substr($post->post_date, 0, 4);
		$category_array = get_the_category( $id );
		$category_id = $category_array[0]->term_id;
		$category_name = $category_array[0]->name;
		$excerpt = $post->post_excerpt;
		$content = $post->post_content;
		$thumbnail = '';
		if (has_post_thumbnail($id)) $thumbnail = wp_get_attachment_url( get_post_thumbnail_id($id , 'full'));
		$permalink = get_permalink($id);

		return array(
			'id' => $id,
			'title' => $title,
			'category_id' => $category_id,
			'category_name' => $category_name,
			'description' => $excerpt,
			'content' => $content,
			'date' => $date,
			'thumbnail' => $thumbnail,
			'link' => $permalink
		);
	}

	function get_category_info($id) {
		$arr = get_category($id, ARRAY_A);
		if ($arr && is_array($arr)) {
			return array(
				'id' => $id,
				'name' => $arr['name'],
				'slug' => $arr['slug']
			);
		}
		return FALSE;
	}

	function get_tag_info($id) {
		$arr = get_term_by('id', $id, 'post_tag', ARRAY_A);
		if ($arr && is_array($arr)) {
			return array(
				'id' => $id,
				'name' => $arr['name'],
				'slug' => $arr['slug']
			);
		}
		return FALSE;
	}
	
	function get_categories() {
		$post_types=get_post_types('','names'); 
		$categories = array();
		foreach ($post_types as $post_type ) {
			if (!in_array($post_type, array('page', 'attachment', 'revision', 'nav_menu_item'))) {
				$newCats = get_categories(array('type' => $post_type));
				foreach ($newCats as $post_cat) {
					if (!in_array($post_cat, $categories)) {
						$arr=array(
							'id' => $post_cat->term_id,
							'name' => $post_cat->name,
							'slug' => $post_cat->slug
						);
						$categories[]=$arr;
					}
				}
			}
		}
		return $categories;	
	}
	
	function get_tags() {
		$rarr=array();
		$arr=get_tags(array('orderby'=>''));
		foreach($arr as $tag) {
			$rarr[]=array(
				'id' => intval($tag->term_id),
				'name' => $tag->name,
				'slug' => $tag->slug
			);
		}
		return $rarr;
	}

	function get_category_posts($cat_id, $order='ASC') {
		$order=strtoupper($order);
		$the_query = new WP_Query( array( 'cat' => $cat_id, 'post_type' => 'any', 'posts_per_page'=>-1, 'order' => $order));
		$start = true;
		$arr=array();
		while ( $the_query->have_posts() ) : $the_query->the_post();
			if ($the_query->post->post_type != 'page') {
				$arr[]=$this->post_get(0, $the_query->post);
			}
		endwhile;
		return $arr;
	}
	
	function get_tag_posts($tag_id, $order='ASC') {
		$order=strtoupper($order);
		$the_query = new WP_Query( array( 'tag_id' => $tag_id, 'post_type' => 'any', 'posts_per_page'=>-1, 'order' => $order));
		$start = true;
		$arr=array();
		while ( $the_query->have_posts() ) : $the_query->the_post();
			if ($the_query->post->post_type != 'page') {
				$arr[]=$this->post_get(0, $the_query->post);
			}
		endwhile;
		return $arr;
	}
	
	function get_remote($url) {
		$response = wp_remote_get( $url );
		if( is_wp_error( $response ) ) {
		   //$error_message = $response->get_error_message();
		   //echo "Something went wrong: $error_message";
		   return FALSE;
		} else {
			if ($response['response']['code']=='404') return FALSE;
			return $response['body'];
		}
	}

	function get_root_of_uploads_dir($with_slash=0) {	// return full filepath without / on end
		$upload_dir = wp_upload_dir();
		$path="";
		if (isset($upload_dir['basedir'])) $path = $upload_dir['basedir'];
		if ($path=="" && defined('ABSPATH'))
		{
			$slash="/";
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
			$path=ABSPATH."wp-content".$slash."uploads";
		}
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $path=str_replace("/", "\\", $path);
		$slash="/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
		if ($with_slash) $path.=$slash;
		return $path;
	}
	function get_current_upload_dir($with_slash=0) {	// return full filepath without / on end
		$path=$this->get_root_of_uploads_dir();
		$upload_dir = wp_upload_dir();
		if (isset($upload_dir['path'])) $path = $upload_dir['path'];
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $path=str_replace("/", "\\", $path);
		$slash="/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
		if ($with_slash) $path.=$slash;
		return $path;
	}
	function get_full_urlpath_of_uploads_dir($with_slash=0) {
		$upload_dir = wp_upload_dir();
		$url=$upload_dir['baseurl'];
		if ($with_slash) $url.='/';
		return $url;	
	}
	function get_site_url() {
		return get_site_url();
	}
	public function get_attachment_file_from_id($id) {
		$arr=wp_get_attachment_metadata($id);
		if ($arr===FALSE) return '';
		if (!is_array($arr)) return '';
		if (!isset($arr['file'])) return '';
		$file=$arr['file'];
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $file=str_replace("/", "\\", $file);
		$upload_dir=$this->get_root_of_uploads_dir();
		if ($upload_dir=='') return '';
		$slash="/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
		return $upload_dir.$slash.$file;
	}
	function get_attachment_id_from_url ($url) {
		$query = "SELECT ID FROM ".$this->get_db_posts_table()." WHERE guid='".$url."'";
		$id = $this->db_get_var($query);
		return $id;
	}
	function get_attachment_id_from_url_without_resolution ($url) {
		$file=all_around_functions::get_relative_to_cms_urlpath_from_full_urlpath($url);
		$upload_dir=$this->get_full_urlpath_of_uploads_dir(1);
		$upload_dir_length=strlen($upload_dir);
		if (substr($url,0, $upload_dir_length)==$upload_dir) {
			$file=substr($url, $upload_dir_length);
			$query = "SELECT post_id FROM ".$this->get_db_postmeta_table()." WHERE meta_value LIKE '%".$file."%'";
			$id = $this->db_get_var($query);
			if ($id==NULL) return NULL;
			return $id;
		}
		return NULL;
	}
	function get_attachment_id_from_url_with_resolution_unsafe ($url) {
		$file=all_around_functions::get_filename_from_url($url);
		$query = "SELECT post_id FROM ".$this->get_db_postmeta_table()." WHERE meta_value LIKE '%".$file."%'";
		$id = $this->db_get_var($query);
		if ($id==NULL) return NULL;
		return $id;
	}
}
?>