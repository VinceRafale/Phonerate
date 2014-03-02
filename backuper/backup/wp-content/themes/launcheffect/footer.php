<?php
/**
 * Footer
 *
 * Contains the site credit and jQuery Supersized code.
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
?>

<div class="clear"></div>

<!-- PRIVACY POLICY MODAL -->
<div id="privacy-policy" class="jqmWindow">
	<a href="#" class="close">&times;</a>
	<h2><?php le('lefx_privacy_policy_heading'); ?></h2>
	<p><?php le('lefx_privacy_policy'); ?></p>
</div>

<!-- FOOTER BRANDING (Premium/Free) -->
<?php if(lefx_version() == 'premium') { get_template_part('premium/brand'); } else { 
?><ul id="footer">
	<li>Powered by <a href="http://www.launcheffectapp.com" class="logo" target="_blank">Launch Effect</a> for WordPress by <a href="http://www.barrelny.com" target="_blank">Barrel</a></li>
</ul><?php } ?>


<!-- Slideshow Script -->
<script type="text/javascript"><?php 
if (get_option('lefx_bg_image2')&&get_option('lefx_enable_slideshow')){
	$speed = get_option('lefx_slide_fx_speed');
	$duration = get_option('lefx_slide_speed');

?>var slideshow = true; var slideshow_speed = <?php echo !empty($speed)&&is_numeric($speed)?$speed:2.5; ?>; var slideshow_duration = <?php echo !empty($duration)&&is_numeric($duration)?$duration:5; ?>;<?php 
} else { 

?>var slideshow = false; var slideshow_speed = 0; var slideshow_duration = 0;<?php 
} ?></script>

<!-- Launch Effect Scripts -->
<?php wp_footer(); ?>

<?php if(ler('lefx_addjsfooter')) { ?><!-- Start Additional User-Defined JavaScript -->
<?php echo ler('lefx_addjsfooter'); ?><!-- End Additional User-Defined JavaScript -->
<?php } ?>
<!-- Facebook Integration -->
<div id="fb-root"></div>
<script>window.fbAsyncInit = function() {FB.init({<?php if (ler('lefx_description_fbappid')) : ?>appId: "<?php le('lefx_description_fbappid'); ?>",<?php endif; ?>status: true,cookie: true,xfbml: true,channelUrl: '<?php echo get_template_directory_uri(); ?>/inc/facebookchannel.php'});};(function() {var e = document.createElement('script'); e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';document.getElementById('fb-root').appendChild(e);}());</script>

<!-- Google PlusOne Button -->
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">{"parsetags": "explicit"}</script>

<?php if(ler('bkt_google')) { ?>
<!-- Google Analytics -->
<script type="text/javascript"><?php echo ler('bkt_google'); ?></script>
<?php } ?>
</body>
</html>
