<?php 
//缩略图
if(function_exists('add_theme_support')) {
	add_theme_support( 'post-thumbnails' );
}

//wp-postviews 执行脚本移到底部
if ( has_action( 'wp_head', 'process_postviews' ) ) {
	remove_action('wp_head', 'process_postviews');
	add_action('wp_footer', 'process_postviews');
}

//导航菜单
if ( function_exists('register_nav_menus') ) {
	function mytheme_addmenus() {
		register_nav_menus(array('nav' => '头部导航', 'map' => '底部导航'));
	}
	add_action( 'init', 'mytheme_addmenus' );
}


//注册小工具
if ( function_exists('register_sidebar') ){
	register_sidebar(array(
		'before_widget' => '<div class="widget"><div class="widget_hd">',
		'after_widget' => '</div></div>',
		'before_title' => '<h3>',
		'after_title' => '</h3></div><div class="widget_bd">'
	));
}

//拒绝转义
$qmr_work_tags = array(
	'bloginfo',
	'comment_author',
	'comment_text',
	'list_cats',
	'link_name',
	'link_description',
	'link_notes',
	'single_post_title',
	'term_name',
	'term_description',
	'the_title',
	'the_content',
	'the_excerpt',
	'wp_title',
	'widget_title'
);
foreach ( $qmr_work_tags as $qmr_work_tag ) {
	remove_filter ($qmr_work_tag, 'wptexturize');
}

//移除版本
remove_action('wp_head', 'wp_generator');

//主题基本设置
include_once(TEMPLATEPATH . '/basic_ctrl.php');

//日志分页
include_once(TEMPLATEPATH . '/inc/pagenavi.php');

//自动缩略图
include_once(TEMPLATEPATH . '/inc/post_thumbnail.php');

//异步加载翻页
include_once(TEMPLATEPATH . '/inc/ajax_paged.php');

//面包屑
include_once(TEMPLATEPATH . '/inc/crumb.php');

//最近文章
include_once(TEMPLATEPATH . '/inc/some_posts.php');

add_action('wp_ajax_nopriv_posts', 'dvpoo_ajax_posts');

function dvpoo_ajax_posts()
{
	$paged = isset($_REQUEST['paged']) ? $_REQUEST['paged'] : 1;
	$cat = isset($_REQUEST['cat']) ? $_REQUEST['cat'] : 0;
	$posts_per_page = isset($_REQUEST['posts_per_page']) ? $_REQUEST['posts_per_page'] : 4;
	$type = isset($_REQUEST['type']) ? $_REQUEST['type'] : 0;

	if( $cat ) {
		$prev = $paged - 1;
		$next =  $paged + 1;
?>
		<?php query_posts('&paged='.$paged.'&posts_per_page='.$posts_per_page.'&cat=' . $cat); ?>
		<?php if (have_posts()): ?>
			<?php include_once(TEMPLATEPATH . '/inc/ajax-pager-type-'.$type.'.php'); ?>
		<?php else: ?>

		<?php endif; ?>
<?php
		die();
	}
}
?>