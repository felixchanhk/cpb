/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function () {
    $("#btn_all").click(function () {
        $("#test_123, #test_1234").css("display", "none");
    });

    $("#btn_sBag").click(function () {
        $("#test_123, #test_1234").css("display", "none");
    });

    $("#btn_fBox").click(function () {
        $("#test_123, #test_1234").css("display", "none");
    });

    $("#btn_wBox").click(function () {
        $("#test_123, #test_1234").css("display", "none");
    });

    $("#btn_icard").click(function () {
        $("#test_123, #test_1234").css("display", "inline-block");
    });
});

$('#myCarousel').carousel({
    interval: 4000,
    cycle: true
});

// Initialize Swiper 
var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    slidesPerView: 2,
    slidesPerColumn: 2,
    paginationClickable: true,
    spaceBetween: 0,     
    // 如果需要前进后退按钮
    nextButton: '.swiper-button-next',
    prevButton: '.swiper-button-prev'
});


$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
});


function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#cpb_preview_img').css('display', 'block');
        	$('#cpb_preview_img').attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}


function getParameterByName(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, "\\$&");
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, " "));
}


function get_sku_productId() {
    document.getElementsByTagName('iframe')[0].contentWindow.qpBuilder.saveBuilderData(function (whitelabelProjectData) {
        //whitelabelProjectData是saveBuilderData返回的Project信息
        //Your code here
        var a = whitelabelProjectData;
        var b = JSON.stringify(a, null, 4);
    	var jsObject = JSON.parse(b);
    	//var obj = JSON.parse(b);
        //console.log(b);
    	//$.post("http://47.74.226.159/cpb_uat/wp-content/themes/somalite/get_json_data.php", jsObject,function(data,status){alert("Data: " + data + "\nStatus: " + status);});
    	$.post("http://47.74.226.159/cpb_uat/wp-content/themes/somalite/get_json_data.php", jsObject);
    
    	
    	var iEditPrint = getParameterByName('iEditPrint');
    	var iEditPaperType = getParameterByName('iEditPaperType');
    	var iEditFinish = getParameterByName('iEditFinish');
    	var iEditHandleType = getParameterByName('iEditHandleType');
    	var iEditHandleColor = getParameterByName('iEditHandleColor');
    	var iEditHandleLength = getParameterByName('iEditHandleLength');
    	var iEditLength = getParameterByName('iEditLength');
    	var iEditWidth = getParameterByName('iEditWidth');
    	var iEditHeight = getParameterByName('iEditHeight');
    	
    	var iEditQty = getParameterByName('iEditQty');
    
    	window.location.href = 'http://47.74.226.159/cpb_uat/cart/?add-to-cart=738' + 
        '&quantity=' + iEditQty + 
        '&iEditPrint=' + iEditPrint +
        '&iEditPaperType=' + iEditPaperType +
        '&iEditFinish=' + iEditFinish +
        '&iEditHandleType=' + iEditHandleType +
        '&iEditHandleColor=' + iEditHandleColor +
        '&iEditHandleLength=' + iEditHandleLength +
        '&iEditLength=' + iEditLength +
        '&iEditWidth=' + iEditWidth +
        '&iEditHeight=' + iEditHeight;
    });
}


function edit_online() {
	
	var nPrint = $("input:radio[name=nPrint]:checked").val();
	var nPaperType = $("input:radio[name=nPaperType]:checked").val();
	var nFinish = $("input:radio[name=nFinish]:checked").val();
	var nHandleType = $("input:radio[name=nHandleType]:checked").val();
	var nHandleColor = $("input:radio[name=nHandleColor]:checked").val();
	//var nHandleLength = $("input:radio[name=nHandleLength]:checked").val();
	var nHandleLength = '450mm One Side';
	var iLength = $("input:text[id=iLength]").val();
	var iWidth = $("input:text[id=iWidth]").val();
	var iHeight = $("input:text[id=iHeight]").val();
    var cpb_qty = $("#cpb_qty").val();
	
	document.getElementById("iEditPrint").value = nPrint;
	document.getElementById("iEditPaperType").value = nPaperType;
    document.getElementById("iEditFinish").value = nFinish;
	document.getElementById("iEditHandleType").value = nHandleType;
	document.getElementById("iEditHandleColor").value = nHandleColor;
	document.getElementById("iEditHandleLength").value = nHandleLength;
	document.getElementById("iEditLength").value = iLength;
	document.getElementById("iEditWidth").value = iWidth;
	document.getElementById("iEditHeight").value = iHeight;
	document.getElementById("iEditQty").value = cpb_qty;
    
	
	//alert(nPrint + "\n" + nFinish + "\n" + nHandleType + "\n" +  nHandleColor + "\n" + nHandleLength + "\n" + iLength + "\n" + iWidth + "\n" + iHeight + "\n" + cpb_qty);	
}


