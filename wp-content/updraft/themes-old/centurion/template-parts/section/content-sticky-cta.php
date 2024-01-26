<?php
if (!is_404()) {

	$DisplayData = new DisplayData;
	$SVG = new SVG;
	$heading = get__theme_option('sticky_heading');
	$description = get__theme_option('sticky_description');
	$enable_sticky_cta = get__theme_option('enable_sticky_cta');
	$hide_sticky_cta = get__post_meta('hide_sticky_cta');
	if ($enable_sticky_cta && !$hide_sticky_cta) { ?>
		<section class="cta sticky-cta cta-bar background-accent sm-padding has-edit">
			<div class="edit-holder"><a target="_blank" href="/wp-admin/themes.php?page=crb_carbon_fields_container_footer_settings.php" class="edit-contents"> Edit Sticky CTA </a></div>
			<div class="container text-center text-lg-start">
				<div class="row align-items-center justify-content-between">
					<div class="col-lg-8 mb-4 mb-lg-0">
						<div class="column-holder" data-aos="fade-left">
							<?php
							$DisplayData->heading(array(
								'heading' => $heading
							));
							$DisplayData->description(array(
								'description' => $description
							));
							?>
						</div>
					</div>
					<div class="col-lg-4 text-center text-lg-end">
						<div class="column-holder" data-aos="fade-right">
							<?php
							if (get__theme_option('sticky_button_type')) {
								$DisplayData->button(
									get__theme_option('sticky_button_text'),
									get__theme_option('sticky_' . get__theme_option('sticky_button_type')),
									get__theme_option('sticky_button_action'),
									get__theme_option('sticky_button_icon'),
									'button-primary button-big',
								);
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</section>

		<section class="sticky-cta-mobile background-primary p-4 d-block d-lg-none">
			<div class="row align-items-center justify-content-center flex-nowrap">
				<?php if (get__theme_option('button_sticky_button_type')) { ?>
					<div class="col">
						<?php
						$DisplayData->button(
							get__theme_option('button_sticky_button_text'),
							get__theme_option('button_sticky_' . get__theme_option('button_sticky_button_type')),
							get__theme_option('button_sticky_button_action'),
							get__theme_option('button_sticky_button_icon'),
							'button-accent',
							false
						);
						?>
					</div>
				<?php } ?>
				<?php if (get__theme_option('button_sticky_button_type') && get__theme_option('whats_app_rul')) { ?>
					<div class="col col-center small-text text-center p-0">
						<span>or</span>
					</div>
				<?php } ?>

				<?php if (get__theme_option('whats_app_rul')) { ?>
					<div class="col">
						<div class="button-box button-secondary">
							<a href="<?= get__theme_option('whats_app_rul') ?>" target="_blank">
								<span class="icon"><?= $SVG->whatsapp ?></span>
								<span class="text"> WhatsApp us</span>
							</a>
						</div>
					</div>
				<?php } ?>

			</div>
		</section>
	<?php } ?>
<?php } ?>