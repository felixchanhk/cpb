<?php
/*
 * Custom the function to fulfill project requirment
 * author: felixchan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

include('connect_sz_api.php');

include('felix_shopping_bag_connection.php');

include('felix_favor_box_connection.php');

//短代碼的功能
function cpb_shipping_cost_calculator($atts) {
    
    $return_string = '<div class="container cpb-shipping-container" id="cpb-shipping-cost-table">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <h1 class="cpb-shipping-calculater-h1">Delivery Cost Calculator</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <h5>Choose country for delivery:</h5>
                    <select v-model="selected">
                        <option v-for="option in options" v-bind:value="option">
                            {{ option.text }}
                        </option>
                    </select>          
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <h5>Enter quantity for items:</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="cpb-input-box">                                        
                                        <div class="cpb-box-header">
                                            <button @click="show = !show">
                                                Shopping Bag
                                            </button>
                                        </div>
                                        <transition name="slide-fade">    
                                            <div id="div_ShoppingBag" class="ShoppingBag_details" v-if="show">
                                                <ul class="cpb-shipping-ul">
                                                    <li><span class="cname">Length (mm)</span>
                                                        <input v-model="sbL" type="number" name="nShoppingBag" class="form-control" style="width:30%;" min="0">
                                                    </li>
                                                    <li>
                                                        <span class="cname">Width (mm)</span>
                                                        <input v-model="sbW" type="number" name="nShoppingBag" class="form-control" style="width:30%;"  min="0">
                                                    </li>
                                                    <li>
                                                        <span class="cname">Height (mm)</span>
                                                        <input v-model="sbH" type="number" name="nShoppingBag" class="form-control" style="width:30%;"  min="0">
                                                    </li>
                                                    <li>
                                                        <span class="cname">Quantity</span>
                                                        <input v-model="sbQty" type="number" name="nShoppingBag" class="form-control" style="width:30%;"  min="0">
                                                    </li>
                                                </ul>
                                            </div>
                                        </transition>    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-9 col-md-12 col-sm-12">
                            <h5>Calculated shipping costs:    |    {{totalWeight}} Kg</h5>
                            <table class="table table-bordered cpb-shipping-table">
                                <thead>
                                    <tr>
                                        <th>Delivery method</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Self-Pickup (no delivery)</td>
                                        <td>GTC*</td>                             
                                    </tr>
                                    <tr>
                                        <td>Standard Services</td>
                                        <td>USD$ {{sPrice}}</td>                                 
                                    </tr>
                                    <tr>
                                        <td>Express</td>
                                        <td>USD$ {{ePrice}}</td>                                    
                                    </tr>
                                    <tr>
                                        <td>Same Day Priority</td>
                                        <td>GTC*</td>                            
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <p class="cpb-shipping-notices">*GTC (Go To Checkout) means please place your items into your shopping cart and go to checkout to see whether this option is available and its associated shipping price.</p>
                    <p class="cpb-shipping-notices">*For customer reference only. Customprintbox.com cannot guarantee the delivery standards of the postal services.</p>
                </div>
            </div>
        </div>';
    return $return_string;
}

//建立一個短代碼
function register_shipping_cost_calculator_shortcodes() {
    add_shortcode('shipping_cost_calculator', 'cpb_shipping_cost_calculator');
}

add_action('init', 'register_shipping_cost_calculator_shortcodes');

//SZ builder shortcode
function sz_shopping_bag_builder($atts) {
    
	$pId = dynamic_size_pId();

	$return_string = '<div class="cpb-add-to-cart"><a class="testAddToCart" href="#"><button class="cpb-add-to-cart-button" onclick="get_sku_productId();">Add To Cart <i class="fa fa-cart-plus" aria-hidden="true"></i></button></a></div>';
	
    $return_string .= '<div class="cpb_builder_iframe" style="height:900px">';
	//@Todo
    //$return_string .= '<iframe src="http://customprintbox.com'.get_builder_path_api(shppoing_bag_spuId()).'?webId=41&productId='.$pId.'&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    $return_string .= '<iframe src="http://47.74.226.159/'.get_builder_path_api(shppoing_bag_spuId()).'?webId=41&productId='.$pId.'&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    return $return_string;
}

//建立一個短代碼
function register_builder_shoppingbag_shortcodes() {
    add_shortcode('sz_builder_shoppingbag', 'sz_shopping_bag_builder');
}

function sz_invitation_card_shopping($atts) {

    $return_string = '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://customprintbox.com/whitelabel-site/h5builder/InvitationCard_1/pc/4/en/index.html?';
    $return_string .= 'webId=41&productId=137842&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    return $return_string;
}

//建立一個短代碼
function register_invitation_cardshortcodes() {
    add_shortcode('sz_builder_invitationcard', 'sz_invitation_card_shopping');
}

//SZ favor box builder shortcode
function sz_favor_box_builder($atts) {

    $return_string = '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://47.74.226.159/whitelabel-site/h5builder/mosaic-builder-test_1/pc/3/en/index.html';
    $return_string .= '?webId=41&productId=135971&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    return $return_string;
}

//建立一個短代碼
function register_sz_favor_box_builder() {
    add_shortcode('sz_favor_box_builder', 'sz_favor_box_builder');
}

//新增至佈景主題中
add_action('init', 'register_builder_shoppingbag_shortcodes'); /* 文章頁面 */
add_action('init', 'register_invitation_cardshortcodes'); /* 文章頁面 */
add_action('init', 'register_sz_favor_box_builder'); /* 文章頁面 */
add_filter('widget_text', 'do_shortcode'); /* 小工具 */


