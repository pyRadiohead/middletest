<?php
if(get_field('flexible_content')){
	$post_id = get_the_ID();
}
if( have_rows('flexible_content', $post_id) ){
	while ( have_rows('flexible_content', $post_id) ) {
		$row = the_row(true);
		$layout = get_row_layout();
		if ( get_template_part('template-parts/acf/flexible-content/' . $layout )) {
			get_template_part('template-parts/acf/flexible-content/' . $layout );
		}
	}
}
?>