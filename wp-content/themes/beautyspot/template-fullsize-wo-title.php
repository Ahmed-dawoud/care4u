<?php
/*
Template Name: Fullsize w/o Title
*/
?>

<?php get_header();?>

<?php while (have_posts()) : the_post(); ?>

<?php $page_id = get_the_ID(); ?>

<!-- CORE : begin -->
<div id="core" <?php post_class(); ?>
	<?php if ( has_post_thumbnail() ) : ?>
		<?php $image_data = lsvr_get_image_data( get_post_thumbnail_id( get_the_ID() ) ); ?>
		<?php echo ' style="background-image: url(' . $image_data['full'] . ');"'; ?>
	<?php endif; ?>>

	<!-- PAGE CONTENT : begin -->
	<div id="page-content">
		<div class="various-content">
			<?php the_content(); ?>
		</div>
	</div>
	<!-- PAGE CONTENT : end -->

</div>
<!-- CORE : end -->

<?php endwhile; ?>

<?php get_footer(); ?>