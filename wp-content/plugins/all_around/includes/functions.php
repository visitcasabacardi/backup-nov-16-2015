<?php

class all_around_functions {

	static $wrapper, $main_object;

	static public function get_filename_from_filepath($file) {
		$file_info=pathinfo($file);
		return $file_info['dirname'];
	}
	static public function get_directory_from_filepath($file) {
		$file_info=pathinfo($file);
		return $file_info['basename'];
	}
	static public function get_filename_from_url($url) {
		$pos=strrpos($url, "/");
		if ($pos!==FALSE) return substr($url, $pos+1);
		return $url;
	}
	static public function get_relative_urlpath_for_cms_folder() {	// return relative to webroot URL
		$cms_url=self::$wrapper->get_site_url()."/";
		if (substr($cms_url,0,7)=="http://") $cms_url=substr($cms_url,7);
		if (substr($cms_url,0,8)=="https://") $cms_url=substr($cms_url,8);
		$pos=strpos($cms_url, "/");
		$folder=substr($cms_url, $pos+1);
		if ($folder=='') $folder='/';
		return $folder;
	}
	static public function get_full_urlpath_for_cms_folder() {	// return relative URL
		return self::$wrapper->get_site_url()."/";
	}
	static public function get_full_urlpath_of_domain($with_slash=1) {	// return full URL with /
		$cms_url=self::$wrapper->get_site_url()."/";
		$pos=strpos($cms_url, "/", 8);
		return substr($cms_url, 0, $pos+$with_slash);
	}
	static public function get_webroot_filepath() {	// return full folderpath, ended with /
		$cms_path=all_around_ABSPATH;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $cms_path=str_replace("\\", "/", $cms_path);
		$cms_path_length=strlen($cms_path);
		$cms_folder=self::get_relative_urlpath_for_cms_folder();
		if ($cms_folder!='/') {
			$cms_folder_length=strlen($cms_folder);
			$ret = substr($cms_path, 0, $cms_path_length-$cms_folder_length);
		} else $ret = $cms_path;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $ret=str_replace("/", "\\", $ret);
		return $ret;
	}
	
