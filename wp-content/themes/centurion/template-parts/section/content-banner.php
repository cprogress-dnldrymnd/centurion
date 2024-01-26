<?php
$DisplayData = new DisplayData();
$Theme_Options = new Theme_Options();

$hide_page_banner = get__post_meta('hide_page_banner');
$display_review = get__post_meta('display_review');
$page_banner_style = get__post_meta('page_banner_style');
$page_banner_description = get__post_meta('page_banner_description');


$background_image = get__post_meta('desktop_image') ? wp_get_attachment_image_url(get__post_meta('desktop_image'), 'full') : $Theme_Options->default_page_banner;
$background_image_mobile = get__post_meta('mobile_image') ? wp_get_attachment_image_url(get__post_meta('mobile_image'), 'large') : $background_image;
$background = $background_image ? 'class="background-image bg-image d-none d-lg-block" style="background-image: url(' . $background_image . ')"' : 'class="background-image bg-image background-primary d-none d-lg-block"';
$background_mobile = $background_image_mobile ? 'class="background-image bg-image d-block d-lg-none" style="background-image: url(' . $background_image_mobile . ')"' : 'class="background-image bg-image background-primary d-block d-lg-none"';

$title = get__post_meta('alt_title') ? get__post_meta('alt_title') : get_the_title();
$container_holder_class = '';

if ($page_banner_style == 'style-1') {
	$container_holder_class = 'title-container background-accent';
	$button_class = 'button-dark button-big';
	$page_banner_class = ' ';
}
else if ($page_banner_style == 'style-3') {
	$container_holder_class = 'title-container background-gray';
	$button_class = 'button-primary button-big';
	$page_banner_class = 'md-padding ';
}
else {
	$button_class = 'button-accent button-big mt-5';
	$page_banner_class = 'xl-padding ';
}

?>
<section
	class="page-banner text-center centered <?= ($page_banner_description ? 'with-description ' : 'no-description ') . $page_banner_class . ($page_banner_style == 'style-2' ? 'background-primary ' : '') . $page_banner_style ?>">

	<?php if ($page_banner_style != 'style-3') { ?>
		<div <?= $background ?>></div>
		<div <?= $background_mobile ?>></div>
	<?php } ?>
	<div class="container medium-container" data-aos="fade-up">
		<div class="container-holder <?= $container_holder_class ?>">
			<div class="inner">
				<?php
				$DisplayData->heading(
					array(
						'heading' => $title,
					), false, false);
				$DisplayData->description(
					array(
						'description' => $page_banner_description,
					), 'subheading mt-5', false);
				?>

				<?php
				if (get__post_meta('page_banner_button_type')) {
					$DisplayData->button(
						get__post_meta('page_banner_button_text'),
						get__post_meta('page_banner_' . get__post_meta('page_banner_button_type')),
						get__post_meta('page_banner_button_action'),
						get__post_meta('page_banner_button_icon'),
						$button_class,
						false
					);
				}
				?>
				<?php if ($display_review) { ?>
					<?php if (get__theme_option('google_reviews_url')) { ?>
						<?php $SVG = new SVG; ?>
						<div class="stars mt-5 d-block d-lg-none">
							<a href="<?= get__theme_option('google_reviews_url') ?>" target="_blank"
								class="d-inline-flex align-items-center">
								<div class="text me-3 medium-text fw-semibold d-none d-lg-block">
									Excellent
								</div>
								<div class="stars green-star">
									<div class="stars-holder d-flex align-items-center">
										<span class="d-block d-lg-none google">
											<?= $SVG->google ?>
										</span>
										<?php for ($i = 1; $i <= 5; $i++) { ?>
											<span><?= $SVG->star; ?></span>
										<?php } ?>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				<?php } ?>

			</div>
		</div>

	</div>
</section>