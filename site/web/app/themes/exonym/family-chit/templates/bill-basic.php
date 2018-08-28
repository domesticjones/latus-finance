<?php
  chit_status_assign($post->ID);
  $account = get_field('account');
?>
<section class="bill-basic">
  <h1><?php the_title(); ?></h1>
  <h2><?php if($account) { echo 'No account linked'; } else { get_the_title($account[0]); } ?></h2>
  <p>
    <?php
      chit_calc_status();
      chit_calc_amount();
    ?>
  </p>
</section>
