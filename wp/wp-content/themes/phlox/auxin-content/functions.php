<?php
/**
 * Theme specific functions and configs
 *
 * 
 * @package    Auxin
 * @author     averta (c) 2014-2018
 * @link       http://averta.net
 */

/*------------------------------------------------------------------------------------------------*/

locate_template( AUXIN_CON . 'include/functions.php'                                         , true, true );
locate_template( AUXIN_CON . 'include/hooks.php'                                             , true, true );

if( version_compare( PHP_VERSION, '5.3.0', '>=') ){
    locate_template( AUXIN_CON . 'options/auxin-options.php'                                 , true, true );
}


if( is_admin() ){
	add_action( 'wp_default_scripts', 'wp_default_custom_scripts' );
    function wp_default_custom_scripts( $scripts ){
        $scripts->add( 'wp-color-picker', "/wp-admin/js/color-picker.min.js", array( 'iris' ), false, 1 );
        did_action( 'init' ) && $scripts->localize(
            'wp-color-picker',
            'wpColorPickerL10n',
            array(
                'clear'            => __( 'Clear' ),
                'clearAriaLabel'   => __( 'Clear color' ),
                'defaultString'    => __( 'Default' ),
                'defaultAriaLabel' => __( 'Select default color' ),
                'pick'             => __( 'Select Color' ),
                'defaultLabel'     => __( 'Color value' ),
            )
        );
	}
    locate_template( AUXIN_CON . 'include/hooks-admin.php'                                   , true, true );

    // Load general metabox models
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-layout.php'         , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-title-setting.php'  , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-bg-setting.php'     , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-color-setting.php'  , true, true );
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-general-slider-setting.php' , true, true );
    // Add metaboxes for post
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-post.php'                   , true, true );
    // Add metaboxes for page
    locate_template( AUXIN_CON . 'admin/metaboxes/metabox-fields-page.php'                   , true, true );

} else {
    locate_template( AUXIN_CON . 'include/class-auxin-frontend-assets.php'                   , true, true );
    locate_template( AUXIN_CON . 'include/hooks-public.php'                                  , true, true );
}

