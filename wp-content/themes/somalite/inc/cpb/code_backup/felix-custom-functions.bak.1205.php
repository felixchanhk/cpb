<?php
/*
 * Custom the function to fulfill project requirment
 * author: felixchan
 */

/*
 *  add hyper link on product details page redirect to sz buiilder iframe page.
 */

function edit_online_now_link() {

    $terms_post = get_the_terms($post->cat_ID, 'product_cat');
    foreach ($terms_post as $term_cat) {
        $term_cat_id = $term_cat->term_id;
    }
    
    $form_html = '<form class="form-inline">
    <div class="form-group">
      <label for="print"><h5>Print</h5></label>
      <input type="radio" class="form-control cpb_radio" id="iPrint1" name="nPrint" value="fColor" checked><label class="cpb_radio" for="iPrint1" >Full Color Print</label>
      <input type="radio" class="form-control cpb_radio" id="iPrint2" name="nPrint" value="pNo"><label class="cpb_radio" for="iPrint2" >Plain-No Print</label>
    </div><br><br>
    
    <div class="form-group">
      <label for="paperType"><h5>Paper Type</h5></label>
      <input type="radio" class="form-control cpb_radio" id="iPaperType" name="nPaperType" value="190gCardStock" checked><label class="cpb_radio" for="iPaperType" >190g Card Stock</label>
    </div><br><br>
    
    <div class="form-group">
      <label for="finish"><h5>Finish</h5></label>
      <input type="radio" class="form-control cpb_radio" id="iFinish1" name="nFinish" value="mattFinish" checked><label class="cpb_radio" for="iFinish1" >Matt Finish</label>
      <input type="radio" class="form-control cpb_radio" id="iFinish2" name="nFinish" value="glossFinish"><label class="cpb_radio" for="iFinish2" >Gloss Finish</label>
    </div><br><br>
    
    <div class="form-group">
      <label for="handleType"><h5>Handle Type</h5></label>
      <input type="radio" class="form-control cpb_radio" id="iHandleType1" name="nHandleType" value="ploypropylene" checked><label class="cpb_radio" for="iHandleType1" >Polypropylene(PP)</label>
      <input type="radio" class="form-control cpb_radio" id="iHandleType2" name="nHandleType" value="cotton"><label class="cpb_radio" for="iHandleType2" >Cotton</label>
    </div><br><br>
    
    <div class="form-group">
      <label for="handleColor"><h5>Handle Color</h5></label>
      <input type="radio" class="form-control cpb_radio" id="iHandleColor1" name="nHandleColor" value="black" checked><label class="cpb_radio" for="iHandleColor1" >Black</label>
      <input type="radio" class="form-control cpb_radio" id="iHandleColor2" name="nHandleColor" value="brown"><label class="cpb_radio" for="iHandleColor2" >Brown</label>
    </div><br><br>
    
    <div class="form-group">
      <label for="handleLength"><h5>Handle Length</h5></label>
      <input type="radio" class="form-control cpb_radio" id="iHandleLength1" name="nHandleLength" value="450mmOneSide" checked><label class="cpb_radio" for="iHandleLength1" >450mm (One Side)</label>
      <input type="radio" class="form-control cpb_radio" id="iHandleLength2" name="nHandleLength" value="500mmOneSide"><label class="cpb_radio" for="iHandleLength2" >500mm (One Side)</label>
      <input type="radio" class="form-control cpb_radio" id="iHandleLength3" name="nHandleLength" value="550mmOneSide"><label class="cpb_radio" for="iHandleLength3" >550mm (One Side)</label>
    </div><br><br>

    <div class="form-group">
        <label for="length"><h5>Length :</h5></label>
        <input type="number" class="form-control cpb_number" id="iLength" name="nLength" min="100" max="500">
        <a href="javascript:void(0)" data-toggle="popover" data-content="The length is the measurement of your box from left to right.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div><br><br>

    <div class="form-group">
        <label for="length"><h5>Width :</h5></label>
        <input type="number" class="form-control cpb_number" id="iLength" name="nLength" min="100" max="500">
        <a href="javascript:void(0)" data-toggle="popover" data-content="The width is the measurement of your box from front to back.Be sure to add a minimum of 40mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div><br><br>
    
    <div class="form-group">
        <label for="length"><h5>Height :</h5></label>
        <input type="number" class="form-control cpb_number" id="iLength" name="nLength" min="100" max="500">
        <a href="javascript:void(0)" data-toggle="popover" data-content="The depth is the measurement of your box from top to bottom.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div><br><br>';

    if ($term_cat_id == 20) {
        $form_html .= '<div class="edit_online_now_link"><button class="button alt" >Edit Online Now</button></div></form>';
    } else {
        $form_html .= '<div class="edit_online_now_link"><button class="button alt" >Edit Online Now</button></div></form>';
    }
    
    echo $form_html;
    
}

