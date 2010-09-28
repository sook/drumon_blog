<?php
	
	class HomeController extends AppController {
	
		function index() {
			$this->helpers('Paginate');
			
			$posts = new  BlogPost();
			
			$pages = $posts->paginate($this->params['page'],array(
				'include' => array('tags','comments_number'),
				'perPage' => '1'
			));
			
			$this->add('pages',$pages);
			$this->add('title','Blog Teste.');
			$this->add('selected_menu','home');
		}
		
		function tag() {
			
			$posts = new  BlogPost();
			$posts = $posts->findAll(array(
				'include' => array('tags','comments_number'),
				'tags' => $this->params['tag']
			));
			$this->add('posts',$posts);
			$this->add('title','desenvolvedor.');
			$this->add('selected_menu','home');
		}
		
		function show() {
			if ($this->request->method == 'post') {
				$this->comment();
			}
			
			$post = new BlogPost();
			echo $this->params['pg_id'];
			$post->addVisit($this->params['id']);
			$post = $post->find($this->params['id'], array(
				'include' => array('tags','comments_number')
			));
			$comments =  new BlogPost();
			$comments = $comments->findComments($this->params['id']);
			$this->add('comments',$comments);
			$this->add('post',$post);
			$this->add('title','desenvolvedor.');
			$this->add('selected_menu','home');
			
		}
		function search() {
			
			$posts = new  BlogPost();
			$posts = $posts->findAll(array(
				'include' => array('tags','comments_number'),
				'where' => 'title like "%'.$this->params['busca'].'%" or content like "%'.$this->params['busca'].'%"'
			));
			$this->add('posts',$posts);
			$this->add('title','Pesquisa.');
			$this->add('termo_search',$this->params['busca']);
			$this->add('selected_menu','home');
		}
		function comment(){

			if(empty($this->params['comment']['name']) || empty($this->params['comment']['email']) || empty($this->params['comment']['content'])){
	            $this->add('success',false);
	            $this->add('message','Todos os campos são obrigatórios!');
	            return;
	        } else {
			$this->add('success',true);
			$this->add('message','Comentário enviado com sucesso! ');
			$postcomment = new BlogPost();
			$postcomment->saveComment($this->params['comment']);
			// $this->redirect('/'.$this->params['pg_id'].'/'.$this->params['pg_title']);
			}
		}
	}
	
?>
