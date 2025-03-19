<?php get_header(); ?>



<section class="top_baner_locations top_single_image">
    <?php $thumb = get_the_post_thumbnail_url(); ?>
    <div class="center-all top_baner_content" style="background-image: url('<?php echo $thumb;?>')">
        <div class="baner_desc">
            <ul class="custom_breadcrump">
                <li><a href="/news/">News</a></li>
                <li><i class="fal fa-angle-right"></i></li>
                <li><?php the_title(); ?></li>
            </ul>
            <h1><?php the_title(); ?></h1>
            <p class="post_date"><?php echo get_the_time('d/m/Y'); ?></p>
        </div>
    </div>
 
</section>


<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


<section class="single_news_wrap">
    <div class="flex-wrap">
        <div class="single_news_left">
            <?php the_content(); ?>
        </div>
        <div class="single_news_right">
            <div class="single_post_news_form">
                <h3>Get it directly in your inbox every week</h3>
                <p>Sign up for our regular newsletter and get health tips and tricks in your inbox.</p>
                <div class="newsletter_form">
                    <?php echo do_shortcode('[contact-form-7 id="168" title="Newsletter"]'); ?> 
                </div>
            </div>
        </div>
    </div>
</section>


<hr class="single_news_line">

<section class="homepage_news single_other_posts">
     <div class="heading">
        <h2>In other news</h2>
    </div>
    <ul class="flex-wrap homepage_news_slide owl-carousel">
    <?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args=array(
            'post_type'=>'post',
            'posts_per_page' => 3, 
            'paged'=>$paged,
            'post__not_in' => array( $post->ID ),
        );

        $wp_query = new WP_Query($args);
        while($wp_query->have_posts()) : $wp_query->the_post();
    ?>

        <li>
            <div class="news_img">
                <a href="<?php echo get_permalink(); ?>">
                    <?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
                </a>  
            </div>
            <div class="news_desc">
                <p class="post_date"><?php echo get_the_time('d/m/Y'); ?></p>
                <h3><?php the_title(); ?></h3>
                 <?php $post_content_pin = get_the_content(); ?>
                <p class="pinned-trim-words"><?php echo wp_trim_words( $post_content_pin, 20, ('...')); ?></p>
                <a href="<?php echo get_permalink(); ?>">READ MORE</a>
            </div>
        </li>

    <?php endwhile; wp_reset_query(); wp_reset_postdata();?> <!-- Resetovanje -->
    </ul>

</section>







<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>




 <?php get_footer(); ?>