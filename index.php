<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Giron_de_la_Veveyse
 */

get_header();
?>
<div class="header-image">
	<img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
</div>
	<main id="primary" class="site-main">
		<div class="container">

			<div id="news">
				<?php
				if ( have_posts() ) :

					if ( is_home() && ! is_front_page() ) :
						?>
						<header>
							<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
						</header>
						<?php
					endif;

					/* Start the Loop */
					while ( have_posts() ) :
						the_post();

						/*
						* Include the Post-Type-specific template for the content.
						* If you want to override this in a child theme, then include a file
						* called content-___.php (where ___ is the Post Type name) and that will be used instead.
						*/
						get_template_part( 'template-parts/content', 'home' );

					endwhile;
					the_posts_navigation();
				else :
					get_template_part( 'template-parts/content', 'none' );
				endif;
				?>
			</div>
			<!-- <div id="right-sidebar">
				<?php dynamic_sidebar( 'sidebar-right' );?>
			</div> -->
		</div>
	</main><!-- #main -->
<?php
get_footer();
