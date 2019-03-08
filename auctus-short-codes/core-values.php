<div id="Values" class="container">
	<div class="multi_logos">
		<h1>OUR CORE VALUES</h1>
		<?php 

			$args = array(
			    'post_type'=> 'core_values',
			    'order'    => 'DESC',
			    // 'meta_key' => '_mcf_sort_order',
			    // 'order_by' => 'meta_value_num',
			    // 'meta_type'=> 'CHAR'
			    );              

			$valuesQuery = new WP_Query( $args );
			if($valuesQuery->have_posts() ) : 
				while ( $valuesQuery->have_posts() ) :
				$valuesQuery->the_post(); 
		?>			

					<div class=" abc col-md-4 col-xs-12 col-sm-6 core_value">
						<div alt="<?php the_title(); ?>" class="hvrbox  hvrbox_set" style="background-image:url('<?php echo get_post_meta(get_the_id(), '_mcf_'.'background_image', true ) ?>');">
						<img src="<?php echo get_post_meta(get_the_id(), '_mcf_'.'font_icon', true ) ?>" alt="<?php the_title(); ?> Icon">
						<h3 class="text_center"><?php the_title(); ?></h3>
						<div class="hvrbox-layer_top">
							<div class="hvrbox-text">
								<?php the_content(); ?>
							</div>
						</div>
						</div>
					</div>

					<!-- <div class=" abc col-md-4 col-xs-12 core_value">
						<div class="hvrbox">
							<img src="<?php echo get_post_meta(get_the_id(), '_mcf_'.'background_image', true ) ?>" alt="<?php the_title(); ?>" class="hvrbox-layer_bottom" >

							<div class="hvrbox-layer_top">
								<div class="hvrbox-text">
									<?php the_content(); ?>
								</div>
							</div>
						</div>

					</div> -->
		<?php
				endwhile;
			endif;
		?>

	</div>
	<div class="mobileonly">
		<h1>OUR CORE VALUES</h1>
		<div class="swiper-container" id="core_values_slider">
		    <div class="swiper-wrapper">
				<?php
				     if($valuesQuery->have_posts() ) : 
						while ( $valuesQuery->have_posts() ) :
						$valuesQuery->the_post(); 
				?>			<div class="swiper-slide">
					          <div class="core_value_image">
					              <img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo get_post_meta(get_the_id(), '_mcf_'.'background_image', true ) ?>" />
					          </div>
					          <div class="core_value_description">
					              <h4><?php the_title(); ?></h4>
					              <?php the_content(); ?>
					          </div>
					      </div>
				<?php	
						endwhile;
					endif;
				?>
		      
		    </div>
		          <div class="swiper-button-next"></div>
		        <div class="swiper-button-prev"></div>
		</div>
	</div>
</div>


<script>
	jQuery(document).ready(function(){
		var swiper2 = new Swiper('#core_values_slider', {
		  effect: 'coverflow',
		  grabCursor: true,
		  centeredSlides: true,
		  slidesPerView: 1.25,
		  coverflowEffect: {
		    rotate: 50,
		    stretch: 0,
		    depth: 100,
		    modifier: 1,
		    slideShadows : true,
		  },
		  pagination: false,
		  navigation: {
		    nextEl: '.swiper-button-next',
		    prevEl: '.swiper-button-prev',
		  },
		});
	});
</script>