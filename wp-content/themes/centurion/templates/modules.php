<?php
/*-----------------------------------------------------------------------------------*/
/* Template Name: Modules
/*-----------------------------------------------------------------------------------*/
?>

<?php get_header(); ?>
<?php
$Modules = new Modules();
?>
<?php while (have_posts()) {
	the_post(); ?>
	<div class="page-title" role="banner">
		<h1><?php the_title() ?></h1>
	</div>

	<?php
	if (!get__post_meta('hide_page_banner')) {
		get_template_part('template-parts/section/content', 'banner');
	}
	get_template_part('template-parts/section/content', 'after-banner');
	$Modules->modules_section(get_the_ID());
	?>
<?php } ?>
<?php get_footer(); ?>