	static public function get_relative_to_cms_urlpath_from_full_urlpath($url) {	// return relative URL without /
		if (substr($url,0,4)!='http') {
			if (substr($url,0,1)!='/') $url="/".$url;
			return $url;
		}
		$cms_path=all_around_ABSPATH;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $cms_path=str_replace("/", "\\", $cms_path);
		$cms_url=self::$wrapper->get_site_url()."/";
		$cms_url_length=strlen($cms_url);
		if (substr($url, 0, $cms_url_length)==$cms_url) {
			$piece=substr($url, $cms_url_length);
			return $piece;
		}
		return '';
	}
	static public function get_relative_to_webroot_urlpath_from_full_urlpath($url) {	// return relative URL with /
		$pos=strpos($url, '/', 8);
		return substr($url, $pos);
	}
	static public function get_full_urlpath_from_relative_urlpath($url) {	// return full URL
		if (self::is_http_link($url)) return $url;
		if (self::link_begin_with_slash($url)) {
			return self::get_full_urlpath_of_domain(0).$url;
		} else {
			return self::get_full_urlpath_for_cms_folder().$url;
		}
	}
	static public function get_relative_to_cms_urlpath_from_full_filepath($file) {	// return relative URL without /
		$cms_path=all_around_ABSPATH;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $cms_path=str_replace("/", "\\", $cms_path);
		$cms_path_length=strlen($cms_path);
		if (substr($file, 0, $cms_path_length)==$cms_path) {
			$piece=substr($file, $cms_path_length);
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $piece=str_replace("\\", "/", $piece);
			return $piece;
		}
		return '';
	}
	static public function get_relative_to_webroot_urlpath_from_full_filepath($file) {	// return relative URL with	/
		$webroot_folderpath=self::get_webroot_filepath();
		//echo $webroot_folderpath; exit;
		$webroot_folderpath_length=strlen($webroot_folderpath);
		$ret = '/'.substr($file, $webroot_folderpath_length);
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $ret=str_replace("\\", "/", $ret);
		return $ret;
	}
	static public function get_full_urlpath_from_full_filepath($file) {	// return full URL
		$cms_path=all_around_ABSPATH;
		$cms_url=self::$wrapper->get_site_url()."/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $cms_path=str_replace("/", "\\", $cms_path);
		$cms_path_length=strlen($cms_path);
		if (substr($file, 0, $cms_path_length)==$cms_path) {
			$piece=substr($file, $cms_path_length);
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $piece=str_replace("\\", "/", $piece);
			return $cms_url.$piece;
		}
		return '';
	}
	static public function get_full_urlpath_from_relative_to_cms_filepath($file) {	// return full URL
		$cms_url=self::$wrapper->get_site_url();
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $file=str_replace("\\", "/", $file);
		if (substr($file,0,1)!='/') $file="/".$file;
		return $cms_url.$file;
	}
	static public function get_full_urlpath_from_relative_to_webroot_filepath($file) {	// return full URL
		$cms_url=self::$wrapper->get_site_url()."/";
		$cms=self::get_relative_urlpath_for_cms_folder();
		$cms_length=strlen($cms);
		$cms_url_length=strlen($cms_url);
		$piece=substr($cms_url, $cms_url_length-$cms_length);
		if ($piece==$cms) {
			$n=0;
			if ($cms=='/') $n=1;
			$root=substr($cms_url, 0, $cms_url_length-$cms_length+$n);
			//echo 'root='.$root;exit;
			if (substr($file,0,1)=='/' || substr($file,0,1)=='\\') $file=substr($file,1);
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $file=str_replace("\\", "/", $file);
			return $root.$file;
		}
		return '';
	}
	static public function get_full_filepath_from_relative_filepath($file) {	// return full filepath
		$slash="/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
		$cms_path=all_around_ABSPATH;
		$cms_path_length=strlen($cms_path);
		if (substr($cms_path, $cms_path_length-1, 1)=='/') $cms_path=substr($cms_path, 0, $cms_path_length-1);
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') if (substr($cms_path, $cms_path_length-1, 1)=='\\') $cms_path=substr($cms_path, 0, $cms_path_length-1);
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $file=str_replace("/", "\\", $file);
		if (substr($file,0,1)!=$slash) $file=$slash.$file;
		return $cms_path.$file;
	}
	static public function get_relative_filepath_from_full_filepath($file) {	// return relative filepath
		$cms_path=all_around_ABSPATH;
		$cms_path_length=strlen($cms_path);
		if (substr($cms_path, $cms_path_length-1, 1)=='/') $cms_path=substr($cms_path, 0, $cms_path_length-1);
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $file=str_replace("/", "\\", $file);
		$cms_path_length=strlen($cms_path);
		if (substr($file, 0, $cms_path_length)==$cms_path) {
			$piece=substr($file,$cms_path_length);
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $piece=str_replace("/", "\\", $piece);
			if (substr($piece,0,1)=='/' || substr($piece,0,1)=='\\') return substr($piece, 1);
			return $piece;
		}
		return '';	
	}
	static public function get_full_filepath_from_full_urlpath($url) {	// return full filepath
		$slash="/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
		$cms_path=all_around_ABSPATH;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $cms_path=str_replace("/", "\\", $cms_path);
		$cms_url=self::$wrapper->get_site_url()."/";
		$cms_url_length=strlen($cms_url);
		if (substr($url, 0, $cms_url_length)==$cms_url) {
			$piece=substr($url, $cms_url_length);
			if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $piece=str_replace("/", "\\", $piece);
			$file=$cms_path.$piece;
			if (is_file($file)) return $file;
			//echo $piece."<br />"; //exit;
		}
		return '';
	}
	static public function get_full_filepath_from_relative_to_wordpres_urlpath ($url) {	// return full filepath
		$slash="/";
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $slash="\\";
		$cms_path=all_around_ABSPATH;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $cms_path=str_replace("/", "\\", $cms_path);

		if (substr($url,0,1)=='/') $url=substr($url, 1);
		$piece=$url;
		if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN') $piece=str_replace("/", "\\", $piece);
		//echo "PIECE: ".$piece."<br />"; exit;
		$file=$cms_path.$piece;
		if (is_file($file)) return $file;
		return '';
	}
	static public function get_full_filepath_from_relative_to_webroot_urlpath ($url) {// return full filepath
		if (substr($url,0,1)=='/') $url=substr($url, 1);
		$domain=self::get_full_urlpath_of_domain();
		$url=$domain.$url;
		return self::get_full_filepath_from_full_urlpath($url);
	}
	
