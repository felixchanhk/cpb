<?php
/*
 * Custom the function to fulfill project requirment
 * author: felixchan
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

include('connect_sz_api.php');

function cw_change_product_html( $price_html, $product ) {
 if ( 738 === $product->id ) {
 	
 	$price_html = '<span class="amount" >US${{finalPrice}} per Unit</span>';
 }
 
 return $price_html;
}

add_filter( 'woocommerce_get_price_html', 'cw_change_product_html', 10, 2 );


function woocommerce_pj_update_price() {

    $target_product_id = 738; //Product ID

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {

        if ($cart_item['data']->get_id() == $target_product_id) {            
        
        	$L = $cart_item['nLength'];
            $W = $cart_item['nWidth'];
            $H = $cart_item['nHeight'];
        
        	$eL = $cart_item['iEditLength'];
            $eW = $cart_item['iEditWidth'];
            $eH = $cart_item['iEditHeight'];
                        
            $typeL;
            $typeW;
            $typeL2;
            $typeW2;
            $machineType;
        
        	if(!empty($L)){
                if($L <= (349.5 - $W ) && $H <= (424 - 0.5 * $W) ){
                   $typeL = 2 * $L + 2 * $W + 19.5 + 6;
                   $typeW = 0.5 * $W + $H + 65 + 6;
                   if($typeL <= 438 && $typeW <= 317){
                      $machineType = 'HP5500';
                   }else{
                      $machineType = 'HP10000';
                   }
                }else{
                      $typeL2 = $L + $W + 19.5 + 6;
                      $typeW2 = 0.5 * $W + $H + 65 + 6;
                      $machineType = 'HP10000L';
                }
            }else{
            	if($eL <= (349.5 - $eW ) && $eH <= (424 - 0.5 * $eW) ){
                   $typeL = 2 * $eL + 2 * $eW + 19.5 + 6;
                   $typeW = 0.5 * $eW + $eH + 65 + 6;
                   if($typeL <= 438 && $typeW <= 317){
                      $machineType = 'HP5500';
                   }else{
                      $machineType = 'HP10000';
                   }
                }else{
                      $typeL2 = $eL + $eW + 19.5 + 6;
                      $typeW2 = 0.5 * $eW + $eH + 65 + 6;
                      $machineType = 'HP10000L';
                }
            }
        
            
                        
            $templateModel;
            if($machineType === 'HP5500'){
               if($typeW <= 317 ){
                  $templateModel = 'HP5500B1S';
               }else{
                  $templateModel = 'HP5500B1H';
               }
            }else if($machineType === 'HP10000'){
               if($typeW <= 495){
                  $templateModel = 'HP10000B1S';
               }else{
                  $templateModel = 'HP10000B1H';
               }
           	}else if($machineType === 'HP10000L'){
               if($typeW2 <= 495){
                  $templateModel = 'HP10000B2S';
               }else{
                  $templateModel = 'HP10000B2H';
               }
            }
                        
                        
            $priceType;
            if($templateModel === 'HP5500B1S' || $templateModel === 'HP5500B1H'){
                 $priceType = 'A';
            }else if($templateModel === 'HP10000B1S' || $templateModel === 'HP10000B1H'){
                 $priceType = 'B';
            }else if($templateModel === 'HP10000B2S' || $templateModel === 'HP10000B2H'){
                 $priceType = 'C';
            }
                    
            $qty = $cart_item['quantity'];
        
            
            if($priceType === 'A'){
                        	if($qty < 10){
                            	$cart_item['data']->set_price(4.10);
                            }else if($qty >= 10 && $qty< 50){
                            	$cart_item['data']->set_price(2.75);
                            }else if($qty >= 50 && $qty< 100){
                            	$cart_item['data']->set_price(2.50);
                            }else if($qty >= 100 && $qty< 200){
                            	$cart_item['data']->set_price(2.35);
                            }else if($qty >= 200 && $qty< 300){
                            	$cart_item['data']->set_price(2.20);
                            }else if($qty >= 300 && $qty< 400){
                            	$cart_item['data']->set_price(2.10);
                            }else if($qty >= 400 && $qty< 500){
                            	$cart_item['data']->set_price(2.00);
                            }else if($qty >= 500 && $qty< 1000){
                            	$cart_item['data']->set_price(1.95);
                            }else if($qty >= 1000){
                            	$cart_item['data']->set_price(1.85);
                            }
                       	}else if($priceType === 'B'){
                          	if($qty < 10){
                            	$cart_item['data']->set_price(4.50);
                            }else if($qty >= 10 && $qty< 50){
                            	$cart_item['data']->set_price(3.50);
                            }else if($qty >= 50 && $qty< 100){
                            	$cart_item['data']->set_price(3.00);
                            }else if($qty >= 100 && $qty< 200){
                            	$cart_item['data']->set_price(2.85);
                            }else if($qty >= 200 && $qty< 300){
                            	$cart_item['data']->set_price(2.75);
                            }else if($qty >= 300 && $qty< 400){
                            	$cart_item['data']->set_price(2.55);
                            }else if($qty >= 400 && $qty< 500){
                            	$cart_item['data']->set_price(2.50);
                            }else if($qty >= 500 && $qty< 1000){
                            	$cart_item['data']->set_price(2.40);
                            }else if($qty >= 1000){
                            	$cart_item['data']->set_price(2.30);
                            }
                        }else if($priceType === 'C'){
                        	if($qty < 10){
                            	$cart_item['data']->set_price(6.80);
                            }else if($qty >= 10 && $qty< 50){
                            	$cart_item['data']->set_price(5.10);
                            }else if($qty >= 50 && $qty< 100){
                            	$cart_item['data']->set_price(4.70);
                            }else if($qty >= 100 && $qty< 200){
                            	$cart_item['data']->set_price(4.25);
                            }else if($qty >= 200 && $qty< 300){
                            	$cart_item['data']->set_price(3.95);
                            }else if($qty >= 300 && $qty< 400){
                            	$cart_item['data']->set_price(3.55);
                            }else if($qty >= 400 && $qty< 500){
                            	$cart_item['data']->set_price(3.45);
                            }else if($qty >= 500 && $qty< 1000){
                            	$cart_item['data']->set_price(3.35);
                            }else if($qty >= 1000){
                            	$cart_item['data']->set_price(3.15);
                            }
                        }
                        
        }   
    }
}

add_action('woocommerce_before_calculate_totals', 'woocommerce_pj_update_price', 99);

/**
 * Product Information Details Page.
 */
