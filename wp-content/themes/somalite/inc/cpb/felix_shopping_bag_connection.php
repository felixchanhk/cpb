<?php

// Change the add to cart button INTO View Product button
// =================================================================================================================

add_filter( 'woocommerce_loop_add_to_cart_link', 'add_product_link' );
function add_product_link( $link ) {
global $product;
    echo '<form action="' . esc_url( $product->get_permalink( $product->id ) ) . '" method="get">
            <button type="submit" class="button add_to_cart_button product_type_simple">' . __('View Product', 'woocommerce') . '</button>
          </form>';
}


function cw_change_product_html( $price_html, $product ) {
	$current_rel_uri = add_query_arg( NULL, NULL );

	if ( 738 === $product->id ) {
 	
 		if($current_rel_uri === '/cpb_uat/product/custom-retail-shopping-bags/matte-gloss-laminated-custom-retail-paper-shopping-bags/'){
        		$price_html = '<span class="amount" >US${{finalPrice}} per Unit</span>';
    	}else{
    			$price_html = '<span class="amount-test" >$1.85</span>';
    	}
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
	$sku = $product->get_sku();

    if ($sku === 'MDSB7569' || $sku === 'bag001' || $sku === 'bag002' || $sku === 'WP7685') {  
    	echo felix_shipping_cost_table();
    ?>	
	<?php if($sku === 'WP7685'){?>
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
	<?php if($sku === 'MDSB7569' || $sku === 'bag001' || $sku === 'bag002'){?>
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
        <label class="cpb_upload_img_artwork" >UPLOAD YOUR ARTWORK</label>
        <input type="file" name="cpb_file" id="file" onchange="readURL(this);" required/><br />
    </div>
	<?php }
    }
}

add_action('woocommerce_before_add_to_cart_quantity', 'cpb_output_custom_field', 10);

function felix_shipping_cost_table(){
	global $product;
	$sku = $product->get_sku();
	if ($sku === 'MDSB7569' || $sku === 'bag001' || $sku === 'bag002')
	$shipping_table = '<table class="table table-bordered desktop-table" v-if="finalPriceType == \'A\' ">
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

            <table class="table table-bordered" v-if="finalPriceType == \'B\'">
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

            <table class="table table-bordered" v-if="finalPriceType == \'C\'">
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
                    <tbody v-if="finalPriceType == \'A\'">
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
                 	<tbody v-if="finalPriceType == \'B\'">
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
                 <tbody v-if="finalPriceType == \'C\'">
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
            </div>
        </div>';

	return $shipping_table;
}


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
    	$cart_item_data['iPreviewImage'] = '<a href="http://47.74.226.159/file/file/composingPreview/'.get_order_preview_image().'" target="_blank" title="click here to preview"><img class="cpb-preview-img" src="http://47.74.226.159/file/file/composingPreview/'.get_order_preview_image().'" width="95%" height="auto"/></a>';
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

	$sku = $product->get_sku();

    if ($sku === 'MDSB7569' || $sku === 'WP7685') {

    	$terms_post = get_the_terms($post->cat_ID, 'product_cat');
    	foreach ($terms_post as $term_cat) {
      	  $term_cat_id = $term_cat->term_id;
    	}

    $form_html = '<div class="container cpb_form"><div class="cpb_chioce_line">';
    
	if($sku === 'MDSB7569'){
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
    	    $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline" onclick="edit_online(); "/></form><br><p class="cpb_or_text">- OR -</p><br><br>';
    	} else {
   		     $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline" onclick="edit_online();"/></form><br><p class="cpb_or_text">- OR -</p><br><br>';
    	}
    }else if($sku === 'WP7685'){//@TODO
		$form_html .= '<form class="form-inline cpb_edit_online" name="cpb_edit_online" method="get" action="http://47.74.226.159/cpb_builder_uat/product/uncategorized/wine-box/">
	    <input type="hidden" id="iEditQty" name="iEditQty">';
		$form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline"/></form><br><p class="cpb_or_text">- OR -</p><br><br>';
    }

    if($sku === 'MDSB7569'){	
    $form_html .= '<a class="download_diecut" href="http://47.52.24.242/GenFormat/GenSVG/StandardName/DRD008182FrontBuilder01/Palette/All/Length/110/Width/100/Depth/150/" target="_blank" download><button class="download_diecut_link">Download Diecut</button></a><br>';
    $form_html .= '<a class="cpb_delivery_options" href="' .  get_home_url() . '/shipping-and-devlivery/" target="_blank">See delivery options>></a>';
    $form_html .= '<p class="cpb_reminder_text">We provide dieline templates to our registered member for free download. If you are a more advanced user, download your custom die line and edit offline with Adobe® Illustrator® then upload your finished artwork.<p></div></div>';
    $form_html .= '<a class="cpb_custome_qoute" href="' .  get_home_url() . '/contact-us/">Custom Qoute</a>';
    
    }else if($sku === 'WP7685'){
    $form_html .= '<a class="download_diecut" href="' . get_template_directory_uri() . '/download_source/WP7685-001-01.pdf" target="_blank" download><button class="download_diecut_link">Download Diecut</button></a><br>';
    $form_html .= '<a class="cpb_winebox_delivery_options" href="' .  get_home_url() . '/shipping-and-devlivery/" target="_blank">See delivery options>></a>';
    $form_html .= '<p class="cpb_winebox_reminder_text">We provide dieline templates to our registered member for free download. If you are a more advanced user, download your custom die line and edit offline with Adobe® Illustrator® then upload your finished artwork.<p></div></div>';	
    $form_html .= '<a class="cpb_winebox_custome_qoute" href="' .  get_home_url() . '/contact-us/">Custom Qoute</a>';
    
    }

    	echo $form_html;
    }
}

add_action('woocommerce_share', 'edit_online_now_link', 50);



function cpb_upload_die_cut() {

    $form_html = '<img id="cpb_preview_img" src="" style="display:none;"/>';

    echo $form_html;
}

add_action('woocommerce_product_thumbnails', 'cpb_upload_die_cut', 90);



