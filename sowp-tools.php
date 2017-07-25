<?php
/*
Plugin Name: Watchdog Polska Tools
Plugin URI:  https://github.com/mik-laj/wp-sowp-tools
Description:
Version:     0.0.1
Author:      Sieć Obywatelska Watchdog Polska
Author URI:  https://siecobywatelska.pl/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: sowp_tools
GitHub Plugin URI: mik-laj/wp-sowp-tools
GitHub Plugin URI: https://github.com/mik-laj/wp-sowp-tools
*/

define( 'SOWP_TOOLS_PLUGIN_FILE', __FILE__ );
define( 'SOWP_TOOLS_ABSPATH', dirname( __FILE__ ) . '/' );
define( 'SOWP_TOOLS_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );


include SOWP_TOOLS_ABSPATH . '/inc/topbar/topbar.php';
