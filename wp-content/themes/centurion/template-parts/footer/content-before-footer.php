<?php
if (!is_404()) {
	$before_footer = get__theme_option('before_footer');
	$Modules = new Modules();
	foreach ($before_footer as $position => $before_footer_template) {

		if (is_post_type_archive('equipments')) {
			$equpment = get__theme_option('equipment_hide_before_footer_' . $before_footer_template['template']);
			if (!$equpment) {
				$Modules->modules_section($before_footer_template['template'], true, $position, $before_footer_template['class']);
			}
		} else {
			$post_meta = get__post_meta('hide_before_footer_' . $before_footer_template['template']);
			if (!$post_meta) {
				$Modules->modules_section($before_footer_template['template'], true, $position, $before_footer_template['class']);
			}
		}
	}
}
if(get_post_type() == 'landingpages'  || get_page_template_slug() == 'templates/landing-page.php') {
	get_template_part('template-parts/section/content', 'landing-form-bottom');
}
