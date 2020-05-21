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
	public function __construct($plugin_name, $version) {

		$this->plugin_name	 = $plugin_name;
		$this->version		 = $version;
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
		wp_enqueue_style($this->plugin_name, plugin_dir_url(__FILE__) . 'css/wpza-maintenance-development-mode-admin.css', array(), $this->version, 'all');
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
		wp_enqueue_script($this->plugin_name, plugin_dir_url(__FILE__) . 'js/wpza-maintenance-development-mode-admin.js', array('jquery'), $this->version, false);
	}

	public function create_menu() {

		/*
		 * Create a submenu page under Plugins.
		 * Framework also add "Settings" to your plugin in plugins list.
		 */
		// $config_submenu = array(
		// 	'type'              => 'menu',                          // Required, menu or metabox
		// 	'id'                => $this->plugin_name . '-test',    // Required, meta box id, unique per page, to save: get_option( id )
		// 	'parent'            => 'plugins.php',                   // Required, sub page to your options page
		// 	// 'parent'            => 'edit.php?post_type=your_post_type',
		// 	'submenu'           => true,                            // Required for submenu
		// 	'title'             => esc_html__( 'Maintenance Mode', 'wpza-maintenance-development-mode' ),    //The name of this page
		// 	'capability'        => 'manage_options',                // The capability needed to view the page
		// 	'plugin_basename'   => plugin_basename( plugin_dir_path( __DIR__ ) . $this->plugin_name . '.php' ),
		// 	// 'tabbed'            => false,
		// );
		//
		// - OR --
		// eg: if Yoast SEO is active, then add submenu under Yoast SEO admin menu,
		// if not then under Plugins admin menu:
		//

		if (!function_exists('is_plugin_active'))
			require_once( ABSPATH . '/wp-admin/includes/plugin.php' );

		// $parent = ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) ? 'wpseo_dashboard' : 'plugins.php';
		// $settings_link = ( is_plugin_active( 'wordpress-seo/wp-seo.php' ) ) ? 'admin.php?page=plugin-name' : 'plugins.php?page=plugin-name';

		$config_submenu	 = array(
			'type'				 => 'menu', // Required, menu or metabox
			'id'				 => $this->plugin_name, // Required, meta box id, unique per page, to save: get_option( id )
			'menu'				 => $parent, // Required, sub page to your options page
			'submenu'			 => true, // Required for submenu
			'settings-link'		 => $settings_link,
			'title'				 => esc_html__('Maintenance Mode', 'wpza-maintenance-development-mode'), //The name of this page
			'capability'		 => 'manage_options', // The capability needed to view the page
			'plugin_basename'	 => plugin_basename(plugin_dir_path(__DIR__) . $this->plugin_name . '.php'),
			'tabbed'			 => true,
		);
		/*
		 * Main Settings Tab
		 */
		$fields[]		 = array(
			'name'	 => 'settings',
			'title'	 => 'Settings',
			'icon'	 => 'dashicons-admin-generic',
			'fields' => array(
				array(
					'id'		 => 'activate_maintenance_mode',
					'type'		 => 'radio',
					'title'		 => 'Activate Maintenance',
					'options'	 => array(
						'yes'	 => 'Yes, please activate.',
						'no'	 => 'No, please deactivate.',
					),
					'default'	 => 'no', // optional
					'style'		 => 'fancy', // optional
				),
				array(
					'id'	 => 'background_color',
					'type'	 => 'color',
					'title'	 => 'Background Color',
					'rgba'	 => true,
				),
				array(
					'id'	 => 'background_image',
					'type'	 => 'image',
					'title'	 => 'Background Image',
				),
			),
		);

		/*
		 * Customize Fonts, Colours Etc Tab
		 */
		$fields[] = array(
			'name'	 => 'content',
			'title'	 => 'Page Content',
			'icon'	 => 'dashicons-admin-customizer',
			'fields' => array(
				array(
					'type'		 => 'content',
					'class'		 => 'class-name', // optional
					'title'		 => 'Content Title', // optional
					'content'	 => '<p>Add the page content you would like to use on the page.',
				),
				array(
					'id'	 => 'editor_content',
					'type'	 => 'editor',
					'title'	 => 'Content', // optional
				),
			)
		);

		/*
		 * Custom CSS and Javascript Tab
		 */
		$fields[]		 = array(
			'name'	 => 'css_js',
			'title'	 => 'CSS/JS',
			'icon'	 => 'dashicons-editor-code',
			'fields' => array(
				array(
					'id'			 => 'ace_editor_css',
					'type'			 => 'ace_editor',
					'title'			 => 'Custom JavaScript',
					'description'	 => 'Add any JavaScript you would like to add to the page, please note you do not have to add the <script></script> tags.',
					'options'		 => array(
						'theme'						 => 'ace/theme/chrome',
						'mode'						 => 'ace/mode/css',
						'showGutter'				 => true,
						'showPrintMargin'			 => true,
						'enableBasicAutocompletion'	 => true,
						'enableSnippets'			 => true,
						'enableLiveAutocompletion'	 => true,
					),
					'attributes'	 => array(
						'style' => 'height: 300px; max-width: 700px;',
					),
				),
				array(
					'id'			 => 'ace_editor_javascript',
					'type'			 => 'ace_editor',
					'title'			 => 'Custom CSS',
					'description'	 => 'Add any CSS you would like to add to the page, please note you do not have to add the <style></style> tags.',
					'options'		 => array(
						'theme'						 => 'ace/theme/chrome',
						'mode'						 => 'ace/mode/javascript',
						'showGutter'				 => true,
						'showPrintMargin'			 => true,
						'enableBasicAutocompletion'	 => true,
						'enableSnippets'			 => true,
						'enableLiveAutocompletion'	 => true,
					),
					'attributes'	 => array(
						'style' => 'height: 300px; max-width: 700px;',
					),
				),
			)
		);
		/*
		 * Import Export Settings Tab
		 */
		$fields[]		 = array(
			'name'	 => 'backup',
			'title'	 => 'Backup',
			'icon'	 => 'dashicons-backup',
			'fields' => array(
				array(
					'type'	 => 'backup',
					'title'	 => esc_html__('Backup', 'exopite-seo-core'),
				),
			)
		);
		/*
		 * Help Tab
		 */
		$fields[]		 = array(
			'name'	 => 'help',
			'title'	 => 'Help',
			'icon'	 => 'dashicons-sos',
			'fields' => array(
				array(
					'type'		 => 'content_third',
					'content'	 => 'Third Section',
				),
			)
		);
		$aboutcontent	 = "<h2>Maintenance Mode Plugin<h2>
		<p class='exopite-sof-description'>Maintenance and Development mode is used when you don’t want the public to view your site, but still have an attractive page giving the public details on when  your site will be available again.</p>
		<p class='exopite-sof-description'>I noticed that many maintenance mode plugins were so complicated and wanted to release something that was quick and easy.</p>
		<p class='exopite-sof-description'>It can be used when you are updating your site, developing new features or just want to park a domain.</p>
		<p class='exopite-sof-description'>The maintenance plugin was developed by Donovan Maidens and is available free of charge on github.</p>
		<p class='exopite-sof-description'><a href='https://github.com/djm56/wpza-maintenance-development-mode'>https://github.com/djm56/wpza-maintenance-development-mode</a></p>
		<p class='exopite-sof-description'>If you have any questions, suggestions or just require some help, please use Github Issues.</p>
		<p class='exopite-sof-description'>Special Thanks To:<br />
		Joe Szalai for his great tool available on Github, I have used them extensively throughout the site.<br />
		Wordpress Plugin Boilerplat:<br />
		<a href='https://github.com/JoeSz/WordPress-Plugin-Boilerplate-Tutorial'>https://github.com/JoeSz/WordPress-Plugin-Boilerplate-Tutorial</a><br />
		Exopite Simple Options Framework:<br />
		<a href='https://github.com/JoeSz/Exopite-Simple-Options-Framework'>https://github.com/JoeSz/Exopite-Simple-Options-Framework</a></p>
		<p class='exopite-sof-description'>I hope you enjoy the plugin</p>
		<p class='exopite-sof-description'>This project is licensed under the GNU GENERAL PUBLIC LICENSE</p>
		";
		/*
		 * About Donovan Tab
		 */
		$fields[]		 = array(
			'name'	 => 'about',
			'title'	 => 'About',
			'icon'	 => 'dashicons-editor-help',
			'fields' => array(
				array(
					'type'		 => 'content',
					//'class'   => 'class-name',     // optional
					//'title'   => 'Content Title',  // optional
					'content'	 => $aboutcontent,
				//'before' => 'Before Text',     // optional
				//'after'  => 'After Text',      // optional
				),
			)
		);

		/**
		 * instantiate your admin page
		 */
		$options_panel = new Exopite_Simple_Options_Framework($config_submenu, $fields);
	}

}
