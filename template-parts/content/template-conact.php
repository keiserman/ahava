<?php /*

 * Template Name: Contact

 */

get_header(); ?>




<section class="contact_page_locations">
    <div class="flex-wrap">
        <div class="contact_pg_left">
            <div class="contact_l_wrap">
                <?php if( have_rows('contact_location_1') ): ?>
                    <?php while( have_rows('contact_location_1') ): the_row(); 
                    $title_location1 = get_sub_field('title_location1');
                ?>

                <div class="main_contact_box">
                <h2><?php echo $title_location1; ?></h2>

                <ul>
                <?php if( have_rows('location_map_first_location') ): ?>
                    <?php while( have_rows('location_map_first_location') ): the_row(); 
                    $image_first_map = get_sub_field('image_first_map');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_first_map['url'] ); ?>" />
                        <?php 
                        $address_first_address = get_sub_field('address_first_address');
                        if( $address_first_address ): 
                            $link_url = $address_first_address['url'];
                            $link_title = $address_first_address['title'];
                            $link_target = $address_first_address['target'] ? $address_first_address['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 


                <!--  -->


                <ul>
                <?php if( have_rows('location_tel_first_location') ): ?>
                    <?php while( have_rows('location_tel_first_location') ): the_row(); 
                    $image_first_tel = get_sub_field('image_first_tel');
                    $tel_first_tel = get_sub_field('tel_first_tel');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_first_tel['url'] ); ?>" />
                        <a href="tel:<?php echo esc_html( str_replace('(', '+1', str_replace(') ', '', str_replace(' Ext ', ',', str_replace('-', '', $tel_first_tel ))))); ?>"><?php echo esc_html( $tel_first_tel ); ?></a>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 

                <!--  -->



                <ul>
                <?php if( have_rows('location_mail_first_mail') ): ?>
                    <?php while( have_rows('location_mail_first_mail') ): the_row(); 
                    $image_first_mail_image = get_sub_field('image_first_mail_image');
                    $mail_first_mail = get_sub_field('mail_first_mail');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_first_mail_image['url'] ); ?>" />
                        <a href="mailto:<?php echo esc_html( $mail_first_mail ); ?>"><?php echo esc_html( $mail_first_mail ); ?></a>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 

                <!--  -->

            </div>

                <?php endwhile; ?>
                <?php endif; ?> 
            </div>

<!-- First location end -->


        <div class="contact_l_wrap">
                <?php if( have_rows('contact_location_2') ): ?>
                    <?php while( have_rows('contact_location_2') ): the_row(); 
                    $title_location2 = get_sub_field('title_location2');
                ?>

                <div class="main_contact_box">

                <h2><?php echo $title_location2; ?></h2>

                <ul>
                <?php if( have_rows('location_map_second_location') ): ?>
                    <?php while( have_rows('location_map_second_location') ): the_row(); 
                    $image_second_map = get_sub_field('image_second_map');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_second_map['url'] ); ?>" />
                        <?php 
                        $address_second_address = get_sub_field('address_second_address');
                        if( $address_second_address ): 
                            $link_url = $address_second_address['url'];
                            $link_title = $address_second_address['title'];
                            $link_target = $address_second_address['target'] ? $address_second_address['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 


                <!--  -->


                <ul>
                <?php if( have_rows('location_tel_second_location') ): ?>
                    <?php while( have_rows('location_tel_second_location') ): the_row(); 
                    $image_second_tel = get_sub_field('image_second_tel');
                    $tel_second_tel = get_sub_field('tel_second_tel');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_second_tel['url'] ); ?>" />
                        <a href="tel:<?php echo esc_html( str_replace('(', '+1', str_replace(') ', '', str_replace(' Ext ', ',', str_replace('-', '', $tel_second_tel ))))); ?>"><?php echo esc_html( $tel_second_tel ); ?></a>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 

                <!--  -->



                <ul>
                <?php if( have_rows('location_mail_second_mail') ): ?>
                    <?php while( have_rows('location_mail_second_mail') ): the_row(); 
                    $image_second_mail_image = get_sub_field('image_second_mail_image');
                    $mail_second_mail = get_sub_field('mail_second_mail');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_second_mail_image['url'] ); ?>" />
                        <a href="mailto:<?php echo esc_html( $mail_second_mail ); ?>"><?php echo esc_html( $mail_second_mail ); ?></a>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 

                <!--  -->

            </div>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>

