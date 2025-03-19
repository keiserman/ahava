<?php
/**
 * Title: Testimonial
 * Slug: ahava/testimonial
 * Categories: ahava
 * Description: A testimonial card for patient reviews
 */
?>
<!-- wp:group {"className":"testimonial","layout":{"inherit":true}} -->
<div class="testimonial">
    <!-- wp:quote {"className":"testimonial-content"} -->
    <blockquote class="wp-block-quote testimonial-content">
        <p>Share your experience with our medical services and staff.</p>
    </blockquote>
    <!-- /wp:quote -->
    
    <!-- wp:group {"className":"testimonial-author","layout":{"inherit":true}} -->
    <div class="testimonial-author">
        <!-- wp:image {"className":"author-avatar","width":60,"height":60} -->
        <figure class="wp-block-image author-avatar is-resized">
            <img src="" alt="" width="60" height="60"/>
        </figure>
        <!-- /wp:image -->
        
        <!-- wp:group {"className":"author-info"} -->
        <div class="author-info">
            <!-- wp:paragraph {"className":"author-name"} -->
            <p class="author-name">Patient Name</p>
            <!-- /wp:paragraph -->
            <!-- wp:paragraph {"className":"author-location"} -->
            <p class="author-location">Location</p>
            <!-- /wp:paragraph -->
        </div>
        <!-- /wp:group -->
    </div>
    <!-- /wp:group -->
    
    <!-- wp:paragraph {"className":"visit-date"} -->
    <p class="visit-date">Visit Date: Month Year</p>
    <!-- /wp:paragraph -->
</div>
<!-- /wp:group --> 