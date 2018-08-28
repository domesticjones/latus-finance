<?php
	/* ================
		 Single Bill Page
		 ================ */
	get_header();
	get_template_part('templates/wrap', 'start');
	if(have_posts()): while(have_posts()): the_post();
		get_template_part('family-chit/templates/bill', 'basic');
		get_template_part('family-chit/templates/bill', 'details');
	endwhile; endif;
	get_template_part('templates/wrap', 'end');
	get_footer();
?>
