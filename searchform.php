<?php
/**
 * The template for displaying search forms in Planet3.0
 *
 * @package Planet3.0
 * @since Planet3.0 3.0
 */
?>
<form method="get" id="searchform" class="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<div class="row collapse">
		<div class=" small-9 columns">
			<input type="search" class="field" name="s" value="<?php echo esc_attr( get_search_query() ); ?>" id="s" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder' ); ?>" />
		</div>
		<div class="small-3 columns">
			<input type="submit" class="submit postfix radius button" id="searchsubmit" value="<?php echo esc_attr_x( 'Search', 'submit button' ); ?>" />
		</div>
	</div>
</form>