<?php
/**
 * Public code
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


$menu = '<nav id="bt-menu" class="bt-menu bt-menu-' . $param[ 'menu' ] . '">';
$menu .= '<a href="#" class="bt-menu-trigger bt-menu-pos-' . $param[ 'menu' ] . '"><span>Menu</span></a>';
$menu .= '<ul>';

$tooltipclass = ($param['menu'] == 'tl' || $param['menu'] == 'bl') ? 'r' : 'l';

$count_i = count( $param['menu_1']['item_type'] );
for ( $i = 0; $i < $count_i; $i ++ ) {
	$menu .= '<li>';
  $class = 'bt-vertical ' . $param['menu_1']['item_icon'][ $i ];
	if ( ! empty( $param['menu_1']['item_tooltip_include'][ $i ] ) ) {
    $tooltip = '<em class="'.$tooltipclass.'">'.$param['menu_1']['item_tooltip'][$i].'</em>';
	} else {
		$tooltip = '';
	}
	$class_add = ! empty( $param['menu_1']['button_class'][ $i ] ) ? ' ' . $param['menu_1']['button_class'][ $i ] : '';
	$id_add    =
		! empty( $param['menu_1']['button_id'][ $i ] ) ? ' id="' . $param['menu_1']['button_id'][ $i ] . '"' : '';

	$item_type  = $param['menu_1']['item_type'][ $i ];
	$link_param = $id_add . ' class="' . $class . $class_add . '"';
	$link       = $param['menu_1']['item_link'][ $i ];

	switch ( $item_type ) {
		case 'link':
			$menu .= '<a href="' . $link . '" ' . $link_param . '></a>' . $tooltip;
			break;				
		case 'login':
			$menu .= '<a href="' . wp_login_url( $link ) . '" ' . $link_param . '></a>' . $tooltip;
			break;
		case 'logout':
			$menu .= '<a href="' . wp_logout_url( $link ) . '" ' . $link_param . '></a>' . $tooltip;
			break;
		case 'register':
			$menu .= '<a href="' . wp_registration_url() . '" ' . $link_param . '></a>' . $tooltip;
			break;
		case 'lostpassword':
			$menu .= '<a href="' . wp_lostpassword_url( $link ) . '" ' . $link_param . '></a>' . $tooltip;
			break;		
	}
	$menu .= '</li>';
}
$menu .= '</ul>';

// Build Horizontal button menu
$menu    .= '<ul class="flBtn-menu fl-horizon">';
$count_i = count( $param['menu_2']['item_type'] );
for ( $i = 0; $i < $count_i; $i ++ ) {
  $menu .= '<li>';
  $class = 'bt-vertical ' . $param['menu_2']['item_icon'][ $i ];
  if ( ! empty( $param['menu_2']['item_tooltip_include'][ $i ] ) ) {
    $tooltip = '<em class="'.$tooltipclass.'">'.$param['menu_2']['item_tooltip'][$i].'</em>';
  } else {
    $tooltip = '';
  }
  $class_add = ! empty( $param['menu_2']['button_class'][ $i ] ) ? ' ' . $param['menu_2']['button_class'][ $i ] : '';
  $id_add    =
    ! empty( $param['menu_2']['button_id'][ $i ] ) ? ' id="' . $param['menu_2']['button_id'][ $i ] . '"' : '';

  $item_type  = $param['menu_2']['item_type'][ $i ];
  $link_param = $id_add . ' class="' . $class . $class_add . '"';
  $link       = $param['menu_2']['item_link'][ $i ];

  switch ( $item_type ) {
    case 'link':
      $menu .= '<a href="' . $link . '" ' . $link_param . '></a>' . $tooltip;
      break;    
    case 'login':
      $menu .= '<a href="' . wp_login_url( $link ) . '" ' . $link_param . '></a>' . $tooltip;
      break;
    case 'logout':
      $menu .= '<a href="' . wp_logout_url( $link ) . '" ' . $link_param . '></a>' . $tooltip;
      break;
    case 'register':
      $menu .= '<a href="' . wp_registration_url() . '" ' . $link_param . '></a>' . $tooltip;
      break;
    case 'lostpassword':
      $menu .= '<a href="' . wp_lostpassword_url( $link ) . '" ' . $link_param . '></a>' . $tooltip;
      break;    
  }
  $menu .= '</li>';
}
$menu .= '</ul>';
$menu .= '</div>';
echo $menu;
?>