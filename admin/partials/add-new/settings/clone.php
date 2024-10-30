<?php
/**
 * Clone Elements Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Elements for clone Menu 1
$menu_1_item_icon = array(
	'name'  => 'param[menu_1][item_icon][]',
	'class' => 'icons',
	'type'  => 'select',
	'val'   => 'fas fa-hand-point-up',
	'option' => $icons_new,
);
$menu_1_button_color = array(
	'name' => 'param[menu_1][button_color][]',
	'type' => 'color',
	'val'  => '#009688',
);
$menu_1_button_hcolor = array(
	'name' => 'param[menu_1][button_hcolor][]',
	'type' => 'color',
	'val'  => '#009688',
);
$menu_1_icon_color = array(
	'name' => 'param[menu_1][icon_color][]',
	'type' => 'color',
	'val'  => '#ffffff',
);
$menu_1_item_type = array(
	'name'   => 'param[menu_1][item_type][]',
	'type'   => 'select',
	'val'    => 'link',
	'class'  => 'item-type',
	'option' => array(
		'link'         => __( 'Link', $this->text_domain ),
		'login'        => __( 'Login', $this->text_domain ),
		'logout'       => __( 'Logout', $this->text_domain ),
		'register'     => __( 'Register', $this->text_domain ),
		'lostpassword' => __( 'Lostpasswordt', $this->text_domain ),
	),
	'func'   => 'itemtype(this);',
);
$menu_1_item_link = array(
	'name' => 'param[menu_1][item_link][]',
	'type' => 'text',
	'val'  => '',
);


// Elements for clone Menu 2
$menu_2_item_icon = array(
	'name'  => 'param[menu_2][item_icon][]',
	'class' => 'icons',
	'type'  => 'select',
	'val'   => 'fas fa-hand-point-up',
	'option' => $icons_new,
);

$menu_2_button_color = array(
	'name' => 'param[menu_2][button_color][]',
	'type' => 'color',
	'val'  => '#009688',
);
$menu_2_button_hcolor = array(
	'name' => 'param[menu_2][button_hcolor][]',
	'type' => 'color',
	'val'  => '#009688',
);
$menu_2_icon_color = array(
	'name' => 'param[menu_2][icon_color][]',
	'type' => 'color',
	'val'  => '#ffffff',
);
$menu_2_item_type = array(
	'name'   => 'param[menu_2][item_type][]',
	'type'   => 'select',
	'class'  => 'item-type',
	'val'    => 'link',
	'option' => array(
		'link'         => __( 'Link', $this->text_domain ),
		'login'        => __( 'Login', $this->text_domain ),
		'logout'       => __( 'Logout', $this->text_domain ),
		'register'     => __( 'Register', $this->text_domain ),
		'lostpassword' => __( 'Lostpasswordt', $this->text_domain ),
	),
	'func'   => 'itemtype(this);',
);
$menu_2_item_link = array(
	'name' => 'param[menu_2][item_link][]',
	'type' => 'text',
	'val'  => '',
);