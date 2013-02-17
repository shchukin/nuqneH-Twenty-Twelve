<?php

/* new widget area */

function nuqneH_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Content top', 'nuqneH-Twenty-Twelve' ),
        'id' => 'content-top-1',
        'description' => __( 'This is area right above the content. Looks like it good place for breadcrumbs', 'nuqneH-Twenty-Twelve' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
}

add_action( 'widgets_init', 'nuqneH_widgets_init' );


/* adding cyrillic to subset */

function nuqneH_twentytwelve_scripts_styles() {
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'twentytwelve' ) ) {
		$subsets = 'latin,latin-ext,cyrillic,cyrillic-ext';

		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'twentytwelve' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$protocol = is_ssl() ? 'https' : 'http';
		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		wp_enqueue_style( 'twentytwelve-fonts', add_query_arg( $query_args, "$protocol://fonts.googleapis.com/css" ), array(), null );
	}
}

add_action( 'after_setup_theme', 'nuqneH_twentytwelve_scripts_styles' );


?>