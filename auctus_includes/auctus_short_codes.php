<?php
	
	$shortCodes = [
		'auctus_testimonials', 'auctus_team', 'auctus_services', 'auctus_promise', 'auctus_nav', 'auctus_history', 'auctus_hero', 'auctus_core_values'
	];

	foreach($shortCodes as $shortCode){
		add_shortcode($shortCode, 'render_'.$shortCode.'_shortcode');
	}

	function getShortCode($filePath){
		ob_start();
		include $filePath;
		$out1 = ob_get_clean();
		return $out1;
	}


	function render_auctus_hero_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/hero.php' );
	}

	function render_auctus_testimonials_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/testimonials.php' );
	}

	function render_auctus_team_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/team.php' );
	}

	function render_auctus_services_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/services.php' );
	}

	function render_auctus_promise_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/promise.php' );
	}

	function render_auctus_nav_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/nav.php' );
	}

	function render_auctus_history_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/history.php' );
	}
	
	function render_auctus_core_values_shortcode(){
		return getShortCode( STYLESHEETPATH.'/auctus-short-codes/core-values.php' );
	}
?>