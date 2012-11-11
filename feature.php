<div id="feature">
	<div id="slide">
		<?php 
		if (function_exists('the_uds_billboard')) {
			the_uds_billboard();
		} else { ?>
		<img src="<?php bloginfo('template_directory'); ?>/imgs/sample/slide_940x400.jpg" alt="" />
		<?php } ?>
	</div>
	<div id="motto">
		<p>“对于我来讲，<em>摄影</em>是一种对于艺术的洞察力，是关于如何在一个平常的地方感受美丽或者有趣的事物。</p>
		<p>我发现摄影本身并非是去拍摄你所看到的东西，而是去锻炼你如何看待事物本质的一种历练”</p>
	</div>
</div>