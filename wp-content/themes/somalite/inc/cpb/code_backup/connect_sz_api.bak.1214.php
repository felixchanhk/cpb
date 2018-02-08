<?php


/**
 * Check order is completed send the data to SZ  server.
 */
function mysite_woocommerce_order_status_completed($order_id) {

	//$file = '/var/www/html/cpb_uat/wp-content/uploads/productInstanceId.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/productInstanceId.txt';
    $myfile = fopen($file, "r") or die("Unable to open productInstanceId file!");
	$productInstanceId = fgets($myfile);
    fclose($myfile);

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
    	//felix test data
        $custom_project_id = get_post_meta($product_id, '_product_Instance_Id', true);
    
        $billing_first_name = get_post_meta($order_id, '_billing_first_name', true);
        $billing_last_name = get_post_meta($order_id, '_billing_last_name', true);
        $billing_company = get_post_meta($order_id, '_billing_company', true);
        $billing_address = get_post_meta($order_id, '_billing_address_1', true);
        $billing_address2 = get_post_meta($order_id, '_billing_address_2', true);
        $billing_city = get_post_meta($order_id, '_billing_city', true);
        $billing_postcode = get_post_meta($order_id, '_billing_postcode', true);
    	if(!$billing_postcode){
        	$billing_postcode = 000000;
        }
        $billing_country = get_post_meta($order_id, '_billing_country', true);
        $billing_state = get_post_meta($order_id, '_billing_state', true);
        $billing_email = get_post_meta($order_id, '_billing_email', true);
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $billing_paymethod = get_post_meta($order_id, '_payment_method', true);

        $data_string = '{"bindOrderNumbers": ["' . $order_id . '"],"orderCommnet": "' . $billing_paymethod . '","lineItems": [{"productInstanceId": '.$productInstanceId.',"qty": ' . $item_quantity . ', "comment": "' . $custom_project_id . '"}],
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
	
        //order_post_sz_api("bearer 4040d7a8-adfc-4827-8c9e-9cd90c44ae97", $data_string);
    	order_post_sz_api("bearer ".get_token(), $data_string);
    }
}

add_action('woocommerce_order_status_completed', 'mysite_woocommerce_order_status_completed', 10, 1);

function order_post_sz_api($token, $json_data) {
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

    //$file = '/var/www/html/cpb_uat/wp-content/uploads/order_log.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/order_log.txt';
    $myfile = fopen($file, "w") or die("Unable to open order_log file!");
    $txt = $result . $ch;
    fwrite($myfile, $txt);
    fclose($myfile);
	curl_close($ch);
}


function post_cproduct_id_api($Length, $Width, $Height, $iEditPrint, $iEditPaperType, $iEditFinish, $iEditHandleType, $iEditHandleColor, $iEditHandleLength, $token) {
	
	$json_data = '[{"id": 133720,"value": ' . $Length . '},{"id": 133721,"value": '.$Width.'},{"id": 133722,"value": '.$Height.'},{"id": 133723,"value": '.$iEditPrint.'},{"id": 178358,"value": '.$iEditPaperType.'},{"id": 133726,"value": '.$iEditFinish.'},{"id": 178345,"value": '.$iEditHandleType.'},{"id": 178348,"value": '.$iEditHandleColor.'},{"id": 178351,"value": '.$iEditHandleLength.'}]';

    //$accesstoken = "bearer ".get_token();
    $accesstoken = "bearer " . $token;	

    $data_string = $json_data;

//$data_string = json_encode($data);

    $header = array();
    $header[] = 'Content-length: ' . strlen($data_string);
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $ch = curl_init('http://test.jibeixin.com:9199/cgp-rest/api/products/179388/skuProduct'); //133829 sz give us spu id

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

    //$file = '/var/www/html/cpb_uat/wp-content/uploads/productid.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/productid.txt';
    $myfile = fopen($file, "w") or die("Unable to open file!");
    $txt = $result;
    $jsonData = json_decode($txt, true);
	$pId = $jsonData['data']['id'];
    fwrite($myfile, $pId);
    fclose($myfile);
	curl_close($ch);
}

function dynamic_size_pId(){
	$Length = $_GET["iEditLength"];
	$Width = $_GET["iEditWidth"];
	$Height = $_GET["iEditHeight"];
	$iEditPrint = $_GET["iEditPrint"];
	if($iEditPrint == "Plain-No Print"){$iEditPrint = 133725;}else{$iEditPrint = 133724;}

	$iEditPaperType = 178359;

	$iEditFinish = $_GET["iEditFinish"];
	if($iEditFinish == "mattFinish"){$iEditFinish = 133727;}else{$iEditFinish = 133728;}

	$iEditHandleType = $_GET["iEditHandleType"];
	if($iEditHandleType == "ploypropylene"){$iEditHandleType = 178346;}else{$iEditHandleType = 178347;}

	$iEditHandleColor = $_GET["iEditHandleColor"];
	if($iEditHandleColor == "black"){$iEditHandleColor = 178349;}else{$iEditHandleColor = 178350;}

	$iEditHandleLength = $_GET["iEditHandleLength"];
	if($iEditHandleLength == "450mmOneSide"){$iEditHandleLength = 178352;}else if($iEditHandleLength == "550mmOneSide"){$iEditHandleLength = 178353;}else{$iEditHandleLength = 178354;}

	$token = get_token();

	post_cproduct_id_api($Length, $Width, $Height, $iEditPrint, $iEditPaperType, $iEditFinish, $iEditHandleType, $iEditHandleColor, $iEditHandleLength, $token);
	
	//$file = '/var/www/html/cpb_uat/wp-content/uploads/productid.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/productid.txt';
    $myfile = fopen($file, "r") or die("Unable to open productid file!");
	$txt = fgets($myfile);
    fclose($myfile);

	return $txt;
}




function get_builder_path_api($token, $json_data) {
    $accesstoken = $token;

    $data_string = $json_data;

//$data_string = json_encode($data);

    $header = array();
    $header[] = 'Content-length: ' . strlen($data_string);
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    //$file = '/var/www/html/cpb_uat/wp-content/uploads/productid.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/productid.txt';
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

	$file = '../wp-content/uploads/builderPath.txt';
    $myfile = fopen($file, "w") or die("Unable to open file!");
    $txt = $result . $ch;
    fwrite($myfile, $txt);
    fclose($myfile);

    curl_close($ch);
}


function get_token(){
	$file = '/var/www/html/cpb_uat/wp-content/api/output_token.txt';
	$myfile = fopen($file, "r") or die("Unable to open productid file!");
	$txt = fgets($myfile);
	$jsonData = json_decode($txt, true);
	$token_id = $jsonData['data']['access_token'];
	fclose($myfile);

	return $token_id;
}
