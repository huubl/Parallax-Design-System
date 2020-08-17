/* ========================================================================
 * Shame JS
 *
 * Dedicated javascript file to house quick fixes that can be refactored at a
 * later time.
 *
 * Remember to enque the file in the assets function in lib/setup.php
 * ======================================================================== */
(function ($) {
  $('.open-sidebar').click(function() {
    $('.block-editor-editor-skeleton__sidebar').toggleClass('expand-me');
  });

  
})(jQuery);
