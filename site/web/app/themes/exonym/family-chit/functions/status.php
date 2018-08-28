<?php

function chit_status_assign($post_id) {
  if(current_user_can('edit_posts')){
    $currentStatus = get_field('status');
    $status = $currentStatus;
    $leaveAlone = array('paid', 'balanceforward', 'removed');
    $today = current_time('Ymd');
    $date = get_field('due')['date'];
    $late = get_field('due')['late_date'];
    $cutoff = get_field('due')['cutoff_date'];
    if($date <= $today && !in_array($currentStatus, $leaveAlone) && !empty($date)) {
      if($late <= $today) {
        if($cutoff <= $today & !empty($cutoff)) {
          $status = 'terminated';
        } else {
          $status = 'pastdue';
        }
      } else {
        $status = 'due';
      }
    } elseif($date > $today) {
      $status = 'due';
    }
    update_field('field_5b3831c785c0d', $status, $post_id);
  }
}
add_action('acf/save_post', 'chit_status_assign', 20);
