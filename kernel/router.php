<?php

namespace kernel;

class router
{
	public $routes = [ ];
	
	public function get ( string $uri, string $action )
	{
		$this->routes [ $uri ] = $action;
	}

	public function post ( string $uri, string $action )
	{
		$this->routes [ $uri ] = $action;
	}
}