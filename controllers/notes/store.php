<?php
	
	use Core\Database;
	use Core\Validator;

	$config = require (base_path('config.php'));

	$db = new Database($config['database']);
	$errors = [];

	if(!Validator::string($_POST['body'],1,1000)){
			$errors['body'] = 'A body of no more than 1000 is required';
		}
		
	if(!empty($errors)){
		return views('notes/create.view.php',[
				'heading'=>'Create Note',
				'errors'=>$errors,
			
			]);
		
		}


	$db->query('insert into notes(body,user_id) values(:body,:user_id)', [
				'body' => $_POST['body'],
				'user_id' => 2,
			]);
	header("location:/notes");
	die();
		



	