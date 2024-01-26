<?php
function action_open_header()
{
	echo '<header id="header">';
}
add_action('open_header', 'action_open_header');

function action_close_header()
{
	echo '</header>';
}

add_action('close_header', 'action_close_header');

function action_open_footer()
{
	echo '<footer >';
}
add_action('open_footer', 'action_open_footer');

function action_close_footer()
{
	echo '</footer>';
}

add_action('close_footer', 'action_close_footer');


//Disable Gutenberg
function disable_gutenberg()
{
	$Theme_Options = new Theme_Options();
	if ($Theme_Options->disable_gutenberg) {
		add_filter('use_block_editor_for_post', '__return_false');
	}
}

add_action('init', 'disable_gutenberg');


//Allow shortcode in menu
add_filter('wp_nav_menu_items', 'do_shortcode');


function se_logout_redirect($redirect_to, $requested_redirect_to, $user)
{
	$requested_redirect_to = get_permalink(get_option('woocommerce_myaccount_page_id'));

	return $requested_redirect_to;
}
add_filter('logout_redirect', 'se_logout_redirect', 10, 3);


/*//Remove Editor
function remove_editor() {
	if (isset($_GET['post'])) {
		$id = $_GET['post'];
		$template = get_post_meta($id, '_wp_page_template', true);
		switch ($template) {
			case 'templates/modules.php':
            // the below removes 'editor' support for 'pages'
            // if you want to remove for posts or custom post types as well
            // add this line for posts:
            // remove_post_type_support('post', 'editor');
            // add this line for custom post types and replace 
            // custom-post-type-name with the name of post type:
            // remove_post_type_support('custom-post-type-name', 'editor');
			remove_post_type_support('page', 'editor');
			break;
			default :
            // Don't remove any other template.
			break;
		}
	}
}
add_action('init', 'remove_editor');*/


function action_wp_head()
{
	$page_header_scripts = get__post_meta('page_header_scripts');
	$page_custom_css = get__post_meta('page_custom_css');

	if ($page_header_scripts) {
		echo $page_header_scripts;
	}
	if ($page_custom_css) {
		echo '<style id="page-custom-css">' . $page_custom_css . '</style>';
	}
?>
	<script>
		var getUrlParameter = function getUrlParameter(sParam) {
			var sPageURL = window.location.search.substring(1),
				sURLVariables = sPageURL.split('&'),
				sParameterName,
				i;

			for (i = 0; i < sURLVariables.length; i++) {
				sParameterName = sURLVariables[i].split('=');

				if (sParameterName[0] === sParam) {
					return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
				}
			}
			return false;
		};

		function setCookie(cname, cvalue, exdays) {
			const d = new Date();
			d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
			let expires = "expires=" + d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
			let name = cname + "=";
			let ca = document.cookie.split(';');
			for (let i = 0; i < ca.length; i++) {
				let c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}
	</script>
	<?php
}

add_action('wp_head', 'action_wp_head');


function action_admin_head()
{
	if (isset($_GET['post'])) {
		$id = $_GET['post'];
		$template = get_post_meta($id, '_wp_page_template', true);
		$post_type = get_post_type($id);
		if ($template == 'templates/modules.php' || $post_type == 'services') {
	?>

			<style>
				.edit-post-header-toolbar {
					display: none !important;
				}

				.edit-post-sidebar__panel-tabs ul li:last-child {
					display: none;
				}

				.block-editor-block-list__layout {
					display: none !important;
				}

				.editor-post-text-editor {
					display: none !important;
				}

				.components-dropdown-menu__menu .components-menu-group:first-child {
					display: none;
				}
			</style>


		<?php } ?>

		<script>
			jQuery(document).ready(function($) {
				setTimeout(function() {
					jQuery('body').removeClass('is-fullscreen-mode');
				});
			});
		</script>
	<?php } ?>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
}

add_action('admin_head', 'action_admin_head');

function action_body_scripts()
{
	$page_body_scripts = get__post_meta('page_body_scripts');
	$body_scripts = get__theme_option('body_scripts');
	if ($page_body_scripts) {
		echo $page_body_scripts;
	}

	if ($body_scripts) {
		echo $body_scripts;
	}
}

add_action('body_scripts', 'action_body_scripts');


function action_body_class($classes)
{
	$classes[] = !get__post_meta('hide_sticky_cta') ? 'sticky-cta-enabled' : '';
	return $classes;
}
add_filter('body_class', 'action_body_class');
