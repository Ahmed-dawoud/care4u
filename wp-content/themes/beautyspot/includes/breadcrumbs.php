<?php
function lsvr_breadcrumbs() {

    $blog_page_id = get_option( 'page_for_posts' );
    $blog_page_html = '<li><a href="' . get_permalink( $blog_page_id ) . '">' . get_the_title( $blog_page_id ) . '</a></li>';
    echo '<li><a href="' . home_url() . '">' . __( 'Home', 'beautyspot' ) .'</a></li>';

    if ( is_home() ) {

        echo '<li>' . get_the_title( $blog_page_id ) . '</li>';

    }
    elseif ( is_tag() ) { echo $blog_page_html . single_tag_title( '', false ); }
    elseif ( is_day()) { echo $blog_page_html . '<li>' . __( 'Archive for ', 'beautyspot' ) . get_the_time( 'F jS, Y' ) . '</li>'; }
    elseif ( is_year() ) {  echo $blog_page_html . '<li>' . __( 'Archive for ', 'beautyspot' ) . get_the_time( 'Y' ) . '</li>'; }
    elseif ( is_author() ) { echo $blog_page_html . '<li>' . __( 'Author Archive', 'beautyspot' ) . '</li>'; }
    elseif ( is_single() && ! is_singular( 'portfolio' ) ) { echo $blog_page_html . '<li>' . get_the_title() . '</li>'; }
    elseif ( is_category() ) {

        global $wp_query;
        $current_term = $wp_query->queried_object;
        $current_term_id = $current_term->term_id;
        $parent_ids = lsvr_get_term_parents( $current_term_id, 'category' );
        $parents_html = '';
        foreach( $parent_ids as $parent_id ){
            $parent = get_term( $parent_id, 'category' );
            $parents_html .= '<li><a href="' . get_term_link( $parent, 'category' ) .'">' . $parent->name . '</a></li>';
        }
        echo $blog_page_html . $parents_html . '<li>' . $current_term->name . '</li>';
    }

    elseif ( is_page() ) {

        global $post;

        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ( $parent_id ) {
            $page = get_page( $parent_id );
            $breadcrumbs[] = '<a href="' . get_permalink( $page->ID ) . '" title="">' . get_the_title( $page->ID ) . '</a>';
            $parent_id = $page->post_parent;
        }

        $breadcrumbs = array_reverse( $breadcrumbs );
        foreach ( $breadcrumbs as $crumb ) echo $crumb . ' / ';

        echo '<li>' . get_the_title() . '</li>';

    }
    elseif ( is_post_type_archive( 'portfolio' ) ) { echo '<li>' . _e( 'Portfolio', 'beautyspot' ) . '</li>'; }
    elseif ( is_singular( 'portfolio' ) ) { echo '<li><a href="' . get_post_type_archive_link( 'portfolio' ) . '">' . __( 'Portfolio', 'beautyspot' ) . '</a></li><li>' . get_the_title() . '</li>'; }
    elseif ( is_tax( 'portfolio_category' ) ) {

        global $wp_query;
        $current_term = $wp_query->queried_object;
        $current_term_id = $current_term->term_id;
        $parent_ids = lsvr_get_term_parents( $current_term_id, 'portfolio_category' );
        $parents_html = '';

        foreach( $parent_ids as $parent_id ){
            $parent = get_term( $parent_id, 'portfolio_category' );
            $parents_html .= '<li><a href="' . get_term_link( $parent, 'portfolio_category' ) .'">' . $parent->name . '</a></li>';
        }
        echo '<li><a href="' . get_post_type_archive_link( 'portfolio' ) . '">' . __( 'Portfolio', 'beautyspot' ) . '</a></li>' . $parents_html . '<li>' . $current_term->name . '</li>';

    }
    elseif ( is_tax( 'portfolio_tag' ) ) {

        global $wp_query;
        $current_term = $wp_query->queried_object;
        echo '<li><a href="' . get_post_type_archive_link( 'portfolio' ) . '">' . __( 'Portfolio', 'beautyspot' ) . '</a></li><li>' . $current_term->name . '</li>';

    }
    elseif ( is_search() ) { echo '<li>' . __( 'Search Results', 'beautyspot' ) . '</li>' ; }

}
?>