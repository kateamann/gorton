jQuery(document).ready(function(){


    var window_width = jQuery( window ).width();

    if (window_width < 1024) {
      jQuery(".sidebar").trigger("sticky_kit:detach");
    } else {
      make_sticky();
    }

    jQuery( window ).resize(function() {

      window_width = jQuery( window ).width();

      if (window_width < 1024) {
        jQuery(".sidebar").trigger("sticky_kit:detach");
      } else {
        make_sticky();
      }

    });

    function make_sticky() {
      jQuery(".sidebar").stick_in_parent({
        parent: '.site-inner',
        offset_top: 10
      });
    }

});
