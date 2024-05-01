<?php
	use Core\App;
	use Core\Validator;
	use Core\Database;
	
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$errors = [];
	
	//validate the inputs
	if(!Validator::email($email)){
		$errors['email'] = "please provide a password of at least 7 characters";
	}
	
	
	if(!Validator::string($password,7,255)){
		$errors['password'] = "Please provide a password of seven characters";
	}
	
	if(!empty($errors)){
		return views('registration/create.view.php',[
			'errors'=>$errors
		]);
	}
	// check if the account exists or not
	
	$db = App::resolve(Database::class);
	
	$user = $db->query('select * from users where email = :email',[
		'email'=>$email,
	])->find();
	
	if($user){
		// if yes, redirect to the login page
		header('location:/');
		exit();
		
	}else {
		// if not, save it to the database, login the user in and  redirect
		$db->query('insert into users(email,password) values(:email,:password)',[
			'email'=>$email,
			'password'=>$password,
		]);
		
		//mark that user has logged in
		$_SESSION['user'] =[
			'email'=>$email,
			
		];
		
		header('location: /');
		exit();
		
	}
	
	
	
	
	