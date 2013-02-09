<?php
/*
Template Name: Content top 1
*/
?>

<?php if ( is_active_sidebar( 'content-top-1' ) ) : ?>
	<div class="content-top" role="complementary">
		<?php dynamic_sidebar( 'content-top-1' ); ?>
	</div><!-- .content-top -->
<?php endif; // end content-top widget area ?>