<?php
/**
 * Plugin Name: Allbright Custom Portfolio
 * Plugin URI: https://github.com/aallbrig/allbright-portfolio
 * Description: My very own custom portfolio experience
 * Version: 1.0.0
 * Author: Andrew Allbright
 * Author URI: http://www.andrewallbright.com
 * License: GPL2
 */
include_once dirname( __FILE__ ) . '/database-setup.php';
function my_plugin_wp_footer(){
  global $wpdb;
  echo $wpdb->prefix . ' ' . plugins_url('database-setup.php', __FILE__) . ' This is custom content added to the footer';
}

add_action('wp_footer', 'my_plugin_wp_footer');
register_activation_hook( __FILE__, 'setup_allbright_portfolio_db' );
?>