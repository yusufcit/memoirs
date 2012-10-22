<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>

	</div><!-- #main -->

	
</div><!-- #page -->

<footer id="colophon" role="contentinfo">

			<?php
				/* A sidebar in the footer? Yep. You can can customize
				 * your footer with three columns of widgets.
				 */
				if ( ! is_404() )
					get_sidebar( 'footer' );
			?>

			<div id="site-generator">
				<?php do_action( 'twentyeleven_credits' ); ?>
				<p><a href="<?php echo home_url();?>" title="homepage" rel="home">Home</a> |
				<a href="?page_id=7" title="Creat your Memoir" rel="memoirs">Creat your Memoir</a> |
				<a href="?page_id=9" title="Testimonials" rel="Testimonials">Testimonials</a> |
				<a href="?page_id=11" title="Blog" rel="Blog">Blog </a> |
				<a href="?page_id=150" title="Links" rel="Links">Links</a> |
				<a href="?page_id=152" title="tc" rel="tc">T&amp;C's </a> |
				<a href="?page_id=148" title="Sitemap" rel="Sitemap ">Sitemap</a> |
				<a href="?page_id=13" title="Contact" rel="Contact ">Contact us</a></p>
				<p id="copy">Designed by Annagram Graphic and Web Design company 2009 &copy</p>
			</div>
	</footer><!-- #colophon -->

</body>
</html>