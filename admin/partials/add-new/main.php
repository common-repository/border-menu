<?php
/**
 * Main Settings
 *
 * @package     Wow_Plugin
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'settings/main.php' );

?>


<div class="container">
  <div class="element">
		<?php _e( 'Position', $this->text_domain ); ?>
		<?php echo self::option( $menu ); ?>
  </div>
  <div class="element">
  </div>
  <div class="element">
  </div>
</div>

<div class="container">
  <div class="element">
    <?php _e( 'Button color', $this->text_domain ); ?><br/>
    <?php echo self::option( $color ); ?>
  </div>
  <div class="element">
  </div>
  <div class="element">
  </div>
</div>