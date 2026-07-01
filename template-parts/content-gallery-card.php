<?php
/**
 * Template part for displaying gallery posts as cards.
 *
 * @package Giron_de_la_Veveyse
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'gallery-card' ); ?>>
	<a class="gallery-card-link" href="<?php the_permalink(); ?>">
		<div class="gallery-card-media">
			<?php if ( has_post_thumbnail() ) : ?>
				<?php the_post_thumbnail( 'large' ); ?>
			<?php else : ?>
				<div class="gallery-card-placeholder" aria-hidden="true"></div>
			<?php endif; ?>
		</div>
		<div class="gallery-card-content">
			<h2 class="gallery-card-title"><?php the_title(); ?></h2>
			<div class="entry-meta">
				<?php giron_veveyse_posted_on(); ?>
			</div>
			<?php if ( has_excerpt() ) : ?>
				<p class="gallery-card-excerpt"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</a>
</article>
