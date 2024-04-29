<?php
	
//	return  [
//		'/'=>'controllers/index.php',
//		'/about'=>'controllers/about.php',
//		'/contact'=>'controllers/contact.php',
//		'/note'=>'controllers/notes/show.php',
//		//'/delete'=>'controllers/notes/delete.php',
//		'/notes'=>'controllers/notes/index.php',
//		'/notes/create'=>'controllers/notes/create.php',
//	];
	
	
	
	$router->get('/','controllers/index.php');
	$router->get('/about','controllers/about.php');
	$router->get('/contact','controllers/contact.php');
	$router->get('/notes','controllers/notes/index.php');
	
	$router->get('/notes/create','controllers/notes/create.php');
	$router->post('/notes','controllers/notes/store.php');
	
	$router->get('/note','controllers/notes/show.php');
	$router->delete('/note','controllers/notes/destroy.php');
	
