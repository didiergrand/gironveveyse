<?php
/**
 * Template Name: Galerie
 * The template for displaying the Galerie page.
 *
 * @package Giron_de_la_Veveyse
 */

get_header();
?>

<main id="primary" class="site-main">
	<div class="container">
		<?php
		while ( have_posts() ) :
			the_post();
			?>
			<article id="post-<?php the_ID(); ?>" <?php post_class( 'gallery-page' ); ?>>
				<header class="entry-header">
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				</header>
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
