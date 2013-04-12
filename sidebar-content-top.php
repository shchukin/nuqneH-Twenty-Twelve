<?php
/*
Template Name: Content top
*/
?>

<?php if ( is_active_sidebar( 'content-top' ) ) : ?>
	<div class="content-top" role="complementary">
		<?php dynamic_sidebar( 'content-top' ); ?>
	</div><!-- .content-top -->
<?php endif; // end content-top widget area ?>