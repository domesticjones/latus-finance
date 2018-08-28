<?php

// BILL: Get the amount
function chit_calc_amount() {
  $today = strtotime(current_time('Ymd'));
  $late = strtotime(get_field('due')['late_date']);
  $fee = get_field('due')['late_fee'];
  $amount = get_field('amount');
  $sum = 0;
  if(!empty($fee) || $fee == 0) {
    if($today >= $late && !empty($late)) {
      $sum = $fee + $amount;
    } else {
      $sum = $amount;
    }
  }
  echo '<span class="bill-amount">$' . number_format($sum, 2, '.', ',');
  if($sum > $amount) {
    echo '<small>$' . number_format($amount, 2, '.', ',') . ' + $' . number_format($fee, 2, '.', ',') . ' (late fee)</small>';
  }
  echo '</span>';
}

// BILL: Create the status field
/* NOTE: This expects $number to be a strotime() date */
function chit_calc_dueStatus($status, $number, $before = '', $after = '') {
  $leaveAlone = array('paid', 'balanceforward', 'removed', 'nodate');
  if(!in_array($status, $leaveAlone) ) {
    echo '<span class="bill-dueterm bill-due-' . $status . '">' . $before . round($number / (60 * 60 * 24)) . $after . '</span>';
  } else {
    echo '<span class="bill-dueterm bill-due-' . $status . '">' . $before . '</span>';
  }
}

// BILL: Display due date and distance
function chit_calc_due() {
  $leaveAlone = array('paid', 'balanceforward', 'removed');
  $today = strtotime(current_time('Ymd'));
  $status = get_field('status');
  $dueDate = strtotime(get_field('due')['date']);
  $late = strtotime(get_field('due')['late_date']);
  $cutoff = strtotime(get_field('due')['cutoff_date']);
  $date = new DateTime(get_field('due')['date']);
  if(!in_array($status['value'], $leaveAlone) && !empty($dueDate)) {
    if($today >= $cutoff && !empty($cutoff)) {
      $daysTerminated = ($today) - ($cutoff);
      chit_calc_dueStatus($status['value'], $daysTerminated, 'Terminated ', ' days ago');
    } elseif($today >= $late && !empty($late)) {
      $daysLate = ($today) - ($late);
      chit_calc_dueStatus($status['value'], $daysLate, 'Due ', ' days ago');
    } elseif($today >= $dueDate && !empty($dueDate)) {
      if(empty($late)) {
        $daysLate = ($today) - ($dueDate);
        chit_calc_dueStatus($status['value'], $daysLate, 'Due ', ' days ago');
      } else {
        $daysLate = ($late) - ($today);
        chit_calc_dueStatus($status['value'], $daysLate, 'Late in ', ' days');
      }
    } elseif($today <= $dueDate && !empty($dueDate)) {
      $daysLate = ($dueDate) - ($today);
      chit_calc_dueStatus($status['value'], $daysLate, 'Due in ', ' days');
    }
  } elseif(in_array($status['value'], $leaveAlone)) {
    chit_calc_dueStatus($status['value'], 0, $status['label']);
  }
  if(!empty($dueDate)) {
    echo '<small>' . $date->format('M jS, Y') . '</small>';
  } else {
    chit_calc_dueStatus('nodate', 0, 'No due date set');
  }
}

// BILL: Display status
function chit_calc_status() {
  $status = get_field('status');
  echo '<span class="bill-status bill-status-' . $status['value'] . '">' . $status['label'] . '</span>';
}
