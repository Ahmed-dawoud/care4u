<?php
if ( ! lsvr_shortcode_exists( 'lsvr_service' ) && ! function_exists( 'lsvr_feature_shortcode' ) ) {

    function lsvr_feature_shortcode( $atts, $content = null, $generator = false, $check_if_inline = false ) {

        global $lsvr_inview_animations;
        global $lsvr_inview_animations_visible;

        /* ---------------------------------------------------------------------
            Output shortcode info for shortcode generator
        --------------------------------------------------------------------- */

        if ( $generator === true ) {

            return array(
                'lsvr_service' => array(
                    'name' => __( 'Service', 'lsvr-toolkit' ),
                    'paired' => true,
                    'inline' => false,
                    'atts' => array(
                        'image' => array(
                            'label' => __( 'Image', 'lsvr-toolkit' ),
                            'type' => 'file',
                            'default' => ''
                        ),
                        'title' => array(
                            'label' => __( 'Title', 'lsvr-toolkit' ),
                            'type' => 'text'
                        ),
                        'link' => array(
                            'label' => __( 'Link', 'lsvr-toolkit' ),
                            'type' => 'text'
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
                'title' => '',
                'link' => '',
                'inview_anim' => '',
                'custom_class' => ''
            ),
            $atts
        );

		$image = esc_url( $args['image'] );
        $title = esc_attr( $args['title'] );
		$link = esc_attr( $args['link'] );
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

        $html = '<div class="c-service ' . $classes . '"' . $inview_anim_data . '>';
		$html .= $image !== '' ? '<div class="service-image">' : '';
		$html .= $image !== '' && $link !== '' ? '<a href="' . $link . '">' : '';
		$html .= $image !== '' ? '<img src="' . $image . '" alt="">' : '';
		$html .= $image !== '' && $link !== '' ? '</a>' : '';
		$html .= $image !== '' ? '</div>' : '';
		$html .= $title !== '' ? '<h3 class="service-title">' : '';
		$html .= $title !== '' && $link !== '' ? '<a href="' . $link . '">' : '';
		$html .= $title !== '' ? $title : '';
		$html .= $title !== '' && $link !== '' ? '</a>' : '';
		$html .= $title !== '' ? '</h3>' : '';
		$html .= '<div class="service-description">' . do_shortcode( $content ) . '</div></div>';

        return $html;

    }
    add_shortcode( 'lsvr_service', 'lsvr_feature_shortcode' );

}
?>