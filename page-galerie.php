<?php
/**
 * Template Name: Galerie
 * The template for displaying the Galerie page.
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
		break;
	endwhile;
	rewind_posts();
endif;
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'gallery-page' ); ?>>
				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'giron-veveyse' ),
							'after'  => '</div>',
						)
					);
					?>
				</div>
			</article>
			<?php
		endwhile;
		?>

		<?php
		$gallery_query = new WP_Query(
			array(
				'post_type'           => 'post',
				'posts_per_page'      => -1,
				'ignore_sticky_posts' => true,
				'cat'                 => 20,
			)
		);

		if ( $gallery_query->have_posts() ) :
			?>
			<div class="gallery-cards" aria-label="<?php esc_attr_e( 'Galerie', 'giron-veveyse' ); ?>">
				<?php
				while ( $gallery_query->have_posts() ) :
					$gallery_query->the_post();
					get_template_part( 'template-parts/content', 'gallery-card' );
				endwhile;
				?>
			</div>
			<?php
			wp_reset_postdata();
		else :
			get_template_part( 'template-parts/content', 'none' );
		endif;
		?>
	</div>
</main>

<?php
get_footer();
