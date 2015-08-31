<?php

/* -----------------------------------------------------------------------------

    SHORTCODE EXISTS
    https://gist.github.com/r-a-y/1887242

----------------------------------------------------------------------------- */

if ( ! function_exists( 'lsvr_shortcode_exists' ) ) {
    function lsvr_shortcode_exists( $shortcode = false ) {

        global $shortcode_tags;
        if ( ! $shortcode ) {
            return false;
        }
        if ( array_key_exists( $shortcode, $shortcode_tags ) ) {
            return true;
        }
        return false;

    }
}


/* -----------------------------------------------------------------------------

    GET IMAGE DATA

----------------------------------------------------------------------------- */

if ( ! function_exists( 'lsvr_get_image_data' ) ) {
    function lsvr_get_image_data( $image_id ){

        $image_data = array();
        $image_sizes = array( 'thumbnail', 'small', 'small-cropped', 'medium', 'medium-cropped', 'large', 'large-cropped', 'hd', 'hd-cropped', 'full' );

        foreach ( $image_sizes as $size ) {

            $temp = wp_get_attachment_image_src( $image_id, $size );
            $image_data[$size] = $temp[0];

        }

        $image_data['alt'] = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
        $image_meta = wp_get_attachment_metadata( $image_id );
        if ( is_array( $image_meta ) && array_key_exists( 'title', $image_meta ) ){
            $image_data['title'] = $image_meta['title'];
        }
        else {
            $image_data['title'] = '';
        }

        if ( count( $image_data ) > 0 ) {
            return $image_data;
        }
        else {
            return false;
        }

    }
}


/* -----------------------------------------------------------------------------

    SHORTCODES CONTENT FILTER
    Get rid of redudant P and BR tags when andding a block shortcode

----------------------------------------------------------------------------- */

if ( ! function_exists( 'lsvr_shortcodes_content_filter' ) ) {
    function lsvr_shortcodes_content_filter( $content ) {

        global $shortcode_tags;

        if ( is_array( $shortcode_tags ) && count( $shortcode_tags ) > 0 ) {

            // create array of custom shortcodes
            $shortcodes = array();
            foreach ( $shortcode_tags as $key => $val ){

                // include only LsVr block shortcodes
                if ( is_string( $val ) && substr( $val, 0, 5 ) === 'lsvr_' && function_exists( $val ) && ! call_user_func( $val, false, false, false, true ) ) {
                    $shortcodes[] = $key;
                }

            }

        }
		// push some 3rd party shortcodes
        array_push( $shortcodes, 'contact-form-7', 'response', 'template', 'recent_products', 'woocommerce_order_tracking', 'products', 'featured_products', 'product' );

        $block = join( '|', $shortcodes );

    	// opening tag
    	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);

    	// closing tag
    	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);

    	return $rep;

    }
    add_filter( 'the_content', 'lsvr_shortcodes_content_filter' );
}

?>