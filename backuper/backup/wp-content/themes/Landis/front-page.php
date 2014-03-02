<?php get_header(); ?>

<div id="front_page_container">
	
	
				

	

		
	<div id="front_page">
		<div class="container">

							
					<div id="front_left_cell" class="show">
					<?php
					$text = get_option('countdown-text');
					 ?>
					<span id="countdowntext"><?php echo $text; ?></span>
				
					<span id="defaultCountdown" class="countdown"></span>
				
					

								
									
					</div><!--close front_left_cell-->
					
					
					
					
					
								
				
			</div><!--close continer-->
		</div><!--close front_page-->
</div><!--front_page_container-->
<?php get_footer(); ?>