<?php
  // Remove RSS Feeds
  function chit_disable_feed() {
    wp_die(__('No feed available,please visit our <a href="'. get_home_url() .'">homepage</a>!'));
  }
  add_action('do_feed', 'chit_disable_feed', 1);
  add_action('do_feed_rdf', 'chit_disable_feed', 1);
  add_action('do_feed_rss', 'chit_disable_feed', 1);
  add_action('do_feed_rss2', 'chit_disable_feed', 1);
  add_action('do_feed_atom', 'chit_disable_feed', 1);
  add_action('do_feed_rss2_comments', 'chit_disable_feed', 1);
  add_action('do_feed_atom_comments', 'chit_disable_feed', 1);
