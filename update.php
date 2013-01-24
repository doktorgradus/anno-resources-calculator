<?php

define( PASS, '1981' );

ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', 1 );

set_time_limit( 0 );

ob_implicit_flush( true );

$itemsLanguages = array(
	'de' => array(
		'fish' => "Fisch",
    	'bread' => "Brot",
    	'spices' => "Gewürze",
    	'meat' => "Fleisch",
    	'goatmilk' => "Milch",
    	'cider' => "Most",
    	'beer' => "Bier", 
    	'wine' => "Wein", 
    	'woolgarments' => "Wollgewänder", 
    	'linengarments' => "Leinengewänder", 
    	'leatherjerkins' => "Lederwämser", 
    	'furcoats' => "Pelzmäntel", 
    	'brocaderobes' => "Brokatroben", 
    	'books' => "Bücher", 
    	'candlesticks' => "Kerzenleuchter", 
    	'glasses' => "Brillen"
	),
	'en' => array(
		'fish' => "Fish",
    	'bread' => "Bread",
    	'spices' => "Spices",
    	'meat' => "Meat",
    	'goatmilk' => "Milk",
    	'cider' => "Cider",
    	'beer' => "Beer", 
    	'wine' => "Wine", 
    	'woolgarments' => "Woolen Garments",
    	'linengarments' => "Linen Garments",
    	'leatherjerkins' => "Leather Jerkins",
    	'furcoats' => "Fur Coats",
    	'brocaderobes' => "Brocade Robes", 
    	'books' => "Books",
    	'candlesticks' => "Candlesticks",
    	'glasses' => "Glasses"
	),
	'ru' => array(
		'fish' => "Рыба", 
    	'bread' => "Хлеб", 
    	'spices' => "Специи", 
    	'meat' => "Мясо", 
    	'goatmilk' => "Молоко", 
    	'cider' => "Сидр", 
    	'beer' => "Пиво", 
    	'wine' => "Вино", 
    	'woolgarments' => "Шерстяная одежда", 
    	'linengarments' => "Льняная одежда", 
    	'leatherjerkins' => "Кожаные куртки", 
    	'furcoats' => "Шубы", 
    	'brocaderobes' => "Парчовые мантии", 
    	'books' => "Книги", 
    	'candlesticks' => "Канделябры", 
    	'glasses' => "Очки"                      
	)
);

