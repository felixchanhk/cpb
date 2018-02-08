<?php
/**
 * @package somalite
 */
// Register Custom Navigation Walker
require_once(get_template_directory() . '/inc/wp_bootstrap_navwalker.php');

//Register Required plugin
require_once(get_template_directory() . '/inc/class-tgm-plugin-activation.php');

if (!function_exists('somalite_setup')) :

    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function somalite_setup() {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on soma, use a find and replace
         * to change 'somalite' to the name of your theme in all the template files.
         */
        load_theme_textdomain('somalite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        add_image_size('somalite-blog-footer-thumb', 100, 65);
        add_image_size('somalite-blog-section-thumb', 360, 239);

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'primary' => __('Primary', 'somalite'),
            'footer' => __('Footer Menu', 'somalite'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * somalite theme info
         */
        require get_template_directory() . '/inc/theme-info.php';

        /**
         * About page instance
         */
        $config = array();
        Somalite_About_Page::init($config);


        //woocommerce support
        add_theme_support('woocommerce');
    }

endif;
add_action('after_setup_theme', 'somalite_setup');


/**
 * Custom Logo 
 *
 */
if (!function_exists('somalite_logo_setup')) :

    function somalite_logo_setup() {
        add_theme_support('custom-logo', array(
            'height' => 60,
            'width' => 135,
            'flex-height' => true,
            'flex-width' => true,
        ));
    }

endif;
add_action('after_setup_theme', 'somalite_logo_setup');


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
if (!function_exists('somalite_content_width')) :

    function somalite_content_width() {
        $GLOBALS['content_width'] = apply_filters('somalite_content_width', 640);
    }

endif;
add_action('after_setup_theme', 'somalite_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
if (!function_exists('somalite_widgets_init')) :

    function somalite_widgets_init() {
        register_sidebar(array(
            'name' => __('Sidebar', 'somalite'),
            'id' => 'primary',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Woocommerce Sidebar', 'somalite'),
            'id' => 'woosidebar',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<aside id="%1$s" class="widget %2$s">',
            'after_widget' => '</aside>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));


        register_sidebar(array(
            'name' => __('Footer Column1', 'somalite'),
            'id' => 'footer-column1',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Footer Column2', 'somalite'),
            'id' => 'footer-column2',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Footer Column3', 'somalite'),
            'id' => 'footer-column3',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Footer Column4', 'somalite'),
            'id' => 'footer-column4',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));

        register_sidebar(array(
            'name' => __('Footer Column5', 'somalite'),
            'id' => 'footer-column5',
            'description' => __('Add widgets here.', 'somalite'),
            'before_widget' => '<div id="%1$s" class="section %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="widget-title">',
            'after_title' => '</h4>',
        ));
    }

endif;
add_action('widgets_init', 'somalite_widgets_init');

/**
 * Display custom CSS.
 */
function somalite_custom_css_wrap() {
    if (!is_customize_preview()) {
        return;
    }

    require_once( get_parent_theme_file_path('/inc/custom-stylesheet.php') );
    ?>
    <style type="text/css" id="custom-theme-style" <?php if (is_customize_preview())  ?>>
    <?php echo somalite_custom_stylesheet_css(); ?>
    </style>
<?php
}

add_action('wp_head', 'somalite_custom_css_wrap');

/**
 * Display Dynamic CSS.
 */
function somalite_dynamic_css_wrap() {

    require_once( get_parent_theme_file_path('/css/dynamic.css.php') );
    ?>
    <style type="text/css" id="custom-theme-dynamic-style">
    <?php echo somalite_dynamic_css_stylesheet(); ?>
    </style>
<?php
}

add_action('wp_head', 'somalite_dynamic_css_wrap');



/**
 * Admin Scripts
 */
if (!function_exists('somalite_admin_scripts')) :

    function somalite_admin_scripts($hook) {
        if ('appearance_page_somalite-theme-info' != $hook)
            return;
        wp_enqueue_style('soma-info-css', get_template_directory_uri() . '/css/soma-theme-info.css', false);
    }

endif;
add_action('admin_enqueue_scripts', 'somalite_admin_scripts');

/**
 * Enqueue scripts and styles.
 */
function somalite_scripts() {
    //custom css felix
    wp_enqueue_style('icomoon', get_template_directory_uri() . '/css/icomoon.css');
    wp_enqueue_style('mixItUp', get_template_directory_uri() . '/css/mixItUp.css');
    wp_enqueue_style( 'normalize', 'https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css');
    wp_enqueue_style( 'skeleton', 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/123941/skeleton.2.02.css');
	wp_enqueue_style( 'swiper', get_template_directory_uri() . '/css/swiper.min.css');
    
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '3.3.7');
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array(), '4.6.3');
    wp_enqueue_style('linearicons', get_template_directory_uri() . '/css/icon-font.css', array(), '1.0.0');
    wp_enqueue_style('google-font', somalite_google_fonts_url(), array(), '1.0');
    wp_enqueue_style('magnific-popup-css', get_template_directory_uri() . '/css/magnific-popup.css', array(), '1.1.0');
    wp_enqueue_style('soma-woocommerce-style', get_template_directory_uri() . '/css/woocommerce-style.css', array(), '1.2.7');
    wp_enqueue_style('soma-style', get_template_directory_uri() . '/css/soma-style.css', array(), '1.2.7');
    wp_enqueue_style( 'cpb_style', get_template_directory_uri() . '/css/cpb_style.css', array(), '1.2.8');
    wp_enqueue_style('soma-responsive', get_template_directory_uri() . '/css/soma-style-responsive.css', array(), '1.2.7');
    wp_enqueue_style('soma-page-builder', get_template_directory_uri() . '/css/page-builder.css', array(), '1.0');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css', array(), '1.0');
    
    

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    wp_enqueue_script('bootstrap-js', get_template_directory_uri() . '/js/bootstrap.js', array(), '3.3.7', true);
    wp_enqueue_script('jquery-easing', get_template_directory_uri() . '/js/jquery.easing.1.3.js', array('jquery'), '1.3', true);
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/js/modernizr.js', array(), '2.6.2', true);
    wp_enqueue_script('wow', get_template_directory_uri() . '/js/wow.js', array(), '1.1.2', true);
    wp_enqueue_script('parallax', get_template_directory_uri() . '/js/parallax.js', array(), '1.4.2', true);
    wp_enqueue_script('jquery-appear', get_template_directory_uri() . '/js/jquery.appear.js', array(), '1.0', true);
    wp_enqueue_script('jquery-countTo', get_template_directory_uri() . '/js/jquery.countTo.js', array(), '1.0', true);
    wp_enqueue_script('jquery-magnific', get_template_directory_uri() . '/js/jquery.magnific-popup.js', array(), '1.1.0', true);
    wp_enqueue_script('soma-script', get_template_directory_uri() . '/js/soma-main.js', array('jquery'), '1.2.7', true);
    wp_enqueue_script('html5shiv', get_template_directory_uri() . '/js/html5shiv.js', array(), '3.7.3');
    wp_script_add_data('html5shiv', 'conditional', 'lt IE 9');

    wp_enqueue_script('respond', get_template_directory_uri() . '/js/respond.js', array(), '1.3.0');
    wp_script_add_data('respond', 'conditional', 'lt IE 9');
    
    //custom css felix        
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', 'http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');
    wp_enqueue_script( 'jquery' );   
    
    wp_enqueue_script('mixItUp_custom', get_template_directory_uri() . '/js/mixItUp_custom.js', array(), '3.3.7', true);
    
    wp_deregister_script( 'mixItUp' );
    wp_register_script( 'mixItUp', 'https://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js');
    wp_enqueue_script( 'mixItUp' );
    
    wp_enqueue_script('swiperJS', get_template_directory_uri() . '/js/swiper.min.js', array(), '1.0.1', true);
    wp_enqueue_script('felixTest', get_template_directory_uri() . '/js/felixTest.js', array(), '1.0.1', true);
	
	wp_deregister_script( 'angular' );
    wp_register_script( 'angular', 'http://cdn.static.runoob.com/libs/angular.js/1.4.6/angular.min.js');
    wp_enqueue_script( 'angular' );   

	
	wp_deregister_script( 'vue' );
    wp_register_script( 'vue', 'https://cdn.jsdelivr.net/npm/vue');
    wp_enqueue_script( 'vue' );
	wp_enqueue_script('vue-felix-js', get_template_directory_uri() . '/js/vue-felix.js', array(), '1.0.0', true);
    wp_enqueue_script('vue-shipping-cost-felix.js', get_template_directory_uri() . '/js/vue-shipping-cost-felix.js', array(), '1.0.0', true);
	wp_enqueue_script('vue-faq-felix.js', get_template_directory_uri() . '/js/vue-faq-felix.js', array(), '1.0.0', true);

	wp_enqueue_script('felixangular', get_template_directory_uri() . '/js/felixangular.js', array(), '1.4.6', true);
    
}

add_action('wp_enqueue_scripts', 'somalite_scripts');


/**
 * Google Fonts
 */
if (!function_exists('somalite_google_fonts_url')) :

    function somalite_google_fonts_url() {
        $body_font = get_theme_mod('body_font_name', 'Lato:400,300,700,900');
        $heading_font = get_theme_mod('heading_font_name', 'Lato:400,300,700,900');

        $fonts = array();
        $fonts[] = esc_attr(str_replace('+', ' ', $body_font));
        $fonts[] = esc_attr(str_replace('+', ' ', $heading_font));

        if ($fonts) {
            $fonts_url = add_query_arg(array(
                'family' => urlencode(implode('|', $fonts))
                    ), 'https://fonts.googleapis.com/css');
        }

        return $fonts_url;
    }

endif;



/**
 * Soma Excerpt Length
 */
if (!function_exists('somalite_excerpt_length')) :

    function somalite_excerpt_length($length) {
        return 40;
    }

endif;
add_filter('excerpt_length', 'somalite_excerpt_length');


/**
 * Registers an editor stylesheet for the theme.
 */
if (!function_exists('somalite_theme_add_editor_styles')) :

    function somalite_theme_add_editor_styles() {
        add_editor_style(get_template_directory_uri() . '/css/custom-editor-style.css');
    }

endif;
add_action('admin_init', 'somalite_theme_add_editor_styles');


/**
 * Custom search form
 */
if (!function_exists('somalite_search_form')) :

    function somalite_search_form($form) {
        $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
  <div class="search">
    <input type="text" value="' . get_search_query() . '" class="blog-search" name="s" id="s" placeholder="' . __('Search here.', 'somalite') . '">
    <label for="searchsubmit" class="search-icon"><i class="fa fa-search"></i></label>
    <input type="submit" id="searchsubmit" value="' . __('Search', 'somalite') . '" />
  </div>
  </form>';
        return $form;
    }

endif;
add_filter('get_search_form', 'somalite_search_form', 100);


/**
 * Custom product search form
 */
if (!function_exists('somalite_product_search_form')) :

    function somalite_product_search_form($form) {
        $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
  <div class="search">
    <input type="text" value="' . get_search_query() . '" class="product-search" name="s" id="s" placeholder="' . __('Search products.', 'somalite') . '">
    <label for="searchsubmit" class="search-icon"><i class="fa fa-search"></i></label>
    <input type="hidden" name="post_type" value="product" />
    <input type="submit" id="searchsubmit" value="' . __('Search', 'somalite') . '" />
  </div>
  </form>';
        return $form;
    }

endif;
add_filter('get_product_search_form', 'somalite_product_search_form', 100);


/**
 * Search Filter
 */
if (!function_exists('somalite_search_filter')) :

    function somalite_search_filter($query) {
        if ($query->is_search && is_post_type_archive('product')) {
            $query->set('post_type', 'product');
        }
        return $query;
    }

endif;
add_filter('pre_get_posts', 'somalite_search_filter');


/**
 * Soma Excerpt More
 */
if (!function_exists('somalite_excerpt_more')) :

    function somalite_excerpt_more($more) {
        return ' &hellip;';
    }

endif;
add_filter('excerpt_more', 'somalite_excerpt_more');

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function somalite_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">' . "\n", get_bloginfo('pingback_url'));
    }
}

add_action('wp_head', 'somalite_pingback_header');


/**
 * Soma Moving Comment fields
 */
if (!function_exists('somalite_move_comment_field_to_bottom')) :

    function somalite_move_comment_field_to_bottom($fields) {
        $comment_field = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment_field;
        return $fields;
    }

endif;
add_filter('comment_form_fields', 'somalite_move_comment_field_to_bottom');


/**
 * Soma Add Widgets to Site Origin Page Builder Group
 */
if (!function_exists('somalite_add_widget_tabs')) :

    function somalite_add_widget_tabs($tabs) {
        $tabs[] = array(
            'title' => __('Soma Widgets', 'somalite'),
            'filter' => array(
                'groups' => array('soma')
            )
        );

        return $tabs;
    }

endif;
add_filter('siteorigin_panels_widget_dialog_tabs', 'somalite_add_widget_tabs', 20);


/**
 * Using home page title instead of site name 
 */
if (!function_exists('somalite_breadcrumb_title')) :

    function somalite_breadcrumb_title($title, $type, $id) {
        if ($type[0] === 'home') {
            $title = get_the_title(get_option('page_on_front'));
        }
        return $title;
    }

endif;
add_filter('bcn_breadcrumb_title', 'somalite_breadcrumb_title', 42, 3);

/**
 *  Set homepage and blog page after demo import
 */
function somalite_after_import_setup() {

    //Assign menus to their locations
    $main_menu = get_term_by('name', 'Primary', 'nav_menu');
    set_theme_mod('nav_menu_locations', array(
        'primary' => $main_menu->term_id,
            )
    );

    //Assign front page
    $front_page = get_page_by_title('Home');
    $blog_page = get_page_by_title('Blog');

    update_option('show_on_front', 'page');
    update_option('page_on_front', $front_page->ID);
    update_option('page_for_posts', $blog_page->ID);
}

add_action('pt-ocdi/after_import', 'somalite_after_import_setup');


/**
 * Plugins Required
 */
if (!function_exists('somalite_register_required_plugins')) :

    function somalite_register_required_plugins() {

        $plugins = array(
            array(
                'name' => 'Contact Form 7',
                'slug' => 'contact-form-7',
                'source' => '',
                'required' => false,
                'external_url' => 'http://contactform7.com/',
                'force_activation' => false,
            ),
            array(
                'name' => 'WP Google Maps',
                'slug' => 'wp-google-maps',
                'source' => '',
                'required' => false,
                'external_url' => 'http://www.wpgmaps.com/',
                'force_activation' => false,
            ),
            array(
                'name' => 'Page Builder by SiteOrigin',
                'slug' => 'siteorigin-panels',
                'source' => '',
                'required' => false,
                'external_url' => 'https://siteorigin.com/page-builder/',
                'force_activation' => false,
            ),
            array(
                'name' => 'WooCommerce',
                'slug' => 'woocommerce',
                'source' => '',
                'required' => false,
                'external_url' => 'https://woocommerce.com/',
                'force_activation' => false,
            ),
            array(
                'name' => 'Breadcrumb NavXT',
                'slug' => 'breadcrumb-navxt',
                'source' => '',
                'required' => false,
                'external_url' => 'https://wordpress.org/plugins/breadcrumb-navxt/',
                'force_activation' => false,
            ),
            array(
                'name' => 'One Click Demo Import',
                'slug' => 'one-click-demo-import',
                'source' => '',
                'required' => false,
                'external_url' => 'http://proteusthemes.github.io/one-click-demo-import/',
                'force_activation' => false,
            )
        );

        $config = array(
            'id' => 'somalite',
            'default_path' => '',
            'menu' => 'tgmpa-install-plugins',
            'has_notices' => true,
            'dismissable' => true,
            'dismiss_msg' => '',
            'is_automatic' => false,
            'message' => '',
            'strings' => array()
        );

        tgmpa($plugins, $config);
    }

endif;
add_action('tgmpa_register', 'somalite_register_required_plugins');


/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer/customizer.php';

/**
 * Different Header Styles.
 */
require get_template_directory() . '/inc/header-functions.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Load Widgets
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Woocommerce functions
 */
require get_template_directory() . '/inc/woocommerce-functions.php';

/**
 *  Load Felix Custom functions
 */
require get_template_directory() . '/inc/cpb/felix-custom-functions.php';

