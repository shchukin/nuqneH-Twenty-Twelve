<?php
/*
Template Name: Sticky Sidebar
*/
?>

<?php if ( is_active_sidebar( 'sticky-sidebar' ) ) : ?>
    <div class="sticky-sidebar">
        <div class="sticky-sidebar__detachable">
            <?php dynamic_sidebar( 'sticky-sidebar' ); ?>
        </div>
    </div><!-- .sticky-sidebar -->
<?php endif; // end sticky-sidebar widget area ?>