	static public function get_filepath_from_url_smart($url) {	// MAIN FUNCTION FOR GETTING FILEPATH FROM URL
		//echo 'looking for: '.$url.'<br />';

		if (self::does_file_have_resolution($url)) {
			$burl=self::remove_resolution_from_file($url);
			$file=self::get_filepath_from_url($burl);
			if ($file!='' && is_file($file)) return $file;
		}

		$file=self::get_filepath_from_url($url);
		if ($file!='' && is_file($file)) return $file;


		$id=self::get_attachment_id_from_url_maybe_with_resolution ($url);
		if ($id!=NULL) {
			$file = self::$wrapper->get_attachment_file_from_id($id);
			if (is_file($file)) return $file;
		}

		if (self::is_http_link($url)) {
			if (self::does_file_have_resolution($url)) {
				$burl=self::remove_resolution_from_file($url);
				$file=self::get_full_filepath_from_full_urlpath($burl);
				if ($file!='' && is_file($file)) return $file;
			}
			$file=self::get_full_filepath_from_full_urlpath($url);
			if ($file!='' && is_file($file)) return $file;
		} else {
			if (self::does_file_have_resolution($url)) {
				$burl=self::remove_resolution_from_file($url);
				$file=self::get_full_filepath_from_relative_to_wordpres_urlpath ($burl);
				if ($file!='' && is_file($file)) return $file;
				$file=self::get_full_filepath_from_relative_to_webroot_urlpath ($burl);
				if ($file!='' && is_file($file)) return $file;
			}
			$file=self::get_full_filepath_from_relative_to_wordpres_urlpath ($url);
			if ($file!='' && is_file($file)) return $file;
			$file=self::get_full_filepath_from_relative_to_webroot_urlpath ($url);
			if ($file!='' && is_file($file)) return $file;
		}


		if (self::is_http_link($url)==FALSE) 
				$url=self::get_full_urlpath_from_relative_urlpath($url);
		
		if (self::does_file_have_resolution($url)) {
			$url2=self::remove_resolution_from_file($url);
			$ret = self::get_remote_and_upload($url2);
			if ($ret) return $ret;
		}
		
		$ret = self::get_remote_and_upload($url);
		if ($ret) return $ret;

		return '';
	}
	static public function get_filepath_from_url($url) {	// shortcut for getting filepath from database via guid
		$id=self::$wrapper->get_attachment_id_from_url ($url);
		if ($id!=NULL) return self::$wrapper->get_attachment_file_from_id($id);
		return '';
	}
	static public function get_attachment_id_from_url_maybe_with_resolution ($url) {
		if (self::does_file_have_resolution($url))
			$url=self::remove_resolution_from_file($url);
		
		return self::$wrapper->get_attachment_id_from_url_without_resolution ($url);	
	}
	static public function remove_resolution_from_file($url) {
		$pos1=strrpos($url, "/");
		$pos11=strrpos($url, "\\");
		$pos1=max($pos1, $pos11);
		$pos2=strrpos($url, "-");
		$pos3=strrpos($url, "x");
		$pos4=strrpos($url, ".");
		$r=$pos4-$pos2;
		if ($pos1===FALSE || $pos2===FALSE || $pos3===FALSE || $pos4===FALSE) return FALSE;
		if ($pos1<$pos2 && $pos2<$pos3 && $pos3<$pos4 && $r<11) {
			$x=substr($url, $pos2+1, $pos3-$pos2-1);
			$y=substr($url, $pos3+1, $pos4-$pos3-1);
			if (is_numeric($x) && is_numeric($y)) {
				$part1=substr($url, 0, $pos2);
				$part2=substr($url, $pos4);
				return $part1.$part2;
			}
		}
		return FALSE;
	}
	static public function does_file_have_resolution($url)
	{
		//echo 'does_file_have_resolution ( '.$url.' )<br />';
		$pos1=strrpos($url, "/");
		$pos11=strrpos($url, "\\");
		$pos1=max($pos1, $pos11);
		$pos2=strrpos($url, "-");
		$pos3=strrpos($url, "x");
		$pos4=strrpos($url, ".");
		$r=$pos4-$pos2;
		if ($pos1===FALSE || $pos2===FALSE || $pos3===FALSE || $pos4===FALSE) return FALSE;
		if ($pos1<$pos2 && $pos2<$pos3 && $pos3<$pos4 && $r<11) {
			$x=substr($url, $pos2+1, $pos3-$pos2-1);
			$y=substr($url, $pos3+1, $pos4-$pos3-1);
			if (is_numeric($x) && is_numeric($y)) {
				//$part1=substr($url, 0, $pos2);
				//$part2=substr($url, $pos4);
				return TRUE;
			}
		}
		return FALSE;
	}
	static public function is_http_link ($url) {
		if (substr($url,0,7)=="http://") return TRUE;
		if (substr($url,0,8)=="https://") return TRUE;
		if (substr($url,0,2)=="//") return TRUE;
		return FALSE;	
	}
	static public function link_begin_with_slash($url) {
		if (substr($url,0,1)=="/") return TRUE;
		return FALSE;	
	}
	static public function save_file($file, $content) {
		$fp = fopen($file, 'w');
		if (!$fp) return FALSE;
		fwrite($fp, $content);
		fclose($fp);
		$stat = stat( dirname( $file ));
		$perms = $stat['mode'] & 0000666; //same permissions as parent folder, strip off the executable bits
		@chmod( $file, $perms );
		return TRUE;
	}
	
