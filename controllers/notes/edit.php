<?php
	use Core\App;
	use Core\Database;
	
	
	$db = App::resolve(Database::class);
	
	$currentUser = 2;
	
	$id = $_GET['id'];
	
	$note = $db->query('select * from notes where  id =:id', [
		
		'id' => $id,])->findOrFail();
	
	
	authorize($note['user_id'] === $currentUser);
	
	views('notes/edit.view.php',[
		'heading'=>'Edit Note',
		'errors'=>[],
		'note'=>$note,
	
	]);