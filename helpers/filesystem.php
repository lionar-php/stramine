<?php

namespace filesystem;

function require_recursive ( string $directory )
{	
	if ( ! is_dir ( $directory ) )
		throw new \InvalidArgumentException ( "$directory is not a valid directory." );

	$directory = new \RecursiveDirectoryIterator ( $directory );
	$iterator = new \RecursiveIteratorIterator ( $directory );
	$regex = new \RegexIterator ( $iterator, '/^.+\.php$/i', \RecursiveRegexIterator::GET_MATCH );

	foreach ( $regex as $directory )
		foreach ( $directory as $file )
			require $file;
}