<?php require_once("../../../wp-blog-header.php"); ?>
<?php


/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]--><script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>

</head>

<body <?php body_class(); ?>>
<header id="branding" role="banner">
			<div id="header_left"></div>
			
			<nav id="accessa" role="navigation">
				<div id="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="images/logo.png" width="432px;"/></a></div>
				<div id="beside_logo"><?php
if (is_user_logged_in()){
$current_user =wp_get_current_user();
    echo "Welcome ".$current_user->user_login." | <a href='".wp_logout_url( home_url() )."' >Log Out </a>" ;
 
}
else {
    echo '<span style="color:#fff;">Welcome guest. Please</span><a href="?page_id=98" style="font-weight:bold;text-decoration:none;"> Login</a><span style="color:#fff;"> or </span><a href="?page_id=91" style="font-weight:bold;text-decoration:none;">Register</a>';
};
?><?php gravity_form( 2, $display_title=false, $display_description=false); ?></div>
				<div style="clear:both"></div>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			</nav><!-- #access -->		<div id="header_right"></div>		<div id="social">			<a href="http://twitter.com/memoirsdesigns" target="_blank"><img src="../../uploads/2012/10/twitter.png" style="width:30px" /></a>			<a href="http://www.facebook.com/memoirs.thegift" target="_blank"><img src="../../uploads/2012/09/fb.png" style="width:30px" /></a>		</div>
</header><!-- #branding -->
<div id="page" class="hfeed">
	


<div id="main">
<!--end of header part-->
<?php
if (isset($_POST['step_four_next'])) {

$price=20;
if($_POST['image_select']== 1) $image_style="The Bombshell";
if($_POST['image_select']== 2) $image_style="Vintage Lover";
if($_POST['image_select']== 3) $image_style="Kiss the Bride";
if($_POST['image_select']== 4) $image_style="Golden Balls";
if($_POST['image_select']== 5) $image_style="Snap Happy";
if($_POST['image_select']== 6) $image_style="Retro Glamour";
if($_POST['image_select']== 7) $image_style="Need for Speed";
if($_POST['image_select']== 8) $image_style="Christening";
if($_POST['image_select']== 9) $image_style="Golf Mania";
$text_underPhoto= $_POST['input_text_two'];
if($_POST['look_radio']=='weight') $image_look="Instant Weight Loss ";
if($_POST['look_radio']=='dazzling') $image_look="Dazzling Whites";
if($_POST['look_radio']=='Fake') $image_look="Very Fake Bake";

if($_POST['frame_radio']=='standard') {$image_frame="Standard Ebony frame"; $price=$price+12.5;}
if($_POST['frame_radio']=='natural') {$image_frame="Natural frame"; $price=$price+16;}
if($_POST['frame_radio']=='luxury') {$image_frame="Luxury Vintage frame"; $price=$price+18;}
if($_POST['frame_radio']== null) {$image_frame="Luxury Vintage frame"; $price=$price+12.5;}

$sql="INSERT INTO `order` VALUES('','','".$image_style."', '".$text_underPhoto."', '".$image_look."', '".$image_frame."', '".$price."', 'ordered', '0')";
//echo $sql."<br/>";
global $wpdb;
$wpdb->query("$sql");
$user_id=$wpdb->insert_id;
//echo "<br/>".$user_id;
$image_array[]=array();
$target_path = dirname(__FILE__)."/upload/";

	$sql1='';
for($i=1; $i<11; $i++){
	$image_array [$i]= $_FILES['image0'.$i.'']['name'];
	$sql1.="('".$user_id."', '".$image_array [$i]."') ";
	//"INSERT INTO `order_images` VALUES ('".$user_id."' '".$image_array [$i]."')";
	if($i < 10) {
		$sql1.=',';
	}
	$ys=move_uploaded_file($_FILES['image0'.$i.'']["tmp_name"], $target_path.$_FILES['image0'.$i.'']['name']);
	//echo $ys;
	//echo "<br/>hello".$image_array[$i];
}
	$sql1 = "INSERT INTO `order_images` VALUES ".$sql1;
	//echo "<br/>".$sql1;
	$sql1= $wpdb->prepare("$sql1");
	$wpdb->query("$sql1");  
}
?>


