<div id="History" class="bg_time">
	<h1 class="year_time">
		HOW WE GOT HERE
	</h1>
	<h4 class="year_time_sami">
		Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
	</h4>
	<div id='history-timeline' class="not-mobile">
		
		<section class="cd-horizontal-timeline-content">
			<div class="timeline">
				<div class="events-wrapper">
					<div class="events">
						<ol>

							<?php 

								$args = array(
								    'post_type'=> 'history',
								    'order'    => 'ASC',
								    // 'meta_key' => '_mcf_sort_order',
								    // 'order_by' => 'meta_value_num',
								    // 'meta_type'=> 'CHAR'
								    );              

								$valuesQuery = new WP_Query( $args );
								if($valuesQuery->have_posts() ) : 
									$index = 0;
									while ( $valuesQuery->have_posts() ) :
									$valuesQuery->the_post(); 
							?>			
										<li>
											<a href="#0" id="content-<?php echo $index; ?>" data-date="<?php echo get_the_title(); ?>"  class = "<?php echo ($index < 1 ? 'selected' : ''); ?>"></a>
											<span class="event-content-span">
												<p class="event-content-year"><?php echo get_the_title(); ?> <i class="fas fa-map-marker-alt" style="font-size: 27px;"></i></p><br>
												<p class ="event-content"> 
													<?php echo get_the_content(); ?>
												</p>
											</span>
										</li>
							<?php
										$index++;
									endwhile;
								endif;
							?>
						</ol>

						<span class="filling-line" aria-hidden="true"></span>
					</div> <!-- .events -->
				</div> <!-- .events-wrapper -->
					<!-- .cd-timeline-navigation -->
			</div> <!-- .timeline -->

			
		</section>

	  	<section class="cd-horizontal-timeline">
			<div class="timeline">
				<div class="events-wrapper">
					<div class="events">
						<ol>
							<?php
								if($valuesQuery->have_posts() ) : 
									$index = 0;
									while ( $valuesQuery->have_posts() ) :
										$valuesQuery->the_post(); 
							?>			
										<li>
											<a href="#0" id="event-<?php echo $index; ?>" data-date="<?php echo get_the_title(); ?>" class="<?php echo ($index < 1 ? 'selected' : ''); ?>">
												<span class="event-year"><?php echo get_the_title(); ?></span>
											</a>
										</li>
							<?php
										$index++;
									endwhile;
								endif;
							?>
						</ol>

						<span class="filling-line" aria-hidden="true"></span>
					</div> <!-- .events -->
				</div> <!-- .events-wrapper -->
					
				<ul class="cd-timeline-navigation">
					<li><a href="#0" class="prev inactive"><i class="fas fa-angle-left" style="font-size: 48px;"></i></a></li>
					<li><a href="#0" class="next"><i class="fas fa-angle-right" style="font-size: 48px;"></i></a></li>
				</ul> <!-- .cd-timeline-navigation -->
			</div> <!-- .timeline -->
		</section>
	</div>
	<div class="mobileonly">
		<div class="swiper-container" id="history_slider">
		    <div class="swiper-wrapper">
				<?php
				     if($valuesQuery->have_posts() ) : 
						while ( $valuesQuery->have_posts() ) :
						$valuesQuery->the_post(); 
				?>			<div class="swiper-slide">
					          <div class = "history-slide">
					              <h2><?php echo get_the_title(); ?> <i class="fas fa-map-marker-alt" style="font-size: 27px;"></i></h2>
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
		var swiper2 = new Swiper('#history_slider', {
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