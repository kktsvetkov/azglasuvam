<?php require TEMPLATEPATH . '/header.php'; ?>

<div id="two-columns-header">
	<img style="width:66px; height:66px; margin-left: 30px;" alt="" src="<?php bloginfo('stylesheet_directory'); ?>/h.gif" />
</div>

<table border="0" cellspacing="0" class="two-columns">
<tr>
	<td>
	
<script type="text/javascript">
<!--//
jQuery(document).ready(function() {
	jQuery('#two-columns-header').html(
		jQuery('div.lead').html()
		);
	jQuery('#two-columns-header img').attr('alt',
		jQuery('div.lead h2').text() + ': ' + jQuery('div.lead h6').text()
		);
	});
//-->
</script>
