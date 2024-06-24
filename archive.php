<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Skirmish
 * @since Skirmish 2.0
 */

get_header(); ?>

		<section id="primary" class="site-content">
			<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
				the_archive_title( '<h1 class="page-title">', '</h1>' );
				the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/*
				 * Include the Post-Type-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_type() );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

			</div><!-- #content -->
		</section><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>