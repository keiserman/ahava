<?php /*

 * Template Name: Doctors

 */

get_header(); ?>



<section class="top_baner_locations top_baner_doctors">
    <?php if (have_rows('top_baner_doctors', 'option')) : ?>
        <?php while (have_rows('top_baner_doctors', 'option')) : the_row();
            $image_doctors_page = get_sub_field('image_doctors_page');
            $small_title_doctors_page = get_sub_field('small_title_doctors_page');
            $title_doctors_page = get_sub_field('title_doctors_page');
            $description_doctors_page = get_sub_field('description_doctors_page');
        ?>

            <?php
            if (!empty($image_doctors_page)) { ?>
                <div class="center-all top_baner_content" style="background-image:url('<?php echo $image_doctors_page['url']; ?>');"><?php } ?>
                <div class="baner_desc">
                    <span><?php echo $small_title_doctors_page; ?></span>
                    <h1><?php echo $title_doctors_page; ?></h1>
                    <p><?php echo $description_doctors_page; ?></p>
                </div>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>

        <?php get_template_part('blocks/custom-booking'); ?>
        <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>



<section class="our_doctors">


    <div class="filter doctor_filter">
        <?php echo do_shortcode('[searchandfilter id="604"]'); ?>
    </div>


    <?php
    $test_arr = [];
    ?>
    <?php if (have_posts()) : while ( have_posts() ) : the_post(); ?>
            <?php
            $terms = get_the_terms($post->ID, 'doctorsservices');
            if ($terms) :
                $test_var_2 = 0;
                foreach ($terms as $term) {
                    array_push($test_arr, $term->name);
                }
            endif;
            ?>

        <?php endwhile;
sort($test_arr);
    else : ?>
        <p class="error"><?php esc_html_e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    <?php
    foreach (array_unique($test_arr) as $cat) : ?>
        <section class="specialty_section">
            <h2 class="specialty_section_title"><?php echo $cat; ?></h2>
            <ul class="flex-wrap doctors-wrap content-doctors">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php
                        $terms = get_the_terms($post->ID, 'doctorsservices');
                        if ($terms) : ?>
                            <?php foreach ($terms as $term) : ?>
                                <?php if ($cat == $term->name) : ?>
                                    <li class="card_container">
                                        <div class="doctors_img">
                                            <a href="<?php echo get_permalink(); ?>">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('full', array('class' => 'post_img'));
                                                } else { ?>
                                                    <img src="https://ahavamedical.mediaotg.dev/wp-content/uploads/2022/08/Ahava-medical-favicon.png" alt="<?php the_title(); ?>" />
                                                <?php } ?>
                                            </a>
                                        </div>
                                        <div class="doctors_desc">
                                            <h3><?php the_title(); ?></h3>
                                            <ul class="taxonomy_list">
                                                <?php
                                                $terms = get_the_terms($post->ID, 'doctorsservices');

                                                if ($terms) :
                                                    foreach ($terms as $term) {

                                                        echo '<li>' .  $term->name . '</li>';
                                                    }
                                                endif;
                                                ?>
                                            </ul>
                                        </div>
                                    </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        <?php endif ?>
                    <?php endwhile ?>
                <?php endif ?>
            </ul>

        </section>


    <?php endforeach; ?>
</section>

<?php get_footer(); ?>