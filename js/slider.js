(function ($) {
  Drupal.behaviors.slider = {
    attach:function(context, drupalSettings) {
      var maxWidth = drupalSettings.views_horizontal_slider.max_width;
      var minWidth = drupalSettings.views_horizontal_slider.min_width;
      var caption_field = drupalSettings.views_horizontal_slider.caption_field_name;

      /* the animations are saved as strings via fapi, but somehow duration explicitly wants an int*/
      var caption_fadein = parseInt(drupalSettings.views_horizontal_slider.caption_field_fadein);

      var lastBlock = $('.views_horizontal_slider div.item-list li.hslider-active');

      /* the animations are saved as strings via fapi, but somehow duration explicitly wants an int*/
      var animate_in = parseInt(drupalSettings.views_horizontal_slider.animate_in);

      var captionStyles = {
        "opacity": 0,
        "-webkit-transition": "opacity " + caption_fadein + 's',
        "-moz-transition": "opacity " + caption_fadein + 's',
        "-ms-transition": "opacity " + caption_fadein + 's',
        "-o-transition": "opacity " + caption_fadein + 's',
        "transition": "opacity " + caption_fadein + 's'
      };
      var slideStyles = {
        "-webkit-transition": "width " + animate_in + 's',
        "-moz-transition": "width " + animate_in + 's',
        "-ms-transition": "width " + animate_in + 's',
        "-o-transition": "width " + animate_in + 's',
        "transition": "width " + animate_in + 's'
      };
      var captionShow = {
        "opacity": 1
      };
      var captionHide = {
        "opacity": 0
      };
      $('.' + caption_field).css(captionHide);
      $('.views_horizontal_slider li').once().css(slideStyles);

      $('.views_horizontal_slider div.item-list li', context).click(
        function(e){
          $(lastBlock).css({width: minWidth + 'px'});
          $(lastBlock).find('.'+ caption_field).css(captionStyles);
          $(this).css({width: maxWidth + 'px'});
          $(this).find('.'+ caption_field).css(captionShow);
          lastBlock = this;
        }
      );

    }
  };

}(jQuery));
