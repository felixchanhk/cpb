(function ($) {
  $(document).ready(function($) {
    var imageUrl;
    $("body").on("click", "a.pr-img-select-image-btn", function(e) {
      e.preventDefault();
      var this_btn = $(this);      
      var image = wp.media({
          title: 'Upload Image',
        }).open()
        .on('select', function(e) {
          var uploaded_image = image.state().get('selection').first();
          var imageUrl = uploaded_image.toJSON().url;
          this_btn.closest('div').find('.pr-img-field').val(imageUrl).trigger( 'change' );          
        });
    });
  });
})(this.jQuery);
