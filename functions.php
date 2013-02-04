<?php

function nuqneH_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Content top', 'nuqneH-Twenty-Twelve' ),
        'id' => 'content-top-1',
        'description' => __( 'This is area right above the content. Looks like it good place for breadcrumbs', 'nuqneH-Twenty-Twelve' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => "</div>",
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}
add_action( 'widgets_init', 'nuqneH_widgets_init' );

?>