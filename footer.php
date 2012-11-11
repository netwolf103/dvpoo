	<a href="#header" id="tophref"></a>

	<!-- S Footer -->
	<div id="footer" class="clearfix">
		<div id="footer-wrap">
		
		<div id="map">
		<?php
			if ( function_exists( 'register_nav_menus' ) ) {
				wp_nav_menu(array('theme_location'=>'map','menu_id'=>'','menu_class' => '','container'=>'ul'));
			}
		?>
		</div>
		<div id="copyright">
			<p>DVPOO 由 DWTHEMES 工作室制作完成，任何内容再未经许可的情况下禁止转载</p>
		</div>

		</div>
	</div>
	<!-- E Footer -->
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/easySlider.js"></script>
	<?php if(get_option('dvpoo_analytics_onoff')) {
		echo stripslashes(get_option('dvpoo_analytics_content'));
	} ?>
	<?php wp_footer(); ?>
    
    <?php 
    if (is_single() || is_archive()) { ?>
        <!-- S Scroll -->
        <div id="scroll">
            <a id="scroll_btn_a" href="#header">Top</a>
            <a id="scroll_btn_b" href="#comment">Chat</a>
            <a id="scroll_btn_c" href="#footer">Bottom</a>
        </div>
        <!-- E Scroll -->
        
        <script type="text/javascript" src="http://pinglun.la/07f4c1ab4a690abf63979ebea00c9dc6cf41b3bd/cc.js?t=%7Bcount%7D%E6%9D%A1%E8%AF%84%E8%AE%BA&t0=%E6%9A%82%E6%97%A0%E8%AF%84%E8%AE%BA&o=1" charset="utf-8"></script>
    <?php }
    ?>
</body>
</html>