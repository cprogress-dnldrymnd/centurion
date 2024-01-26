<section class="footer-navigation sm-padding">
	<div class="container">
		<div class="menu-holder">
			<?php
			wp_nav_menu(array(
				'theme_location' => 'footer-menu',
				'container' => false,
				'menu_class' => '',
				'items_wrap' => '<ul id="%1$s" class="d-flex list-inline align-items-center fw-light small-text justify-content-between mb-0 flex-wrap %2$s">%3$s</ul>',
			));
			?>
		</div>
	</div>
</section>