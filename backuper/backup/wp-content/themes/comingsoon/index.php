<?php
/*
Template Name: Home Page
*/
?>
<?php get_header(); ?>



		<div id="wrapper" class="clearfix">
        
        
        	<div id="content">
            
            	 <div class="logo">
            	  <?php if ( get_option('ptthemes_show_blog_title') ) { ?>
                  <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
                       <?php /*?> <p class="description">
                          <?php bloginfo('description'); ?>
                        </p><?php */?>
                  
                <?php } else { ?>
                <a href="<?php echo get_option('home'); ?>/"><img src="<?php if ( get_option('ptthemes_logo_url') <> "" ) { echo get_option('ptthemes_logo_url'); } else { echo get_bloginfo('template_directory').'/images/logo.png'; } ?>" alt="<?php bloginfo('name'); ?>" /></a>
                <?php } ?>
                </div>  <!-- logo #end -->
                
                
                
                <?php if ( get_option('ptthemes_main_content') != "") { ?>
        			<?php echo stripslashes(get_option('ptthemes_main_content'));  ?>
        		<?php } ?>
                
                 
                
                
                <?php if ( get_option('ptthemes_show_subscribe') ) { ?>
                  		
                        <div class="subscribe" >
               <form  action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow"  onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=<?php echo stripslashes(get_option('ptthemes_feedburner_id'));  ?>', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true">
               <input type="text" class="textfield" onFocus="if (this.value == 'signup for email') {this.value = '';}" 
               onBlur="if (this.value == '') {this.value = 'signup for email';}" name="email"/>
              <input type="hidden" value="<?php echo stripslashes(get_option('ptthemes_feedburner_id'));  ?>" name="uri"/>
              <input type="hidden" name="loc" value="en_US"/>
               <input type="submit"  class="submit"  value=""  />
               </form>
             </div>
                  	
                <?php } else { ?>
                <?php } ?>
                
                
                
            	
            </div> <!-- content #end -->
        	
        	
            <div id="sidebar">
             <?php if ( get_option('ptthemes_main_img') != "") { ?>
        			<?php echo stripslashes(get_option('ptthemes_main_img'));  ?>
         <?php } ?>
         
         		<p class="copy">&copy; <?php the_time('Y'); ?> <?php bloginfo(); ?>  All rights reserved. </p>
                
                <p class="designby">Designed by 
            <a href="http://templatic.com" title="Premium wordpress themes">Templatic</a></p>
        
        	</div>
        
        
        </div> <!-- wrapper #end -->


    

 
<?php  get_footer(); ?>