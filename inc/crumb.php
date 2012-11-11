<?php
function crumb() {
	if ( is_attachment() ) {
		$titles = $title = '附件';
	} elseif( is_single() ) {
		$categorys = get_the_category();
		$category = $categorys[0];
		$title = get_the_title();
		$titles = get_category_parents($category->term_id, true,' &raquo; ') . $title;
	} elseif ( is_page() ) {
		$titles = $title = get_the_title();
	} elseif ( is_category() ) {
		$titles = $title = single_cat_title('', false);
	} elseif ( is_tag() ) {
		$titles = $title = single_tag_title('', false);
	} elseif ( is_day() ) {
		$titles = $title = get_the_time('Y年Fj日');
	} elseif ( is_month() ) {
		$titles = $title = get_the_time('Y年F');
	} elseif ( is_year() ) {
		$titles = $title = get_the_time('Y年');
	} elseif ( is_search() ) {
		global $s;
		$titles = $title = $s.' 的搜索结果';
	} else {
		$titles = $title = '';
	}
	
	echo '<div class="crumb">' .
		'	<strong style="display:inline;">' . $title . '</strong>' .
		'	<div class="nav_crumb">' .
		'		<a href="'.get_bloginfo('url').'" title="'.get_bloginfo('name').'">HOME</a> &raquo; '. $titles.
		'	</div>'.
		'</div>';
}
?>