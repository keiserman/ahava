<!-- Custom Booking -->
<?php function customBooking()
{

		$location_var = $_GET['location'] ?? null;
		$doctor_var = $_GET['doctor'] ?? null;
	function get_loc_title($obj)
	{
		return $obj->post_title;
	}
?>

			<a href="#" onclick="toggle('custom-booking')" class="accessibility-hidden">Toggle Custom Booking Section</a>
	<form action="" class="custom_filter" id="custom-booking">

		<div class="select_wrap">
			<!-- First field -->
			<div id="location_filter" class="select_option_field">
				<div class="select_choose">
					<div class="select_icon">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/location_f.png" />
					</div>
					<button class="select_option" aria-expanded="false">
						<p>Location</p>
						<span data-message="Choose a location"><?php echo $location_var ? $location_var : "Choose a location"; ?></span>
					</button>
				</div>

				<ul class="choose_option">
					<?php

					$args = array(
						'post_type' => 'location',
						'posts_per_page' => -1,
						'order' => 'DESC',
					);

					//print_r($args);
					// kreiramo novi upit i prosledjujemo mu gornje parametre
					$wp_query = new WP_Query($args);
					// odavde je sve poznato.
					while ($wp_query->have_posts()) : $wp_query->the_post();
// 						$link = get_field('address_location');
						$link = get_field('address_embed');
						$can_book = get_field('can_book');
						// 						var_dump($link);
						if ($link && $can_book == true) :
							$link_title = $link['title'];
							$link_url = $link['url'];
					?>
							<li>
								<input type="radio" id="<?php echo str_replace(" ", "_", get_the_title()); ?>" name="radio-group" value="<?php the_title(); ?>" data-url="<?php echo esc_url($link_url); ?>" <?php echo $location_var  == get_the_title() ? "checked" : ""; ?>>
								<div class="choose_value">
									<label for="<?php echo str_replace(" ", "_", get_the_title()); ?>"><?php the_title(); ?></label>
									<span><?php echo esc_attr($link_title); ?></span>
								</div>
							</li>
						<?php endif; ?>

					<?php endwhile;
					wp_reset_postdata(); ?>

				</ul>
			</div>
			<!-- End first field -->

			<!-- Second field -->
			<div id="reason_filter" class="select_option_field">
				<div class="select_choose">
					<div class="select_icon">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/reason_f.png" />
					</div>
					<button class="select_option" aria-expanded="false">
						<p>Reason for visit</p>
						<span data-message="How can we help you?">How can we help you?</span>
					</button>
				</div>

				<ul class="choose_option">
					<?php

					$args_rfv = array(
						'post_type' => 'reasons',
						'posts_per_page' => -1,
						'order' => 'ASC',
						'orderby' => 'title',
					);

					// kreiramo novi upit i prosledjujemo mu gornje parametre
					$wp_query_rfv = new WP_Query($args_rfv);

					$other_title = "";
					$other_reasons = [];
					// odavde je sve poznato.
					while ($wp_query_rfv->have_posts()) : $wp_query_rfv->the_post();
						// 						$link_rfv = get_field('address_location');
						// 						var_dump($link);

						$x = get_the_title();
						$reason_locations = get_posts(array(
							'post_type' => 'location',
							'meta_query' => array(
								array(
									'key' => 'reasons', // name of custom field
									'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
									'compare' => 'LIKE'
								)
							)
						));

						$reason_locations_arr = [];
						if ($reason_locations) :
							$reason_locations_arr = array_map('get_loc_title', $reason_locations);
						endif;

						if (strcmp($x, "Other") == 0) {
							$other_title = $x;
							$other_reasons = $reason_locations_arr;
						}
					?>
						<?php if (strcmp($x, "Other") != 0) : ?>
							<li>
								<input type="checkbox" id="<?php echo str_replace(' ', '_', get_the_title()); ?>" data-locations='<?= json_encode($reason_locations_arr) ?>' name="reason" value="&nbsp;<?php the_title(); ?>">
								<div class="choose_value">
									<label for="<?php echo str_replace(' ', '_', get_the_title()); ?>"><?php the_title(); ?></label>
								</div>
							</li>
						<?php endif ?>
					<?php endwhile;
					wp_reset_postdata(); ?>
					<li>
						<input type="checkbox" id="<?php echo $other_title; ?>" data-locations='<?= json_encode($other_reasons) ?>' name="reason" value="&nbsp;<?php echo $other_title; ?>">
						<div class="choose_value">
							<label for="<?php echo $other_title; ?>"><?php echo $other_title; ?></label>
						</div>
					</li>
				</ul>
			</div>
			<!-- End second field -->

			<!-- Third field -->
			<div id="doctor_filter" class="select_option_field">
				<div class="select_choose">
					<div class="select_icon">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/doctor_f.png" />
					</div>
					<button class="select_option" aria-expanded="false">
						<p>Doctor</p>
						<span data-message="Any specific doctor?"><?php echo $doctor_var ? $doctor_var : "Any specific doctor?"; ?></span>
					</button>
				</div>


				<ul class="choose_option">
					<li>
						<input type="radio" id="specific_dr" name="radio_dr" value="Any doctor">
						<div class="choose_value">
							<label for="specific_dr">No specific doctor</label>
						</div>
					</li>
					<li class="search_dr">
						<input id="searc_dr" type="search" placeholder="Search doctor...">
					</li>
					<?php

					$args_doc = array(
						'post_type' => 'doctors',
						'posts_per_page' => -1,
						'order' => 'DESC',
					);

					//print_r($args);
					// kreiramo novi upit i prosledjujemo mu gornje parametre
					$wp_query_doc = new WP_Query($args_doc);
					// odavde je sve poznato.
					while ($wp_query_doc->have_posts()) : $wp_query_doc->the_post();
						$doc_specialty = get_field('services_providing_single');

						// $link_rfv = get_field('address_location');
						$doc_location = get_field('practicing_location');

						$loc_array = [];
						if (is_array($doc_location)) {
							foreach ($doc_location as $loc) {
								array_push($loc_array, $loc->post_title);
							}
						}

						$doc_specialty_clean = [];
						if (is_array($doc_specialty)) {
							foreach ($doc_specialty as $spe) {
								array_push($doc_specialty_clean, $spe->post_title);
							}
						}
						// print_r($doc_specialty_clean);
// 						$link_title_rfv = $link['title'];
					?>
						<li>
							<input type="radio" id="<?php echo str_replace(" ", "_", get_the_title()); ?>" name="radio_dr" data-reason='<?= json_encode($doc_specialty_clean) ?>' data-location='<?= json_encode($loc_array) ?>' value="<?php the_title(); ?>" <?php echo $doctor_var  == get_the_title() ? "checked" : ""; ?>>
							<div class="choose_value">
								<label for="<?php echo str_replace(" ", "_", get_the_title()); ?>"><?php the_title(); ?></label>
							</div>
						</li>
					<?php endwhile;
					wp_reset_postdata(); ?>


				</ul>
			</div>
			<!-- End third field -->

			<!-- Fourth field -->
			<div id="timeslot_filter" class="select_option_field">
				<div class="select_choose">
					<div class="select_icon">
						<img src="<?php echo bloginfo('template_directory'); ?>/images/timeslot_f.png" />
					</div>
					<button class="select_option" aria-expanded="false">
						<p>Time slot</p>
						<span data-message="Select a date & timeslot">Select a date & time slot</span>
					</button>
				</div>


				<ul class="choose_option calendar_choose">
					<li class="chose_date">
						<div class="calendar_box">
							<div class="calendar">
								<div class="group calendar-header">
									<p class="pointer center monthname">&nbsp;</p>
									<button class="pointer arrow minusmonth" aria-label="previous month"><span><i class="fas fa-caret-left"></i></span></button>
									<button class="pointer arrow addmonth" aria-label="next month"><span><i class="fas fa-caret-right"></i></span></button>
								</div>

								<ul class="group calendar-days">
									<li>Mo</li>
									<li>Tu</li>
									<li>We</li>
									<li>Th</li>
									<li>Fr</li>
									<li>Sa</li>
									<li>Su</li>
								</ul>
								<ul class="group calendar-body">
									<li></li>
									<!-- Dates go in here -->
								</ul>
							</div>
						</div>

						<!--  -->

						<div class="preferred_time">
							<span>PREFERRED TIME:</span>

							<div class="time_wrap_min">

								<div class="time_calendar active_time">
									<input id="8am-12am" type="radio" name="time_calendar" value="" checked>
									<label for="8am-12am">8AM - 12PM</label>
								</div>

								<div class="time_calendar">
									<input type="radio" id="12pm-3pm" name="time_calendar" value="">
									<label for="12pm-3pm">12PM - 3PM</label>
								</div>

								<div class="time_calendar">
									<input type="radio" id="3pm-6pm" name="time_calendar" value="">
									<label for="3pm-6pm">3PM - 6PM</label>
								</div>

								<div class="time_calendar">
									<input type="radio" id="6pm-8pm" name="time_calendar" value="">
									<label for="6pm-8pm">6PM - 8PM</label>
								</div>

							</div>
						</div>

					</li>
				</ul>
			</div>
			<!-- End fourth field -->

			<div class="filter_btn">
				<input id="customBookingSubmit" type="button" name="" value="Search" data-raurl="<?php echo get_site_url(); ?>/request-appointment/">
			</div>


		</div>

	</form>

<?php }
customBooking();
?>