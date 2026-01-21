<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Giron_de_la_Veveyse
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function giron_veveyse_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'giron_veveyse_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function giron_veveyse_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'giron_veveyse_pingback_header' );

/**
 * Get default header image URL.
 *
 * @return string Default header image URL.
 */
function giron_veveyse_get_default_header_image() {
	return 'https://www.giron-veveyse.ch/wp-content/uploads/2022/10/cropped-banner_giron_veveyse_2022_3-scaled-1.jpg';
}

/**
 * Get header image for post/page.
 *
 * @param int $post_id Post ID.
 * @return string Header image URL.
 */
function giron_veveyse_get_header_image( $post_id = null ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	// For posts, always use the site header image (same as homepage)
	if ( get_post_type( $post_id ) === 'post' ) {
		$header_image = get_header_image();
		if ( $header_image ) {
			return $header_image;
		}
		return giron_veveyse_get_default_header_image();
	}

	// For pages, use featured image if available, otherwise default header image
	if ( has_post_thumbnail( $post_id ) ) {
		$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), 'single-post-thumbnail' );
		return $image[0];
	}

	return giron_veveyse_get_default_header_image();
}

/**
 * Display header image with title for single posts/pages.
 *
 * @param string $title The title to display.
 */
function giron_veveyse_display_header_image( $title = '' ) {
	$image = giron_veveyse_get_header_image();
	?>
	<div class="header-image">
		<div class="header-image-bg" style="background-image: url(<?php echo esc_url( $image ); ?>);"></div>
		<div class="container">
			<div class="header-image-content">
				<?php if ( $title ) : ?>
					<h1 class="entry-title"><?php echo wp_kses_post( $title ); ?></h1>
				<?php else : ?>
					<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php
}

/**
 * Display header image for archive pages.
 *
 * @param string $title The archive title to display.
 */
function giron_veveyse_display_archive_header_image( $title = '' ) {
	$image = giron_veveyse_get_default_header_image();
	
	// Try to get category image if available
	if ( is_category() ) {
		$category = get_queried_object();
		// You can add custom field support for category images here if needed
	}
	
	?>
	<div class="header-image">
		<div class="header-image-bg" style="background-image: url(<?php echo esc_url( $image ); ?>);"></div>
		<div class="container">
			<div class="header-image-content">
				<?php if ( $title ) : ?>
					<h1 class="entry-title"><?php echo wp_kses_post( $title ); ?></h1>
				<?php else : ?>
					<?php the_archive_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<?php endif; ?>
				<?php
				$description = get_the_archive_description();
				if ( $description ) :
					?>
					<div class="archive-description"><?php echo wp_kses_post( $description ); ?></div>
					<?php
				endif;
				?>
			</div>
		</div>
	</div>
	<?php
}
