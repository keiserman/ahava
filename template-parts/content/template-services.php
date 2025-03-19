<?php /*

 * Template Name: Services

 */

get_header(); ?>



<section class="top_baner_locations top_baner_services">
    <?php if( have_rows('top_banner_services') ): ?>
        <?php while( have_rows('top_banner_services') ): the_row(); 
            $image_services_page = get_sub_field('image_services_page');
            $small_title_services_page = get_sub_field('small_title_services_page');
            $title_services_page = get_sub_field('title_services_page');
            $description_locations_page = get_sub_field('description_locations_page');
            ?>

            <?php 
                if ( !empty( $image_services_page ) ) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_services_page['url']; ?>');"><?php }?> 
                    <div class="baner_desc">
                        <span><?php echo $small_title_services_page; ?></span>
                        <h1><?php echo $title_services_page; ?></h1>
                        <p><?php echo $description_locations_page; ?></p>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>  

     <?php get_template_part('blocks/custom-booking'); ?>

     <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>


<section class="service_list">
    <div class="grid-wrap">
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args=array(
                'post_type'=>'services',
                'posts_per_page' => 99,
				'orderby' => 'title',
				'order' => 'ASC',
                'paged'=>$paged
            );

            $wp_query = new WP_Query($args);
            while($wp_query->have_posts()) : $wp_query->the_post();
        ?>

        <div class="service_box_list">
            <a href="<?php echo get_permalink(); ?>">
            <div class="hover_service">
            <div class="box_service_img">
                <?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
            </div>

            <h1><?php the_title(); ?></h1>
            <p><?php the_field('short_description'); ?></p>

            <span>LEARN MORE</span>
        </div>
        </a>
        </div>

        <?php endwhile; wp_reset_query(); wp_reset_postdata();?> <!-- Resetovanje -->
    </div>
</section>









<?php get_footer(); ?>


