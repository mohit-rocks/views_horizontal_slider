(function ($) {
  Drupal.behaviors.slider = {
    attach:function(context, drupalSettings) {
      console.log(drupalSettings);
      var maxWidth = drupalSettings.views_horizontal_slider.max_width;
      var minWidth = drupalSettings.views_horizontal_slider.min_width;
      var caption_field = drupalSettings.views_horizontal_slider.caption_field_name;

      /* the animations are saved as strings via fapi, but somehow duration explicitly wants an int*/
      var caption_fadein = parseInt(drupalSettings.views_horizontal_slider.caption_field_fadein);
      var caption_fadeout = parseInt(drupalSettings.views_horizontal_slider.caption_field_fadeout);

      var lastBlock = $('.views_horizontal_slider div.item-list li.hslider-active');

      /* the animations are saved as strings via fapi, but somehow duration explicitly wants an int*/
      var animate_in = parseInt(drupalSettings.views_horizontal_slider.animate_in);
      var animate_out = parseInt(drupalSettings.views_horizontal_slider.animate_out);

      $('.views_horizontal_slider div.item-list li', context).click(
        function(e){
          $(lastBlock).animate({width: minWidth+'px'}, { queue:false, duration:animate_in});
          $(this).animate({width: maxWidth+'px'}, { queue:false, duration:animate_out});

          if(caption_field) {
            $(this).children('.'+ caption_field).fadeIn(caption_fadein);
            $(lastBlock).children('.'+ caption_field).fadeOut(caption_fadeout);
          }
          else {}

          lastBlock = this;
        }
      );
    }
  };

}(jQuery));
