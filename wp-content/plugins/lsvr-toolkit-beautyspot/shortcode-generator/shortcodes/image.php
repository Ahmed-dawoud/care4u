<?php
if ( ! lsvr_shortcode_exists( 'lsvr_image' ) && ! function_exists( 'lsvr_image_shortcode' ) ) {

    function lsvr_image_shortcode( $atts, $content = null, $generator = false, $check_if_inline = false ) {

        global $lsvr_inview_animations;
        global $lsvr_inview_animations_visible;

        /* ---------------------------------------------------------------------
            Output shortcode info for shortcode generator
        --------------------------------------------------------------------- */

        if ( $generator === true ) {

            return array(
                'lsvr_image' => array(
                    'name' => __( 'Image', 'lsvr-toolkit' ),
                    'paired' => false,
                    'inline' => true,
                    'atts' => array(
                        'image' => array(
                            'label' => __( 'Upload Image', 'lsvr-toolkit' ),
                            'type' => 'file'
                        ),
                        'link' => array(
                            'label' => __( 'Link', 'lsvr-toolkit' ),
                            'type' => 'text'
                        ),
                        'lightbox' => array(
                            'label' => __( 'Open In Lightbox', 'lsvr-toolkit' ),
                            'description' => __( 'URL of the lightbox image must be placed in "Link" field.', 'lsvr-toolkit' ),
                            'type' => 'select',
                            'values' => array( 'yes' => __( 'Yes', 'lsvr-toolkit' ), 'no' => __( 'No', 'lsvr-toolkit' ) ),
                            'default' => 'no'
                        ),
                        'inview_anim' => array(
                            'label' => __( 'InView Animation', 'lsvr-toolkit' ),
                            'description' => __( 'Animation fired when element appears in the user\'s viewport.', 'lsvr-toolkit' ),
                            'type' => 'select',
                            'values' => $lsvr_inview_animations,
                            'default' => 'none'
                        ),
                        'custom_class' => array(
                            'label' => __( 'Custom Class', 'lsvr-toolkit' ),
                            'description' => __( 'It can be used for applying custom CSS.', 'lsvr-toolkit' ),
                            'type' => 'text'
                        )
                    )
                )
            );

        }

        /* ---------------------------------------------------------------------
            Check if shortcode is inline
        --------------------------------------------------------------------- */

        if ( $check_if_inline === true ) {
            return false;
        }

        /* ---------------------------------------------------------------------
            Prepare arguments
        --------------------------------------------------------------------- */

        $args = shortcode_atts(
            array(
                'image' => '',
				'link' => '',
				'lightbox' => 'no',
                'inview_anim' => 'none',
                'custom_class' => ''
            ),
            $atts
        );

        $image = esc_url( $args['image'] );
		$link = esc_url( $args['link'] );
		$lightbox = esc_attr( $args['lightbox'] );
        $inview_anim = esc_attr( $args['inview_anim'] );
        $custom_class = esc_attr( $args['custom_class'] );

        /* ---------------------------------------------------------------------
            Generate HTML
        --------------------------------------------------------------------- */

        $inview_anim_data = $inview_anim !== '' && $inview_anim !== 'none'  ? ' data-inview-anim="' . $inview_anim . '" ' : '';
		$inview_anim_class = $inview_anim !== '' && $inview_anim !== 'none' && ! in_array( $inview_anim, $lsvr_inview_animations_visible ) ? 'visibility-hidden' : '';

        $classes = $custom_class;
		$classes .= ' ' . $inview_anim_class;
		$classes = trim( preg_replace( '/\s+/', ' ', $classes ) );

		$lightbox = $lightbox === 'yes' ? ' lightbox' : '';

		$html = $link !== '' ? '<a href="' . $link . '" class="no-border' . $lightbox . '">' : '';
		$html .= $image !== '' ? '<img src="' . $image . '" class="' . $classes . '" alt="">' : '';
		$html .= $link !== '' ? '</a>' : '';

		return $html;

    }
    add_shortcode( 'lsvr_image', 'lsvr_image_shortcode' );

}
?>