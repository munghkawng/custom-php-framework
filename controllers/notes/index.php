<?php
	
	
	
	use Core\App;
	use Core\Database;
	

	
	$db = App::resolve(Database::class);
	
	$notes = $db->query('select * from notes')->get();
	

	 views('notes/index.view.php',
		 ['heading'=>'My Notes', 'notes'=>$notes ]);
	