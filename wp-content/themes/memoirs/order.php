<?php require_once("/../../../wp-blog-header.php"); ?>
<?php
/**
 * Template Name: Creating order Template
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
                //alert(g);
            })
            jQuery(this).addClass('showBorder');
        });
      
         jQuery('#step_one_next').click(function(){
			if (jQuery('.Styleimage_radio:checked').val() != null){
			  jQuery('#order_step_one').hide();
				 jQuery('#order_step_two').show();
				 jQuery('#2').replaceWith("<b><span id=\"2\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">2. Write text </span></b>");
				 jQuery('#1').replaceWith("<span id=\"1\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">1</span>");
		   }else{
                jQuery('#error_step_one').show();
				$("html, body").animate({ scrollTop: 0 }, "slow");
           }            
        });
        jQuery ('#step_two_next').click(function(){
            textareaValue = jQuery("#input_text_two").val();
            jQuery('#order_step_three').show(); 
			jQuery('#order_step_two').hide();
			jQuery('#3').replaceWith("<b><span id=\"3\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">3. Upload photos</span></b>");
			jQuery('#2').replaceWith("<span id=\"2\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">2</span>");
        });
		
		
		var changedValues = new Array();
		var flag = true;
		jQuery ('#upload_pic').click(function(){
           if (jQuery('#agree').is(':checked')){
						   
				  var image_value= $('.imageClass');
				
				  image_value.each(function(){
				  var valueofImage =jQuery(this).val();
				  if(valueofImage !=""){
					changedValues.push(valueofImage);
					var ext = jQuery(this).val().split('.').pop().toLowerCase();
						if($.inArray(ext, ['gif','png','jpg','jpeg']) == -1) {
							flag =false;
						}
					}
				  });
				if(changedValues.length >0 && flag==true){
					jQuery('#upload_div').hide();
					jQuery('#loading').show();
							setTimeout(function(){
							  $("#loading").fadeOut("slow", function () {
							  $("#loading").remove();
							  $('#confirm').show();
							  });
							}, 2000);  
				}
				else{
					alert('You must upload at least one image and format must be jpg,png,gif!!!');
				}
			}	 
			else{
			alert("Please select the check box");
			}	
				
        });
		jQuery ('#cancel_pic').click(function(){
         	alert("Need to know the functionally from yusuf vai.");   
        });
        jQuery ('#step_three_next').click(function(){
		if(changedValues.length >0 && flag==true){			
				jQuery('#order_step_four').show(); 
				jQuery('#order_step_three').hide();	
				jQuery('#4').replaceWith("<b><span id=\"4\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">4. Get the look</span></b>");
				jQuery('#3').replaceWith("<span id=\"3\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">3</span>");
			}else{
				alert("Upload you photo.");
			}
		});
		jQuery ('#step_four_next').click(function(){		
			if (jQuery('.look_radio:checked').val() != null){
				jQuery('#order_step_four').hide();	
				jQuery('#order_step_five').show(); 
				jQuery('#5').replaceWith("<b><span id=\"5\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">5. Delivery</span></b>");
				jQuery('#4').replaceWith("<span id=\"4\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">4</span>");
			}else
			{
				alert("Select a Look!");
			}
		});
		
		jQuery("#step_five_next").attr("disabled","disabled")
		
		jQuery ('#agree_last').click(function(){
			if(jQuery('#agree_last').is(':checked')){		
				if (jQuery('.frame_radio:checked').val() != null) {
					jQuery("#step_five_next").removeAttr("disabled");
				}
			}
		});
		jQuery ('#step_five_next').click(function(){
		if(jQuery('#agree_last').is(':checked')==false){
			alert("check the check Box");
		}
				jQuery('#order_step_five').hide();	
				jQuery('#order_step_six').show(); 
				jQuery('#6').replaceWith("<b><span id=\"6\" style=\"background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;\">6. Login or Not?</span></b>");
				jQuery('#5').replaceWith("<span id=\"5\" style=\"background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 5px;\">5</span>");
		
		});		
		
		jQuery('.clicked_img_look').click(function(){
			get_look_id = jQuery(this).attr('id');
            var f = jQuery('#order_step_four .showBorder');
            f.each(function(){
                jQuery(this).removeClass('showBorder');
                //get_look_id = jQuery(this).attr('id');
                //alert(get_look_id);
            })
            jQuery(this).addClass('showBorder');
		
		})
		jQuery('.clicked_img_frame').click(function(){
			get_frame_id = jQuery(this).attr('id');
            var f = jQuery('#order_step_five .showBorder');
            f.each(function(){
                jQuery(this).removeClass('showBorder');
                //get_look_id = jQuery(this).attr('id');
                //alert(get_frame_id);
            })
            jQuery(this).addClass('showBorder');
		
		})
    });   
</script>

		<div id="primary" class="showcase">
			<div id="content" role="main">
				<div id="show_steps_no" style="margin: 10px 0px 30px 0px;">
				<b><span id="1" style="background: #FCF;padding: 10px 20px;border-radius: 4px;margin: 5px;box-shadow: 3px 3px 0px #403340;">1. Select your style</span></b>
				<span id="2" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">2</span>
				<span id="3" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">3</span>
				<span id="4" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">4</span>
				<span id="5" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">5</span>
				<span id="6" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">6</span>
				<span id="7" style="background: #FCF;padding: 10px 15px;border-radius: 4px;margin: 2px;">7</span>
				</div>
			<form name="order" action="wp-content/themes/memoirs/success.php" method="post" enctype="multipart/form-data">	
				<div id="order_step_one" style="margin: 10px 0px 30px 0px;" >
					<div id="error_step_one" style="display: none;font-size:20px; font-weight: bold;color:red;">PLEASE SELECT A STYLE FORM BELOW</div>
						<p>Create your memoir in 6 easy steps. 1 Select your style Choose from one style below - or create your very own, customised style! Each Memoir can be used for 21st, 30th, 40th or more birthdays, anniversaries,bereavements or as a wonderful gift to treasure forever.</p>
						<?php
						global $post;
						$cat_id=get_cat_ID("style"); // get the category Id
						//echo $cat_id;				// print the category Id	
						$args = array( 'numberposts' => 9,'order'=> 'ASC','category' => $cat_id );
						$myposts = get_posts( $args );
						$i=0;
						foreach( $myposts as $post ) :	setup_postdata($post);
						//echo $post->ID; 		// print the Post ID
										$feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); // get the Featured image
						echo "<div class='style_chosse'><img src='".$feat_image."' id='".$post->ID."' class='clicked_image'/>"; 
						$i=$i+1;
						?>						
							<div style="padding: 0 10px 0 0;;"><p style="float:left;width:50%"><input type="radio" class="Styleimage_radio" name="image_select" value="<?php echo $i; ?>" /><?php the_title(); ?></p> <p style="float:right;width:45%; text-align:right;"><a href=""><img src="wp-content/themes/memoirs/images/fb_like.png"/></a></p></p></div>
						<?php
								
						echo "</div>";
						endforeach; ?>
					
					<div style="clear:both"></div>
								<p style="float:right;"><input type="button" name="step_one_next" value="Next" id="step_one_next"></p>
				</div>
			
				<div id="order_step_two" style="display:none;">    
					<p>This is an optional step. Please write any text or poem which you would like to appear on your Memoir e.g. "Happy Birthday, John" etc. </p>
					<p id="step_two_heading">PLEASE WRITE TEXT OR POEM TO APPEAR IN MEMOIR BELOW</p>
					<p><textarea rows="5" cols="20" name="input_text_two" id="input_text_two"></textarea> </p>
					<p style="float:right;"><input type="button" name="step_one_next" value="Next" id="step_two_next"></p>                           
				</div>
				<div id="order_step_three" style="display:none;">    
				   <center> <p class="step_para">Upload your photographs on the field below. Or alternatively call to us or post the photos to <br/>Memoirs, 6, Foxford Avenue, Melbourne Estate, Bishopstown, Cork.<br/>We will scan the photos for you at &#8364;2.50 per photo and return the photos to you with your completed Memoir.</p>
					<br/><br/>
					<p class="step_para">You can upload up to 10 photos at a time on our secure server. <br/>You can upload JPG, GIF, or PNG files.</p></center>
					<center><br/>
						<div>
							<div id="upload_div">
								<input type="file" class="imageClass" name="image01" id="image01" size="40" /><br/>
								<input type="file" class="imageClass" name="image02" id="image02" size="40" /><br/>
								<input type="file" class="imageClass" name="image03" id="image03" size="40" /><br/>
								<input type="file" class="imageClass" name="image04" id="image04" size="40" /><br/>
								<input type="file" class="imageClass" name="image05" id="image05" size="40" /><br/>
								<input type="file" class="imageClass" name="image06" id="image06" size="40" /><br/>
								<input type="file" class="imageClass" name="image07" id="image07" size="40" /><br/>
								<input type="file" class="imageClass" name="image08" id="image08" size="40" /><br/>
								<input type="file" class="imageClass" name="image09" id="image09" size="40" /><br/>
								<input type="file" class="imageClass" name="image10" id="image10" size="40" />
							</div>
							<div id='loading' style="display:none;" ><img src='wp-content/themes/memoirs/loading.gif' /></div>
							<div id="confirm" style="display:none;"> <b>Uploaded successfully!</b></div>
							<br/><br/>
								
						<input type="checkbox" name="agree" id="agree" value="agree"> I certify that I have the right to distribute these photos<br/> 
							and that they do not violate the Terms of Use.<br/><br/>
						<input type="button" name="upload_pic" value="Upload photos" id="upload_pic"> &nbsp;&nbsp;or&nbsp;&nbsp;<input type="button" name="cancel_pic" value="Cancel" id="cancel_pic">
						<br/><br/><br/><br/>
						<p style="font-size:10px;">The file size limit is 5 MB. If your upload does not work, try uploading a smaller picture</p>
						</div>
					</center>
					<p style="float:right;"><input type="button" name="step_three_next" value="Next" id="step_three_next"></p>
				</div>  
				<div id="order_step_four" style="display:none;">
					<p class="step_para">Add the following Looks to your Memoir - get instant white teeth, a "no gym diet" or an instant tan! Select one or any of these effects which were previously only known to celebrities to enhance your photos.</p>
					<table>
						<tr>
							<td><img src="wp-content/themes/memoirs/images/50lady.png" id="50lady" class="clicked_img_look" /></td>
							<td><img src="wp-content/themes/memoirs/images/smile.png" id="smile" class="clicked_img_look" /></td>
							<td><img src="wp-content/themes/memoirs/images/dg.png" id="dg" class="clicked_img_look" /></td>
						</tr>
						<tr>
							<td><h1><input type="radio" class="look_radio" name="look_radio" id="weight" value="weight" /> Instant Weight Loss <br/> &#8364;20.00</h1></td>
							<td><h1><input type="radio" class="look_radio" name="look_radio" id="Dazzling" value="dazzling" /> Dazzling Whites <br/>&#8364;20.00</h1></td>
							<td><h1><input type="radio" class="look_radio" name="look_radio" id="fake" value="Fake" /> Very Fake Bake <br/>&#8364;20.00</h1></td>
						</tr>
						<tr>
							<td>
								<p class="step_para_td">No gym required! You can have <br/>
								instantaneous results with our <br/>
								photoshop work! Whoever said no pain <br/>
								meant no gain with our photoshop<br/> 
								results. Because photoshop is <br/>
								cheaper than thegym!<br/><br/>
								<a href="" style="color:#da69b4;">Click here to view before and after</a><br/><br/>
								Add to shopping bag
								</p>
							</td>
							<td>
								<p class="step_para_td">
								Have that dazzling smile you always 
								wanted with one tenth of the cost! 
								Now your pearly whites can be whiter than ever!<br/><br/>
								<a href="" style="color:#da69b4;">	Click here to view before and after</a><br/><br/>
								Add to shopping bag

								</p>
							</td>
							<td>
								<p class="step_para_td">
								Now your fake bake will be easier
								than ever! You don’t even have to
								go sunbathing, just add these looks 
								to your cart.<br/><br/>
								<a href="" style="color:#da69b4;">Click here to view before and after</a><br/><br/>
								Add to shopping bag

								</p>
							</td>
						</tr>
						
					</table>
					<br/><br/>
					<p style="float:right;"><input type="button" name="step_four_next" value="Next" id="step_four_next"></p>
				</div>
				<div id="order_step_five" style="display:none;">		
					<center>
						<p id="step5_h1">Select how you want your Memoir to be delivered</p><br/>
						<p id="step5_h2">YOU WILL RECEIVE A PROOF WITHIN 5 WORKING DAYS. YOUR ORDER WILL NOT BE FINALISED UNTIL YOU CONFIRM THE FINAL ARTWORK VIA EMAIL.</p><br/>
						<p>If you require a specific size that is different to our sizes available, please <a href="">contact us</a> we will do what we can to accommodate you.</p><br/><br/>
						<p id="step5_h3">PLEASE SELECT HOW YOU WOULD LIKE YOUR MEMOIR DELIVERED<br/>1. VIA EMAIL   2. VIA POST AS A POSTER  3. VIA COURIER FRAMED </p><br/><br/>
						<p id="step5_h4">1. How would you like your Memoir delivered?<br/>2. What frame would you like to complement your Memoir?</p><br/><br/>
						<p>
							<table>
								<tr>
									<td><img src="wp-content/themes/memoirs/images/frame01.png"  id="frame01" class="clicked_img_frame" /></td>
									<td><img src="wp-content/themes/memoirs/images/frame02.png" id="frame02" class="clicked_img_frame" /></td>
									<td><img src="wp-content/themes/memoirs/images/frame03.png" id="frame03" class="clicked_img_frame" /></td>
								</tr>
								<tr>
									<td><p class="step_para"><input type="radio" name="frame_radio" id="standard" class="frame_radio" value="standard" /> Standard Ebony frame <br/>&#8364;12.50</p></td>
									<td><p class="step_para"><input type="radio" name="frame_radio" id="natural" class="frame_radio" value="natural" /> Natural frame. Also available <br/>in black <br/>&#8364;16.00</p></td>
									<td><p class="step_para"> <input type="radio" name="frame_radio" id="luxury" class="frame_radio" value="luxury" /> Luxury Vintage frame <br/>&#8364;18.00</p></td>
								</tr>
							</table>
						</p><br/><br/>
						<p><b>I have read and I agree to Memoir's Terms and Conditions</b>&nbsp;&nbsp;<input type="checkbox" name="agree_last" id="agree_last" value="agree"></p><br/><br/>
						<p style="float:right"><input type="submit" name="step_four_next" value="Next" id="step_five_next"></p>								
					</center>
				</div>
				
				
				
			</form>			
			</div><!-- #content -->
		</div><!-- #primary -->

<?php get_footer(); ?>