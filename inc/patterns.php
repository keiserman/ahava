<?php
/**
 * Register block patterns
 */
function ahava_register_block_patterns() {
    register_block_pattern_category(
        'ahava',
        array( 'label' => __( 'Ahava Medical', 'ahava' ) )
    );

    $patterns = array(
        'hero-section',
        'service-card',
        'doctor-profile',
        'testimonial',
        'cta-section'
    );

    foreach ( $patterns as $pattern ) {
        register_block_pattern(
            'ahava/' . $pattern,
            require get_template_directory() . '/patterns/' . $pattern . '.php'
        );
    }
}
add_action( 'init', 'ahava_register_block_patterns' ); 