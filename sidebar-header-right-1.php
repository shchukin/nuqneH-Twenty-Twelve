<?php
/*
Template Name: Header Right 1
*/
?>

<?php if ( is_active_sidebar( 'header-right-1' ) ) : ?>
	<div class="header-right-1">
		<?php dynamic_sidebar( 'header-right-1' ); ?>
	</div><!-- .header-right-1 -->
<?php endif; // end content-top widget area ?>