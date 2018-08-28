<?php
  $user = wp_get_current_user();
  $duePattern = '/\.([\d]{2})/';
  $duePaid = number_format((float)3305, 2, '.', '');
  $dueNow = number_format((float)1435.35345, 2, '.', '');
  $dueSoon = number_format((float)64, 2, '.', '');
?>
<article class="page-overview">
  <header>
    <img src="<?php echo asset_path('images/logo-latus.svg'); ?>" alt="Logo for Latus Finance" />
  </header>
  <section class="overview-photo">
    <img src="<?php echo get_field('photo', 'user_' . $user->ID)['sizes']['thumbnail-large']; ?>" />
  </section>
  <section class="overview-name">
    <h1>Hello, <?php echo $user->user_firstname; ?></h1>
    <a href="<?php echo wp_logout_url(); ?>">Log Out?</a>
  </section>
  <h1 class="overview-title">Overview</h1>
  <h2 class="overview-date">
    <?php echo date('l, F j, Y'); ?>
  </h2>
  <ul class="overview-data">
    <li>
      <div class="label">Total Due:</div>
      <div class="number"><?php echo preg_replace($duePattern, '<sup>$1</sup>', $dueNow); ?></div>
    </li>
    <li>
      <div class="label">Due Next Week:</div>
      <div class="number"><?php echo preg_replace($duePattern, '<sup>$1</sup>', $dueSoon); ?></div>
    </li>
    <li>
      <div class="label">Paid Last Week:</div>
      <div class="number"><?php echo preg_replace($duePattern, '<sup>$1</sup>', $duePaid); ?></div>
    </li>
  </ul>
</article>