function cpb_output_custom_field() {
    global $product;
	$id = $product->get_id();

    if ($id === 738 || $id === 3036) {  
    	if ($id === 738){ 
    ?>
	<table class="table table-bordered desktop-table" v-if="finalPriceType == 'A'">
                <tbody>
                    <tr class="price-table-tr">
                        <td>Quantity</td>
                        <td>1-9</td>
                        <td>10-49</td>
                        <td>50-99</td>
                        <td>100-199</td>
                        <td>200-299</td>
                        <td>300-399</td>
                        <td>400-499</td>
                        <td>500-999</td>
                        <td>above 1000</td>
                    </tr>
                    <tr>
                        <td>Price(unit)</td>
                        <td>US$4.10</td>
                        <td>US$2.75</td>
                        <td>US$2.50</td>
                        <td>US$2.35</td>
                        <td>US$2.20</td>
                        <td>US$2.10</td>
                        <td>US$2.00</td>
                        <td>US$1.95</td>
                        <td>US$1.85</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered" v-if="finalPriceType == 'B'">
                <tbody>
                    <tr class="price-table-tr">
                        <td>Quantity</td>
                        <td>1-9</td>
                        <td>10-49</td>
                        <td>50-99</td>
                        <td>100-199</td>
                        <td>200-299</td>
                        <td>300-399</td>
                        <td>400-499</td>
                        <td>500-999</td>
                        <td>above 1000</td>
                    </tr>
                    <tr>
                        <td>Price(unit)</td>
                        <td>US$4.50</td>
                        <td>US$3.50</td>
                        <td>US$3.00</td>
                        <td>US$2.85</td>
                        <td>US$2.75</td>
                        <td>US$2.50</td>
                        <td>US$2.50</td>
                        <td>US$2.40</td>
                        <td>US$2.30</td>
                    </tr>
                </tbody>
            </table>

            <table class="table table-bordered" v-if="finalPriceType == 'C'">
                <tbody>
                    <tr class="price-table-tr">
                        <td>Quantity</td>
                        <td>1-9</td>
                        <td>10-49</td>
                        <td>50-99</td>
                        <td>100-199</td>
                        <td>200-299</td>
                        <td>300-399</td>
                        <td>400-499</td>
                        <td>500-999</td>
                        <td>above 1000</td>
                    </tr>
                    <tr>
                        <td>Price(unit)</td>
                        <td>US$6.80</td>
                        <td>US$5.10</td>
                        <td>US$4.70</td>
                        <td>US$4.25</td>
                        <td>US$3.95</td>
                        <td>US$3.55</td>
                        <td>US$3.45</td>
                        <td>US$3.35</td>
                        <td>US$3.15</td>
                    </tr>
                </tbody>
            </table>

	<a href="#0" class="cpb-cd-popup-trigger">Price Table</a>

        <div class="cpb-cd-popup" role="alert">
            <div class="cpb-cd-popup-container">
                 <table class="table table-bordered mobile-table">
                    <tbody v-if="finalPriceType == 'A'">
                        <tr class="price-table-tr">
                            <td>Quantity</td>
                            <td>Price(unit)</td>
                        </tr>
                        <tr>
                            <td>1-9</td>
                            <td>US$4.10</td>
                        </tr>
                        <tr>
                            <td>10-49</td>
                            <td>US$2.75</td>
                        </tr>
                        <tr>
                            <td>50-99</td>
                            <td>US$2.50</td>
                        </tr>
                        <tr>
                            <td>100-199</td>
                            <td>US$2.35</td>
                        </tr>
                        <tr>
                            <td>200-299</td>
                            <td>US$2.20</td>
                        </tr>
                        <tr>
                            <td>300-399</td>
                            <td>US$2.10</td>
                        </tr>
                        <tr>
                            <td>400-499</td>
                            <td>US$2.00</td>
                        </tr>
                        <tr>
                            <td>500-999</td>
                            <td>US$1.95</td>
                        </tr>
                        <tr>
                            <td>above 1000</td>
                            <td>US$1.85</td>
                        </tr>
                    </tbody>
                 	<tbody v-if="finalPriceType == 'B'">
                    <tr class="price-table-tr">
                            <td>Quantity</td>
                            <td>Price(unit)</td>
                        </tr>
                        <tr>
                            <td>1-9</td>
                            <td>US$4.50</td>
                        </tr>
                        <tr>
                            <td>10-49</td>
                            <td>US$3.50</td>
                        </tr>
                        <tr>
                            <td>50-99</td>
                            <td>US$3.00</td>
                        </tr>
                        <tr>
                            <td>100-199</td>
                            <td>US$2.85</td>
                        </tr>
                        <tr>
                            <td>200-299</td>
                            <td>US$2.75</td>
                        </tr>
                        <tr>
                            <td>300-399</td>
                            <td>US$2.50</td>
                        </tr>
                        <tr>
                            <td>400-499</td>
                            <td>US$2.50</td>
                        </tr>
                        <tr>
                            <td>500-999</td>
                            <td>US$2.4</td>
                        </tr>
                        <tr>
                            <td>above 1000</td>
                            <td>US$2.3</td>
                        </tr>
                 </tbody>
                 <tbody v-if="finalPriceType == 'C'">
                    <tr class="price-table-tr">
                            <td>Quantity</td>
                            <td>Price(unit)</td>
                        </tr>
                        <tr>
                            <td>1-9</td>
                            <td>US$6.80</td>
                        </tr>
                        <tr>
                            <td>10-49</td>
                            <td>US$5.10</td>
                        </tr>
                        <tr>
                            <td>50-99</td>
                            <td>US$4.70</td>
                        </tr>
                        <tr>
                            <td>100-199</td>
                            <td>US$4.25</td>
                        </tr>
                        <tr>
                            <td>200-299</td>
                            <td>US$3.95</td>
                        </tr>
                        <tr>
                            <td>300-399</td>
                            <td>US$3.55</td>
                        </tr>
                        <tr>
                            <td>400-499</td>
                            <td>US$3.45</td>
                        </tr>
                        <tr>
                            <td>500-999</td>
                            <td>US$3.35</td>
                        </tr>
                        <tr>
                            <td>above 1000</td>
                            <td>US$3.15</td>
                        </tr>
                	</tbody>
                </table>
            	
                <a href="#0" class="cpb-cd-popup-close img-replace"> </a>
            </div> <!-- cpb-cd-popup-container -->
        </div> <!-- cpb-cd-popup -->
	<?php }?>
	
	<?php if($id === 3036){?>
    <div class="form-group">
        <label for="iPrint1"><h5>Print</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPrint1" name="nPrint" value="Full Color Print" checked><label class="cpb_radio" for="iPrint1" >Full Color Print</label>
        <input type="radio" class="form-control cpb_radio" id="iPrint2" name="nPrint" value="Plain-No Print"><label class="cpb_radio" for="iPrint2" >Plain-No Print</label>
    </div>
	<div class="form-group">
        <label for="iPaperType"><h5>Paper Type</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPaperType" name="nPaperType" value="Art paper + Paperboard" checked><label class="cpb_radio" for="iPaperType" >Art paper + Paperboard</label>
    </div>
    <div class="form-group">
        <label for="iFinish1"><h5>Finishing</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iFinish1" name="nFinish" value="Matt" checked><label class="cpb_radio" for="iFinish1" >Matte</label>
        <input type="radio" class="form-control cpb_radio" id="iFinish2" name="nFinish" value="Gloss"><label class="cpb_radio" for="iFinish2" >Gloss</label>
    </div>
	<div class="cpb-upload-image-wine-box">
        <label>UPLOAD YOUR ARTWORK</label>
        <input type="file" name="cpb_file" id="file" onchange="readURL(this);" required/><br />
    </div>
	<?php }?>
	
	<!-- shopping bag form -->
	<?php if($id === 738){?>
	<div class="form-group">
        <label for="iPrint1"><h5>Print</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPrint1" name="nPrint" value="Full Color Print" checked><label class="cpb_radio" for="iPrint1" >Full Color Print</label>
        <input type="radio" class="form-control cpb_radio" id="iPrint2" name="nPrint" value="Plain-No Print"><label class="cpb_radio" for="iPrint2" >Plain-No Print</label>
    </div>
    <div class="form-group">
        <label for="iPaperType"><h5>Paper Type</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPaperType" name="nPaperType" value="190g Card Stock" checked><label class="cpb_radio" for="iPaperType" >190g Card Stock</label>
    </div>
    <div class="form-group">
        <label for="iFinish1"><h5>Finishing</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iFinish1" name="nFinish" value="Matt" checked><label class="cpb_radio" for="iFinish1" >Matte</label>
        <input type="radio" class="form-control cpb_radio" id="iFinish2" name="nFinish" value="Gloss"><label class="cpb_radio" for="iFinish2" >Gloss</label>
    </div>
    <div class="form-group">
        <label for="iHandleType1"><h5>Handle Type</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iHandleType1" name="nHandleType" value="Ploypropylene" checked><label class="cpb_radio" for="iHandleType1" >Polypropylene(PP)</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleType2" name="nHandleType" value="Cotton"><label class="cpb_radio" for="iHandleType2" >Cotton</label>
    </div>
    <div class="form-group">
        <label for="iHandleColor1"><h5>Handle Color</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iHandleColor1" name="nHandleColor" value="Black" checked><label class="cpb_radio" for="iHandleColor1" >Black</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleColor2" name="nHandleColor" value="Brown"><label class="cpb_radio" for="iHandleColor2" >Brown</label>
    </div>
    <div class="form-group hidden-HandleLength">
        <input type="hidden" class="form-control cpb_radio" id="iHandleLength1" name="nHandleLength" value="450mm One Side">
    </div>
    <div class="form-group">
        <label for="iLength"><h5>Length :</h5></label>
        <input v-model="vLength" type="text" class="form-control cpb_number" id="iLength" name="nLength" placeholder="100mm - 400mm" onchange="check_not_null()" required>
        <a href="javascript:void(0)" data-toggle="popover" data-content="The length is the measurement of your box from left to right.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a><br>
    	<span id="check_length" style="color:grey;font-size: smaller;">Length must be between 100mm and 400mm.</span>
    </div>
    <div class="form-group">
        <label for="iWidth"><h5>Width :</h5></label>
        <input v-model="vWidth" type="text" class="form-control cpb_number" id="iWidth" name="nWidth" placeholder="40mm - 200mm" onchange="check_not_null()" required>
        <a href="javascript:void(0)" data-toggle="popover" data-content="The width is the measurement of your box from front to back.Be sure to add a minimum of 40mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a><br>
    	<span id="check_width" style="color:grey;font-size: smaller;">Width must be between 40mm and 200mm.</span>
    </div>
    <div class="form-group">
        <label for="iHeight"><h5>Height :</h5></label>
        <input v-model="vHeight" type="text" class="form-control cpb_number" id="iHeight" name="nHeight" placeholder="100mm - 450mm" onchange="check_not_null()" required>
        <a href="javascript:void(0)" data-toggle="popover" data-content="The depth is the measurement of your box from top to bottom.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a><br>
    	<span id="check_height" style="color:grey;font-size: smaller;">Height must be between 100mm and 450mm.</span>
    </div>
	<p class="cpb_notes">Notes: Length can range between 100 and 400mm and width can range between 40 and 200mm and height can range between 100 and 450mm.</p>
    <div class="cpb_upload_image">
        <label>UPLOAD YOUR ARTWORK</label>
        <input type="file" name="cpb_file" id="file" onchange="readURL(this);" required/><br />
    </div>
	<?php }
    }
}

