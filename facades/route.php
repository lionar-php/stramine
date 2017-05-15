<?php

use kernel\router;

class route extends facade
{
	protected static function getFacadeAccessor ( )
    {
        return router::class;
    }
}