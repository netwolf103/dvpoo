<?php get_header(); ?>
	<!-- S Main -->
	<div id="main" class="clearfix">
		<!-- S Bread crumb -->
		<?php include (TEMPLATEPATH . '/guide.php'); ?>
		<!-- E Bread crumb -->
		
		<!-- S Content -->
		<div id="content">
			<?php if (have_posts()):while (have_posts()):the_post();?>
			<!-- S Post -->
			<div class="post">
				<div class="post_hd">
					<?php 
						$category = get_the_category();
						echo '<img class="cat_thumb" src="'.get_bloginfo("template_directory").'/imgs/cat_icons/'.$category[0]->category_nicename.'.png" alt="'.$category[0]->cat_name.'" />';
					?>
					<div class="post_info">
						<div class="post_info_main">
							<h2><?php the_title(); ?></h2>
                            <span class="pll_comment_count_tag" style="display:none"><?php the_permalink() ?></span>
							<?php if(function_exists('the_views')) { 
								echo '<span class="post_views">';
								the_views();
								echo '</span>';
							} ?>
						</div>
						<div class="post_info_plus">
							作者 <span class="post_author"><?php the_author(); ?></span>
							于 <span class="post_date"><?php the_time('Y月m日d'); ?></span>。
							在栏目 <?php the_category(' '); ?> 下发布了该文章
						</div>
					</div>
				</div>
				<div class="post_bd">
					<div class="entry">
						<?php the_content();?>
					</div>
					<?php the_tags('<div class="post_tags">', ', ', '</div>'); ?>
					<div class="post_copyright">
						<p>本文永久链接地址：<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_permalink(); ?></a></p>
						<p>本站所有内容版权均归本站所有，请转载注明文章出处，尊重本网站的版权信息</p>
					</div>
				</div>
				<div class="post_ft">
					<div id="post_share">
						<a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=2&amp;textcolor=#000&amp;bgcolor=none&amp;bp=sinaminiblog,qzone,renren,kaixin001,douban,qqmb,sohuminiblog,baiduhi&amp;text=分享到&amp;pophcol=1"></script>
					</div>
					<div id="post_nav">
						<?php previous_post_link('<div id="post_prev">上一篇：%link</div>', '%title'); ?>
						<?php next_post_link('<div id="post_next">下一篇：%link</div>', '%title'); ?>
					</div>
					<div id="post_related">
						<div id="wumiiDisplayDiv"></div>
					</div>
				</div>
			</div>
			<!-- E Post -->
			<?php endwhile; ?>
			<!-- S Comment -->
			<div id="comment">
				<div id="pinglunla_here">
				</div><a href="http://pinglun.la/" id="logo-pinglunla"></a><script type="text/javascript" src="http://pinglun.la/07f4c1ab4a690abf63979ebea00c9dc6cf41b3bd.js" charset="utf-8"></script>
			</div>
			<!-- E Comment -->
			<?php endif; ?>
		</div>
		<!-- E Content -->
		
		<!-- S Sidebar -->
		<?php while (have_posts()):the_post();?>
		
		<?php $show_sidebar = get_post_meta($post->ID, 'show sidebar', true);
			if ($show_sidebar == 'false') { ?>
				<script type="text/javascript">
					$(function() {
						$('body').addClass('archive-1');
					})
				</script>
			<?php } else {
				get_sidebar();
			}
		?>
		
		<?php endwhile;?>
		<!-- E Sidebar -->
	</div>
	<!-- E Main -->
	
<?php get_footer(); ?>