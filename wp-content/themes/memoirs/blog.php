<?php
/**
 * Template Name: Blog Template
 * Description: A Page Template that adds a sidebar to blog
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<div id="primary">
	<div id="content" class="_sidebar_content" role="main">
		<div id="post_area" style="float:left;">
			<?php
			$args = array( 'numberposts' => 1 );
			$lastposts = get_posts( $args );
			foreach($lastposts as $post) : setup_postdata($post); ?>
				<h2 style="font-size:18px;"><?php the_title(); ?></h2>
				<?php the_content();
				$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' );
				
				?>
				<img src="<?php echo $image[0];?>"/>
				<?php 
					$comments_args = array(
							// change the title of send button 
							'title_reply'=>' ',
							// remove "Text or HTML to be displayed after the set of comment fields"
							'comment_notes_after' => '',
							// redefine your own textarea (the comment body)
							'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Leave a Reply', 'noun' ) . '</label><br /><textarea id="comment" name="comment"  rows="1"  aria-required="true"></textarea></p>',
							//'label_submit' => Default: __( 'Add' ),
					);

					comment_form($comments_args);
				?>
			<?php endforeach; ?>
			
		</div>
		<div style="width:20%; float:right;background:#ffccff;"><?php wp_list_categories(); ?></div>
	</div><!-- #content -->
</div><!-- #primary -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>
