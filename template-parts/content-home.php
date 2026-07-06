<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Giron_de_la_Veveyse
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	if ( is_singular() ) :
		the_title( '<h1>', '</h1>' );
	else :
		the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
	endif;

	// Affiche la date pour les articles de la page d'accueil.
	if ( 'post' === get_post_type() ) :
		?>
		<div class="entry-meta">
			<?php giron_veveyse_posted_on(); ?>
		</div>
		<?php
	endif;

	giron_veveyse_post_thumbnail();

	if ( has_category( 20 ) ) :
		?>
		<p>
			<a class="btn-default" href="<?php the_permalink(); ?>">
				<?php esc_html_e( 'Voir la galerie', 'giron-veveyse' ); ?>
			</a>
		</p>
		<?php
	else :
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'giron-veveyse' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
	endif;

	wp_link_pages(
		array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'giron-veveyse' ),
			'after'  => '</div>',
		)
	);
	?>
</article><!-- home #post-<?php the_ID(); ?> -->
