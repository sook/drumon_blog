<?php foreach ($posts as $post) {
?>
<div class="content_post">
	<div class="dat_post">
		<?php echo $date->show($post['publish_date']).' '.$date->time($post['publish_date']) ?>
	</div>
	<div class="title_post">
		<?php echo '<a href="'.$html->url('/'.$post['id']).'/'.$text->toSlug($post['title'],'-').'">'.$text->highlight($post['title'],$termo_search).'</a>' ?>
	</div>
	<div class="body_post">
		<?php echo $text->highlight($post['content'],$termo_search); ?>
	</div>
	<div class="tg_cm_post">
		<div class="icon"><?=$image->resize('tag.png','13','13'); ?></div>
		<div class="content_tags">
			<span class="tags_dst">tags:</span> <?php 
			$tb=array();
			if (count($post['tags']) != 0) {
				
				foreach ($post['tags'] as $tag) {
					$tb[]= '<a href="'.$html->url('/tag/'.$tag).'">'.$tag.'</a>';
				}
				echo implode(",", $tb);
			} else {
				echo "Nenhuma";
			}
			
			?>
		</div>
		<div class="cm_post_content">
			<span class="icon"><?=$image->resize('comment.png','20','14'); ?></span>
			<?php echo $post['comments_number']; ?> <?php echo $post['comments_number']; ?> <?php echo '<a href="'.$html->url('/'.$post['id']).'/'.$text->toSlug($post['title'],'-').'#comments'.'"">'.'commentss'.'</a>' ?>
		</div>
	</div>
	
</div>
<?php
} ?>
