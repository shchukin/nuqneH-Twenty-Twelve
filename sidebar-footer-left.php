<?php
/*
Template Name: Footer
*/
?>

<?php if ( is_active_sidebar( 'footer-left' ) ) : ?>
    <div class="footer-left">
        <?php dynamic_sidebar( 'footer-left' ); ?>
    </div><!-- .footer -->
<?php endif; // end footer widget area ?>