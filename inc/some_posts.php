<?php 
//function filter_where($where = '') {
//	$where .= " AND post_date > '" . date('Y-m-d', strtotime('-30 days')) . "'";
//	return $where;
//}
function some_posts($orderby = '', $limit = 10) {
	//add_filter('posts_where', 'filter_where');
	$some_posts = query_posts('posts_per_page='.$limit.'&caller_get_posts=1&orderby='.$orderby);
	foreach ($some_posts as $some_post) {
			$output = '';
			$post_date = mysql2date('d', $some_post->post_date);
			$post_month = mysql2date('M', $some_post->post_date, true);
			//$commentcount = $some_post->comment_count.__(' Comments', 'wange');
			$post_title = htmlspecialchars(stripslashes($some_post->post_title));
			$permalink = get_permalink($some_post->ID);
			$output .= '<li class="clearfix"><div class="date_info"><span class="date">' . $post_date . '</span><span class="month">' . $post_month . '</span></div><a href="' . $permalink . '" title="'.$post_title.'">' . $post_title . '</a></li>';
			echo $output;
		}
	wp_reset_query();
}
?>