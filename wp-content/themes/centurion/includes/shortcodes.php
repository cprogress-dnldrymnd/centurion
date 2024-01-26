<?php



class Shortcodes
{
	function whatsapp_url() {
		$Theme_Options = new Theme_Options();
		return $Theme_Options->whatsapp_url;
	}
	
	function phone_number()
	{
		$Theme_Options = new Theme_Options();
		return $Theme_Options->phone_number;
	}

	function phone_number_text()
	{
		$Theme_Options = new Theme_Options();
		return '<span class="d-none d-sm-inline">' . $Theme_Options->phone_number_text . '</span>' . '<span class="d-inline d-sm-none">CALL NOW</span>';
	}

	function phone_number_text_ns()
	{
		$Theme_Options = new Theme_Options();
		return $Theme_Options->phone_number_text;
	}
	function phone_number_url()
	{
		$Theme_Options = new Theme_Options();
		return $Theme_Options->phone_number_url;
	}

	function email_address()
	{
		$Theme_Options = new Theme_Options();
		return $Theme_Options->email_address;
	}

	function email_address_text()
	{
		$Theme_Options = new Theme_Options();
		return $Theme_Options->email_address_text;
	}

	function email_address_url()
	{
		$Theme_Options = new Theme_Options();
		return $Theme_Options->email_address_url;
	}

	function post_title()
	{
		$alt_title = carbon_get_the_post_meta('alt_title');
		if ($alt_title) {
			return strtolower($alt_title);
		}
		else {
			return strtolower(get_the_title());
		}
	}

	function button($atts, $content = null)
	{
		extract(
			shortcode_atts(
				array(
					'button_text' => '',
					'button_link' => '',
					'new_window'  => '',
					'button_type' => 'button-accent'
				),
				$atts
			)
		);
		$new_window = $new_window != 'false' ? 'target="_blank"' : '';
		$DisplayData = new DisplayData();
		if ($button_text) {
			return $DisplayData->button(
				array(
					'link_text'   => $button_text,
					'link'        => $button_link,
					'link_action' => $new_window,
					'class'       => 'button-accent'
				),
				false
			);
		}
	}

	function get_param($atts)
	{
		extract(
			shortcode_atts(
				array(
					'value' => '',
				),
				$atts
			)
		);
		if (isset($_GET[$value])) {
			return $_GET[$value];
		}
	}

	function contact_details()
	{
		$Theme_Options = new Theme_Options;
		$SVG = new SVG;

		ob_start();
		?>
		<div class="contact-details">
			<ul class="list-inline list-icon">
				<?php if ($Theme_Options->phone_number_text) { ?>
					<li>
						<a class="color-white d-flex align-items-center" href="<?= $Theme_Options->phone_number_url ?>">
							<span class="icon d-flex align-items-center justify-content-center"><?= $SVG->phone ?></span>
							<span class="text"><?= $Theme_Options->phone_number_text ?></span>
						</a>
					</li>
				<?php } ?>
				<?php if ($Theme_Options->email_address_text) { ?>
					<li>
						<a class="color-white d-flex align-items-center" href="<?= $Theme_Options->email_address_url ?>">
							<span class="icon d-flex align-items-center justify-content-center"><?= $SVG->email ?></span>
							<span class="text"><?= $Theme_Options->email_address_text ?></span>
						</a>
					</li>
				<?php } ?>
			</ul>
		</div>
		<?php
		return ob_get_clean();
	}
}
$Shortcodes = new Shortcodes;
add_shortcode('phone_number_text_ns', array($Shortcodes, 'phone_number_text_ns'));
add_shortcode('phone_number_text', array($Shortcodes, 'phone_number_text'));
add_shortcode('phone_number', array($Shortcodes, 'phone_number'));
add_shortcode('phone_number_url', array($Shortcodes, 'phone_number_url'));
add_shortcode('email_address_text', array($Shortcodes, 'email_address_text'));
add_shortcode('email_address', array($Shortcodes, 'email_address'));
add_shortcode('email_address_url', array($Shortcodes, 'email_address_url'));
add_shortcode('button', array($Shortcodes, 'button'));
add_shortcode('accordion', array($Shortcodes, 'accordion'));
add_shortcode('post_title', array($Shortcodes, 'post_title'));
add_shortcode('get_param', array($Shortcodes, 'get_param'));
add_shortcode('contact_details', array($Shortcodes, 'contact_details'));
add_shortcode('whatsapp_url', array($Shortcodes, 'whatsapp_url'));