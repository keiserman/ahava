<?php /*

 * Template Name: Careers

 */

get_header(); ?>



<section class="top_baner_locations top_baner_careerss_page">
    <?php if( have_rows('top_baner_careerss_page', 'option') ): ?>
        <?php while( have_rows('top_baner_careerss_page', 'option') ): the_row(); 
            $image_careerss_page = get_sub_field('image_careerss_page');
            $small_careerss_page = get_sub_field('small_careerss_page');
            $title_careerss_page = get_sub_field('title_careerss_page');
            $description_careerss_page = get_sub_field('description_careerss_page');
            ?>

            <?php 
                if ( !empty( $image_careerss_page ) ) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_careerss_page['url']; ?>');"><?php }?> 
                    <div class="baner_desc">
                        <span><?php echo $small_careerss_page; ?></span>
                        <h1><?php echo $title_careerss_page; ?></h1>
                        <p><?php echo $description_careerss_page; ?></p>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>  
</section>



<section class="career_us_three_box">
    <ul class="c_tree_grid">
        <?php if( have_rows('carrers_three_box', 'option') ): ?>
            <?php while( have_rows('carrers_three_box', 'option') ): the_row(); 
            $image_careers_us_three_box = get_sub_field('image_careers_us_three_box');
            $title_careers_three_box = get_sub_field('title_careers_three_box');
            $description_careers_three_box = get_sub_field('description_careers_three_box');
        ?>

        <li>
            <div class="ab_icon">
                 <img src="<?php echo esc_url( $image_careers_us_three_box['url'] ); ?>" />
            </div>
            
            <div class="ab_desc">
                <h3><?php echo $title_careers_three_box; ?></h3>
                <p><?php echo $description_careers_three_box; ?></p>
            </div>
         </li>
        
        <?php endwhile; ?>
        <?php endif; ?> 
    </ul>

    <ul class="career_career_links">
        <li><a href="#open_possition">SEE JOB OPENINGS</a></li>
        <li><a href="/contact/">APPLY FOR A CAREER</a></li>
    </ul>
</section>


<section class="career_testimonial_slider">
    <div class="career_testimonial_slider_wrap">
        <div class="career_testimonial_wrap">

        <h2 class="words_static">Words from our team</h2>

        <ul id="career_testimonial" class="owl-carousel">
            <?php if( have_rows('carrier_testimonial', 'option') ): ?>
                <?php while( have_rows('carrier_testimonial', 'option') ): the_row(); 
                // $title_carrier_testimonial = get_sub_field('title_carrier_testimonial');
                $description_carrier_testimonial = get_sub_field('description_carrier_testimonial');
                $author_img_carrier_testimonial = get_sub_field('author_img_carrier_testimonial');
                $author_carrier_testimonial = get_sub_field('author_carrier_testimonial');
                ?>

                <li>
                    <!-- <h1><?php echo $title_carrier_testimonial; ?></h1> -->
                    <p><?php echo $description_carrier_testimonial; ?></p>
                    <div class="c_testimonial_name">
						
                        <?php if(is_array($author_img_carrier_testimonial) && strlen($author_img_carrier_testimonial['url']) > 0): ?>
							<img src="<?php echo esc_url( $author_img_carrier_testimonial['url'] ); ?>" />
						<?php else: ?>
							<img src="https://ahavamedical.mediaotg.dev/wp-content/uploads/2022/08/Ahava-medical-favicon.png" />
						<?php endif; ?>
						
                        <p><?php echo $author_carrier_testimonial; ?></p>
                    </div>
                </li>

                <?php endwhile; ?>
            <?php endif; ?> 
        </ul>
    </div>
    </div>
</section>


<div id="open_possition"></div>


<section  class="jop_oppening">

    <div class="heading">
        <h2>Job openings</h2>
        <p>Advance your career in a professional, growth-oriented environment. We’re looking for team members who pride themselves on excellent work, believe in always raising the bar, and aim to provide a better health experience for our clients. Apply today to join the team.</p>
    </div>



    <div class="career_filter">
        <?php echo do_shortcode('[searchandfilter id="634"]'); ?>
    </div>
    <ul class="flex-wrap careers_job-wrap content-careers">
	<?php
			if(have_posts()):
				while ( have_posts() ) : 
					the_post(); 
		?>

    <li>
        <a href="<?php echo get_permalink(); ?>">
        <h3 class="carrer_pos"><?php the_title(); ?></h3>
        <div class="carrer_pos car_location"><p>
			<?php 
                $terms = get_the_terms( $post->ID , 'careerslocation' );
				$term_names = [];

                foreach ( $terms as $term ) {
					array_push($term_names, $term->name);
                }
                echo '<span>' .  implode(', ', (array) $term_names) . '  </span>';   
            ?>
        </div>  

        <p class="carrer_pos carrer_position"><?php the_field('time_open_position'); ?></p>
        
        <span class="carrer_pos apply_position">APPLY NOW</span> 
        </a>
    </li>


  <?php endwhile; else : ?>
            <p class="error"><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
  <?php endif; ?>

</ul>


</section>






<?php get_footer(); ?>


