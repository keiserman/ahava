<?php /*

 * Template Name: Request appointment app

 */

get_header(); ?>



<section class="top_baner_locations top_baner_request_app">
    <div class="center-all top_baner_content"> 
        <div class="baner_desc">
            <h1>Request appointment</h1>
        </div>
    </div>

     <?php get_template_part('blocks/custom-booking'); ?>

</section>

<section class="fillInToContinue">
<span><i class="fal fa-long-arrow-up"></i></span>
<p class="fill_appointment">Please fill in the above to continue</p>
</section>
<section class="request_app">
    <div class="flex-wrap">
        <div class="request_app_left">
            <iframe width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="request_app_right">
            <h2>Request a Visit</h2>


           <?php echo do_shortcode( '[contact03]'); ?>
        </div>
    </div>
</section>






<?php get_footer(); ?>


