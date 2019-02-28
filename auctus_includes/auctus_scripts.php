<?php 

	function auctus_enqueue_scripts() {
		wp_deregister_script('jquery');
		wp_register_script( 'jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js', null, null, false );
		wp_enqueue_script('jquery');

		wp_enqueue_script(
			'auctus-js', 
			get_stylesheet_directory_uri() . '/assets/js/auctus.js'
    	);


		wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js', null, null, false );

		wp_enqueue_script('bootstrap');
		
	}

	add_action( 'wp_enqueue_scripts', 'auctus_enqueue_scripts' );


	function auctus_enqueue_styles() {
		
		wp_register_style( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css', null, null, true );
		wp_enqueue_style('bootstrap');
		
		wp_register_style( 'auctus-roboto', 'https://fonts.googleapis.com/css?family=Lato|Roboto', null, null, true );
		wp_enqueue_style('auctus-roboto');

		wp_register_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', null, null, true );
		wp_enqueue_style('font-awesome');
	
		wp_enqueue_style(
			'auctus-css', 
			get_stylesheet_directory_uri() . '/assets/css/auctus.css'
    	);


		
	}

	add_action( 'wp_enqueue_scripts', 'auctus_enqueue_styles' );

?>