<?php

/*
Plugin Name: Age Verifier for WordPress
Plugin URI: http://www.webcraft.cc/
Version: 1.2.2
Author: Nikolay Dyankov
Description: Customizable and easy to use age verification plugin.
*/

/*
Params:
- version - 1.2.2
- pretty name - Age Verifier for WordPress
- class name - AgeVerifier
- pligin name - age-verifier
- plugin description - Customizable and easy to use age verification plugin.
- shortcode name - ageverifier
*/


if (!class_exists('AgeVerifier')) {
	class AgeVerifier {
		function __construct() {
			$this->admin_options_name = 'age-verifier-admin-options';
			$this->default_options = array(
				"jquery" => "",
				"settings" => array(),
				"verified_user" => false,
				"cookie_id" => rand(0, 100000)
			);
			$this->pagename = 'age-verifier';
			$this->new_pagename = 'new_age-verifier';
		}

		function get_admin_options() {
			$admin_options = $this->default_options;

			$loaded_options = get_option($this->admin_options_name);

			if (!empty($loaded_options)) {
				foreach ($loaded_options as $key => $option) {
					$admin_options[$key] = $option;
				}
			}

			// $admin_options = $this->default_options;

			update_option($this->admin_options_name, $admin_options);
			return $admin_options;
		}
		function init_pages() {
			add_menu_page(
			"Age Verifier",
			"Age Verifier",
			"manage_options",
			$this->pagename,
			array($this, "print_options_page"));
		}
		function admin_includes() {
			wp_enqueue_script('jquery');

			wp_enqueue_style('bootstrap-wpfix-css', plugins_url('/css/libs/bootstrap.localized.css', __FILE__), false, '1.0', false);
			wp_enqueue_style('bootstrap-css', plugins_url('/css/libs/bootstrap.wpfix.css', __FILE__), false, '1.0', false);
			wp_enqueue_script('boostrap-js', plugins_url('/js/libs/bootstrap.min.js', __FILE__), false, '1.0', true);

			wp_enqueue_style('chosen-css', plugins_url('/css/libs/chosen.min.css', __FILE__), false, '1.0', false);
			wp_enqueue_script('chosen-js', plugins_url('/js/libs/chosen.jquery.min.js', __FILE__), false, '1.0', true);

			wp_enqueue_style('colorpicker-css', plugins_url('/css/libs/colorpicker.css', __FILE__), false, '1.0', false);
			wp_enqueue_script('colorpicker-js', plugins_url('/js/libs/colorpicker.js', __FILE__), false, '1.0', true);

			wp_enqueue_script('age-verifier-module-filters-js', plugins_url('/js/age-verifier-module-filters.js', __FILE__), false, '1.0', true);

			wp_enqueue_style('age-verifier-editor-css', plugins_url('/css/age-verifier-editor.css', __FILE__), false, '1.0', false);
			wp_enqueue_script('age-verifier-editor-js', plugins_url('/js/age-verifier-editor.js', __FILE__), false, '1.0', true);
			wp_enqueue_script('age-verifier-content-js', plugins_url('/js/age-verifier-content.js', __FILE__), false, '1.0', true);
			wp_enqueue_script('age-verifier-jquery-generator-js', plugins_url('/js/age-verifier-jquery-generator.js', __FILE__), false, '1.0', true);

			wp_enqueue_style('age-verifier-admin-css', plugins_url('/css/admin.css', __FILE__), false, '1.0', false);
			wp_enqueue_script('age-verifier-admin-js', plugins_url('/js/admin.js', __FILE__), false, '1.0', true);

			wp_enqueue_script('age-verifier-wp-ajax-js', plugins_url('/js/age-verifier-wp-ajax.js', __FILE__), false, '1.0', true);

			wp_enqueue_style('age-verifier-css', plugins_url('/css/age-verifier.css', __FILE__), false, '1.0', false);
			wp_enqueue_script('age-verifier-js', plugins_url('/js/age-verifier.js', __FILE__), false, '1.0', true);
		}
		function client_includes() {
			if ($this->should_include_plugin()) {
				wp_enqueue_script('age-verifier-wp-ajax-js', plugins_url('/js/age-verifier-wp-ajax.js', __FILE__), false, '1.0', true);

				wp_enqueue_style('chosen-css', plugins_url('/css/libs/chosen.min.css', __FILE__), false, '1.0', false);
				wp_enqueue_script('chosen-js', plugins_url('/js/libs/chosen.jquery.min.js', __FILE__), false, '1.0', true);

				wp_enqueue_style('age-verifier-css', plugins_url('/css/age-verifier.css', __FILE__), false, '1.0', false);
				wp_enqueue_script('age-verifier-js', plugins_url('/js/age-verifier.js', __FILE__), false, '1.0', true);
			}
		}
		function print_options_page() {
			$options = $this->get_admin_options();
			?>
			<div class="bootstrap-wrapper admin-panel-section">
				<div id="editor-container"></div>
			</div>

			<div id="main-footer" class="col-md-12">
				<ul class="admin-panel-section">
					<li>
						<a href="http://webcraft.cc/support.php" id="footer-support" target="blank">
							<img src="<?php echo plugins_url('img/admin/support.png', __FILE__); ?>">
						</a>
					</li>
					<li>
						<a href="http://webcraft.cc/" id="footer-logo" target="blank">
							<img src="<?php echo plugins_url('img/admin/logo.png', __FILE__); ?>">
						</a>
					</li>
					<div class="clear"></div>
				</ul>

			</div>
			<?php

			$this->admin_includes();
		}
		function call_plugin() {
			if ($this->should_include_plugin()) {
				$settings = $this->get_admin_options();
				?>
				<script>
				;(function ( $, window, document, undefined ) {
					$(document).ready(function() {
						$.age_verifier_ajax_url = '<?php echo admin_url('admin-ajax.php'); ?>';
						<?php
							$settings['jquery'] = str_replace("\\\\'", "\\'", $settings['jquery']);
							echo $settings['jquery'];
						?>
					});
				})( jQuery, window, document );
				</script>
				<?php
			}
		}

		// Cookies
		function set_cookies() {
			if (is_admin()) return;

			$options = $this->get_admin_options();
			$cookie_expiration = $options['settings']->cookie_expiration;
			$cookie_val = 'unverified';
			$cookie_name = 'age-verifier-' . $options['cookie_id'];

			if (isset($_COOKIE[$cookie_name])) {
				if ($_COOKIE[$cookie_name] == 'unverified') {
					$cookie_val = 'unverified';
					$options['verified_user'] = false;
				} else {
					$cookie_val = 'verified';
					$options['verified_user'] = true;
				}
			} else {
				$cookie_val = 'unverified';
				$options['verified_user'] = false;
			}


			setcookie($cookie_name, $cookie_val, time()+60*60*24*$cookie_expiration, '/');
			update_option($this->admin_options_name, $options);
		}
		function should_include_plugin() {
			$options = $this->get_admin_options();

			if (intval($options['settings']->enabled) == 1 && !$options['verified_user'] && $this->filter()) {
				return true;
			} else {
				return false;
			}
		}
		function filter() {
			$options = $this->get_admin_options();
			$filters = $options['settings']->filters;

			if (count($filters) == 0) {
				return true;
			}

			for ($i=0; $i<count($filters); $i++) {
				if ($filters[$i]->type == 'homepage' && is_front_page()) {
					return true;
				}
				if ($filters[$i]->type == 'all_posts' && is_single()) {
					return true;
				}
				if ($filters[$i]->type == 'all_pages' && is_page()) {
					return true;
				}
				if ($filters[$i]->type == 'selected_posts') {
					for ($j=0; $j<count($filters[$i]->vals); $j++) {
						if (is_single($filters[$i]->vals[$j])) {
							return true;
						}
					}
				}
				if ($filters[$i]->type == 'selected_pages') {
					for ($j=0; $j<count($filters[$i]->vals); $j++) {
						if (is_page($filters[$i]->vals[$j])) {
							return true;
						}
					}
				}
				if ($filters[$i]->type == 'tags' && is_single()) {
					global $post;
					$tag_ids = wp_get_post_tags($post->ID, array( 'fields' => 'ids' ));

					for ($j=0; $j<count($tag_ids); $j++) {
						if (in_array($tag_ids[$j], $filters[$i]->vals)) {
							return true;
						}
					}
				}
				if ($filters[$i]->type == 'categories' && is_single()) {
					global $post;
					$cat_ids = wp_get_post_categories($post->ID);

					for ($j=0; $j<count($cat_ids); $j++) {
						if (in_array($cat_ids[$j], $filters[$i]->vals)) {
							return true;
						}
					}
				}
			}

			return false;
		}

		// Filters HTML
		function get_filters_form_control() {
			ob_start(); ?>
			<div class="form-group">
				<label class="col-md-3 control-label">Display Filter:</label>
				<div class="col-md-9">
					<select class="form-control" id="select-filters" multiple>
						<option val="all-pages">
							All Pages
						</option>
						<option val="all-blog-posts">
							All Posts
						</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<div class="col-md-9 col-md-offset-3">
					<div class="btn btn-primary" id="button-add-filter" data-toggle="modal" data-target="#modal-edit-filter">Add Filter</div>
					<div class="btn btn-default" id="button-edit-filter">Edit Filter</div>
					<div class="btn btn-default" id="button-delete-filter">Delete Filter</div>
				</div>
			</div>
			<?php return ob_get_clean();
		}
		function get_filters_form_modal() {
			ob_start(); ?>
			<div class="modal fade" id="modal-edit-filter" tabindex="-1" role="dialog" aria-labelledby="editText" aria-hidden="true">
				<div class="modal-dialog" style="z-index: 1050;">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<h4 class="modal-title" id="myModalLabel">Edit Filter</h4>
						</div>
						<div class="modal-body">
							<form>
								<div class="form-group">
									<label class="control-label">Filter Type:</label>
									<div class="btn-group" data-toggle="buttons">
										<label class="col-md-4 btn btn-default">
		                                    <input type="radio" name="options" id="checkbox-homepage" autocomplete="off">Home Page
		                                </label>
										<label class="col-md-4 btn btn-default">
											<input type="radio" name="options" id="checkbox-all-posts" autocomplete="off">All Posts
										</label>
										<label class="col-md-4 btn btn-default">
											<input type="radio" name="options" id="checkbox-all-pages" autocomplete="off">All Pages
										</label>
										<label class="col-md-4 btn btn-default">
											<input type="radio" name="options" id="checkbox-selected-posts" autocomplete="off">Selected Posts
										</label>
										<label class="col-md-4 btn btn-default">
											<input type="radio" name="options" id="checkbox-selected-pages" autocomplete="off">Selected Pages
										</label>
										<label class="col-md-4 btn btn-default">
											<input type="radio" name="options" id="checkbox-tags" autocomplete="off">Tags
										</label>
										<label class="col-md-4 btn btn-default">
											<input type="radio" name="options" id="checkbox-categories" autocomplete="off">Categories
										</label>
									</div>
								</div>
								<div class="form-group" id="form-group-select-posts">
									<label class="control-label" for="select-posts">Select Posts:</label>
									<select class="form-control" multiple id="select-posts">
										<option val="1">Post 1</option>
										<option val="2">Post 2</option>
										<option val="3">Post 3</option>
										<option val="4">Post 4</option>
									</select>
								</div>
								<div class="form-group" id="form-group-select-pages">
									<label class="control-label" for="select-pages">Select Pages:</label>
									<select class="form-control" multiple id="select-pages">
										<option val="1">Page 1</option>
										<option val="2">Page 2</option>
										<option val="3">Page 3</option>
										<option val="4">Page 4</option>
									</select>
								</div>
								<div class="form-group" id="form-group-select-tags">
									<label class="control-label" for="select-tags">Select Tags:</label>
									<select class="form-control" multiple id="select-tags">
										<option val="1">Tag 1</option>
										<option val="2">Tag 2</option>
										<option val="3">Tag 3</option>
										<option val="4">Tag 4</option>
									</select>
								</div>
								<div class="form-group" id="form-group-select-categories">
									<label class="control-label" for="select-categories">Select Categories:</label>
									<select class="form-control" multiple id="select-categories">
										<option val="1">Category 1</option>
										<option val="2">Category 2</option>
										<option val="3">Category 3</option>
										<option val="4">Category 4</option>
									</select>
								</div>
							</form>

						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal" id="button-cancel-edit-filter">Cancel</button>
							<button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-filter">Done</button>
						</div>
					</div>
				</div>
			</div>
			<?php return ob_get_clean();
		}

		// AJAX

		function user_verified() {
			$options = $this->get_admin_options();
			$cookie_expiration = $options['settings']->cookie_expiration;
			$cookie_name = 'age-verifier-' . $options['cookie_id'];

			setcookie($cookie_name, 'verified', time()+60*60*24*$cookie_expiration, '/');

			die();
		}
		function print_editor() {
			?>

			<div id="edit-tooltip"><span class="glyphicon glyphicon-edit"></span> Click to Edit</div>

	        <div id="editor-wrap">
	            <div id="editor-header" class="col-md-12">
	                <h3>Age Verifier for WordPress</h3>
	                <h5>Plugin Settings</h5>
	                <div id="editor-header-buttons-wrap">
	                    <div class="btn-group btn-group-justified">
	                        <!-- <a href="#" class="btn btn-primary" id="button-save">Save</a> -->
	                        <a href="#" class="btn btn-default" id="button-preview"><span class="glyphicon glyphicon-fullscreen"></span> Preview</a>
	                    </div>
	                </div>
	            </div>
	            <div id="editor-form" class="col-md-6">
	                <form class="form-horizontal">
	                    <!-- Enabled - checkbox -->
	                    <div class="form-group">
	                        <div class="checkbox col-md-3 col-md-offset-3">
	                            <label>
	                                <input type="checkbox" id="checkbox-enabled"> Enabled
	                            </label>
	                        </div>
	                    </div>


	                    <!-- Mode - button group - Birthday/Age/Confirmation -->
	                    <div class="form-group">
	                        <label class="col-md-3 control-label">Ask Visitors For:</label>
	                        <div class="col-md-9">
	                            <div class="btn-group btn-group-justified" data-toggle="buttons">
	                                <label class="btn btn-default">
	                                    <input type="radio" name="options" id="checkbox-mode-birthday" autocomplete="off">Birthday
	                                </label>
	                                <label class="btn btn-default">
	                                    <input type="radio" name="options" id="checkbox-mode-age" autocomplete="off">Age
	                                </label>
	                                <label class="btn btn-default">
	                                    <input type="radio" name="options" id="checkbox-mode-confirmation" autocomplete="off">Confirmation
	                                </label>
	                            </div>
	                        </div>
	                    </div>


	                    <!-- Required Age - age - 1 to 100 -->
	                    <div class="form-group">
	                        <label for="input-age" class="col-md-3 control-label">Minimum Age:</label>
	                        <div class="col-md-9">
	                            <div class="input-group">
	                                <input type="text" class="form-control" aria-label="Enter Age" id="input-age">
	                                <span class="input-group-addon">years</span>
	                            </div>
	                        </div>
	                    </div>

	                    <!-- Cookie Expiration - 1 to 365 days + never -->
	                    <div class="form-group">
	                        <label for="input-cookie-expiration" class="col-md-3 control-label">Cookie Expiration:</label>
	                        <div class="col-md-9">
	                            <div class="input-group">
	                                <input type="text" class="form-control" aria-label="Enter Cookie Expiration" id="input-cookie-expiration">
	                                <span class="input-group-addon">days</span>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="form-group">
	                        <div class="col-md-9 col-md-offset-3">
	                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-delete-cookies">
	                                Delete Cookies
	                            </button>
	                        </div>
	                    </div>
						<!-- Safe URL -->
	                    <div class="form-group">
	                        <label for="input-safe-url" class="col-md-3 control-label">Safe URL Redirect:</label>
	                        <div class="col-md-7">
	                            <input type="text" class="form-control" aria-label="Safe URL" id="input-safe-url">
	                        </div>
	                        <div class="col-md-2">
	                            <div class="checkbox">
	                                <label>
	                                    <input id="checkbox-safe-url-enabled" type="checkbox" style="width: 18px;"> Enabled
	                                </label>
	                            </div>
	                        </div>
	                    </div>

	                    <!-- Animation - button group or select - Pop In/Slide Down/No Animation -->
	                    <div class="form-group">
	                        <label class="col-md-3 control-label">Animation:</label>
	                        <div class="col-md-9">
	                            <div class="btn-group btn-group-justified" data-toggle="buttons">
	                                <label class="btn btn-default">
	                                    <input type="radio" name="options" id="checkbox-animation-pop-in" autocomplete="off">Pop In
	                                </label>
	                                <label class="btn btn-default">
	                                    <input type="radio" name="options" id="checkbox-animation-slide" autocomplete="off">Slide Down
	                                </label>
	                                <label class="btn btn-default">
	                                    <input type="radio" name="options" id="checkbox-animation-none" autocomplete="off">None
	                                </label>
	                            </div>
	                        </div>
	                    </div>

	                    <!-- Background Color -->
	                    <div class="form-group">
	                        <label class="col-md-3 control-label">Background:</label>
	                        <div class="col-md-9">
	                            <div class="color-box color-box-selected" data-color="#00BD9B"></div>
	                            <div class="color-box" data-color="#0CCE6C"></div>
	                            <div class="color-box" data-color="#2997DF"></div>
	                            <div class="color-box" data-color="#9D55B9"></div>
	                            <div class="color-box" data-color="#33495F"></div>
	                            <div class="color-box" data-color="#F3C500"></div>
	                            <div class="color-box" data-color="#E97D00"></div>
	                            <div class="color-box" data-color="#EB4833"></div>
	                            <div class="color-box" data-color="#93A4A5"></div>
	                            <div class="color-box" id="color-box-background" data-color="#333333">
	                                <span class="glyphicon glyphicon-edit"></span>
	                            </div>
	                            <div class="clear"></div>
	                        </div>
	                    </div>

	                </form>
	            </div>

	            <div id="editor-preview" class="col-md-6">

	            </div>

	            <div class="clear"></div>

	            <!-- MODALS -->

	            <div class="modal fade" id="modal-delete-cookies" tabindex="-1" role="dialog" aria-labelledby="deleteCookies" aria-hidden="true">
	                <div class="modal-dialog" style="z-index: 1050;">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <h4 class="modal-title" id="myModalLabel">Are you sure?</h4>
	                        </div>
	                        <div class="modal-body">
	                            All your visitors will be forgotten and they will have to confirm their age again. Continue?
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                            <button type="button" class="btn btn-danger" data-dismiss="modal" id="button-delete-cookies">Delete Cookies</button>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="modal fade" id="modal-edit-title" tabindex="-1" role="dialog" aria-labelledby="editTitle" aria-hidden="true">
	                <div class="modal-dialog" style="z-index: 1050;">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <h4 class="modal-title" id="myModalLabel">Edit Title</h4>
	                        </div>
	                        <div class="modal-body">
	                            <div class="form-group">
	                                <label class="control-label" for="input-title">Title:</label>
	                                <input type="text" class="form-control" id="input-title">
	                            </div>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-title">Done</button>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="modal fade" id="modal-edit-text" tabindex="-1" role="dialog" aria-labelledby="editText" aria-hidden="true">
	                <div class="modal-dialog" style="z-index: 1050;">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <h4 class="modal-title" id="myModalLabel">Edit Text</h4>
	                        </div>
	                        <div class="modal-body">
	                            <div class="form-group">
	                                <label class="control-label" for="textarea-text">Text:</label>
	                                <textarea rows="6" class="form-control" id="textarea-text"></textarea>
	                            </div>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-text">Done</button>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="modal fade" id="modal-edit-error" tabindex="-1" role="dialog" aria-labelledby="editText" aria-hidden="true">
	                <div class="modal-dialog" style="z-index: 1050;">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <h4 class="modal-title" id="myModalLabel">Edit Error Message</h4>
	                        </div>
	                        <div class="modal-body">
	                            <div class="form-group">
	                                <label class="control-label" for="textarea-error-message">Error Message:</label>
	                                <textarea rows="6" class="form-control" id="textarea-error-message"></textarea>
	                            </div>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-error-message">Done</button>
	                        </div>
	                    </div>
	                </div>
	            </div>

	            <div class="modal fade" id="modal-edit-submit" tabindex="-1" role="dialog" aria-labelledby="editText" aria-hidden="true">
	                <div class="modal-dialog" style="z-index: 1050;">
	                    <div class="modal-content">
	                        <div class="modal-header">
	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	                            <h4 class="modal-title" id="myModalLabel">Edit Submit Button</h4>
	                        </div>
	                        <div class="modal-body">
	                            <div class="form-group">
	                                <label class="control-label" for="input-submit-button">Text:</label>
									<input type="text" class="form-control" id="input-submit-button"></textarea>
	                            </div>
	                        </div>
	                        <div class="modal-footer">
	                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
	                            <button type="button" class="btn btn-primary" data-dismiss="modal" id="button-confirm-edit-submit">Done</button>
	                        </div>
	                    </div>
	                </div>
	            </div>


	        </div>

			<?php
			die();
		}
		function get_editor_html() {
			$html_file = file_get_contents(PLUGINS_URL('age-verifier-editor.html', __FILE__));
			$arr = explode('<!-- * -->', $html_file);
			$html = $arr[1];

			$html = str_replace('img/', PLUGINS_URL('img/', __FILE__), $html);

			echo $html;

			die();
		}
		function get_stored_settings() {
			$admin_options = $this->get_admin_options();

			$settings = $admin_options["settings"];

			// $settings = str_replace('\\"', '"', $settings);
			// $settings = str_replace('\\\'', '\'', $settings);
			// $settings = str_replace('\\\\', '\\', $settings);

			// print_r($admin_options);

			echo json_encode($settings);

			die();
		}
		function save_settings() {
			$options = $this->get_admin_options();

			$settings = $_POST['settings'];
			$jquery = $_POST['jquery'];

			$settings = str_replace('\\"', '"', $settings);
			$settings = str_replace('\\\'', '\'', $settings);

			$jquery = str_replace('\\"', '"', $jquery);
			$jquery = str_replace('\\\'', '\'', $jquery);

			$settings = json_decode($settings);

			$options['settings'] = $settings;
			$options['jquery'] = $jquery;

			update_option($this->admin_options_name, $options);

			die();
		}
		function delete_cookies() {
			$options = $this->get_admin_options();

			$options['cookie_id'] = rand(0, 100000);

			update_option($this->admin_options_name, $options);

			die();
		}
		function get_filters_data() {
			$pages = array();
			$posts = array();
			$tags = array();
			$categories = array();

			// Get pages
			$args = array(
				'sort_order' => 'ASC',
				'sort_column' => 'post_title',
				'hierarchical' => 1,
				'exclude' => '',
				'include' => '',
				'meta_key' => '',
				'meta_value' => '',
				'authors' => '',
				'child_of' => 0,
				'parent' => -1,
				'exclude_tree' => '',
				'number' => '',
				'offset' => 0,
				'post_type' => 'page',
				'post_status' => 'publish'
			);
			$pages = get_pages($args);

			// Get posts
			$args = array(
				'posts_per_page'   => -1,
				'offset'           => 0,
				'category'         => '',
				'category_name'    => '',
				'orderby'          => 'post_date',
				'order'            => 'DESC',
				'include'          => '',
				'exclude'          => '',
				'meta_key'         => '',
				'meta_value'       => '',
				'post_type'        => 'post',
				'post_mime_type'   => '',
				'post_parent'      => '',
				'post_status'      => 'publish',
				'suppress_filters' => true
			);
			$posts = get_posts( $args );

			// Get tags
			$tags = get_tags();

			// Get categories
			$categories = get_categories();

			$res = array(
				"pages" => $pages,
				"posts" => $posts,
				"tags" => $tags,
				"categories" => $categories,
				"form_control" => $this->get_filters_form_control(),
				"modal" => $this->get_filters_form_modal()
			);

			echo json_encode($res);
			die();
		}
	}
}

if (class_exists('AgeVerifier')) {
	$instance = new AgeVerifier();
}

add_action('admin_menu', array($instance, 'init_pages'));
add_action('init', array($instance, 'set_cookies'));
add_action('wp_head', array($instance, 'client_includes'));
add_action('wp_footer', array($instance, 'call_plugin'));

// AJAX

add_action('wp_ajax_get_filters_data', array($instance, 'get_filters_data'));
add_action('wp_ajax_get_editor_html', array($instance, 'print_editor'));
add_action('wp_ajax_get_stored_settings', array($instance, 'get_stored_settings'));
add_action('wp_ajax_save_settings', array($instance, 'save_settings'));
add_action('wp_ajax_nopriv_user_verified', array($instance, 'user_verified'));
add_action('wp_ajax_delete_cookies', array($instance, 'delete_cookies'));

?>
