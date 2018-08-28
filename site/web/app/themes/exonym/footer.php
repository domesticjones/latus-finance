<?php
  /* ==============
     DEFAULT FOOTER
     ============== */
?>
    <footer id="nav-footer">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="nav-footer-item<?php if(is_front_page()) { echo ' is-active'; } ?>">
        <img src="<?php echo asset_path('images/icon-overview.svg'); ?>" alt="Icon for the Overview" />
        <span>Overview</span>
      </a>
      <a href="<?php echo esc_url(get_post_type_archive_link('bill')); ?>" class="nav-footer-item<?php if(is_post_type_archive('bill')) { echo ' is-active'; } ?>">
        <img src="<?php echo asset_path('images/icon-timeline.svg'); ?>" alt="Icon for the Bill Timeline" />
        <span>Timeline</span>
      </a>
      <a href="<?php echo esc_url(get_permalink(90)); ?>" class="nav-footer-item<?php if(is_page_template('page-add.php')) { echo ' is-active'; } ?>">
        <img src="<?php echo asset_path('images/icon-add.svg'); ?>" alt="Icon for Adding a Bill" />
        <span>Add Bill</span>
      </a>
      <a href="<?php echo esc_url(get_permalink(92)); ?>" class="nav-footer-item<?php if(is_page_template('page-manage.php')) { echo ' is-active'; } ?>">
        <img src="<?php echo asset_path('images/icon-tools.svg'); ?>" alt="Icon for Managing Bills and Debtors" />
        <span>Manage</span>
      </a>
      <a href="<?php echo esc_url(get_permalink(94)); ?>" class="nav-footer-item<?php if(is_page_template('page-paid.php')) { echo ' is-active'; } ?>">
        <img src="<?php echo asset_path('images/icon-dollar.svg'); ?>" alt="Icon for the Viewing Paid Bills" />
        <span>Paid</span>
      </a>
    </footer>
  </div>
  <?php wp_footer(); ?>
</body>
</html>
