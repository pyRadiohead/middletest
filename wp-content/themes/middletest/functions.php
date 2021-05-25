<?php

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



	// Main navigation scripts.
	if ( has_nav_menu( 'primary' ) ) {
		wp_enqueue_script(
			'twenty-twenty-one-primary-navigation-script',
			get_template_directory_uri() . '/assets/js/primary-navigation.js',
			array( 'twenty-twenty-one-ie11-polyfills' ),
			wp_get_theme()->get( 'Version' ),
			true
		);
	}

}
add_action( 'wp_enqueue_scripts', 'middletests_scripts' );