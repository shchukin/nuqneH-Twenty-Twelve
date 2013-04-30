<?php
/*
Template Name: Footer
*/
?>

<?php if ( is_active_sidebar( 'footer' ) ) : ?>
    <div class="footer">
        <?php dynamic_sidebar( 'footer' ); ?>
    </div><!-- .footer -->
<?php endif; // end footer widget area ?>