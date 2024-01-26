<?php

$Theme_Options = new Theme_Options;
$DisplayData = new DisplayData;
$footer_logo = $Theme_Options->footer_logo;
$footer_text = $Theme_Options->footer_text;

?>

<section class="footer-logos">
	<div class="container">
		<div class="row">
			<div class="col-md-3 background-gray-3">
				<div class="column-holder d-flex align-items-center h-100 sm-padding pe-0 pe-lg-5">
					<?= $Theme_Options->logo ?>
				</div>
			</div>


			<div class="col-md-9 ">
				<div class="column-holder sm-padding d-flex align-items-center">
					<?php if ($footer_logo) { ?>
						<?php
						$DisplayData->image(array(
							'image_id' => $footer_logo,
						))
						?>
					<?php } ?>
					<?php if ($footer_text) { ?>


						<div class="footer-text ms-3">
							<?= $footer_text ?>
						</div>

					<?php } ?>


				</div>
			</div>

		</div>
	</div>
</section>