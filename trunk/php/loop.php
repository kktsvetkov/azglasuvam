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

	while (have_posts()) : the_post(); ?>

		<div class="post" >
			<h2 class="title"><a href="<?php the_permalink() ?>" rel="bookmark"
				title="<?php printf(__('Permanent Link to %s', 'kubrick'), the_title_attribute('echo=0')); ?>"><?php
					the_title(); ?></a></h2>

			<div class="meta">
				
				<?php edit_post_link('edit'); ?>
				
				публикувано на <?php the_time(__('j F Y', 'kubrick')) ?> |
				
				<?php
					the_tags('етикети ', ', ', ' | ');
					comments_popup_link('няма коментари', 'един коментар', '% коментара ', '', '' );
				?>

			</div>

			<div class="entry">

				<?php the_content(__('Read the rest of this entry &raquo;', 'kubrick')); ?>
				
			</div>
		</div>

	<?php endwhile; ?>

	<div class="navigation"><?php az_glasuvam::pagination(); ?></div>