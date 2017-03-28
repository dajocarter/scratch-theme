<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <span class="screen-reader-text"><?php echo is_home() ? _x( 'Search posts:', 'label' ) : _x( 'Search:', 'label' ); ?></span>
        <input type="search" class="search-field"
            placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>"
            value="<?php echo get_search_query() ?>" name="s"
            title="<?php echo is_home() ? esc_attr_x( 'Search posts:', 'label' ) : esc_attr_x( 'Search:', 'label' ) ?>" />
    </label>
    <?php if( is_home() ) : ?>
    <input type="hidden" value="post" name="post_type" id="post_type" />
    <?php endif; ?>
    <input type="submit" class="search-submit"
        value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
