<?php
/**
 * Admin Class
 *
 * @package     Wow_Plugin
 * @subpackage
 * @copyright   Copyright (c) 2018, Dmytro Lobov
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */

namespace border_menu;

if ( !defined( 'ABSPATH' ) ) {
  exit;
}

class Wow_Admin_Class
{

  private $arg;

  public function __construct( $arg ) {
    $this->plugin_name = $arg[ 'plugin_name' ];
    $this->plugin_menu = $arg[ 'plugin_menu' ];
    $this->plugin_home_url = $arg[ 'plugin_home_url' ];
    $this->plugin_version = $arg[ 'plugin_version' ];
    $this->plugin_file = $arg[ 'plugin_file' ];
    $this->plugin_slug = $arg[ 'plugin_slug' ];
    $this->plugin_dir = $arg[ 'plugin_dir' ];
    $this->plugin_url = $arg[ 'plugin_url' ];
    $this->plugin_pref = $arg[ 'plugin_pref' ];
    $this->author_url = $arg[ 'author_url' ];
    $this->pro_url = $arg[ 'pro_url' ];
    $this->shortcode = $arg[ 'shortcode' ];
    $this->text_domain = $arg[ 'text_domain' ];

    add_filter( 'plugin_action_links', array( $this, 'action_links' ), 10, 2 );
    add_action( 'admin_menu', array( $this, 'add_admin_page' ) );
    add_filter( 'admin_footer_text', array( $this, 'rate_us' ) );
    add_action( 'plugins_loaded', array( $this, 'plugin_check' ) );

    if ( get_option( $this->plugin_slug . '_notice_action' ) != 'read' ) {
      add_action( 'admin_notices', array( $this, 'general_admin_notice' ) );
      add_action( 'admin_enqueue_scripts', array( $this, 'notice_script' ) );
      add_action( 'wp_ajax_border_menu_notice_action', array( $this, 'notice_action_callback' ) );
    }
  }

  static function tooltip( $arg ) {
    $tooltip = '';
    foreach ( $arg as $key => $value ) {
      if ( $key == 'title' ) {
        $tooltip .= $value . '<p/>';
      } elseif ( $key == 'ul' ) {
        $tooltip .= '<ul>';
        $arr = $value;
        foreach ( $arr as $val ) {
          $tooltip .= '<li>' . $val . '</li>';
        }
        $tooltip .= '</ul>';
      } else {
        $tooltip .= $value;
      }
    }
    $tooltip = "<span class='wow-help dashicons dashicons-editor-help' title='" . $tooltip . "'></span>";

    return $tooltip;
  }

