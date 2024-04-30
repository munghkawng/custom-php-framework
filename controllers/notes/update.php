<?php
	
	use Core\App;
	use Core\Database;
	use Core\Validator;
	
	
	$db = App::resolve(Database::class);
	
	$currentUserId = 2;
	
	// find the corresponding notes
	$note = $db->query("select * from notes where id=:id",[
		'id'=>$_POST['id']
	])->findOrFail();
	
	// authorize current user to edit
	authorize($note['user_id'] === $currentUserId);

	// validate the form
	
	$errors = [];
	

	
	if(!Validator::string($_POST['body'],1,1000)){
		$errors['body'] = 'A body of no more than 1000 characters is required.';
	}
	
	// if not validation error , update the record
	if(count($errors)){
		return view('notes/edit.view.php',[
			'heading'=>'Edit Note',
			'errors'=>$errors,
			'note'=>$note,
		]);
	}
	
	$db->query('update notes set body = :body where id = :id',[
		'id'=>$_POST['id'],
		'body'=>$_POST['body'],
	]);
	
	// redirect user;
	
	header('location:/notes');
	die();
	
