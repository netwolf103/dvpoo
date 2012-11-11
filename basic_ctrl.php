<?php
$basic_themename = 'dvpoo';
$basic_shortname = 'dvpoo';

$sns_type = array( 'share_sina'=>'新浪微博', 'share_qq'=>'腾讯微博', 'share_rss' => 'rss feed');
$sns_tmp = array_unshift($sns_type,'不显示');

$mx_categories_obj = get_categories('hide_empty=1');
$mx_categories = array();
foreach ($mx_categories_obj as $mx_cat) {
	$mx_categories[$mx_cat->cat_ID] = $mx_cat->cat_name;
}
$categories_tmp = array_unshift($mx_categories, '请选择一个分类：');

$notice_num = array('3','6','9','12','15');
$notice_tmp = array_unshift($notice_num, '请选择显示数量：');

$basic_options = array (
	//网站 SEO 设置
	array('name' => '网站 SEO 设置','type' => 'heading','desc' => '给网站设置关键词（keywords）和描述（description），这将有利于网站的 SEO 效果<br />单篇日志页面（single.php）和页面页（page.php）的关键词取自文章的“<b>标签</b>”，描述取自文章“<b>摘要</b>（开头的一部分文字）”。'),
	array('name' => '首页关键词设置','id' => $basic_shortname.'_keywords','std' => '关键词1, 关键词2, 关键词3, 关键词4','type' => 'text'),
	array('name' => '首页描述设置','id' => $basic_shortname.'_description','std' => '在这里填写网站描述','type' => 'text'),
	
	//分享设置
	array('name' => '分享设置','type' => 'heading','desc' => '自定义您的 SNS / rss 地址，以及对应的关注人数'),
	array('name' => '1.1 请选择分享类型','id' => $basic_shortname.'_snsType1','std' => '未选择','type' => 'select','options' => array_values($sns_type)),
	array('name' => '1.2 请输入分享地址','id' => $basic_shortname.'_snsUrl1','std' => '','type' => 'text'),
	array('name' => '1.3 请输入关注人数','id' => $basic_shortname.'_snsNum1','std' => '','type' => 'text'),
	array('name' => '2.1 请选择分享类型','id' => $basic_shortname.'_snsType2','std' => '未选择','type' => 'select','options' => array_values($sns_type)),
	array('name' => '2.2 请输入分享地址','id' => $basic_shortname.'_snsUrl2','std' => '','type' => 'text'),
	array('name' => '2.3 请输入关注人数','id' => $basic_shortname.'_snsNum2','std' => '','type' => 'text'),
	array('name' => '3.1 请选择分享类型','id' => $basic_shortname.'_snsType3','std' => '未选择','type' => 'select','options' => array_values($sns_type)),
	array('name' => '3.2 请输入分享地址','id' => $basic_shortname.'_snsUrl3','std' => '','type' => 'text'),
	array('name' => '3.3 请输入关注人数','id' => $basic_shortname.'_snsNum3','std' => '','type' => 'text'),
	
	//底部图片展示分类
	array('name' => '底部图片展示分类设置','type' => 'heading','desc' => '底部右下角的图片展示，选择需要显示的分类，主题将自动截取该分类的最近 N 篇文章中的缩略图作为展示'),
	array('name' => '请选择分类','id' => $basic_shortname.'_cat','type' => 'select','std' => '未分类','options' => $mx_categories),
	array('name' => '显示数量','id' => $basic_shortname.'_num','std' => '3','type' => 'select','options' => $notice_num),
	
	//广告位设置
	array('name' => '广告位设置','type' => 'heading','desc' => '这里可以开启/关闭广告位，可以在下面填入 Google Adsense 或者百度的广告代码，也可以自定义图片广告，<b>支持 HTML</b>'),
	array('name' => '开启广告位','id' => $basic_shortname.'_ad1','std' => false,'type' => 'checkbox'),
	array('name' => '自定义广告代码','id' => $basic_shortname.'_adcode1','std' => '','type' => 'textarea'),
	
	//网站统计设置
	array('name' => '网站统计设置','type' => 'heading','desc' => '这里可以开启/关闭网站统计功能<br />可以在下面填入第三方的统计代码，<b>支持 HTML</b>'),
	array('name' => '开启统计功能','id' => $basic_shortname.'_analytics_onoff','std' => false,'type' => 'checkbox'),
	array('name' => '自定义统计代码','id' => $basic_shortname.'_analytics_content','std' => '','type' => 'textarea'),
	
	//友情链接
	array('name' => '友情链接设置','type' => 'heading','desc' => '这里可以开启/关闭首页的友情链接滚动展示功能<br />可以在下面填入友链的名称、链接、图片地址（图片尺寸为110px*50px）'),
	array('name' => '开启友情链接功能','id' => $basic_shortname.'_blogroll','std' => false,'type' => 'checkbox'),
	array('name' => '1.1 友链名称','id' => $basic_shortname.'_blogtitle1','std' => '','type' => 'text'),
	array('name' => '1.2 友链链接','id' => $basic_shortname.'_blogurl1','std' => '','type' => 'text'),
	array('name' => '1.3 友链图片','id' => $basic_shortname.'_blogimg1','std' => '','type' => 'text'),
	array('name' => '2.1 友链名称','id' => $basic_shortname.'_blogtitle2','std' => '','type' => 'text'),
	array('name' => '2.2 友链链接','id' => $basic_shortname.'_blogurl2','std' => '','type' => 'text'),
	array('name' => '2.3 友链图片','id' => $basic_shortname.'_blogimg2','std' => '','type' => 'text'),
	array('name' => '3.1 友链名称','id' => $basic_shortname.'_blogtitle3','std' => '','type' => 'text'),
	array('name' => '3.2 友链链接','id' => $basic_shortname.'_blogurl3','std' => '','type' => 'text'),
	array('name' => '3.3 友链图片','id' => $basic_shortname.'_blogimg3','std' => '','type' => 'text'),
	array('name' => '4.1 友链名称','id' => $basic_shortname.'_blogtitle4','std' => '','type' => 'text'),
	array('name' => '4.2 友链链接','id' => $basic_shortname.'_blogurl4','std' => '','type' => 'text'),
	array('name' => '4.3 友链图片','id' => $basic_shortname.'_blogimg4','std' => '','type' => 'text'),
	array('name' => '5.1 友链名称','id' => $basic_shortname.'_blogtitle5','std' => '','type' => 'text'),
	array('name' => '5.2 友链链接','id' => $basic_shortname.'_blogurl5','std' => '','type' => 'text'),
	array('name' => '5.3 友链图片','id' => $basic_shortname.'_blogimg5','std' => '','type' => 'text'),
	array('name' => '6.1 友链名称','id' => $basic_shortname.'_blogtitle6','std' => '','type' => 'text'),
	array('name' => '6.2 友链链接','id' => $basic_shortname.'_blogurl6','std' => '','type' => 'text'),
	array('name' => '6.3 友链图片','id' => $basic_shortname.'_blogimg6','std' => '','type' => 'text'),
	array('name' => '7.1 友链名称','id' => $basic_shortname.'_blogtitle7','std' => '','type' => 'text'),
	array('name' => '7.2 友链链接','id' => $basic_shortname.'_blogurl7','std' => '','type' => 'text'),
	array('name' => '7.3 友链图片','id' => $basic_shortname.'_blogimg7','std' => '','type' => 'text'),
	array('name' => '8.1 友链名称','id' => $basic_shortname.'_blogtitle8','std' => '','type' => 'text'),
	array('name' => '8.2 友链链接','id' => $basic_shortname.'_blogurl8','std' => '','type' => 'text'),
	array('name' => '8.3 友链图片','id' => $basic_shortname.'_blogimg8','std' => '','type' => 'text'),
	array('name' => '9.1 友链名称','id' => $basic_shortname.'_blogtitle9','std' => '','type' => 'text'),
	array('name' => '9.2 友链链接','id' => $basic_shortname.'_blogurl9','std' => '','type' => 'text'),
	array('name' => '9.3 友链图片','id' => $basic_shortname.'_blogimg9','std' => '','type' => 'text'),
	array('name' => '10.1 友链名称','id' => $basic_shortname.'_blogtitle10','std' => '','type' => 'text'),
	array('name' => '10.2 友链链接','id' => $basic_shortname.'_blogurl10','std' => '','type' => 'text'),
	array('name' => '10.3 友链图片','id' => $basic_shortname.'_blogimg10','std' => '','type' => 'text'),
	array('name' => '11.1 友链名称','id' => $basic_shortname.'_blogtitle11','std' => '','type' => 'text'),
	array('name' => '11.2 友链链接','id' => $basic_shortname.'_blogurl11','std' => '','type' => 'text'),
	array('name' => '11.3 友链图片','id' => $basic_shortname.'_blogimg11','std' => '','type' => 'text'),
	array('name' => '12.1 友链名称','id' => $basic_shortname.'_blogtitle12','std' => '','type' => 'text'),
	array('name' => '12.2 友链链接','id' => $basic_shortname.'_blogurl12','std' => '','type' => 'text'),
	array('name' => '12.3 友链图片','id' => $basic_shortname.'_blogimg12','std' => '','type' => 'text')
);

