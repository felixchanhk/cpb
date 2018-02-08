<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


function api_gateway(){
	return 'http://test.jibeixin.com:9199';
}

function get_order_preview_image(){
	$file = '/var/www/html/cpb_uat/wp-content/api/productInstanceId.txt';
    $openFile = fopen($file, "r") or die("Unable to open productInstanceId file!");
	$productInstanceId = fgets($openFile);
    fclose($openFile);

	$accesstoken = get_token();

    $header = array();
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $channel = curl_init(api_gateway().'/cgp-rest/api/bom/productInstances/'.$productInstanceId.'?includeReferenceEntity=true&includeMaterialReferenceEntity=false');

    curl_setopt($channel, CURLOPT_HTTPHEADER, $header);

    curl_setopt($channel, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($channel);

	$file = '/var/www/html/cpb_uat/wp-content/api/image_path.txt';
    $openFile = fopen($file, "w") or die("Unable to open file!");
    $txt = $result;
    fwrite($openFile, $txt);
    fclose($openFile);

    curl_close($channel);
	
	$file = '/var/www/html/cpb_uat/wp-content/api/image_path.txt';

	$openFile = fopen($file, "r") or die("Unable to open order_log.txt!");
	$readFile = fread($openFile, 500000);

	//$convertJson = rtrim($readFile,"Resource id #1398");

	$obj = json_decode($readFile);

	return $obj->data->thumbnail;

}


function check_order_duplicated($order_id){
	$file = '/var/www/html/cpb_uat/wp-content/api/completeOrderId.txt';
    $myfile = fopen($file, "r") or die("Unable to open completeOrderId file!");	
	while (!feof($myfile)) {
    	$getJson = fgets($myfile);
    	$obj = json_decode($getJson);
    	if ($obj->oId == $order_id) {
        	return true;
    	}
	}
}
/**
 * Check order is completed send the data to SZ  server.
 */
function mysite_woocommerce_order_status_completed($order_id) {

	//$file = '/var/www/html/cpb_uat/wp-content/uploads/productInstanceId.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/productInstanceId.txt';
    $myfile = fopen($file, "r") or die("Unable to open productInstanceId file!");
	$productInstanceId = fgets($myfile);
    fclose($myfile);

	//record specify order and it productInstance
	$file = '/var/www/html/cpb_uat/wp-content/api/completeOrderId.txt';
    $myfile = fopen($file, "a") or die("Unable to open completeOrderId file!");
	if(check_order_duplicated($order_id)){
		
    }else{
    	$orderObj->oId = $order_id;
    	$orderObj->pInstanceId = $productInstanceId;
    	$orderJSON = json_encode($orderObj);
		fwrite($myfile,$orderJSON."\n");
    }
    fclose($myfile);

	$file = '/var/www/html/cpb_uat/wp-content/api/completeOrderId.txt';
    $myfile = fopen($file, "r") or die("Unable to open completeOrderId file!");	
	while (!feof($myfile)) {
    	$getJson = fgets($myfile);
    	$obj = json_decode($getJson);
    	if ($obj->oId == $order_id) {
        	$pIId = $obj->pInstanceId;
    	}
	}


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
        	$billing_postcode = '111111';
        }
        $billing_country = get_post_meta($order_id, '_billing_country', true);
    	$billing_state = get_post_meta($order_id, '_billing_state', true);
    	if(!$billing_state){
        	$billing_state = 'no state information';
        }
        $billing_email = get_post_meta($order_id, '_billing_email', true);
        $billing_phone = get_post_meta($order_id, '_billing_phone', true);
        $billing_paymethod = get_post_meta($order_id, '_payment_method', true);

        $data_string = '{"bindOrderNumbers": ["' . $order_id . '"],"orderCommnet": "' . $billing_paymethod . '","lineItems": [{"productInstanceId": '.$pIId.',"qty": ' . $item_quantity . ', "comment": "' . $custom_project_id . '"}],
            "deliveryAddress": {
              "firstName": "' . $billing_first_name . '",
              "lastName": "' . $billing_last_name . '",
              "state": "' . $billing_state . '",
              "city": "' . $billing_city . '",
              "suburb": "sn",
              "postcode": "' . $billing_postcode . '",
              "streetAddress1": "' . $billing_address . '",
              "steetAddress2": "' . $billing_address2 . '",
              "telephone": ' . $billing_phone . ',
              "mobile": ' . $billing_phone . ',
              "emailAddress": "' . $billing_email . '",
              "countryCode2": "' . $billing_country . '",
              "countryName": "' . $billing_country . '",
              "sortOrder": 1
            }
        }';
	
        //order_post_sz_api("bearer 4040d7a8-adfc-4827-8c9e-9cd90c44ae97", $data_string);
    	order_post_sz_api(get_token(), $data_string);
    	//get_builder_path_api(179388);
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

    $ch = curl_init(api_gateway().'/cgp-rest/api/orders');

    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

	$file = '/var/www/html/cpb_uat/wp-content/api/order_log.txt';
    $myfile = fopen($file, "w") or die("Unable to open order_log file!");
    $txt = $result;
    fwrite($myfile, $txt);
    fclose($myfile);
	curl_close($ch);

	
    $file = '/var/www/html/cpb_uat/wp-content/api/order_info.txt';
    $myfile = fopen($file, "w") or die("Unable to open order_log file!");
    $txt = $data_string;
    fwrite($myfile, $txt);
    fclose($myfile);
	curl_close($ch);

}


