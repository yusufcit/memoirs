<?php require_once("../../../wp-blog-header.php"); ?>
<?php
//wp_enqueue_script( 'twentyeleven-showcase', get_template_directory_uri() . '/js/showcase.js', array( 'jquery' ), '2011-04-28' );

get_header(); ?>
<?php
if (isset($_POST['step_four_next'])) { 
// echo "enter";
// ECHO $_REQUEST['style_no'];
// ECHO $_REQUEST['input_text_two'];
//ECHO $_REQUEST['image01'];

 //image upload

echo "<pre>"; 
 print_r($_POST);		
echo "</pre>";	
// echo $_POST['image01']["tmp_name"];
// echo $_FILES['image01']["tmp_name"];
$target_path = dirname(__FILE__)."/upload/";

//$target_path = $target_path . basename( $_FILES['image01']['name']);
$ys=move_uploaded_file($_FILES['image01']["tmp_name"], $target_path.$_FILES['image01']['name']);
 echo $ys;
// if($ys)	  echo "Stored in: " . "upload/" . $_POST['image01']["name"];
global $post;

/*if ( $_FILES ) {
$files = $_FILES['upload_attachment'];
foreach ($files['name'] as $key => $value) {
if ($files['name'][$key]) {
$file = array(
'name' => $files['name'][$key],
'type' => $files['type'][$key],
'tmp_name' => $files['tmp_name'][$key],
'error' => $files['error'][$key],
'size' => $files['size'][$key]
);

$_FILES = array("upload_attachment" => $file);

foreach ($_FILES as $file => $array) {
	$newupload = insert_attachment($file,$post->ID);
	echo $newupload;
}
}
}
}
*/
}
?>

<script type="text/javascript">
   jQuery(document).ready(function(){ 
       var g=0;
	    var imageArray=new Array();
		var upload= 0;
		var  get_look_id=0;
        jQuery('.clicked_image').click(function(){
             g = jQuery(this).attr('id');
            var f = jQuery('#order_step_one .showBorder');
            f.each(function(){
                jQuery(this).removeClass('showBorder');
                g = jQuery(this).attr('id');
                alert(g);
            })
            jQuery(this).addClass('showBorder');
        });
      
         jQuery('#step_one_next').click(function(){
			//alert(g);
           if (g != '0'){
             jQuery('#order_step_one').hide();
             jQuery('#order_step_two').show();
			 jQuery('#2').replaceWith("<b><span id=\"2\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">2. Write text </span></b>");
			 jQuery('#1').replaceWith("<span id=\"1\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">1</span>");
           }else{
                jQuery('#error_step_one').show();
           }            
        });
        jQuery ('#step_two_next').click(function(){
            textareaValue = jQuery("#input_text_two").val();
            //alert(textareaValue);
            jQuery('#order_step_three').show(); 
			jQuery('#order_step_two').hide();
			jQuery('#3').replaceWith("<b><span id=\"3\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">3. Upload photos</span></b>");
			jQuery('#2').replaceWith("<span id=\"2\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">2</span>");
        });
		
		jQuery ('#step_four_next').click(function(){
            jQuery('#order_step_four').hide();	
			jQuery('#order_step_five').show(); 
			jQuery('#5').replaceWith("<b><span id=\"5\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">5. Delivery</span></b>");
			jQuery('#4').replaceWith("<span id=\"4\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">4</span>");
        });
		jQuery ('#step_five_next').click(function(){
            jQuery('#order_step_five').hide();	
			jQuery('#order_step_six').show(); 
			jQuery('#6').replaceWith("<b><span id=\"6\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">6. Login or Not?</span></b>");
			jQuery('#5').replaceWith("<span id=\"5\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">5</span>");
        });
		jQuery ('#load_registration').click(function(){
            jQuery('#order_step_six').hide(); 
            jQuery('#registration').show(); 
			//jQuery('#7').replaceWith("<b><span id=\"7\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">7. Payment</span></b>");
			//jQuery('#6').replaceWith("<span id=\"6\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">6</span>");			
        });
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
		jQuery('.clicked_img_frame').click(function(){
			get_frame_id = jQuery(this).attr('id');
            var f = jQuery('#order_step_five .showBorder');
            f.each(function(){
                jQuery(this).removeClass('showBorder');
                //get_look_id = jQuery(this).attr('id');
                alert(get_frame_id);
            })
            jQuery(this).addClass('showBorder');
		
		})
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
					}						
					else {	
						echo "Already have an account?";
						wp_login_form();	
						echo "Forgotten your password?<a href='".wp_lostpassword_url( $redirect )."'> Click here</a><br/>New user? <span id='load_registration' >Click here</span>";
						
					};
				?>
				<p style="float:right"><input type="button" name="step_four_next" value="Next" class="step_six_next"></p>								
				</div>
				<div id ="registration"style="display:none;">
					<?php gravity_form(3, $display_title=true, 
						$display_description=false, $display_inactive=false, 
						$field_values=null, $ajax=false, $tabindex); 
					?>
					<p style="float:right"><input type="button" name="step_four_next" value="Next" class="step_six_next"></p>		
				</div>
				<!--div id="order_step_seven" style="display:none;">
					<p id="paypal"><img src="wp-content/themes/memoirs/images/paypal.png" /></p><br/><br/>
					<p>Please <a href="">login</a> to paypal in order to complete the payment</p>						
				</div-->
			</form>			
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>