add_action('woocommerce_before_add_to_cart_quantity', 'cpb_output_custom_field', 10);




/**
 * Add custom info to cart item.
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
    
	$iEditPrint = filter_input(INPUT_GET, 'iEditPrint');
	$iEditPaperType = filter_input(INPUT_GET, 'iEditPaperType');
	$iEditFinish = filter_input(INPUT_GET, 'iEditFinish');
	$iEditHandleType = filter_input(INPUT_GET, 'iEditHandleType');
	$iEditHandleColor = filter_input(INPUT_GET, 'iEditHandleColor');
	$iEditHandleLength = filter_input(INPUT_GET, 'iEditHandleLength');
	$iEditLength = filter_input(INPUT_GET, 'iEditLength');
	$iEditWidth = filter_input(INPUT_GET, 'iEditWidth');	
	$iEditHeight = filter_input(INPUT_GET, 'iEditHeight');

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
    	$cart_item_data['iEditPrint'] = $iEditPrint;
    	$cart_item_data['iEditPaperType'] = $iEditPaperType;
    	$cart_item_data['iEditFinish'] = $iEditFinish;
    	$cart_item_data['iEditHandleType'] = $iEditHandleType;
    	$cart_item_data['iEditHandleColor'] = $iEditHandleColor;
    	$cart_item_data['iEditHandleLength'] = $iEditHandleLength;
    	$cart_item_data['iEditLength'] = $iEditLength;
    	$cart_item_data['iEditWidth'] = $iEditWidth;
    	$cart_item_data['iEditHeight'] = $iEditHeight;
    	$cart_item_data['iPreviewImage'] = '<a href="'.get_home_url().'/file/file/composingPreview/'.get_order_preview_image().'" target="_blank" title="click here to preview"><img class="cpb-preview-img" src="'.get_home_url().'/file/file/composingPreview/'.get_order_preview_image().'" width="95%" height="auto"/></a>';
    }
    
    return $cart_item_data;
}

add_filter('woocommerce_add_cart_item_data', 'cpb_add_custom_field_to_cart_item', 10, 3);


//thumbnail image
function custom_new_product_image( $_product_img, $cart_item, $cart_item_key ) {

	//$product_id = $cart_item['product_id'];

		// for upload image function
        if(!empty($cart_item['ncpb_file'])) {
    	$allowed = array('gif','png' ,'jpg','svg');
    	$ext = pathinfo($cart_item['ncpb_file'], PATHINFO_EXTENSION);
    	if(in_array($ext,$allowed) ) {
    		$a = '<img src="'.get_home_url().'/cpb_die_cut_upload/'.$cart_item['ncpb_file'].'" />';
		}else{
    		$a = '<img src="'.get_home_url().'/wp-content/uploads/2017/11/shopping-bag-white-mock-up-1.jpg" alt="'.$ext.'"/>';
        }
    }else{
    	$a = '<img src="'.get_home_url().'/wp-content/uploads/2017/11/shopping-bag-white-mock-up-1.jpg" />';
    }
    return $a;
}


add_filter( 'woocommerce_cart_item_thumbnail', 'custom_new_product_image', 10, 3);



/**
 * Display custom info in the cart.
 *
 * @param array $item_data
 * @param array $cart_item
 *
 * @return array
 */
