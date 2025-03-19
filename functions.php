<?php
/**
 * Ahava Medical Theme functions and definitions
 *
 * @package Ahava_Medical
 */

if (!defined('_S_VERSION')) {
    define('_S_VERSION', '1.0.0');
}

/**
 * Include required files
 */
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/post-types.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/assets.php';
require get_template_directory() . '/inc/shortcodes.php';
require get_template_directory() . '/inc/widgets.php';
require get_template_directory() . '/inc/plugins.php';
require get_template_directory() . '/inc/acf.php';
require get_template_directory() . '/inc/utilities.php';
require get_template_directory() . '/inc/patterns.php';

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function ahava_theme_setup() {
    // Add default posts and comments RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Let WordPress manage the document title
    add_theme_support('title-tag');
    
    // Enable support for Post Thumbnails on posts and pages
    add_theme_support('post-thumbnails');
    
    // Add custom image sizes
    add_image_size('doctor-thumbnail', 300, 400, true);
    add_image_size('location-thumbnail', 600, 400, true);
    add_image_size('service-thumbnail', 400, 300, true);
    
    // Register nav menus
    register_nav_menus(array(
        'primary' => esc_html__('Primary Menu', 'ahava-medical'),
        'footer' => esc_html__('Footer Menu', 'ahava-medical'),
    ));
    
    // Add theme support for selective refresh for widgets
    add_theme_support('customize-selective-refresh-widgets');
    
    // Add support for responsive embeds
    add_theme_support('responsive-embeds');
    
    // Add support for custom logo
    add_theme_support('custom-logo', array(
        'height'      => 250,
        'width'       => 250,
        'flex-width'  => true,
        'flex-height' => true,
    ));
    
    // Add support for HTML5 features
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script',
    ));
}
add_action('after_setup_theme', 'ahava_theme_setup');

// Load Jetpack compatibility file if Jetpack is active
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}