add_action('woocommerce_single_product_summary', 'edit_online_now_link', 20);

//短代碼的功能
function sz_shopping_bag_builder($atts) {
    $return_string = '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://localhost/whitelabel-site/h5builder/shoppingBag/pc/3/index.html?';
    $return_string .= 'webId=41&productId=151577&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    return $return_string;
}

//建立一個短代碼
function register_builder_shoppingbag_shortcodes() {
    add_shortcode('sz_builder_shoppingbag', 'sz_shopping_bag_builder');
}

function sz_invitation_card_shopping($atts) {
    $return_string = '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://localhost/whitelabel-site/h5builder/InvitationCard_1/pc/4/en/index.html?';
    $return_string .= 'webId=41&productId=137842&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    return $return_string;
}

//建立一個短代碼
function register_invitation_cardshortcodes() {
    add_shortcode('sz_builder_invitationcard', 'sz_invitation_card_shopping');
}

//新增至佈景主題中
add_action('init', 'register_builder_shoppingbag_shortcodes'); /* 文章頁面 */
add_action('init', 'register_invitation_cardshortcodes'); /* 文章頁面 */
add_filter('widget_text', 'do_shortcode'); /* 小工具 */

/*
 *  add hyper link on product details page for customer to download the die cut file.
 */

function download_diecut_link() {
    echo '<div class="download_diecut_link"><a href="' . get_template_directory_uri() . '/download_source/WT7989-005-02.pdf" target="_blank" download>Download Diecut</a></div>';
}

add_action('woocommerce_single_product_summary', 'download_diecut_link', 32);

/**
 * Add a custom product tab.
 */
function custom_product_tabs($tabs) {
    $tabs['giftcard'] = array(
        'label' => __('Gift Card', 'woocommerce'),
        'target' => 'giftcard_options',
        'class' => array('show_if_simple', 'show_if_variable'),
    );
    return $tabs;
}

add_filter('woocommerce_product_data_tabs', 'custom_product_tabs');

/**
 * Contents of the gift card options product tab.
 */
function giftcard_options_product_tab_content() {
    global $post;

    // Note the 'id' attribute needs to match the 'target' parameter set above
    ?><div id='giftcard_options' class='panel woocommerce_options_panel'><?php ?><div class='options_group'><?php
            woocommerce_wp_checkbox(array(
                'id' => '_allow_personal_message',
                'label' => __('Allow the customer to add a personal message', 'woocommerce'),
            ));
            woocommerce_wp_text_input(array(
                'id' => '_valid_for_days',
                'label' => __('Gift card validity (in days)', 'woocommerce'),
                'desc_tip' => 'true',
                'description' => __('Enter the number of days the gift card is valid for.', 'woocommerce'),
                'type' => 'number',
                'custom_attributes' => array(
                    'min' => '1',
                    'step' => '1',
                ),
            ));
            ?></div>

    </div><?php
}

add_filter('woocommerce_product_data_panels', 'giftcard_options_product_tab_content');

/**
 * Save the custom fields.
 */
function save_giftcard_option_fields($post_id) {

    $allow_personal_message = isset($_POST['_allow_personal_message']) ? 'yes' : 'no';
    update_post_meta($post_id, '_allow_personal_message', $allow_personal_message);

    if (isset($_POST['_valid_for_days'])) {
        update_post_meta($post_id, '_valid_for_days', absint($_POST['_valid_for_days']));
    }
}

add_action('woocommerce_process_product_meta_simple', 'save_giftcard_option_fields');

/**
 * Change the checkout city field to a dropdown field.
 */
