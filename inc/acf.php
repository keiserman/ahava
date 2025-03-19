<?php
/**
 * Advanced Custom Fields functions
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Register ACF Options Pages
 */
function ahava_register_acf_options_pages() {
    if (function_exists('acf_add_options_page')) {
        // Main Options Page
        acf_add_options_page(array(
            'page_title' => __('Theme Options', 'ahava-medical'),
            'menu_title' => __('Theme Options', 'ahava-medical'),
            'menu_slug' => 'theme-options',
            'capability' => 'edit_posts',
            'redirect' => false,
        ));
        
        // Testimonials Page
        acf_add_options_page(array(
            'page_title' => __('Testimonials', 'ahava-medical'),
            'menu_title' => __('Testimonials', 'ahava-medical'),
            'menu_slug' => 'testimonials',
            'capability' => 'edit_posts',
            'redirect' => false,
        ));
        
        // Filter Pages
        $filter_pages = array(
            'doctors' => __('Doctors', 'ahava-medical'),
            'locations' => __('Locations', 'ahava-medical'),
            'careers' => __('Careers', 'ahava-medical'),
            'departments' => __('Departments', 'ahava-medical'),
        );
        
        foreach ($filter_pages as $slug => $title) {
            acf_add_options_sub_page(array(
                'page_title' => $title . ' ' . __('Filter', 'ahava-medical'),
                'menu_title' => $title . ' ' . __('Filter', 'ahava-medical'),
                'parent_slug' => 'testimonials',
            ));
        }
    }
}
add_action('acf/init', 'ahava_register_acf_options_pages'); 