	static public function get_remote($url) {
		return self::$wrapper->get_remote($url);
	}
	static public function get_remote_and_upload($url) {
		$content=self::get_remote($url);
		if ($content!==FALSE) {
			$filename=self::get_filename_from_url($url);

			$dir='';
			$tdir=self::$wrapper->get_current_upload_dir();
			if (is_writable($tdir)) {
				$dir=self::$wrapper->get_current_upload_dir(true);
			} else {
				$tdir=self::$wrapper->get_root_of_uploads_dir();
				if (is_writable($tdir)) {
					$dir=self::$wrapper->get_root_of_uploads_dir(true);
				}			
			}
			if ($dir=='') $dir=self::$wrapper->get_current_upload_dir(true);

			$md5=md5($url);
			$filepath=$dir.$filename;
			if (file_exists($filepath)) {
				$buf = file_get_contents($filepath);
				if ($buf==$content) return $filepath;
			}
			$filepath=$dir.$md5.'_'.$filename;
			if (file_exists($filepath)) return $filepath;
			$ret=self::save_file($filepath, $content);
			if (!$ret) return FALSE;
			return $filepath;
		}
		return FALSE;
	}

	static public function makethumb_image_db ($url, $w, $h, $opt=array(), $suffix = '', $dest_path = '', &$return_array2=NULL) {

		$return_array2=array(
			'orig_url' => $url,
			'orig_file' => '',
			'dest_url' => $url,
			'dest_file' => ''
		);

		$opts='';
		$variant=1;
		$opt_copy=array();
		foreach ($opt as $var => $val) {
			if ($opts!='') $opts.=',';
			if ($var==0) $variant=2;
			if ($variant==1) $opts.=$var;
			if ($variant==2) {
				$opts.=$val;
				$opt_copy[$val]=1;
			}
		}
		if ($variant==2) $opt=$opt_copy;
		//echo '<pre>'; print_r($opt); echo '</pre>'; exit;
		$ukey=$url.'?w='.$w.'&h='.$h;
		if ($opts!='') $ukey.='&opt='.$opts;
		if ($suffix!='') $ukey.='&suffix='.$suffix;
		if ($dest_path!='') $ukey.='&dest_path='.$dest_path;
		
		//echo $ukey; exit;
		$eukey=esc_sql($ukey);

		$table = self::$main_object->get_thumb_table_name();
		$thmb = self::$wrapper->db_get_row('SELECT * FROM ' . $table . ' WHERE ukey="'.$eukey.'"');
		if ($thmb!==NULL) {
			if (!is_file($thmb['dest_file']))
			{
				self::$wrapper->db_query('DELETE FROM ' . $table . ' WHERE ukey="'.$eukey.'"');
				$thmb=NULL;
			}
		}
		
		if ($thmb===NULL) {
			$return_array=array();
			self::makethumb_image($url, $w, $h, $opt, $suffix, $dest_path, $return_array);
			//echo '<pre>';print_r($return_array);echo '</pre>';
			$data=array(
				'ukey' => $ukey,
				'orig_url' => $return_array['orig_url'],
				'orig_file' => $return_array['orig_file'],
				'dest_url' => $return_array['dest_url'],
				'dest_file' => $return_array['dest_file'],
				'width' => $w,
				'height' => $h,
				'filters' => $opts,
				'version' => 1
			);
			$return_array2=array(
				'orig_url' => $return_array['orig_url'],
				'orig_file' => $return_array['orig_file'],
				'dest_url' => $return_array['dest_url'],
				'dest_file' => $return_array['dest_file']
			);
			self::$wrapper->db_insert_row( $table, $data );
			return $return_array['dest_url'];
		} else {
			// check if file exists !!!!!!!!!!!!!!!
			$return_array2=array(
				'orig_url' => $thmb['orig_url'],
				'orig_file' => $thmb['orig_file'],
				'dest_url' => $thmb['dest_url'],
				'dest_file' => $thmb['dest_file']
			);
			return $thmb['dest_url'];
		}
	}


