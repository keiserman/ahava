<?php /*

 * Template Name: Request

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
            <iframe  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class="request_app_right contact_pg_right">
            <h2>Give us some info about you</h2>
			<p>
				
			</p>
			<div class="main_contact_form">
				<?php echo apply_shortcodes( '[contact-form-7 id="933" title="Request Appointment"]' ); ?>
			</div>
        </div>
    </div>
</section>







<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.10.4/ScrollToPlugin.min.js"></script>

<script src="<?php echo bloginfo('template_directory');?>/js/owl.carousel.min.js"></script>

<script src="<?php echo bloginfo('template_directory');?>/js/jquery.waypoints.min.js"></script>
<script src="<?php echo bloginfo('template_directory');?>/js/jquery.countup.min.js"></script>

<script src="<?php echo bloginfo('template_directory');?>/js/main.js"></script>

<?php get_footer(); ?>


