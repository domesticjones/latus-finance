<?php
	/* ===================
		 WP FUNCTIONS IMPORT
		 =================== */

	require_once(TEMPLATEPATH . '/functions/security.php'); // Security Measures
	require_once(TEMPLATEPATH . '/functions/asset-builder.php'); // Asset Builder
	require_once(TEMPLATEPATH . '/functions/config.php'); // Configuration & Shortcuts
	require_once(TEMPLATEPATH . '/functions/cleanup.php'); // Theme Cleanup
	require_once(TEMPLATEPATH . '/functions/init.php'); // Theme Initialization
	require_once(TEMPLATEPATH . '/functions/images.php'); // Image Settings
	require_once(TEMPLATEPATH . '/functions/admin.php'); // Admin Customization
	require_once(TEMPLATEPATH . '/functions/plugins.php'); // Plugin Dependencies
	require_once(TEMPLATEPATH . '/functions/sanity.php'); // Check Extension Use

	// Latus Finance Plugin
	require_once(TEMPLATEPATH . '/latus-finance/latus-finance.php');