<!-- Second location end -->


<div class="contact_l_wrap">
                <?php if( have_rows('contact_location_3') ): ?>
                    <?php while( have_rows('contact_location_3') ): the_row(); 
                    $title_location3 = get_sub_field('title_location3');
                ?>

                <div class="main_contact_box">

                <h2><?php echo $title_location3; ?></h2>

                <ul>
                <?php if( have_rows('location_map_third_location') ): ?>
                    <?php while( have_rows('location_map_third_location') ): the_row(); 
                    $image_third_map = get_sub_field('image_third_map');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_third_map['url'] ); ?>" />
                        <?php 
                        $address_third_address = get_sub_field('address_third_address');
                        if( $address_third_address ): 
                            $link_url = $address_third_address['url'];
                            $link_title = $address_third_address['title'];
                            $link_target = $address_third_address['target'] ? $address_third_address['target'] : '_self';
                            ?>
                            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                        <?php endif; ?>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 


                <!--  -->


                <ul>
                <?php if( have_rows('location_tel_third_location') ): ?>
                    <?php while( have_rows('location_tel_third_location') ): the_row(); 
                    $image_third_tel = get_sub_field('image_third_tel');
                    $tel_third_tel = get_sub_field('tel_third_tel');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_third_tel['url'] ); ?>" />
                        <a href="tel:<?php echo esc_html( str_replace('(', '+1', str_replace(') ', '', str_replace(' Ext ', ',', str_replace('-', '', $tel_third_tel ))))); ?>"><?php echo esc_html( $tel_third_tel ); ?></a>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 

                <!--  -->



                <ul>
                <?php if( have_rows('location_mail_third_mail') ): ?>
                    <?php while( have_rows('location_mail_third_mail') ): the_row(); 
                    $image_third_mail_image = get_sub_field('image_third_mail_image');
                    $mail_third_mail = get_sub_field('mail_third_mail');
                ?>
                    <li>
                        <img src="<?php echo esc_url( $image_third_mail_image['url'] ); ?>" />
                        <a href="mailto:<?php echo esc_html( $mail_third_mail ); ?>"><?php echo esc_html( $mail_third_mail ); ?></a>
                        
                    </li>

                <?php endwhile; ?>
                <?php endif; ?> 
                </ul> 

                <!--  -->


                <?php endwhile; ?>
                <?php endif; ?> 
            </div>
            </div>

<!-- Third location end -->



<div class="contact_l_wrap">
                <?php if( have_rows('contact_location_4') ): ?>
                    <?php while( have_rows('contact_location_4') ): the_row(); 
                    $title_location4 = get_sub_field('title_location4');
                ?>

                <div class="main_contact_box">

                <h2><?php echo $title_location4; ?></h2>

				<?php if(! get_sub_field('coming_soon_fourth_location')): ?>
					<ul>
					<?php if( have_rows('location_map_fourth_location') ): ?>
						<?php while( have_rows('location_map_fourth_location') ): the_row(); 
						$image_fourth_map = get_sub_field('image_fourth_map');
					?>
						<li>
							<img id="img" src="<?php echo esc_url( $image_fourth_map['url'] ); ?>" />
							<?php 
							$address_fourth_address = get_sub_field('address_fourth_address');
							if( $address_fourth_address ): 
								$link_url = $address_fourth_address['url'];
								$link_title = $address_fourth_address['title'];
								$link_target = $address_fourth_address['target'] ? $address_fourth_address['target'] : '_self';
								?>
								<a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
							<?php endif; ?>

						</li>

					<?php endwhile; ?>
					<?php endif; ?> 
					</ul> 


					<!--  -->


					<ul>
					<?php if( have_rows('location_tel_fourth_location') ): ?>
						<?php while( have_rows('location_tel_fourth_location') ): the_row(); 
						$image_fourth_tel = get_sub_field('image_fourth_tel');
						$tel_fourth_tel = get_sub_field('tel_fourth_tel');
					?>
						<li>
							<img id="img" src="<?php echo esc_url( $image_fourth_tel['url'] ); ?>" />
							<a href="tel:<?php echo esc_html( str_replace('(', '+1', str_replace(') ', '', str_replace(' Ext ', ',', str_replace('-', '', $tel_fourth_tel ))))); ?>"><?php echo esc_html( $tel_fourth_tel ); ?></a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?> 
					</ul> 

					<!--  -->



					<ul>
					<?php if( have_rows('location_mail_fourth_mail') ): ?>
						<?php while( have_rows('location_mail_fourth_mail') ): the_row(); 
						$image_fourth_mail_image = get_sub_field('image_fourth_mail_image');
						$mail_fourth_mail = get_sub_field('mail_fourth_mail');
					?>
						<li>
							<img id="img" src="<?php echo esc_url( $image_fourth_mail_image['url'] ); ?>" />
							<a href="mailto:<?php echo esc_html( $mail_fourth_mail ); ?>"><?php echo esc_html( $mail_fourth_mail ); ?></a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?> 
					</ul> 
				<?php else: ?>
					<ul>
						<li><a style="margin-left: 0">Location coming soon</a></li>
					</ul>
				<?php endif; ?>

                <!--  -->

            </div>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>

