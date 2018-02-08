<?php
/*
 * Custom the function to fulfill project requirment
 * author: felixchan
 */

/**
 * Output engraving field.
 */
function cpb_output_custom_field() {
    global $product;

    if ($product->get_id() !== 738) {
        return;
    }
    ?>

    <div class="form-group">
        <label for="iPrint1"><h5>Print</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPrint1" name="nPrint" value="Full Color Print" checked><label class="cpb_radio" for="iPrint1" >Full Color Print</label>
        <input type="radio" class="form-control cpb_radio" id="iPrint2" name="nPrint" value="Plain-No Print"><label class="cpb_radio" for="iPrint2" >Plain-No Print</label>
    </div><br><br>
    <div class="form-group">
        <label for="iPaperType"><h5>Paper Type</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPaperType" name="nPaperType" value="190gCardStock" checked><label class="cpb_radio" for="iPaperType" >190g Card Stock</label>
    </div><br><br>

    <div class="form-group">
        <label for="iFinish1"><h5>Finish</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iFinish1" name="nFinish" value="mattFinish" checked><label class="cpb_radio" for="iFinish1" >Matt Finish</label>
        <input type="radio" class="form-control cpb_radio" id="iFinish2" name="nFinish" value="glossFinish"><label class="cpb_radio" for="iFinish2" >Gloss Finish</label>
    </div><br><br>

    <div class="form-group">
        <label for="iHandleType1"><h5>Handle Type</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iHandleType1" name="nHandleType" value="ploypropylene" checked><label class="cpb_radio" for="iHandleType1" >Polypropylene(PP)</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleType2" name="nHandleType" value="cotton"><label class="cpb_radio" for="iHandleType2" >Cotton</label>
    </div><br><br>

    <div class="form-group">
        <label for="iHandleColor1"><h5>Handle Color</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iHandleColor1" name="nHandleColor" value="black" checked><label class="cpb_radio" for="iHandleColor1" >Black</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleColor2" name="nHandleColor" value="brown"><label class="cpb_radio" for="iHandleColor2" >Brown</label>
    </div><br><br>

    <div class="form-group">
        <label for="iHandleLength1"><h5>Handle Length</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iHandleLength1" name="nHandleLength" value="450mmOneSide" checked><label class="cpb_radio" for="iHandleLength1" >450mm (One Side)</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleLength2" name="nHandleLength" value="500mmOneSide"><label class="cpb_radio" for="iHandleLength2" >500mm (One Side)</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleLength3" name="nHandleLength" value="550mmOneSide"><label class="cpb_radio" for="iHandleLength3" >550mm (One Side)</label>
    </div><br><br>

    <div class="form-group">
        <label for="iLength"><h5>Length :</h5></label>
        <input type="text" class="form-control cpb_number" id="iLength" name="nLength" value="188" placeholder="100mm - 400mm">
        <a href="javascript:void(0)" data-toggle="popover" data-content="The length is the measurement of your box from left to right.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div><br><br>

    <div class="form-group">
        <label for="iWidth"><h5>Width :</h5></label>
        <input type="text" class="form-control cpb_number" id="iWidth" name="nWidth" value="80" placeholder="40mm - 100mm">
        <a href="javascript:void(0)" data-toggle="popover" data-content="The width is the measurement of your box from front to back.Be sure to add a minimum of 40mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div><br><br>

    <div class="form-group">
        <label for="iHeight"><h5>Height :</h5></label>
        <input type="text" class="form-control cpb_number" id="iHeight" name="nHeight" value="258" placeholder="100mm - 450mm">
        <a href="javascript:void(0)" data-toggle="popover" data-content="The depth is the measurement of your box from top to bottom.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div>
    <div class="cpb_upload_image">
        <label>upload your work</label>
        <input type="file" name="cpb_file" id="file" onchange="readURL(this);"/><br />
    </div>
    <?php
}

add_action('woocommerce_before_add_to_cart_quantity', 'cpb_output_custom_field', 10);

/**
 * Add engraving text to cart item.
 *
 * @param array $cart_item_data
 * @param int   $product_id
 * @param int   $variation_id
 *
 * @return array
 */
