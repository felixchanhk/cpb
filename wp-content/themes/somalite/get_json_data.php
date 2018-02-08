<?php 
   $pID  = $_POST['productInstanceId'];
   $file = fopen("/var/www/html/cpb_uat/wp-content/api/productInstanceId.txt","w");
   	
	if(!$pId){
	    fwrite($file,$pID);
    }else{
    	fwrite($file,'fail to get the productInstanceId');
    }
   fclose($file);
?>