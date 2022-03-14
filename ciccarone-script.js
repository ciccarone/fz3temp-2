jQuery(document).ready(function( $ ) {

  // $(':contains("By:")').each(function(){
  //   $(this).html($(this).html().split("By:").join(""));
  // });

  if ($('.page-id-19 .all-grid').length > 0) {

    $(document).on('facetwp-loaded', function() {

      convert_to_samples();

    });
  }

  if ($('.inteco-woocommerce-related-product').length > 0) {

      convert_to_samples();

  }



  if ($('.single-product').length > 0) {

    if (document.location.href.indexOf('sample') === -1){
        $('form.cart').hide();

        $('.entry-summary .price').hide();
        $('.entry-summary .wc-price-per-area').hide();
        $('.entry-summary .woocommerce-product-details__short-description p:first-child').hide();
        $('.entry-summary .woocommerce-product-details__short-description p:nth-child(2)').hide();
        var sample_buy_link = $('.entry-summary .woocommerce-product-details__short-description p:last-child a').attr('href');
        $('.entry-summary .woocommerce-product-details__short-description p:last-child').append('<div style="margin-top: 54px;"><a href="'+sample_buy_link+'" style="background-color: #ffb81c;    font-weight: bold;text-transform: uppercase;letter-spacing: 0.8px;padding: 15px 33px; color: white !important">ORDER NOW</a></div>');

    }

  }



  function convert_to_samples() {
    $('.gdlr-core-product-price').hide();
    $('.wc-square-ft').hide();
      $('.gdlr-core-product-thumbnail-info').attr('style', 'opacity:0!important');
      $('.gdlr-core-item-list a').each(function(){

        if ($(this).hasClass('ajax_add_to_cart')) {
          $(this).attr("href", '');
          $('i', this).hide();
          $('span', this).hide();

        } else {
          $.fn.changeElementType = function(newType) {
            var attrs = {};

            $.each(this[0].attributes, function(idx, attr) {
              attrs[attr.nodeName] = attr.nodeValue;
            });

            this.replaceWith(function() {
              return $("<" + newType + "/>", attrs).append($(this).contents());
            });
          }
          var _href = $(this).attr("href");
          $(this).attr("href", _href.replace(/\/$/, "") + '-sample');
          var new_href = $(this).attr("href");
          console.log(new_href);
          $(this).parent().parent().parent().parent().changeElementType('a');
          $(this).parent().parent().parent().parent().attr({
              "href": new_href,
              // "border": "2px solid green"
          });
        }

     });
  }



});
