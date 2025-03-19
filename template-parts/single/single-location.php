<?php get_header(); ?>

<section class="single_location">

	<?php $coming_soon = get_field('coming_soon'); $can_book = get_field('can_book'); ?>
    <div class="flex-wrap">
        <div class="single_location_left">
            <?php the_post_thumbnail('full', array('class' => 'post_img')); ?>
            <div class="desk_map"><?php echo get_field('single_location_map'); ?></div>
			
        </div>
        <div class="single_location_right">

            <ul class="custom_breadcrump">
                <li><a href="/locations/">Locations</a></li>
                <li><i class="fal fa-angle-right"></i></li>
                <li><?php the_title(); ?></li>
            </ul>

            <h1 class="location_title"><?php the_title(); ?></h1>
            <div class="location_content">
                <?php if(!$coming_soon) : 
// 						the_content(); 
					  else:
						echo "Location coming soon";
					  endif;
				?>
            </div>

            <hr class="location_line-1">

			<div class="single_location_link">
                <?php
                $link_address = get_field('address_location');
                if ($link_address) :
                    $link_url = $link_address['url'];
                    $link_title = $link_address['title'];
                    $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                ?>
                    <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                        <p><i class="fas fa-map-marker-alt"></i><?php echo esc_html($link_title); ?></p>
                    </a>
                <?php endif; ?>

                <p><a class="tel_location" href="tel:<?php the_field('phone_location'); ?>"><i class="fas fa-phone-alt"></i><?php the_field('phone_location'); ?></a></p>
				
				<?php if($link_address): ?>
                <div class="location_single_link">
                    <a href="<?php echo esc_url($link_url); ?>" target="_blank"><img src="<?php echo bloginfo('template_directory'); ?>/images/location_icon.svg" /> GET DIRECTIONS</a>
                </div>
				<?php endif; ?>
            </div>

           <?php if(!$coming_soon && $can_book): ?>
            <ul class="single_location_appointment">
                <li>
                    <a class="schedule_btn" href="<?php echo get_site_url(); ?>/request-appointment?location=<?php the_title(); ?>">Schedule appointment</a>
                </li>
                <li>
                    <?php
                    $rate_this_location = get_field('rate_this_location');
                    if ($rate_this_location) : ?>
                        <a class="rate_button" href="<?php echo esc_url($rate_this_location); ?>" target="_blank">RATE THIS LOCATION</a>
                    <?php endif; ?>
                </li>
            </ul>
			<?php endif; ?>
			
								
			<?php if(get_field('book_form')): ?>
				<ul class="single_location_appointment">
					<li>
						<a class="schedule_btn" href="#schedule"><span style="color: #fff;">Request a Visit</span></a>
					</li>
			</ul>
			<?php endif; ?>


            <div class="mob_map"><?php the_field('single_location_map'); ?></div>

            <hr class="location_line-2">

           <?php if(!$coming_soon): ?>
            <div class="location_open_hours">
                <h3>Open hours (EST):</h3>
				<?php if (have_rows('open_hours')) : ?>
					<?php while (have_rows('open_hours')) : the_row();
						$location_day = get_sub_field('location_day');
						$location_time = get_sub_field('location_time');

						if($location_day && $location_time):
					?>
						<ul>

                            <li>
                                <div class="location_day">
                                    <p><?php echo $location_day; ?></p>
                                </div>

                                <div class="location_time">
                                    <p><?php echo $location_time; ?></p>
                                </div>
                            </li>
						</ul>
				
					<?php else: ?>
                                <div class="">
                                    <p><?php echo $location_day; ?></p>
                                </div>
					<?php endif; ?>
					<?php endwhile; ?>
				<?php endif; ?>
            </div>

            <hr class="location_line-3">


            <h2 class="service_providing">PROVIDING SERVICES:</h2>
            <div class="services_on_location">

                <?php
                $services_on_location = get_field('services_on_location');
                if ($services_on_location) : ?>
                    <?php foreach ($services_on_location as $p) : ?>
                        <div class="location_service_link">
                            <a href="<?php echo get_permalink($p->ID); ?>">
                                <div class="loc_service_img">
                                    <?php
                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($p->ID), 'full');
                                    $url = $thumb['0'];
                                    ?>
                                    <img src="<?= $url ?>" alt="<?= get_the_title($p->ID); ?> icon">
                                </div>

                                <div class="loc_service_title">
                                    <h3><?php echo get_the_title($p->ID); ?></h3>
                                </div>


                            </a>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
                <?php endif; ?>
        </div>
    </div>

