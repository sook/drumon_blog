<div class="content_post">
	<div class="dat_post">
		<?php echo $date->show($post['publish_date']).' '.$date->time($post['publish_date']) ?>
	</div>
	<div class="title_post">
		<?php echo '<a href="'.$html->url('/'.$post['id']).'/'.$text->toSlug($post['title'],'-').'">'.$post['title'].'</a>' ?>
	</div>
	<div class="body_post">
		<?php echo $post['content'] ?>
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
			<?php echo $post['comments_number']; ?> <?php echo '<a href="'.$html->url('/'.$post['id']).'/'.$text->toSlug($post['title'],'-').'#comments'.'"">'.'commentss'.'</a>' ?>
		</div>
	</div>
	
</div>

<div class="content_comment">
	<h1>COMENTÁRIOS</h1>
	<a name="comments"></a>
	<hr>
	<div class="box_lines_comments">
		<?php foreach ($comments as $comment): ?>
		<div class="lines_comments">
			<div>
				<?php
				if ($comment['site'] != null) {
					echo '<a href="'.$comment['site'].'">'.$image->gravatar($comment['email']).'</a>';
				} else {
					echo $image->gravatar($comment['email']);
				}
				?>
					Escrito por: <?php echo $comment['name'] ?>
			</div>
			<div>
				<?php echo $comment['content'] ?>
			</div>
			<div>
				Postado em : <?php echo $date->show($comment['created_at'],'comment_date');  ?>
			</div>
		</div>
		<?php endforeach ?>
	</div>
	<hr>
	<div class="content_comments_list">
		<div class="box_comments">
			<h1>Comentario</h1>
		</div>
	</div>
	<div class="content_form_comment">
		<?php
		if (isset($success)) {
			if ($success == true) {
				echo '
					<div class="msg_frmg">
					'.$message.'	
					</div>
				';
			} elseif ($success == false) {
				echo '
					<div class="msg_frmr">
					'.$message.'	
					</div>
				';
			}
		}
			?>
		<form action="<?=$html->url($request_uri) ?>" method="post">
			<div class="line_form_label_form">
				<label>Nome <span class="obrigatory">(obrigatório)</span>:</label>
			</div>
			
			<div class="line_form_post">
				<input type="text" name="comment[name]" class="input_form_comment" placeholder="Nome">	
			</div>
			<div class="line_form_label_form">
				<label for="email">Email <span class="obrigatory">(obrigatório)</span>:</label>
			</div>
			<div class="line_form_post">
				<input type="text" name="comment[email]" class="input_form_comment" placeholder="Email">
			</div>
			<div class="line_form_label_form">
				<label for="site">Site:</label>
			</div>
			<div class="line_form_post">
				<input type="text" name="comment[site]" class="input_form_comment" placeholder="Site">
			</div>
			<!-- Parâmetros para redirect -->
			<input type="hidden" name="comment[record_id]" value="<?php echo $post['id']; ?>">
			<div class="line_form_label_form">
			<label for="mensagem">Mensagem <span class="obrigatory">(obrigatório)</span>:</label>
			</div>
			<div class="line_form_post">
			<textarea cols="30" rows="10" name="comment[content]" class="text_area_form" placeholder="Mensagem"></textarea>
			</div>
			<div>
				<input type="submit" value="Enviar" class="input_submit_contact">
			</div>
		</form>
	</div>
</div>