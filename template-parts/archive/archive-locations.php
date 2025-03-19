<?php /*

 * Template Name: Locations

 */

get_header(); ?>



<section class="top_baner_locations">
    <?php if (have_rows('top_banner_locations', 'option')) : ?>
        <?php while (have_rows('top_banner_locations', 'option')) : the_row();
            $image_locations_page = get_sub_field('image_locations_page');
            $small_title_locations_page = get_sub_field('small_title_locations_page');
            $title_locations_page = get_sub_field('title_locations_page');
            $description_locations_page = get_sub_field('description_locations_page');
        ?>

            <?php
            if (!empty($image_locations_page)) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_locations_page['url']; ?>');"><?php } ?>
                <div class="baner_desc">
                    <span><?php echo $small_title_locations_page; ?></span>
                    <h1><?php echo $title_locations_page; ?></h1>
                    <p><?php echo $description_locations_page; ?></p>
                </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <?php get_template_part('blocks/custom-booking'); ?>
        <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>



<section class="main_location_list">

    <div class="filter location_filter">
        <?php echo do_shortcode('[searchandfilter id="608"]'); ?>
    </div>

    <div class="flex-wrap content-locations">
        <?php 
			if(have_posts()):
				while ( have_posts() ) : 
					the_post(); 

// 		if (have_posts()) : 
// 			while (have_posts()) : the_post(); 
			$coming_soon = get_field("coming_soon"); 
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
							if(!$coming_soon):
                            $link_address = get_field('address_location');
                            if ($link_address) :
                                $link_url = $link_address['url'];
                                $link_title = $link_address['title'];
                                $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                            ?>
                                <a class="button" href="<?php echo esc_url($link_url); ?>" target="_blank">
                                    <p><i class="fas fa-map-marker-alt"></i><?php echo esc_html($link_title); ?></p>
                                </a>
                            <?php endif; ?>

                            <p><a class="tel_location" href="tel:<?php the_field('phone_location'); ?>"><i class="fas fa-phone-alt"></i><?php the_field('phone_location'); ?></a></p>

							<?php else: ?>
							<p>
								Location coming soon
							</p>
							<?php endif; ?>
							
                            <ul class="locatopns_links">
                                <li>
                                    <?php if(!$coming_soon): ?>
										<a class="schedule_btn" href="<?php echo get_site_url(); ?>/request-appointment?location=<?php the_title(); ?>">Schedule appointment</a>
									<?php else: ?>
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
			wp_reset_postdata(); 

        else : ?>
            <p class="error"><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
        <?php endif; ?>
    </div>
</section>






<?php get_footer(); ?>