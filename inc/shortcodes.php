<?php
/**
 * Shortcode functions
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Custom Booking Shortcode
 */
function ahava_booking_shortcode() {
    ob_start();
    get_template_part('template-parts/content/booking');
    return ob_get_clean();
}
add_shortcode('custom_booking', 'ahava_booking_shortcode'); 