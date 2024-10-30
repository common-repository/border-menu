<?php
/**
 * Vertical Buttons Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

$count_i = (!empty( $param[ 'menu_1' ][ 'item_type' ] )) ? count( $param[ 'menu_1' ][ 'item_type' ] ) : '0';
if ( $count_i > 0 ) {
  for ( $i = 0; $i < $count_i; $i++ ) {
    $item_icon_[ $i ] = array(
      'name'   => 'param[menu_1][item_icon][]',
      'class'  => 'icons',
      'type'   => 'select',
      'val'    => isset( $param[ 'menu_1' ][ 'item_icon' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_icon' ][ $i ] : 'fas fa-hand-point-up',
      'option' => $icons_new,
    );
    $custom_icon_[ $i ] = array(
      'name'  => 'param[menu_1][custom_icon][]',
      'type'  => 'checkbox',
      'class' => 'custom-icon',
      'val'   => isset( $param[ 'menu_1' ][ 'custom_icon' ][ $i ] ) ? $param[ 'menu_1' ][ 'custom_icon' ][ $i ] : 0,
      'func'  => 'customicon(this);',
    );
    $custom_icon_url_[ $i ] = array(
      'name'   => 'param[menu_1][custom_icon_url][]',
      'type'   => 'text',
      'class'  => 'custom-icon-url',
      'val'    => isset( $param[ 'menu_1' ][ 'custom_icon_url' ][ $i ] ) ? $param[ 'menu_1' ][ 'custom_icon_url' ][ $i ] : '',
      'option' => array(
        'placeholder' => __( 'Enter Icon URL', $this->text_domain ),
      ),
    );
    $item_tooltip_include_[ $i ] = array(
      'name'  => 'param[menu_1][item_tooltip_include][]',
      'type'  => 'checkbox',
      'class' => 'tooltip-include',
      'val'   => isset( $param[ 'menu_1' ][ 'item_tooltip_include' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_tooltip_include' ][ $i ] : 0,
      'func'  => 'itemtooltip(this);',
    );
    $item_tooltip_[ $i ] = array(
      'name'  => 'param[menu_1][item_tooltip][]',
      'class' => 'item-tooltip',
      'type'  => 'text',
      'val'   => isset( $param[ 'menu_1' ][ 'item_tooltip' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_tooltip' ][ $i ] : '',

    );
    $button_color_[ $i ] = array(
      'name' => 'param[menu_1][button_color][]',
      'type' => 'color',
      'val'  => isset( $param[ 'menu_1' ][ 'button_color' ][ $i ] ) ? $param[ 'menu_1' ][ 'button_color' ][ $i ] : '#009688',
    );
    $button_hcolor_[ $i ] = array(
      'name' => 'param[menu_1][button_hcolor][]',
      'type' => 'color',
      'val'  => isset( $param[ 'menu_1' ][ 'button_hcolor' ][ $i ] ) ? $param[ 'menu_1' ][ 'button_hcolor' ][ $i ] : '#009688',
    );
    $icon_color_[ $i ] = array(
      'name' => 'param[menu_1][icon_color][]',
      'type' => 'color',
      'val'  => isset( $param[ 'menu_1' ][ 'icon_color' ][ $i ] ) ? $param[ 'menu_1' ][ 'icon_color' ][ $i ] : '#ffffff',
    );
    $item_type_[ $i ] = array(
      'name'   => 'param[menu_1][item_type][]',
      'type'   => 'select',
      'class'  => 'item-type',
      'val'    => isset( $param[ 'menu_1' ][ 'item_type' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_type' ][ $i ] : '',
      'option' => array(
        'link'         => __( 'Link', $this->text_domain ),
        'share'        => __( 'Share', $this->text_domain ),
        'print'        => __( 'Print', $this->text_domain ),
        'totop'        => __( 'Scroll to Top', $this->text_domain ),
        'smoothscroll' => __( 'Smooth Scroll', $this->text_domain ),
        'login'        => __( 'Login', $this->text_domain ),
        'logout'       => __( 'Logout', $this->text_domain ),
        'register'     => __( 'Register', $this->text_domain ),
        'lostpassword' => __( 'Lostpassword', $this->text_domain ),
      ),
      'func'   => 'itemtype(this);',
    );
    $item_link_[ $i ] = array(
      'name' => 'param[menu_1][item_link][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'item_link' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_link' ][ $i ] : '',
    );
    $item_share_[ $i ] = array(
      'name'   => 'param[menu_1][item_share][]',
      'type'   => 'select',
      'val'    => isset( $param[ 'menu_1' ][ 'item_share' ][ $i ] ) ? $param[ 'menu_1' ][ 'item_share' ][ $i ] : '',
      'option' => array(
        'Facebook'      => __( 'Facebook', $this->text_domain ),
        'VK'            => __( 'VK', $this->text_domain ),
        'Twitter'       => __( 'Twitter', $this->text_domain ),
        'Linkedin'      => __( 'Linkedin', $this->text_domain ),
        'Odnoklassniki' => __( 'Odnoklassniki', $this->text_domain ),
        'Google'        => __( 'Google', $this->text_domain ),
        'Pinterest'     => __( 'Pinterest', $this->text_domain ),
        'xing'          => __( 'XING', $this->text_domain ),
        'myspace'       => __( 'Myspace', $this->text_domain ),
        'weibo'         => __( 'Weibo', $this->text_domain ),
        'buffer'        => __( 'Buffer', $this->text_domain ),
        'stumbleupon'   => __( 'StumbleUpon', $this->text_domain ),
        'reddit'        => __( 'Reddit', $this->text_domain ),
        'tumblr'        => __( 'Tumblr', $this->text_domain ),
        'blogger'       => __( 'Blogger', $this->text_domain ),
        'livejournal'   => __( 'LiveJournal', $this->text_domain ),
        'pocket'        => __( 'Pocket', $this->text_domain ),
        'telegram'      => __( 'Telegram', $this->text_domain ),
        'skype'         => __( 'Skype', $this->text_domain ),
      ),
      'func'   => '',
    );
    $button_id_[ $i ] = array(
      'name' => 'param[menu_1][button_id][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'button_id' ][ $i ] ) ? $param[ 'menu_1' ][ 'button_id' ][ $i ] : '',
    );

    $button_class_[ $i ] = array(
      'name' => 'param[menu_1][button_class][]',
      'type' => 'text',
      'val'  => isset( $param[ 'menu_1' ][ 'button_class' ][ $i ] ) ? $param[ 'menu_1' ][ 'button_class' ][ $i ] : '',
    );
  }

}