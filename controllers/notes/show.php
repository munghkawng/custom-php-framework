<?php
	use Core\Database;
	
	$config = require(base_path('config.php'));
	
	$db = new Database($config['database']);
	
	$currentUser = 2;
	
		$id = $_GET['id'];
		
		$note = $db->query('select * from notes where  id =:id', [
			
			'id' => $id,])->findOrFail();
		
		
		authorize($note['user_id'] === $currentUser);
		
		views('notes/show.view.php', [
			'heading' => 'Note',
			'note' => $note,
		]);
		

	