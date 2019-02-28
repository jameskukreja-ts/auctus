<?php
	
	function getAuctusMenuSections(){
		return [

			[
				'id' => 'auctus_header_menu',
				'title' => 'Header Menu Settings',
				'description' => "",
				'callback' => 'auctus_section_description',
				'page' => 'auctus-theme-options',
				'fields' => [
					[
						'id' => 'auctus_header_logo',
						'title' => 'Logo',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'image']
					],
					[
						'id' => 'auctus_header_text',
						'title' => 'Text',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'text']
					]
				]
			],
			[
				'id' => 'auctus_footer_menu',
				'title' => 'Footer Menu Settings',
				'description' => "",
				'callback' => 'auctus_section_description',
				'page' => 'auctus-theme-options',
				'fields' => [
					[
						'id' => 'auctus_footer_email',
						'title' => 'Email',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'text']
					],
					[
						'id' => 'auctus_footer_phone',
						'title' => 'Phone',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'tel']
					],
					[
						'id' => 'auctus_copyright_text',
						'title' => 'Copy Right Text',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'text']
					],
					[
						'id' => 'auctus_footer_image_1',
						'title' => 'Image 1',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'image']
					],
					[
						'id' => 'auctus_footer_image_2',
						'title' => 'Image 2',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'image']
					],
					[
						'id' => 'auctus_footer_image_3',
						'title' => 'Image 3',
						'field_group' => 'auctus-theme-options-grp',
						'meta' => ['type' => 'image']
					],
				]
			],
		];

	}


	function auctus_custom_settings (){
		wp_enqueue_media();
		$sections = getAuctusMenuSections();
		foreach($sections as $section){
			foreach($section['fields'] as $field){
				add_option($field['id'], "");// add theme option to database
			}
			add_settings_section (
				$section['id'], //section name for the section to add
				$section['title'], //section title visible on the page
				$section['callback'], //callback for section description
				$section['page']//page to which section will be added.,
			);

			foreach($section['fields'] as $field){
				add_option($field['id'], "");// add theme option to database
				add_settings_field (
					$field['id'], //ID for the settings field to add
					$field['title'], //settings title visible on the page
					'options_callback', //callback for displaying the settings field
					$section['page'], // settings page to where option is displayed
					$section['id'],
					['field' => $field]// section id for parent section.
				);
				register_setting ( $field['field_group'], $field['id']);
			}
		}
	}
	//callback for displaying setting description
	function auctus_section_description () {
		return '<p>Some Setting</p>';
	}

	function options_callback ($args){

		$field = $args['field'];
		$value = get_option( $field['id'] );
		switch($field['meta']['type']){
			case "image": {

              echo  '
              		<div>
	              		<input type="text" name="' . $field['id'] . '" id="' . $field['id'] . '" class="meta-image regular-text code" value="'.$value.'">
	                    <input type="button" class="button auctus-image-upload" value="Browse">
	                    <input type="button" class="button auctus-image-remove" value="Remove Image">
	                    <p>
	                    	<div class="image-preview"><img src="'. $value .'" style="max-width: 250px;"></div>
	                    </p>
	                </div>';                                 
                
                break;
            }
			default:{
				echo '<input name="'.$field['id'].'" id="'.$field['id'].'" class="code regular-text" value="'.$value.'" />';
			}
		}
	}
	
	//admin hook defined in functions.php. This calls the above function at
	// initialization time.
	add_action('admin_init', 'auctus_custom_settings' );
	
	function add_auctus_theme_page(){

		add_theme_page("Theme Options", "Theme Options", "manage_options", "auctus-theme-options", "auctus_theme_options", null, 0);
	}


	add_action( 'admin_menu', 'add_auctus_theme_page' );

	//this function creates a simple page with title Custom Theme Options Page.
	function auctus_theme_options() {
?>
		<div class="wrap">
			<h1>Theme Options</h1>
				<form method="post" action="options.php">
				<?php
					settings_fields('auctus-theme-options-grp');
					do_settings_sections("auctus-theme-options");
					submit_button();
				?>
			</form>
		</div>
<?php

	}
	//Adds footer text to footer menu
	function auctus_nav_menu_items($items, $args) {
	    if($args->theme_location === 'footer'){
	      
	       $newItem = '<li  class="menu-item menu-item-type-post_type">© 2018 '.get_option('auctus_copyright_text').'</li>';
	       $items = $newItem.$items;
	    }

	    return $items;
	}
	add_filter('wp_nav_menu_items', 'auctus_nav_menu_items', 10, 2);

?>