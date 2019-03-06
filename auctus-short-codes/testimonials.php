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
			<div class="col-md-6 auctus_testimonial1" data-aos-duration="1500" data-aos="fade-right">
				<?php if(isset($testimonials[0]) && !empty($testimonials[0])): ?>
					<p><?php echo $testimonials[0]['testimonial'] ?></p>
					<h5><?php echo $testimonials[0]['author'] ?></h5>
				<?php endif; ?>
			</div>

		</div>
		<div class="mid_contant" data-aos-duration="1500" data-aos="zoom-in-right">
			<h1>From strategic planning <br>through execution....<br><span>you name it,<br>we’ve done it.</span></h1>
			<div class="discovery_more_btn">
				<a href="#">DISCOVER MORE ></a>
			</div>
		</div>
		<div class="multi_logos testmonial">
			<div class="col-md-4 auctus_testimonial2" data-aos-duration="1500" data-aos="fade-right">
				<?php if(isset($testimonials[1]) && !empty($testimonials[1])): ?>
					<p><?php echo $testimonials[1]['testimonial'] ?></p>
					<h5><?php echo $testimonials[1]['author'] ?></h5>
				<?php endif; ?>
			</div>
			<div class="col-md-4">
				&nbsp;
			</div>
			<div class="col-md-4 auctus_testimonial3" data-aos-duration="1500" data-aos="fade-left">
				<?php if(isset($testimonials[2]) && !empty($testimonials[2])): ?>
					<p><?php echo $testimonials[2]['testimonial'] ?></p>
					<h5><?php echo $testimonials[2]['author'] ?></h5>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>