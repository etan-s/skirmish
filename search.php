<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package skirmish
 */

get_header();
?>

<div id="primary" class="site-content">
	<div id="content" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
					/* translators: %s: search query. */
					printf( esc_html__( 'Search Results for: %s', 'skirmish' ), '<span>' . get_search_query() . '</span>' );
					?>
				</h1>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content' );

			endwhile;

			the_posts_navigation();

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

	</div><!-- #content -->
</div><!-- #primary .site-content -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>