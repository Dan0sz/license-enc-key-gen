<?php
/**
 * Plugin Name: Daan - License Encryption Key Generator
 * Plugin URI: https://daan.dev/docs/getting-started/activate-license/
 * Description: Display a pop-up with a randomly generated license encryption key.
 * Version: 1.0.0
 * Author: Daan from Daan.dev
 * Author URI: https://daan.dev
 */

defined( 'ABSPATH' ) || exit;

define( 'DAAN_LICENSE_ENC_KEY_GEN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'DAAN_LICENSE_ENC_KEY_GEN_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once DAAN_LICENSE_ENC_KEY_GEN_PLUGIN_DIR . 'vendor/autoload.php';

$daan_license_enc_key_gen = new Daan\LicenseEncKeyGen\Plugin();
