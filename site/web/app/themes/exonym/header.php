<?php
  /* ==============
     DEFAULT HEADER
     ============== */
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
      <header id="header" class="header-top" role="banner" itemscope itemtype="http://schema.org/WPHeader">
        <div class="wrap">
					Header Menu
        </div>
      </header>
