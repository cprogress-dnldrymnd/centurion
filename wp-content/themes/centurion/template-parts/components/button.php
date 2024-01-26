<?php
$GetData = new GetData;
$SVG = new SVG;
?>
<div class="button-box <?= $button_class ?>" <?= $GetData->get_data_aos($data_aos) ?>>
	<a href="<?= $button_link ?>" <?= $button_action ?>>
		<?php if ($button_icon) { ?>
			<span class="icon"><?= $button_icon ?></span>
		<?php } ?>

		<span class="text"><?= $button_text ? do_shortcode($button_text) : get_the_title($button_type) ?></span>



	</a>
</div>