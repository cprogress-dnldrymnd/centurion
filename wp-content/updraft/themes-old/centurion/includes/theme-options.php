<?php 
class Theme_Options extends Helpers {
	function __construct() {
		$this->site_logo = wp_get_attachment_image_url(get__theme_option('logo'), 'large');
		$this->alt_logo_url = wp_get_attachment_image_url(get__theme_option('alt_logo'), 'large');
		$this->disable_gutenberg = get__theme_option('disable_gutenberg');
		$this->default_page_banner = wp_get_attachment_image_url(get__theme_option('default_page_banner'), 'full');


		$this->logo = '<a class="site-logo full-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(get__theme_option('logo'), 'medium').'" alt="Logo"> </a>';
		$this->alt_logo = '<a class="site-logo alt-logo" href="'.get_site_url().'"> <img src="'.wp_get_attachment_image_url(get__theme_option('alt_logo'), 'large').'" alt="Logo"></a>';
		$this->phone_number_text  = get__theme_option('phone_number');
		$this->phone_number_url = 'tel:'.$this->clean_string($this->phone_number_text, '');
		$this->phone_number  = '<a href="'.$this->phone_number_url.'">'.$this->phone_number_text.'</a>';

		$this->email_address_text  = get__theme_option('email_address');
		$this->email_address_url = 'mailto:'.$this->email_address_text;
		$this->email_address  = '<a href="'.$this->email_address_url.'">'.$this->email_address_text.'</a>';

		$this->footer_text = wpautop(get__theme_option('copyright_text'));
		$this->footer_logo = '<a class="site-logo" href="'.get_site_url().'"> <img src="' . wp_get_attachment_image_url(get__theme_option('footer_logo'), 'medium') . '" alt="Logo"> </a>';
		$this->footer_logo = get__theme_option('footer_logo');

		$this->facebook = get__theme_option('facebook_url');
		$this->twitter = get__theme_option('twitter_url');
		$this->instagram = get__theme_option('instagram_url');
		
		$this->landing_top_bar_logo = get__theme_option('landing_top_bar_logo');
		$this->landing_top_bar_text = get__theme_option('landing_top_bar_text');
		$this->hero_banner_logo = get__theme_option('hero_banner_logo');
		$this->header_icon_menu = get__theme_option('header_icon_menu');
		
		$this->whatsapp_url = 'https://'.get__theme_option('whats_app_rul');
		



	}
}