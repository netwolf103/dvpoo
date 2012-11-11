<!DOCTYPE HTML>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="UTF-8">
<?php
if (is_home()) {
	$keywords = get_option('dvpoo_keywords');
	$description = get_option('dvpoo_description');
?>
	<link rel="canonical" href="<?php bloginfo('url'); ?>" />
<?php
} elseif ( is_single() ) {
	if ($post->post_excerpt) {
			$description = $post->post_excerpt;
		} else {
			$description = mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 220,"……");
		}
		$keywords = "";
		$tags = wp_get_post_tags($post->ID);
		foreach ( $tags as $tag ) {
			$keywords = $keywords . $tag->name . ", ";
		}
}
?>
	<meta name="keywords" content="<?php echo $keywords; ?>" />
	<meta name="description" content="<?php echo $description; ?>" />
	<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
	<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php bloginfo('url'); ?>/favicon.ico" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" />
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/all.js"></script>
	<?php 
	if (is_home()) { ?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/grayscale.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/pager.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/index.js"></script>
	<!--[if IE 6]>
		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/DD_belatedPNG.js"></script>
		<script type="text/javascript">
			DD_belatedPNG.fix('.png');
		</script>
	<![endif]-->
	<?php }
	?>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/cufon-yui.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/font.js"></script>
	<script type="text/javascript">
		Cufon('#nav ul li a', {
			hover: {
				color: '#C80000'
			}
		});
		Cufon('#nav .sub-menu li a');
		Cufon('#motto p');
		Cufon('.box_hd strong');
		var config = {
			bloginfoTpl : <?php echo '"' . get_bloginfo('template_directory'). '"'; ?>
		};
	</script>
	<?php wp_head(); ?>
	<title><?php wp_title(''); if ( !(is_home()) ) { ?> &raquo; <?php } ?><?php bloginfo('name'); ?></title>
</head>
<body <?php body_class($class); ?>>
	<!-- S Header -->
	<div id="header">
		<div id="logo">
			<h1><a title="<?php bloginfo('name'); ?>" href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
		</div>
		<div id="nav">
			<?php
				if ( function_exists( 'register_nav_menus' ) ) {
					wp_nav_menu(array('theme_location'=>'nav','menu_id'=>'','menu_class' => '','container'=>'ul'));
				}
			?>
		</div>
		<!--<div id="sear">
			<?php //get_search_form(); ?>
		</div>-->
	</div>
	<!-- E Header -->
	