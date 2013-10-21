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


/* Just print the avatar */
function nuqneH_print_post_avatar( $user, $size ) {
    print '<div class="just-an-avatar">' . get_avatar( $user, $size ) . '</div>' ;
}

/* Just print the author */
function nuqneH_print_post_author( $author ) {
    print '<div class="just-an-author">' . get_the_author_meta( 'nickname', $author ) . '</div>' ;
}

/* Just print the date */
function nuqneH_print_post_date() {
    /* translators: 1: date, 2: time */
    printf( __('<div class="just-a-date"> %1$s at %2$s </div>'),  get_the_date(),  get_the_time() );
}


/* Post footer */

function twentytwelve_entry_meta() {
    //nothing more than tags :)
    print get_the_tag_list( '', __( ', ', 'twentytwelve' ) );
}


?>