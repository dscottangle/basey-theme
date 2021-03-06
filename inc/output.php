<?php

/*-----------------------------------------------------------------------------------*/
/*	Define HTML

This section is used to add your HTML output to the theme. If you look throughout the theme, you'll notice
several function() calls that share similarities based on their position. Those are merely references to
WP actions that you can add content to (in this case - HTML output). This way, it keeps our core theme files
neat and allows us to change HTML on several pages easily (you can always use standard conditional template
logic)

/*-----------------------------------------------------------------------------------*/

/**
 * Add menu to header
 * @return void
 */
function basey_head_output() { ?>

	<div class="contain-to-grid">
		<nav class="top-bar" data-topbar>
			<ul class="title-area">
				<li class="name">
					<h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
				</li>
				<li class="toggle-topbar menu-icon"><a href="#"><span><?php _e('Menu', 'basey'); ?></span></a></li>
			</ul>
			<section class="top-bar-section">
				<?php foundation_top_bar_l(); ?>
			</section>
		</nav>
	</div>
	<?php
}
add_action( 'basey_head', 'basey_head_output' );

/**
 * Before content content
 * @return void
 */
function basey_content_before_output() { ?>
	<section class="block">
		<div class="row">
			<div class="large-8 columns">
			<?php
}
add_action( 'basey_content_before', 'basey_content_before_output' );

/**
 * After content content
 * @return void
 */
function basey_content_after_output() { ?>

			</div>
			<div class="large-4 columns">
				<div class="panel">
					<?php dynamic_sidebar( 'basey-sidebar' ); ?>
				</div>
			</div>
		</div>
	</section>
	<?php
}
add_action( 'basey_content_after', 'basey_content_after_output' );


/**
 * Display query count and load time
 * @return void
 */
function basey_query_load_time() {

	if (current_user_can( 'manage_options' )) { ?>
		<footer id="bottom">
			<div class="row">
				<div class="small-12 columns">
					<div class="panel">
						<strong><?php echo get_num_queries(); ?></strong> queries in <strong><?php timer_stop(1); ?></strong> seconds
					</div>
				</div>
			</div>
		</footer>
	<?php }
}
add_action( 'basey_debug', 'basey_query_load_time' );