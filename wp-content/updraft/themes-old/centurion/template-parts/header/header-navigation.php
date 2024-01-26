<?php

$Theme_Options = new Theme_Options();

$SVG = new SVG();

?>

<section class="header-navigation background-white">

	<?php

	get_template_part('template-parts/header/header', 'top-bar');

	?>

	<div class="header-navigation-inner py-3 px-4 px-sm-0">

		<div class="container">

			<div class="row align-items-center justify-content-between">

				<div class="col-lg-3 col-6">

					<div class="column-holder">

						<?= $Theme_Options->logo ?>

					</div>

				</div>

				<div class="col-lg-6 col-6">

					<div class="column-holder">

						<nav class="navbar navbar-expand-lg p-0">

							<div class="collapse navbar-collapse justify-content-center" id="navbarMain">
								<!---
								<div class="d-block d-lg-none">

									<?php

									//get_template_part('template-parts/header/header', 'bottom');

									?>

								</div>
								--->

								<?php

								wp_nav_menu(

									array(

										'theme_location' => 'header-menu',

										'container'      => false,

										'menu_class'     => '',

										'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',

										'items_wrap'     => '<ul id="%1$s" class="navbar-nav align-items-center fw-light mt-5 mt-lg-0 %2$s">%3$s</ul>',

										'depth'          => 2,

										'walker'         => new bootstrap_5_wp_nav_menu_walker()

									)

								);

								?>

								<?php

								wp_nav_menu(

									array(

										'theme_location' => 'header-right-menu',

										'container'      => false,

										'menu_class'     => '',

										'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',

										'items_wrap'     => '<ul id="%1$s" class="d-block d-lg-none navbar-nav align-items-center fw-light mt-5 mt-lg-0 %2$s">%3$s</ul>',

										'depth'          => 2,

										'walker'         => new bootstrap_5_wp_nav_menu_walker()

									)

								);

								?>
								<div class="d-block d-lg-none mt-5">
									<div class="contact-box small-heading content-margin">
										<div class="contact-details text-center">
											<ul class="list-inline list-icon">
												<li>
													<a class="color-white" href="tel:03330145890">
														<span class="text">0333 014 5890</span>
													</a>
												</li>
												<li>
													<a class="color-white" href="mailto:info@warmerenergysolutions.co.uk">
														<span class="text">info@warmerenergysolutions.co.uk</span>
													</a>
												</li>
												<li>
													<span class="text color-white">
														Monday - Friday: X <br>
														Saturday & Sunday: X
													</span>
												</li>
											</ul>
										</div>


									</div>
								</div>


						</nav>



					</div>



					<div class="d-block d-lg-none text-end">

						<button class="navbar-toggler toggler-menu" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">

							<span class="navbar-toggler-icon">

								<span class="icon-bar"></span>

								<span class="icon-bar"></span>

								<span class="icon-bar"></span>

							</span>

						</button>

					</div>

				</div>

				<div class="col-lg-3 d-none d-lg-block">

					<div class="column-holder">

						<nav class="navbar navbar-expand-lg p-0">



							<?php

							wp_nav_menu(

								array(

									'theme_location' => 'header-right-menu',

									'container'      => false,

									'menu_class'     => '',

									'fallback_cb'    => 'WP_Bootstrap_Navwalker::fallback',

									'items_wrap'     => '<ul id="%1$s" class="navbar-nav align-items-center fw-light mt-5 mt-lg-0 %2$s">%3$s</ul>',

									'depth'          => 2,

									'walker'         => new bootstrap_5_wp_nav_menu_walker()

								)

							);

							?>



						</nav>



					</div>

				</div>

			</div>

		</div>

	</div>

</section>