function mytheme_add_admin() {
	global $basic_themename, $basic_shortname, $basic_options;
	if ( $_GET['page'] == basename(__FILE__) ) {
		if ( 'save' == $_REQUEST['action'] ) {
			foreach ($basic_options as $basic_value) {
			update_option( $basic_value['id'], $_REQUEST[ $basic_value['id'] ] ); }
			foreach ($basic_options as $basic_value) {
			if( isset( $_REQUEST[ $basic_value['id'] ] ) ) { update_option( $basic_value['id'], $_REQUEST[ $basic_value['id'] ]  ); } else { delete_option( $basic_value['id'] ); } }
			header("Location: themes.php?page=basic_ctrl.php&saved=true");
			die;
		} elseif( 'reset' == $_REQUEST['action'] ) {
			foreach ($basic_options as $basic_value) {
				delete_option( $basic_value['id'] ); 
				update_option( $basic_value['id'], $basic_value['std'] );
			}
			header("Location: themes.php?page=basic_ctrl.php&reset=true");
			die;
		}
	}
	add_theme_page($basic_themename.' 基本设置', $basic_themename.' 基本设置', 'edit_themes', basename(__FILE__), 'mytheme_admin');
}
function mytheme_admin() {
	global $basic_themename, $basic_shortname, $basic_options;
	if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$basic_themename.' 保存设置' .'</strong></p></div>';
	if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$basic_themename.' 保存设置' .'</strong></p></div>';
?>
	<style type="text/css">
		th{text-align:left;}
		input,textarea{width:100%;}
		select{border-color:#8c8c8c;}
		.submit{width:100px;padding:0;}
		.defaultbutton{padding-left:745px;}
	</style>
	<div class="wrap">
		<h2><b><?php echo $basic_themename.' 基本设置'; ?></b></h2>
		<form method="post">
			<table class="optiontable" >
				<?php foreach ($basic_options as $basic_value) { 
					if ($basic_value['type'] == "text") { ?>
						<tr> 
							<th><?php echo $basic_value['name']; ?>:</th>
							<td>
								<input name="<?php echo $basic_value['id']; ?>" id="<?php echo $basic_value['id']; ?>" type="<?php echo $basic_value['type']; ?>" value="<?php if ( get_settings( $basic_value['id'] ) != "") { echo get_settings( $basic_value['id'] ); } else { echo $basic_value['std']; } ?>" size="40" />
							</td>
						</tr>
					<?php } elseif ($basic_value['type'] == "textarea") { ?>
						<tr>
							<th><?php echo $basic_value['name']; ?>:</th>
							<td>
								<textarea name="<?php echo $basic_value['id']; ?>" id="<?php echo $basic_value['id']; ?>" cols="40" rows="5"/><?php if ( get_settings( $basic_value['id'] ) != "") { echo stripslashes(get_settings( $basic_value['id'] )); } else { echo stripslashes($basic_value['std']); } ?></textarea>
							</td>
						</tr>
					<?php } elseif ($basic_value['type'] == "select") { ?>
						<tr> 
							<th><?php echo $basic_value['name']; ?>:</th>
							<td>
								<select style="font-size:12px" name="<?php echo $basic_value['id']; ?>" id="<?php echo $basic_value['id']; ?>">
								<?php foreach ($basic_value['options'] as $option) { ?>
								<option<?php if ( get_settings( $basic_value['id'] ) == $option) { echo ' selected="selected"'; }?>><?php echo $option; ?></option>
								<?php } ?>
								</select>
							</td>	
						</tr>
					<?php } elseif ($basic_value['type'] == "checkbox") { ?>
						<tr> 
							<th><?php echo $basic_value['name']; ?>:</th>
							<td>
								<input style="width: auto;" name="<?php echo $basic_value['id']; ?>" type="checkbox" value="checkbox"<?php if(get_settings($basic_value['id']) ) { echo ' checked="checked"'; }?>/>
							</td>
						</tr>
					<?php } elseif ($basic_value['type'] == "heading") { ?>
						<tr> 
							<td colspan="2" style="text-align: left;"><hr />
							<h2 style="color:green;"><?php echo $basic_value['name']; ?></h2></td>
							<tr><td colspan=2> <p style="color:red; margin:0 0;" > <?php echo $basic_value['desc']; ?> </P> <hr /></td></tr>
						</tr>
					<?php } ?>
					<?php 
				}
				?>
			</table>
			<hr />
			<div class="submit">
				<input class="button-primary" name="save" type="submit" value="保存" />    
				<input type="hidden" name="action" value="save" />
			</div>
		</form>
		<form method="post" class="defaultbutton">
			<div class="submit">
				<input class="button-secondary" name="reset" type="submit" value="重置" />
				<input type="hidden" name="action" value="reset" />
			</div>
		</form>
	</div>
	<?php
}
add_action('admin_menu', 'mytheme_add_admin'); ?>