<?php /*
Template Name: &#1056;&#1086;&#1090;&#1072;&#1090;&#1086;&#1088;
*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title><?php bloginfo('name'); ?></title>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/rotator.css" type="text/css" media="screen" />
<script type='text/javascript' src='<?php bloginfo('stylesheet_directory'); ?>/rotator.js'></script>
<script type="text/javascript">
(new Image).src = '<?php bloginfo('stylesheet_directory'); ?>/i.gif';

/* <?php /* */

	global $az_glasuvam;
	$_p = $az_glasuvam->poslania();

/* */?> */

var r_modal = 1;
var poslania = [<?php echo join(', ', $_p); ?>];
var loading = false;

/**
*/
function poslanie(where) {

	// already loading ?
	//
	if (loading) {
		return false;
		}
	loading = true;

	// where are we ?
	//
	var current = jQuery('.rotator .nav span').text();
	var target = 1 * current + where;
	if (target < 1) {
		target = poslania.length;
		}
	if (target > poslania.length) {
		target = 1;
		}
	jQuery('.rotator .nav span').html(target);
	jQuery('#inject').html('<div id=\"loading\"></div>');
	
	jQuery.get('<?php echo get_option('home'); ?>/?page_id=' + poslania[target -1], {},
		function(html){
			jQuery('#inject').html('<!-- ' + html);
			loading = false;
			});
	}
</script>
</head>
<body class="mission">

	<div class="rotator">

		<div class="nav">

			<a onClick="poslanie(+1);" class="next" title="напред">напред</a><a
				onClick="poslanie(-1);" class="prev" title="назад">назад</a>
			<span>1</span> от <?php echo count($_p); ?>

		</div>

		<div id="inject">

			<!-- <?php /* KT: the opening tag for the HTML
			comment is going to be closed by the included
			template -- this is an UTF hack ;) */

			$wp_query = new WP_Query('page_id=' . $_p[0]);
			include TEMPLATEPATH . '/page.poslanie.php';
			?>

		</div>
	</div>
</body>
</html>