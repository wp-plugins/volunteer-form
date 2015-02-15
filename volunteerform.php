<?php
/**
* Plugin Name: Volunteer Form
* Plugin URL: https://www.nikcub.com/project/volunteerform
* Description: Plugin that provides a volunteer form as a shortcode
* Version: 0.1.6
* Author: Nik
* Author URI: https://www.nikcub.com/
*/

/*  Copyright 2015  Nik Cubrilovic <nikcub@gmail.com>

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

$vf_db_version = '0.1.1';
define('VF_NAME', 'volunteerform');
define('VF_DEBUG', false);
define('VF_DB_VERSION', '0.1');
define('VF_PATH', dirname(__FILE__));
define('VF_URL', WP_PLUGIN_URL . '/' . VF_NAME);
define('VF_EXPORT_URL', VF_URL . '/' . 'excel.php');

function vf_debug($str) {
  if(VD_DEBUG) {
    print "<pre>" . $str . "</pre>";
  }
}

function vf_init() {
  $options = get_option('vf_settings');
  if(isset($options['debug'])) {
    define('VF_DEBUG', true);
  }
  if(isset($options['cdn'])) {
    define('VF_CDN', true);
  } else {
    define('VF_CDN', false);
  }
  if(isset($options['cssmin'])) {
    define('VF_CSSMIN', true);
  } else {
    define('VF_CSSMIN', false);
  }

  wp_register_style('vf_style_bootstrap_hosted', '://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css');
  wp_register_style('vf_style_bootstrap', plugins_url('style/volunteerform.css', __file__));
  wp_register_style('vf_style_bootstrap_min', plugins_url('style/volunteerform.min.css', __file__));
  // wp_register_style('vf_style_bootstrap_min', 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css');
}

function vf_html_form() {
  if(VF_CDN) {
    wp_enqueue_style('vf_style_bootstrap_hosted');
  } else if (VF_CSSMIN) {
    wp_enqueue_style('vf_style_bootstrap_min');
  } else {
    wp_enqueue_style('vf_style_bootstrap');
  }
  include(sprintf("%s/templates/form.php", dirname(__FILE__)));
}

function vf_shortcode() {
  ob_start();
  $r = vf_form_submit();
  if($r == true) {
    vf_form_confirm();
  } else {
    vf_html_form();
  }
  return ob_get_clean();
}

function vf_form_confirm() {
  print "Thank you for your submission.";
}

function vf_form_submit() {
  global $wpdb;

  $data = array(
      'firstname' => '',
      'surname' => '',
      'address1' => '',
      'address2' => '',
      'suburb' => '',
      'postcode' => '',
      'branch' => '',
      'email' => '',
      'phone_h' => '',
      'phone_w' => '',
      'phone_m' => '',
      'assist' => '',
      'assist_other' => '',
      'time_mon' => '',
      'time_tue' => '',
      'time_wed' => '',
      'time_thu' => '',
      'time_fri' => '',
      'time_sat' => '',
      'time_sun' => '',
    );

  if (isset($_POST['vf-form-submit'])) {
    foreach($data as $k => $v) {
      if(!isset($_POST[$k])) {
        $_POST[$data] = '';
      }
    }
    $data['firstname'] = $_POST['firstname'];
    $data['surname'] = $_POST['surname'];
    $data['address1'] = $_POST['address1'];
    $data['address2'] = $_POST['address2'];
    $data['suburb'] = $_POST['suburb'];
    $data['postcode'] = $_POST['postcode'];
    $data['branch'] = $_POST['branch'];
    $data['email'] = $_POST['email'];
    $data['phone_h'] = $_POST['phone_h'];
    $data['phone_w'] = $_POST['phone_w'];
    $data['phone_m'] = $_POST['phone_m'];
    $data['assist'] = vf_pack_set($_POST['assist']);
    $data['assist_other'] = $_POST['assist_other'];
    $data['time_mon'] = vf_pack_set($_POST['time_mon']);
    $data['time_tue'] = vf_pack_set($_POST['time_tue']);
    $data['time_wed'] = vf_pack_set($_POST['time_wed']);
    $data['time_thu'] = vf_pack_set($_POST['time_thu']);
    $data['time_fri'] = vf_pack_set($_POST['time_fri']);
    $data['time_sat'] = vf_pack_set($_POST['time_sat']);
    $data['time_sun'] = vf_pack_set($_POST['time_sun']);

    $data = array_map(addslashes, $data);
    $r = vf_insert_record($data);
    if($r == 1)
      return true;

    if(VF_DEBUG) {
      $wpdb->print_error();
      print 'error';
    }
  }

  return false;
}

function vf_pack_set($val) {
  return join(",", $val);
}

function vf_init_db() {
  global $wpdb;
  global $vf_db_version;

  $table_name = $wpdb->prefix . 'volunteerinfo';

  $charset_collate = $wpdb->get_charset_collate();

  // http://buysql.com/mysql/55-edit-set-type-values.html
  $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    firstname varchar(256),
    surname varchar(256),
    address1 varchar(256),
    address2 varchar(256),
    suburb varchar(256),
    postcode varchar(256),
    branch varchar(256),
    email varchar(256),
    phone_h varchar(256),
    phone_w varchar(256),
    phone_m varchar(256),
    assist SET('canvasing', 'door knocking', 'street stalls', 'letterboxing', 'sign', 'radio', 'letters editor', 'office', 'commuter', 'polling day'),
    assist_other text,
    time_mon set('6am', '9am', '12pm', '3pm', '6pm'),
    time_tue set('6am', '9am', '12pm', '3pm', '6pm'),
    time_wed set('6am', '9am', '12pm', '3pm', '6pm'),
    time_thu set('6am', '9am', '12pm', '3pm', '6pm'),
    time_fri set('6am', '9am', '12pm', '3pm', '6pm'),
    time_sat set('6am', '9am', '12pm', '3pm', '6pm'),
    time_sun set('6am', '9am', '12pm', '3pm', '6pm'),
    UNIQUE KEY id (id)
  ) $charset_collate;";

  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  $r = dbDelta($sql);

  add_option( 'vf_db_version', $vf_db_version );
}

function vf_insert_record($data) {
  global $wpdb;
  $table_name = $wpdb->prefix . 'volunteerinfo';

  if(VF_DEBUG) {
    $wpdb->show_errors();
  }

  $r = $wpdb->insert($table_name,
    array(
      'firstname' => $data['firstname'],
      'surname' => $data['surname'],
      'address1' => $data['address1'],
      'address2' => $data['address2'],
      'suburb' => $data['suburb'],
      'postcode' => $data['postcode'],
      'branch' => $data['branch'],
      'email' => $data['email'],
      'phone_h' => $data['phone_h'],
      'phone_w' => $data['phone_w'],
      'phone_m' => $data['phone_m'],
      'assist' => $data['assist'],
      'assist_other' => $data['assist_other'],
      'time_mon' => $data['time_mon'],
      'time_tue' => $data['time_tue'],
      'time_wed' => $data['time_wed'],
      'time_thu' => $data['time_thu'],
      'time_fri' => $data['time_fri'],
      'time_sat' => $data['time_sat'],
      'time_sun' => $data['time_sun'],
  ));

  return $r;
}

function vf_db_fetch() {
  global $wpdb;
  $table_name = $wpdb->prefix . 'volunteerinfo';

  if(VF_DEBUG) {
    $wpdb->show_errors();
  }
  $sql = sprintf("SELECT * FROM %s", $table_name);
  return $wpdb->get_results($sql);
}

function vf_plugin_settings_page() {
  if(!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
}

function vf_add_menu() {
  add_menu_page('Volunteers', 'Volunteers', 'manage_options', 'vf-menu-handle', 'vf_menu_page');
  add_submenu_page('vf-menu-handle', 'Volunteers', 'List', 'manage_options', 'vf-menu-handle', 'vf_menu_page');
  add_submenu_page('vf-menu-handle', 'Settings', 'Settings', 'manage_options', 'vf-menu-settings', 'vf_menu_settings');

  // add_menu_page('My Custom Page', 'My Custom Page', 'manage_options', 'my-top-level-slug');
  // add_submenu_page( 'my-top-level-slug', 'My Custom Page', 'My Custom Page', 'manage_options', 'my-top-level-slug');
  // add_submenu_page( 'my-top-level-slug', 'My Custom Submenu Page', 'My Custom Submenu Page', 'manage_options', 'my-secondary-slug');
}

function vf_menu_page() {
  if(!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  $volunteers = vf_db_fetch();
  include(sprintf("%s/templates/list.php", dirname(__FILE__)));
}

function vf_menu_settings() {
  if(!current_user_can('manage_options')) {
    wp_die(__('You do not have sufficient permissions to access this page.'));
  }
  include(sprintf("%s/templates/settings.php", dirname(__FILE__)));
}

function vf_init_settings() {
  register_setting('wp_plugin_template-group', 'setting_a');
}

function vf_init_admin() {
  register_setting( 'vf_options', 'vf_settings' );
  // register_setting( 'vf_options', 'vf_debug' );
}

function vf_update_db_check() {
  global $vf_db_version;
  if ( get_site_option( 'vf_db_version' ) != $vf_db_version ) {
      vf_init_db();
  }
}

register_activation_hook(__FILE__, 'vf_init_db');
add_action('plugins_loaded', 'vf_update_db_check');
add_action('init', 'vf_init');
add_action('admin_menu', 'vf_add_menu');
add_action('admin_init', 'vf_init_admin');

add_shortcode( 'volunteer_form', 'vf_shortcode' );

