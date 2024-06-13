<?php

class PostNord_Admin {
    private $plugin_name;
    private $version;

    public function __construct($plugin_name, $version) {
        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

    public function add_plugin_admin_menu() {
        add_options_page(
            'PostNord Integration',
            'PostNord Integration',
            'manage_options',
            'postnord-integration',
            array($this, 'display_plugin_admin_page')
        );
    }

    public function display_plugin_admin_page() {
        include_once 'partials/postnord-admin-display.php';
    }

    public function register_settings() {
        register_setting('woocommerce_postnord_settings', 'postnord_api_key');
    }

    public function add_postnord_api_key_field($settings) {
        $settings[] = array(
            'title' => __('PostNord API Key', 'woocommerce'),
            'desc' => __('Enter your PostNord Skicka Direkt Business API Key.', 'woocommerce'),
            'id' => 'postnord_api_key',
            'type' => 'text',
            'default' => '',
            'desc_tip' => true,
        );
        return $settings;
    }
}
