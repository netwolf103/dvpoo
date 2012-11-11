<div id="sidebar">
	<div id="rc_posts" class="widget">
		<div class="widget_hd">
			<h3>最新文章</h3>
		</div>
		<div class="widget_bd">
			<ul>
				<?php some_posts('date', 5); ?>
			</ul>
		</div>
	</div>
	
	<div class="widget">
		<div class="widget_hd">
			<h3>标签TAG</h3>
		</div>
		<div class="widget_bd">
			<?php wp_tag_cloud();?>
		</div>
	</div>
	<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar() ) : else : ?>

	<?php endif; ?>
</div>