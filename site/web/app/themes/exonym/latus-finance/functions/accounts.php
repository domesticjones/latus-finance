<?php
// ACCOUNT: List out all the account Payments
function chit_account_payments($payment, $account) {
  if($payment == 'auto') {
    if(have_rows('auto_withdraws', $account[0])) {
      while(have_rows('auto_withdraws', $account[0])) {
        the_row();
        echo 'Linked Account: <i>' . get_sub_field('linked_account') . '</i>';
      }
    }
  } elseif($payment == 'online') {
    if(have_rows('online_portals', $account[0])) {
      while(have_rows('online_portals', $account[0])) {
        the_row();
        $link = get_sub_field('url');
        $user = get_sub_field('user');
        echo '<a href="' . $link . '" target="_blank">' . parse_url($link, PHP_URL_HOST) . '<i>' . $user . '</i></a>';
      }
    }
  } elseif($payment == 'app') {
    if(have_rows('mobile_apps', $account[0])) {
      while(have_rows('mobile_apps', $account[0])) {
        the_row();
        $name = get_sub_field('device_name');
        $app = get_sub_field('app_name');
        $user = get_sub_field('user');
        echo 'The ' . $app . ' app on ' . $name . '<i>'. $user . '</i></a>';
      }
    }
  } elseif($payment == 'phone') {
    if(have_rows('phone_contacts', $account[0])) {
      while(have_rows('phone_contacts', $account[0])) {
        the_row();
        $name = get_sub_field('name');
        $number = get_sub_field('number');
        echo '<a href="tel:' . $number . '" target="_blank">' . $number . '<i>' . $name . '</i></a>';
      }
    }
  } elseif($payment == 'mail') {
    if(have_rows('snail_mail', $account[0])) {
      while(have_rows('snail_mail', $account[0])) {
        the_row();
        $address = get_sub_field('address');
        $name = get_sub_field('name');
        $payment = get_sub_field('payment_type');
        echo 'Send ' . $payment . ' to:' . '<i>' . $name . '<br />' . $address . '</i></a>';
      }
    }
  } elseif($payment == 'person') {
    if(have_rows('in_person', $account[0])) {
      while(have_rows('in_person', $account[0])) {
        the_row();
        $address = get_sub_field('address');
        $notes = get_sub_field('notes');
        $payment = get_sub_field('payment_type');
        echo 'Have a ' . $payment . ' ready at:' . '<i>' . $address . '<br />' . $notes . '</i></a>';
      }
    }
  } else {
    echo 'No payment type selected';
  }
}

// BILL: List all Due Information
function chit_bill_dueList($due) {
  if(!empty($due)) {
    $dueDate = new DateTime($due['date']);
    $dueLate = new DateTime($due['late_date']);
    $dueCutoff = new DateTime($due['cutoff_date']);
    $fee = $due['late_fee'];
    if(empty($dueDate)) { $dueDateCheck = 'No Due Date Assigned'; } else { $dueDateCheck = $dueDate->format('l - M j, Y'); }
    if(empty($dueLate)) { $dueLateCheck = 'No Late Due Date Assigned'; } else { $dueLateCheck = $dueLate->format('l - M j, Y'); }
    if(empty($dueCutoff)) { $dueCutoffCheck = 'No Cutoff Date Assigned'; } else { $dueCutoffCheck = $dueLate->format('l - M j, Y'); }
    if($fee === 0) { $feeCheck = 'No penalties for being late'; } elseif(empty($fee)) { $feeCheck = 'No Late Fee Defined'; } else { $feeCheck = $fee; }
    echo '<ul class="bill-due">';
      echo '<li class="bill-due-status">Status: ';
        chit_calc_status();
      echo '</li>';
      echo '<li>Due Date: ' . $dueDateCheck . '</li>';
      echo '<li>Late Date: ' . $dueLateCheck . '</li>';
      echo '<li>Late Fee: $' . number_format($feeCheck, 2) . '</li>';
      echo '<li>Cutoff Date: ' . $dueLateCheck . '</li>';
    echo '</ul>';
  }
}
?>
