<?php

$options[] = array(	"type" => "maintabletop");

    /// General Settings
	
	    $options[] = array(	"name" => "General Settings",
						"type" => "heading");
						
		   
			
			$options[] = array(	"name" => "Customize Your Design",
						        "toggle" => "true",
								"type" => "subheadingtop");
						
				$options[] = array(	"label" => "Use Custom Stylesheet",
						            "desc" => "If you want to make custom design changes using CSS enable and <a href='". $customcssurl . "'>edit custom.css file here</a>.",
						            "id" => $shortname."_customcss",
						            "std" => "false",
						            "type" => "checkbox");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			$options[] = array(	"name" => "Favicon",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"desc" => "Paste the full URL for your favicon image here if you wish to show it in browsers. <a href='http://www.favicon.cc/'>Create one here</a>",
						            "id" => $shortname."_favicon",
						            "std" => "",
						            "type" => "text");	
			
			$options[] = array(	"type" => "subheadingbottom");
			
			
			
			$options[] = array(	"name" => "Logo Image",
						        "toggle" => "true",
								"type" => "subheadingtop");

                $options[] = array(	"name" => "Choose Your full logo image",
				                    "desc" => "Paste the full URL to your logo image here.",
						            "id" => $shortname."_logo_url",
						            "std" => "",
						            "type" => "text");

				$options[] = array(	"name" => "Choose Title over Logo",
				                    "desc" => "This option will overwrite your logo selection above - You can <a href='". $generaloptionsurl . "'>change your settings here</a>",
						            "label" => "Show Logo Title",
						            "id" => $shortname."_show_blog_title",
						            "std" => "true",
						            "type" => "checkbox");	

			$options[] = array(	"type" => "subheadingbottom");
			
			
			
			
			 $options[] = array(	"name" => "Home Page Settings",
						"type" => "heading");
			
			
			$options[] = array(	"name" => "Product Image",
							   "toggle" => "true",
								"type" => "subheadingtop");
			
			$options[] = array(	"desc" => "Product Image along with hyperlink URL if you wish. Basic HTML code allowed.",
					                "id" => $shortname."_main_img",
					                "std" => "<a href='http://templatic.com/'> 
<img src='".get_bloginfo('template_directory')."/images/iphone.png' alt='' /></a>",
					                "type" => "textarea");
			$options[] = array(	"type" => "subheadingbottom");
			
			
			$options[] = array(	"name" => "Product Description",
						        "toggle" => "true",
								"type" => "subheadingtop");	
			
			
				$options[] = array( "desc" => "Place the content you wish to show on the right hand side of the product. You may add any kind of content of your wish here. Basic HTML code is allowed. ",
			    		            "id" => $shortname."_main_content",
			    		            "std" => "<p>Represent your single product with product image and intro text. Or, simply use this theme as a coming soon page for your upcoming app or website. </p>

<blockquote> Represent your single product with product image and intro text. Or, simply use this theme as a coming soon page for your upcoming app or website.
</blockquote> 
 
<ul>
     <li> <strong>Dashboard provides a quick overview</strong>  <br/> 
      Monitor just about anything</li> 
     <li><strong>Ready-to-use service definitions</strong>  <br/> 
      Fully customizable monitoring</li> 
     <li><strong> <a href='#'>Notify multiple users</a> or different users per host </strong><br/> 
      No setup fees, contracts, or term commitments</li> 
</ul>

<p class='highlight'>Price : $199  </p>

<p>disciplines with a focus and drive to utilize these tools by making significant impact that meets up with the demands of our present age. </p>

<div class='btn'><a href='http://templatic.com'><span class='btn_l'>Sample Button</span><span class='btn_r'></span></a></div>",
			    		            "type" => "textarea");	
						
			$options[] = array(	"type" => "subheadingbottom");
			
			
			
			
			
			 
			 	$options[] = array(	"name" => "Subscribe Form Setting",
						    "type" => "heading");
				
					$options[] = array(	"name" => "Subscribe form",
						        "toggle" => "true",
								"type" => "subheadingtop");
					

			
			       $options[] = array(	"name" => "",
				                    "desc" => "Wish to show Feed subscription form? ",
									"label" => "Yes, show feed subscription form.",
						            "id" => $shortname."_show_subscribe",
						            "std" => "true",
						            "type" => "checkbox");
	

			 
						
			$options[] = array( "desc" => "Syndication / Feed URL  &nbsp;  &nbsp;  -> &nbsp;  &nbsp;  &nbsp;  <br />  (ex.http://feeds2.feedburner.com/templatic) -  If you are using a service like Feedburner to manage your RSS feed, enter full URL to your feed into box above. If you'd prefer to use the default WordPress feed, simply leave this box blank.",
			    		            "id" => $shortname."_feedburner_url",
			    		            "std" => "",
			    		            "type" => "text");
			
			
			
	 
			
			
				$options[] = array( "desc" => "Syndication / Feed ID  &nbsp;  &nbsp;  -> &nbsp;  &nbsp;  &nbsp; <br />(ex.templatic) If you are using a service like Feedburner to manage your RSS feed, enter Feed ID to your feed into box above. If you'd prefer to use the default WordPress feed, simply leave this box blank.",
			    		            "id" => $shortname."_feedburner_id",
			    		            "std" => "",
			    		            "type" => "text");	
						
			 		$options[] = array(	"type" => "subheadingbottom");
			 
			
			
				
			
								
		$options[] = array(	"type" => "maintablebreak");
		
		
    
		
 			
						
		
 												
