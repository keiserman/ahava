<?php /*

 * Template Name: Departments

 */

get_header(); ?>



<section class="top_baner_locations top_baner_departments_page">
    <?php if( have_rows('top_baner_departments_page', 'option') ): ?>
        <?php while( have_rows('top_baner_departments_page', 'option') ): the_row(); 
            $image_departments_page = get_sub_field('image_departments_page');
            $small_departments_page = get_sub_field('small_departments_page');
            $title_departments_page = get_sub_field('title_departments_page');
            $description_departments_page = get_sub_field('description_departments_page');
            ?>

            <?php 
                if ( !empty( $image_departments_page ) ) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_departments_page['url']; ?>');"><?php }?> 
                    <div class="baner_desc">
                        <span><?php echo $small_departments_page; ?></span>
                        <h1><?php echo $title_departments_page; ?></h1>
                        <p><?php echo $description_departments_page; ?></p>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>  
         <?php get_template_part('blocks/custom-booking'); ?>
         <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>

<section class="main_location_list">

    <div class="flex-wrap content-locations">
        <?php 
		    $terms = get_terms(
				array(
					'taxonomy'   => 'departments',
					'hide_empty' => false,
				)
			);

			foreach($terms as $term):
		?>
                <div class="post_content">
                    <div class="post_content_wrap">

                        <div class="blog_img">
                            <a href="<?php echo '/departments/'.$term->slug; ?>">
                                <img src="<?php echo get_field('thumbnail_image', 'departments_'.$term->term_id); ?>" alt="<?= $term->name; ?>" />
                            </a>
                        </div>


                        <div class="post_desc">
                            <h3><?php echo $term->name; ?></h3>
                            <p><?php echo substr($term->description, 0, strpos(wordwrap($term->description, 130), "\n")); ?>...</p>
                            <ul class="locatopns_links">
                                <li><a class="schedule_btn" href="<?php echo '/departments/'.$term->slug; ?>">VIEW DEPARTMENT</a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>

            <?php endforeach; ?>
    </div>
</section>



<?php get_footer(); ?>


