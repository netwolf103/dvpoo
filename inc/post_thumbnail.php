<?php 
function post_thumbnail($w = 100, $h = 100, $bg = false) {
	global $post;
	if (has_post_thumbnail()) {	//如果有缩略图，则显示缩略图
		$timthumb_src = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID),'full');
		$post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$timthumb_src[0].'&amp;h='.$h.'&amp;w='.$w.'&amp;zc=1" alt="'.$post->post_title.'" width="'.$w.'" height="'.$h.'" />';
	} else {
		$post_timthumb = '';
		ob_start();
		ob_end_clean();
		$output = preg_match('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $index_matches);	//获取日志中第一张图片
		$first_img_src = $index_matches[1];	//获取该图片 src
		if( !empty($first_img_src) ) {	//如果日志中有图片
			$path_parts = pathinfo($first_img_src);	//获取图片 src 信息
            $post_name = $post->ID;
            $first_img_name = $post_name.$path_parts["basename"];	//获取图片名
			$first_img_pic = get_bloginfo('wpurl'). '/cache/'.$first_img_name;	//文件所在地址
			$first_img_file = ABSPATH. 'cache/'.$first_img_name;	//保存地址
			$expired = 604800;	//过期时间
			if ( !is_file($first_img_file) || (time() - filemtime($first_img_file)) > $expired ){
				copy($first_img_src, $first_img_file);	//远程获取图片保存于本地
				$post_timthumb = '<img src="'.$first_img_src.'" alt="'.$post->post_title.'" width="'.$w.'" height="'.$h.'" />';	//保存时用原图显示
			}

			if( $bg ) {
			$post_timthumb = '<img style="background:url('.get_bloginfo("template_url").'/timthumb.php?src='.$first_img_pic.'&amp;h='.$h.'&amp;w='.$w.'&amp;zc=1) no-repeat 0 0" src="" alt="'.$post->post_title.'" width="'.$w.'" height="'.$h.'" />';
			} else {
			$post_timthumb = '<img src="'.get_bloginfo("template_url").'/timthumb.php?src='.$first_img_pic.'&amp;h='.$h.'&amp;w='.$w.'&amp;zc=1" alt="'.$post->post_title.'" width="'.$w.'" height="'.$h.'" />';
			}
		} else {	//如果日志中没有图片，则显示默认
			$post_timthumb = '<img src="'.get_bloginfo("template_directory").'/imgs/sample/default.jpg" alt="" width="'.$w.'" height="'.$h.'" />';
		}
	}
	echo $post_timthumb;
}
?>