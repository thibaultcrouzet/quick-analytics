<?php
/**
 * Quick Analytics setup
 *
 * @package Quick Analytics
 * @since   1.0.0
 */
 
if( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Setup plugin.
 */
class Quick_Analytics_Admin {

	/**
	 * Only instance of object.
	 *
	 * @var Quick_Analytics
	 */
	private static $instance = null;

	/**
	 * Creates or returns an instance of this class.
	 *
	 * @since 1.0.0
	 *
	 * @return  Quick_Analytics A single instance of this class.
	 */
	public static function get_instance() {

		if ( null === self::$instance ) {

			self::$instance = new self;

		}

		return self::$instance;

	}

	/**
	 * Initiate plugin.
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		// Settings page.
		add_action( 'admin_menu', array( $this, 'admin_menu' ) );
		add_action( 'admin_init', array( $this, 'admin_init' ) );

	}

	/**
	 * Add settings page.
	 *
	 * @since 1.0.0
	 */
	public function admin_menu() {

		add_options_page(
			__( 'Quick Analytics', 'quick-analytics' ),
			__( 'Quick Analytics', 'quick-analytics' ),
			'edit_theme_options',
			'quick-analytics',
			array( $this, 'settings' )
		);

	}

	/**
	 * Register settings.
	 *
	 * @since 1.0.0
	 */
	public function admin_init() {

		register_setting(
			'quick_analytics',
			'quick_analytics',
			array( $this, 'sanitization' )
		);

	}

	/**
	 * Sanitization callback for saving settings.
	 *
	 * @since 1.0.0
	 * @param array $input Data from settings page to sanitized.
	 * @return array $output Data from settings page after sanitization.
	 */
	public function sanitization( $input ) {

		global $allowedposttags;

		$allowed_tags = array_merge( $allowedposttags, array( 'script' => array( 'type' => true, 'src' => true ) ) );

		$output = array(
			'position'	=> 'body',
			'exclude_admin'	=> false,
			'google_id' => '',
			'google_anonymize' => false,
			'yandex_id'	=> '',
			'yandex_click_map' => false,
			'yandex_track_links' => false,
			'yandex_accurate_track_bounce' => false,
			'yandex_webvisor' => false,
			'mixpanel_token' => '',
			'kissmetrics_key' => '',
			'woopra_domain' => '',
			'gauges_site_id' => '',
			'heap_app_id' => '',
			'gosquared_token' => '',
			'statcounter_project' => '',
			'statcounter_security' => '',
		);

		foreach ( $input as $key => $value ) {

			switch ( $key ) {

				case 'position' :

					$choices = array( 'head', 'body', 'footer' );

					if ( in_array( $value, $choices, true ) ) {

						$output[ $key ] = $value;

					}

					break;
				
				case 'exclude_admin' :

					if ( '1' === $value ) {

						$output[ $key ] = true;

					}

					break;				
								
				case 'google_id' :

					$output[ $key ] = esc_attr( $value );

					break;

				case 'google_anonymize' :

					if ( '1' === $value ) {

						$output[ $key ] = true;

					}

					break;				
				
				case 'yandex_id' :

					$output[ $key ] = esc_attr( $value );

					break;

				case 'yandex_click_map' :

					if ( '1' === $value ) {

						$output[ $key ] = true;

					}

					break;	
					
				case 'yandex_track_links' :

					if ( '1' === $value ) {

						$output[ $key ] = true;

					}

					break;	
					
				case 'yandex_accurate_track_bounce' :

					if ( '1' === $value ) {

						$output[ $key ] = true;

					}

					break;	
					
				case 'yandex_webvisor' :

					if ( '1' === $value ) {

						$output[ $key ] = true;

					}

					break;						
				
				case 'mixpanel_token' :

					$output[ $key ] = esc_attr( $value );

					break;

				case 'kissmetrics_key' :

					$output[ $key ] = esc_attr( $value );

					break;

				case 'woopra_domain' :

					$output[ $key ] = esc_attr( $value );

					break;			

				case 'gauges_site_id' :

					$output[ $key ] = esc_attr( $value );

					break;			

				case 'heap_app_id' :

					$output[ $key ] = esc_attr( $value );

					break;				
						
				case 'gosquared_token' :

					$output[ $key ] = esc_attr( $value );

					break;
						
				case 'statcounter_project' :

					$output[ $key ] = esc_attr( $value );

					break;

				case 'statcounter_security' :

					$output[ $key ] = esc_attr( $value );

					break;		
			
			}
		}

		return $output;

	}

	/**
	 * Display settings page.
	 *
	 * @since 1.0.0
	 */
	public function settings() {

		
		$settings = get_option( 'quick_analytics' );

		$position = 'body';

		if ( isset( $settings['position'] ) ) {

			$position = $settings['position'];

		}

		if ( 'body' === $position && ! defined( 'TB_FRAMEWORK_VERSION' ) ) {

			$position = 'head';

		}
		
		$exclude_admin = false;

		if ( isset( $settings['exclude_admin'] ) ) {

			$exclude_admin = $settings['exclude_admin'];

		}
				
		$google_id = '';

		if ( isset( $settings['google_id'] ) ) {

			$google_id = $settings['google_id'];

		}

		$google_anonymize = false;

		if ( isset( $settings['google_anonymize'] ) ) {

			$google_anonymize = $settings['google_anonymize'];

		}		
		
		$yandex_id = '';

		if ( isset( $settings['yandex_id'] ) ) {

			$yandex_id = $settings['yandex_id'];

		}

		$yandex_click_map = false;

		if ( isset( $settings['yandex_click_map'] ) ) {

			$yandex_click_map = $settings['yandex_click_map'];

		}	
		
		$yandex_track_links = false;

		if ( isset( $settings['yandex_track_links'] ) ) {

			$yandex_track_links = $settings['yandex_track_links'];

		}	
				
		$yandex_accurate_track_bounce = false;

		if ( isset( $settings['yandex_accurate_track_bounce'] ) ) {

			$yandex_accurate_track_bounce = $settings['yandex_accurate_track_bounce'];

		}		
		
		$yandex_webvisor = false;

		if ( isset( $settings['yandex_webvisor'] ) ) {

			$yandex_webvisor = $settings['yandex_webvisor'];

		}		
		
		$mixpanel_token = '';

		if ( isset( $settings['mixpanel_token'] ) ) {

			$mixpanel_token = $settings['mixpanel_token'];

		}		
		
		$kissmetrics_key = '';

		if ( isset( $settings['kissmetrics_key'] ) ) {

			$kissmetrics_key = $settings['kissmetrics_key'];

		}			

		$woopra_domain = '';

		if ( isset( $settings['woopra_domain'] ) ) {

			$woopra_domain = $settings['woopra_domain'];

		}
		
		$gauges_site_id = '';

		if ( isset( $settings['gauges_site_id'] ) ) {

			$gauges_site_id = $settings['gauges_site_id'];

		}
				
		$heap_app_id = '';

		if ( isset( $settings['heap_app_id'] ) ) {

			$heap_app_id = $settings['heap_app_id'];

		}		

		$gosquared_token = '';

		if ( isset( $settings['gosquared_token'] ) ) {

			$gosquared_token = $settings['gosquared_token'];

		}
		
		$statcounter_project = '';

		if ( isset( $settings['statcounter_project'] ) ) {

			$statcounter_project = $settings['statcounter_project'];

		}

		$statcounter_security = '';

		if ( isset( $settings['statcounter_security'] ) ) {

			$statcounter_security = $settings['statcounter_security'];

		}		
	
		include( trailingslashit( dirname( __FILE__ ) ) . 'templates/options.php' );

	}

}
