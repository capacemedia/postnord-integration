<?php

class PostNord_Integration {
    protected $loader;
    protected $plugin_name;
    protected $version;

    public function __construct() {
        $this->plugin_name = 'postnord-integration';
        $this->version = '1.0';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    private function load_dependencies() {
        require_once POSTNORD_PLUGIN_PATH . 'includes/class-postnord-loader.php';
        require_once POSTNORD_PLUGIN_PATH . 'admin/class-postnord-admin.php';
        require_once POSTNORD_PLUGIN_PATH . 'public/class-postnord-public.php';

        $this->loader = new PostNord_Loader();
    }

    private function define_admin_hooks() {
        $plugin_admin = new PostNord_Admin($this->plugin_name, $this->version);

        $this->loader->add_action('admin_menu', $plugin_admin, 'add_plugin_admin_menu');
        $this->loader->add_action('admin_init', $plugin_admin, 'register_settings');
        $this->loader->add_filter('woocommerce_get_settings_shipping', $plugin_admin, 'add_postnord_api_key_field');
    }

    private function define_public_hooks() {
        $plugin_public = new PostNord_Public($this->plugin_name, $this->version);

        $this->loader->add_action('woocommerce_cart_calculate_fees', $plugin_public, 'calculate_postnord_shipping');
    }

    public function run() {
        $this->loader->run();
    }
}
