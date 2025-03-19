<?php get_header(); ?>


<section class="single_doctors">
    <div class="flex-wrap">
        <div class="single_doctors_img">

            <ul class="custom_breadcrump mob_breadcrumps">
                <li><a href="/our-doctors/">Doctors</a></li>
                <li><i class="fal fa-angle-right"></i></li>
                <li><?php the_title(); ?></li>
            </ul>


            <?php the_post_thumbnail('full', array('class' => 'post_img')); ?>
        </div>
        <div class="single_doctors_desc">
            <ul class="custom_breadcrump">
                <li><a href="/our-doctors/">Doctors</a></li>
                <li><i class="fal fa-angle-right"></i></li>
                <li><?php the_title(); ?></li>
            </ul>




            <div class="title_social">
                <h1 class="single_doctor_title"><?php the_title(); ?></h1>

                <div class="doctors_social desk_social">
                    <?php if (have_rows('doctors_social_links')) : ?>
                        <?php while (have_rows('doctors_social_links')) : the_row();
                            $icon_doctor_social = get_sub_field('icon_doctor_social');
                        ?>
                            <div class="dr_soc">
                                <?php
                                $link_doctor_social = get_sub_field('link_doctor_social');
                                if ($link_doctor_social) : ?>
                                    <a class="button" href="<?php echo esc_url($link_doctor_social); ?>"><?php echo $icon_doctor_social; ?><span class="accessibility-hidden">Social Icon</span></a>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>


            </div>

            <ul class="taxonomy_list">
                <?php
                $terms = get_the_terms($post->ID, 'doctorsservices');

				if($terms):
                foreach ($terms as $term) {

                    echo '<li>' .  $term->name . '</li>';
                }
				endif;
                ?>
            </ul>



            <div class="doctors_social mobile_social">
                <?php if (have_rows('doctors_social_links')) : ?>
                    <?php while (have_rows('doctors_social_links')) : the_row();
                        $icon_doctor_social = get_sub_field('icon_doctor_social');
                    ?>
                        <div class="dr_soc">
                            <?php
                            $link_doctor_social = get_sub_field('link_doctor_social');
                            if ($link_doctor_social) : ?>
                                <a class="button" href="<?php echo esc_url($link_doctor_social); ?>"><?php echo $icon_doctor_social; ?><span class="accessibility-hidden">Social Icon</span></a>
                            <?php endif; ?>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>



            <div class="single_dr_content">
                <?php the_content(); ?>
            </div>

            <div class="single_doctor_appointment">
                <a class="dr_single_schedule" href="<?php echo get_site_url(); ?>/request-appointment/?doctor=<?php the_title(); ?>">SCHEDULE APPOINTMENT</a>

            </div>




            <hr>

            <div class="single_doctors_main_desc">

                <div class="dr_practicing_and_services">

                    <div class="single_doctor_practicing">
                        <h3>PRACTICE LOCATION:</h3>

                        <div class="flex-wrap">

                            <?php
                            $practicing_location = get_field('practicing_location');
                            if ($practicing_location) : ?>
                                <?php foreach ($practicing_location as $ppp) :

                                    $phone_location = get_field('phone_location', $ppp->ID);

                                ?>

                                    <div class="post_content">
                                        <div class="post_content_wrap">
                                            <div class="post_desc">
                                                <h2>
                                                    <a href="<?php echo get_permalink($ppp->ID); ?>">
                                                        <?php echo get_the_title($ppp->ID); ?>
                                                    </a>
                                                </h2>

                                                <?php
                                                $link_address = get_field('address_location', $ppp->ID);
                                                if ($link_address) :
                                                    $link_url = $link_address['url'];
                                                    $link_title = $link_address['title'];
                                                    $link_target = $link_address['target'] ? $link_address['target'] : '_self';
                                                ?>
                                                    <a class="button" href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                                                        <p><?php echo esc_html($link_title); ?></p>
                                                    </a>
                                                <?php endif; ?>

                                                <p><a class="tel_location" href="tel:<?php echo esc_html($phone_location); ?>"><?php echo esc_html($phone_location); ?></a></p>

                                            </div>

                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            <?php endif; ?>

                        </div>

                        <!--  -->

                        <div class="single_doctor_services">

                            <div class="services_on_location">
                                <h2>SPECIALITY:</h2>
                                <?php
                                $services_providing_single = get_field('services_providing_single');
                                if ($services_providing_single) : ?>
                                    <?php foreach ($services_providing_single as $pppp) : ?>
                                        <div class="location_service_link">
                                            <a href="<?php echo get_permalink($pppp->ID); ?>">
                                                <div class="loc_service_img">
                                                    <?php
                                                    $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($pppp->ID), 'full');
                                                    $url = $thumb['0'];
                                                    ?>
                                                    <img src="<?= $url ?>" alt="<?= get_the_title($pppp->ID); ?>">
                                                </div>

                                                <div class="loc_service_title">
                                                    <h3><?php echo get_the_title($pppp->ID); ?></h3>
                                                </div>


                                            </a>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>

                    <!--  -->
                    <div class="single_dr_info">
                        <ul>
                            <?php if (have_rows('doctors_info')) : ?>
                                <?php while (have_rows('doctors_info')) : the_row();
                                    $title_dr_info = get_sub_field('title_dr_info');
                                    $value_dr_info = get_sub_field('value_dr_info');
                                ?>

                                    <li>
                                        <div class="doctors_info_wrap">
                                            <h3><?php echo $title_dr_info; ?></h3>
                                            <p><?php echo $value_dr_info; ?></p>
                                        </div>
                                    </li>

                                <?php endwhile; ?>
                            <?php endif; ?>
                        </ul>
                    </div>


                </div>

                <!-- <div class="single_doctor_services">
                <h2>PRACTICING LOCATION:</h2>
                <div class="services_on_location">
              <?php
                $services_providing_single = get_field('services_providing_single');
                if ($services_providing_single) : ?>
                  <?php foreach ($services_providing_single as $pppp) : ?>
                    <div class="location_service_link">
                      <a href="<?php echo get_permalink($pppp->ID); ?>">
                        <div class="loc_service_img">
                          <?php
                            $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($pppp->ID), 'full');
                            $url = $thumb['0'];
                            ?>
                          <img src="<?= $url ?>">  
                        </div>

                          <div class="loc_service_title">
                            <h3><?php echo get_the_title($pppp->ID); ?></h3>
                          </div>
                         
                        
                      </a>
                    </div>
                  <?php endforeach; ?>
                  <?php endif; ?>
              </div>
        </div> -->
            </div>





        </div>
    </div>
</section>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>








    <?php endwhile;
else : ?>
    <p><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>




<?php get_footer(); ?>