$productionLanguages = array(
	'de' => array(
		'tools' => "Toolmaker's Workshop", 
	    'glass' => "Glass Smelter", 
	    'potash' => "Forest Glassworks", 
	    'fish' => "Fischerhütte", 
	    'meat' => "Metzgerei", 
	    'wheat' => "Weizenfarm", 
	    'flour' => "Mühle", 
	    'bread' => "Bäckerei", 
	    'cattle' => "Rinderfarm", 
	    'salt' => "Saline", 
	    'brine' => "Salzstock", 
	    'spices' => "Gewürzefarm", 
	    'goatmilk' => "Ziegenfarm", 
	    'apples' => "Apfelhof", 
	    'cider' => "Mosthof", 
	    'beer' => "Klosterbrauerei", 
	    'herbs' => "Klostergarten", 
	    'wine' => "Kelterei", 
	    'grapes' => "Weingut", 
	    'barrel' => "Fassküferei", 
	    'wool' => "Schafsfarm", 
	    'woolgarments' => "Spinnerei", 
	    'hemp' => "Hanfplantage", 
	    'linengarments' => "Webstube", 
	    'ironore' => "Eisenmine", 
	    'iron' => "Eisenschmelze", 
	    'coal' => "Köhlemine", 
	    'charcoal' => "Köhlerhütte", 
	    'leatherjerkins' => "Gerberei", 
	    'animalhides' => "Schweinefarm", 
	    'furs' => "Pelztierjäger", 
	    'furcoats' => "Kürschner", 
	    'brocaderobes' => "Seidenweberei", 
	    'goldore' => "Goldmine", 
	    'gold' => "Goldschmelze", 
	    'books' => "Druckerei", 
	    'paper' => "Papiermühle", 
	    'candlesticks' => "Feinschmiede", 
	    'candles' => "Lichtzieher", 
	    'beeswax' => "Imkerei", 
	    'copperore' => "Kupfermine", 
	    'brass' => "Kupferschmelze", 
	    'glasses' => "Brillenmacher", 
	    'quartz' => "Quarzbruch", 
	    'wood' => "Holzfällerhütte"
	),
	'en' => array(
		'tools' => "Toolmaker's Workshop", 
	    'glass' => "Glass Smelter", 
	    'potash' => "Forest Glassworks", 
	    'fish' => "Fisherman's Hut", 
	    'meat' => "Butchery", 
	    'wheat' => "Wheat Farm", 
	    'flour' => "Mill", 
	    'bread' => "Bakery", 
	    'cattle' => "Cattle Farm", 
	    'salt' => "Salt Works", 
	    'brine' => "Salt Mine", 
	    'spices' => "Spice Farm", 
	    'goatmilk' => "Goat Farm", 
	    'apples' => "Cider Farm", 
	    'cider' => "Apple Press", 
	    'beer' => "Monastery Brewery", 
	    'herbs' => "Monastery Garden", 
	    'wine' => "Winepress",  
	    'grapes' => "Vineyard", 
	    'barrel' => "Barrel Cooperage", 
	    'wool' => "Sheep Farm", 
	    'woolgarments' => "Spinner's Hut", 
	    'hemp' => "Hemp Plantation", 
	    'linengarments' => "Weaver's Hut", 
	    'ironore' => "Iron Mine", 
	    'iron' =>  "Iron Ore Smelter", 
	    'coal' => "Coal Mine", 
	    'charcoal' => "Charcoal Burner's Hut", 
	    'leatherjerkins' => "Tannery", 
	    'animalhides' => "Pig Farm", 
	    'furs' => "Trapper's Lodge", 
	    'furcoats' => "Furrier's Workshop", 
	    'brocaderobes' => "Silk Weaving Mill", 
	    'goldore' =>  "Gold Mine", 
	    'gold' => "Gold Ore Smelter", 
	    'books' => "Print Press", 
	    'paper' => "Papermill River", 
	    'candlesticks' => "Metalworks", 
	    'candles' => "Candlemakers Workshop Smelter", 
	    'beeswax' => "Apiary", 
	    'copperore' => "Copper Mine", 
	    'brass' => "Copper Ore Smelter", 
	    'glasses' => "Opticians Workshop", 
	    'quartz' => "Quartz Mason", 
	    'wood' => "Lumberjack's Hut" 
	),
	'ru' => array(
		'tools' => "Инструментальная мастерская", 
	    'glass' => "Стекловаренная печь", 
	    'potash' => "Мастерская стеклодува", 
	    'fish' => "Домик рыбака", 
	    'meat' => "Скотобойня", 
	    'wheat' => "Пшеничная ферма", 
	    'flour' => "Мельница", 
	    'bread' => "Пекарня", 
	    'cattle' => "Животноводческая ферма", 
	    'salt' => "Солеварня", 
	    'brine' => "Соляные копи", 
	    'spices' => "Ферма специй", 
	    'goatmilk' => "Козья ферма", 
	    'apples' => "Яблоневый сад", 
	    'cider' => "Сидроварня", 
	    'beer' => "Монастырская пивоварня", 
	    'herbs' => "Монастырский сад", 
	    'wine' => "Давильный виноградный пресс", 
	    'grapes' => "Виноградник", 
	    'barrel' => "Бондарня (мастерская бочек)", 
	    'wool' => "Овцеферма", 
	    'woolgarments' => "Прядильня", 
	    'hemp' => "Плантация конопли", 
	    'linengarments' => "Домик ткача", 
	    'ironore' => "Шахта железной руды", 
	    'iron' => "Железоплавильная печь", 
	    'coal' => "Шахта угля", 
	    'charcoal' => "Домик углежога", 
	    'leatherjerkins' => "Кожевенная мастерская", 
	    'animalhides' => "Свиноферма", 
	    'furs' => "Домик охотника", 
	    'furcoats' => "Мастерская скорняка", 
	    'brocaderobes' => "Шелкопрядильная мастерская", 
	    'goldore' => "Шахта золотой руды", 
	    'gold' => "Золотоплавильня", 
	    'books' => "Печатный пресс", 
	    'paper' => "Бумажная мастерская", 
	    'candlesticks' => "Кузница", 
	    'candles' => "Свечная мастерская", 
	    'beeswax' => "Пасека", 
	    'copperore' => "Шахта медной руды", 
	    'brass' => "Медеплавильная печь", 
	    'glasses' => "Отпическая мастерская", 
	    'quartz' => "Кварцевый карьер", 
	    'wood' => "Домик дровосека"
	)
);

function splitWord( $word )
{
	$result = '';

	for( $i = 0; $i < strlen( $word ); $i++ )
	{
		$char = $word[$i];

		if( ctype_upper( $char ) && $i > 0 )
		{
			$char = '_' . strtolower( $char );
		}
		else
		{
			$char = strtolower( $char );
		
		}

		$result .= $char;
	}

	return $result;

}

