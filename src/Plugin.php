<?php
/**
 * @package       daan/license-enc-key-gen
 * @author        Daan van den Bergh
 * @company       Daan.dev
 * @copyright (c) 2025 Daan van den Bergh
 * @license       MIT
 */

namespace Daan\LicenseEncKeyGen;

class Plugin {
	public function __construct() {
		$this->init();
	}

	private function init() {
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ] );
		add_action( 'wp_footer', [ $this, 'maybe_add_popup' ] );
	}

	public function enqueue_scripts() {
		$filemtime = filemtime( DAAN_LICENSE_ENC_KEY_GEN_PLUGIN_DIR . 'assets/js/script.min.js' );

		wp_enqueue_script( 'daan-license-enc-key-gen', DAAN_LICENSE_ENC_KEY_GEN_PLUGIN_URL . 'assets/js/script.min.js', [], $filemtime, [ 'defer' => true ] );
	}

	public function maybe_add_popup() {
		if ( ! str_contains( get_post()->post_content, 'daan-dev-license-enc-key-gen' ) ) {
			return;
		}
		?>
        <style>
            .daan-dev-license-enc-key-gen-popup {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 800px;
                height: 400px;
                box-shadow: 0 0 3rem rgba(0, 0, 0, 0.2);
                border-radius: 2.5rem;
                overflow: hidden;
            }

            .daan-dev-license-enc-key-gen-popup-content {
                background-color: #fff;
                width: 100%;
                height: 100%;
                padding: 2rem;
            }
        </style>
        <div style="display: none;" class="daan-dev-license-enc-key-gen-popup">
            <div class="daan-dev-license-enc-key-gen-popup-content">
                <h3><?php echo __( 'Copy the following the line and paste it into your wp-config.php file', 'daan-dev-license-enc-key' ); ?></h3>
                <p>
                    <code><?php echo sprintf( "define('DAAN_LICENSE_ENC_KEY', '%s');", $this->generate_string( 32 ) ); ?></code>
                </p>
                <p>
                    <sub>(<?php echo __( 'Press escape or refresh the page to close.', 'daan-dev-license-enc-key' ); ?>)</sub>
                </p>
            </div>
        </div>
		<?php
	}

	private function generate_string( $length ) {
		return bin2hex( random_bytes( $length / 2 ) );
	}
}