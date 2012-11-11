<div id="share" class="box">
	<div id="share_hd" class="box_hd">
		<div id="share_title" class="box_fl">
			<i></i><strong>关注我们</strong>
		</div>
	</div>
	<div id="share_bd" class="box_bd">
		<ul class="clearfix">
		<?php 
		global $sns_type;
		for($i=1;$i<=count($sns_type)-1;$i++){
			if( get_option('dvpoo_snsType'.$i) != '不显示') { ?>
				<li>
					<a id="<?php echo array_search( get_option('dvpoo_snsType'.$i), $sns_type );?>" target="_blank" href="<?php echo get_option('dvpoo_snsUrl'.$i);?>"><?php echo get_option('dvpoo_snsType'.$i);?></a>
					<div class="share_num">已有 <em><?php echo get_option('dvpoo_snsNum'.$i);?></em> 人关注</div>
				</li>
		<?php } } ?>
		</ul>
	</div>
</div>