<?php
/**
 * Theme information Soma
 *
 * @package somalite
 */


if ( ! class_exists( 'Somalite_About_Page' ) ) {
	/**
	 * Singleton class used for generating the about page of the theme.
	 */
	class Somalite_About_Page {
		/**
		 * Define the version of the class.
		 *
		 * @var string $version The Somalite_About_Page class version.
		 */
		private $version = '1.0.0';
		/**
		 * Used for loading the texts and setup the actions inside the page.
		 *
		 * @var array $config The configuration array for the theme used.
		 */
		private $config;
		/**
		 * Get the theme name using wp_get_theme.
		 *
		 * @var string $theme_name The theme name.
		 */
		private $theme_name;
		/**
		 * Get the theme slug ( theme folder name ).
		 *
		 * @var string $theme_slug The theme slug.
		 */
		private $theme_slug;
		/**
		 * The current theme object.
		 *
		 * @var WP_Theme $theme The current theme.
		 */
		private $theme;
		/**
		 * Holds the theme version.
		 *
		 * @var string $theme_version The theme version.
		 */
		private $theme_version;		
		/**
		 * Define the html notification content displayed upon activation.
		 *
		 * @var string $notification The html notification content.
		 */
		private $notification;
		/**
		 * The single instance of Somalite_About_Page
		 *
		 * @var Somalite_About_Page $instance The Somalite_About_Page instance.
		 */
		private static $instance;
		/**
		 * The Main Somalite_About_Page instance.
		 *
		 * We make sure that only one instance of Somalite_About_Page exists in the memory at one time.
		 *
		 * @param array $config The configuration array.
		 */
		public static function init( $config ) {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Somalite_About_Page ) ) {
				self::$instance = new Somalite_About_Page;				
				self::$instance->config = $config;
				self::$instance->somalite_setup_config();
				self::$instance->somalite_setup_actions();				
			}
		}

		/**
		 * Setup the class props based on the config array.
		 */
		public function somalite_setup_config() {
			$theme = wp_get_theme();
			if ( is_child_theme() ) {
				$this->theme_name = $theme->parent()->get( 'Name' );
				$this->theme      = $theme->parent();
			} else {
				$this->theme_name = $theme->get( 'Name' );
				$this->theme      = $theme->parent();
			}
			$this->theme_version = $theme->get( 'Version' );
			$this->theme_slug    = $theme->get_template();			
			$this->notification  = isset( $this->config['notification'] ) ? $this->config['notification'] : ( '<p>' . sprintf( 'Welcome! Thank you for choosing %1$s ! To take full advantage of this theme, please make sure you visit our %2$swelcome page%3$s.', $this->theme_name, '<a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '">', '</a>' ) . '</p><p><a href="' . esc_url( admin_url( 'themes.php?page=' . $this->theme_slug . '-theme-info' ) ) . '" class="button" style="text-decoration: none;">' . sprintf( 'Get started with %s', $this->theme_name ) . '</a></p>' );		
		}

		/**
		 * Setup the actions used for this page.
		 */
		public function somalite_setup_actions() {
			
			/* activation notice */
			add_action( 'load-themes.php', array( $this, 'somalite_activation_admin_notice' ) );						
		}		
		

		/**
		 * Adds an admin notice upon successful activation.
		 */
		public function somalite_activation_admin_notice() {
			global $pagenow;
			if ( is_admin() && ( 'themes.php' == $pagenow ) && isset( $_GET['activated'] ) ) {
				add_action( 'admin_notices', array( $this, 'somalite_about_page_welcome_admin_notice' ), 99 );
			}
		}

		/**
		 * Display an admin notice linking to the about page
		 */
		public function somalite_about_page_welcome_admin_notice() {
			if ( ! empty( $this->notification ) ) {
				echo '<div class="updated notice is-dismissible">';
				echo wp_kses_post( $this->notification );
				echo '</div>';
			}
		}		

	}
}


/**
 *  Adding a About Soma page 
 */
add_action('admin_menu', 'somalite_add_menu');

function somalite_add_menu() {
     add_theme_page(__('About Soma Theme','somalite'), __('About Soma','somalite'),'manage_options', __('somalite-theme-info','somalite'), __('somalite_theme_info','somalite'));
}

/**
 *  Callback
 */
function somalite_theme_info() {
?>
	<div class="soma-info">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2><?php _e( 'Thank you for using Soma Lite free WordPress theme', 'somalite' ); ?></h2>
						<div class="title-content">
							<p><?php _e( 'Soma is an incredibly beautiful and fully responsive Bootstrap WordPress Theme. A perfect solution for businesses, creatives & online shops. Build whatever you like with this theme. Suitable for Business, Corporate, Portfolio, Agency, Real estate, Medical, Events, Construction, Restaurant, Blog, Landing pages, Charity Nonprofit, Ecommerce websites etc.', 'somalite' ); ?></p>
						</div>
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-visibility"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/soma-free-wordpress-theme/" target="_blank"><?php _e( 'VIEW<br/> DEMO', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-format-aside"></span>
						</div>
						<div class="heading">
							<h3><a href="https://spiraclethemes.com/soma-documentation/" target="_blank"><?php _e( 'VIEW<br/> DOCUMENTATION', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-video-alt2"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/soma-video-tutorials/" target="_blank"><?php _e( 'VIDEO<br/> TUTORIALS', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-sos"></span>
						</div>
						<div class="heading">
							<h3><a href="https://wordpress.org/support/theme/somalite" target="_blank"><?php _e( 'ASK FOR<br/> SUPPORT', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-star-filled"></span>
						</div>
						<div class="heading">
							<h3><a href="https://wordpress.org/themes/somalite/" target="_blank"><?php _e( 'RATE OUR<br/> THEME', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-admin-tools"></span>
						</div>
						<div class="heading">
							<h3><a href="https://themes.trac.wordpress.org/log/somalite/" target="_blank"><?php _e( 'VIEW<br/> CHANGELOGS', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box">
						<div class="icon">
							<span class="dashicons dashicons-email-alt"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/contact-us/" target="_blank"><?php _e( 'CONTACT<br/> US', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
				<div class="col-md-3">
					<div class="section-box section-last">
						<div class="icon">
							<span class="dashicons dashicons-cart"></span>
						</div>
						<div class="heading">
							<h3><a href="https://www.spiraclethemes.com/soma-premium-wordpress-theme/" target="_blank"><?php _e( 'BUY PRO WITH<br/> EXTRA FEATURES', 'somalite' ); ?></a></h3>
						</div>						
					</div>
				</div>
			</div>
		</div>		
	</div>
<?php
}
