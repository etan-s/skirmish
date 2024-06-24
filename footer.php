<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package Skirmish
 * @since Skirmish 2.0
 */
?>

	</div><!-- #main -->


	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<?php // FYI: You can adjust the footer credit in the theme Customize options in your WordPress Dashboard. Adjusting it here could potentially break the theme. You will need to adjust it again after any theme updates.
			 if ( get_theme_mod( 'skirmish_footer_copyright' ) ) : ?>
				<?php echo wp_kses_post( get_theme_mod( 'skirmish_footer_copyright' ) ); ?>
			<?php else : ?>
				&copy; <?php echo date("Y") ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a>

				<span class="sep">&middot;</span>

				<?php printf( esc_html__( 'Built with %1$s', 'skirmish' ), '<a href="https://refueled.net">Skirmish</a>' ); ?>
			<?php endif; ?>
		</div><!-- .site-info -->
	</footer><!-- .site-footer .site-footer -->

</div><!-- #page .hfeed .site -->

<?php wp_footer(); ?>

</body>
</html>