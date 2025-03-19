<?php /*

 * Template Name: About - Insurance

 */

get_header(); ?>



<section class="top_baner_locations top_baner_about_insurance_page">
    <?php if( have_rows('top_baner_insurance') ): ?>
        <?php while( have_rows('top_baner_insurance') ): the_row(); 
            $image_top_baner_insurance = get_sub_field('image_top_baner_insurance');
            $small_title_top_baner_insurance = get_sub_field('small_title_top_baner_insurance');
            $title_title_top_baner_insurance = get_sub_field('title_title_top_baner_insurance');
            $description_title_top_baner_insurance = get_sub_field('description_title_top_baner_insurance');
            ?>

            <?php 
                if ( !empty( $image_top_baner_insurance ) ) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_top_baner_insurance['url']; ?>');"><?php }?> 
                    <div class="baner_desc">
                        <span><?php echo $small_title_top_baner_insurance; ?></span>
                        <h1><?php echo $title_title_top_baner_insurance; ?></h1>
                        <p><?php echo $description_title_top_baner_insurance; ?></p>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>  
         <?php get_template_part('blocks/custom-booking'); ?>
        <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>


<section class="list_of_insurance">
    <div class="heading">
        <h2>List of insurances we accept</h2>  
    </div>

    <?php 
        $insurance_logos = get_field('insurance_logos');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $insurance_logos ): ?>
                <ul class="insurance_logos">
                    <?php foreach( $insurance_logos as $image_id ): ?>
                        <li>
                            <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
    <?php endif; ?>
</section>




<?php get_footer(); ?>


