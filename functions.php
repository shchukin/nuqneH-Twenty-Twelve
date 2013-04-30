<?php

/* new widget areas */

function nuqneH_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Content top', 'nuqneH-Twenty-Twelve' ),
        'id' => 'content-top',
        'description' => __( 'This area is right above the content. Looks like it is a good place for breadcrumbs', 'nuqneH-Twenty-Twelve' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Header Right', 'nuqneH-Twenty-Twelve' ),
        'id' => 'header-right',
        'description' => __( 'This area is in right top corner of header. I think it is a good place for rss button', 'nuqneH-Twenty-Twelve' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Footer', 'nuqneH-Twenty-Twelve' ),
        'id' => 'footer',
        'description' => __( 'Footer area. An all footer will be visible if contains wiget', 'nuqneH-Twenty-Twelve' ),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ) );
    register_sidebar( array(
        'name' => __( 'Sticky Sidebar', 'nuqneH-Twenty-Twelve' ),
        'id' => 'sticky-sidebar',
        'description' => __( 'This is like original sidebar but sticky', 'nuqneH-Twenty-Twelve' ),
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


/* adding excerpts to pages */
add_post_type_support( 'page', 'excerpt' );


/* adding javascript */
function nuqneH_add_script() {
    wp_enqueue_script( 'nuqneh-main', get_stylesheet_directory_uri() . '/js/nuqneh-main.js', array('jquery') );  
}    
 
add_action( 'wp_enqueue_scripts', 'nuqneH_add_script' );


/* Just print the category */
function nuqneH_print_category() {
    print '<span class="just-a-category">' . get_the_category_list( __( ', ', 'twentytwelve' ) ) . '</span>';
}

/* Just print the date */
function nuqneH_print_date( $format ) {
    print '<span class="just-a-date">' . get_the_date( $format ) . '</span>' ;
}


/* Post footer */

function twentytwelve_entry_meta() {
  
    $tag_list = get_the_tag_list( '', __( ', ', 'twentytwelve' ) );

    $date = sprintf( '<time title="%1$s" class="entry-date" datetime="%2$s">%3$s</time>',
        esc_attr( get_the_time() ),
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date('Y.m.d') )
    );

    if ( $tag_list ) {
        $utility_text = __( '%1$s | %2$s', 'twentytwelve' );
    } else {
        $utility_text = __( '%1$s.', 'twentytwelve' );
    }

    printf(
        $utility_text,
        $date,
        $tag_list
    );

}


?>