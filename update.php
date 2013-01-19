<?php
	
define( PASS, '1981' );

if( intval( $_GET['p'] ) != PASS )
{
	header( 'Location: /404.html' );
	exit;

}
else
{
	require_once __DIR__ . '/php/classes/Autoloader.php';

	spl_autoload_register( array( 'Autoloader', 'loadClass' ));

	if( isset( $_GET['v'] ))
	{
		$version = (string) $_GET['v'];
		file_put_contents( __DIR__ . '/data/version', $version );
	}
	else
		$version = file_get_contents( __DIR__ . '/data/version' );

	$data    = file_get_contents( 'http://game-cdn.anno-online.com/de/' . $version . '/data/game_settings.xml' );

	$fd = fopen( __DIR__ . '/data/data.xml', 'w' );
	fputs( $fd, $data );
	fclose( $fd );

	unset( $data );

	$xml = new XMLHandler();

	$json = array( 
		'Interval' =>  $xml->interval,
		'Multiplier' => $xml->goodsMultiplier,
		'Goods' => $xml->goods,
		'Needs' => $xml->needs,
		'Inhabitants' => $xml->inhabitants,
		'Consumptions' => $xml->consumptions,
		'Productions' => $xml->productions,
		'Buildings' => $xml->buildings
	
	);

	file_put_contents( __DIR__ . '/data/anno.json', json_encode( $json ));

	if( file_exists( __DIR__ . '/data/anno.json' ))
	{
		echo 'Update ' . $version . ': OK';

	}
}