<?php
/*
Plugin Name: LSVR Toolkit (BeautySpot)
Description: Adds theme-specific functionality.
Version: 1.0.2
Author: Lubos Volovar
Author URI: http://themeforest.net/user/LubosVolovar/portfolio
License: GPLv2
*/


/* -----------------------------------------------------------------------------

    LOAD TEXTDOMAIN

----------------------------------------------------------------------------- */

load_plugin_textdomain( 'lsvr-toolkit', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );


/* -----------------------------------------------------------------------------

    INVIEW ANIMATIONS

----------------------------------------------------------------------------- */

global $lsvr_inview_animations;
$lsvr_inview_animations = array( 'none' => __( 'None', 'lsvr-toolkit' ),
    'flash' => __( 'Flash', 'lsvr-toolkit' ),
    'bounce' => __( 'Bounce', 'lsvr-toolkit' ),
    'shake' => __( 'Shake', 'lsvr-toolkit' ),
    'tada' => __( 'Tada', 'lsvr-toolkit' ),
    'swing' => __( 'Swing', 'lsvr-toolkit' ),
    'wobble' => __( 'Wobble', 'lsvr-toolkit' ),
    'pulse' => __( 'Pulse', 'lsvr-toolkit' ),
    'flip' => __( 'Flip', 'lsvr-toolkit' ),
    'flipInX' => __( 'Flip In X', 'lsvr-toolkit' ),
    'flipInY' => __( 'Flip In Y', 'lsvr-toolkit' ),
    'fadeIn' => __( 'Fade In', 'lsvr-toolkit' ),
    'fadeInUp' => __( 'Fade In Up', 'lsvr-toolkit' ),
    'fadeInDown' => __( 'Fade In Down', 'lsvr-toolkit' ),
    'fadeInLeft' => __( 'Fade In Left', 'lsvr-toolkit' ),
    'fadeInRight' => __( 'Fade In Right', 'lsvr-toolkit' ),
    'fadeInUpBig' => __( 'Fade In Up Big', 'lsvr-toolkit' ),
    'fadeInDownBig' => __( 'Fade In Down Big', 'lsvr-toolkit' ),
    'fadeInLeftBig' => __( 'Fade In Left Big', 'lsvr-toolkit' ),
    'fadeInRightBig' => __( 'Fade In Right Big', 'lsvr-toolkit' ),
    'slideInDown' => __( 'Slide In Down', 'lsvr-toolkit' ),
    'slideInLeft' => __( 'Slide In Left', 'lsvr-toolkit' ),
    'slideInRight' => __( 'Slide In Right', 'lsvr-toolkit' ),
    'bounceIn' => __( 'Bounce In', 'lsvr-toolkit' ),
    'bounceInDown' => __( 'Bounce In Down', 'lsvr-toolkit' ),
    'bounceInUp' => __( 'Bounce In Up', 'lsvr-toolkit' ),
    'bounceInLeft' => __( 'Bounce In Left', 'lsvr-toolkit' ),
    'bounceInRight' => __( 'Bounce In Right', 'lsvr-toolkit' ),
    'rotateIn' => __( 'Rotate In', 'lsvr-toolkit' ),
    'rotateInDownLeft' => __( 'Rotate In Down Left', 'lsvr-toolkit' ),
    'rotateInDownRight' => __( 'Rotate In Down Right', 'lsvr-toolkit' ),
    'rotateInUpLeft' => __( 'Rotate In Up Left', 'lsvr-toolkit' ),
    'rotateInUpRight' => __( 'Rotate In Up Right', 'lsvr-toolkit' ),
    'rollIn' => __( 'Roll In', 'lsvr-toolkit' )
);

global $lsvr_inview_animations_visible;
$lsvr_inview_animations_visible = array( 'flash', 'bounce', 'shake', 'tada', 'swing', 'wobble', 'pulse', 'flip' );


/* -----------------------------------------------------------------------------

    FUNCTIONS

----------------------------------------------------------------------------- */

require_once( 'lsvr-functions.php' );


/* -----------------------------------------------------------------------------

    PAGE BUILDER

----------------------------------------------------------------------------- */

require_once( 'page-builder/lsvr-page-builder.php' );


/* -----------------------------------------------------------------------------

    SHORTCODE GENERATOR

----------------------------------------------------------------------------- */

require_once( 'shortcode-generator/lsvr-shortcode-generator.php' );


/* -----------------------------------------------------------------------------

    WIDGETS

----------------------------------------------------------------------------- */

require_once( 'lsvr-widgets.php' );


/* -----------------------------------------------------------------------------

    CUSTOM POST TYPES

----------------------------------------------------------------------------- */

require_once( 'cpt/lsvr-slider.php' );


?>