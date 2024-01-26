<?php
$GetData = new GetData;
$size = isset($data['size']) ? $data['size'] : 'full';
$image_url = wp_get_attachment_image_url($data['image_id'], $size);
$with_decoration = isset($data['with_decoration']) && $data['with_decoration'] ? true : false;
?>
<?php if ($image_url) { ?>
	<div class="image-box<?= $GetData->get_class($class) ?> d-inline-block position-relative" <?= $GetData->get_data_aos($data_aos) ?>>
		<img src="<?= $image_url ?>" alt="<?= $GetData->get_image_alt($data['image_id']) ?>">

		<?php if ($with_decoration) { ?>
			<div class="decoration decoration-1"></div>
			<div class="decoration decoration-2"></div>
		<?php } ?>
	</div>
<?php } ?>