function makeItems( $items )
{
	$itemsJS = 'var items = [';

	foreach( $items as $item )
	{
		$itemsJS .= '[\'' . $item[0] . '\','
			. '\'' . $item[1] . '\','
			. '["' . $item[2][0] . '","' . $item[2][1] . '","' . $item[2][2] . '"],' 
			. '[' . $item[3][0][1] . ',' . $item[3][1][1] . ',' . $item[3][2][1] . ',' . $item[3][3][1] . ',' . $item[3][4][1] . '],' 
			. '[' . $item[4][0][1] . ',' . $item[4][1][1] . ',' . $item[4][2][1] . ',' . $item[4][3][1] . ',' . $item[4][4][1] . ']],';

	}

	$itemsJS .= '];';

	return $itemsJS;

}

function prepareItems( $input, $itemsLanguages )
{
	$tmp     = array();
	$items   = array();

	foreach( $input as $consumption )
	{
		foreach( $consumption['needs'] as $need )
		{
			$good = (string) $need['good'];

			if( !in_array( $good, $tmp ))
			{
				array_push( $tmp, $good );

			}
		}
	}

	foreach( $tmp as $item )
	{
		$names   = array();
		$amounts = array();
		$taxes   = array();
		$icon    = splitWord( $item );

		foreach( $itemsLanguages as $itemKey => $itemVal )
		{
			foreach( $itemVal as $itemId => $itemName )
			{
				
				if( $itemId == strtolower( $item ))
				{
					array_push( $names, $itemName );

				}
			}
		}
		
		foreach( $input as $consumption )
		{
			$type   = $consumption['type'];
			$amount = 0;
			$tax    = 0;
			
			foreach( $consumption['needs'] as $need )
			{
				if( $need['good'] == $item )
				{
					$amount = $need['amount'];
					$tax    = $need['tax'];

				}
			}

			array_push( $amounts, array( $type, $amount ));
			array_push( $taxes, array( $type, $tax ));

		}

		array_push( $items, array( strtolower( $item ), $icon, $names, $amounts, $taxes ));

	}

	return $items;

}

function makeProduction( $items )
{
	$productionJS = 'var productionData = [';
	
	foreach( $items as $item )
	{
		$productionJS .= '[\'' . $item[0] . '\',' 
			. ( count( $item[1] ) > 0 ? '["' . $item[1][0] . '","' . $item[1][1] . '","' . $item[1][2] . '"],' : '[],' ) 
			. $item[2] . ',' 
			. '[' . $item[3] . ']],';

	}

	$productionJS .= '];';

	return $productionJS;

}

function prepareProduction( $input, $productionLanguages )
{
	$production = array();
	$tmp        = array();

	foreach ( $input as $item ) 
	{
		$name       = strtolower( str_replace( 'Production', '', $item['name'] ));
		$time       = $item['time'];
		$names      = array();
		$inputItems = array();

		foreach( $item['input'] as $res )
		{
			$chain = '\'' . strtolower( $res['good'] ) . '\'';
			array_push( $inputItems, $chain );
		
		}
		
		foreach( $productionLanguages as $prodKey => $prodVal )
		{
			foreach( $prodVal as $prodId => $prodName )
			{
				if( $prodId == $name )
				{
					array_push( $names, $prodName );

				}
			}
		}

		array_push( $production, array( $name, $names, $time, implode( ', ', $inputItems )));

	}
	
	return $production;

}

if( !isset( $_GET['p'] ) || intval( $_GET['p'] ) != PASS )
{
	header( 'Location: /404' );
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
	{
		$version = file_get_contents( __DIR__ . '/data/version' );

	}

	if( file_exists( 'http://game-cdn.anno-online.com/de/' . $version . '/data/game_settings.xml' ))
	{
		$data    = file_get_contents( 'http://game-cdn.anno-online.com/de/' . $version . '/data/game_settings.xml' );

		$fd = fopen( __DIR__ . '/data/data.xml', 'w' );
		fputs( $fd, $data );
		fclose( $fd );

		unset( $data );

	}

	if( file_exists( __DIR__ . '/data/data.xml' ))
	{

		//echo '<pre>';

		$xml        = new XMLHandler( '/data/data.xml' );
		$items      = makeItems( prepareItems( $xml->consumptions, $itemsLanguages ));
		$production = makeProduction( prepareProduction( $xml->productions, $productionLanguages ));

		$fd         = fopen( __DIR__ . '/js/data.js', 'w' );
		fputs( $fd, $items );
		fputs( $fd, $production );
		fclose( $fd );

		
		//print_r( $xml->consumptions );
		//echo '</pre>';
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

	}
	
	if( file_exists( __DIR__ . '/data/anno.json' ))
	{
		echo 'Update ' . $version . ': OK';

	}
	else
	{
		echo 'Ooops! Something went terribly wrong... Sad but true.';

	}
}