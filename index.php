<?php

ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );
set_time_limit( 0 );
ob_implicit_flush( true );

require_once __DIR__ . '/vendor/autoload.php';

$app    = new Silex\Application();
$app['debug'] = true;
$app->register( new Silex\Provider\TwigServiceProvider());
$app->loader = new \Twig_Loader_Filesystem( __DIR__ . '/html' );
$app->twig   = new \Twig_Environment( $app->loader, array( 'debug' => true ));
$app->get( '/', function() use ( $app ) 
{
    $template = $app->twig->loadTemplate( 'mainpage.html' );

    return $template->render( 
    	array( 
			'site' => array( 
				'owner' => 'doktorgradus'
				'title' => 'City Consumptions Calculator', 
				'brand' => 'Anno-Game.ru',
				'menu' => array(
					'main' => 'Main',
					'calc' => 'City Consumptions Calculator',
					'test' => 'Test'
				),
				'url' => array(
					'main' => '/',
					'calc' => '/city-consumptions-calculator',
					'test' => ''
				)
			)
    	)
	);
})->bind( 'homepage' );

$app->get( '/city-consumptions-calculator', function()
{
	return "Main page";
});

$app->get( '/404.html', function()
{
	$template = $app->twig->loadTemplate( '404.html' );

    return $template->render( 
    	array( 
    		'page' => array(
    			'text' => 'This page was sinked in deep sea...'
			)
    	)
    );


});

$app->run();