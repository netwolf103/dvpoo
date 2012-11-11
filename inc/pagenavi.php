<?php 
function pagenavi() {
	global $wp_query, $wp_rewrite;
	$wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
	$pagination = array(
		'base' => @add_query_arg('paged','%#%'),
		'format' => '?paged=%#%',
		'total' => $wp_query->max_num_pages,
		'current' => $current,
		'show_all' => false,
		'type' => 'array',
		'prev_next' => true
	);

	if( $wp_rewrite->using_permalinks() )
		//翻页异步
		$pagination['base'] = str_replace('?action=ajax_paged/', '', user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged'));
		
		//$pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg('s',get_pagenum_link(1) ) ) . 'page/%#%/', 'paged');
		
	if( !empty($wp_query->query_vars['s']) )
		$pagination['add_args'] = array('s'=>get_query_var('s'));
		//if( $wp_query->max_num_pages > 20 ){ $drag_btn = '<div class="drag_page_btn radius"></div>';}
		$page_array = str_replace('action=ajax_paged&#038;', '', paginate_links($pagination));
		/*
		$page_count = count($page_array);
		
		if ($current<5) {
			unset($page_array[$page_count-1]);
			unset($page_array[$page_count-2]);
		} elseif ($current>(($wp_query->max_num_pages)-4)) {
			unset($page_array[0]);
			unset($page_array[1]);
		} else {
			unset($page_array[0]);
			unset($page_array[1]);
			unset($page_array[$page_count-1]);
			unset($page_array[$page_count-2]);
		}
		*/
	//$page_param = '<input type="hidden" id="total_page" value="' . $wp_query->max_num_pages . '" /><input type="hidden" id="curr_page" value="' . $current . '" />';
    if (!empty($page_array)) {
        echo '<div id="rc_post_ft" class="box_ft">'.
		'	<span class="page_total">页面' . $current . '/' . $wp_query->max_num_pages . '</span>'.
		implode('', $page_array) .
		'</div>';
    }
	
}
?>