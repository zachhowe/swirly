<div id="content">
	<?php foreach ($posts as $post) { ?>
	<div class="post">
		<div class="post-title"><?= anchor('/blog/post/' . $post->id, $post->title); ?></div>
		<div class="post-date">on <?= $post->date; ?></div>
		<div class="post-author">by <?= anchor('/blog/author/' .  $authors[$post->id]->id, $authors[$post->id]->displayname); ?></div>
		<div class="post-content">
			<?= $post->content; ?>
		</div>
	</div>
	<?php } ?>
</div>
