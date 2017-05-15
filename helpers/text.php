<?php

namespace text;

function capitalize ( string $text ) : string
{
	return ucfirst ( strtolower ( $text ) );
}

function uppercase ( string $text ) : string
{
	return strtoupper ( $text );
}

function lowercase ( string $text ) : string
{
	return strtolower ( $text );
}