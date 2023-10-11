<form class="search" role="search" method="get"  action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <input type="text" class="searchinput" value="<?php echo get_search_query(); ?>" name="s"  placeholder="<?php esc_html_e( 'Search...', 'embertheme' ); ?>" required="">

    <button type="submit" >
        <i class="fa fa-search" aria-hidden="true"></i>
    </button>
</form>
