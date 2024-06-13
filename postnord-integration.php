<?php
/*
Plugin Name: PostNord Integration
Description: Integrates PostNord Skicka Direkt Business with WooCommerce and Klarna Shipping Assistant.
Version: 1.0
Author: Rick Centerhall
*/

// Exit if accessed directly
if (!defined('ABSPATH')) {
  exit;
}

// Define Plugin Path
define('POSTNORD_PLUGIN_PATH', plugin_dir_path(__FILE__));

// Include the main class
require_once POSTNORD_PLUGIN_PATH . 'includes/class-postnord-integration.php';

// Initialize the plugin
function run_postnord_integration() {
  $plugin = new PostNord_Integration();
  $plugin->run();
}
run_postnord_integration();