<?php

/**
 * Timber
 *
 * Data
 */

add_filter('timber_context', 'add_to_context');

function add_to_context($data){

    /* Add extra data */
    $data['foo'] = 'I am some other typical value set in your functions.php file, unrelated to the menu';

    /* Menu */
    $data['menu'] = new TimberMenu('primary_navigation');

    return $data;

}

/**
 * Timber
 *
 * Check if Timber is activated
 */

if ( ! class_exists( 'Timber' ) ) {

    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
    } );
    return;

}