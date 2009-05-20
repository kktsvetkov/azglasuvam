<?php
/*
Plugin Name: &#1040;&#1079; &#1043;&#1083;&#1072;&#1089;&#1091;&#1074;&#1072;&#1084;!
Plugin URI: http://az-glasuvam.com/razprostrani-poslaniyata/#WordPress
Description: &#1058;&#1086;&#1079;&#1080; &#1087;&#1083;&#1098;&#1075;&#1080;&#1085; (&#1087;&#1088;&#1080;&#1089;&#1090;&#1072;&#1074;&#1082;&#1072;, &#1088;&#1072;&#1079;&#1096;&#1080;&#1088;&#1077;&#1085;&#1080;&#1077;) &#1097;&#1077; &#1074;&#1080; &#1091;&#1083;&#1077;&#1089;&#1085;&#1080; &#1087;&#1088;&#1080; &#1087;&#1086;&#1089;&#1090;&#1072;&#1074;&#1103;&#1085;&#1077;&#1090;&#1086; &#1085;&#1072; &#1082;&#1086;&#1076;&#1072; &#1085;&#1072; <a href="http://az-glasuvam.com">"&#1040;&#1079; &#1043;&#1083;&#1072;&#1089;&#1091;&#1074;&#1072;&#1084;!"</a> &#1085;&#1072; &#1074;&#1072;&#1096;&#1080;&#1103; &#1073;&#1083;&#1086;&#1075;.
Version: 0.1
Author: Kaloyan K. Tsvetkov
Author URI: http://kaloyan.info/
*/

/**
* @internal prevent from direct calls
*/
if (!defined('ABSPATH')) {
	exit;
	}

/**
* Attach the HTML code to the header
*/
Function az_glasuvam_wp_head() { ?>
<!-- [http://az-glasuvam.com] -->
<link rel="stylesheet" href="http://az-glasuvam.com/rotator.css" type="text/css" />
<script type="text/javascript" src="http://az-glasuvam.com/rotator.js"></script>
	<? }

/**
* @internal hook it up 
*/
add_action('wp_head', 'az_glasuvam_wp_head');