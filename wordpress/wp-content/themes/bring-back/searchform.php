<form method="get" class="search-form position-relative" id="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <input type="text" class="form-control" name="s" id="s" placeholder="<?php esc_attr_e( 'Search here', 'bring-back' ); ?>" />
    </div>
    <button type="submit" class="btn"><i class="icofont-search-2"></i></button>
</form>