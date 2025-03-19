<?php /*

 * Template Name: Simple page

 */

get_header(); ?>


<section class="simple_page">
    <h1 class="simple_top_title"><?php the_field('top_title_simple_page'); ?></h1>
    <div class="heading">
        <h2><?php echo get_field('main_simple_title'); ?></h2>
    </div>
    <div class="simple_content">
        <?php the_content(); ?>
    </div>
</section>



<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>




<?php endwhile; else : ?>
    <p><?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>


