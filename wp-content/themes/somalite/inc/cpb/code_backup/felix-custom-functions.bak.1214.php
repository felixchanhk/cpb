<?php
/*
 * Custom the function to fulfill project requirment
 * author: felixchan
 */

include('connect_sz_api.php');

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
    </div>
    <div class="form-group">
        <label for="iPaperType"><h5>Paper Type</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iPaperType" name="nPaperType" value="190g Card Stock" checked><label class="cpb_radio" for="iPaperType" >190g Card Stock</label>
    </div>
    <div class="form-group">
        <label for="iFinish1"><h5>Finishing</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iFinish1" name="nFinish" value="Matt" checked><label class="cpb_radio" for="iFinish1" >Matt</label>
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
    <div class="form-group">
        <label for="iHandleLength1"><h5>Handle Length</h5></label>
        <input type="radio" class="form-control cpb_radio" id="iHandleLength1" name="nHandleLength" value="450mm One Side" checked><label class="cpb_radio" for="iHandleLength1" >450mm (One Side)</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleLength2" name="nHandleLength" value="500mm One Side"><label class="cpb_radio" for="iHandleLength2" >500mm (One Side)</label>
        <input type="radio" class="form-control cpb_radio" id="iHandleLength3" name="nHandleLength" value="550mm One Side"><label class="cpb_radio" for="iHandleLength3" >550mm (One Side)</label>
    </div>
    <div class="form-group">
        <label for="iLength"><h5>Length :</h5></label>
        <input type="text" class="form-control cpb_number" id="iLength" name="nLength" value="259" placeholder="100mm - 400mm" ng-model="nLength" required>
        <a href="javascript:void(0)" data-toggle="popover" data-content="The length is the measurement of your box from left to right.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div>
    <div class="form-group">
        <label for="iWidth"><h5>Width :</h5></label>
        <input type="text" class="form-control cpb_number" id="iWidth" name="nWidth" value="95" placeholder="40mm - 200mm" required>
        <a href="javascript:void(0)" data-toggle="popover" data-content="The width is the measurement of your box from front to back.Be sure to add a minimum of 40mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div>
    <div class="form-group">
        <label for="iHeight"><h5>Height :</h5></label>
        <input type="text" class="form-control cpb_number" id="iHeight" name="nHeight" value="259" placeholder="100mm - 450mm" required>
        <a href="javascript:void(0)" data-toggle="popover" data-content="The depth is the measurement of your box from top to bottom.Be sure to add a minimum of 100mm to the size of your product."><i class="fa fa-question-circle-o" aria-hidden="true"></i> what is this!</a>
    </div>
	<p class="cpb_notes">Notes: Length can range between 100 and 400mm and width can range between 40 and 200mm and height can range between 100 and 450mm.</p>
    <div class="cpb_upload_image">
        <label>UPLOAD YOUR ARTWORK</label>
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
        return $cart_item_data;
    }
    
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
        $item_data[] = array('key' => __('Finishing', 'somalite'), 'value' => wc_clean($cart_item['nFinish']), 'display' => '');
        $item_data[] = array('key' => __('Handle Type', 'somalite'), 'value' => wc_clean($cart_item['nHandleType']), 'display' => '');
        $item_data[] = array('key' => __('Handle Color', 'somalite'), 'value' => wc_clean($cart_item['nHandleColor']), 'display' => '');
        $item_data[] = array('key' => __('Handle Length', 'somalite'), 'value' => wc_clean($cart_item['nHandleLength']), 'display' => '');
        $item_data[] = array('key' => __('Length', 'somalite'), 'value' => wc_clean($cart_item['nLength']), 'display' => '');
        $item_data[] = array('key' => __('Width', 'somalite'), 'value' => wc_clean($cart_item['nWidth']), 'display' => '');
        $item_data[] = array('key' => __('Height', 'somalite'), 'value' => wc_clean($cart_item['nHeight']), 'display' => '');
        $item_data[] = array('key' => __('Upload file', 'somalite'), 'value' => wc_clean($cart_item['ncpb_file']), 'display' => '');
    	
    } else {
    	
    	$item_data[] = array('key' => __('Print', 'somalite'), 'value' => wc_clean($cart_item['iEditPrint']), 'display' => '');
    	$item_data[] = array('key' => __('PaperType', 'somalite'), 'value' => wc_clean($cart_item['iEditPaperType']), 'display' => '');
    	$item_data[] = array('key' => __('Finishing', 'somalite'), 'value' => wc_clean($cart_item['iEditFinish']), 'display' => '');
    	$item_data[] = array('key' => __('HandleType', 'somalite'), 'value' => wc_clean($cart_item['iEditHandleType']), 'display' => '');
    	$item_data[] = array('key' => __('HandleColor', 'somalite'), 'value' => wc_clean($cart_item['iEditHandleColor']), 'display' => '');
    	$item_data[] = array('key' => __('HandleLength', 'somalite'), 'value' => wc_clean($cart_item['iEditHandleLength']), 'display' => '');
    	$item_data[] = array('key' => __('Length', 'somalite'), 'value' => wc_clean($cart_item['iEditLength']), 'display' => '');
    	$item_data[] = array('key' => __('Width', 'somalite'), 'value' => wc_clean($cart_item['iEditWidth']), 'display' => '');
    	$item_data[] = array('key' => __('Height', 'somalite'), 'value' => wc_clean($cart_item['iEditHeight']), 'display' => '');
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
    	$item->add_meta_data(__('Upload File', 'somalite'), '<a href="http://47.74.226.159/cpb_uat/cpb_die_cut_upload/'.$values['ncpb_file'].'" target="_blank">'.$values['ncpb_file'].'</a><br><img src="http://47.74.226.159/cpb_uat/cpb_die_cut_upload/'.$values['ncpb_file'].'" width="320px" height="180px"/>');
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

    $terms_post = get_the_terms($post->cat_ID, 'product_cat');
    foreach ($terms_post as $term_cat) {
        $term_cat_id = $term_cat->term_id;
    }

    $form_html = '<div class="container cpb_form">';

	$form_html .= '<p class="cpb_reminder_text">To get started, input your custom dimensions. After that you are ready to add artwork! Push “Edit Online Now” to the next level with our sophisticated online editor. If you are a more advanced user, download your custom die line and edit offline with Adobe® Illustrator® then upload your finished artwork. <p>';
	
	$form_html .= '<div class="cpb_chioce_line"><form class="form-inline cpb_edit_online" method="get" action="http://47.74.226.159/cpb_uat/cpb-shopping-bag-builder/">
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
        $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline" onclick="edit_online();"/></form>';
    } else {
        $form_html .= '<input type="Submit" id="cpb_submit" value="Edit Online Now" name="editOnline" onclick="edit_online();"/></form>';
    }

    $form_html .= '<p class="cpb_or_text">- OR -</p><a class="download_diecut" href="' . get_template_directory_uri() . '/download_source/MDSB7569-001-01.pdf" target="_blank" download><button class="download_diecut_link">Download Diecut</button></a>';
	
    $form_html .= '<a class="cpb_delivery_options" href="">See delivery options>></a></div></div>';
	
	$form_html .= '<a class="cpb_custome_qoute">Custom Qoute</a>';

    echo $form_html;
}

