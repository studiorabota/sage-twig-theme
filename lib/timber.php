<?php
use Roots\Sage\Setup;
use Timber\Timber;
use Timber\Site;
use Timber\Menu;

/**
 * Check if Timber is activated
 */

if ( ! class_exists( 'Timber' ) ) {

    add_action( 'admin_notices', function() {
        echo '<div class="error"><p>Timber not library is not installed. See the <a href="https://github.com/timber/timber/wiki" target="_blank">Timber Documentation</a> for installtion instructions.</p></div>';
    } );
    return;

}

/**
 * Timber
 */

class TwigSageTheme extends Site {
    function __construct() {
        add_filter( 'timber_context', array( $this, 'add_to_context' ) );
        parent::__construct();
    }
    function add_to_context( $context ) {

        /* Add extra data */
        $context['foo'] = 'I am some other typical value set in your functions.php file, unrelated to the menu';

        /* Menu */
        $context['menu'] = new Menu('primary_navigation');

        /* Site info */
        $context['site'] = $this;

        /* Site info */
        $context['display_sidebar'] = Setup\display_sidebar();

        $context['sidebar_primary'] = Timber::get_widgets('sidebar-primary');

        return $context;

    }
}
new TwigSageTheme();
