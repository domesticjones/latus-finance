<?php
  $leaveAlone = array('paid', 'balanceforward', 'removed');
  $status = get_field('status');
  $account = get_field('account');
  $payments = get_field('preferred_payment', $account[0]);
  $due = get_field('due');
?>
<section class="bill-details">
  <h1><span>Info about</span><?php the_title(); ?></h1>
  <?php the_field('notes'); ?>
  <?php if($account): ?>
    <h2><?php echo get_the_title($account[0], 'large'); ?></h2>
    <?php
      echo get_the_post_thumbnail($account[0]);
      chit_bill_dueList($due);
      if($payments):
    ?>
      <ul class="bill-payments bill-payments-<?php echo $status['value'] ; ?>">
        <?php
          foreach($payments as $payment):
          $paymentsObj = get_field_object('preferred_payment', $account[0]);
          $paymentsLabel = $paymentsObj['choices'][$payment];
        ?>
          <li class="account-payment payment-account-type-<?php echo $payment; ?>">
            <div class="account-payment-name"><?php echo $paymentsLabel; ?></div>
            <span class="account-payment-details">
              <?php chit_account_payments($payment, $account); ?>
            </span>
          </li>
        <?php endforeach; ?>
      </ul>
    <?php endif; ?>
  <?php else: ?>
    <h3>No Account Selected</h3>
  <?php endif; ?>
</section>
