<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<input type="search" class="search-field" placeholder="Search: " value="<?php echo get_search_query(); ?>" name="s" title="Search this Site" />
	</label>
	<button type="submit" class="search-submit" title="Submit Search"><span class="screen-reader-text"><i class="fa fa-arrow-right"></i><i class="fa fa-search"></i></span></button>
</form>
