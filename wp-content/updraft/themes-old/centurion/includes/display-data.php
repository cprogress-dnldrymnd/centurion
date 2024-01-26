<?php
class DisplayData
{
	function heading($data, $class = false, $data_aos = false)
	{
		ob_start();
		include locate_template('template-parts/components/heading.php');
		echo ob_get_clean();
	}
	function description($data, $class = false, $data_aos = false)
	{
		ob_start();
		include locate_template('template-parts/components/description.php');
		echo ob_get_clean();
	}
	function button($button_text, $button_link, $button_class = '', $button_icon = false, $button_action = '_self', $data_aos = false)
	{
		ob_start();
		include locate_template('template-parts/components/button.php');
		echo ob_get_clean();
	}
	function video($video)
	{
		ob_start();
		include locate_template('template-parts/components/video.php');
		echo ob_get_clean();
	}
	function image($data, $class = false, $data_aos = false)
	{
		ob_start();
		include locate_template('template-parts/components/image.php');
		echo ob_get_clean();
	}
	function svg($data, $class = false, $data_aos = false)
	{
		ob_start();
		include locate_template('template-parts/components/svg.php');
		echo ob_get_clean();
	}
}