	static public function makethumb_image($url, $w, $h, $opt=array(), $suffix = '', $dest_path = '', &$return_array=NULL) {

		$return_array=array(
			'orig_url' => $url,
			'orig_file' => '',
			'dest_url' => $url,
			'dest_file' => ''
		);
		
		$file=self::get_filepath_from_url_smart($url);
		if ($file=='') return $url;

		$return_array['orig_file']=$file;
		$return_array['dest_file']=$file;
		
		$md5=md5($url);
		$suffix.=$md5.'-';
		
		if ($dest_path=='') {
			$dir=self::get_filename_from_filepath($file);
			if ($dir!='' && $dir!=NULL) {
				if (!is_writable($dir)) {
					$dir2=self::$wrapper->get_current_upload_dir();
					if (is_writable($dir2)) {
						$dest_path=$dir2;
					} else {
						$dir2=self::$wrapper->get_root_of_uploads_dir();
						if (is_writable($dir2)) {
							$dest_path=$dir2;
						}
					}
				}
			}
		}
		require_once(self::$main_object->path . '/includes/image_functions.php');

		$predicted_file=all_around_image_class::predict_final_file_static($file, $w, $h, $opt, $suffix, $dest_path);
		//echo 'predicted_file = '.$predicted_file.'<br />';
		if (is_file($predicted_file)) {
			$return_array['dest_file']=$predicted_file;
			$url2=self::get_full_urlpath_from_full_filepath($predicted_file);
			if ($url2) {
				$return_array['dest_url']=$url2;
				return $url2;
			}
		}

		$img = all_around_image_class::create_object($file);
		if ($img && !$img->is_error()) {
			$img->resize($w,$h, true);
			if (isset($opt['gray'])) $img->gray();
			$file2 = $img->save($suffix, $dest_path);
			if ($file2) {
				$return_array['dest_file']=$file2;
				$url2=self::get_full_urlpath_from_full_filepath($file2);
				if ($url2) {
					$return_array['dest_url']=$url2;
					return $url2;
				}
			}
		}
		unset($img);

		return $url;
	}
}


?>