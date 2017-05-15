<?php

use kernel\application;
use kernel\router;
use function filesystem\require_recursive;

require  __DIR__ . '/../../autoload.php';


$router = new router;
$application = new application ( $router );
$application->instance ( application::class, $application );

facade::setFacadeApplication ( $application );

require_recursive ( base_path ( ) . '/bindings' );
require_recursive ( app_path ( ) );
require base_path ( ) . '/routes.php';


$request = strtok ( $_SERVER [ 'REQUEST_URI' ], '?' );
$application->handle ( $request );