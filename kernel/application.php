<?php

namespace kernel;

use Closure as closure;
use Illuminate\Container\Container;

class application extends Container
{
	private $router = null;

	public function __construct ( router $router )
	{
		$this->router = $router;
		$this->instance ( router::class, $router );
	}

	public function binding ( string $abstract, closure $concrete )
	{
		$this->bind ( $abstract, function ( Container $container, array $parameters = [ ] ) use ( $concrete )
		{
			// change $_GET, $_POST
			return $this->call ( $concrete, array_merge ( $_POST, $_GET ) );
		} );
	}

	public function handle ( string $request )
	{
		if ( ! array_key_exists ( $request, $this->router->routes ) )
			throw new \Exception ( 'Route not found.' );
		$this->make ( $this->router->routes [ $request ] );
	}
}