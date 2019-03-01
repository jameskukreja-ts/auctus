<div id="team" class="container">
	<div class="multi_logos">
		<h1>TEAM AUCTUS</h1>
		<br>

		<?php 

			$args = array(
			    'post_type'=> 'teammates',
			    'order'    => 'DESC',
			    // 'meta_key' => '_mcf_sort_order',
			    // 'order_by' => 'meta_value_num',
			    // 'meta_type'=> 'CHAR'
			    );              

			$valuesQuery = new WP_Query( $args );
			if($valuesQuery->have_posts() ) : 
				$count = 0;
				while ( $valuesQuery->have_posts() ) :
				$valuesQuery->the_post(); 
				$count++;
		?>			
					<div class=" abc col-md-4 col-sm-6">
						<div class="hvrbox">
							<img src="<?php echo get_post_meta(get_the_id(), '_mcf_'.'image', true ) ?>" alt="<?php the_title(); ?>" class="hvrbox-layer_bottom" >

							<div class="hvrbox-layer_top">
								<div class="hvrbox-text">
									<?php the_content(); ?>
								</div>
							</div>
						</div>
						<h4><?php the_title(); ?></h4>
						<h5><?php echo get_post_meta(get_the_id(), '_mcf_'.'designation', true ) ?></h5>
					</div>

		<?php	
					if($count == 5):
		?>
						<div class="slidingDiv">
		<?php
					endif;
				endwhile;
			endif;
		?>

		<?php if($count > 5): ?>
			</div>
			<button class="hideshow">Show More +</button>
		<?php endif;?>
	</div>
	<div class="mobileonly">
		<h1>TEAM AUCTUS</h1>
		<div class="swiper-container" id="team_slider">
		    <div class="swiper-wrapper">
				<?php
				     if($valuesQuery->have_posts() ) : 
						while ( $valuesQuery->have_posts() ) :
						$valuesQuery->the_post(); 
				?>			<div class="swiper-slide">
					          <div class="teamimage">
					              <img class="img-responsive" alt="<?php the_title(); ?>" src="<?php echo get_post_meta(get_the_id(), '_mcf_'.'image', true ) ?>" />
					          </div>
					          <div class="team_description">
					              <h4><?php the_title(); ?></h4>
					              <h5><?php echo get_post_meta(get_the_id(), '_mcf_'.'designation', true ) ?></h5>
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
		var swiper1 = new Swiper('#team_slider', {
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