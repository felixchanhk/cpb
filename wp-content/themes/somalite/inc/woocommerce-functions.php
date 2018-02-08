<?php
/**
 * Custom functons for woocommerce
 *
 *
 * @package somalite
 */


/*
* Add cart menu
*
**/

if ( ! function_exists( 'somalite_wcmenucart' ) ) :
function somalite_wcmenucart($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();
	global $woocommerce;
	$viewing_cart = __('View your shopping cart', 'somalite');
	$start_shopping = __('Start shopping', 'somalite');
	$cart_url = $woocommerce->cart->get_cart_url();
	$shop_page_url = esc_url(get_permalink( wc_get_page_id ( 'shop' )));
	$cart_contents_count = $woocommerce->cart->cart_contents_count;
	//$cart_contents = sprintf(_n('%d item', '%d items', $cart_contents_count, 'somalite'), $cart_contents_count);
	$cart_total = $woocommerce->cart->get_cart_total();
	// Uncomment the line below to hide nav menu cart item when there are no items in the cart
	// if ( $cart_contents_count > 0 ) {
	if ($cart_contents_count == 0) {
		$menu_item = '<li class="right wc-cart-menu"><a class="wcmenucart-contents" href="'. $shop_page_url .'" title="'. $start_shopping .'">';
	} 
	else{
		$menu_item = '<li class="right wc-cart-menu"><a class="wcmenucart-contents" href="'. $cart_url .'" title="'. $viewing_cart .'">';
	}
	$menu_item .= '<i class="fa fa-shopping-cart"></i><span class="badge">';
	//$menu_item .= $cart_contents.' - '. $cart_total;
	$menu_item .= $cart_contents_count;
	$menu_item .= '</span></a></li>';
	// Uncomment the line below to hide nav menu cart item when there are no items in the cart
	// }
	echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;

}
endif;

if ( ! function_exists( 'somalite_showwcmenucart_data' ) ) :
function somalite_showwcmenucart_data($menu, $args) {

	// Check if WooCommerce is active and add a new item to a menu assigned to Primary Navigation Menu location
	if ( !in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || 'primary' !== $args->theme_location )
		return $menu;

	ob_start();	
	$menu_item = '	<div class="menu-view-cart-products">
						<div class="block-subtitle">								
							<div class="menu-widget-cart">'.									
								the_widget( 'WC_Widget_Cart') .'
							</div>
						</div>
					</div>
					
				';	
	echo $menu_item;
	$social = ob_get_clean();
	return $menu . $social;
}
endif;


if ( ! function_exists( 'somalite_filter_menu_cart_hook' ) ) :
function somalite_filter_menu_cart_hook() {
	if(true===get_theme_mod('sm_menu_cart',false)) {
	 	add_filter('wp_nav_menu_items','somalite_wcmenucart', 10, 2);
	 	add_filter('wp_nav_menu_items','somalite_showwcmenucart_data', 10, 2);
	 }
}
endif;
add_action( 'wp', 'somalite_filter_menu_cart_hook' );

/*
* Ensure cart contents update when products are added to the cart via AJAX
*
**/
if ( ! function_exists( 'somalite_wc_header_add_to_cart_fragment' ) ) :
function somalite_wc_header_add_to_cart_fragment( $fragments ) {
	ob_start();
	global $woocommerce;
	?>
		<a class="wcmenucart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','somalite' ); ?>"><i class="fa fa-shopping-cart"></i><span class="badge"><?php echo $woocommerce->cart->get_cart_contents_count(); ?></span></a>
	<?php	
	$fragments['a.wcmenucart-contents'] = ob_get_clean();	
	return $fragments;
}
endif;
add_filter( 'woocommerce_add_to_cart_fragments', 'somalite_wc_header_add_to_cart_fragment' );


/*
* Replace the image filename/path with your own :)
*
**/
if ( ! function_exists( 'somalite_custom_fix_thumbnail' ) ) :
function somalite_custom_fix_thumbnail() {
  add_filter('woocommerce_placeholder_img_src', 'somalite_woocommerce_placeholder_img_src');   
	function somalite_woocommerce_placeholder_img_src( $src ) {		
		$uploads = get_template_directory_uri();
		$src = $uploads . '/img/woo-no-image.jpg';		 
		return $src;
	}
}
endif;
add_action( 'init', 'somalite_custom_fix_thumbnail' );



/**
 * Number of products per page
*/
$number_product_per_page = 9;
add_filter( 'loop_shop_per_page', create_function( '$cols', 'return '.$number_product_per_page.';' ), 20 );


/**
 * Number of products per row
*/

if (!function_exists('somalite_loop_columns')) :
    function somalite_loop_columns() {
        $product_num_per_row =3;        
        if( $product_num_per_row ){
            $number = $product_num_per_row;
        } else {
            $number = 3;
        }
        return $number;
    }
endif;
add_filter('loop_shop_columns', 'somalite_loop_columns');


/**
 * Related Products
*/
if (!function_exists('somalite_filter_woocommerce_output_related_products_args')) :
function somalite_filter_woocommerce_output_related_products_args( $args ) {     
    $args=array(    
    'posts_per_page' => 3,
    'columns' => 3,
    );

    return $args; 
};
endif;
add_filter( 'woocommerce_output_related_products_args', 'somalite_filter_woocommerce_output_related_products_args', 10, 1 ); 


/**
 * Add Class
*/

if (!function_exists('somalite_woo_body_columns_class')) :
    function somalite_woo_body_columns_class( $class ) {
    	if(2==intval( get_theme_mod('sm_shop_row_items','3') ) ) {
    		$class[] = 'columns-2';
    	}
    	else if(3==intval( get_theme_mod('sm_shop_row_items','3') ) ) {
    		$class[] = 'columns-3';	
    	}
    	else if(4==intval( get_theme_mod('sm_shop_row_items','3') ) ) {
    		$class[] = 'columns-4';		
    	}
    	else{
    		$class[] = 'columns-3';			
    	}
           
           return $class;
    }
endif;
add_action( 'body_class', 'somalite_woo_body_columns_class');


/**
 * Check woocommece is active
*/

if ( ! function_exists( 'somalite_is_woocommerce_activated' ) ) :
	function somalite_is_woocommerce_activated() {
		if ( class_exists( 'woocommerce' ) ) { return true; } else { return false; }
	}
endif;


/**
 * Check class and return
*/

if ( ! function_exists( 'somalite_check_class' ) ) :
	function somalite_check_class($class) {
		$body_classes = get_body_class();
		if(in_array($class, $body_classes)){
			return true; 
		} 
		else { 
			return false; 
		}
	}
endif;