/*
 *  custom product fields  to fulfill sz api requirement.
 */

function productInstanceId_custom_fields() {
    global $woocommerce, $post;
    echo '<div class="productInstanceId">';
    // Custom Product Text Field
    woocommerce_wp_text_input(
            array(
                'id' => '_product_Instance_Id',
                'placeholder' => 'Input Product Instance Id',
                'label' => __('Product Instance Id', 'woocommerce'),
                'desc_tip' => 'true'
            )
    );
    echo '</div>';
}

add_action('woocommerce_product_options_general_product_data', 'productInstanceId_custom_fields');

/*
 *  save custom product field to database. 
 */

function productInstanceId_custom_fields_save($post_id) {
    // Custom Product Text Field
    $woocommerce_custom_product_text_field = $_POST['_product_Instance_Id'];
    if (!empty($woocommerce_custom_product_text_field)) {
        update_post_meta($post_id, '_product_Instance_Id', esc_attr($woocommerce_custom_product_text_field));
    }
}

add_action('woocommerce_process_product_meta', 'productInstanceId_custom_fields_save');

/*
 *  display custom product fields on product description.


  function productInstanceId_custom_fields_display() {
  // Display the value of custom product text field
  echo get_post_meta(get_the_ID(), '_product_Instance_Id', true) . "<br>";
  }

  add_action('woocommerce_product_description_heading', 'productInstanceId_custom_fields_display');
 */



/* Automatically set the image Title, Alt-Text, Caption & Description upon upload
  ----------------------------------------------------------------------- */

add_action('add_attachment', 'my_set_image_meta_upon_image_upload');

function my_set_image_meta_upon_image_upload($post_ID) {
	// Check if uploaded file is an image, else do nothing
    if (wp_attachment_is_image($post_ID)) {
        $my_image_title = get_post($post_ID)->post_title;
		// Sanitize the title: remove hyphens, underscores & extra
		// spaces:
        $my_image_title = preg_replace('%\s*[-_\s]+\s*%', ' ', $my_image_title);
		// Sanitize the title: capitalize first letter of every word
		// (other letters lower case):
        $my_image_title = ucwords(strtolower($my_image_title));
		// Create an array with the image meta (Title, Caption,
		// Description) to be updated
		// Note: comment out the Excerpt/Caption or Content/Description
		// lines if not needed
        $my_image_meta = array(
			// Specify the image (ID) to be updated
            'ID' => $post_ID,
			// Set image Title to sanitized title
            'post_title' => $my_image_title,
			// Set image Caption (Excerpt) to sanitized title
            'post_excerpt' => $my_image_title,
			// Set image Description (Content) to sanitized title
            'post_content' => $my_image_title,
        );

		// Set the image Alt-Text
        update_post_meta($post_ID, '_wp_attachment_image_alt', $my_image_title);
		// Set the image meta (e.g. Title, Excerpt, Content)
        wp_update_post($my_image_meta);
    }
}

/* Change each shopping cart weight
  ----------------------------------------------------------------------- */

add_action('woocommerce_before_calculate_totals', 'add_custom_weight', 10, 1);

