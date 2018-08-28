<?php

// Bills Post Type
// Register Custom Post Type
function chit_cpt_bills() {

	$labels = array(
		'name'                  => _x( 'Bills', 'Post Type General Name', 'family-chit' ),
		'singular_name'         => _x( 'Bill', 'Post Type Singular Name', 'family-chit' ),
		'menu_name'             => __( 'Bills', 'family-chit' ),
		'name_admin_bar'        => __( 'Bill', 'family-chit' ),
		'archives'              => __( 'Bill Archives', 'family-chit' ),
		'attributes'            => __( 'Bill Attributes', 'family-chit' ),
		'parent_item_colon'     => __( 'Parent Bill:', 'family-chit' ),
		'all_items'             => __( 'All Bills', 'family-chit' ),
		'add_new_item'          => __( 'Add New Bill', 'family-chit' ),
		'add_new'               => __( 'Add New', 'family-chit' ),
		'new_item'              => __( 'New Bill', 'family-chit' ),
		'edit_item'             => __( 'Edit Bill', 'family-chit' ),
		'update_item'           => __( 'Update Bill', 'family-chit' ),
		'view_item'             => __( 'View Bill', 'family-chit' ),
		'view_items'            => __( 'View Bills', 'family-chit' ),
		'search_items'          => __( 'Search Bill', 'family-chit' ),
		'not_found'             => __( 'Not found', 'family-chit' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'family-chit' ),
		'insert_into_item'      => __( 'Insert into Bill', 'family-chit' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Bill', 'family-chit' ),
		'items_list'            => __( 'Bills list', 'family-chit' ),
		'items_list_navigation' => __( 'Bills list navigation', 'family-chit' ),
		'filter_items_list'     => __( 'Filter Bills list', 'family-chit' ),
	);
	$args = array(
		'label'                 => __( 'Bill', 'family-chit' ),
		'labels'                => $labels,
		'supports'              => array( 'title' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-thumbs-down',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'bill', $args );

}
add_action( 'init', 'chit_cpt_bills', 0 );

// Accounts Post Type
function chit_cpt_accounts() {

	$labels = array(
		'name'                  => _x( 'Accounts', 'Post Type General Name', 'family-chit' ),
		'singular_name'         => _x( 'Account', 'Post Type Singular Name', 'family-chit' ),
		'menu_name'             => __( 'Accounts', 'family-chit' ),
		'name_admin_bar'        => __( 'Account', 'family-chit' ),
		'archives'              => __( 'Account Archives', 'family-chit' ),
		'attributes'            => __( 'Account Attributes', 'family-chit' ),
		'parent_item_colon'     => __( 'Parent Account:', 'family-chit' ),
		'all_items'             => __( 'All Accounts', 'family-chit' ),
		'add_new_item'          => __( 'Add New Account', 'family-chit' ),
		'add_new'               => __( 'Add New', 'family-chit' ),
		'new_item'              => __( 'New Account', 'family-chit' ),
		'edit_item'             => __( 'Edit Account', 'family-chit' ),
		'update_item'           => __( 'Update Account', 'family-chit' ),
		'view_item'             => __( 'View Account', 'family-chit' ),
		'view_items'            => __( 'View Accounts', 'family-chit' ),
		'search_items'          => __( 'Search Account', 'family-chit' ),
		'not_found'             => __( 'Not found', 'family-chit' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'family-chit' ),
		'featured_image'        => __( 'Logo', 'family-chit' ),
		'set_featured_image'    => __( 'Set Account Logo', 'family-chit' ),
		'remove_featured_image' => __( 'Remove Account Logo', 'family-chit' ),
		'use_featured_image'    => __( 'Use as Account Logo', 'family-chit' ),
		'insert_into_item'      => __( 'Insert into Account', 'family-chit' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Account', 'family-chit' ),
		'items_list'            => __( 'Accounts list', 'family-chit' ),
		'items_list_navigation' => __( 'Accounts list navigation', 'family-chit' ),
		'filter_items_list'     => __( 'Filter Accounts list', 'family-chit' ),
	);
	$args = array(
		'label'                 => __( 'Account', 'family-chit' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => false,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'account', $args );

}
add_action( 'init', 'chit_cpt_accounts', 0 );


// Custom Admin Columns for Accounts
function chit_account_columns($columns) {
	unset($columns['date']);
  $columns['payment'] = __('Payment Methods', 'family-chit' );
  $columns['image'] = __('Logo');
  return $columns;
}
function chit_account_column($column, $post_id) {
  if('image' === $column) {
    if(has_post_thumbnail()) {
			echo get_the_post_thumbnail($post_id, 'small');
		} else {
			echo '<em><strong>No logo!</strong> Spruce this guy up with a logo.</em>';
		}
  }
	if('payment' === $column) {
		$payments = get_field('preferred_payment');
		if($payments) {
			echo '<ul class="admin-payments">';
				foreach($payments as $payment) {
					echo '<li class="account-payment payment-account-type-' . $payment . '"><span>' . $payment . '</span></li>';
				}
			echo '</ul>';
		}
	}
}
add_filter('manage_account_posts_columns', 'chit_account_columns');
add_action('manage_account_posts_custom_column', 'chit_account_column', 10, 2);

// Custom Admin Columns for Bills
function chit_bills_columns($columns) {
	unset($columns['date']);
  $columns['amount'] = __('Amount', 'family-chit');
  $columns['due'] = __('Due', 'family-chit');
  $columns['account'] = __('Account', 'family-chit');
  $columns['status'] = __('Status', 'family-chit');
  return $columns;
}
function chit_bills_column($column, $post_id) {
  if('amount' === $column) {
		chit_calc_amount();
  }
	if('account' === $column) {
		$account = get_field('account');
		if(!empty($account)) {
			echo '<a href="/wp/wp-admin/post.php?post=' . $account[0] . '85&action=edit">' . get_the_title($account[0]) . '</a>';
		} else {
			echo '<em>No Account Assigned</em>';
		}
	}
	if('due' === $column) {
		chit_calc_due();
	}
	if('status' === $column) {
		chit_calc_status();
	}
}
add_filter('manage_bill_posts_columns', 'chit_bills_columns');
add_action('manage_bill_posts_custom_column', 'chit_bills_column', 10, 2);
