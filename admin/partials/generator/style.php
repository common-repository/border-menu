/* ========= INFORMATION ============================
- author:    Dmytro Lobov
- url:       https://wow-estore.com
- email:     givememoney1982@gmail.com
==================================================== */

<?php if ( !defined( 'ABSPATH' ) ) exit;

$max_border = !empty( $param[ 'max_border' ] ) ? $param[ 'max_border' ] . 'px' : '90px';
$min_border = !empty( $param[ 'min_border' ] ) ? $param[ 'min_border' ] . 'px' : '30px';


if ( $param[ 'menu' ] == 'tl' ) {
  $border1 = (!empty( $param[ 'menu_2' ][ 'item_type' ] )) ? $max_border : $min_border;
  $border2 = $min_border;
  $border3 = $min_border;
  $border4 = (!empty( $param[ 'menu_1' ][ 'item_type' ] )) ? $max_border : $min_border;
}
if ( $param[ 'menu' ] == 'tr' ) {
  $border1 = (!empty( $param[ 'menu_2' ][ 'item_type' ] )) ? $max_border : $min_border;
  $border2 = (!empty( $param[ 'menu_1' ][ 'item_type' ] )) ? $max_border : $min_border;
  $border3 = $min_border;
  $border4 = $min_border;
}
if ( $param[ 'menu' ] == 'br' ) {
  $border1 = $min_border;
  $border2 = (!empty( $param[ 'menu_1' ][ 'item_type' ] )) ? $max_border : $min_border;
  $border3 = (!empty( $param[ 'menu_2' ][ 'item_type' ] )) ? $max_border : $min_border;
  $border4 = $min_border;
}
if ( $param[ 'menu' ] == 'bl' ) {
  $border1 = $min_border;
  $border2 = $min_border;
  $border3 = (!empty( $param[ 'menu_2' ][ 'item_type' ] )) ? $max_border : $min_border;
  $border4 = (!empty( $param[ 'menu_1' ][ 'item_type' ] )) ? $max_border : $min_border;
}

$indenting = !empty( $param[ 'indenting' ] ) ? $param[ 'indenting' ] . 'px' : '75px';
$button_margin = !empty( $param[ 'button_margin' ] ) ? $param[ 'button_margin' ] . 'px' : '20px';

$b_background = !empty( $param[ 'b_background' ] ) ? $param[ 'b_background' ] : '#333333';
$o_background = !empty( $param[ 'o_background' ] ) ? $param[ 'o_background' ] : 'rgba(0,0,0,3)';

$color = !empty( $param[ 'color' ] ) ? $param[ 'color' ] : '#000000';
$hcolor = !empty( $param[ 'hcolor' ] ) ? $param[ 'hcolor' ] : '#fff';
$icolor = !empty( $param[ 'icolor' ] ) ? $param[ 'icolor' ] : '#fff';
$button_size = !empty( $param[ 'button_size' ] ) ? $param[ 'button_size' ] . 'px' : '40px';

$icon_size =  !empty( $param[ 'icon_size' ] ) ? $param[ 'icon_size' ] . 'px' : '48px';
$t_background =  !empty( $param[ 't_background' ] ) ? $param[ 't_background' ] : '#333333';
$tooltip_size =  !empty( $param[ 'tooltip_size' ] ) ? $param[ 'tooltip_size' ] . 'px' : '24px';
$tooltip_size_height = !empty( $param[ 'tooltip_size' ] ) ? $param[ 'tooltip_size' ] + 2 . 'px' : '26px';
$t_color = !empty( $param[ 't_color' ] ) ? $param[ 't_color' ] : '#ffffff';
$ihcolor = !empty( $param[ 'ihcolor' ] ) ? $param[ 'ihcolor' ] : '#ffffff';

$css = '
  .bt-menu {
    border-color: ' . $b_background . ';  
  }
  .bt-menu.bt-menu-open {
     background-color: ' . $o_background . ';
  }
  .bt-menu-pos-tl {
    left: ' . $button_margin . ';
    top: ' . $button_margin . ';
  }
  .bt-menu-pos-tr {
    right: ' . $button_margin . ';
    top: ' . $button_margin . ';
  }
  .bt-menu-pos-br {
    right: ' . $button_margin . ';
    bottom: ' . $button_margin . ';
  }
  .bt-menu-pos-bl {
    left: ' . $button_margin . ';
    bottom: ' . $button_margin . ';
  }
  .bt-menu-trigger span,
  .bt-menu-trigger span:before,
  .bt-menu-trigger span:after { 
    background-color: ' . $color . '; 
  }
  .bt-menu ul li a:before{ 
    color: ' . $hcolor . ';
  }
  .bt-menu ul li a:hover:before, 
  .bt-menu ul li a:focus:before {
    color: ' . $ihcolor . ';
  }
  .bt-menu.bt-menu-open { 
    border-width: ' . $border1 . ' ' . $border2 . ' ' . $border3 . ' ' . $border4 . ' ;
  }
  .bt-vertical {
    line-height: ' . $max_border .';
  }
  .bt-menu ul li { 
    width: ' . $max_border . ';
    height: ' . $max_border . ';
    line-height: ' . $max_border . ';
  } 
  .bt-menu ul li a { 
    height: ' . $max_border . ';
    line-height: ' . $max_border . ';
  }
  .bt-menu-trigger{ 
    width: ' . $button_size . ';
    height: ' . $button_size . ';
  }
  .bt-menu ul li a:before {
    font-size:
  }
  .bt-menu ul li a:before {
    font-size: ' . $icon_size . ';
  }
  .bt-menu em {
    background: ' . $t_background . ';
    font-size: ' . $tooltip_size . ';
    line-height: ' . $tooltip_size_height . ';
    color: ' . $t_color . ';
  }
  .bt-menu-tl ul:first-of-type {
    left: 0;
    top: ' . $indenting . ';
  }
  .bt-menu-tl ul:nth-of-type(2) { 
    left: ' . $indenting . '; 
    top: 0;
  }
  .bt-menu-tr ul:first-of-type { 
    right: 0; 
    top: ' . $indenting . ';
  }
  .bt-menu-tr ul:nth-of-type(2) { 
    right: ' . $indenting . ';
    top: 0; 
   }
  .bt-menu-br ul:first-of-type { 
    right: 0; 
    bottom: ' . $indenting . '; 
  } 
  .bt-menu-br ul:nth-of-type(2) {
    right: ' . $indenting . '; 
    bottom: 0; 
  } 
  .bt-menu-bl ul:first-of-type { 
    left: 0; 
    bottom: ' . $indenting . '; 
  } 
  .bt-menu-bl ul:nth-of-type(2) {
    left: ' . $indenting . '; 
    bottom: 0; 
  }
';

if ( ! empty( $param['include_mobile'] ) ) {
  $screen = ! empty( $param['screen'] ) ? $param['screen'] : 480;
  $css    .= '
		@media only screen and (max-width: ' . $screen . 'px){
			.bt-menu {
				display:none;
			}
		}';
}
if ( ! empty( $param['include_more_screen'] ) ) {
  $screen_more = ! empty( $param['screen_more'] ) ? $param['screen_more'] : 1200;
  $css         .= '
		@media only screen and (min-width: ' . $screen_more . 'px){
			.bt-menu {
				display:none;
			}
		}';
}

echo $css;

?>
