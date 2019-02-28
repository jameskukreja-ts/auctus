<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since 1.0.0
 */

?>

	
	<footer>
		
		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<div class="col-sm-9 footer_font">
						<h3>
							<?php echo get_option('auctus_footer_phone') ?>  &nbsp; &nbsp; &nbsp; &nbsp;   <?php echo get_option('auctus_footer_email') ?>		
						</h3>
						<div class="menu-footer-container">
							<ul  class="nav nav-tabs">
								<li  class="menu-item menu-item-type-post_type">© 2018 All Rights Reserved. Design & Development by</li>
								<li class="menu-item menu-item-type-post_type"><a href="#">Goldman Marketing Group</a></li>
								<li class="menu-item menu-item-type-post_type"><a href="#">Sitemap </a></li>
								<li  class="menu-item menu-item-type-post_type "><a href="#">Privacy Policy </a></li>
							</ul>
						</div>
					</div> <!-- End Col -->
					<div class="col-md-1 col-sm-1 col-xs-4">
						<a href=""><img src="<?php echo get_option('auctus_footer_image_1') ?>" width="80"></a>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-4">
						<a href=""><img src="<?php echo get_option('auctus_footer_image_2') ?>"  width="85"></a>
					</div>
					<div class="col-md-1 col-sm-1 col-xs-4">
						<a href=""><img src="<?php echo get_option('auctus_footer_image_3') ?>" width="80"></a>
					</div>

				</div>
			</div>
		</div>
	</footer>
	
<script src="<?php echo get_stylesheet_directory_uri() . '/assets/js/auctus.js'?>"></script>
<?php wp_footer(); ?>

</body>
</html>