  static function option( $arg ) {
    $id = isset( $arg[ 'id' ] ) ? $arg[ 'id' ] : null;
    $name = isset( $arg[ 'name' ] ) ? $arg[ 'name' ] : '';
    $type = isset( $arg[ 'type' ] ) ? $arg[ 'type' ] : '';
    $func = !empty( $arg[ 'func' ] ) ? ' onchange="' . $arg[ 'func' ] . '"' : '';
    $options = isset( $arg[ 'option' ] ) ? $arg[ 'option' ] : '';
    $val = $arg[ 'val' ];
    $separator = isset( $arg[ 'sep' ] ) ? $arg[ 'sep' ] : '';
    $class = isset( $arg[ 'class' ] ) ? ' class="' . $arg[ 'class' ] . '"' : '';
    // create radio fields
    if ( $type == 'radio' ) {
      $option = '';
      foreach ( $options as $key => $value ) {
        $select = ($key == $val) ? 'checked="checked"' : '';
        $option .= '<input name="' . $name . '" type="radio" value="' . $key . '" id="' . $id . '_' . $key . '" ' . $select . $func . $class . '><label for="' . $id . '_' . $key . '"> ' . $value . '</label>' . $separator;
      }
      $field = $option;
    } // create checkbox field
    elseif ( $type == 'checkbox' ) {
      $select = !empty( $val ) ? 'checked="checked"' : '';
      $field = '<input type="checkbox" ' . $select . $func . $class . ' id="' . $id . '" >' . $separator;
      $field .= '<input type="hidden" name="' . $name . '" value="">';
    } // create text field
    elseif ( $type == 'text' || $type == 'number' || $type == 'hidden' ) {
      $option = '';
      if ( is_array( $options ) ) {
        foreach ( $options as $key => $value ) {
          $option .= ' ' . $key . '="' . $value . '"';
        }
      }
      $field = '<input name="' . $name . '" type="' . $type . '" value="' . $val . '" id="' . $id . '"' . $func . $option . $class . '>' . $separator;
    } // create color field
    elseif ( $type == 'color' ) {
      $field = '<input name="' . $name . '" type="text" value="' . $val . '" class="wp-color-picker-field" data-alpha="true" id="' . $id . '">' . $separator;
    } // create select field
    elseif ( $type == 'select' ) {
      $option = '';
      foreach ( $options as $key => $value ) {
        $select = ($key == $val) ? 'selected="selected"' : '';
        $option .= '<option value="' . $key . '" ' . $select . '>' . $value . '</option>';
      }
      $field = '<select name="' . $name . '"' . $func . $class . ' id="' . $id . '">';
      $field .= $option;
      $field .= '</select>' . $separator;
    } // create editor field
    elseif ( $type == 'editor' ) {
      $settings = array(
        'wpautop' => 0, 'textarea_name' => '' . $name . '', 'textarea_rows' => 15, );
      $field = wp_editor( $val, $id, $settings );
    } // create textarea field
    elseif ( $type == 'textarea' ) {
      $field = '<textarea name="' . $name . '" id="' . $id . '">' . $val . '</textarea>' . $separator;
    }

    return $field;
  }

