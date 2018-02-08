var vm = new Vue({
  el: '#faq-vue-app',
  delimiters: ['${', '}'],
  data: {
    shippingShow: false,
  	placeShow: false,
  	reorderShow: false,
  	artworkShow: false,
  	helpShow: false,
  	generalShow: false
  },
  methods: {
    shippingToggle: function() {
      this.shippingShow = !this.shippingShow;
      if(this.shippingShow == true){
      	this.placeShow = false;
      	this.reorderShow = false;
      	this.artworkShow = false;	
      	this.helpShow = false;	
      	this.generalShow = false;	
      }
    },
  	placeToggle: function() {
      this.placeShow = !this.placeShow;
      if(this.placeShow == true){
      	this.shippingShow = false;
      	this.reorderShow = false;
      	this.artworkShow = false;	
      	this.helpShow = false;	
      	this.generalShow = false;	
      }
    },
  	reorderToggle: function(){
      this.reorderShow = !this.reorderShow;
      if(this.reorderShow == true){
      	this.shippingShow = false;
      	this.placeShow = false;
      	this.artworkShow = false;	
      	this.helpShow = false;	
      	this.generalShow = false;
      }	
    },
  	artworkToggle: function(){
      this.artworkShow = !this.artworkShow;
      if(this.artworkShow == true){
      	this.shippingShow = false;
      	this.placeShow = false;
      	this.reorderShow = false;	
      	this.helpShow = false;	
      	this.generalShow = false;	
      }
    },
  	helpToggle: function(){
      this.helpShow = !this.helpShow;
      if(this.helpShow == true){
      	this.shippingShow = false;
      	this.placeShow = false;
      	this.reorderShow = false;
      	this.artworkShow = false;
      	this.generalShow = false;	
      }
    },
  	generalToggle: function(){
      this.generalShow = !this.generalShow;
      if(this.generalShow == true){
      	this.shippingShow = false;
      	this.placeShow = false;
      	this.reorderShow = false;
      	this.artworkShow = false;	
      	this.helpShow = false;	
      }
    }
  	
  	
  }
});