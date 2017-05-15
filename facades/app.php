<?php

use kernel\application;

class app extends facade
{
	protected static function getFacadeAccessor ( )
    {
        return application::class;
    }
}