</section>


			<?php if(get_field('book_form')): ?>
			<div class="request_app on_wheels_request" id="schedule">
				<div class="inner">
					<div class="request_app_right contact_pg_right">
						<h2>Book Ahava On Wheels</h2>
						<div class="main_contact_form">
							<?php echo do_shortcode(get_field('book_form')); ?>
						</div>
					</div>
				</div>
			</div>
			<?php endif; ?>

<?php 
	if(!$coming_soon):
        $doctors_at_this_location = get_field('doctors_at_this_location');
	if($doctors_at_this_location):
?>
<div class="doctors_at_this_locations">
    <div class="heading">
        <h2>Doctors at this location</h2>
    </div>
    <div id="dr_location_slide" class="owl-carousel products">
        <?php
        if ($doctors_at_this_location) : ?>
            <?php foreach ($doctors_at_this_location as $pdoctors) : ?>
                <div class="dr_location_carousel">
                    <div class="doctors_img">
                        <a href="<?php echo get_permalink($pdoctors->ID); ?>">
                            <?php
                            $thumbb = wp_get_attachment_image_src(get_post_thumbnail_id($pdoctors->ID), 'full');
							if(!$thumbb) {
								$url = "https://ahavamedical.com/wp-content/uploads/2022/08/Ahava-medical-favicon.png";?>
                            <img src="<?= $url ?>" alt="placeholder image">
							<?php
							} else {
								$url = $thumbb['0'];	?>
                            <img src="<?= $url ?>" alt="<?= get_the_title($pdoctors->ID); ?>">
							<?php
							}
                            ?>
                        </a>
                    </div>

                    <div class="doctors_desc">
                        <h3><?php echo get_the_title($pdoctors->ID); ?></h3>
                        <ul class="taxonomy_list">
                            <?php
                            $terms = get_the_terms($pdoctors->ID, 'doctorsservices');
							if($terms) {
								foreach ($terms as $term) {

									echo '<li>' .  $term->name . '</li>';
								}
							}
                            ?>
                        </ul>
                    </div>
                </div>


            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <a class="location_all_d_btn" href="/our-doctors/">SEE ALL DOCTORS</a>

</div>
<?php endif; ?>


<?php if (get_field('location_testimonial')) : ?>
<div class="location_testimonial">
    <div class="heading">
        <h2>Words of our patients</h2>
    </div>
	
    <ul id="testimonial_sider" class="owl-carousel products">
        <?php if (have_rows('location_testimonial')) : ?>
            <?php while (have_rows('location_testimonial')) : the_row();
                $name_location_testimonial = get_sub_field('name_location_testimonial');
                $stars_name_location_testimonial = get_sub_field('stars_name_location_testimonial');
                $description_name_location_testimonial = get_sub_field('description_name_location_testimonial');
            ?>
                <li>
                    <h3><?php echo $name_location_testimonial; ?></h3>

                    <div class="t_rang_stars">
                        <ul class="no-active_star">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <?php
                        if ($stars_name_location_testimonial) : ?>
                            <ul class="active_star">
                                <?php foreach ($stars_name_location_testimonial as $tura) : ?>
                                    <li><?php echo $tura; ?></li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>

                    <p><?php echo $description_name_location_testimonial; ?></p>

                </li>

            <?php endwhile; ?>
        <?php endif; ?>
    </ul>


    <ul class="single_testimonial_links">
        <?php if (have_rows('testimonial_link')) : ?>
            <?php while (have_rows('testimonial_link')) : the_row();

            ?>

                <li>
                    <?php
                    $see_all_reviews = get_sub_field('see_all_reviews');
                    if ($see_all_reviews) :
                        $link_url = $see_all_reviews['url'];
                        $link_title = $see_all_reviews['title'];
                        $link_target = $see_all_reviews['target'] ? $see_all_reviews['target'] : '_self';
                    ?>
                        <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><?php echo esc_html($link_title); ?></a>
                    <?php endif; ?>
                </li>


                <li>
                    <?php
                    $submit_feedback = get_sub_field('submit_feedback');
                    if ($submit_feedback) :
                        $link_url1 = $submit_feedback['url'];
                        $link_title1 = $submit_feedback['title'];
                        $link_target1 = $submit_feedback['target'] ? $submit_feedback['target'] : '_self';
                    ?>
                        <a class="button" href="<?php echo esc_url($link_url1); ?>" target="_blank"><?php echo esc_html($link_title1); ?></a>
                    <?php endif; ?>
                </li>



            <?php endwhile; ?>
        <?php endif; ?>
    </ul>


