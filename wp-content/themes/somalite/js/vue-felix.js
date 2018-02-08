var bagPriceCalculator = new Vue({
                el: '#bagPriceCalculator',
                data: function() {
                    return{
                        vLength:110,
                        vWidth:85,
                        vHeight:185,
                    	cpb_qty:1000
                    };
                },
                computed: {
                    finalPrice: function() {
                        var L = parseInt(this.vLength);
                        var W = parseInt(this.vWidth);
                        var H = parseInt(this.vHeight);
                        
                        var typeL;
                        var typeW;
                        var typeL2;
                        var typeW2;
                        var machineType;
                    	
                        if(L <= (349.5-W) && H <= (424-0.5*W) ){
                            typeL = 2 * L + 2 * W + 19.5 + 6;
                            console.log(typeL);
                            typeW = 0.5 * W + H + 65 + 6;
                            console.log(typeW);
                            if(typeL <= 438 && typeW <= 317){
                                machineType = 'HP5500';
                            }else{
                                machineType = 'HP10000';
                            }
                        }else{
                            typeL2 = L + W + 19.5 + 6;
                            console.log(typeL2);
                            typeW2 = 0.5 * W + H + 65 + 6;
                            console.log(typeW2);
                            machineType = 'HP10000L';
                        }
                        
                        var templateModel;
                        if(machineType === 'HP5500'){
                            if(typeW <= 317 ){
                                templateModel = 'HP5500B1S';
                            }else{
                                templateModel = 'HP5500B1H';
                            }
                        }else if(machineType === 'HP10000'){
                            if(typeW <= 495){
                                templateModel = 'HP10000B1S';
                            }else{
                                templateModel = 'HP10000B1H';
                            }
                        }else if(machineType === 'HP10000L'){
                            if(typeW2 <= 495){
                                templateModel = 'HP10000B2S';
                            }else{
                                templateModel = 'HP10000B2H';
                            }
                        }
                        
                        
                        var priceType;
                        if(templateModel === 'HP5500B1S' || templateModel === 'HP5500B1H'){
                            priceType = 'A';
                        }else if(templateModel === 'HP10000B1S' || templateModel === 'HP10000B1H'){
                            priceType = 'B';
                        }else if(templateModel === 'HP10000B2S' || templateModel === 'HP10000B2H'){
                            priceType = 'C';
                        }
                    
                    	var qty = this.cpb_qty;
                    	var unitPrice;
                    	if(priceType === 'A'){
                        	if(qty < 10){
                            	unitPrice = 4.10;
                            }else if(qty >= 10 && qty< 50){
                            	unitPrice = 2.75;
                            }else if(qty >= 50 && qty< 100){
                            	unitPrice = 2.50;
                            }else if(qty >= 100 && qty< 200){
                            	unitPrice = 2.35;
                            }else if(qty >= 200 && qty< 300){
                            	unitPrice = 2.20;
                            }else if(qty >= 300 && qty< 400){
                            	unitPrice = 2.10;
                            }else if(qty >= 400 && qty< 500){
                            	unitPrice = 2.00;
                            }else if(qty >= 500 && qty< 1000){
                            	unitPrice = 1.95;
                            }else if(qty >= 1000){
                            	unitPrice = 1.85;
                            }
                       	}else if(priceType === 'B'){
                          	if(qty < 10){
                            	unitPrice = 4.50;
                            }else if(qty >= 10 && qty< 50){
                            	unitPrice = 3.50;
                            }else if(qty >= 50 && qty< 100){
                            	unitPrice = 3.00;
                            }else if(qty >= 100 && qty< 200){
                            	unitPrice = 2.85;
                            }else if(qty >= 200 && qty< 300){
                            	unitPrice = 2.75;
                            }else if(qty >= 300 && qty< 400){
                            	unitPrice = 2.55;
                            }else if(qty >= 400 && qty< 500){
                            	unitPrice = 2.50;
                            }else if(qty >= 500 && qty< 1000){
                            	unitPrice = 2.40;
                            }else if(qty >= 1000){
                            	unitPrice = 2.30;
                            }
                        }else if(priceType === 'C'){
                        	if(qty < 10){
                            	unitPrice = 6.80;
                            }else if(qty >= 10 && qty< 50){
                            	unitPrice = 5.10;
                            }else if(qty >= 50 && qty< 100){
                            	unitPrice = 4.70;
                            }else if(qty >= 100 && qty< 200){
                            	unitPrice = 4.25;
                            }else if(qty >= 200 && qty< 300){
                            	unitPrice = 3.95;
                            }else if(qty >= 300 && qty< 400){
                            	unitPrice = 3.55;
                            }else if(qty >= 400 && qty< 500){
                            	unitPrice = 3.45;
                            }else if(qty >= 500 && qty< 1000){
                            	unitPrice = 3.35;
                            }else if(qty >= 1000){
                            	unitPrice = 3.15;
                            }
                        }
                        try{
                        	return unitPrice.toFixed(2);
                        }catch(e){
                        	return 1.8;
                        }
                    },
                	finalPriceType: function() {
                        var L = parseInt(this.vLength);
                        var W = parseInt(this.vWidth);
                        var H = parseInt(this.vHeight);
                        
                        var typeL;
                        var typeW;
                        var typeL2;
                        var typeW2;
                        var machineType;
                        if(L <= (349.5-W) && H <= (424-0.5*W) ){
                            typeL = 2 * L + 2 * W + 19.5 + 6;
                            console.log(typeL);
                            typeW = 0.5 * W + H + 65 + 6;
                            console.log(typeW);
                            if(typeL <= 438 && typeW <= 317){
                                machineType = 'HP5500';
                            }else{
                                machineType = 'HP10000';
                            }
                        }else{
                            typeL2 = L + W + 19.5 + 6;
                            console.log(typeL2);
                            typeW2 = 0.5 * W + H + 65 + 6;
                            console.log(typeW2);
                            machineType = 'HP10000L';
                        }
                        
                        var templateModel;
                        if(machineType === 'HP5500'){
                            if(typeW <= 317 ){
                                templateModel = 'HP5500B1S';
                            }else{
                                templateModel = 'HP5500B1H';
                            }
                        }else if(machineType === 'HP10000'){
                            if(typeW <= 495){
                                templateModel = 'HP10000B1S';
                            }else{
                                templateModel = 'HP10000B1H';
                            }
                        }else if(machineType === 'HP10000L'){
                            if(typeW2 <= 495){
                                templateModel = 'HP10000B2S';
                            }else{
                                templateModel = 'HP10000B2H';
                            }
                        }
                        
                        
                        var priceType;
                        if(templateModel === 'HP5500B1S' || templateModel === 'HP5500B1H'){
                            priceType = 'A';
                        }else if(templateModel === 'HP10000B1S' || templateModel === 'HP10000B1H'){
                            priceType = 'B';
                        }else if(templateModel === 'HP10000B2S' || templateModel === 'HP10000B2H'){
                            priceType = 'C';
                        }
                    	return priceType
                    }
                }
            })