<!-- Fourth location end -->

<div class="contact_l_wrap">
                <?php if( have_rows('contact_location_5') ): ?>
                    <?php while( have_rows('contact_location_5') ): the_row(); 
                    $title_location5 = get_sub_field('title_location5');
                ?>

                <div class="main_contact_box">

                <h2><?php echo $title_location5; ?></h2>

				<?php if(! get_sub_field('coming_soon_fifth_location')): ?>
					<ul>
					<?php if( have_rows('location_map_fifth_location') ): ?>
						<?php while( have_rows('location_map_fifth_location') ): the_row(); 
						$image_fifth_map = get_sub_field('image_fifth_map');
						$address_fifth_address = get_sub_field('location_fifth_addres');
					?>
						<li>
							<img id="img" src="<?php echo esc_url( $image_fifth_map['url'] ); ?>" />
							<a href="https://ahavamedical.com/location/on-wheels/"><?php echo esc_html( $address_fifth_address ); ?></a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?> 
					</ul> 


					<!--  -->


					<ul>
					<?php if( have_rows('location_tel_fifth_location') ): ?>
						<?php while( have_rows('location_tel_fifth_location') ): the_row(); 
						$image_fifth_tel = get_sub_field('image_fifth_tel');
						$tel_fifth_tel = get_sub_field('tel_fifth_tel');
					?>
						<li>
							<img id="img" src="<?php echo esc_url( $image_fifth_tel['url'] ); ?>" />
							<a href="tel:<?php echo esc_html( str_replace('(', '+1', str_replace(') ', '', str_replace(' Ext ', ',', str_replace('-', '', $tel_fifth_tel ))))); ?>"><?php echo esc_html( $tel_fifth_tel ); ?></a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?> 
					</ul> 

					<!--  -->



					<ul>
					<?php if( have_rows('location_mail_fifth_mail') ): ?>
						<?php while( have_rows('location_mail_fifth_mail') ): the_row(); 
						$image_fifth_mail_image = get_sub_field('image_fifth_mail_image');
						$mail_fifth_mail = get_sub_field('mail_fifth_mail');
					?>
						<li>
							<img id="img" src="<?php echo esc_url( $image_fifth_mail_image['url'] ); ?>" />
							<a href="mailto:<?php echo esc_html( $mail_fifth_mail ); ?>"><?php echo esc_html( $mail_fifth_mail ); ?></a>

						</li>

					<?php endwhile; ?>
					<?php endif; ?> 
					</ul> 
				<?php else: ?>
					<ul>
						<li><a style="margin-left: 0">Location coming soon</a></li>
					</ul>
				<?php endif; ?>

                <!--  -->

            </div>
                <?php endwhile; ?>
                <?php endif; ?> 
            </div>

<!-- Fourth location end -->
        </div>

<!-- End left col -->


        <div class="contact_pg_right">
            <div class="heading sticky">
                <h2>Send us a message</h2>
                <p>Use the form below to write us a message, and we’ll get back to you as soon as possible.</p>
                <div class="main_contact_form">
                    <?php echo do_shortcode('[contact-form-7 id="602" title="Main contact form"]'); ?>
                </div>
            </div>


        </div>
    </div>
</section>





<?php get_footer(); ?>


