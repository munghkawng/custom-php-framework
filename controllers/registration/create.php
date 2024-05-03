<?php
	
	if($_SESSION['user'] ?? false){
		header('location:/');
		
		exit();
	}
	
	views('registration/create.view.php');