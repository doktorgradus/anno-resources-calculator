<?php

class Autoloader
{
    private static $lastLoadedFile;
    
    public static function loadClass( $class )
    {
        ini_set( 'include_path', '.' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR . 'classes' . DIRECTORY_SEPARATOR );
        self::$lastLoadedFile = '.' . DIRECTORY_SEPARATOR . 'php' . DIRECTORY_SEPARATOR  . 'classes' . DIRECTORY_SEPARATOR . str_replace( '_', DIRECTORY_SEPARATOR, $class ) . '.php';
        require_once( self::$lastLoadedFile );

    }

    public static function loadClassAndLog( $class )
    {
        self::loadClass( $class );
        printf( "Class %s was loaded from %s\n", $class, self::$lastLoadedFile );

    }
}