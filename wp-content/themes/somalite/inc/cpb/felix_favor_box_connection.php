<?php

function cpb_favor_box_details_page(){
	global $product;

	$sku = $product->get_sku();
	
	if($sku === 'favor123'){
    $form_html .= '<div class="favor-box-test"><a href="http://47.74.226.159/whitelabel-site/h5builder/mosaic-builder-test_1/pc/3/en/index.html?webId=41&productId=135971&qty=1&status=0&ot=NEW&pid=1">Edit Online Now</a></div>';
	echo $form_html;
    }
}

add_action('woocommerce_share', 'cpb_favor_box_details_page', 50);



