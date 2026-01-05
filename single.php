<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
			<div class="content-wrapper">
				<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', 'post' );

				endwhile; // End of the loop.
				?>
				<div id="right-sidebar">
					<?php dynamic_sidebar( 'sidebar-right' );?>
				</div>
			</div>
		</div>
	</main><!-- #main -->

	<?php
	// Post navigation outside main
	if ( have_posts() ) :
		while ( have_posts() ) :
			the_post();
			?>
			<div class="container">
				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-subtitle">' . esc_html__( 'Précédent:', 'giron-veveyse' ) . '</span> <span class="nav-title">%title</span>',
						'next_text' => '<span class="nav-subtitle">' . esc_html__( 'Suivant:', 'giron-veveyse' ) . '</span> <span class="nav-title">%title</span>',
					)
				);
				?>
			</div>
			<?php
			break; // Only need navigation once
		endwhile;
		rewind_posts();
	endif;
	?>

<?php
get_footer();
