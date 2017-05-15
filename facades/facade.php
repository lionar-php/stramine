<?php

abstract class facade
{
    protected static $application = null;
    protected static $resolvedInstance;
    
    /**
     * Get the root object behind the facade.
     *
     * @return mixed
     */
    public static function getFacadeRoot ( )
    {
        return static::resolveFacadeInstance ( static::getFacadeAccessor ( ) );
    }

    /**
     * Get the registered name of the component.
     *
     * @return string
     *
     * @throws \RuntimeException
     */
    protected static function getFacadeAccessor ( )
    {
        throw new RuntimeException ( 'Facade does not implement getFacadeAccessor method.' );
    }
    /**
     * Resolve the facade root instance from the container.
     *
     * @param  string|object  $name
     * @return mixed
     */
    protected static function resolveFacadeInstance ( $name )
    {
        if ( is_object ( $name ) )
            return $name;
        if ( isset ( static::$resolvedInstance [ $name ] ) )
            return static::$resolvedInstance [ $name ];
        
        return static::$resolvedInstance [ $name ] = static::$application [ $name ];
    }

    /**
     * Get the application instance behind the facade.
     *
     * @return \Illuminate\Contracts\Foundation\Application
     */
    public static function getFacadeApplication ( )
    {
        return static::$application;
    }

    /**
     * Set the application instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $application
     * @return void
     */
    public static function setFacadeApplication ( $application )
    {
        static::$application = $application;
    }
    /**
     * Handle dynamic, static calls to the object.
     *
     * @param  string  $method
     * @param  array   $args
     * @return mixed
     *
     * @throws \RuntimeException
     */
    public static function __callStatic ( $method, $args )
    {
        $instance = static::getFacadeRoot ( );
        if ( ! $instance )
            throw new RuntimeException ( 'A facade root has not been set.' );
        return $instance->$method ( ...$args );
    }
}