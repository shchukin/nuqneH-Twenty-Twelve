<?php
/*
Template Name: Footer
*/
?>

<?php if ( is_active_sidebar( 'footer-right' ) ) : ?>
    <div class="footer-right">
        <?php dynamic_sidebar( 'footer-right' ); ?>
    </div><!-- .footer -->
<?php endif; // end footer widget area ?>