function cpb_display_custom_text_cart($item_data, $cart_item) {
    if (!empty($cart_item['nPrint']))
        $item_data[] = array('key' => __('Print', 'somalite'), 'value' => wc_clean($cart_item['nPrint']), 'display' => '');
	if (!empty($cart_item['nPaperType']))
        $item_data[] = array('key' => __('Paper Type', 'somalite'), 'value' => wc_clean($cart_item['nPaperType']), 'display' => '');
	if (!empty($cart_item['nFinish']))
        $item_data[] = array('key' => __('Finishing', 'somalite'), 'value' => wc_clean($cart_item['nFinish']), 'display' => '');
	if (!empty($cart_item['nHandleType']))
        $item_data[] = array('key' => __('Handle Type', 'somalite'), 'value' => wc_clean($cart_item['nHandleType']), 'display' => '');
	if (!empty($cart_item['nHandleColor']))
        $item_data[] = array('key' => __('Handle Color', 'somalite'), 'value' => wc_clean($cart_item['nHandleColor']), 'display' => '');
	if (!empty($cart_item['nHandleLength']))
        $item_data[] = array('key' => __('Handle Length', 'somalite'), 'value' => wc_clean($cart_item['nHandleLength']), 'display' => '');
	if (!empty($cart_item['nLength']))
        $item_data[] = array('key' => __('Length', 'somalite'), 'value' => wc_clean($cart_item['nLength']), 'display' => '');
	if (!empty($cart_item['nWidth']))
        $item_data[] = array('key' => __('Width', 'somalite'), 'value' => wc_clean($cart_item['nWidth']), 'display' => '');
	if (!empty($cart_item['nHeight']))
        $item_data[] = array('key' => __('Height', 'somalite'), 'value' => wc_clean($cart_item['nHeight']), 'display' => '');
	if (!empty($cart_item['ncpb_file']))
        $item_data[] = array('key' => __('Upload file', 'somalite'), 'value' => wc_clean($cart_item['ncpb_file']), 'display' => '');
    	
    if(!empty($cart_item['iEditPrint'])){
    	
    	$item_data[] = array('key' => __('Print', 'somalite'), 'value' => wc_clean($cart_item['iEditPrint']), 'display' => '');
    	$item_data[] = array('key' => __('PaperType', 'somalite'), 'value' => wc_clean($cart_item['iEditPaperType']), 'display' => '');
    	$item_data[] = array('key' => __('Finishing', 'somalite'), 'value' => wc_clean($cart_item['iEditFinish']), 'display' => '');
    	$item_data[] = array('key' => __('HandleType', 'somalite'), 'value' => wc_clean($cart_item['iEditHandleType']), 'display' => '');
    	$item_data[] = array('key' => __('HandleColor', 'somalite'), 'value' => wc_clean($cart_item['iEditHandleColor']), 'display' => '');
    	$item_data[] = array('key' => __('HandleLength', 'somalite'), 'value' => wc_clean($cart_item['iEditHandleLength']), 'display' => '');
    	$item_data[] = array('key' => __('Length', 'somalite'), 'value' => wc_clean($cart_item['iEditLength']), 'display' => '');
    	$item_data[] = array('key' => __('Width', 'somalite'), 'value' => wc_clean($cart_item['iEditWidth']), 'display' => '');
    	$item_data[] = array('key' => __('Height', 'somalite'), 'value' => wc_clean($cart_item['iEditHeight']), 'display' => '');
        $item_data[] = array('key' => __('Preview Image', 'somalite'), 'value' => $cart_item['iPreviewImage'], 'display' => '');
    	
        return $item_data;
    }

    return $item_data;
}

