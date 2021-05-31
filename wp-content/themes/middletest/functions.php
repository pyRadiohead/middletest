<?php
add_action('after_setup_theme','middletest_setup');

function middletest_setup(){
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary menu', 'middletest' ),
			'top_menu'  => __( 'Top menu', 'middletest' ),
		)
	);
	/**
	 * Add post-formats support.
	 */
	add_theme_support(
		'post-formats',
		array(
			'link',
			'aside',
			'gallery',
			'image',
			'quote',
			'status',
			'video',
			'audio',
			'chat',
		)
	);
	/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
	add_theme_support(
		'html5',
		array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
			'navigation-widgets',
		)
	);
	add_theme_support( 'title-tag' );
	add_theme_support( 'custom-logo', array(
		'height' => 52,
		'width'  => 311,
	) );
	add_theme_support('menus');




}



/**
 * Enqueue scripts and styles.
 *
 * @since middletest 1.0
 *
 * @return void
 */
function middletests_scripts() {
	// Note, the is_IE global variable is defined by WordPress and is used
	// to detect if the current browser is internet explorer.
	global $is_IE, $wp_scripts;
	if ( $is_IE ) {
		// If IE 11 or below, use a flattened stylesheet with static values replacing CSS Variables.
		wp_enqueue_style( 'middletest-style', get_template_directory_uri() . '/assets/css/ie.css', array(), wp_get_theme()->get( 'Version' ) );
	} else {
		// If not IE, use the standard stylesheet.
		wp_enqueue_style( 'middletest-style', get_template_directory_uri() . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );
	}

	// RTL styles.
	wp_style_add_data( 'middletest-style', 'rtl', 'replace' );

	// Print styles.
	wp_enqueue_style( 'middletest-print-style', get_template_directory_uri() . '/assets/css/print.css', array(), wp_get_theme()->get( 'Version' ), 'print' );



}
add_action( 'wp_enqueue_scripts', 'middletests_scripts' );