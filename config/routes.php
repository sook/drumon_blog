<?php
	//  Rota basica.
	// 	$route['get']['/blog'] = array('Blog','index');
	// 	
	// 	
	// 	Rota com variável.
	// 	$route['get']['/tag/:tag'] = array('Blog','tags');
	// 	
	// 	
	// 	Rota com variável e expresão regular.
	// 	$route['get']['/tag/:tag'] = array('Blog','tags',':tag'=>'[a-zA-Z0-9_]');
	// 	
	// 	
	// 	Redirecionamento com rotas.
	// 	$route['*']['/twitter'] = array('redirect'=>'http://twitter.com');
	// 	$route['*']['/twitter'] = array('redirect'=>'http://twitter.com',302);
	
	
	
	// Rota para o inicio da aplicação.
	$route['get']['/'] = array('Home','index');
	$route['get']['/sobre'] = array('Sobre','index');
	$route['get']['/contato'] = array('Contato','index');
	$route['get']['/tag/:tag'] = array('Home','tag');
	$route['*']['/:id/:title'] = array('Home','show',':id'=>'[0-9]');
	$route['post']['/pesquisar'] = array('Home','search');
	$route['get']['/pagina/:page'] = array('Home','index',':page'=>'[0-9]');
	
	
	
?>