add_filter('woocommerce_get_item_data', 'cpb_display_custom_text_cart', 10, 2);

/**
 * Add custom info to order.
 *
 * @param WC_Order_Item_Product $item
 * @param string                $cart_item_key
 * @param array                 $values
 * @param WC_Order              $order
 */
function cpb_add_custom_text_to_order_items($item, $cart_item_key, $values, $order) {
    if (!empty($values['nPrint'])) {
        $item->add_meta_data(__('Print', 'somalite'), $values['nPrint']);
    	$item->add_meta_data(__('Paper Type', 'somalite'), $values['nPaperType']);
    	$item->add_meta_data(__('Finish', 'somalite'), $values['nFinish']);
    	$item->add_meta_data(__('Handle Type', 'somalite'), $values['nHandleType']);
    	$item->add_meta_data(__('Handle Color', 'somalite'), $values['nHandleColor']);
    	$item->add_meta_data(__('Handle Length', 'somalite'), $values['nHandleLength']);
    	$item->add_meta_data(__('Length', 'somalite'), $values['nLength']);
    	$item->add_meta_data(__('Width', 'somalite'), $values['nWidth']);
    	$item->add_meta_data(__('Height', 'somalite'), $values['nHeight']);
    	$item->add_meta_data(__('Upload File', 'somalite'), $values['ncpb_file']);
    }else{
    	$item->add_meta_data(__('Print', 'somalite'), $values['iEditPrint']);
    	$item->add_meta_data(__('PaperType', 'somalite'), $values['iEditPaperType']);
    	$item->add_meta_data(__('Finish', 'somalite'), $values['iEditFinish']);
    	$item->add_meta_data(__('HandleType', 'somalite'), $values['iEditHandleType']);
    	$item->add_meta_data(__('HandleColor', 'somalite'), $values['iEditHandleColor']);
    	$item->add_meta_data(__('HandleLength', 'somalite'), $values['iEditHandleLength']);
    	$item->add_meta_data(__('Length', 'somalite'), $values['iEditLength']);
    	$item->add_meta_data(__('Width', 'somalite'), $values['iEditWidth']);
    	$item->add_meta_data(__('Height', 'somalite'), $values['iEditHeight']);
    	$item->add_meta_data(__('Preview Image', 'somalite'), $values['iPreviewImage']);
    
    }
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

	global $product;

	$id = $product->get_id();

    if ($id === 738 || $id === 3036) {

    $terms_post = get_the_terms($post->cat_ID, 'product_cat');
    foreach ($terms_post as $term_cat) {
        $term_cat_id = $term_cat->term_id;
    }

    $form_html = '<div class="container cpb_form"><div class="cpb_chioce_line">';
    
	if($id === 738){
		$form_html .= '<form class="form-inline cpb_edit_online" name="cpb_edit_online" method="get" action="' . get_home_url() . '/cpb-shopping-bag-builder/" onsubmit="return cpb_validateForm();">
	    <input type="hidden" id="iEditPrint" name="iEditPrint">
	    <input type="hidden" id="iEditPaperType" name="iEditPaperType">
	    <input type="hidden" id="iEditFinish" name="iEditFinish">
	    <input type="hidden" id="iEditHandleType" name="iEditHandleType">
	    <input type="hidden" id="iEditHandleColor" name="iEditHandleColor">
	    <input type="hidden" id="iEditHandleLength" name="iEditHandleLength">
	    <input type="hidden" id="iEditLength" name="iEditLength">
	    <input type="hidden" id="iEditWidth" name="iEditWidth">
	    <input type="hidden" id="iEditHeight" name="iEditHeight">
	    <input type="hidden" id="iEditQty" name="iEditQty">';

		if ($term_cat_id == 20) {
    	    $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline" onclick="edit_online(); "/></form><p class="cpb_or_text">- OR -</p>';
    	} else {
   		     $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline" onclick="edit_online();"/></form><p class="cpb_or_text">- OR -</p>';
    	}
    }

    if($id === 738){	
    $form_html .= '<a class="download_diecut" href="' . get_template_directory_uri() . '/download_source/MDSB7569-001-01.pdf" target="_blank" download><button class="download_diecut_link">Download Diecut</button></a><br>';
    }else if($id === 3036){
    $form_html .= '<a class="download_diecut" href="' . get_template_directory_uri() . '/download_source/WP7685-001-01.pdf" target="_blank" download><button class="download_diecut_link">Download Diecut</button></a><br>';
    }
    
    $form_html .= '<p class="cpb_reminder_text">We provide dieline templates to our registered member for free download. If you are a more advanced user, download your custom die line and edit offline with Adobe® Illustrator® then upload your finished artwork.<p><a class="cpb_delivery_options" href="' .  get_home_url() . '/shipping-and-devlivery/" target="_blank">See delivery options>></a></div></div>';
	
	$form_html .= '<a class="cpb_custome_qoute" href="' .  get_home_url() . '/contact-us/">Custom Qoute</a>';

    echo $form_html;
    }
}

