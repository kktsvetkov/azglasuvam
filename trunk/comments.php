<?php // Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		wp_redirect(get_option('home'));

	/* This variable is for alternating comment background */
	$oddcomment = 'class="alt" ';
?>

<!-- You can start editing here. -->

<?php if ($comments) : ?>
	<h3 id="comments">Дискусия <?php comments_number('(няма коментари)', '(1 коментар)', '(% коментара)' );?> </h3>

	<ol class="commentlist">

	<?php foreach ($comments as $comment) : ?>

		<li <?php echo $oddcomment; ?> >
			
			<div class="author">
				<?php echo get_avatar( $comment, 32 ); ?>
				
				<b><?php comment_author_link() ?></b> 

				<a href="#comment-<?php comment_ID() ?>"
					title=""><?php comment_date('F jS, Y') ?> / <?php comment_time() ?></a>
					<?php edit_comment_link('edit'); ?>			

			</div>

			<?php if ($comment->comment_approved == '0') : ?>
				<em style="color: black;">&bull; Вашият коментар изчаква проверка от спам защитата.</em><br />
			<?php endif; ?>

			<?php comment_text() ?>
		</li>

	<?php
		/* Changes every other comment to a different class */
		$oddcomment = ( empty( $oddcomment ) ) ? 'class="alt" ' : '';
	?>

	<?php endforeach; /* end for each comment */ ?>

	</ol>
<?php endif;


if ('open' == $post->comment_status) : ?>

<h3 id="respond">Напишете коментар</h3>

<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>You must be <a href="<?php echo get_option('siteurl');
		?>/wp-login.php?redirect_to=<?php echo
		urlencode(get_permalink()); ?>">logged
		in</a> to post a comment.</p>
<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

<?php if ( $user_ID ) : ?>

	<p>Logged in as <a href="<?php echo get_option('siteurl');
		?>/wp-admin/profile.php"><?php echo $user_identity;
		?></a>. <a href="<?php echo get_option('siteurl');
		?>/wp-login.php?action=logout" title="Log out of
		this account">Log out &raquo;</a></p>

<?php else : ?>

	<p><input type="text" name="author" id="author"
		value="<?php echo $comment_author; ?>" size="42"
		tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
	<label for="author"><small>Име <?php if ($req) echo "(задължително)"; ?></small></label></p>

	<p><input type="text" name="email" id="email"
		value="<?php echo $comment_author_email; ?>" size="42"
		tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
	<label for="email"><small>e-Mail <?php if ($req) echo "(задължително, няма да се показва)"; ?></small></label></p>

	<p><input type="text" name="url" id="url"
		value="<?php echo $comment_author_url; ?>" size="42" tabindex="3" />
	<label for="url"><small>Сайт / Блог </small></label></p>

<?php endif; ?>

<p><textarea name="comment" id="comment" rows="10" tabindex="4" style="width:99%;"></textarea></p>

<p style="background: #FFFFE6 ;border: solid 1px #F0F0D6; width:99%;">
<small style="padding: 6px 11px; display: block;"><strong>XHTML:</strong> Позволено ви е да използвате следните тагове: <code><?php echo allowed_tags(); ?></code></small></p>

<p><input name="submit" type="submit" id="submit" tabindex="5" value="Изпрати" />
<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
</p>
<?php do_action('comment_form', $post->ID); ?>

</form>

<?php endif; // If registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
