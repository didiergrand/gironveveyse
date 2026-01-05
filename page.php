<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Giron_de_la_Veveyse
 */

get_header();
?>

<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		giron_veveyse_display_header_image();
		break; // Only need to display header once
	endwhile;
	rewind_posts();
endif;
?>

	<main id="primary" class="site-main">
		<div class="container">
			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'page' );

			endwhile; // End of the loop.
			?>
			<div id="right-sidebar">
				<?php dynamic_sidebar( 'sidebar-right' );?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
