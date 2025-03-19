<?php /*

 * Template Name: Home

 */

get_header(); ?>



<section class="top_baner">
    <?php if( have_rows('top_baner') ): ?>
        <?php while( have_rows('top_baner') ): the_row(); 
            $image_top_baner = get_sub_field('image_top_baner');
            $title_top_baner = get_sub_field('title_top_baner');
            $description_top_baner = get_sub_field('description_top_baner');
            ?>

            <?php 
                if ( !empty( $image_top_baner ) ) { ?>
                    <div class="tb-content">
                    <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_top_baner['url']; ?>');"><?php }?> 
                        <div class="top_baner_desc">
                            <img src="<?php echo bloginfo('template_directory');?>/images/Top-banner-element.png" />
                            <h1><?php echo $title_top_baner; ?></h1>
                            <p><?php echo $description_top_baner; ?></p>
                        </div>
                        </div>
                    </div>
        <?php endwhile; ?>
    <?php endif; ?>  

 <?php get_template_part('blocks/custom-booking'); ?>
 <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
    
</section>

<section class="home_services">
    <div class="flex-wrap">
        <div class="left_service">
            <?php if( have_rows('home_service_left') ): ?>
            <?php while( have_rows('home_service_left') ): the_row(); 
                $top_title_service_left = get_sub_field('top_title_service_left');
                $title_big_service_left = get_sub_field('title_big_service_left');
                ?>

                <span><?php echo $top_title_service_left; ?></span>
                <h2 class="heading"><?php echo $title_big_service_left; ?></h2>

                <a class="desk_btn_service" href="/our-services/">SEE ALL SERVICES</a>

                <?php endwhile; ?>
            <?php endif; ?> 
        </div>


        <div class="right_service">
            <ul>
            <?php if( have_rows('home_service_right') ): ?>
            <?php while( have_rows('home_service_right') ): the_row(); 
                $icon_right_service = get_sub_field('icon_right_service');
                $title_right_service = get_sub_field('title_right_service');
                $description_right_service = get_sub_field('description_right_service');
            ?>

                <li>
                    <div class="service_icon">
                        <img src="<?php echo esc_url( $icon_right_service['url'] ); ?>" />
                    </div>
                    <div class="service_desc">
                        <h3><?php echo $title_right_service; ?></h3>
                        <p><?php echo $description_right_service; ?></p>
                    </div>
                </li>
        
            <?php endwhile; ?>
            <?php endif; ?> 
            </ul>

            <a class="mob_btn_service" href="/services">SEE ALL SERVICES</a>
        </div>
    </div>
</section>


<section class="featured_services">
     <ul>
            <?php if( have_rows('featured_services') ): ?>
            <?php while( have_rows('featured_services') ): the_row(); 
                $image_featured_services = get_sub_field('image_featured_services');
                $top_title_featured_services = get_sub_field('top_title_featured_services');
                $title_featured_services = get_sub_field('title_featured_services');
                $description_featured_services = get_sub_field('description_featured_services');
                $link_featured_services = get_sub_field('link_featured_services');
            ?>

                <li>

                    <div class="f_service_img">
                        <img src="<?php echo esc_url( $image_featured_services['url'] ); ?>" />
                    </div>

                    <div class="f_service_desc">
                        <div>
                        <span><?php echo $top_title_featured_services; ?></span>
                        <h2><?php echo $title_featured_services; ?></h2>
                        <p><?php echo $description_featured_services; ?></p>
                       

                       <?php 
                        $link_support = get_sub_field('link_featured_services');
                        if( $link_support ): 
                            $link_url = $link_support['url'];
                            $link_title = $link_support['title'];
                            $link_target = $link_support['target'] ? $link_support['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                    </div>

                    </div>
                </li>
        
            <?php endwhile; ?>
            <?php endif; ?> 
    </ul>
</section>


<section class="home_about_us">
    <div class="flex-wrap">
        <?php if( have_rows('about_us_section_homepage') ): ?>
            <?php while( have_rows('about_us_section_homepage') ): the_row(); 
                $image_about_home = get_sub_field('image_about_home');
                $smal_title_about_home = get_sub_field('smal_title_about_home');
                $title_about_home = get_sub_field('title_about_home');
                $description_about_home = get_sub_field('description_about_home');
            ?>

            <div class="home_ab_left">
                <img src="<?php echo esc_url( $image_about_home['url'] ); ?>" />
            </div>

            <div class="home_ab_right">
                <span><?php echo $smal_title_about_home; ?></span>
                <h2><?php echo $title_about_home; ?></h2>
                <p><?php echo $description_about_home; ?></p>

                <a href="/about/">Our Story</a>
            </div>

            <?php endwhile; ?>
            <?php endif; ?> 
    </div>
</section>




<section class="about_three_box">
    <div class="flex-wrap">
        <?php if( have_rows('about_three_box') ): ?>
            <?php while( have_rows('about_three_box') ): the_row(); 
                $image_three_box = get_sub_field('image_three_box');
                $title_three_box = get_sub_field('title_three_box');
                $description_three_box = get_sub_field('description_three_box');
            ?>
            <div class="ab_icon">

            <div class="about_three_box_left">
                <img src="<?php echo esc_url( $image_three_box['url'] ); ?>" />
            </div>

            <div class="about_three_box_right">
                <h3><?php echo $title_three_box; ?></h3>
                <p><?php echo $description_three_box; ?></p>
            </div>

            </div>

            <?php endwhile; ?>
            <?php endif; ?> 
    </div>

     <a class="mob_btn_about" href="/about/">About Us</a>
</section>


<section class="location_homepage desk_location">
    <div class="heading">
        <span>OUR LOCATIONS</span>
        <h2>Healthy spaces near you</h2>
    </div>

        <div class="flex-wrap">
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args=array(
                'post_type'=>'location',
                'posts_per_page' => 4, 
                'paged'=>$paged
            );

            $wp_query = new WP_Query($args);
            while($wp_query->have_posts()) : $wp_query->the_post();
            ?>

            <div class="post_content">
                <div class="post_content_wrap">
               
                    <div class="blog_img">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
                        </a>  
                    </div>
                 

                    <div class="post_desc">
                        <h3><?php the_title(); ?></h3>

                        <?php 
                        $link_address = get_field('address_location');
                        if( $link_address ): 
                            $link_url = $link_address['url'];
                            $link_title = $link_address['title'];
                            $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="_blank"><p><?php echo esc_html( $link_title ); ?></p></a>
                        <?php endif; ?>

                        <p><a class="tel_location" href="tel:<?php the_field('phone_location'); ?>"><?php the_field('phone_location'); ?></a></p>

                        <ul class="locatopns_links">
                            <li>
                                <a class="schedule_btn" href="/request-appointment/">Schedule appointment</a>
                            </li>
                            <li>
                                <a class="more_l_btn" href="<?php echo get_permalink(); ?>">VIEW LOCATION</a>
                            </li>
                        </ul>
                    </div>
               
            </div>
            </div>

           <?php endwhile; wp_reset_query(); wp_reset_postdata();?> <!-- Resetovanje -->
        </div>

        <a class="all_location" href="/locations/">SEE ALL LOCATIONS</a>

</section>

<!-- Mob location carousel -->


<section class="location_homepage mob_location">
    <div class="heading">
        <span>OUR LOCATIONS</span>
        <h2>Healthy spaces near you</h2>
    </div>

        <div class="mobile_location_slide owl-carousel">
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args=array(
                'post_type'=>'location',
                'posts_per_page' => 4, 
                'paged'=>$paged
            );

            $wp_query = new WP_Query($args);
            while($wp_query->have_posts()) : $wp_query->the_post();
            ?>

            <div class="post_content">
                <div class="post_content_wrap">
               
                    <div class="blog_img">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
                        </a>  
                    </div>
                 

                    <div class="post_desc">
                        <h3><?php the_title(); ?></h3>

                        <?php 
                        $link_address = get_field('address_location');
                        if( $link_address ): 
                            $link_url = $link_address['url'];
                            $link_title = $link_address['title'];
                            $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="_blank"><p><?php echo esc_html( $link_title ); ?></p></a>
                        <?php endif; ?>

                        <p><a class="tel_location" href="tel:<?php the_field('phone_location'); ?>"><?php the_field('phone_location'); ?></a></p>

                        <ul class="locatopns_links">
                            <li>
                                <?php 
                                    $schedule_appointment_location = get_field('schedule_appointment_location');
                                    if( $schedule_appointment_location ): ?>
                                        <a class="schedule_btn" href="<?php echo esc_url( $schedule_appointment_location['url'] ); ?>">Schedule appointment</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <a class="more_l_btn" href="<?php echo get_permalink(); ?>">VIEW LOCATION</a>
                            </li>
                        </ul>
                    </div>
               
            </div>
            </div>

           <?php endwhile; wp_reset_query(); wp_reset_postdata();?> <!-- Resetovanje -->
        </div>

        <a class="all_location" href="/locations/">SEE ALL LOCATIONS</a>

</section>








<!--  -->


<section class="testimonial">
    <div class="heading">
        <span>FEEDBACK</span>
        <h2>Words from our patients</h2>
    </div>

    <ul id="testimonial_sider" class="owl-carousel products">
        <?php if( have_rows('testimonial_home_about', 'option') ): ?>
        <?php while( have_rows('testimonial_home_about','option') ): the_row(); 
            $name_testimonial = get_sub_field('name_testimonial');
            $stars_testimonial = get_sub_field('stars_testimonial');
            $description_testimonial = get_sub_field('description_testimonial');
        ?>
        <li>
            <h3><?php echo $name_testimonial; ?></h3>
			<br />

<!--             <div class="t_rang_stars">
                <ul class="no-active_star">
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                    <li><i class="fas fa-star"></i></li>
                </ul>
                <?php
                //if( $stars_testimonial ): 
                ?>
                <ul class="active_star">
                    <?php //foreach( $stars_testimonial as $tura ): ?>
                        <li><?php echo $tura; ?></li>
                    <?php //endforeach; ?>
                </ul>
            <?php //endif; ?>
            </div> -->

            <p><?php echo $description_testimonial; ?></p>

        </li>

        <?php endwhile; ?>
        <?php endif; ?> 
    </ul>

</section>

<section class="home_insurance">

    <div class="insurance-wrap">
    <div class="flex-wrap align-center">

        <?php if( have_rows('home_insurance') ): ?>
        <?php while( have_rows('home_insurance') ): the_row(); 
            $smal_tittle_insurance = get_sub_field('smal_tittle_insurance');
            $title_insurance = get_sub_field('title_insurance');
            $description_insurance = get_sub_field('description_insurance');
           
        ?>

        <div class="h_insurance_left">
            <div class="heading">
               <span><?php echo $smal_tittle_insurance; ?></span>
               <h2><?php echo $title_insurance; ?></h2>
            </div>
            <p><?php echo $description_insurance; ?></p>
            <a class="insurance_desk" href="/about/insurance/">VIEW ALL ACCEPTED INSURANCES</a>
        </div>

         <div class="h_insurance_right">
             <?php 
            $logos_insurance = get_sub_field('logos_insurance');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $logos_insurance ): ?>
                <ul>
                    <?php foreach( $logos_insurance as $image_id ): ?>
                        <li>
                            <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <a class="insurance_mob" href="/about/insurance/">VIEW ALL ACCEPTED INSURANCES</a>
         </div>

        <?php endwhile; ?>
        <?php endif; ?> 
    </div>
    </div>
</section>


<section class="homepage_news">
    <div class="heading">
        <span>NEWS</span>
        <h2>Wellness Library</h2>
    </div>

    <ul class="flex-wrap homepage_news_slide owl-carousel">
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args=array(
            'post_type'=>'post',
            'posts_per_page' => 3, 
            'paged'=>$paged
        );

        $wp_query = new WP_Query($args);
        while($wp_query->have_posts()) : $wp_query->the_post();
    ?>

        <li>
            <div class="news_img">
                <a href="<?php echo get_permalink(); ?>">
                    <?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
                </a>  
            </div>
            <div class="news_desc">
                <p class="post_date"><?php echo get_the_time('d/m/Y'); ?></p>
				<a href="<?php echo get_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
                 <?php $post_content_pin = get_the_content(); ?>
                <p class="pinned-trim-words"><?php echo wp_trim_words( $post_content_pin, 20, ('...')); ?></p>
            </div>
        </li>

    <?php endwhile; wp_reset_query(); wp_reset_postdata();?> <!-- Resetovanje -->
    </ul>

    <a class="all_news" href="/news/">SEE ALL ARTICLES</a>
</section>




<?php get_footer(); ?>