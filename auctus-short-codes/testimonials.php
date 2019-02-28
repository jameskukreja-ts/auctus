<?php 

	$args = array(
	    'post_type'=> 'testimonials',
	    'orderby'    => 'rand',
	    // 'meta_key' => '_mcf_sort_order',
	    // 'order_by' => 'meta_value_num',
	    // 'meta_type'=> 'CHAR'
	    );              

	$valuesQuery = new WP_Query( $args );
	if($valuesQuery->have_posts() ) : 
		$testimonials = [];
		while ( $valuesQuery->have_posts() && count($testimonials)< 3) :
			$valuesQuery->the_post(); 
			$testimonials[] = [
								'testimonial' => get_the_content(),
								'author' => get_the_title()
							  ];
		endwhile;
	endif;
?>
<div id="tesmonial" class=" bg_images">
	<div class="container">
		<div class="multi_logos testmonial">
			<div  data-aos="fade-right" class="col-md-6 auctus_testimonial1">
				<?php if(isset($testimonials[0]) && !empty($testimonials[0])): ?>
					<p><?php echo $testimonials[0]['testimonial'] ?></p>
					<h5><?php echo $testimonials[0]['author'] ?></h5>
				<?php endif; ?>
			</div>

		</div>
		<div class="mid_contant">
			<h1 data-aos="fade-right">From strategic planning <br>through execution....<br><span data-aos="fade-left">you name it,<br>we’ve done it.</span></h1>
			<div data-aos="fade-up" data-aos-duration="3000" class="discovery_more_btn">
				<a href="#">DISCOVER MORE ></a>
			</div>
		</div>
		<div class="multi_logos testmonial">
			<div data-aos="fade-up-right" class="col-md-4 auctus_testimonial2">
				<?php if(isset($testimonials[1]) && !empty($testimonials[1])): ?>
					<p><?php echo $testimonials[1]['testimonial'] ?></p>
					<h5><?php echo $testimonials[1]['author'] ?></h5>
				<?php endif; ?>
			</div>
			<div class="col-md-4">
				&nbsp;
			</div>
			<div data-aos="fade-left" class="col-md-4 auctus_testimonial3">
				<?php if(isset($testimonials[2]) && !empty($testimonials[2])): ?>
					<p><?php echo $testimonials[2]['testimonial'] ?></p>
					<h5><?php echo $testimonials[2]['author'] ?></h5>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>