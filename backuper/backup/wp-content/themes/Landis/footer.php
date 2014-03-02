</div>

<div id="footer">
	<?php 
	$twitter = get_option('footer_twitter');
	$facebook = get_option('footer_facebook');
	if(empty($twitter) & empty($facebook)){
		$style = "display:none;";
		$styletext = "float:none;";
	}else{
		$style = "display:block;";
		$styletext = "float:right;";
	}
	?>
	
	<div id="copyright">
	<?php
	$twitter = get_option('footer_twitter');
	 $title = get_option('Title_text');  ?>
		<div id="copyright-wrap">
		<div id="spreadtheword"><a href="http://twitter.com/share" class="twitter-share-button" data-text="<?php echo $title." @".$twitter ?>" data-count="horizontal" style="float:left; margin:0px 0px 0px 20px;">Tweet</a><script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script></div>
		
	
	
	
				<?php $copyright = get_option('footer_copyright'); if(empty($copyright)) { $copyright = "© 2011 Landis. All Rights Reserved.<br/> Designed by <a href='http://www.themeskingdom.com'>Themes Kingdom</a> Powered by <a href='http://www.wordpress.org'>WordPress</a>.";}?>
						<?php 
						$search  = array("<a href=\'", "\'>" );
						$replace = array("<a href='", "'>"); echo  str_replace($search ,$replace ,$copyright);?>
		</div>
	</div> <!--close copy-->
	<div class="container">
			
			<div id="footer_content">
				<div id="footer_wrap">
				</div>
			</div>
	</div><!--close container-->
	
</div><!--close footer-->

	</div></div>
	
					
<?php if (is_front_page()) {?><?php }?>
</body>
</html>