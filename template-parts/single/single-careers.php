<?php get_header(); ?>



<section class="single_careers">
    <div class="single_career">
        <ul class="custom_breadcrump">
            <li><a href="/our-careers/">Careers</a></li>
            <li><i class="fal fa-angle-right"></i></li>
            <li><?php the_title(); ?></li>
        </ul>
        <h1 class="heading center"><?php the_title(); ?></h1>

        <ul class="single_career_location center">
            <li>
                <span>LOCATION:</span>
                <p>
                    <?php 
                        $terms = get_the_terms( $post->ID , 'careerslocation' );
						$term_names = [];

                        foreach ( $terms as $term ) {
							array_push($term_names, $term->name);
                        }

                        echo '' .  implode(', ', $term_names) . '';
                    ?>
                </p>
            </li>

            <li>
                <span>TIME:</span>
                <p><?php the_field('time_open_position'); ?></p>
            </li>
        </ul>


        <div class="single_career_content">
            <?php the_content(); ?>
        </div>

        <div class="main_contact_form">
            <?php
				$to_email = "hr@ahavamedical.com";
				$terms = get_the_terms( $post->ID , 'careerslocation' );
				switch($terms[0]->name) {
					case "Flatbush, NY":
						$to_email = "Yossi@ahavamedical.com";
						break;
					case "Liberty, NY":
						$to_email = "samuel@ahavamedical.com";
						break;
					case "Five Towns":
						$to_email = "chani@ahavamedical.com";
						break;
					default:
						break;
				}
				echo do_shortcode('[contact-form-7 id="531" title="Career form" to-email="'. $to_email .'"]'); 
			?>
        </div>
    </div>
</section>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>








<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>




 <?php get_footer(); ?>