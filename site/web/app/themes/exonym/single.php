<?php
	/* ===================
		 DEFAULT SINGLE POST
		 =================== */
	get_header();
	get_template_part('templates/wrap', 'start');
	if(have_posts()): while(have_posts()): the_post();
		echo 'Blog Post Type';
	endwhile; endif;
	get_template_part('templates/wrap', 'end');
	get_footer();
?>
