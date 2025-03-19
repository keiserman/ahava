<?php
/**
 * Asset management functions
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue scripts and styles.
 */
function ahava_scripts() {
    // Get theme version for cache busting
    $theme_version = wp_get_theme()->get('Version');
    
    // Enqueue Typekit
    wp_enqueue_style('typekit', 'https://use.typekit.net/oiw8zfl.css', array(), null);
    
    // Enqueue main stylesheet
    wp_enqueue_style('ahava-style', get_stylesheet_uri(), array(), $theme_version);
    
    // Enqueue custom styles
    wp_enqueue_style('ahava-all', get_template_directory_uri() . '/assets/css/all.min.css', array(), $theme_version);
    wp_enqueue_style('ahava-style-main', get_template_directory_uri() . '/assets/css/style.css', array(), $theme_version);
    wp_enqueue_style('owl-carousel', get_template_directory_uri() . '/assets/css/owl.carousel.min.css', array(), '2.3.4');
    wp_enqueue_style('owl-theme', get_template_directory_uri() . '/assets/css/owl.theme.default.min.css', array(), '2.3.4');
    wp_enqueue_style('ahava-tablet', get_template_directory_uri() . '/assets/css/tablet.css', array(), $theme_version);
    wp_enqueue_style('ahava-mobile', get_template_directory_uri() . '/assets/css/mobile.css', array(), $theme_version);
    
    // Enqueue scripts
    wp_enqueue_script('jquery');
    wp_enqueue_script('owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array('jquery'), '2.3.4', true);
    wp_enqueue_script('waypoints', get_template_directory_uri() . '/assets/js/jquery.waypoints.min.js', array('jquery'), '4.0.1', true);
    wp_enqueue_script('countup', get_template_directory_uri() . '/assets/js/jquery.countup.min.js', array('jquery'), '1.9.3', true);
    wp_enqueue_script('ahava-main', get_template_directory_uri() . '/assets/js/main.js', array('jquery'), $theme_version, true);
    
    // Only load booking-related scripts and styles on pages that need them
    if (is_page_template('template-request-appointment.php') || has_shortcode(get_post()->post_content, 'custom_booking')) {
        wp_enqueue_style('ahava-booking', get_template_directory_uri() . '/assets/css/custom-booking.css', array(), $theme_version);
        wp_enqueue_script('ahava-booking', get_template_directory_uri() . '/assets/js/booking.js', array('jquery'), $theme_version, true);
    }
    
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'ahava_scripts'); 