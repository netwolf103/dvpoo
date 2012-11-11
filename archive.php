<?php get_header(); ?>
	<!-- S Main -->
	<div id="main" class="clearfix">
		<!-- S Bread crumb -->
		<?php include (TEMPLATEPATH . '/cat.php'); ?>
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
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
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
					<div class="post_thumb" id="post_thumb_<?php the_ID(); ?>">

						<?php
							$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $images);
							$images_src = $images[1];
							if($images_src):
						?>
							<ul>
								<?php foreach($images_src as $image_src): ?>
								<li><img src="<?php bloginfo('template_url'); ?>/timthumb.php?src=<?php echo $image_src; ?>&amp;h=288&amp;w=668&amp;zc=1" width="668" height="288" />
								<?php endforeach; ?>
							</ul>

							<script type="text/javascript">
								jQuery(document).ready(function(){	
									$("#post_thumb_<?php the_ID(); ?>").easySlider({
										controlsBefore: '<div class="controls">',
										controlsAfter: '</div>',
										prevText: '<',
										nextText: '>',
										prevId: 'post_thumb_prev<?php the_ID(); ?>',
										nextId: 'post_thumb_next<?php the_ID(); ?>',
									});
								});
							</script>

						<?php else: ?>
							<?php post_thumbnail(668, 288); ?>
						<?php endif; ?>
					</div>

					<div class="entry">
						<p><?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 300,"......");?></p>
					</div>
					<div class="read_more">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">CONTINUE READING <em>阅读全文</em></a>
					</div>
				</div>
			</div>
			<!-- E Post -->
			<?php endwhile; ?>
			<div id="pagenavi">
				<?php pagenavi(); ?>
			</div>
			<?php endif; ?>
		</div>
		<!-- E Content -->
		
		<!-- S Sidebar -->
		<?php get_sidebar(); ?>
		<!-- E Sidebar -->
	</div>
	<!-- E Main -->
	
<?php get_footer(); ?>