function cpb_validateForm(){
	var iLength = $("input:text[id=iLength]").val();
	var iWidth = $("input:text[id=iWidth]").val();
	var iHeight = $("input:text[id=iHeight]").val();

    if (iLength < 100 || iLength > 400) {
        document.getElementById("check_length").style.color = 'red';
        return false;
    } 

    if (iWidth < 40 || iWidth > 200) {
        document.getElementById("check_width").style.color = 'red';
        return false;
    } 

    if (iHeight < 100 || iWidth > 450) {
        document.getElementById("check_height").style.color = 'red';
        return false;
    } 
    
    var L = parseInt(iLength);
    var W = parseInt(iWidth);
    var H = parseInt(iHeight);
    var TL = 2 * L + 2 * W + 25.5;
	var TW = 0.5 * W + H + 71;
	var V1 = W + 50;
	var V2 = 391 - (W - 40) * 1.5 / 3;
	V2 = parseInt(V2);
    
	if (TW > 483 || V1 > H) {    	
    	return false;
    }else if(L < W){    	
        return false;
    } 

}


function check_not_null(){
	
	var iLength = $("input:text[id=iLength]").val();
	var iWidth = $("input:text[id=iWidth]").val();
	var iHeight = $("input:text[id=iHeight]").val();

	var L = parseInt(iLength);
    var W = parseInt(iWidth);
    var H = parseInt(iHeight);	

	if (L == "") {
    	document.getElementById("check_length").style.color = 'red';
    }else if(L < 100 || L > 400){
    	document.getElementById("check_length").style.color = 'red';
    }else{
    	document.getElementById("check_length").style.color = 'grey';
    }

	if (W == "") {
    	document.getElementById("check_width").style.color = 'red';
    }else if(W < 40 || W > 200){
    	document.getElementById("check_width").style.color = 'red';    
    }else{
    	document.getElementById("check_width").style.color = 'grey';
    }

	if (H == "") {
    	document.getElementById("check_height").style.color = 'red';       
    }else if(H < 100 || H > 450){
       	document.getElementById("check_height").style.color = 'red';
    }else{
    	document.getElementById("check_height").style.color = 'grey';     
    }

	var TL = 2 * L + 2 * W + 25.5;
	var TW = 0.5 * W + H + 71;
	var V1 = W + 50;
	var V2 = 391 - (W - 40) * 1.5 / 3;
	V2 = parseInt(V2);

	if (TW > 483 || V1 > H) {
    	if(V1 >= 100 && V1 <= 250){
        	document.getElementById("check_height").style.color = 'red';
    		document.getElementById("check_height").innerHTML = 'Height must be between '+V1+'mm and '+V2+'mm.';
    	}else if(W < 50){
        	document.getElementById("check_height").style.color = 'red';
    		document.getElementById("check_height").innerHTML = 'Height must be between 100 mm and '+V2+'mm.';
        }
    }else if(L < W){
    	document.getElementById("check_width").style.color = 'red';
    	if(L < 200){
    		document.getElementById("check_width").innerHTML = 'Width must be between 40 mm and '+L+'mm.';
        }else{
    		document.getElementById("check_width").innerHTML = 'Width must be between 40 mm and 200mm.';	
        }
    } 

}


function leftProductColumnMouseOver(){
    document.getElementById("swiper-container1").style.visibility = 'unset'; 
}

function leftProductColumnMouseOut(){
    document.getElementById("swiper-container1").style.visibility = 'hidden'; 
}

function rightProductColumnMouseOver(){
    document.getElementById("swiper-container2").style.visibility = 'unset'; 
}

function rightProductColumnMouseOut(){
    document.getElementById("swiper-container2").style.visibility = 'hidden'; 
}


/*snip1206*/
$(".cpb-snip1206-hover").mouseleave(
   function () {
      $(this).removeClass("cpb-snip1206-hover");
   }
);


/*click out side close popover text*/
$('body').on('click', function (e) {
    //only buttons
    if ($(e.target).data('toggle') !== 'popover'
        && $(e.target).parents('.popover.in').length === 0) { 
        $('[data-toggle="popover"]').popover('hide');
    }
});




/* table effect*/


jQuery(document).ready(function($){
	//open popup
	$('.cpb-cd-popup-trigger').on('click', function(event){
		event.preventDefault();
		$('.cpb-cd-popup').addClass('is-visible');
	});
	
	//close popup
	$('.cpb-cd-popup').on('click', function(event){
		if( $(event.target).is('.cpb-cd-popup-close') || $(event.target).is('.cpb-cd-popup') ) {
			event.preventDefault();
			$(this).removeClass('is-visible');
		}
	});
	//close popup when clicking the esc keyboard button
	$(document).keyup(function(event){
    	if(event.which=='27'){
    		$('.cpb-cd-popup').removeClass('is-visible');
	    }
    });
});