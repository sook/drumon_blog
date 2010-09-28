<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="en-us">
	<head>
		<meta charset="UTF-8" />	
		<meta http-equiv="Keywords" content=""/>
		<meta http-equiv="Description" content=""/>
		<meta name="Author" content=""/>
		<?=$html->showcss(array('reset.css','style.css')); ?>
		<title>Bem Vindo, <?=$title?></title>
		<?=$html->showjs(array('jquery-1.4.2.min.js','jquery.html5form-min.js')) ?>
		    </script>

		    <script>
		        $(document).ready(function(){
		            $('#myform').html5form({
						allBrowsers: true
					});    
		        });
		 </script>
		
		
	</head>
	<body>
		<div id="conteinter_geral">
			<div id="topo">
				<div id="logo_text">
					Blog de Teste
				</div>
				<div id="menu">
					<ul class="conteiner_menu <?=$selected_menu;?>">
						<li class="home"><?=$html->link('Blog','/') ?></li>
						<li class="sobre"><?=$html->link('Sobre','/sobre') ?></li>
						<li class="contato"><?=$html->link('Contato','/contato') ?></li>
					</ul>
				</div>
			</div>
			
			<div id="center">
				<div id="conteudo">
					<div id="posts">
						<?= $content ?>
					</div>
					
				</div>
				<div id="right">
					<div id="search">
						<form action="<?=$html->url('/pesquisar') ?>" method="post" >
							<input type="text" id="ipt_search" name="busca" placeholder="Buscar por" maxlength="50"></input>
							<input type="submit" value="Buscar" id="bottom_search"/>
						</form>
						
					</div>
					<div class="right_content">
						<div class="right_content_top">
							Ultimos Posts
							<span class="icon"><?=$image->resize('lapis.jpg','11','11'); ?></span>
						</div>
						<ul class="right_content_lines">
							<?php foreach ($right_collum as $right): ?>
							<li><?php echo '<a href="'.$html->url('/'.$right['id']).'/'.$text->toSlug($right['title'],'-').'">'.$text->truncate($right['title'],64,array('ending'=>'...')).'</a>' ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					<div class="right_content">
						<div class="right_content_top">
							Mais Vistos
							<span class="icon"><?=$image->resize('lapis.jpg','11','11'); ?></span>
						</div>
						<ul class="right_content_lines">
							<?php foreach ($maisvistos as $maisvisto): ?>
								<li><?php echo '<a href="'.$html->url('/'.$maisvisto['id']).'/'.$text->toSlug($maisvisto['title'],'-').'">'.$text->truncate($maisvisto['title'],64,array('ending'=>'...')).'</a>' ?></li>
							<?php endforeach ?>
						</ul>
					</div>
					
				</div>
			</div>
			
			<div id="rodape">
				<a href="http://www.drumoncms.com" target="_blank">
					<img src="<?=$html->image_path('drumon_logo.png') ?>" alt="">
				</a>
			</div>
		</div>

	</body>
</html>