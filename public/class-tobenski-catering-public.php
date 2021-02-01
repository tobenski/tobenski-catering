<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/tobenski/
 * @since      1.0.0
 *
 * @package    Tobenski_Catering
 * @subpackage Tobenski_Catering/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Tobenski_Catering
 * @subpackage Tobenski_Catering/public
 * @author     Knud Rishøj <tirdyr@tobenski.dk>
 */
class Tobenski_Catering_Public {

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

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/tobenski-catering-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Add a page-template to use with the menu slug.
	 *
	 * @since 1.0.0
	 * @param string $template [Template location]
	 * @return string [Template location]
	 */
	public function page_templates( $template ) {
		// If not catering Bail early
		if (!is_page('catering') && !is_singular( 'catering' )) : return $template; endif;

		// Load Stylesheet for the page 
		$this->enqueue_styles();
		
		if (is_page('catering')) :
			// has slug catering
			return plugin_dir_path( __FILE__ ) . 'partials/page-catering.php';
		elseif (is_singular( 'catering' )) :
			// is singular view of type catering
			global $post;
			if (!$post->post_parent) : 
				// is parent (parent_post_id = 0)
				return plugin_dir_path( __FILE__ ) . 'partials/parent-catering.php';
			endif;
			return plugin_dir_path( __FILE__ ) . 'partials/single-catering.php';
		endif;
	} 

}
