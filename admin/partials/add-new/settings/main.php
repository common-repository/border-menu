<?php
/**
 * Main Settings param
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

include_once( 'icons.php' );
$icons_new = array();
foreach ( $icons as $key => $value ) {
  $icons_new[ $value ] = $value;
}

$menu = array(
  'id'     => 'position',
  'name'   => 'param[menu]',
  'type'   => 'select',
  'val'    => isset( $param[ 'menu' ] ) ? $param[ 'menu' ] : 'bottom-right',
  'option' => array(
    'br' => __( 'bottom-right', 'floating-button' ),
    'bl' => __( 'bottom-left', 'floating-button' ),
    'tr' => __( 'top-right', 'floating-button' ),
    'tl' => __( 'top-left', 'floating-button' ),
  ),
);

$max_border = array(
  'name'   => 'param[max_border]',
  'id'     => 'max_border',
  'type'   => 'number',
  'val'    => isset( $param[ 'max_border' ] ) ? $param[ 'max_border' ] : '90',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '90',
  ),
);

$min_border = array(
  'name'   => 'param[min_border]',
  'id'     => 'min_border',
  'type'   => 'number',
  'val'    => isset( $param[ 'min_border' ] ) ? $param[ 'min_border' ] : '30',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '30',
  ),
);

$button_size = array(
  'name'   => 'param[button_size]',
  'id'     => 'button_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_size' ] ) ? $param[ 'button_size' ] : '40',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '40',
  ),
);

$icon_size = array(
  'name'   => 'param[icon_size]',
  'id'     => 'icon_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'icon_size' ] ) ? $param[ 'icon_size' ] : '48',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '48',
  ),
);

$tooltip_size = array(
  'name'   => 'param[tooltip_size]',
  'id'     => 'tooltip_size',
  'type'   => 'number',
  'val'    => isset( $param[ 'tooltip_size' ] ) ? $param[ 'tooltip_size' ] : '24',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '24',
  ),
);

$indenting = array(
  'name'   => 'param[indenting]',
  'id'     => 'indenting',
  'type'   => 'number',
  'val'    => isset( $param[ 'indenting' ] ) ? $param[ 'indenting' ] : '75',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '75',
  ),
);

$button_margin = array(
  'name'   => 'param[button_margin]',
  'id'     => 'button_margin',
  'type'   => 'number',
  'val'    => isset( $param[ 'button_margin' ] ) ? $param[ 'button_margin' ] : '20',
  'option' => array(
    'min'         => '0',
    'step'        => '1',
    'placeholder' => '20',
  ),
);

$color = array(
  'name' => 'param[color]',
  'id'   => 'color',
  'type' => 'color',
  'val'  => isset( $param[ 'color' ] ) ? $param[ 'color' ] : '#000000',
  'sep'  => '',
);

$hcolor = array(
  'name' => 'param[hcolor]',
  'id'   => 'hcolor',
  'type' => 'color',
  'val'  => isset( $param[ 'hcolor' ] ) ? $param[ 'hcolor' ] : '#fff',
  'sep'  => '',
);

$ihcolor = array(
  'name' => 'param[ihcolor]',
  'id'   => 'ihcolor',
  'type' => 'color',
  'val'  => isset( $param[ 'ihcolor' ] ) ? $param[ 'ihcolor' ] : '#fff',
  'sep'  => '',
);

$t_color = array(
  'name' => 'param[t_color]',
  'id'   => 't_color',
  'type' => 'color',
  'val'  => isset( $param[ 't_color' ] ) ? $param[ 't_color' ] : '#fff',
  'sep'  => '',
);

$t_background = array(
  'name' => 'param[t_background]',
  'id'   => 't_background',
  'type' => 'color',
  'val'  => isset( $param[ 't_background' ] ) ? $param[ 't_background' ] : '#333333',
  'sep'  => '',
);

$b_background = array(
  'name' => 'param[b_background]',
  'id'   => 'b_background',
  'type' => 'color',
  'val'  => isset( $param[ 'b_background' ] ) ? $param[ 'b_background' ] : '#333333',
  'sep'  => '',
);

$o_background = array(
  'name' => 'param[o_background]',
  'id'   => 'o_background',
  'type' => 'color',
  'val'  => isset( $param[ 'o_background' ] ) ? $param[ 'o_background' ] : 'rgba(0,0,0,3)',
  'sep'  => '',
);

/*$position = array(
	'id'     => 'position',
	'name'   => 'param[position]',
	'type'   => 'select',
	'val'    => isset( $param['position'] ) ? $param['position'] : 'bottom-right',
	'option' => array(
		'fl-right fl-bottom' => __( 'bottom-right', 'floating-button' ),
		'fl-left fl-bottom'  => __( 'bottom-left', 'floating-button' ),
		'fl-right fl-top'    => __( 'top-right', 'floating-button' ),
		'fl-left fl-top'     => __( 'top-left', 'floating-button' ),
	),
);

$position_help = array(
	'text' => __( 'Specify floating button location on screen.', 'floating-button' ),
);

include_once( 'icons.php' );
$icons_new = array();
foreach ( $icons as $key => $value ) {
	$icons_new[ $value ] = $value;
}

$button_icon = array(
	'id'     => 'button_icon',
	'name'   => 'param[button_icon]',
	'class'  => 'icons',
	'type'   => 'select',
	'val'    => isset( $param['button_icon'] ) ? $param['button_icon'] : 'fas fa-hand-point-up',
	'option' => $icons_new,
	'func'   => '',
);

$button_icon_help = array(
	'text' => __( 'Select the Icon for button', 'floating-button' ),
);

$shape = array(
	'id'     => 'shape',
	'name'   => 'param[shape]',
	'type'   => 'select',
	'val'    => isset( $param['shape'] ) ? $param['shape'] : 'circle',
	'option' => array(
		'fl-circle'  => __( 'Circle', 'floating-button' ),
		'fl-ellipse' => __( 'Ellipse', 'floating-button' ),
		'fl-square'  => __( 'Square', 'floating-button' ),
		'fl-rsquare' => __( 'Rounded square', 'floating-button' ),
	),
	'func'   => '',
);

$button_color = array(
	'id'   => 'button_color',
	'name' => 'param[button_color]',
	'type' => 'color',
	'val'  => isset( $param['button_color'] ) ? $param['button_color'] : '#009688',
);

$button_hcolor = array(
	'id'   => 'button_hcolor',
	'name' => 'param[button_hcolor]',
	'type' => 'color',
	'val'  => isset( $param['button_hcolor'] ) ? $param['button_hcolor'] : '#009688',
);

$icon_color = array(
	'id'   => 'icon_color',
	'name' => 'param[icon_color]',
	'type' => 'color',
	'val'  => isset( $param['icon_color'] ) ? $param['icon_color'] : '#fff',
);

$tooltip_background = array(
	'id'   => 'tooltip_background',
	'name' => 'param[tooltip_background]',
	'type' => 'color',
	'val'  => isset( $param['tooltip_background'] ) ? $param['tooltip_background'] : '#585858',
);

$tooltip_color = array(
	'id'   => 'tooltip_color',
	'name' => 'param[tooltip_color]',
	'type' => 'color',
	'val'  => isset( $param['tooltip_color'] ) ? $param['tooltip_color'] : '#fff',
);

$main_button_id = array(
	'name' => 'param[main_button_id]',
	'id'   => 'main_button_id',
	'type' => 'text',
	'val'  => isset( $param['main_button_id'] ) ? $param['main_button_id'] : '',
);

$main_button_id_help = array(
	'text' => __( 'Set ID for element.', $this->text_domain ),
);

$main_button_class = array(
	'name' => 'param[main_button_class]',
	'id'   => 'main_button_class',
	'type' => 'text',
	'val'  => isset( $param['main_button_class'] ) ? $param['main_button_class'] : '',
);

$main_button_class_help = array(
	'title' => __( 'Set Class for element.', $this->text_domain ),
	'ul'    => array(
		__( 'You may enter several classes separated by a space.', $this->text_domain ),
	)
);

$custom_icon     = array(
	'name'  => 'param[custom_icon]',
	'type'  => 'checkbox',
	'class' => 'custom-icon',
	'val'   => isset( $param['custom_icon'] ) ? $param['custom_icon'] : 0,
	'func'  => 'customicon(this);',
);
$custom_icon_url = array(
	'name'   => 'param[custom_icon_url]',
	'type'   => 'text',
	'class'  => 'custom-icon-url',
	'val'    => isset( $param['custom_icon_url'] ) ? $param['custom_icon_url'] : '',
	'option' => array(
		'placeholder' => __( 'Enter Icon URL', $this->text_domain ),
	),
);*/
