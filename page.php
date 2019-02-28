<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

get_header();
?>

<?php 
	if ( have_posts() ): 
		while ( have_posts() ): 
			the_post();
			the_content();
		endwhile; 
	else: 
?>
	<p>Sorry, no posts matched your criteria.</p>
<?php 
	endif; 
?>

<?php
get_footer();
