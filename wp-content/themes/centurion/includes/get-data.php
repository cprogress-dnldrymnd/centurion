<?php
class GetData
{
	function get_terms_details($taxonomy, $hide_empty = false, $order = 'ASC')
	{
		$terms = get_terms(array(
			'taxonomy' => $taxonomy,
			'hide_empty' => $hide_empty,
			'orderby' => 'id',
			'order' => $order,
		));
		if (!$terms) return;
		$term_array = array();
		foreach ($terms as $term) {
			$term_array[$term->term_id] = array(
				'name' => $term->name,
				'description' => $term->description
			);
		}
		return $term_array;
	}
	function get_post_terms_id($taxonomy)
	{
		$terms = get_the_terms(get_the_ID(), $taxonomy);
		if (!$terms) return;
		$term_array = array();
		foreach ($terms as $term) {
			$term_array[$term->term_id] = $term->term;
		}
		return $term_array;
	}
	function get_post_terms($taxonomy)
	{
		$terms = get_post_terms_id($taxonomy);
		if (!$terms) return;
		ob_start();
		foreach ($terms as $key => $term) {
?>
			<a class="button primary-button small" href="<?= get_term_link($key); ?>"><?= $term ?></a>
		<?php
		}
		return ob_get_clean();
	}
	function get_posts($post_type, $label = 'Select Post', $posts_per_page = -1, $post_status = 'publish')
	{
		$return = array();
		if ($label) {
			$return[''] = $label;
		}
		$args = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status ' => $post_status
		);

		$posts = get_posts($args);
		foreach ($posts as $post_val) {
			$return[$post_val->ID] = $post_val->post_title;
		}

		return $return;
	}

	function get_posts_details($post_type, $posts_per_page = -1, $post_status = 'publish', $tax_query = false)
	{
		$args_wp = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status ' => $post_status
		);

		if ($tax_query) {
			$args_wp['tax_query'][] = $tax_query;
		}

		$wp_query = new WP_Query($args_wp);
		while ($wp_query->have_posts()) {
			$wp_query->the_post();
			$return[get_the_ID()] = array(
				'name' => get_the_title(),
				'description' => get_the_content(),
				'thumbnail' => get_post_thumbnail_id()
			);
		}
		wp_reset_postdata();

		return $return;
	}

	function get_posts_ids($post_type, $posts_per_page = -1, $post_status = 'publish', $tax_query = false)
	{
		$args_wp = array(
			'post_type' => $post_type,
			'posts_per_page' => $posts_per_page,
			'post_status ' => $post_status
		);

		if ($tax_query) {
			$args_wp['tax_query'][] = $tax_query;
		}

		$wp_query = new WP_Query($args_wp);
		while ($wp_query->have_posts()) {
			$wp_query->the_post();
			$return[get_the_ID()] = get_the_title();
		}
		wp_reset_postdata();

		return $return;
	}

	function get_image_alt($val)
	{
		$image_alt = get_post_meta($val, '_wp_attachment_image_alt', TRUE);
		$image_title = get_the_title($val);
		if ($image_alt) {
			$alt = $image_alt;
		} else {
			$alt = $image_title;
		}
		return $alt;
	}

	function get_contact_forms()
	{
		$return = array('Select Form');
		$args_wp = array(
			'post_type' => 'wpcf7_contact_form',
			'posts_per_page' => -1,
			'post_status ' => 'publish'
		);
		$posts = get_posts($args_wp);
		foreach ($posts as $post_val) {
			$shortcode = '[contact-form-7 id="' . $post_val->ID . '" title="' . $post_val->post_title . '"]';
			$return[$shortcode] = $post_val->post_title;
		}
		wp_reset_postdata();
		return $return;
	}

	function get_contact_form_box($contact_form)
	{
		if ($contact_form) {
			ob_start();
		?>
			<div class="contact-form-box" data-aos="fade-up">
				<?= do_shortcode($contact_form) ?>
			</div>
<?php
			return ob_get_clean();
		}
	}

	function pagination($the_query)
	{
		$total_pages = $the_query->max_num_pages;
		$big = 999999999;
		if ($total_pages > 1) {
			$current_page = max(1, get_query_var('paged'));
			echo '<div class="pagination">';
			echo paginate_links(array(
				'prev_text' => '<span><i class="fas fa-chevron-left"></i></span>',
				'next_text' => '<span><i class="fas fa-chevron-right"></i></span>',
				'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
				'format' => '?paged=%#%',
				'current' => $current_page,
				'total' => $total_pages,

			));
			echo '</div>';
		}
	}

	function get_title()
	{
		if (is_tax()) {
			$term = get_queried_object();
			$args = array(
				'heading' => $term->name
			);
			return $this->get_heading($args);
		} else {
			$alt_title = carbon_get_the_post_meta('alt_title');

			if ($alt_title) {
				$args = array(
					'heading' => $alt_title
				);
				return $this->get_heading($args);
			} else {
				$args = array(
					'heading' => get_the_title()
				);
				return $this->get_heading($args);
			}
		}
	}

	function get_background_image($background, $size = 'full')
	{
		$background_url = wp_get_attachment_image_url($background, $size);
		if ($background_url) {
			return 'style="background-image: url(' . $background_url . ')"';
		}
	}

	function get_data_aos($data_aos)
	{
		if ($data_aos) {
			return 'data-aos="' . $data_aos . '"';
		}
	}

	function get_class($class)
	{
		if ($class) {
			return ' ' . $class;
		}
	}

	function get_attributes($class, $id, $template_class)
	{
		$attributes = '';
		$template_class_val =  $template_class ? $template_class . ' has-edit' : '';
		if ($class) {
			$attributes .= 'class="' . $class . ' ' . $template_class_val . '"';
		}

		if ($id) {
			$attributes .= 'id="' . $id . '"';
		}

		return $attributes;
	}
}
