<?php /*
Template Name: &#1055;&#1086;&#1089;&#1083;&#1072;&#1085;&#1080;&#1077;
*/
?>
<?php while (have_posts()) : the_post();
	$_content = do_shortcode(get_the_content());
	$_content = apply_filters('the_content', trim($_content));

	/* KT: this is the closing tag for the UTF hack from page.rotator.php */
	if (isset($_root)) {
		echo ' --> ';
		}
	?>
 
	<div class="author">
		<?php if ($post->snimka) { ?>
			<img src="<?php echo $post->snimka; ?>" alt="<?php echo $post->avtor; ?>" class="avatar"/>
		<?php } ?>

		<h2><?php echo $post->avtor; ?></h2>
		<div class="details"><?php echo $post->poveche; ?></div>
		<?php if ($post->blog_url) { ?>
			<a href="<?php echo $post->blog_url; ?>" target="_blank"
				class="blog"><?php echo $post->blog_title
					? $post->blog_title
					: $post->blog_url; ?></a>
		<?php } ?>
		
	</div>
	
	<div class="caption">
	<?php echo $_content; ?>

	<?php if ($post->original_url) { $first_name = array_shift(explode(' ', $post->avtor)); ?>
		<a class="more" href="<?php echo $post->original_url; ?>">Прочетете
			повече от статията на <?php echo $first_name; ?>
			&quot;<?php echo $post->original_title; ?>&quot;</a>
	<?php } ?>
	</div>

<?php endwhile;