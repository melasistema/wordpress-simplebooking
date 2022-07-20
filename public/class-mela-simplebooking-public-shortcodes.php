<?php

/**
 * The General Helper Functions fot the /public.
 *
 * @link       https://lucavisciola.com
 * @since      1.0.0
 *
 * @package    Mela_Simplebooking
 * @subpackage Mela_Simplebooking/public
 */

/**
 * General Helper for the public-facing.
 *
 *
 * @package    Mela_Simplebooking
 * @subpackage Mela_Simplebooking/public
 * @author     Luca Visciola <info@melasistema.com>
 */
class Mela_Simplebooking_Public_Shortcodes {

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
     * @param      string    $plugin_name       The name of the plugin.
     * @param      string    $version    The version of this plugin.
     */

    public function __construct( $plugin_name, $version ) {

        $this->plugin_name = $plugin_name;
        $this->version = $version;
    }

	/*
	**
	**	Add Simplebookinf form shortcode
	**
	*/
    // register shortcode Simplebooking form
    // [melasimplebooking-form]
    public function melasimplebooking_sb_form_preventivo($atts = '') { 

        // Get options for use them on are needs
        $options = get_option( 'melasimplebooking_options' );
        // Set default Simplebooking background_color
        $default_sp_background_color = '#0b2027';
        
        // Shortcode atts
        $value = shortcode_atts( array(
            'melasimplebooking_preventivo_id' => uniqid ( $prefix = "" ),
            'class' => 'melasimplebooking-sb-converto-wrapper',
        ), $atts );

        // Declare content to return
        $content = "";

        ob_start(); ?>

            <div id="mela-converto-wrapper" style="background-color:<?php echo ($options['melasimplebooking_background_color']) ? ($options['melasimplebooking_background_color']) : $default_sp_background_color ?>">
                <div id="melasimplebooking-converto-container" class="<?php echo $value['class']; ?>"></div>
            </div>

        <?php $content .= ob_get_clean();

        return $content;

    } 

    public function register_melasimplebooking_shortcodes() {

      add_shortcode('melasimplebooking-form', array( $this, 'melasimplebooking_sb_form_preventivo')); 

    }

}