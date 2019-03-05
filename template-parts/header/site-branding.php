<div class="container">
	<div class="logo"><a href="#"><img src="<?php echo get_option( 'auctus_header_logo' ) ?>" alt="Site logo"></a><span><?php echo get_option( 'auctus_header_text' ) ?></span></div>

	<nav class="navbar navbar-inverse" >
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
 				<?php if ( has_nav_menu( 'menu-1' ) ) : ?>
					<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_class'     => 'main-menu',
								'items_wrap'     => '<ul id="%1$s" class="nav nav-tabs nav navbar-nav navbar-right">%3$s</ul>'
							)
						);
					?>
				<?php endif; ?>
			</div>

		</div>
	</nav>
</div>