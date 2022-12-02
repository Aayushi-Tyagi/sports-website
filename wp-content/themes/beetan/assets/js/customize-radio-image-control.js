/*!
 * Beetan Theme
 *
 * Author: StorePress ( StorePressHQ@gmail.com )
 * Date: 11/9/2022, 1:01:58 PM
 * Released under the GPLv3 license.
 */
/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*global wp*/
var Customize_Radio_Image_Control = {
  ready: function ready() {
    var _this = this;

    this.container.on('change', 'input:radio', function (event) {
      var value = jQuery(event.target).val().trim();

      _this.setting.set(value); // We should trigger change data-customize-setting-link,
      //this.container.find('[data-customize-setting-link]').trigger('change');

    });
  }
};
wp.customize.controlConstructor['radio-image'] = wp.customize.Control.extend(Customize_Radio_Image_Control);
/******/ })()
;