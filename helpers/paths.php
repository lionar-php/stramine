<?php

function base_path ( )
{
	return realpath ( __DIR__ . '/../../../..' );
}

function app_path ( )
{
	return base_path ( ) . '/application';
}

function configuration_path ( )
{
	return base_path ( ) . '/configuration';
}

function storage_path ( )
{
	return base_path ( ) . '/storage';
}