function add_custom_weight($cart_object) {	


    if ((is_admin() && !defined('DOING_AJAX') ) || $cart_object->is_empty())
        return;

    foreach ($cart_object->get_cart() as $cart_item) {

        //set speicfy weight to product
        if ($cart_item['data']->get_sku() == 'MDSB7569') {
            //L X H X 0.5cm X190g /10,000 x110%
            if ($cart_item['nLength'] > 0 || !empty($cart_item['nLength'])) {
                $L = $cart_item['nLength'];
                $W = $cart_item['nWidth'];
                $H = $cart_item['nHeight'];
            } else {
                $L = $cart_item['iEditLength'];
                $W = $cart_item['iEditWidth'];
                $H = $cart_item['iEditHeight'];
            }

            if ($L <= (349.5 - $W ) && $H <= (424 - 0.5 * $W)) {
                $typeL = 2 * $L + 2 * $W + 19.5 + 6;
                $typeW = 0.5 * $W + $H + 65 + 6;
                if ($typeL <= 438 && $typeW <= 317) {
                    $machineType = 'HP5500';
                } else {
                    $machineType = 'HP10000';
                }
            } else {
                $typeL2 = $L + $W + 19.5 + 6;
                $typeW2 = 0.5 * $W + $H + 65 + 6;
                $machineType = 'HP10000L';
            }

            if ($machineType === 'HP5500') {
                if ($typeW <= 317) {
                    $templateModel = 'HP5500B1S';
                } else {
                    $templateModel = 'HP5500B1H';
                }
            } else if ($machineType === 'HP10000') {
                if ($typeW <= 495) {
                    $templateModel = 'HP10000B1S';
                } else {
                    $templateModel = 'HP10000B1H';
                }
            } else if ($machineType === 'HP10000L') {
                if ($typeW2 <= 495) {
                    $templateModel = 'HP10000B2S';
                } else {
                    $templateModel = 'HP10000B2H';
                }
            }

            if ($templateModel === 'HP5500B1S' || $templateModel === 'HP5500B1H') {
                $productWeight = 0.1;
            	$productType = 0;
            } else if ($templateModel === 'HP10000B1S' || $templateModel === 'HP10000B1H') {
                $productWeight = 0.13;
            	$productType = 1;
            } else if ($templateModel === 'HP10000B2S' || $templateModel === 'HP10000B2H') {
                $productWeight = 0.21;
            	$productType = 2;
            }

            //$cart_item['data']->set_weight(number_format($totalWeight,2));
        	$quantity = $cart_item['quantity'];
        
        	$box = 0.5;//kg
            if ($productType === 0) {
                if ($quantity < 50) {
                    $totalWeight = $productWeight * $quantity + $box * 0.5;
                } else if ($quantity >= 50) {
                    $totalWeight = $productWeight * $quantity + $box * ($quantity / 50);
                }
            } else if ($productType === 1) {
                if ($quantity < 10) {
                    $totalWeight = $productWeight * $quantity + $box * 0.6;
                } else if ($quantity >= 10) {
                    $totalWeight = $productWeight * $quantity + $box * ($quantity / 25);
                }
            } else if ($productType === 2) {
                $box = 0.8;
                if ($quantity < 10) {
                    $totalWeight = $productWeight * $quantity + $box * 0.6;
                } else if ($quantity >= 10) {
                    $totalWeight = $productWeight * $quantity + $box * ($quantity / 25);
                }
            }
        
            //each product unit weight
        	$cart_item['data']->set_weight($totalWeight/$quantity);
        }
    }
}

/** * Add Cart Weight to Cart and Checkout */ 
function wcw_cart() {
    global $woocommerce;
    if (WC()->cart->needs_shipping()) :
        ?>
        <tr class="shipping">
            <th><?php _e('Weight', 'woocommerce-cart-weight'); ?></th>
            <td><strong><span class="woocommerce-Price-amount amount"><?php echo number_format($woocommerce->cart->cart_contents_weight,2) . ' kg'; ?></span></strong></td>
        </tr>
    <?php
    endif;
}

add_action('woocommerce_cart_totals_after_order_total', 'wcw_cart');
add_action('woocommerce_review_order_after_order_total', 'wcw_cart');



/**
 * Change the strength requirement on the woocommerce password
 *
 * Strength Settings
 * 4 = Strong
 * 3 = Medium (default) 
 * 2 = Also Weak but a little stronger 
 * 1 = Password should be at least Weak
 * 0 = Very Weak / Anything
 */
add_filter( 'woocommerce_min_password_strength', 'misha_change_password_strength' );
 
function misha_change_password_strength( $strength ) {
	 return 1;
}

add_filter( 'wc_password_strength_meter_params', 'misha_strength_meter_settings' );
 
function misha_strength_meter_settings( $data ) {
 
	return array_merge( $data, array(
		'min_password_strength' => 1,
		'i18n_password_error' => 'Do not you want to be protected? Make it stronger!',
		'i18n_password_hint' => 'Please make your password use a mix of <strong>UPPER</strong> and <strong>lowercase</strong> letters, <strong>numbers</strong>, and <strong>symbols</strong> (e.g., <strong> ! " ? $ % ^ & </strong>).'
	) );
 
}

add_action( 'wp_enqueue_scripts',  'misha_password_messages', 9999 );
 
function misha_password_messages() {
 
	wp_localize_script( 'wc-password-strength-meter', 'pwsL10n', array(
		'short' => __( 'Too short', 'CPB' ),
		'bad' => __( 'Too bad', 'CPB' ),
		'good' => __( 'Better but not enough', 'CPB' ),
		'strong' => __( 'Better', 'CPB' ),
		'mismatch' => __( 'Your passwords do not match, please re-enter them.', 'CPB' ),
	) );
 
}


add_filter( 'woocommerce_product_tabs', 'cpb_remove_product_tabs', 98 );

function cpb_remove_product_tabs( $tabs ) {
    unset( $tabs['additional_information'] ); 
    return $tabs;
}

add_action( 'woocommerce_after_add_to_cart_button', 'cpb_echo_qty_front_add_cart');
 
function cpb_echo_qty_front_add_cart() {
 echo '<div class="cpb-qty">Qty: </div>'; 
}