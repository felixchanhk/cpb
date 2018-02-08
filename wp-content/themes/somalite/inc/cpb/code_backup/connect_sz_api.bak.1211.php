<?php

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

        $data_string = '{"bindOrderNumbers": ["' . $order_id . '"],"orderCommnet": "' . $billing_paymethod . '","lineItems": [{"productInstanceId": 207659,"qty": ' . $item_quantity . ', "comment": "' . $custom_project_id . '"}],
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

        access_sz_api("bearer c75804dd-efeb-48d4-a05f-f7213de5b799", $data_string);
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
