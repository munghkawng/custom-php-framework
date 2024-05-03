<?php
	
	namespace Core;
	use Core\Middleware\Auth;
	use Core\Middleware\Guest;
	use JetBrains\PhpStorm\NoReturn;
	
	class Router{
		protected array $routes =[];
		
		public function add($method,$uri,$controller)
		{
			$this->routes[] = [
				'uri'=>$uri,
				'controller'=>$controller,
				'method'=>$method,
				'Middleware'=>null,
			];
			
			return $this;
			
		}
		
		public function get($uri,$controller)
		{
			return $this->add('GET',$uri,$controller);
		
		}
		
		public function post($uri,$controller)
		{
			return $this->add('POST',$uri,$controller);
		
		}
		
		public function delete($uri,$controller)
		{
			return $this->add('DELETE',$uri,$controller);
		
		}
		
		public function put($uri,$controller)
		{
			return $this->add('PUT',$uri,$controller);
		
		}
		
		public function patch($uri,$controller)
		{
			return $this->add('PATCH',$uri,$controller);
		
		}
		
		public function only($key){
			$this->routes[array_key_last($this->routes)]['Middleware'] = $key;
			return $this;
		}
		
		public function route($uri,$method){
			
			foreach ($this->routes as $route){
				if($route['uri'] === $uri && $route['method'] === strtoupper($method)){
					
					if($route['Middleware'] === 'guest'){
						(new Guest)->handle();
					}
					if($route['Middleware'] === 'auth'){
						(new Auth)->handle();
					
					}
					return require base_path($route['controller']);
				}
			
			}
			$this->abort();
			
			
		}
		
		#[NoReturn] function abort($code = 404): void
		{
			http_response_code($code);
			require base_path("views/{$code}.php");

			die();
	}
	}
	
	

//
//
//	function routeToController($uri,$routes): void
//	{
//		if(array_key_exists($uri,$routes)){
//			require base_path($routes   [$uri]);
//		}else {
//			abort();
//
//		}
//
//	}
