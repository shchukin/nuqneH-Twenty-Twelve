<?php
/*
Template Name: Header Right
*/
?>

<?php if ( is_active_sidebar( 'header-right' ) ) : ?>
    <div class="header-right">
        <?php dynamic_sidebar( 'header-right' ); ?>
    </div><!-- .header-right -->
<?php endif; // end header-right widget area ?>