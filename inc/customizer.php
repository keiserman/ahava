<?php
/**
 * Theme Customizer settings for Ahava Medical theme
 *
 * @package Ahava_Medical
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 */
function ahava_customize_register($wp_customize) {
    // Add section for theme options
    $wp_customize->add_section('ahava_theme_options', array(
        'title'    => __('Theme Options', 'ahava-medical'),
        'priority' => 130,
    ));

    // Add setting for primary color
    $wp_customize->add_setting('primary_color', array(
        'default'           => '#0073e6',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for primary color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label'    => __('Primary Color', 'ahava-medical'),
        'section'  => 'ahava_theme_options',
        'settings' => 'primary_color',
    )));

    // Add setting for secondary color
    $wp_customize->add_setting('secondary_color', array(
        'default'           => '#005bb7',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for secondary color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'secondary_color', array(
        'label'    => __('Secondary Color', 'ahava-medical'),
        'section'  => 'ahava_theme_options',
        'settings' => 'secondary_color',
    )));

    // Add setting for accent color
    $wp_customize->add_setting('accent_color', array(
        'default'           => '#ff6b6b',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for accent color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label'    => __('Accent Color', 'ahava-medical'),
        'section'  => 'ahava_theme_options',
        'settings' => 'accent_color',
    )));

    // Add section for header options
    $wp_customize->add_section('ahava_header_options', array(
        'title'    => __('Header Options', 'ahava-medical'),
        'priority' => 131,
    ));

    // Add setting for header background color
    $wp_customize->add_setting('header_background_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for header background color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_background_color', array(
        'label'    => __('Header Background Color', 'ahava-medical'),
        'section'  => 'ahava_header_options',
        'settings' => 'header_background_color',
    )));

    // Add setting for header text color
    $wp_customize->add_setting('header_text_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for header text color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_text_color', array(
        'label'    => __('Header Text Color', 'ahava-medical'),
        'section'  => 'ahava_header_options',
        'settings' => 'header_text_color',
    )));

    // Add section for footer options
    $wp_customize->add_section('ahava_footer_options', array(
        'title'    => __('Footer Options', 'ahava-medical'),
        'priority' => 132,
    ));

    // Add setting for footer background color
    $wp_customize->add_setting('footer_background_color', array(
        'default'           => '#333333',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for footer background color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_background_color', array(
        'label'    => __('Footer Background Color', 'ahava-medical'),
        'section'  => 'ahava_footer_options',
        'settings' => 'footer_background_color',
    )));

    // Add setting for footer text color
    $wp_customize->add_setting('footer_text_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    // Add control for footer text color
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_text_color', array(
        'label'    => __('Footer Text Color', 'ahava-medical'),
        'section'  => 'ahava_footer_options',
        'settings' => 'footer_text_color',
    )));

    // Add section for typography options
    $wp_customize->add_section('ahava_typography_options', array(
        'title'    => __('Typography Options', 'ahava-medical'),
        'priority' => 133,
    ));

    // Add setting for body font
    $wp_customize->add_setting('body_font', array(
        'default'           => 'proxima-nova',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for body font
    $wp_customize->add_control('body_font', array(
        'label'    => __('Body Font', 'ahava-medical'),
        'section'  => 'ahava_typography_options',
        'type'     => 'select',
        'choices'  => array(
            'proxima-nova' => 'Proxima Nova',
            'helvetica'    => 'Helvetica',
            'arial'        => 'Arial',
        ),
    ));

    // Add setting for heading font
    $wp_customize->add_setting('heading_font', array(
        'default'           => 'proxima-nova',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    // Add control for heading font
    $wp_customize->add_control('heading_font', array(
        'label'    => __('Heading Font', 'ahava-medical'),
        'section'  => 'ahava_typography_options',
        'type'     => 'select',
        'choices'  => array(
            'proxima-nova' => 'Proxima Nova',
            'helvetica'    => 'Helvetica',
            'arial'        => 'Arial',
        ),
    ));

    // Add section for social media links
    $wp_customize->add_section('ahava_social_options', array(
        'title'    => __('Social Media Links', 'ahava-medical'),
        'priority' => 134,
    ));

    // Add setting for Facebook URL
    $wp_customize->add_setting('facebook_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for Facebook URL
    $wp_customize->add_control('facebook_url', array(
        'label'    => __('Facebook URL', 'ahava-medical'),
        'section'  => 'ahava_social_options',
        'type'     => 'url',
    ));

    // Add setting for Twitter URL
    $wp_customize->add_setting('twitter_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for Twitter URL
    $wp_customize->add_control('twitter_url', array(
        'label'    => __('Twitter URL', 'ahava-medical'),
        'section'  => 'ahava_social_options',
        'type'     => 'url',
    ));

    // Add setting for Instagram URL
    $wp_customize->add_setting('instagram_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for Instagram URL
    $wp_customize->add_control('instagram_url', array(
        'label'    => __('Instagram URL', 'ahava-medical'),
        'section'  => 'ahava_social_options',
        'type'     => 'url',
    ));

    // Add setting for LinkedIn URL
    $wp_customize->add_setting('linkedin_url', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    ));

    // Add control for LinkedIn URL
    $wp_customize->add_control('linkedin_url', array(
        'label'    => __('LinkedIn URL', 'ahava-medical'),
        'section'  => 'ahava_social_options',
        'type'     => 'url',
    ));
}
add_action('customize_register', 'ahava_customize_register');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function ahava_customize_preview_js() {
    wp_enqueue_script('ahava-customizer', get_template_directory_uri() . '/assets/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'ahava_customize_preview_js'); 