function post_cproduct_id_api($Length, $Width, $Height, $iEditPrint, $iEditPaperType, $iEditFinish, $iEditHandleType, $iEditHandleColor, $iEditHandleLength, $token) {
	
	$json_data = '[{"id": 133720,"value": ' . $Length . '},{"id": 133721,"value": '.$Width.'},{"id": 133722,"value": '.$Height.'},{"id": 133723,"value": '.$iEditPrint.'},{"id": 178358,"value": '.$iEditPaperType.'},{"id": 133726,"value": '.$iEditFinish.'},{"id": 178345,"value": '.$iEditHandleType.'},{"id": 178348,"value": '.$iEditHandleColor.'},{"id": 178351,"value": '.$iEditHandleLength.'}]';

    $accesstoken = get_token();

    $data_string = $json_data;

    $header = array();
    $header[] = 'Content-length: ' . strlen($data_string);
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $ch = curl_init(api_gateway().'/cgp-rest/api/products/179388/skuProduct'); //133829 sz give us spu id

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
	if($iEditFinish == "Matt"){$iEditFinish = 133727;}else{$iEditFinish = 133728;}

	$iEditHandleType = $_GET["iEditHandleType"];
	if($iEditHandleType == "Ploypropylene"){$iEditHandleType = 178346;}else{$iEditHandleType = 178347;}

	$iEditHandleColor = $_GET["iEditHandleColor"];
	if($iEditHandleColor == "Black"){$iEditHandleColor = 178349;}else{$iEditHandleColor = 178350;}

	$iEditHandleLength = $_GET["iEditHandleLength"];
	if($iEditHandleLength == "450mm One Side"){$iEditHandleLength = 178352;}else if($iEditHandleLength == "550mm One Side"){$iEditHandleLength = 178353;}else{$iEditHandleLength = 178354;}

	$token = get_token();

	post_cproduct_id_api($Length, $Width, $Height, $iEditPrint, $iEditPaperType, $iEditFinish, $iEditHandleType, $iEditHandleColor, $iEditHandleLength, $token);
	
	//$file = '/var/www/html/cpb_uat/wp-content/uploads/productid.txt';
	$file = '/var/www/html/cpb_uat/wp-content/api/productid.txt';
    $myfile = fopen($file, "r") or die("Unable to open productid file!");
	$txt = fgets($myfile);
    fclose($myfile);

	return $txt;
}


/**
* step 2 get sz api builder path
*/

function shppoing_bag_spuId(){
	return 179388;
}


function get_builder_path_api($spuId) {
    $accesstoken = get_token();
	//$spuId = shppoing_bag_spuId();

    $header = array();
    $header[] = 'Content-type: application/json;charset=UTF-8';
    $header[] = 'Authorization: ' . $accesstoken;

    $ch = curl_init(api_gateway().'/cgp-rest/api/builder/products/' . $spuId . '?context=PC&locale=en');

    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($ch);

	curl_close($ch);
	
	$builder_url = json_decode($result);

	return $builder_url->data;
}

function get_builder_path(){
	$file = '/var/www/html/cpb_uat/wp-content/api/builder_url.txt';
	$openFile = fopen($file, "r") or die("Unable to open builder_url.txt");
	$readFile = fgets($openFile);
	fclose($openFile);
	$builder_url = json_decode($readFile);

	return $builder_url->data;
}

/**
* step 1 get sz api token
*/
function get_token(){
	$file = '/var/www/html/cpb_uat/wp-content/api/output_token.txt';
	$openFile = fopen($file, "r") or die("Unable to open output_token.txt");
	$covertJson = fgets($openFile);
	fclose($openFile);
	$jsonData = json_decode($covertJson);
	$token_id = $jsonData->data->access_token;

	return "bearer " . $token_id;
}