function cpb_add_custom_field_to_cart_item($cart_item_data, $product_id, $variation_id) {
    $nPrint = filter_input(INPUT_POST, 'nPrint');
    $nPaperType = filter_input(INPUT_POST, 'nPaperType');
    $nFinish = filter_input(INPUT_POST, 'nFinish');
    $nHandleType = filter_input(INPUT_POST, 'nHandleType');
    $nHandleColor = filter_input(INPUT_POST, 'nHandleColor');
    $nHandleLength = filter_input(INPUT_POST, 'nHandleLength');
    $nLength = filter_input(INPUT_POST, 'nLength');
    $nWidth = filter_input(INPUT_POST, 'nWidth');
    $nHeight = filter_input(INPUT_POST, 'nHeight');

    if (!empty($nPrint)) {
        $cart_item_data['nPrint'] = $nPrint;
        $cart_item_data['nPaperType'] = $nPaperType;
        $cart_item_data['nFinish'] = $nFinish;
        $cart_item_data['nHandleType'] = $nHandleType;
        $cart_item_data['nHandleColor'] = $nHandleColor;
        $cart_item_data['nHandleLength'] = $nHandleLength;
        $cart_item_data['nLength'] = $nLength;
        $cart_item_data['nWidth'] = $nWidth;
        $cart_item_data['nHeight'] = $nHeight;


        if (!file_exists('cpb_die_cut_upload')) {
            mkdir('cpb_die_cut_upload', 0777, true);
        }

        move_uploaded_file($_FILES["cpb_file"]["tmp_name"], "cpb_die_cut_upload/" . $_FILES["cpb_file"]["name"]);

        $cart_item_data['ncpb_file'] = $_FILES["cpb_file"]["name"];
    } else {
        return $cart_item_data;
    }
    $data_string = '[
  {
    "id": 133720,
    "value": 256
  },
  {
    "id": 133721,
    "value": 95
  },
  {
    "id": 133722,
    "value": 268
  }]';
    post_cproduct_id_api("bearer 394a7dfe-d276-4833-9c6b-f77d7da14445", $data_string);
    return $cart_item_data;
}

add_filter('woocommerce_add_cart_item_data', 'cpb_add_custom_field_to_cart_item', 10, 3);

/**
 * Display engraving text in the cart.
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
function cpb_display_custom_text_cart($item_data, $cart_item) {
    if (!empty($cart_item['nPrint'])) {
        $item_data[] = array('key' => __('Print', 'somalite'), 'value' => wc_clean($cart_item['nPrint']), 'display' => '');
        $item_data[] = array('key' => __('Paper Type', 'somalite'), 'value' => wc_clean($cart_item['nPaperType']), 'display' => '');
        $item_data[] = array('key' => __('Finish', 'somalite'), 'value' => wc_clean($cart_item['nFinish']), 'display' => '');
        $item_data[] = array('key' => __('Handle Type', 'somalite'), 'value' => wc_clean($cart_item['nHandleType']), 'display' => '');
        $item_data[] = array('key' => __('Handle Color', 'somalite'), 'value' => wc_clean($cart_item['nHandleColor']), 'display' => '');
        $item_data[] = array('key' => __('Handle Length', 'somalite'), 'value' => wc_clean($cart_item['nHandleLength']), 'display' => '');
        $item_data[] = array('key' => __('Length', 'somalite'), 'value' => wc_clean($cart_item['nLength']), 'display' => '');
        $item_data[] = array('key' => __('Width', 'somalite'), 'value' => wc_clean($cart_item['nWidth']), 'display' => '');
        $item_data[] = array('key' => __('Height', 'somalite'), 'value' => wc_clean($cart_item['nHeight']), 'display' => '');
        $item_data[] = array('key' => __('Upload file', 'somalite'), 'value' => wc_clean($cart_item['ncpb_file']), 'display' => '');
    } else {
        return $item_data;
    }

    return $item_data;
}

add_filter('woocommerce_get_item_data', 'cpb_display_custom_text_cart', 10, 2);

/**
 * Add engraving text to order.
 *
 * @param WC_Order_Item_Product $item
 * @param string                $cart_item_key
 * @param array                 $values
 * @param WC_Order              $order
 */
