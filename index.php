<?php get_header(); ?>
	<!-- S Feature -->
	<?php include (TEMPLATEPATH . '/feature.php'); ?>
	<!-- E Feature -->

	<div id="search-wrap">
		<?php get_search_form(); ?>
	</div>
		
	<!-- S Main -->
	<div id="main" class="clearfix">
		<!-- S 原创作品 Post -->
		<div id="rc_post" class="box">
		<?php query_posts($query_string . '&posts_per_page=4&cat=34'); ?>
		<?php if (have_posts()): ?>
			<div id="rc_post_hd_34" class="box_hd">
				<div id="rc_post_title" class="box_fl">
					<i class="photo"></i><strong>原创作品</strong>
				</div>
				<div id="rc_post_cat" class="box_fr">
					<div class="pager-wrap">
					<a href="javascript:void(0);" class="pager-a left">&lt;</a>
					<a href="javascript:void(0);" class="pager-a right" onclick="pager(this, 2, 34, 4, 0);">&gt;</a>
					</div>
				</div>
			</div>

			<div class="loading"></div>

			<div id="rc_post_bd" class="box_bd">
				<ul class="clearfix">
					<?php while (have_posts()) : the_post(); ?>
					<li>

						<div class="post_img">
							<?php post_thumbnail(215, 215); ?>
						</div>
						
						<div class="the_title">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
							<h5><?php echo get_post_meta($post->ID, 'Subtitle', true); ?></h5>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>
		</div>
		<!-- E 原创作品 Post -->

		<!-- S 摄影技巧 Post -->
		<div id="rc_post" class="box">
		<?php query_posts($query_string . '&posts_per_page=4&cat=132'); ?>
		<?php if (have_posts()): ?>
			<div id="rc_post_hd_132" class="box_hd">
				<div id="rc_post_title" class="box_fl">
					<i></i><strong>摄影技巧</strong>
				</div>
				<div id="rc_post_cat" class="box_fr">
					<div class="pager-wrap">
					<a href="javascript:void(0);" class="pager-a left">&lt;</a>
					<a href="javascript:void(0);" class="pager-a right" onclick="pager(this, 2, 132, 4, 1);">&gt;</a>
					</div>
				</div>
			</div>

			<div class="loading"></div>

			<div id="rc_post_bd" class="box_bd">
				<ul class="clearfix">
					<?php while (have_posts()) : the_post(); ?>
					<li style="height:auto;">
						<div class="post_title">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="post_img">
							<?php post_thumbnail(215, 215); ?>
						</div>

						<div class="the_title" style="text-align:left;">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</div>

						<div class="the_excerpt">
							<?php the_excerpt(); ?>
						</div>

						<div class="more_link"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">阅读全文>></a></div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>
		</div>
		<!-- E 摄影技巧 Post -->

		<!-- S 佳作欣赏 Post -->
		<div id="rc_post" class="box">
		<?php query_posts($query_string . '&posts_per_page=8&cat=90'); ?>
		<?php if (have_posts()): ?>
			<div id="rc_post_hd_90" class="box_hd">
				<div id="rc_post_title" class="box_fl">
					<i></i><strong>作品欣赏</strong>
				</div>
				<div id="rc_post_cat" class="box_fr">
					<div class="pager-wrap">
					<a href="javascript:void(0);" class="pager-a left">&lt;</a>
					<a href="javascript:void(0);" class="pager-a right" onclick="pager(this, 2, 90, 8, 2);">&gt;</a>
					</div>
				</div>
			</div>

			<div class="loading"></div>

			<div id="rc_post_bd3" class="box_bd">
				<ul class="clearfix">
					<?php while (have_posts()) : the_post(); ?>
					<li>
						<div class="post_title">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="post_img">
							<?php post_thumbnail(215, 215); ?>
						</div>

						<div class="post_mask png"></div>
						<div class="post_link"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">阅读全文</a></div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>
		<?php endif; ?>
		</div>
		<!-- E 佳作欣赏 Post -->
		
		<?php if(get_option('dvpoo_blogroll')) { ?>
		<!-- S Blog Roll -->
		<div id="blog_roll" class="box">
			<div id="blog_roll_hd" class="box_hd">
				<div id="blog_roll_title" class="box_fl">
					<i></i><strong>友情链接</strong>
				</div>
				<div id="rc_post_cat" class="box_fr"></div>
			</div>

			<div id="frind-link" class="box_bd">
				<table>
					<tr>

					<?php for($i=1; $i<=5; $i++): ?>
						<td><a target="_blank" href="<?php echo get_option('dvpoo_blogurl'.$i);?>"><img src="<?php echo get_option('dvpoo_blogimg'.$i);?>" alt="<?php echo get_option('dvpoo_blogtitle'.$i);?>" class="no-color" source="<?php echo get_option('dvpoo_blogimg'.$i);?>" alt="<?php echo get_option('dvpoo_blogtitle'.$i);?>" /></a></td>
					<?php endfor; ?>

					</tr>

					<tr>

					<?php for($i=6; $i<=10; $i++): ?>
						<td><a target="_blank" href="<?php echo get_option('dvpoo_blogurl'.$i);?>"><img src="<?php echo get_option('dvpoo_blogimg'.$i);?>" alt="<?php echo get_option('dvpoo_blogtitle'.$i);?>" /></a></td>
					<?php endfor; ?>

					</tr>

				</table>

			</div>
		</div>
		<!-- E Blog Roll -->
		<?php } ?>

	<!-- S Info -->
	<div id="footer_info">
		
		<div id="col_wrapper">
			<div id="col" class="clearfix">
				<div id="col_a" class="footer_col">
					<div class="col_hd">
						<h6>关于尘埃的一点点介绍</h6>
					</div>
					<div class="col_bd">
						<p><img src="<?php bloginfo('template_directory'); ?>/imgs/avatar.jpg" style="float:left;padding-right:10px;" />尘埃影像的英文是DustVision，域名DVPOO则是取了尘埃影像的缩写“DV”，网站以摄影与数码后期内容为主，顾名思义重在一个”拍“字，则有了域名的POO后缀。本人水瓶座，拥有其星座的所有特点，爱搞浪漫，感性，切吊儿郎当。习惯生活在自己的幻想世界中。今年29仍然搞着自己的小博客，干着娱乐圈的媒体宣传小活儿。摄影则是我为数不多的爱好之一。拍点垃圾小片，却对其情有独钟。纯自恋的中年小顽童。</p>
					</div>
				</div>
				<div id="col_c" class="footer_col">
					<div class="col_hd">
						<h6>关注尘埃影响，精彩内容不再错过</h6>
					</div>
					<div class="col_bd">
						<div id="weibo-wrap">
							<span class="sina"><?php echo get_option('dvpoo_snsNum1'); ?></span>
							<span class="tencent"><?php echo get_option('dvpoo_snsNum2'); ?></span>
							<span class="rss"><?php echo get_option('dvpoo_snsNum3'); ?></span>
						</div>

						<div id="subscription">
							<form method="post" action="" id="subscription-form">
								<span id="subscriptionBtn">获取最新摄影秘籍</span>
								<input type="text" name="email" value="请输入您的邮箱地址" />
							</form>
						</div>
					</div>
				</div>
				<div id="col_b" class="footer_col">
					<div class="col_hd">
						<h6>不知道看什么内容？阅读关键词(TAGS)给你导航</h6>
					</div>
					<div class="col_bd">
						<?php wp_tag_cloud( array( 'taxonomy' => 'post_tag', 'format' => 'list', 'unit' => 'px', 'number' => 14, 'echo' => true ) ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- E Info -->

	</div>
	<!-- E Main -->
	
<?php get_footer(); ?>