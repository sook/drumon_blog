<?php
	DrumonModel::load('BlogPost');
	class AppController extends Controller {
		function beforeFilter() {
			
			$posts_right = new  BlogPost();
			
			$posts_right = $posts_right->findAll(array(
				'include' => array('tags','comments_number'),
				'limit'=> '5'
			));
			
			$this->add('right_collum',$posts_right);
			
				$maisvistos = new  BlogPost();
				$maisvistos = $maisvistos->findAll(array(
					'include' => array('tags','comments_number'),
					'limit'=> '5',
					'order'=> 'visits DESC'
				));
				$this->add('maisvistos',$maisvistos);
		}
	}
	
?>
