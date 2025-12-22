<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Giron_de_la_Veveyse
 */

?>
<?php if (has_post_thumbnail( $post->ID ) ): 
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); 
		$image = $image[0]; 
	else :
		$image = 'https://www.giron-veveyse.ch/wp-content/uploads/2022/10/cropped-banner_giron_veveyse_2022_3-scaled-1.jpg';
	endif;
?>
<?php
	if ( is_singular() ) :
		the_title( '<header class="entry-header" style="background-image: url('.$image.')"><h1 class="entry-title">', '</h1></header>' );
	else :
		the_title( '<header class="entry-header" style="background-image: url('.$image.')"><h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2></header>' );
	endif;
?><!-- .entry-header -->

<div class="container">
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


	<div class="entry-content">
		<?php
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

		?>
	</div><!-- .entry-content -->
</article><!-- post #post-<?php the_ID(); ?> -->

<!-- <div id="right-sidebar">
	<?php dynamic_sidebar( 'sidebar-right' );?>
</div> -->
<!-- .entry-content -->


</div>
