<?php
/**
 * Template part for displaying page content in page.php
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
		?>
	<!-- .entry-header -->


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="container">
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
<!-- 
	<div id="right-sidebar">
		<?php dynamic_sidebar( 'sidebar-right' );?>
	</div> -->
	<!-- .entry-content -->

	</div>
</article><!-- page #post-<?php the_ID(); ?> -->
