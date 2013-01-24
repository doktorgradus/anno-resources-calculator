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
    $template = $app->twig->loadTemplate( 'homepage.html' );

    return $template->render( 
    	array( 
			'site' => array( 
				'owner' => 'doktorgradus',
				'title' => 'Anno Online site', 
				'brand' => 'Anno-Game.ru',
				'menu' => array(
					'main' => 'Main',
					'calcs' => 'Calculators',
					'citycalc' => 'City Consumptions Calculator',
					'language' => 'Language',
					'russian' => 'Russian',
					'german' => 'German',
					'english' => 'English'
				),
				'url' => array(
					'main' => '/',
					'citycalc' => '/city-consumptions-calculator',
					'test' => ''
				),
				'page' => array(
					'active' => 'homepage',
					'title' => 'Anno Online Main Page'
				)
			)
    	)
	);
})->bind( 'homepage' );

$app->get( '/city-consumptions-calculator', function() use ( $app )
{
	$template = $app->twig->loadTemplate( 'city-consumptions-calculator.html' );

	return $template->render( 
    	array( 
			'site' => array( 
				'owner' => 'doktorgradus',
				'title' => 'Anno Online site', 
				'brand' => 'Anno-Game.ru',
				'menu' => array(
					'main' => 'Main',
					'calcs' => 'Calculators',
					'citycalc' => 'City Consumptions Calculator',
					'language' => 'Language',
					'russian' => 'Russian',
					'german' => 'German',
					'english' => 'English'
				),
				'url' => array(
					'main' => '/',
					'citycalc' => '/city-consumptions-calculator',
					'test' => ''
				),
				'page' => array(
					'active' => 'citycalc',
					'title' => 'City Consumptions Calculator',
					'timetitle' => 'Time',
					'housetitle' => 'Houses',
					'inhabitanttitle' => 'Inhabitants',
					'consumptionstitle' => 'Consumptions',
					'goldtitle' => 'Money',
					'buildingstitle' => 'Buildings',
					'time' => 'Time in minutes',
					'peasants' => 'Peasants',
					'citizens' => 'Vassals',
					'patricians' => 'Merchants',
					'noblemans' => 'Imperials'
				)
			)
    	)
	);
})->bind( 'citycalc' );

$app->error( function( \Exception $e, $code ) use ( $app ) 
{
    if( $code == 404 ) 
    {
        $template = $app->twig->loadTemplate( '404.html' );

	    return $template->render( 
	    	array( 
				'site' => array( 
					'owner' => 'doktorgradus',
					'title' => 'Anno Online site', 
					'brand' => 'Anno-Game.ru',
					'menu' => array(
						'main' => 'Main',
						'calcs' => 'Calculators',
						'citycalc' => 'City Consumptions Calculator',
						'language' => 'Language',
						'russian' => 'Russian',
						'german' => 'German',
						'english' => 'English'
					),
					'url' => array(
						'main' => '/',
						'citycalc' => '/city-consumptions-calculator',
						'test' => ''
					),
					'page' => array(
						'active' => '404',
						'title' => 'Page of 404 error',
						'text' => 'This page was sink in deep sea'
					)
				)
	    	)
		);
    
    }

    return new Response('We are sorry, but something went terribly wrong.', $code);

});

$app->run();