<?php
$GetData = new GetData;
?>
<?php
if (isset($data['heading']) && $data['heading'] != '') {
	$tag = isset($data['tag']) ? $data['tag'] : 'h2';
	?>
	<div class="heading-box<?= $GetData->get_class($class) ?>" <?= $GetData->get_data_aos($data_aos) ?>>
		<<?= $tag ?>>
		<?= $data['heading'] ?>
		</<?= $tag ?>>

		<?php if (isset($data['subheading']) && $data['subheading'] != '') { ?>
			<p class="subheading mb-5">
				<?= $data['subheading'] ?>
			</p>
		<?php } ?>
	</div>
<?php } ?>