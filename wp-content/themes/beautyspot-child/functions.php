<?php

// your code here

/* -----------------------------------------------------------------------------

    LOAD CUSTOM SCRIPTS
	You can override all plugins defined in "library.js" file by adding your own definition
	of the plugin in "/library/js/scripts.js" file and uncommenting "add_action"

----------------------------------------------------------------------------- */

    function lsvr_load_child_scripts() {

        $theme = wp_get_theme();
		$theme_version = $theme->Version;
        wp_register_script( 'child-scripts', get_stylesheet_directory_uri() . '/library/js/scripts.js', array('jquery'), $theme_version, true );
        wp_enqueue_script( 'child-scripts' );

    }
	//add_action( 'wp_enqueue_scripts', 'lsvr_load_child_scripts' );

?>