<?php

	function getAuctusBlocks(){
		$blocks = [
			[
				'name'=> 'hero-block',
				'script_name' => 'hero-block-script',
				'script' => 'hero-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'core-values-block',
				'script_name' => 'core-values-block-script',
				'script' => 'core-values-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'promise-block',
				'script_name' => 'promise-block-script',
				'script' => 'promise-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'history-block',
				'script_name' => 'history-block-script',
				'script' => 'history-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'team-block',
				'script_name' => 'team-block-script',
				'script' => 'team-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'testimonials-block',
				'script_name' => 'testimonials-block-script',
				'script' => 'testimonials-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'services-block',
				'script_name' => 'services-block-script',
				'script' => 'services-block.js',
				'type' => 'auctus'
			],
			[
				'name'=> 'nav-block',
				'script_name' => 'nav-block-script',
				'script' => 'nav-block.js',
				'type' => 'auctus'
			]

		];
		return $blocks;
	}

	function register_auctus_blocks() {

		$blocks = getAuctusBlocks();

		foreach($blocks as $block){
		    wp_register_script(
		        $block['script_name'],
		        get_stylesheet_directory_uri() . '/assets/js/auctus-blocks/'.$block['script'],
		        array( 'wp-blocks', 'wp-element', 'wp-editor' )
		    );

		    register_block_type( $block['type'].'/'.$block['name'], array(
		        'editor_script' => $block['script_name'],
		    ) );
		}
   }

   add_action( 'init', 'register_auctus_blocks' );
?>