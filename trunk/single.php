<!-- <?php get_header('blog'); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<div class="post">
			<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"
				title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php
					the_title(); ?></a></h2>

			<div class="meta">
				
				<?php edit_post_link('edit'); ?>
				
				публикувано на <?php the_time(__('j F Y', 'kubrick')) ?> |
				
				<?php
					the_tags('етикети ', ', ', ' | ');
					
					echo '<a href="#respond">',
						($_ = get_comments_number( $id ))
							? ($_ == 1 ? 'един коментар' : "{$_} коментара")
							: 'няма коментари',
						'</a> (';

					post_comments_feed_link('rss'); ?>) |
					<a href="<?php trackback_url(); ?>" rel="trackback">trackback</a>

			</div>

			<div class="entry" style="margin-bottom: 0;">

				<?php the_content('<p class="serif">Read the rest of this entry &raquo;</p>'); ?>
			</div>
			
			<?php comments_template(); ?>
			
		</div>

	<?php endwhile; else:
	wp_redirect(get_option('home'));
	endif;

get_footer('blog');