function cpb_add_custom_text_to_order_items($item, $cart_item_key, $values, $order) {
    if (empty($values['nPrint'])) {
        return;
    }

    $item->add_meta_data(__('Print', 'somalite'), $values['nPrint']);
    $item->add_meta_data(__('Paper Type', 'somalite'), $values['nPaperType']);
    $item->add_meta_data(__('Finish', 'somalite'), $values['nFinish']);
    $item->add_meta_data(__('Handle Type', 'somalite'), $values['nHandleType']);
    $item->add_meta_data(__('Handle Color', 'somalite'), $values['nHandleColor']);
    $item->add_meta_data(__('Handle Length', 'somalite'), $values['nHandleLength']);
    $item->add_meta_data(__('Length', 'somalite'), $values['nLength']);
    $item->add_meta_data(__('Width', 'somalite'), $values['nWidth']);
    $item->add_meta_data(__('Height', 'somalite'), $values['nHeight']);
}

add_action('woocommerce_checkout_create_order_line_item', 'cpb_add_custom_text_to_order_items', 10, 4);



/**
 * Relocate the product details element 
 */
remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 25);

remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);


/*
 *  add hyper link on product details page redirect to sz buiilder iframe page.
 */

function edit_online_now_link() {

    $terms_post = get_the_terms($post->cat_ID, 'product_cat');
    foreach ($terms_post as $term_cat) {
        $term_cat_id = $term_cat->term_id;
    }

    $form_html = '<div class="container cpb_form">';

    $form_html .= '<form class="form-inline" method="post" action="http://localhost/cpb_local_1124/cpb-shopping-bag-builder/">
    <input type="hidden" id="iPaperType" name="nPaperType" value="190gCardStock" checked>
    <input type="hidden" id="iFinish1" name="nFinish" value="mattFinish" checked>
    <input type="hidden" id="iHandleType2" name="nHandleType" value="cotton">
    <input type="hidden" id="iHandleColor2" name="nHandleColor" value="brown">
    <input type="hidden" id="iHandleLength3" name="nHandleLength" value="550mmOneSide">
    <input type="hidden" id="iLength" name="nLength" min="100" value="200">
    <input type="hidden" id="iLength" name="nLength" min="40" value="95">
    <input type="hidden" id="iLength" name="nLength" min="100" value="259">';

    if ($term_cat_id == 20) {
        $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline"/></form>';
    } else {
        $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline"/></form>';
    }

    $form_html .= '<p class="cpb_or_text">- OR -</p><a href="' . get_template_directory_uri() . '/download_source/WT7989-005-02.pdf" target="_blank" download><button class="download_diecut_link">Download Diecut</button></a>';

    $form_html .= '<a class="cpb_custome_qoute">Custom Qoute</a><br><br>';

    $form_html .= '<br><br><a class="cpb_delivery_options" href="">See delivery options>></a>';

    $form_html .= '<p class="cpb_notes">Notes: Length can range between 100 and 400mm and width can range between 40 and 200mm and height can range between 100 and 450mm.<p></div>';

    echo $form_html;
}

add_action('woocommerce_share', 'edit_online_now_link', 50);

function cpb_product_reminder_text() {

    $form_html = '<p class="cpb_reminder_text">To get started, input your custom dimensions. After that you are ready to add artwork! Push “Edit Online Now” to the next level with our sophisticated online editor. If you are a more advanced user, download your custom die line and edit offline with Adobe® Illustrator® then upload your finished artwork. <p>';

    $form_html .= '<img id="cpb_preview_img" src="#" />';

    echo $form_html;
}

add_action('woocommerce_share', 'cpb_product_reminder_text', 90);

function cpb_test_add_action() {

    echo '<a class="testAddToCart" href="#"><button onclick="test8899()">Add To Cart321</button></a>';
}

add_action('cpb_shopping_bag_builder', 'cpb_test_add_action');

