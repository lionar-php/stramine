<?php

use Closure as closure;

function when ( string $request, closure $task )
{
	app::binding ( $request, $task );
}

function then ( $task )
{
	return $task;
}

function apply ( $task )
{
	return $task;
}

function a ( $task )
{
	return $task;
}