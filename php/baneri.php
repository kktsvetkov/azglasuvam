<?php
/**
* @version SVN:$Id$
*/

/////////////////////////////////////////////////////////////////////////////

/**
* @internal prevent from direct calls
*/
if (!defined('ABSPATH')) {
	exit;
	}

/////////////////////////////////////////////////////////////////////////////

$prefix = '<a href="http://az-glasuvam.com" title="Аз Гласувам: интернет инициатива за насърчаване гласуването на предстоящите парламентарни избори и избори за европейски парламент">';
$suffix = '"/></a>';

$banners = array(
	'125x125' => array(
		array('http://farm3.static.flickr.com/2029/3547780045_345ac9c5a9_o.png', ''),
		array('http://farm4.static.flickr.com/3604/3548591602_2392be0606_o.png', ''),
		),
	'250x250' => array(
		array('http://farm4.static.flickr.com/3312/3547780099_08fda0f0bf_o.png', ''),
		array('http://farm4.static.flickr.com/3549/3548591618_5861970cc9_o.png', ''),
		
		array('http://farm3.static.flickr.com/2427/3547780177_540ff984eb_o.png', ''),
		array('http://farm4.static.flickr.com/3664/3547780193_77b1738ffc_o.png', ''),
		),
	'300x250' => array(
		array('http://farm4.static.flickr.com/3620/3547780123_cbfab12a7f_o.png', ''),
		array('http://farm4.static.flickr.com/3372/3548591648_9172d045e8_o.png', ''),
		),
	'468x60' => array(
		array('http://farm4.static.flickr.com/3663/3547780133_f93fa7bbae_o.png', ''),
		array('http://farm3.static.flickr.com/2421/3547780143_c81b337bc0_o.png', ''),
		),
	'728x90' => array(
		array('http://farm4.static.flickr.com/3637/3547780171_8082e00acf_o.png', ''),
		array('http://farm4.static.flickr.com/3625/3548591710_59460db55f_o.png', ''),
		),
	);

$html = '';
foreach ($banners as $d=>$b) {
	$html .= "<h4>Банери {$d}</h4><br/>";
	
	$img = explode('x', $d);
	$img = "<img width=\"{$img[0]}\" height=\"{$img[1]}\" src=\"";
	
	foreach ($b as $B) {
		$html .= "<div class='banner'>{$prefix}{$img}{$B[0]}{$suffix}</div><textarea class='html'>{$prefix}{$img}{$B[0]}{$suffix}</textarea><br /><p>{$B[1]} &nbsp;</p>";
		}
	}

return $html;

