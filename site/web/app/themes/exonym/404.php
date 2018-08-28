<?php
  /* =========
     404 ERROR
     ========= */

	get_header(); ?>
			<div id="content" class="wrap">
				<main id="main" role="main" itemscope itemprop="mainContentOfPage" itemtype="http://schema.org/Blog">
					<?php get_template_part('templates/blog', '404'); ?>
				</main>
				<?php get_sidebar(); ?>
			</div>
<?php get_footer(); ?>
