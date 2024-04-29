<?php
	
	use Core\App;
	use Core\Database;
	
//	$config = require(base_path('config.php'));
//
//	$db = new Database($config['database']);
	
	$db = App::resolve(Database::class);
	
	
	
	$currentUser = 2;
	
	
	$note = $db->query('select * from notes where id=:id',[
		'id'=>$_POST['id'],
	])->findOrFail();
	
	var_dump($note);
	
	
	authorize($note['user_id'] === $currentUser);
	
	$db->query('delete from notes where id=:id',[
		'id'=>$_POST['id'],
	]);
	
	header('location:/notes');
	exit();
	