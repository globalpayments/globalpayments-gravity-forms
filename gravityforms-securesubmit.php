<?php
/**
 * Plugin Name: Global Payments SecureSubmit Addon for Gravity Forms
 * Plugin URI: https://developer.globalpayments.com/heartland/payments/overview
 * Description: SecureSubmit plugin for Gravity Forms. Integrates Gravity Forms with the Global Payments Gateway using tokenized payment processing.
 * Version: 2.2.0
 * Author: Global Payments
 * Author URI: https://developer.globalpayments.com
 */

define('GF_SECURESUBMIT_VERSION', '2.2.0');

add_action('gform_loaded', array('GF_SecureSubmit_Bootstrap', 'load'), 5);

/**
 * Class GF_SecureSubmit_Bootstrap
 */
class GF_SecureSubmit_Bootstrap
{
    public static function load()
    {
        if (!method_exists('GFForms', 'include_payment_addon_framework')) {
            return;
        }

        require_once 'classes/class-gf-securesubmit.php';

        GFAddOn::register('GFSecureSubmit');
    }
}

/**
 * @return \GFSecureSubmit|null
 */
function gf_securesubmit()
{
    return GFSecureSubmit::get_instance();
}
