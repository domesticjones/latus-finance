<?php

// ADMIN: Redirect Users on Login
function latus_login_redirect() {
  return esc_url(home_url());
}

function latus_login_check() {
    return 'logged_in';
}
add_filter('login_redirect', 'latus_login_redirect');
add_filter('auth_redirect_scheme', 'latus_login_check' );
