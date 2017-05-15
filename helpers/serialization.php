<?php

namespace serialization;

/**
 * Check wether a string is serialized.
 * 
 * @param  string  $string 		The string to check for serialization.
 * @return boolean        		True if the string is serialized false if not.
 */
function is_serialized ( $value )
{
	 return ( @unserialize ( $value ) !== false );
}