$options[] = array(	"type" => "maintablebottom");
				
$options[] = array(	"type" => "maintabletop");


		
	/// SEO Options
	$options[] = array(	"name" => "Design Options",
						    "type" => "heading");
	
	$options[] = array(	"name" => "Background, Font-Family, Font-size, Font color, Link color",
						        "toggle" => "true",
								"type" => "subheadingtop");
							
							$options[] = array(	"name" => "body background image url ",
					                "desc" => "(ex. color code - background : http://templatic.com/bg.png )",
						            "id" => $shortname."_background",
						            "std" => "".get_bloginfo('template_directory')."/images/bodybg.png",
						            "type" => "text");
							
						
							
							$options[] = array(	"name" => "body background Image repeat or no-repeat ",
					                "desc" => "",
						            "id" => $shortname."_background_repeat",
						            "std" => "repeat-x left top",
						            "type" => "select",
									"options" => array('no-repeat center top','repeat-x center top','repeat-y center top','no-repeat Left top','repeat-x left top','repeat-y left top','repeat'));
							
							
							$options[] = array(	"name" => "body background color  ",
					                "desc" => "Select color",
						            "id" => $shortname."_color",
						            "std" => "",
						             "type" => "color",
									"css_class" => "color",);
							
							
							$options[] = array(	"name" => "Font Family",
					                "desc" => "select font family",
						            "id" => $shortname."_fonts_family",
						            "std" => "Arial",
						            "type" => "select",
									"options" => array('Adobe Caslon Pro','Myriad Pro','Arial','Helvetica','sans-serif','Georgia','Times New Roman','Times, serif'));
							
							
							$options[] = array(	"name" => "Font Size",
					                "desc" => "select font size pixel",
						            "id" => $shortname."_fonts_size",
						            "std" => "14",
 									"type" => "text");
							
							$options[] = array(	"name" => "Font Color",
					                "desc" => "Select color",
						            "id" => $shortname."_fonts_color",
						            "std" => "555",
 									 "type" => "color",
									"css_class" => "color",);
							
							$options[] = array(	"name" => "Font Normal Link Color ",
					                "desc" => "Select color",
						            "id" => $shortname."_fonts_link_color",
						            "std" => "0a82d8",
 									 "type" => "color",
									"css_class" => "color",);
							
							$options[] = array(	"name" => "Font Hover Link Color ",
					                "desc" => "Select color",
						            "id" => $shortname."_fonts_link_hover_color",
						            "std" => "000",
 									 "type" => "color",
									"css_class" => "color",);
							
	
		$options[] = array(	"type" => "subheadingbottom");
	
				
		$options[] = array(	"name" => "SEO Options",
						    "type" => "heading");
						
			$options[] = array(	"name" => "Home Page <code>&lt;meta&gt;</code> tags",
						        "toggle" => "true",
								"type" => "subheadingtop");

				$options[] = array(	"name" => "Meta Description",
					                "desc" => "You should use meta descriptions to provide search engines with additional information about topics that appear on your site. This only applies to your home page.",
					                "id" => $shortname."_meta_description",
					                "std" => "",
					                "type" => "textarea");

				$options[] = array(	"name" => "Meta Keywords (comma separated)",
					                "desc" => "Meta keywords are rarely used nowadays but you can still provide search engines with additional information about topics that appear on your site. This only applies to your home page.",
						            "id" => $shortname."_meta_keywords",
						            "std" => "",
						            "type" => "text");
									
				$options[] = array(	"name" => "Meta Author",
					                "desc" => "You should write your <em>full name</em> here but only do so if this blog is writen only by one outhor. This only applies to your home page.",
						            "id" => $shortname."_meta_author",
						            "std" => "",
						            "type" => "text");
						
			$options[] = array(	"type" => "subheadingbottom");
			
			
			
			
		$options[] = array(	"type" => "maintablebreak");
		
		
	
						
$options[] = array(	"type" => "maintablebottom");

?>