add_action('woocommerce_share', 'edit_online_now_link', 50);



function cpb_upload_die_cut() {

    $form_html = '<img id="cpb_preview_img" src="" style="display:none;"/>';

    echo $form_html;
}

add_action('woocommerce_product_thumbnails', 'cpb_upload_die_cut', 90);




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
    $return_string .= '<iframe src="http://customprintbox.com/whitelabel-site/h5builder/shoppingBag/pc/4/en/index.html?webId=41&productId='.$pId.'&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
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

//新增至佈景主題中
add_action('init', 'register_builder_shoppingbag_shortcodes'); /* 文章頁面 */
add_action('init', 'register_invitation_cardshortcodes'); /* 文章頁面 */
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



/**
 * AUTO COMPLETE PAID ORDERS IN WOOCOMMERCE
 *
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_paid_order', 90, 1 );
function custom_woocommerce_auto_complete_paid_order( $order_id ) {
  if ( ! $order_id )
    return;

  $order = wc_get_order( $order_id );

  // No updated status for orders delivered with Bank wire, Cash on delivery and Cheque payment methods.
  if ( ( 'bacs' == get_post_meta($order_id, '_payment_method', true) ) || ( 'cod' == get_post_meta($order_id, '_payment_method', true) ) || ( 'cheque' == get_post_meta($order_id, '_payment_method', true) ) ) {
    return;
  } 
  // "completed" updated status for paid Orders with all others payment methods
  else {
    $order->update_status( 'completed' );
  }
}
/