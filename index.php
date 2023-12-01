<?php

/*
  Plugin Name: Custom Gutenburg block
  Description: Create a Custom Gutenburg block.
  Version: 1.0
  Author: Joseph Thomas
  Author URI: https://freelancewebdesignusa.com/about-us/
*/

if( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class OurGutenburgBlockType {
  function __construct() {
    add_action('init', array($this, 'adminAssets'));
  }

  function adminAssets() {
    wp_register_script('ourblocktype', plugin_dir_url(__FILE__) . 'build/index.js', array('wp-blocks', 'wp-element'));
    register_block_type('ourplugin/our-gutenburg-block-type', array(
      'editor_script' => 'ourblocktype',
      'render_callback' => array($this, 'theHTML')
    ));
  }

  function theHTML($attributes) {
    ob_start(); ?>
    <h3>Today the sky is <?php echo esc_html($attributes['name']) ?> and the grass is <?php echo esc_html($attributes['address']) ?>!</h3>
    <?php return ob_get_clean();
  }
}

$ourGutenburgBlockType = new OurGutenburgBlockType();