<script type="text/javascript">
   jQuery(document).ready(function(){ 
      
		jQuery ('.step_six_next').click(function(){
            jQuery('#order_step_six').hide(); 
            jQuery('#order_step_seven').show(); 
			jQuery('#7').replaceWith("<b><span id=\"7\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">7. Payment</span></b>");
			jQuery('#6').replaceWith("<span id=\"6\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">6</span>");			
        });
		
		jQuery ('#upload_pic').click(function(){
           if (jQuery('#agree').is(':checked')){   
				var i=1;		  
			   for(i; i<11; i++){
			   var image_id="#image0"+i;
			   var path=jQuery(''+image_id+'').val();
			   var pathArray = path.split('\\');
			   imageArray[i]=pathArray[pathArray.length - 1];
			   //alert(imageArray[i]);
			   }				
			  upload= 1; 
			}else{
			alert("Please select the check box");
			}	
				
        });
		jQuery ('#cancel_pic').click(function(){
         	alert("Need to know the functionally from yusuf vai.");   
        });
        jQuery ('#step_three_next').click(function(){
			//alert(upload); add condition
			alert(imageArray.length);
			if(imageArray.length!=0){
			
				jQuery('#order_step_four').show(); 
				jQuery('#order_step_three').hide();	
				jQuery('#4').replaceWith("<b><span id=\"4\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">4. Get the look</span></b>");
				jQuery('#3').replaceWith("<span id=\"3\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">3</span>");
			}else{
				alert("Upload you photo.");
			}
		});
		
		jQuery('.clicked_img_look').click(function(){
			get_look_id = jQuery(this).attr('id');
            var f = jQuery('#order_step_four .showBorder');
            f.each(function(){
                jQuery(this).removeClass('showBorder');
                //get_look_id = jQuery(this).attr('id');
                alert(get_look_id);
            })
            jQuery(this).addClass('showBorder');
		
		})
		jQuery ('#load_registration').click(function(){
            jQuery('#order_step_six').hide(); 
            jQuery('#registration').show(); 
			//jQuery('#7').replaceWith("<b><span id=\"7\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">7. Payment</span></b>");
			//jQuery('#6').replaceWith("<span id=\"6\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">6</span>");			
        });
    });   
</script>

		<div id="primary" class="showcase">
			<div id="content" role="main">
				<div id="show_steps_no" style="margin: 10px 0px 30px 0px;">
				<b><span id="1" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">1</span></b>
				<span id="2" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">2</span>
				<span id="3" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">3</span>
				<span id="4" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">4</span>
				<span id="5" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">5</span>
				<span id="6" style="background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;">6. Login Or Not?</span>
				<span id="7" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">7</span>
				</div>
				
					
				<div id="order_step_six" style="display:block;">
				<?php
					if (is_user_logged_in()){
						$useName=wp_get_current_user();
						echo "Your are loged in as: ".$useName->display_name;	
					?>
					<p style="float:right"><input type="button" name="step_four_next" value="Next" class="step_six_next"></p>							
					<?php
					}						
					else {	
						echo "Already have an account?";
						wp_login_form();	
						echo "Forgotten your password?<a href='".wp_lostpassword_url( $redirect )."'> Click here</a><br/>New user? <span id='load_registration' ><a href='javascript:void(0)'>Click here</a></span>";
						
					};
				?>
				
											
				</div>
				<div id ="registration"style="display:none;">
					<?php gravity_form(5, $display_title=true, 
						$display_description=false, $display_inactive=false, 
						$field_values=null, $ajax=false, $tabindex); 
					?>
					<p style="float:right"><input type="button" name="step_four_next" value="Next" class="step_six_next"></p>		
				</div>
				<div id="order_step_seven" style="display:none;">
					<p id="paypal"><img src="images/paypal.png" /></p><br/><br/>
					<form action="ipn.php" method="post">
					<p>Please login to paypal in order to complete the payment. click to the Next button, it will take you to the paypal.</p>		
					<input type="hidden" name="price" value="<?php echo $price; ?>" />
					<input type="hidden" name="user_id" value="<?php echo $useName->ID; ?>" />
					<input type="hidden" name="last_id" value="<?php echo $user_id; ?>" />
					<p style="float:right"><input type="submit" name="step_four_next" value="Next" class="step_six_next"></p>													
					
					</form>
				</div>		
			</div><!-- #content -->
		</div><!-- #primary -->
<?php get_footer(); ?>