//短代碼的功能
function sz_shopping_bag_builder($atts) {
    do_action('cpb_shopping_bag_builder');

    $return_string = '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://localhost/whitelabel-site/h5builder/shoppingBag/pc/4/en/index.html?';
    $return_string .= 'webId=41&productId=207568&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
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

    </div>
    <?php
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

        $billing_first_name = get_post_meta($order_id, '_billing_first_name', true);
        $billing_last_name = get_post_meta($order_id, '_billing_last_name', true);
        $billing_company = get_post_meta($order_id, '_billing_company', true);
        $billing_address = get_post_meta($order_id, '_billing_address_1', true);
        $billing_address2 = get_post_meta($order_id, '_billing_address_2', true);
        $billing_city = get_post_meta($order_id, '_billing_city', true);
        $billing_postcode = get_post_meta($order_id, '_billing_postcode', true);
        $billing_country = get_post_meta($order_id, '_billing_country', true);
        $billing_state = get_post_meta($order_id, '_billing_state', true);
        $billing_email = get_post_meta($order_id, '_billing_email', true);
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $billing_paymethod = get_post_meta($order_id, '_payment_method', true);

        $data_string = '{"bindOrderNumbers": ["' . $order_id . '"],"orderCommnet": "' . $billing_paymethod . '","lineItems": [{"productInstanceId": 207614,"qty": ' . $item_quantity . ', "comment": "' . $custom_project_id . '"}],
            "deliveryAddress": {
              "firstName": "' . $billing_first_name . '",
              "lastName": "' . $billing_last_name . '",
              "state": "' . $billing_state . '",
              "city": "' . $billing_city . '",
              "suburb": "sn",
              "postcode": ' . $billing_postcode . ',
              "streetAddress1": "' . $billing_address . '",
              "steetAddress2": "' . $billing_address2 . '",
              "telephone": ' . $billing_phone . ',
              "mobile": ' . $billing_phone . ',
              "emailAddress": "' . $billing_email . '",
              "countryCode2": "CN",
              "countryName": "' . $billing_country . '",
              "sortOrder": 1
            }
        }';

        access_sz_api("bearer 394a7dfe-d276-4833-9c6b-f77d7da14445", $data_string);
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

    $ch = curl_init('http://test.jibeixin.com:9199/cgp-rest/api/orders');

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    if ($result === false) {
        // throw new Exception('Curl error: ' . curl_error($crl));
        print_r('Curl error: ' . curl_error($ch));
        $file = '../wp-content/uploads/text321.txt';
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $txt = $result . $ch;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    curl_close($ch);

    $file = '/var/www/html/cpb_uat/wp-content/uploads/text321.txt';
    $myfile = fopen($file, "w") or die("Unable to open file!");
    $txt = $result . $ch;
    fwrite($myfile, $txt);
    fclose($myfile);
}

function post_cproduct_id_api($token, $json_data) {
    $accesstoken = $token;

    $data_string = $json_data;

//$data_string = json_encode($data);

    $header = array();
    $header[] = 'Content-length: ' . strlen($data_string);
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $ch = curl_init('http://test.jibeixin.com:9199/cgp-rest/api/products/133829/skuProduct'); //133829 sz give us

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    if ($result === false) {
        // throw new Exception('Curl error: ' . curl_error($crl));
        print_r('Curl error: ' . curl_error($ch));
        $file = '../wp-content/uploads/text321.txt';
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $txt = $result . $ch;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    curl_close($ch);



    $file = '/var/www/html/cpb_uat/wp-content/uploads/productid.txt';
    $myfile = fopen($file, "w") or die("Unable to open file!");
    $txt = $result;
    //$jsonData = json_decode($txt, true);
    fwrite($myfile, $txt);
    fclose($myfile);
}

function get_builder_path_api($token, $json_data) {
    $accesstoken = $token;

    $data_string = $json_data;

//$data_string = json_encode($data);

    $header = array();
    $header[] = 'Content-length: ' . strlen($data_string);
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $file = '/var/www/html/cpb_uat/wp-content/uploads/productid.txt';
    $myfile = fopen($file, "w") or die("Unable to open file!");
    $jsonData = json_decode($myfile, true);
    fclose($myfile);

    $productid = $jsonData['data']['id'];

    sku_product_id($productid);

    $ch = curl_init('http://test.jibeixin.com:9199/cgp-rest/api/builder/products/' . $productid . '?context=PC&locale=en');

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    if ($result === false) {
        // throw new Exception('Curl error: ' . curl_error($crl));
        print_r('Curl error: ' . curl_error($ch));
        $file = '../wp-content/uploads/text321.txt';
        $myfile = fopen($file, "w") or die("Unable to open file!");
        $txt = $result . $ch;
        fwrite($myfile, $txt);
        fclose($myfile);
    }

    curl_close($ch);
}
