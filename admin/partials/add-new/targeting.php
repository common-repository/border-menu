<?php
/**
 * Targeting
 *
 * @package     Wow_Pluign
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
include_once( 'settings/targeting.php' );

?>

<div id="targeting" class="postbox wow-sidebar">
  <h2><?php _e( 'Targeting', $this->text_domain ); ?></h2>
  <div class="inside">
    <div class="container">
      <div class="element">
        <h4><?php _e( 'Show on devices', $this->text_domain ); ?></h4>
				<?php echo self::option( $include_more_screen ); ?> <label
          for="include_more_screen"><?php _e( "Don't show on screens more", $this->text_domain ); ?></label><?php echo self::tooltip( $show_screen_help ); ?>
        <p/>
				<?php echo self::option( $screen_more ); ?>
				<?php echo self::option( $include_mobile ); ?> <label
          for="include_mobile"><?php _e( "Don't show on screens less", $this->text_domain ); ?></label><?php echo self::tooltip( $include_mobile_help ); ?>
        <p/>
				<?php echo self::option( $screen ); ?><p/>
      </div>
    </div>
    <?php echo '<span class="dashicons dashicons-migrate" style="color:#37c781;"></span> ';
    printf( __( '<a href="%s" target="_blank">Advanced features</a>',$this->text_domain ), esc_url( $this->pro_url ) );
    ?>
  </div>
</div>