<?php
/**
 * The sidebar containing the main widget area.
 *
 * If no active widgets in sidebar, let's hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Twelve
 * @since Twenty Twelve 1.0
 */
?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) || is_active_sidebar( 'sticky-sidebar' ) ) : ?>
		<div id="secondary" class="widget-area" role="complementary">
			<?php if ( is_active_sidebar( 'sidebar-1' ) ) dynamic_sidebar( 'sidebar-1' ); ?>
			<?php if ( is_active_sidebar( 'sticky-sidebar' ) ) get_sidebar('sticky-sidebar'); ?>
		</div><!-- #secondary -->
	<?php endif; ?>