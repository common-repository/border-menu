<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
/**
 * Tergeting settings
 *
 * @package     Lead_Generation
 * @subpackage  Settings
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

// Enable Don’t show on screens more than
$include_more_screen = array(
	'id'   => 'include_more_screen',
	'name' => 'param[include_more_screen]',
	'type' => 'checkbox',
	'val'  => isset( $param['include_more_screen'] ) ? $param['include_more_screen'] : 0,
	'func' => 'screen_more(this);',
);

// Show on screens helper
$show_screen_help = array(
	'text' => __( 'Specify the window breakpoint in px when the button will be shown.', $this->text_domain ),
);

// Max screen value
$screen_more = array(
	'id'     => 'screenmore',
	'name'   => 'param[screen_more]',
	'type'   => 'number',
	'val'    => isset( $param['screen_more'] ) ? $param['screen_more'] : 1024,
	'option' => array(
		'min'         => '0',
		'max'         => '3000',
		'step'        => '1',
		'placeholder' => '1024',
	),
);

// Enable Don’t show on screens less than
$include_mobile = array(
	'id'   => 'include_mobile',
	'name' => 'param[include_mobile]',
	'type' => 'checkbox',
	'val'  => isset( $param['include_mobile'] ) ? $param['include_mobile'] : 0,
	'func' => 'screen_less(this);',
);

// Enable Don’t show on screens less than helper
$include_mobile_help = array(
	'text' => __( 'Specify the window breakpoint ( mix width) in px.', $this->text_domain ),
);

// Min screen value
$screen = array(
	'id'     => 'screen',
	'name'   => 'param[screen]',
	'type'   => 'number',
	'val'    => isset( $param['screen'] ) ? $param['screen'] : 480,
	'option' => array(
		'min'         => '0',
		'max'         => '3000',
		'step'        => '1',
		'placeholder' => '480',
	),
);

// Show for users
$item_user = array(
	'id'     => 'item_user',
	'name'   => 'param[item_user]',
	'type'   => 'radio',
	'class'  => 'item_user',
	'val'    => isset( $param['item_user'] ) ? $param['item_user'] : '1',
	'option' => array(
		'1'          => __( 'All Users', 'lg-button-targeting' ),
		'2'   => __( 'Authorized Users', 'lg-button-targeting' ),
		'3' => __( 'Unauthorized Users', 'lg-button-targeting' ),
	),
	'sep'    => '<br/>',
	'func'   => 'usersroles(this);',
);


// Users role
$add_users      = array( 'all' => array( 'name' => __( 'All Users', 'lg-button-targeting' ) ) );
$editable_role  = array_reverse( get_editable_roles() );
$editable_roles = array_merge( $add_users, $editable_role );
$users_arr      = array();
foreach ( $editable_roles as $role => $details ) {
	$name                           = translate_user_role( $details['name'] );
	$users_arr[ esc_attr( $role ) ] = $name;
}

$user_role = array(
	'id'     => 'users_roles',
	'name'   => 'param[user_role]',
	'type'   => 'select',
	'val'    => isset( $param['user_role'] ) ? $param['user_role'] : 'all',
	'option' => $users_arr,
);

// Enable Depending on the language
$depending_language = array(
	'id'   => 'depending_language',
	'name' => 'param[depending_language]',
	'type' => 'checkbox',
	'val'  => isset( $param['depending_language'] ) ? $param['depending_language'] : 0,
	'func' => 'languages(this);',
);

// Languages
$lang = array(
	'id'     => 'language',
	'name'   => 'param[lang]',
	'type'   => 'select',
	'val'    => isset( $param['lang'] ) ? $param['lang'] : 'all',
	'option' => array(
		'ar'  => 'العربية',
		'az'  => 'Azərbaycan dili',
		'bg'  => 'Български',
		'bn'  => 'বাংলা',
		'bs'  => 'Bosanski',
		'ca'  => 'Català',
		'ceb' => 'Cebuano',
		'cs'  => 'Čeština‎',
		'cy'  => 'Cymraeg',
		'da'  => 'Dansk',
		'de'  => 'Deutsch',
		'el'  => 'Ελληνικά',
		'en'  => 'English',
		'eo'  => 'Esperanto',
		'es'  => 'Español',
		'et'  => 'Eesti',
		'eu'  => 'Euskara',
		'fa'  => 'فارسی',
		'fi'  => 'Suomi',
		'fr'  => 'Français',
		'gd'  => 'Gàidhlig',
		'gl'  => 'Galego',
		'haz' => 'هزاره گی',
		'he'  => 'עִבְרִית',
		'hi'  => 'हिन्दी',
		'hr'  => 'Hrvatski',
		'hu'  => 'Magyar',
		'hy'  => 'Հայերեն',
		'id'  => 'Bahasa Indonesia',
		'is'  => 'Íslenska',
		'it'  => 'Italiano',
		'ja'  => '日本語',
		'ka'  => 'ქართული',
		'ko'  => '한국어',
		'lt'  => 'Lietuvių kalba',
		'mk'  => 'Македонски јазик',
		'mr'  => 'मराठी',
		'ms'  => 'Bahasa Melayu',
		'my'  => 'ဗမာစာ',
		'nb'  => 'Norsk bokmål',
		'nl'  => 'Nederlands',
		'nn'  => 'Norsk nynorsk',
		'oc'  => 'Occitan',
		'pl'  => 'Polski',
		'ps'  => 'پښتو',
		'pt'  => 'Português',
		'ro'  => 'Română',
		'ru'  => 'Русский',
		'sk'  => 'Slovenčina',
		'sl'  => 'Slovenščina',
		'sq'  => 'Shqip',
		'sr'  => 'Српски језик',
		'sv'  => 'Svenska',
		'th'  => 'ไทย',
		'tl'  => 'Tagalog',
		'tr'  => 'Türkçe',
		'ug'  => 'Uyƣurqə',
		'uk'  => 'Українська',
		'vi'  => 'Tiếng Việt',
		'zh'  => '简体中文',
	),
);