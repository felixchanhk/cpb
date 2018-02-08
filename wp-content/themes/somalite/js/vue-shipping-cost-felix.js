var shipping_cost = new Vue({
    el: '#cpb-shipping-cost-table',
    data: function () {
        return {
            sbL: 90,
            sbW: 60,
            sbH: 120,
            sbQty: 8,
            selected: {text: 'USA', zone: 2, standard: 5.99, express: 29.99},
            options: [
                {text: 'Hong Kong', zone: 1, standard: 1.8, express: 19.99},
                {text: 'Canada', zone: 2, standard: 5.99, express: 29.99},
                {text: 'USA', zone: 2, standard: 5.99, express: 29.99},
                {text: 'China', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Indonesia', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Macao S.A.R.', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Malaysia', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Philippines', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Singapore', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Thailand', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Vietnam', zone: 3, standard: 3.99, express: 19.99},
                {text: 'Australia', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Belgium', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Denmark', zone: 4, standard: 5.99, express: 33.99},
                {text: 'France', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Germany', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Ireland', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Italy', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Luxembourg', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Netherlands', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Norway', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Spain', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Sweden', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Switzerland', zone: 4, standard: 5.99, express: 33.99},
                {text: 'United Kingdom', zone: 4, standard: 5.99, express: 33.99},
                {text: 'Kenya', zone: 5, standard: 5.99, express: 53},
                {text: 'South Africa', zone: 5, standard: 5.99, express: 53},
                {text: 'Uganda', zone: 5, standard: 5.99, express: 53},
                {text: 'Bahrain', zone: 5, standard: 5.99, express: 53},
                {text: 'Israel', zone: 5, standard: 5.99, express: 53},
                {text: 'Pakistan', zone: 5, standard: 5.99, express: 53},
                {text: 'U.A.E', zone: 5, standard: 5.99, express: 53},
                {text: 'Bosnia', zone: 5, standard: 5.99, express: 53},
                {text: 'Croatia', zone: 5, standard: 5.99, express: 53},
                {text: 'Latvia', zone: 5, standard: 5.99, express: 53},
                {text: 'Macedonia', zone: 5, standard: 5.99, express: 53},
                {text: 'Malta', zone: 5, standard: 5.99, express: 53},
                {text: 'Poland', zone: 5, standard: 5.99, express: 53},
                {text: 'Brazil', zone: 5, standard: 5.99, express: 53},
                {text: 'Portugal', zone: 5, standard: 5.99, express: 53},
                {text: 'Romania', zone: 5, standard: 5.99, express: 53},
                {text: 'Russia', zone: 5, standard: 5.99, express: 53},
                {text: 'Slovakia', zone: 5, standard: 5.99, express: 53},
                {text: 'Ukraine', zone: 5, standard: 5.99, express: 53},
                {text: 'Cayman Islands', zone: 5, standard: 5.99, express: 53},
                {text: 'St. Lucia', zone: 5, standard: 5.99, express: 53}
            ],
            show: true
        };
    },
    computed: {
        sPrice: function () {
            var tW = this.totalWeight;
            var cost;

            if (this.selected.zone === 1) {//Hong Kong
                if (tW <= 0.2) {
                    cost = 0;
                } else if (tW > 0.2 && tW <= 2) {
                    cost = Math.ceil((tW - 0.2) / 0.2) * 0.6;
                } else if (tW > 2.1 && tW <= 35) {
                    cost = 5.39 + Math.ceil((tW - 2) / 0.2) * 0.36;
                } else if (tW > 35 && tW <= 90) {
                    cost = 64.79 + Math.ceil((tW - 35) / 0.2) * 0.24;
                } else if (tW > 90) {
                    cost = 130.79 + Math.ceil((tW - 90) / 0.2) * 0.22;
                }
            } else if (this.selected.zone === 2) {//North America
                if (tW <= 0.2) {
                    cost = 0;
                } else if (tW > 0.2 && tW <= 1) {
                    cost = Math.ceil((tW - 0.2) / 0.2) * 4;
                } else if (tW > 1 && tW <= 5) {
                    cost = 16 + Math.ceil((tW - 1) / 0.2) * 1;
                } else if (tW > 5 && tW <= 100) {
                    cost = 36 + Math.ceil((tW - 5) / 0.2) * 0.6;
                } else if (tW > 100 && tW <= 250) {
                    cost = 321 + Math.ceil((tW - 100) / 0.2) * 0.4;
                } else if (tW > 250) {
                    cost = 621 + Math.ceil((tW - 250) / 0.2) * 0.36;
                }
            } else if (this.selected.zone === 3) {//Southeast Asia
                if (tW <= 0.2) {
                    cost = 0;
                } else if (tW > 0.2 && tW <= 2) {
                    cost = Math.ceil((tW - 0.2) / 0.2) * 1.3;
                } else if (tW > 2 && tW <= 4) {
                    cost = 11.7 + Math.ceil((tW - 2) / 0.2) * 0.65;
                } else if (tW > 4 && tW <= 100) {
                    cost = 18.2 + Math.ceil((tW - 4) / 0.2) * 0.39;
                } else if (tW > 100) {
                    cost = 205.4 + Math.ceil((tW - 100) / 0.2) * 0.26;
                }
            } else if (this.selected.zone === 4) {//Europe
                if (tW <= 0.2) {
                    cost = 0;
                } else if (tW > 0.2 && tW <= 2) {
                    cost = Math.ceil((tW - 0.2) / 0.2) * 2;
                } else if (tW > 2 && tW <= 4) {
                    cost = 18 + Math.ceil((tW - 2) / 0.2) * 1;
                } else if (tW > 4 && tW <= 100) {
                    cost = 28 + Math.ceil((tW - 4) / 0.2) * 0.6;
                } else if (tW > 100) {
                    cost = 316 + Math.ceil((tW - 100) / 0.2) * 0.4;
                }
            } else if (this.selected.zone === 5) {//Others country
                if (tW <= 0.2) {
                    cost = 0;
                } else if (tW > 0.2 && tW <= 2) {
                    cost = Math.ceil((tW - 0.2) / 0.2) * 2;
                } else if (tW > 2 && tW <= 4) {
                    cost = 18 + Math.ceil((tW - 0.2) / 0.2) * 1;
                } else if (tW > 4 && tW <= 100) {
                    cost = 28 + Math.ceil((tW - 4) / 0.2) * 0.6;
                } else if (tW > 100) {
                    cost = 316 + Math.ceil((tW - 100) / 0.2) * 0.4;
                }
            }

            var total = this.selected.standard + cost;
            return total.toFixed(2);
        },
        ePrice: function () {
            var tW = this.totalWeight;
            var cost;

            if (this.selected.zone === 1 || this.selected.zone === 3) {// Hong Kong
                if (tW <= 0.5) {
                    cost = 0;
                } else if (tW > 0.5 && tW <= 88) {
                    cost = Math.ceil(tW / 0.5) * 1;
                } else if (tW > 88 && tW <= 208) {
                    cost = 175 + Math.ceil((tW - 88) / 0.5) * 0.7;
                } else if (tW > 208 ) {
                    cost = 343 + Math.ceil((tW - 208) / 0.5) * 0.6;
                }
            } else if (this.selected.zone === 2) {//USA Canada
                if (tW < 100) {
                    cost = Math.ceil(tW / 0.5) * 1.5;
                } else if (tW >= 100 && tW < 250) {
                    cost = 300 + Math.ceil((tW - 100) / 0.5) * 1;
                } else if (tW >= 250) {
                    cost = 600 + Math.ceil((tW - 250) / 0.5) * 0.9;
                }
            } else if (this.selected.zone === 4) {// Europe
                if (tW <= 0.5) {
                    cost = 0;
                } else if (tW > 0.5 && tW <= 100) {
                    cost = Math.ceil(tW / 0.5) * 1.8;
                } else if (tW > 100 && tW <= 250) {
                    cost = 358.2 + Math.ceil((tW - 100) / 0.5) * 1.2;
                } else if (tW > 250) {
                    cost = 718.2 + Math.ceil((tW - 250) / 0.5) * 1.08;
                }
            } else if (this.selected.zone === 5) {// Others Country
                if (tW <= 0.5) {
                    cost = 0;
                } else if (tW > 0.5 && tW <= 100) {
                    cost = Math.ceil((tW - 0.5) / 0.5) * 6;
                } else if (tW > 100 && tW <= 250) {
                    cost = 1200 + Math.ceil((tW - 100) / 0.5) * 4;
                } else if (tW > 250) {
                    cost = 2400 + Math.ceil((tW - 250) / 0.5) * 3.5;
                }
            }
            var total = this.selected.express + cost;
            return total.toFixed(2);

        },
        totalWeight: function () {

            var typeL;
            var typeW;
            var typeL2;
            var typeW2;
            var machineType;
            var templateModel;
            var productWeight;
            var productType;
            var totalWeight;

            if (parseInt(this.sbL) <= (349.5 - parseInt(this.sbW)) && parseInt(this.sbH) <= (424 - 0.5 * parseInt(this.sbW))) {
                typeL = 2 * parseInt(this.sbL) + 2 * parseInt(this.sbW) + 19.5 + 6;
                typeW = 0.5 * parseInt(this.sbW) + parseInt(this.sbH) + 65 + 6;
                if (typeL <= 438 && typeW <= 317) {
                    machineType = 'HP5500';
                } else {
                    machineType = 'HP10000';
                }
            } else {
                typeL2 = parseInt(this.sbL) + parseInt(this.sbW) + 19.5 + 6;
                typeW2 = 0.5 * parseInt(this.sbW) + parseInt(this.sbH) + 65 + 6;
                machineType = 'HP10000L';
            }

            if (machineType === 'HP5500') {
                if (typeW <= 317) {
                    templateModel = 'HP5500B1S';
                } else {
                    templateModel = 'HP5500B1H';
                }
            } else if (machineType === 'HP10000') {
                if (typeW <= 495) {
                    templateModel = 'HP10000B1S';
                } else {
                    templateModel = 'HP10000B1H';
                }
            } else if (machineType === 'HP10000L') {
                if (typeW2 <= 495) {
                    templateModel = 'HP10000B2S';
                } else {
                    templateModel = 'HP10000B2H';
                }
            }

            if (templateModel === 'HP5500B1S' || templateModel === 'HP5500B1H') {
                productWeight = 0.1;//kg
                productType = 0;//small
            } else if (templateModel === 'HP10000B1S' || templateModel === 'HP10000B1H') {
                productWeight = 0.13;
                productType = 1;
            } else if (templateModel === 'HP10000B2S' || templateModel === 'HP10000B2H') {
                productWeight = 0.21;
                productType = 2;
            }

            var box = 0.5;//kg
            if (productType === 0) {
                if (this.sbQty < 1) {
                    totalWeight = 0;
                } else if (this.sbQty >= 1 && this.sbQty < 10) {
                    totalWeight = productWeight * this.sbQty + box * 0.5;
                } else if (this.sbQty >= 10) {
                    totalWeight = productWeight * this.sbQty + box * (this.sbQty / 50);
                    console.log(productWeight * this.sbQty + box * (this.sbQty / 50) +'::'+(this.sbQty / 50));
                }
            } else if (productType === 1) {
                if (this.sbQty < 1) {
                    totalWeight = 0;
                } else if (this.sbQty >= 1 && this.sbQty < 10) {
                    totalWeight = productWeight * this.sbQty + box * 0.6;
                } else if (this.sbQty >= 10) {
                    totalWeight = productWeight * this.sbQty + box * (this.sbQty / 25);
                }
            } else if (productType === 2) {
                box = 0.8;
                if (this.sbQty < 1) {
                    totalWeight = 0;
                } else if (this.sbQty >= 1 && this.sbQty < 10) {
                    totalWeight = productWeight * this.sbQty + box * 0.6;
                } else if (this.sbQty >= 10) {
                    totalWeight = productWeight * this.sbQty + box * (this.sbQty / 25);
                }
            }

            try {
                //return kg
                return totalWeight.toFixed(2);
            } catch (err) {
                return 0;
            }
        },
        eDeliveryDay: function () {
            var zone = this.selected.zone;
            var deliveryday;
            if (zone === 2 && this.sbQty > 0) {
                deliveryday = '3 - 4 business days';
            } else {
                deliveryday = '';
            }
            return deliveryday;
        },
        pTime: function () {
            var days;
            if (this.sbQty > 0 && this.sbQty < 3000) {
                days = '2-3 business days';
            } else if (this.sbQty >= 3000) {
                days = '4-5 business days';
            } else {
                days = '';
            }
            return days;
        }
    }
})