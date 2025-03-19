<?php /*

 * Template Name: Transportation

 */

get_header(); ?>

<section class="top_baner_locations top_single_baner_services">
    <div class="center-all top_baner_content" style="background-image: url(<?php echo get_field('banner_image'); ?>);">
        <div class="baner_desc">
            <ul class="custom_breadcrump">
                <li><?php the_title(); ?></li>
            </ul>
            <h1><?php echo get_the_title(); ?></h1>
            <p><?php the_content(); ?></p>
        </div>
    </div>
         <?php get_template_part('blocks/custom-booking'); ?>
         <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>

<section class="single_service_desc">
    <div class="flex-wrap">
        <div class="single_service_left">
            <?php 
                $single_service_image = get_field('thumbnail_image');
                if( !empty( $single_service_image ) ): ?>
                    <img src="<?php echo $single_service_image; ?>" />
            <?php endif; ?>
        </div>
        <div class="single_service_right">
            <?php echo get_field('content'); ?>
        </div>
    </div>
</section>

<?php if( have_rows('faq_questions_and_answers') ): ?>
<section class="questions_answers_wrap">
    <h2><?php echo get_field('faq_title'); ?></h2>

    <div id="accordion" class="accordion-container">


    
        <?php while( have_rows('faq_questions_and_answers') ): the_row(); 
            $question = get_sub_field('question');
            $answers = get_sub_field('answer');
    ?>


    <article class="content-entry">
            <div class="article-title"><?php echo $question; ?><i></i></div>
            <div class="accordion-content">
              <p><?php echo nl2br($answers); ?></p>
            </div>
    </article>


    <?php endwhile; ?>

    </div>
</section>


<section class="single_service_locations desk_location">
    <h2>Locations Offering Transportation</h2>
        
        <div class="flex-wrap">

        <?php
            $single_service_locations = get_field('single_service_locations', $term);
              if( $single_service_locations ): ?>
              <?php foreach( $single_service_locations as $pp ): 

              $phone_location = get_field( 'phone_location', $pp->ID );

                ?>

                <div class="post_content">
                    <div class="post_content_wrap">
                        <div class="blog_img">
                            <a href="<?php echo get_permalink( $pp->ID ); ?>">
                                <?php
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pp->ID), 'full' );
                                    $url = $thumb['0'];
                                ?>
                                <img src="<?=$url?>">  
                            </a>  
                        </div>

                        <div class="post_desc">
                            <h3><?php echo get_the_title( $pp->ID ); ?></h3>

                            <?php 
                            $link_address = get_field('address_location', $pp->ID );
                            if( $link_address ): 
                                $link_url = $link_address['url'];
                                $link_title = $link_address['title'];
                                $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                                ?>
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><p><?php echo esc_html( $link_title ); ?></p></a>
                            <?php endif; ?>

                            <p><a class="tel_location" href="tel:<?php echo esc_html( $phone_location ); ?>"><?php echo esc_html( $phone_location ); ?></a></p>


                            <ul class="locatopns_links">
                            <li>
                                <a class="schedule_btn" href="/request-appointment/">Schedule appointment</a>
                            </li>
                            <li>
                                <a class="more_l_btn" href="<?php echo get_permalink( $pp->ID ); ?>">VIEW LOCATION</a>
                            </li>
                        </ul>

                        </div>

                </div>
            </div>
              <?php endforeach; ?>
              <?php endif; ?>

            </div>


        <a class="all_location" href="/locations/">SEE ALL LOCATIONS</a>

</section>

<!-- Mob location carousel -->

<section class="single_service_locations mob_location">
    <h2>Locations treating this service</h2>
        
        <div class="mobile_location_slide owl-carousel">

        <?php
            $single_service_locations = get_field('single_service_locations', $term);
              if( $single_service_locations ): ?>
              <?php foreach( $single_service_locations as $pp ): 

              $phone_location = get_field( 'phone_location', $pp->ID );

                ?>

                <div class="post_content">
                    <div class="post_content_wrap">
                        <div class="blog_img">
                            <a href="<?php echo get_permalink( $pp->ID ); ?>">
                                <?php
                                    $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($pp->ID), 'full' );
                                    $url = $thumb['0'];
                                ?>
                                <img src="<?=$url?>">  
                            </a>  
                        </div>

                        <div class="post_desc">
                            <h3><?php echo get_the_title( $pp->ID ); ?></h3>

                            <?php 
                            $link_address = get_field('address_location', $pp->ID );
                            if( $link_address ): 
                                $link_url = $link_address['url'];
                                $link_title = $link_address['title'];
                                $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                                ?>
                                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><p><?php echo esc_html( $link_title ); ?></p></a>
                            <?php endif; ?>

                            <p><a class="tel_location" href="tel:<?php echo esc_html( $phone_location ); ?>"><?php echo esc_html( $phone_location ); ?></a></p>


                            <ul class="locatopns_links">
                            <li>
                                <?php 
                                    $schedule_appointment_location = get_field('schedule_appointment_location', $pp->ID);
                                    if( $schedule_appointment_location ): ?>
                                        <a class="schedule_btn" href="<?php echo esc_url( $schedule_appointment_location ); ?>">Schedule appointment</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <a class="more_l_btn" href="<?php echo get_permalink( $pp->ID ); ?>">VIEW LOCATION</a>
                            </li>
                        </ul>

                        </div>

                </div>
            </div>
              <?php endforeach; ?>
              <?php endif; ?>

            </div>


        <a class="all_location" href="/locations/">SEE ALL LOCATIONS</a>

</section>


<?php endif; ?>





<?php get_footer(); ?>