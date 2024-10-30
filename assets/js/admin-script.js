/* ========= INFORMATION ============================
	- author:    Dmytro Lobov
	- url:       https://wow-estore.com
	- email:     givememoney1982@gmail.com
==================================================== */

jQuery(document).ready(function ($) {
  //* Include colorpicker

  $('.wow-plugin .tab-nav li:first').addClass('select');
  $('.wow-plugin .tab-panels>div').hide().filter(':first').show();
  $('.wow-plugin .tab-nav a').click(function () {
    $('.wow-plugin .tab-panels>div').hide().filter(this.hash).show();
    $('.wow-plugin .tab-nav li').removeClass('select');
    $(this).parent().addClass('select');
    return (false);
  });

  $('.wow-plugin input:checkbox:checked').each(function () {
    $(this).siblings('input[type="hidden"]').val('1');
  });

  $('.wow-plugin input:checkbox').change(function () {
      checkboxchecked(this);
    }
  );

  $('.wp-color-picker-field').not('#clone .wp-color-picker-field').wpColorPicker();

  $('.icons').not('#clone .icons').fontIconPicker({
    theme: 'fip-darkgrey',
    emptyIcon: false,
    allCategoryText: 'Show all'
  });

  wow_attach_tooltips($(".wow-help"));

  $('input.tooltip-include:checkbox').each(function () {
    itemtooltip(this);
  });

  $('select.item-type').each(function () {
    itemtype(this);
  });

  $('input#depending_language:checkbox').each(function () {
    languages(this);
  });

  $('select#show').each(function () {
    showchange(this);
  });

  $('input.item_user:radio:checked').each(function () {
    usersroles(this);
  });

  $('input#include_mobile:checkbox').each(function () {
    screen_less(this);
  });

  $('input#include_more_screen:checkbox').each(function () {
    screen_more(this);
  });

  $('input.custom-icon:checkbox').each(function () {
    customicon(this);
  });
});

function wow_attach_tooltips(selector) {
  selector.tooltip({
    content: function () {
      return jQuery(this).prop("title")
    },
    tooltipClass: "wow-ui-tooltip",
    position: {
      my: "center top",
      at: "center bottom+10",
      collision: "flipfit"
    },
    hide: {
      duration: 200
    },
    show: {
      duration: 200
    }
  })
}

function itemadd(menu) {
  var menu = 'adding-menu-' + menu;
  var nextelement = jQuery('.' + menu + ' fieldset').length * 1 + 1;
  jQuery('#' + menu + ' .item').text(nextelement);
  jQuery('#' + menu).clone().removeAttr('id').appendTo('.' + menu);
  refreashel();

}

function refreashel() {
  jQuery('.wp-color-picker-field').not('#clone .wp-color-picker-field').wpColorPicker();

  jQuery('.icons').not('#clone .icons').fontIconPicker({
    theme: 'fip-darkgrey',
    emptyIcon: false,
    allCategoryText: 'Show all'
  });
}

function itemremove(menu) {
  var menu = 'adding-menu-' + menu;
  jQuery('.' + menu + ' fieldset').last().remove();
}

function checkboxchecked(that) {
  if (jQuery(that).prop('checked')) {
    jQuery(that).siblings('input[type="hidden"]').val('1');
  }
  else {
    jQuery(that).siblings('input[type="hidden"]').val('0');
  }
}

//* Change item type
function itemtype(that) {
  var type = jQuery(that).val();
  var parent = jQuery(that).parents('.container');

  if (type === 'link' || type === 'smoothscroll') {
    jQuery(parent).find('.type-link').css('display', 'block');
    jQuery(parent).find('.type-share').css('display', 'none');
    jQuery(parent).find('.type-link-text').text('Link');

  }
  else if (type === 'share') {
    jQuery(parent).find('.type-link').css('display', 'none');
    jQuery(parent).find('.type-share').css('display', 'block');
  }
  else if (type === 'login' || type === 'logout' || type === 'lostpassword') {
    jQuery(parent).find('.type-link').css('display', 'block');
    jQuery(parent).find('.type-share').css('display', 'none');
    jQuery(parent).find('.type-link-text').text('Redirect URL');

  }
  else {
    jQuery(parent).find('.type-link').css('display', 'none');
    jQuery(parent).find('.type-share').css('display', 'none');
  }
}

function itemtooltip(that) {
  if (jQuery(that).is(':checked')) {
    jQuery(that).siblings('.item-tooltip').css('display', 'block');
  }
  else {
    jQuery(that).siblings('.item-tooltip').css('display', 'none');
  }
}

function customicon(that) {
  if (jQuery(that).is(':checked')) {
    jQuery(that).siblings('.custom-icon-url').css('display', 'block');
    jQuery(that).siblings('.icon-font').css('display', 'none');
  }
  else {
    jQuery(that).siblings('.custom-icon-url').css('display', 'none');
    jQuery(that).siblings('.icon-font').css('display', 'block');
  }
}

//* Show language
function languages(that) {
  if (jQuery(that).is(':checked')) {
    jQuery('#language').css('display', '');
  }
  else {
    jQuery('#language').css('display', 'none');
  }
}

//* When show
function showchange(that) {
  var show = jQuery(that).val();
  if (show === 'posts' || show === 'pages' || show === 'expost' || show === 'expage' || show === 'taxonomy') {
    jQuery('#id_post').css('display', '');
    jQuery('#shortcode').css('display', 'none');
  }
  else if (show === 'shortecode') {
    jQuery('#shortcode').css('display', '');
    jQuery('#id_post').css('display', 'none');
  }
  else {
    jQuery('#shortcode').css('display', 'none');
    jQuery('#id_post').css('display', 'none');
  }
  if (show === 'taxonomy') {
    jQuery('#taxonomy').css('display', '');
  }
  else {
    jQuery('#taxonomy').css('display', 'none');
  }
}

//* Show screen
function screen_less(that) {
  if (jQuery(that).is(':checked')) {
    jQuery('#screen').css('display', '');
  }
  else {
    jQuery('#screen').css('display', 'none');
  }
}

function screen_more(that) {
  if (jQuery(that).is(':checked')) {
    jQuery('#screenmore').css('display', '');
  }
  else {
    jQuery('#screenmore').css('display', 'none');
  }
}

function usersroles(that) {
  var users = jQuery(that).val();
  if (users == 2) {
    jQuery('#users_roles').css('display', '');
  }
  else {
    jQuery('#users_roles').css('display', 'none');
  }
}