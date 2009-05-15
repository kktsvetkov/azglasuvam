<?php /*
Template Name: &#1042;&#1089;&#1080;&#1095;&#1082;&#1080; &#1087;&#1086;&#1089;&#1083;&#1072;&#1085;&#1080;&#1103;
*/
?>
<!-- <?php get_header('2columns');
while (have_posts()) : the_post(); ?>

	<div class="lead">
		<img src="<?php bloginfo('stylesheet_directory'); ?>/2columns-<?php echo sanitize_title(urlDecode($post->post_name)); ?>.gif" />
		<h2><?php the_title(); ?></h2>
		<h6><?php the_excerpt(); ?></h6>
	</div>

	<div class="post"><?php the_content(); ?></div>

<?php endwhile;

edit_post_link('Edit this entry.', '<p>', '</p>');

global $az_glasuvam;
$_p = $az_glasuvam->poslania();
foreach($_p as $page_id) {
	$wp_query = new WP_Query('page_id=' . $page_id);
	?>
<div class="rotator all"><!--
<?php include TEMPLATEPATH . '/page.poslanie.php'; ?>
</div>
	<?php
	}
	
get_footer('2columns'); ?>