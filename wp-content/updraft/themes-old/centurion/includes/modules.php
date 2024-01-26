<?php

use Carbon_Fields\Container;
use Carbon_Fields\Complex_Container;
use Carbon_Fields\Field;

class Modules
{
	function modules_post_meta()
	{
		global $modules_section;
		$modules = Field::make('complex', 'modules', __(''));
		$ModulesFields = new ModulesFields();

		foreach ($modules_section as $section) {
			$modules->add_fields($section['id'],  $ModulesFields->{$section['id'] . '_fields'}());
			$modules->set_header_template($section['label'] . '<% if (title) { %>[<%- title %>] <% } %>');
		}
		$modules->set_collapsed(true);
		return $modules;
	}
	function module_template($section_type)
	{
		return locate_template('/template-parts/modules/_' . $section_type . '.php');
	}
	function modules_section_field($id = '')
	{
		return carbon_get_post_meta($id, 'modules');
	}
	function modules_section($id, $templates = false, $position = '', $class = '')
	{
		$modules = $this->modules_section_field($id);
		foreach ($modules as $key => $module) {
			$section_type = $module['_type'];
			$pos = $position ? '-' .$position : '';
			global $section_id, $template_class;
			if ($templates) {
				$template_class = $class. ' template-' . $id . ($pos);
				$postid = $id;
			} else {
				$template_class = '';
				$postid = '';
			}
			$section_id = $module['_type'] . '-' . get_the_ID() . '-' . $key . $pos;
			$id = isset( $module['id'] ) ?  $module['id'] : '';
			$module_id = $id != '' ?  $id : $section_id;
			switch ($section_type) {
				case $section_type:
					include($this->module_template($section_type));
					break;
			}
		}
	}
}