function jeroen_sormani_change_city_to_dropdown($fields) {
    $city_args = wp_parse_args(array(
        'type' => 'select',
        'options' => array(
            'amsterdam' => 'Amsterdam',
            'rotterdam' => 'Rotterdam',
            'den-haag' => 'Den Haag',
            'utrecht' => 'Utrecht',
            'leiden' => 'Leiden',
            'groningen' => 'Groningen',
        ),
        'input_class' => array(
            'wc-enhanced-select',
        )
            ), $fields['shipping']['shipping_city']);

    $fields['shipping']['shipping_city'] = $city_args;
    $fields['billing']['billing_city'] = $city_args; // Also change for billing field

    wc_enqueue_js("
	jQuery( ':input.wc-enhanced-select' ).filter( ':not(.enhanced)' ).each( function() {
		var select2_args = { minimumResultsForSearch: 5 };
		jQuery( this ).select2( select2_args ).addClass( 'enhanced' );
	});"
    );

    return $fields;
}

add_filter('woocommerce_checkout_fields', 'jeroen_sormani_change_city_to_dropdown');

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
 */

function productInstanceId_custom_fields_display() {
    // Display the value of custom product text field
    echo get_post_meta(get_the_ID(), '_product_Instance_Id', true) . "<br>";
}

add_action('woocommerce_product_description_heading', 'productInstanceId_custom_fields_display');

/**
 * Check order is completed send the data to SZ  server.
 */
function mysite_woocommerce_order_status_completed($order_id) {

    // Getting an instance of the WC_Order object from a defined ORDER ID
    $order = wc_get_order($order_id);

    // Iterating through each "line" items in the order
    foreach ($order->get_items() as $item_id => $item_data) {

        // Get an instance of corresponding the WC_Product object
        $product = $item_data->get_product();
        $product_id = $item_data['product_id'];
        $product_name = $product->get_name(); // Get the product name
        $item_quantity = $item_data->get_quantity(); // Get the item quantity
        $item_line_total = $item_data->get_total(); // Get the item line total
        $custom_project_id = get_post_meta($product_id, '_product_Instance_Id', true);
        
        $billing_first_name =  get_post_meta($order_id,'_billing_first_name',true);
        $billing_last_name = get_post_meta($order_id,'_billing_last_name',true);
        $billing_company = get_post_meta($order_id,'_billing_company',true);
        $billing_address = get_post_meta($order_id,'_billing_address_1',true);
        $billing_address2 = get_post_meta($order_id,'_billing_address_2',true);
        $billing_city = get_post_meta($order_id,'_billing_city',true);
        $billing_postcode = get_post_meta($order_id,'_billing_postcode',true);
        $billing_country = get_post_meta($order_id,'_billing_country',true);
        $billing_state = get_post_meta($order_id,'_billing_state',true);
        $billing_email = get_post_meta($order_id,'_billing_email',true);
        $billing_phone = get_post_meta($order_id,'_billing_phone',true);
        $billing_paymethod = get_post_meta($order_id,'_payment_method',true);      

        $data_string = '{"bindOrderNumbers": ["'. $order_id .'"],"orderCommnet": "'.$billing_paymethod.'","lineItems": [{"productInstanceId": 202291,"qty": '. $item_quantity .', "comment": "'.$custom_project_id.'"}],
            "deliveryAddress": {
              "firstName": "'. $billing_first_name .'",
              "lastName": "'. $billing_last_name .'",
              "state": "'.$billing_state.'",
              "city": "'.$billing_city.'",
              "suburb": "sn",
              "postcode": '.$billing_postcode.',
              "streetAddress1": "'.$billing_address.'",
              "steetAddress2": "'.$billing_address2.'",
              "telephone": '.$billing_phone.',
              "mobile": '.$billing_phone.',
              "emailAddress": "'.$billing_email.'",
              "countryCode2": "CN",
              "countryName": "'.$billing_country.'",
              "sortOrder": 1
            }
        }';
        
        access_sz_api("bearer 507a3ea7-a365-4fa6-a4d3-94fdb3b24ef3", $data_string);
    }
}

add_action('woocommerce_order_status_completed', 'mysite_woocommerce_order_status_completed', 10, 1);

function access_sz_api($token, $json_data) {
    $accesstoken = $token;

    $data_string = $json_data;

//$data_string = json_encode($data);

    $header = array();
    $header[] = 'Content-length: ' . strlen($data_string);
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $ch = curl_init('http://192.168.26.28/cgp-rest/api/orders');

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    if ($result === false) {
        // throw new Exception('Curl error: ' . curl_error($crl));
        print_r('Curl error: ' . curl_error($ch));
    }

    curl_close($ch);

    error_log($result, 0);
}
