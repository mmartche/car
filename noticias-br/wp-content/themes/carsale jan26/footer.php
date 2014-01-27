
		</div><!-- #main -->
<hr />
		<footer id="colophon" class="site-footer" role="contentinfo">
Footer
			<?php /* get_sidebar( 'footer' ); */ ?>

			<div class="site-info">
				<?php do_action( 'carsale_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://carsale.com.br/', 'carsale' ) ); ?>">my site</a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>
