<?php
/**
 * @package Skirmish
 * @since Skirmish 2.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="postedon">
		<div class="time"><?php the_time('m/j/y') ?></div>
		<?php if ( has_post_thumbnail()) : ?>
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" >
				<?php the_post_thumbnail('index-post-thumbnail'); ?>
			</a>
		<?php endif; ?>
	</div>
	
	
	<div class="entry">	
		<header class="entry-header">
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'skirmish' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

		</header><!-- .entry-header -->

		<?php if ( is_search() ) : // Only display Excerpts for Search ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->
		<?php else : ?>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'skirmish' ) ); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', 'skirmish' ), 'after' => '</div>' ) ); ?>
			</div><!-- .entry-content -->
		<?php endif; ?>

		<footer class="entry-meta">
			<?php skirmish_entry_footer(); ?>
		</footer><!-- #entry-meta -->
	</div><!-- end .entry -->
</article><!-- #post-<?php the_ID(); ?> -->
