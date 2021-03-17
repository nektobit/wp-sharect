<?php
/*
* Plugin Name: WP Sharect
* Plugin URI: https://nektobit.ru
* Description: A lightweight WordPress plugin to let users share their text selections to social networks.
* Version: 1.0.0
* Author: Dmitrii Nektobit
* Author URI: https://nektobit.ru
* Text Domain: wpsharect
*
* Requires at least: 5.0
* Licence: MIT
*/

add_action('wp_enqueue_scripts', 'wpsharect_add');
add_action('wp_footer', 'wpsharect_init');

function wpsharect_add()
{
    wp_enqueue_script('sharect', plugins_url('/assets/sharect.js', __FILE__), null, '1.0.0');
}

function wpsharect_config() {
    $config = "";
    return apply_filters( 'wpsharect_config_filter', $config );
}

function wpsharect_appendCustomShareButtons() {
    $config = "";
    return apply_filters( 'wpsharect_appendCustomShareButtons_filter', $config );
}

function wpsharect_init() {
    ?>
        <script type="text/javascript">
            Sharect
            .config({<?= wpsharect_config() ?>})
            .appendCustomShareButtons([<?= wpsharect_appendCustomShareButtons() ?>])
            .init();
        </script>
    <?php
}
