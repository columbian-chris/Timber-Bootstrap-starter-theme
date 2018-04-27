<?php

if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

Timber::$dirname = array('templates', 'views');

class StarterSite extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );
		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );
		add_action( 'init', array( $this, 'load_scripts' ) );
		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}

	function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		return $context;
	}

	function load_scripts() {
		if (!is_admin()) {
			// Livereload
			if (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1'))) {
				wp_register_script('livereload', 'http://localhost:35729/livereload.js?snipver=1', null, false, true);
				wp_enqueue_script('livereload');
			}

			// jQuery
			wp_deregister_script( 'jquery-core' );
			wp_register_script( 'jquery-core', 'https://code.jquery.com/jquery-3.3.1.slim.min.js', false, '3.3.1-slim', true );

			// Bootstrap
			wp_register_style('bootstrap-css', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css', false, '4.1.0', null);
			wp_enqueue_style('bootstrap-css');
			wp_register_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js', array('jquery'), '1.14.0', true);
			wp_register_script('bootstrap-js', 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js', array('popper','jquery'), '4.0.0', true);
			wp_enqueue_script('bootstrap-js');

			// Theme
			wp_register_script('theme-js', get_stylesheet_directory_uri() .'/static/site.js', array('jquery'), false, true);
			wp_enqueue_script('theme-js');
		}
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter('myfoo', new Twig_SimpleFilter('myfoo', array($this, 'myfoo')));
		return $twig;
	}


}

new StarterSite();
