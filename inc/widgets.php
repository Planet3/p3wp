<?php

/**
 * Custom Recent_Comments widget class
 *
 * @since Planet3.0 3.0
 */

class Planet3_0_Recent_Comments_Widget extends WP_Widget {

	function __construct() {
		parent:: __construct( false, $name = 'P3 Recent Comments' );
	}

	function form() {

	}

	function update() {
		
	}

	function widget( $args, $instance) {
		?>
		<li class="widget widget_recent_comments p3_widget_recent_comments">
			<h1 class="widget-title"> Recent Comments</h1>
			<ul>
				<li class="recentcomments">hello!</li>
			</ul>
		</li>
		<?php
	}

}

//register widget  
function register_planet3_0_recent_comments_widget() {
	register_widget( 'Planet3_0_Recent_Comments_Widget' );
}

// load widget  
add_action( 'widgets_init', 'register_planet3_0_recent_comments_widget' );