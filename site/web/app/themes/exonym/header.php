<?php
  /* ==============
     DEFAULT HEADER
     ============== */
	auth_redirect();
?>
<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title><?php wp_title(); ?></title>
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
		<div id="container">
      <header id="nav-calendar" class="nav-header">
				<img src="<?php echo asset_path('images/icon-calendar.svg'); ?>" alt="Icon for toggling the calendar" />
				<span></span>
      </header>
			<header id="nav-search" class="nav-header">
				<img src="<?php echo asset_path('images/icon-search.svg'); ?>" alt="Icon for toggling the bill search" />
				<span></span>
			</header>
