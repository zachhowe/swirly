<div id="content">
	<div class="post">
		<div class="post-title"><?= $post->title; ?></div>
		<div class="post-date">on <?= $post->date; ?></div>
		<div class="post-author">by <?= anchor('/blog/author/' .  $author->id, $author->displayname); ?></div>
		<div class="post-content">
			<?= $post->content; ?>
		</div>
	</div>
</div>
