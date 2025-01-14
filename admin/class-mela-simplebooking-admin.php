<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://lucavisciola.com
 * @since      1.0.0
 *
 * @package    Mela_Simplebooking
 * @subpackage Mela_Simplebooking/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Mela_Simplebooking
 * @subpackage Mela_Simplebooking/admin
 * @author     Luca Visciola <info@melasistema.com>
 */
class Mela_Simplebooking_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mela_Simplebooking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mela_Simplebooking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */


		// Load this css (for now) only on the Melasimplebooking top level page
		// to avoid css to compromise other things!
		$current_screen = get_current_screen();

	    if ( strpos( $current_screen->base, 'toplevel_page_melasimplebooking' ) === false ) {

	        return;

	    } else {

	    	// Bootstrap 4.6.2
	    	wp_enqueue_style( $this->plugin_name . '_bootstrap', plugin_dir_url( __FILE__ ) . 'vendor/css/bootstrap.min.css', array(), $this->version, 'all' );
	    	// Bootstrap select 1.13.14
	    	wp_enqueue_style( $this->plugin_name . '_bootstrap_select', plugin_dir_url( __FILE__ ) . 'vendor/css/bootstrap-select.min.css', array(), $this->version, 'all' );
	    	// Color picker WP API
	    	wp_enqueue_style( 'wp-color-picker' );
	    	// My style
	        wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/mela-simplebooking-admin.css', array(), $this->version, 'all' );
	    }

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Mela_Simplebooking_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Mela_Simplebooking_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		// Load JS (for now) only on the Melasimplebooking top level page
		// to avoid JS to compromise other things!
		$current_screen = get_current_screen();
		if ( strpos( $current_screen->base, 'toplevel_page_melasimplebooking' ) === false ) {

	        return;

	    } else {

	    	// Popper 2.11.5
			wp_enqueue_script( $this->plugin_name . '_popper', plugin_dir_url( __FILE__ ) . 'vendor/js/popper.min.js', array(), $this->version, true );
			// Bootstrap 4.6.2
			wp_enqueue_script( $this->plugin_name . '_bootstrap', plugin_dir_url( __FILE__ ) . 'vendor/js/bootstrap.min.js', array(), $this->version, true );
			// Bootstrap select 1.13.14 
			wp_enqueue_script( $this->plugin_name . '_bootstrap_select', plugin_dir_url( __FILE__ ) . 'vendor/js/bootstrap-select.min.js', array( 'jquery' ), $this->version, true );
			// My Script
			wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/mela-simplebooking-admin.js', array('wp-color-picker', 'jquery'), $this->version, true );
		}
	}

	/**
	 * Manage the Admin Notices for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function admin_notice() {

		$options = get_option( 'melasimplebooking_options' );

		/* Return if no SimpleBooking ID is given */
		if( empty( $options['melasimplebooking_ida'] ) ) { ?>

	        <div id="setting-error-melasimplebooking" class="notice notice-warning settings-error is-dismissible"> 
	            <p>
	            	<strong>
	            		<span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;"><?php _e('Mela simpleBooking require an IDA number to work properly!', 'mela-simplebooking'); ?></span>
	            	</strong>
	            </p>
	        </div>
		        
		   <?php //return;
		} ?>

		<div id="shortcode-error-melasimplebooking" class="notice notice-warning settings-error is-dismissible"> 
            <p><span style="display: block; margin: 0.5em 0.5em 0 0; clear: both;"><?php _e('The Simplebooking form shortcode is avaiable in this version of the plugin. Use this shortcode in a page or post: ', 'mela-simplebooking'); ?><strong>[melasimplebooking-form]</strong></span></p>
        </div>
	<?php }

}