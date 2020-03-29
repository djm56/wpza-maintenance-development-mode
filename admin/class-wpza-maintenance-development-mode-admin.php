<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://wpza.co.za
 * @since      1.0.0
 *
 * @package    Wpza_Maintenance_Development_Mode
 * @subpackage Wpza_Maintenance_Development_Mode/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wpza_Maintenance_Development_Mode
 * @subpackage Wpza_Maintenance_Development_Mode/admin
 * @author     Donovan Maidens <info@wpza.co.za>
 */
class Wpza_Maintenance_Development_Mode_Admin {

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
		 * defined in Wpza_Maintenance_Development_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpza_Maintenance_Development_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wpza-maintenance-development-mode-admin.css', array(), $this->version, 'all' );

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
		 * defined in Wpza_Maintenance_Development_Mode_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wpza_Maintenance_Development_Mode_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wpza-maintenance-development-mode-admin.js', array( 'jquery' ), $this->version, false );

	}

	public function create_menu() {

		/*
		* Create a submenu page under Plugins.
		* Framework also add "Settings" to your plugin in plugins list.
		*/
		$config_submenu = array(
	
			'type'              => 'menu',                          // Required, menu or metabox
			'id'                => $this->plugin_name . '-test',    // Required, meta box id, unique per page, to save: get_option( id )
			'parent'            => 'plugins.php',                   // Required, sub page to your options page
			// 'parent'            => 'edit.php?post_type=your_post_type',
			'submenu'           => true,                            // Required for submenu
			'title'             => esc_html__( 'Demo Admin Page', 'plugin-name' ),    //The name of this page
			'capability'        => 'manage_options',                // The capability needed to view the page
			'plugin_basename'   => plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' ),
			// 'tabbed'            => false,
	
		);
	
		//
		// - OR --
		// eg: if Yoast SEO is active, then add submenu under Yoast SEO admin menu,
		// if not then under Plugins admin menu:
		//
	
		if ( ! function_exists( 'is_plugin_active' ) ) require_once( ABSPATH . '/wp-admin/includes/plugin.php' );
	
		$parent = ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) ? 'wpseo_dashboard' : 'plugins.php';
		$settings_link = ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) ? 'admin.php?page=plugin-name' : 'plugins.php?page=plugin-name';
	
		$config_submenu = array(
	
			'type'              => 'menu',                                          // Required, menu or metabox
			'id'                => $this->plugin_name,                              // Required, meta box id, unique per page, to save: get_option( id )
			'menu'              => $parent,                                         // Required, sub page to your options page
			'submenu'           => true,                                            // Required for submenu
			'settings-link'     => $settings_link,
			'title'             => esc_html__( 'Demo Admin Page', 'plugin-name' ),    //The name of this page
			'capability'        => 'manage_options',                                // The capability needed to view the page
			'plugin_basename'   => plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' ),
			'tabbed'            => true,
	
		);
	
		$fields[] = array(
			'name'   => 'first',
			'title'  => 'First',
			'icon'   => 'dashicons-admin-generic',
			'fields' => array(
	
				array(
					'id'          => 'text_1',
					'type'        => 'text',
					'title'       => 'Text',
					'before'      => 'Text Before',
					'after'       => 'Text After',
					'class'       => 'text-class',
					'attributes'  => 'data-test="test"',
					'description' => 'Description',
					'default'     => 'Default Text',
					'attributes'    => array(
						'rows'        => 10,
						'cols'        => 5,
						'placeholder' => 'do stuff',
					),
					'help'        => 'Help text',
	
				),
	
				array(
					'id'     => 'password_1',
					'type'   => 'password',
					'title'  => 'Password',
				),
	
	
				array(
					'id'     => 'color_1',
					'type'   => 'color',
					'title'  => 'Color',
				),
	
				array(
					'id'     => 'color_1',
					'type'   => 'color',
					'title'  => 'Color',
					'rgba'   => true,
				),
	
				array(
					'id'     => 'color_2',
					'type'   => 'color',
					'title'  => 'Color',
					'picker' => 'html5',
				),
	
				array(
					'id'    => 'image_1',
					'type'  => 'image',
					'title' => 'Image',
				),
	
				array(
					'id'          => 'textarea_1',
					'type'        => 'textarea',
					'title'       => 'Textarea',
					'help'        => 'This option field is useful. &quot;You&quot; will love it! This option field is useful. You will love it!',
					'attributes'    => array(
						'placeholder' => 'do stuff',
					),
				),
			),
		);
	
		/**
		 * Second Tab
		 */
		$fields[] = array(
			'name'   => 'second',
			'title'  => 'Second',
			'icon'   => 'dashicons-portfolio',
			'fields' => array(
	
				array(
					'type'    => 'content_second',
					'content' => 'Second Section',
	
				),
	
			)
		);
	
		/**
		 * Third Tab
		 */
		$fields[] = array(
			'name'   => 'third',
			'title'  => 'Third',
			'icon'   => 'dashicons-portfolio',
			'fields' => array(
	
				array(
					'type'    => 'content_third',
					'content' => 'Third Section',
	
				),
	
			)
		);
	
		/**
		 * instantiate your admin page
		 */
		$options_panel = new Exopite_Simple_Options_Framework( $config_submenu, $fields );
	
	}

}
