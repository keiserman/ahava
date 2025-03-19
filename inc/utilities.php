<?php
/**
 * Utility functions
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Custom excerpt length
 */
function ahava_custom_excerpt_length($length) {
    return 25;
}
add_filter('excerpt_length', 'ahava_custom_excerpt_length', 999);

/**
 * Add custom body classes
 */
function ahava_body_classes($classes) {
    if (is_singular()) {
        global $post;
        $classes[] = $post->post_type . '-' . $post->post_name;
    }
    return $classes;
}
add_filter('body_class', 'ahava_body_classes'); 