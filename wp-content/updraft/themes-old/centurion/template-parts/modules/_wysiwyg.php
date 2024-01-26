<?php 
$DisplayData = new DisplayData;
$Helpers = new Helpers;
$GetData = new GetData;
$Theme_Options = new Theme_Options;
$wysiwyg = $module['wysiwyg'];
$disable_module = $module['disable_module'];
if(!$disable_module) { ?>
	<section <?= $GetData->get_attributes('wysiwyg text-section background-gray md-padding-bottom md-padding-top background-white', $module_id, $template_class) ?>>
		<?php if($template_class) { ?>
			<?= $Helpers->get_edit_url('post.php?post='.$postid.'&action=edit', 'Edit Template') ?>
		<?php } ?>
		<div class="container" data-aos="fade-in">
			<?php 
			$DisplayData->description(array(
				'description' => $wysiwyg
			), '', false);
			?>
		</div>
	</section>
	<?php } ?>