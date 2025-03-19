<?php /*

 * Template Name: About

 */

get_header(); ?>



<section class="top_baner_locations top_baner_about_page">
    <?php if( have_rows('top_baner_about_page') ): ?>
        <?php while( have_rows('top_baner_about_page') ): the_row(); 
            $image_baner_about_page = get_sub_field('image_baner_about_page');
            $small_title_baner_about_page = get_sub_field('small_title_baner_about_page');
            $title_title_baner_about_page = get_sub_field('title_title_baner_about_page');
            $description_title_baner_about_page = get_sub_field('description_title_baner_about_page');
            ?>

            <?php 
                if ( !empty( $image_baner_about_page ) ) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_baner_about_page['url']; ?>');"><?php }?> 
                    <div class="baner_desc">
                        <span><?php echo $small_title_baner_about_page; ?></span>
                        <h1><?php echo $title_title_baner_about_page; ?></h1>
                        <p><?php echo $description_title_baner_about_page; ?></p>
                    </div>
                </div>
        <?php endwhile; ?>
    <?php endif; ?>  
         <?php get_template_part('blocks/custom-booking'); ?>
         <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>


<section class="about_page_three_box">
    <ul>
    <?php if( have_rows('about_three_columns') ): ?>
        <?php while( have_rows('about_three_columns') ): the_row(); 
            $title_about_three_columns = get_sub_field('title_about_three_columns');
            $image_about_three_columns = get_sub_field('image_about_three_columns');
            $description_about_three_columns = get_sub_field('description_about_three_columns');
            ?>

            <li>
                <img src="<?php echo esc_url( $image_about_three_columns['url'] ); ?>" />
                <h2><?php echo $title_about_three_columns; ?></h2>
                <p><?php echo $description_about_three_columns; ?></p>
            </li>

        <?php endwhile; ?>
    <?php endif; ?>  
    </ul>
</section>


<section class="to_your_health">
    <div class="flex-wrap">
        <?php if( have_rows('to_your_health') ): ?>
        <?php while( have_rows('to_your_health') ): the_row(); 
            $title_to_your_health = get_sub_field('title_to_your_health');
            $descriptionto_your_health = get_sub_field('descriptionto_your_health');
        ?>

        <div class="to_your_health_left">
            <img class="galery_img_1" src="<?php echo bloginfo('template_directory');?>/images/galery_left.svg" />
            <img class="galery_img_2" src="<?php echo bloginfo('template_directory');?>/images/galery_right.svg" />
            <?php 
            $gallery_slider_to_your_health = get_sub_field('gallery_slider_to_your_health');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            if( $gallery_slider_to_your_health ): ?>
                <ul id="about_us_page" class="owl-carousel products">
                    <?php foreach( $gallery_slider_to_your_health as $image_id ): ?>
                        <li>
                            <?php echo wp_get_attachment_image( $image_id, $size ); ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
         </div>


         <div class="to_your_health_right">
             <h2><?php echo $title_to_your_health; ?></h2>
             <p><?php echo $descriptionto_your_health; ?></p>
         </div>


        <?php endwhile; ?>
        <?php endif; ?> 
    </div>
</section>



<section class="count_numbers">
    <ul class="flex-wrap space-between">
    <?php if( have_rows('about_count_numbers') ): ?>
        <?php while( have_rows('about_count_numbers') ): the_row(); 
        $number_count = get_sub_field('number_count');
        $title_count = get_sub_field('title_count');
    ?>

    <li>
        <span class="n-count counter"><?php echo $number_count; ?></span>
        <h3><?php echo $title_count; ?></h3>
        <?php 
            $linkcount = get_sub_field('link_count');
            if( $linkcount ): 
            $link_url = $linkcount['url'];
            $link_title = $linkcount['title'];
            $link_target = $linkcount['target'] ? $linkcount['target'] : '_self';
            ?>
        <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </li>
    
        
    <?php endwhile; ?>
    <?php endif; ?> 

    </ul>

</section>




<section class="testimonial about_testimonial">
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



<?php get_footer(); ?>


