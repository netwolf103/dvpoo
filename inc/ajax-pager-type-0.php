			<div id="rc_post_hd_34" class="box_hd">
				<div id="rc_post_title" class="box_fl">
					<i class="photo"></i><strong>原创作品</strong>
				</div>
				<div id="rc_post_cat" class="box_fr">
					<div class="pager-wrap">
					<a href="javascript:void(0);" class="pager-a left" onclick="pager(this, <?php echo $prev; ?>, <?php echo $cat; ?>, <?php echo $posts_per_page; ?>, <?php echo $type ?>);">&lt;</a>
					<a href="javascript:void(0);" class="pager-a right" onclick="pager(this, <?php echo $next; ?>, <?php echo $cat; ?>, <?php echo $posts_per_page; ?>, <?php echo $type ?>);">&gt;</a>
					</div>
				</div>
			</div>

			<div class="loading"></div>

			<div id="rc_post_bd" class="box_bd">
				<ul class="clearfix">
					<?php while (have_posts()) : the_post(); ?>
					<li style="height:240px;">

						<div class="post_img">
							<?php post_thumbnail(215, 215); ?>
						</div>
						
						<div class="the_title">
							<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
						</div>
					</li>
					<?php endwhile; ?>
				</ul>
			</div>