</div>
<?php endif; endif; ?>


<div class="single_location_other_location desk_location">

    <h2>Other locations</h2>

    <div class="flex-wrap">
        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'location',
            'posts_per_page' => 99,

            'post__not_in' => array($post->ID),

            'paged' => $paged
        );

        $wp_query = new WP_Query($args);
        while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>

            <div class="post_content">
                <div class="post_content_wrap">

                    <div class="blog_img">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_post_thumbnail('full', array('class' => 'post_img')); ?>
                        </a>
                    </div>


                    <div class="post_desc">
                        <h3><?php the_title(); ?></h3>

                        <?php
						$coming_soon_location = get_field('coming_soon');
						$can_book = get_field('can_book');
						
						if(!$coming_soon_location):
                        $link_address = get_field('address_location');
                        if ($link_address) :
                            $link_url = $link_address['url'];
                            $link_title = $link_address['title'];
                            $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                        ?>
                            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <p><?php echo esc_html($link_title); ?></p>
                            </a>
                        <?php endif; ?>

                        <p><a class="tel_location" href="tel:<?php the_field('phone_location'); ?>"><?php the_field('phone_location'); ?></a></p>
	
						<?php else: ?>
							<p>Location coming soon</p>
							<p>&nbsp;</p>
						<?php endif; ?>
                        <ul class="locatopns_links">
                            <li>
                                <?php
                                $schedule_appointment_location = get_field('schedule_appointment_location');
								if(!$coming_soon_location):
                                	if ($can_book && $schedule_appointment_location) : ?>
                                    	<a class="schedule_btn" href="<?php echo esc_url($schedule_appointment_location['url']); ?>">Schedule appointment</a>
                                <?php 
									endif; 
								else:?>
									<span class="schedule_btn disabled">Coming Soon</span>
								<?php endif; ?>
								
                            </li>
                            <li>
                                <a class="more_l_btn" href="<?php echo get_permalink(); ?>">VIEW LOCATION</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        <?php endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <!-- Resetovanje -->
    </div>

</div>



<!-- Mob location carousel -->


<div class="single_location_other_location mob_location">

    <h2>Other locations</h2>

    <div class="mobile_location_slide owl-carousel">

        <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
            'post_type' => 'location',
            'posts_per_page' => 99,

            'post__not_in' => array($post->ID),

            'paged' => $paged
        );

        $wp_query = new WP_Query($args);
        while ($wp_query->have_posts()) : $wp_query->the_post();
        ?>

            <div class="post_content">
                <div class="post_content_wrap">

                    <div class="blog_img">
                        <a href="<?php echo get_permalink(); ?>">
                            <?php the_post_thumbnail('full', array('class' => 'post_img')); ?>
                        </a>
                    </div>


                    <div class="post_desc">
                        <h3><?php the_title(); ?></h3>

                        <?php
                        $link_address = get_field('address_location');
                        if ($link_address) :
                            $link_url = $link_address['url'];
                            $link_title = $link_address['title'];
                            $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                        ?>
                            <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                <p><?php echo esc_html($link_title); ?></p>
                            </a>
                        <?php endif; ?>

                        <p><a class="tel_location" href="tel:<?php the_field('phone_location'); ?>"><?php the_field('phone_location'); ?></a></p>

                        <ul class="locatopns_links">
                            <li>
                                <?php
                                $schedule_appointment_location = get_field('schedule_appointment_location');
                                if ($schedule_appointment_location) : ?>
                                    <a class="schedule_btn" href="<?php echo esc_url($schedule_appointment_location['url']); ?>">Schedule appointment</a>
                                <?php endif; ?>
                            </li>
                            <li>
                                <a class="more_l_btn" href="<?php echo get_permalink(); ?>">VIEW LOCATION</a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>

        <?php endwhile;
        wp_reset_query();
        wp_reset_postdata(); ?>
        <!-- Resetovanje -->
    </div>

</div>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>



    <?php endwhile;
else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>




<?php get_footer(); ?>