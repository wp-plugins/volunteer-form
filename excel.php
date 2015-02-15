<?php

@set_time_limit(0);
@ini_set('memory_limit', '256M');
@ini_set('display_errors', 'off');

function cleanData(&$str) {
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

$filename = "volunteer_data_" . date('Ymd') . ".xls";

global $wpdb, $table_prefix;

if(!isset($wpdb)) {
    require_once('../../../wp-config.php');
    require_once('../../../wp-includes/wp-db.php');
}

if ( !current_user_can('manage_options') ) {
  die();
}

$sql = "select
firstname,
surname,
address1,
address2,
suburb,
postcode,
branch,
email,
phone_h as phone_home,
phone_w as phone_work,
phone_m as mobile,
if(find_in_set('canvasing', assist) > 0, 1, 0) as phone_canvasing,
if(find_in_set('door knocking', assist) > 0, 1, 0) as door_knocking,
if(find_in_set('street stalls', assist) > 0, 1, 0) as street_stalls,
if(find_in_set('letterboxing', assist) > 0, 1, 0) as letterboxing,
if(find_in_set('sign', assist) > 0, 1, 0) as sign_site,
if(find_in_set('radio', assist) > 0, 1, 0) as talkback_radio,
if(find_in_set('letters editor', assist) > 0, 1, 0) as letters_editor,
if(find_in_set('office', assist) > 0, 1, 0) as staff_campaign_office,
if(find_in_set('commuter', assist) > 0, 1, 0) as commuter_hub_campaign,
if(find_in_set('polling day', assist) > 0, 1, 0) as polling_day,
assist_other,
time_mon,
time_tue,
time_wed,
time_thu,
time_fri,
time_sat,
time_sun
from wp_volunteerinfo
order by id desc";

$table_name = $wpdb->prefix . 'volunteerinfo';
$data = $wpdb->get_results($sql, ARRAY_A);

header("Content-Disposition: attachment; filename=\"$filename\"");
header("Content-Type: application/vnd.ms-excel");

$flag = false;
foreach($data as $row) {
    if(!$flag) {
      echo implode("\t", array_keys($row)) . "\r\n";
      $flag = true;
    }
    array_walk($row, 'cleanData');
    echo implode("\t", array_values($row)) . "\r\n";
}
exit;