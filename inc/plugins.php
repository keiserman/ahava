<?php
/**
 * Plugin-related functions
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Check for required plugins
 */
function ahava_check_required_plugins() {
    $required_plugins = array(
        'advanced-custom-fields' => 'Advanced Custom Fields',
        'contact-form-7' => 'Contact Form 7'
    );
    
    $missing_plugins = array();
    
    foreach ($required_plugins as $plugin => $name) {
        if (!is_plugin_active($plugin . '/' . $plugin . '.php')) {
            $missing_plugins[] = $name;
        }
    }
    
    if (!empty($missing_plugins)) {
        add_action('admin_notices', function() use ($missing_plugins) {
            $plugins = implode(', ', $missing_plugins);
            echo '<div class="error"><p>' . 
                 sprintf(__('Ahava Medical theme requires the following plugins: %s', 'ahava-medical'), $plugins) . 
                 '</p></div>';
        });
    }
}
add_action('admin_init', 'ahava_check_required_plugins');

/**
 * Custom Contact Form 7 Placeholder
 */
function ahava_cf7_placeholders($html) {
    $placeholders = array(
        'Subject' => __('Subject', 'ahava-medical'),
        'Location' => __('Location', 'ahava-medical'),
    );
    
    foreach ($placeholders as $name => $text) {
        $html = preg_replace(
            '/<select name="' . $name . '"[^>]*>(.*)<\/select>/iU',
            '<select name="' . $name . '"><option value="" disabled selected>' . $text . '</option>$1</select>',
            $html
        );
    }
    
    return $html;
}
add_filter('wpcf7_form_elements', 'ahava_cf7_placeholders'); 