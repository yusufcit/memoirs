<?php
/**
 * Template Name: Sidebar Template
 * Description: A Page Template that adds a sidebar to pages
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="primary">
	<div id="content" class="sidebar_content"role="main">
<?php
$args = array( 'numberposts' => 1 );
$lastposts = get_posts( $args );
foreach($lastposts as $post) : setup_postdata($post); ?>
	<h2 style="font-size:18px;"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
	<?php //the_content(); ?>
	<!--?php comments_template( '', true ); ?-->
<?php endforeach; ?>
			




			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
