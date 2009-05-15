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
	
get_footer('2columns'); ?>