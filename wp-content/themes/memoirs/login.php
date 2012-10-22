<?php
/**
 * Template Name: Login Template
 * Description: A Page Template For User Login
 *
 * The showcase template in Twenty Eleven consists of a featured posts section using sticky posts,
 * another recent posts area (with the latest post shown in full and the rest as a list)
 * and a left sidebar holding aside posts.
 *
 * We are creating two queries to fetch the proper posts and a custom widget for the sidebar.
 *
 * @package WordPress
 * @subpackage Memoirs
 * @since Memoirs 1.0
 */

// Enqueue showcase script for the slider
wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/showcase.js', array( 'jquery' ), '2011-04-28' );

get_header(); ?>

		<div id="primary" class="showcase">
			<div id="content" role="main">

		<?php

			if (is_user_logged_in()){

			// wp_login_form(); 

			}

			else {
				//$home_url=get_home_url();
				$home_url=home_url();
				//$home_url=site_url( $_SERVER['REQUEST_URI'] );
				//echo $home_url;
				//wp_login_form('redirect' => site_url( $_SERVER['REQUEST_URI'] )); 
				$args = array(
							//'echo' => true,
							'redirect' => $home_url, 
							// 'form_id' => 'loginform',
							// 'label_username' => __( 'Username' ),
							// 'label_password' => __( 'Password' ),
							// 'label_remember' => __( 'Remember Me' ),
							// 'label_log_in' => __( 'Log In' ),
							// 'id_username' => 'user_login',
							// 'id_password' => 'user_pass',
							// 'id_remember' => 'rememberme',
							// 'id_submit' => 'wp-submit',
							// 'remember' => true,
							// 'value_username' => NULL,
							// 'value_remember' => false 
							); 
				wp_login_form($args); 

			};

		?>

			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>