  public function add_admin_page() {
    $icon = 'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBzdGFuZGFsb25lPSJubyI/Pgo8IURPQ1RZUEUgc3ZnIFBVQkxJQyAiLS8vVzNDLy9EVEQgU1ZHIDIwMDEwOTA0Ly9FTiIKICJodHRwOi8vd3d3LnczLm9yZy9UUi8yMDAxL1JFQy1TVkctMjAwMTA5MDQvRFREL3N2ZzEwLmR0ZCI+CjxzdmcgdmVyc2lvbj0iMS4wIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciCiB3aWR0aD0iNTEyLjAwMDAwMHB0IiBoZWlnaHQ9IjUxMi4wMDAwMDBwdCIgdmlld0JveD0iMCAwIDUxMi4wMDAwMDAgNTEyLjAwMDAwMCIKIHByZXNlcnZlQXNwZWN0UmF0aW89InhNaWRZTWlkIG1lZXQiPgo8bWV0YWRhdGE+CkNyZWF0ZWQgYnkgcG90cmFjZSAxLjE1LCB3cml0dGVuIGJ5IFBldGVyIFNlbGluZ2VyIDIwMDEtMjAxNwo8L21ldGFkYXRhPgo8ZyB0cmFuc2Zvcm09InRyYW5zbGF0ZSgwLjAwMDAwMCw1MTIuMDAwMDAwKSBzY2FsZSgwLjEwMDAwMCwtMC4xMDAwMDApIgpmaWxsPSIjMDAwMDAwIiBzdHJva2U9Im5vbmUiPgo8cGF0aCBkPSJNMjQ4MyA1MTAwIGMtNzEgLTQzIC02OCAtMTggLTcxIC01ODUgbC00IC01MTAgLTc3NCAtNTUwIGMtNDI2IC0zMDIKLTc4OCAtNTYzIC04MDQgLTU4MCAtMTMwIC0xMzUgLTcxIC0zNjggMTA5IC00MzIgbDUxIC0xOCAwIC0xMjEyIDAgLTEyMTMgMjA1CjAgMjA1IDAgMCAxMzA5IDAgMTMwOSAzOCAyOSBjMjAgMTcgMjc5IDIwMSA1NzQgNDExIGw1MzcgMzgyIDU1NiAtMzkyIDU1NQotMzkzIDAgLTEzMjcgMCAtMTMyOCAyMDUgMCAyMDUgMCAwIDEyMTAgYzAgOTYwIDMgMTIxMSAxMyAxMjE0IDYgMiAzNSA5IDYyCjE1IDE4MiA0MiAyNjQgMjY2IDE1MiA0MTMgLTIyIDI5IC0yNjkgMjA5IC04MTkgNTk3IGwtNzg3IDU1NiAtMSA4OCAwIDg3IDQ4NQowIDQ4NSAwIC0xMzYgMjAxIC0xMzcgMjAxIDEzMiAxOTMgYzcyIDEwNyAxMzEgMTk2IDEzMSAxOTkgMCAzIC0yMTYgNiAtNDgwIDYKbC00ODAgMCAwIDIzIGMwIDg3IC0xMjcgMTQ2IC0yMDcgOTd6Ii8+CjxwYXRoIGQ9Ik0yMTM2IDI4MjggbC00MTggLTI3MSA1IC00NTYgYzQgLTQ3NSA2IC01MDIgNDkgLTU1NiA0OCAtNjEgMzAgLTYwCjc0NyAtNjMgNzIyIC0zIDc0MyAtMiA3OTcgNTIgNjEgNjEgNjQgODggNjMgNTg1IGwwIDQ0NiAtMzg2IDI1MCBjLTIxMiAxMzgKLTM5OCAyNTggLTQxMyAyNjcgbC0yNiAxOCAtNDE4IC0yNzJ6IG02MzIgLTM1MyBsMjAyIC0xMzAgMCAtMjI3IDAgLTIyOCAtNDE1CjAgLTQxNSAwIDAgMjI4IDAgMjI3IDIwMyAxMzIgYzExMSA3MyAyMDcgMTMyIDIxMyAxMzAgNiAtMSAxMDEgLTYwIDIxMiAtMTMyeiIvPgo8cGF0aCBkPSJNMjQ0NSAxMzQxIGMtMzA1IC00OSAtNTIxIC0yNTIgLTU3MCAtNTM1IC0xMSAtNjggLTE1IC0xNzEgLTE1IC00NDcKbDAgLTM1OSAyMTAgMCAyMTAgMCAwIDM2OCBjMCAzNjMgMCAzNjcgMjQgNDE3IDQxIDg5IDEyMiAxNDUgMjIzIDE1MyAxMTcgOQoyMTQgLTQxIDI2OCAtMTM5IGwzMCAtNTQgMyAtMzczIDMgLTM3MiAyMDQgMCAyMDUgMCAwIDM4OCBjMCA0MzQgLTIgNDQ5IC02OQo1ODcgLTg0IDE3MCAtMjQzIDI5NiAtNDQ2IDM1MSAtNjMgMTcgLTIxNSAyNSAtMjgwIDE1eiIvPgo8L2c+Cjwvc3ZnPgo=';

    add_submenu_page( 'wow-company', $this->plugin_name . ' version ' . $this->plugin_version, $this->plugin_menu, 'manage_options', $this->plugin_slug, array(
      $this, 'plugin_page' ) );
  }

  public function plugin_page() {
    global $typenow;
    $typenow = $this->plugin_slug;
    require_once plugin_dir_path( __FILE__ ) . 'partials/main.php';
    self:: admin_style_script();    
  }

  public function admin_style_script() {
    wp_enqueue_style( $this->plugin_slug . '-admin', $this->plugin_url . 'assets/css/admin-style.min.css', false, $this->plugin_version );

    wp_enqueue_style( 'wow-plugin-fontawesome', $this->plugin_url . 'assets/vendors/fontawesome/css/fontawesome-all.min.css', null, '5.2.0' );
    // iconpicker
    wp_enqueue_script( 'wow-plugin-fonticonpicker', $this->plugin_url . 'assets/vendors/fonticonpicker/fonticonpicker.min.js', array( 'jquery' ) );
    wp_enqueue_style( 'wow-plugin-fonticonpicker', $this->plugin_url . 'assets/vendors/fonticonpicker/css/fonticonpicker.min.css' );
    wp_enqueue_style( 'wow-plugin-fonticonpicker-darkgrey', $this->plugin_url . 'assets/vendors/fonticonpicker/fonticonpicker.darkgrey.min.css' );
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker' );
    wp_enqueue_script( 'jquery-ui-tooltip' );
    wp_enqueue_script( $this->plugin_slug . '-admin', $this->plugin_url . 'assets/js/admin-script.min.js', array( 'jquery' ), $this->plugin_version );
  }

