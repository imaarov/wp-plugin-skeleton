<?php
/*
Plugin Name: OOP Plugin
Plugin URI: https://wordpress.org/plugins/
Description: OOP plugin core sample base
Author: Iman Atarof - Imaarov
License: GPLv2 or later
*/

include_once 'AutoLoad.php';
include_once 'interface/BaseInterface.php';
defined('ABSPATH') || exit;

/**
 * Core Class of your plugin
 */
class Core
{
    /**
     * @param string $signature
     */
    public function __construct(
        private string $signature
    )
    {
        $this->signature = strtoupper($this->signature);
        $this->define_constant();
        $this->init();
    }


    /**
     * Define needed constants
     * @return void
     */
    public function define_constant() : void
    {
        define($this->signature . '_PLUGIN_DIR', plugin_dir_path(__FILE__));
        define($this->signature . '_PLUGIN_URL', plugin_dir_url(__FILE__));
        define($this->signature . '_PLUGIN_Base_CLASS', plugin_dir_url(__FILE__. "/Base/"));
    }

    /**
     * Activation
     * @return void
     */
    public function init()
    {
        register_activation_hook(__FILE__, [$this , 'activation']);
        register_activation_hook(__FILE__, [$this , 'deactivation']);
        add_action('admin_enqueue_scripts', [$this, 'register_assets']);
        add_action('wp_enqueue_scripts', [$this, 'register_assets']);
//        $this->load_entities();
    }

    /**
     * Register CSS & JS
     * @return void
     */
    public function register_assets()
    {
        //TODO Register css & js
        wp_register_style('bootstrap-5', 'https://cdn.jsdeliver.net/npm/bootstrap@5.2.0/dist/css/bootstrap.rtl.min.css','', '5.2.0');
        wp_register_style('main-style', plugins_url('oop-plugin/assets/css/style.css'));
        wp_enqueue_style('bootstrap-5');
        wp_enqueue_style('main-style');

        if (is_admin()) {
            wp_register_script('dashboard-js', OOP_PLUGIN_URL . 'assets/js/dashboard.js', ['jquery'], '1.0.0', '');
            wp_enqueue_script('dashboard-js');
        } else {
            wp_register_script('front-js', OOP_PLUGIN_URL . 'assets/js/front.js', ['jquery'], '1.0.0', '');
            wp_enqueue_script('front-js');
        }

    }

    /**
     * Deactivation
     * @return void
     */
    public function activation()
    {

    }

    /**
     * Deactivation
     * @return void
     */
    public function deactivation()
    {

    }

    /**
     * Loaded Module
     * @return void
     */
    public function load_entities(BaseInterface $baseClass) : self
    {
        return $this;
    }
}


$core = new Core('oop');

// These are my sample class that i make from Base class
$core->load_entities(new User())
     ->load_entities(new MetaBox_VideoUrl())
     ->load_entities(new PostType_Course())
     ->load_entities(new Widget_User())
     ->load_entities(new GatePay_Setting());