add_action('woocommerce_share', 'edit_online_now_link', 50);



function cpb_upload_die_cut() {

    $form_html = '<img id="cpb_preview_img" src="" style="display:none;"/>';

    echo $form_html;
}

add_action('woocommerce_product_thumbnails', 'cpb_upload_die_cut', 90);



//短代碼的功能
function sz_shopping_bag_builder($atts) {
    //do_action('cpb_shopping_bag_builder');
	$iEditPrint = $_GET["iEditPrint"];
	$iEditPaperType = $_GET["iEditPaperType"];
	$iEditFinish = $_GET["iEditFinish"];
	$iEditHandleType = $_GET["iEditHandleType"];
	$iEditHandleColor = $_GET["iEditHandleColor"];
	$iEditHandleLength = $_GET["iEditHandleLength"];
	$iEditLength = $_GET["iEditLength"];
	$iEditWidth = $_GET["iEditWidth"];
	$iEditHeight = $_GET["iEditHeight"];
	$iEditQty = $_GET["iEditQty"];
	$pId = dynamic_size_pId();

	$return_string = '<a class="testAddToCart" href="#"><button onclick="get_sku_productId();">Add To Cart</button></a>';
	
	//$return_string = '<a class="testAddToCart" href="?add-to-cart=738&quantity='.$iEditQty.'&iEditPrint='.$iEditPrint.'&iEditPaperType='.$iEditPaperType.'&iEditFinish='.$iEditFinish.'&iEditHandleType='.$iEditHandleType.'&iEditHandleColor='.$iEditHandleColor.'&iEditHandleLength='.$iEditHandleLength.'&iEditLength='.$iEditLength.'&iEditWidth='.$iEditWidth.'&iEditHeight='.$iEditHeight.'"><button onclick="get_sku_productId()">Add To Cart</button></a>';


    $return_string .= '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://47.74.226.159/whitelabel-site/h5builder/shoppingBag/pc/4/en/index.html?';
    $return_string .= 'webId=41&productId='.$pId.'&qty=1&status=0&ot=NEW&pid=1;" width="100%" height="900px"></iframe></div>';
    return $return_string;
}

//建立一個短代碼
function register_builder_shoppingbag_shortcodes() {
    add_shortcode('sz_builder_shoppingbag', 'sz_shopping_bag_builder');
}

function sz_invitation_card_shopping($atts) {

    $return_string = '<div class="cpb_builder_iframe" style="height:900px">';
    $return_string .= '<iframe src="http://47.74.226.159/whitelabel-site/h5builder/InvitationCard_1/pc/4/en/index.html?';
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