  public function action_links( $actions, $plugin_file ) {
    if ( false === strpos( $plugin_file, $this->plugin_file ) ) {
      return $actions;
    }
    $settings_link = '<a href="admin.php?page=' . $this->plugin_slug . '">' . __( 'Settings', $this->plugin_pref ) . '</a>';
    array_unshift( $actions, $settings_link );

    return $actions;
  }

  public function rate_us( $footer_text ) {
    global $typenow;
    if ( $typenow == $this->plugin_slug ) {
      $rate_text = sprintf( __( 'Thank you for using <a href="%1$s" target="_blank">' . $this->plugin_name . '</a>! Please <a href="%2$s" target="_blank">rate us on WordPress</a>', $this->plugin_pref ), $this->plugin_home_url, $this->plugin_home_url . 'reviews/?rate=5#new-post' );

      return str_replace( '</span>', '', $footer_text ) . ' | ' . $rate_text . '</span>';
    } else {
      return $footer_text;
    }
  }

  function general_admin_notice() {
    echo '<div class="notice notice-warning wow-plugin-notice is-dismissible">
				<p><b>' . $this->plugin_name . '</b>! ' . __( 'In connection with the upgrade of Font Awesome to version 5, we ask you to edit and update all previously created items.', $this->text_domain ) . ' <a href="' . admin_url() . 'admin.php?page=' . $this->plugin_slug . '">Go to the ' . $this->plugin_name . ' page</a></p>
				</div>';
  }

  function notice_script() {
    wp_enqueue_script( $this->plugin_slug . '-notice-update', $this->plugin_url . 'assets/js/notice-update.min.js', array( 'jquery' ), '1.0', true );
  }

  function notice_action_callback() {
    update_option( $this->plugin_slug . '_notice_action', 'read' );
    wp_die();
  }

  public function plugin_check() {
    if ( isset( $_POST[ $this->plugin_slug . '_nonce' ] ) ) {
      if ( !empty( $_POST ) && wp_verify_nonce( $_POST[ $this->plugin_slug . '_nonce' ], $this->plugin_slug . '_action' ) && current_user_can( 'manage_options' ) ) {
        self:: save_data();
      }
    }
  }

  public function save_data() {
    global $wpdb;
    $save_class = __NAMESPACE__ . '\\Wow_DB_Update';
    $objItem = new $save_class( $this->plugin_dir, $this->plugin_slug );
    $add = (isset( $_REQUEST[ 'add' ] )) ? absint( $_REQUEST[ 'add' ] ) : '';
    $data = (isset( $_REQUEST[ 'data' ] )) ? sanitize_text_field( $_REQUEST[ 'data' ] ) : '';
    $page = sanitize_text_field( $_REQUEST[ 'page' ] );
    $tool_id = absint( $_POST[ 'tool_id' ] );
    $info = array();
    $info[ 'id' ] = $tool_id;
    $info[ 'title' ] = sanitize_text_field( $_POST[ 'title' ] );
    $info[ 'param' ] = $_POST[ 'param' ];
    if ( isset( $_POST[ 'submit' ] ) ) {
      if ( absint( $_POST[ 'add' ] ) == '1' ) {
        $objItem->addNewItem( $data, $info );
        header( 'Location:admin.php?page=' . $page . '&tab=add_new&act=update&id=' . $tool_id . '&info=saved' );
        exit;
      } elseif ( absint( $_POST[ 'add' ] ) == '2' ) {
        $objItem->updItem( $data, $info );
        header( 'Location:admin.php?page=' . $page . '&tab=add_new&act=update&id=' . $tool_id . '&info=update' );
        exit;
      }
    }
  }
}