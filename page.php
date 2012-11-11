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
						echo '<img class="cat_thumb" src="'.get_bloginfo("template_directory").'/imgs/cat_icons/'. basename(get_permalink()) .'.png" alt="'. get_the_title() .'" />';
					?>
					<div class="post_info">
						<div class="post_info_main">
							<h2><?php the_title(); ?></h2>
							<?php if(function_exists('the_views')) { 
								echo '<span class="post_views">';
								the_views();
								echo '</span>';
							} ?>
						</div>
						<div class="post_info_plus">
							作者 <span class="post_author"><?php the_author(); ?></span>
							于 <span class="post_date"><?php the_time('Y月m日d'); ?></span> 发布了该文章
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
						<div class="bshare-custom"><a title="分享到" href="http://www.bShare.cn/" id="bshare-shareto" class="bshare-more">分享到</a><a title="分享到QQ空间" class="bshare-qzone" href="javascript:void(0);">QQ空间</a><a title="分享到新浪微博" class="bshare-sinaminiblog" href="javascript:void(0);">新浪微博</a><a title="分享到人人网" class="bshare-renren" href="javascript:void(0);">人人网</a><a title="分享到腾讯微博" class="bshare-qqmb" href="javascript:void(0);">腾讯微博</a><a title="分享到豆瓣" class="bshare-douban" href="javascript:void(0);">豆瓣</a><a title="更多平台" class="bshare-more bshare-more-icon more-style-addthis"></a><span class="BSHARE_COUNT bshare-share-count">0</span></div><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#style=-1&amp;uuid=c5edd3a6-61bd-4b68-9e93-fb4907f3590a&amp;pophcol=1&amp;lang=zh"></script><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/bshareC0.js"></script>
					</div>
				</div>
			</div>
			<!-- E Post -->
			<?php endwhile; ?>

			<?php endif; ?>
		</div>
		<!-- E Content -->
	
		<!-- S Sidebar -->
		<?php //get_sidebar(); ?>
		<!-- E Sidebar -->
	</div>
	<!-- E Main -->
	
<?php get_footer(); ?>