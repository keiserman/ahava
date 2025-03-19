<?php /*

 * Template Name: News

 */

get_header(); ?>



<section class="top_baner_locations top_baner_news">
    <div class="center-all top_baner_content"> 
        <div class="baner_desc">
            <h1>Wellness Library</h1>
            <p>Articles and resources with updates on health and wellness.</p>
        </div>
    </div>
</section>


<section class="homepage_news main_news_page">

    <div class="filter_search">
        <?php echo do_shortcode('[searchandfilter id="609"]'); ?>
    </div>

    <ul class="flex-wrap content-news">
     <?php 

		if(have_posts()):
			while ( have_posts() ) : 
				the_post(); 
		?>

        <li>
            <div class="news_img">
                <a href="<?php echo get_permalink(); ?>">
                    <?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
                </a>  
            </div>
            <div class="news_desc">
                <p class="post_date"><?php echo get_the_time('m/d/Y'); ?></p>
				<a href="<?php echo get_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
                 <?php $post_content_pin = get_the_content(); ?>
                <p class="pinned-trim-words"><?php echo wp_trim_words( $post_content_pin, 20, ('...')); ?></p>
                
            </div>
        </li>

   <?php endwhile; else : ?>
            <p class="error"><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
        <?php endif; ?>
    </ul>

    <div class="pagination">

        <?php echo paginate_links( array(
          'prev_text' => '<i class="fal fa-angle-left"></i>',
          'next_text' => '<i class="fal fa-angle-right"></i>'
        )); ?>
    </div>


</section>






<?php get_footer(); ?>


