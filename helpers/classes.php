<?php

namespace classes;

function name ( $object ) 
{
    $path = explode ( '\\', get_class ( $object ) );
    return array_pop ( $path );
}