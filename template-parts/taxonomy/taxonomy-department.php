<?php

get_header(); ?>

<h1>
	Test 2
</h1>

<?php 
if ( have_posts() ) {
	while ( have_posts() ) {
		the_post(); 
		
		echo the_title();
	} // end while
} // end if
?>



<?php get_footer(); ?>


