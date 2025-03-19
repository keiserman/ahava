<?php
/**
 * Search & Filter Pro 
 *
 * Sample Results Template
 * 
 * @package   Search_Filter
 * @author    Ross Morsali
 * @link      https://searchandfilter.com
 * @copyright 2018 Search & Filter
 * 
 * Note: these templates are not full page templates, rather 
 * just an encaspulation of the your results loop which should
 * be inserted in to other pages by using a shortcode - think 
 * of it as a template part
 * 
 * This template is an absolute base example showing you what
 * you can do, for more customisation see the WordPress docs 
 * and using template tags - 
 * 
 * http://codex.wordpress.org/Template_Tags
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<section class="top_baner_locations top_single_baner_services top_single_baner_search">
    <div class="center-all top_baner_content" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>);">
        <div class="baner_desc">
            <ul class="custom_breadcrump">
                <li><?php the_title(); ?></li>
            </ul>
            <h1><?php echo get_the_title(); ?></h1>
			<p>
				Found <?php echo $query->found_posts; ?> Results				
			</p>
        </div>
    </div>
         <?php get_template_part('blocks/custom-booking'); ?>
         <a class="mob_appointment_btn" href="/request-appointment/">REQUEST APPOINTMENT</a>
</section>
	<?php
if ( $query->have_posts() )
{
	?>
<section class="service_list">
	Page <?php echo $query->query['paged']; ?> of <?php echo $query->max_num_pages; ?><br /><br />
	<div class="results-wrapper">
		
	<?php
	while ($query->have_posts())
	{
		$query->the_post();
		
		?>
		<div class="service_box_list">
            <a href="<?php echo get_permalink(); ?>">
				<div class="hover_service">
				<div class="box_service_img">
					<?php the_post_thumbnail( 'full', array('class' => 'post_img') ); ?>
				</div>

				<h3><?php the_title(); ?></h3>
				<p><?php the_excerpt(); ?></p>

			</div>
			</a>
        </div>
<!-- 
		<div>
			<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			
			<p><br /><?php the_excerpt(); ?></p>
			<?php 
				if ( has_post_thumbnail() ) {
					echo '<p>';
					the_post_thumbnail("small");
					echo '</p>';
				}
			?>
			<p><?php the_category(); ?></p>
			<p><?php the_tags(); ?></p>
			<p><small><?php the_date(); ?></small></p>
			
		</div>
		
		<hr /> -->
		<?php
	}
	?>
	</div>
	
	<div class="pagination">
		
		<div class="nav-next"><?php previous_posts_link( 'Previous' ); ?></div>
		<div class="nav-previous"><?php next_posts_link( 'Next', $query->max_num_pages ); ?></div>
		<?php
			/* example code for using the wp_pagenavi plugin */
			if (function_exists('wp_pagenavi'))
			{
				echo "<br />";
				wp_pagenavi( array( 'query' => $query ) );
			}
		?>
	</div>
	<?php
}
else
{
	?>
<section class="service_list">
	<h3 style="text-align: center;">
		No Results Found
	</h3>
</section>
	<?php
}
?>
</section>