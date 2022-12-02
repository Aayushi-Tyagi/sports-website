/*!
 * Beetan Theme
 *
 * Author: StorePress ( StorePressHQ@gmail.com )
 * Date: 11/9/2022, 1:01:58 PM
 * Released under the GPLv3 license.
 */
/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
(function ($) {
  wp.customize.bind('ready', function () {
    rangeSlider();
  });

  var rangeSlider = function rangeSlider() {
    var slider = $('.customize-control-range'),
        range = $('.customize-control-range-slider'),
        valueWrap = $('.customize-control-range-value-wrap'),
        value = $('.customize-control-range-value');
    slider.each(function () {
      range.on('input', function () {
        $(this).next(valueWrap).find(value).val($(this).val());
      });
      value.on('input', function () {
        var min = parseInt($(this).parent(valueWrap).prev(range).attr('min'));
        var max = parseInt($(this).parent(valueWrap).prev(range).attr('max'));

        if (this.value < min) {
          this.value = min;
        } else if (this.value > max) {
          this.value = max;
        }

        $(this).parent(valueWrap).prev(range).val($(this).val()).change();
      });
    });
  };
})(jQuery);
/******/ })()
;