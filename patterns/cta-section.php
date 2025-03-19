<?php
/**
 * Title: Call to Action Section
 * Slug: ahava/cta-section
 * Categories: ahava
 * Description: A call to action section for appointment scheduling
 */
?>
<!-- wp:group {"className":"cta-section","layout":{"inherit":true}} -->
<div class="cta-section">
    <!-- wp:heading {"className":"cta-title"} -->
    <h2 class="cta-title">Ready to Schedule Your Appointment?</h2>
    <!-- /wp:heading -->
    
    <!-- wp:paragraph {"className":"cta-description"} -->
    <p class="cta-description">Contact us today to schedule your appointment with our healthcare providers.</p>
    <!-- /wp:paragraph -->
    
    <!-- wp:buttons {"className":"cta-buttons"} -->
    <div class="wp-block-buttons cta-buttons">
        <!-- wp:button {"className":"cta-primary","size":"large"} -->
        <div class="wp-block-button cta-primary">
            <a class="wp-block-button__link wp-element-button" href="/request-appointment/">Request Appointment</a>
        </div>
        <!-- /wp:button -->
        
        <!-- wp:button {"className":"cta-secondary","size":"large","isOutline":true} -->
        <div class="wp-block-button cta-secondary">
            <a class="wp-block-button__link wp-element-button" href="/contact/">Contact Us</a>
        </div>
        <!-- /wp:button -->
    </div>
    <!-- /wp:buttons -->
</div>
<!-- /wp:group --> 