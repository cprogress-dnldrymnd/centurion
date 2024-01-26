<?php
$Theme_Options = new Theme_Options;
$footer_text = $Theme_Options->footer_text;

if ($footer_text) {
	?>

	<section class="footer-text xs-padding">
		<div class="container">
			<div class="description-box extra-samll-text">
				<?= $footer_text ?>
			</div>
		</div>
	</section>

<?php } ?>