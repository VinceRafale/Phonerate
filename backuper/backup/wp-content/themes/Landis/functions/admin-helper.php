<?php
function gd_admin_head(){
?>
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/functions/css/admin.css' type='text/css' media='all' />
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/functions/css/checkbox.css' type='text/css' media='all' />
<link rel='stylesheet' id='rm-admin-css' href='<?php echo GD_THEME_DIR; ?>/functions/scripts/datepicker/css/jquery-ui-1.8.11.custom.css' type='text/css' media='all' />


<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/functions/scripts/jquery.checkbox.min.js"></script>
<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/functions/scripts/ajaxupload.js"></script>
<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/functions/scripts/jquery.blockUI.js"></script>
<script type="text/javascript" src="<?php echo GD_THEME_DIR; ?>/functions/scripts/datepicker/jquery-ui-1.8.11.custom.min.js"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		
			var dates = jQuery( "#to" ).datepicker({
			defaultDate: "+1w",
			changeMonth: true,
			numberOfMonths: 1,
			onSelect: function( selectedDate ) {
				var option = this.id == "from" ? "minDate" : "maxDate",
					instance = jQuery( this ).data( "datepicker" ),
					date = jQuery.datepicker.parseDate(
						instance.settings.dateFormat ||
						jQuery.datepicker._defaults.dateFormat,
						selectedDate, instance.settings );
				dates.not( this ).datepicker( "option", option, date );
			}
		});
		
		
		
		  jQuery('.gd_super_check').checkbox({empty:'<?php echo GD_THEME_DIR; ?>/functions/css/empty.png'});
				
			//Check if element exists
				jQuery.fn.exists = function(){return jQuery(this).length;}
		  
		  
		  //AJAX upload
			jQuery('.gd_upload').each(function(){
				
				var the_button=jQuery(this);
				var image_input=jQuery(this).prev();
				var image_id=jQuery(this).attr('id');
				
				new AjaxUpload(image_id, {
					  action: ajaxurl,
					  name: image_id,
					  
					  // Additional data
					  data: {
						action: 'gd_ajax_upload',
						data: image_id
					  },
					  autoSubmit: true,
					  responseType: false,
					  onChange: function(file, extension){},
					  onSubmit: function(file, extension) {
							the_button.html("Uploading...");				  
						},
					  onComplete: function(file, response) {	
							the_button.html("Upload Image");
							
							if(response.search("Error") > -1){
								alert("There was an error uploading:\n"+response);
							}
							
							else{							
								image_input.val(response);
								var image_preview='<img src="' + response + '" class="gd_image_preview" />';							
								the_button.next().html(image_preview);
								
								var remove_button_id='remove_'+image_id;
									var rem_id="#"+remove_button_id;
								if(!(jQuery(rem_id).exists())){
									the_button.after('<span class="button gd_remove" id="'+remove_button_id+'">Remove Image</span>');
								}
								
									
									
								}
							
						}
				});
			});
			
			
			//AJAX image remove
			jQuery('.gd_remove').live('click', function(){
				var remove_button=jQuery(this);
				var image_remove_id=jQuery(this).prev().attr('id');
				remove_button.html('Removing...');
				
				var data = {
					action: 'gd_ajax_remove',
					data: image_remove_id
				};
				
				jQuery.post(ajaxurl, data, function(response) {
					remove_button.prev().prev().val('');
					remove_button.next().html('');
					remove_button.remove();
				});
				
			});
});	
</script>
<?php
}
?>