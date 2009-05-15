 -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

<title><?php bloginfo('name'); ?> <?php if ( is_single()) { ?> &raquo; Блог <?php } ?> <?php wp_title(); ?></title>

<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php wp_head(); ?>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />

<?php if (is_home()) { ?>
<script type="text/javascript" src="http://az-glasuvam.com.projects.ibm.kaloyan.info/wp-content/themes/az-glasuvam.com/rotator.js"></script>
<script type="text/javascript">
<!--//
var r_modal = 1;

jQuery(document).ready(function() {
	jQuery('a.poslania').click(function() {
		jQuery.rockTheVote(1);
		return false;
		})
//	.click();
	});
//-->
</script>

<?php } ?>
</head>
<body>

<div id="outter"><div id="inner">
	<div id="header">
		<h1><a href="<?php echo get_option('home'); ?>/">Аз Гласувам!</a></h1>
	</div>

	<div id="content">
