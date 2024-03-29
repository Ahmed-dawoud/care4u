<?php

define( 'THEMENAME', 'BeautySpot' );
require_once dirname( __FILE__ ) . '/tgm-plugin-activation.class.php';

if ( ! function_exists( 'lsvr_register_required_plugins' ) ) {

    add_action( 'tgmpa_register', 'lsvr_register_required_plugins' );

    function lsvr_register_required_plugins() {

    	/**
    	 * Array of plugin arrays. Required keys are name and slug.
    	 * If the source is NOT from the .org repo, then source is also required.
        */
        $plugins = array(
    		array(
    			'name'     				=> 'LSVR Toolkit (BeautySpot)',
    			'slug'     				=> 'lsvr-toolkit-beautyspot',
    			'source'   				=> get_template_directory_uri() . '/library/plugins/lsvr-toolkit-beautyspot.zip',
    			'required' 				=> false,
    			'version' 				=> '1.0.2',
    			'force_activation' 		=> false,
    			'force_deactivation' 	=> false,
                'external_url' 			=> '',
    		),
    		array(
    			'name' 		=> 'Contact Form 7',
    			'slug' 		=> 'contact-form-7',
                'version' 	=> '3.8.1',
    			'required' 	=> false,
    		),
    		array(
    			'name' 		=> 'Aqua Page Builder',
    			'slug' 		=> 'aqua-page-builder',
                'version' 	=> '1.1.2',
    			'required' 	=> false,
    		),
    	);

        $config = array(
          'domain'            => 'beautyspot', // Text domain - likely want to be the same as your theme.
          'default_path'      => '', // Default absolute path to pre-packaged plugins
          'parent_menu_slug'  => 'themes.php', // Default parent menu slug
          'parent_url_slug'   => 'themes.php', // Default parent URL slug
          'menu'              => 'install-required-plugins', // Menu slug
          'has_notices'       => true, // Show admin notices or not
          'is_automatic'      => false, // Automatically activate plugins after installation or not
          'message'           => '', // Message to output right before the plugins table
          'strings'           => array(
              'page_title'                                => __( 'Install Required Plugins', 'beautyspot' ),
              'menu_title'                                => __( 'Install Plugins', 'beautyspot' ),
              'installing'                                => __( 'Installing Plugin: %s', 'beautyspot' ), // %1$s = plugin name
              'oops'                                      => __( 'Something went wrong with the plugin API.', 'beautyspot' ),
              'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
              'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
              'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
              'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
              'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
              'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
              'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
              'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
              'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
              'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
              'return'                                    => __( 'Return to Required Plugins Installer', 'beautyspot' ),
              'plugin_activated'                          => __( 'Plugin activated successfully.', 'beautyspot' ),
              'complete'                                  => __( 'All plugins installed and activated successfully. %s', 'beautyspot' ) // %1$s = dashboard link
          )
      );

      tgmpa( $plugins, $config );

    }

}

?>