<?php 
function ajax_paged() {
	if ( isset($_GET['action']) && $_GET['action'] == 'ajax_paged') {
		$paged_num = $_GET['paged'];
		query_posts($query_string . '&posts_per_page=8&paged=' . $paged_num); ?>
		<?php if (have_posts()): ?>
			<div id="rc_post_hd" class="box_hd">
				<div id="rc_post_title" class="box_fl">
					<i></i><strong>最新文章</strong>
				</div>
				<div id="rc_post_cat" class="box_fr">
					<ul>
						<li><a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>" class="current all">全部</a></li>
						<?php wp_list_categories('title_li=&hierarchical=1&depth=1&hide_empty=0&include=118,90,132'); ?>
					</ul>
				</div>
			</div>
			<div id="rc_post_bd" class="box_bd">
				<ul class="clearfix">
					<?php while (have_posts()) : the_post(); ?>
					<li>
						<div class="post_title">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="post_img">
							<?php post_thumbnail(215, 215); ?>
						</div>
						<div class="post_more">
							<a href="javascript:;" class="png"></a>
						</div>
						<div class="post_mask png"></div>
						<div class="post_link"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">阅读全文</a></div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
			
			<!-- S Pagenavi -->
			<?php pagenavi(); ?>
			<!-- E Pagenavi -->
		<?php endif; ?>
	<?php 
	die();
	} else {
		return;
	}
}
add_action('init', 'ajax_paged');
?>