<?php  
	
class XMLHandler
{
	public $data;
	public $interval;
	public $goodsMultiplier;

	public $goods        = array();
	public $needs        = array();
	public $inhabitants  = array();
	public $consumptions = array();
	public $productions  = array();
	public $buildings    = array();

	public function __construct( $file = 'data.xml' )
	{
		try 
		{
			$xmlPath = $this->serverPath() . '/' . $file;
			
			if( !file_exists( $xmlPath ))
			{
				throw new Exception( 'Не найден файл ' . $xmlPath );
			
			}
			
			$this->data  = simplexml_load_file( $xmlPath );
			$this->loadXMLData();

		}
		catch( Exception $e ) 
		{
			echo $e->GetMessage(), "\n";
			
		}
	}
	
	protected function loadXMLData()
	{
		$this->interval        = $this->data->Globals->ConsumptionIntervall['gameticks'];
		$this->goodsMultiplier = $this->data->Globals->GoodsMultiplier['value'];
		$this->extractGoods( $this->data->Goods->Good );
		$this->extractNeeds( $this->data->Needs->Need  );
		$this->extractInhabitants( $this->data->CivLevels->CivLevel );
		$this->extractConsumptions( $this->data->PopulationDefinitions->Population );
		$this->extractProductions( $this->data->Productions->ProductionDefinition );
		$this->extractBuildings( $this->data->GameObjects->Buildings->Building );

	}

	protected function extractGoods( $xml )
	{
		foreach( $xml as $good )
		{
			$id   = (int) $good[0]['id'];
			$name = (string) $good[0]['name'];
			array_push( $this->goods, array( 'id' => $id, 'name' => $name ));
			
		}
	}

	protected function extractNeeds( $xml )
	{
		foreach( $xml as $need ) 
		{
			$id   = (int) $need[0]['id'];
			$name = (string) $need[0]['name'];
			array_push( $this->needs, array( 'id' => $id, 'name' => $name ));

		}
	}

	protected function extractInhabitants( $xml )
	{
		foreach( $xml as $population ) 
		{
			$id   = (int) $population[0]['id'];
			$name = (string) $population[0]['name'];
			array_push( $this->inhabitants, array( 'id' => $id, 'name' => $name ));

		}
	}

	protected function extractConsumptions( $xml )
	{
		foreach( $xml as $population ) 
		{
			$social = (string) $population['civLevel'];
			$max    = (int) $population['maxInhabitants'];
			$needs  = array();

			foreach( $population->RelativeNeed as $relativeNeed )
			{
				foreach( $relativeNeed->Consumption as $consumption )
				{
					$good   = (string) $consumption['good'];
					$amount = (float) $consumption['amount'];
					$gold   = (float) $consumption->Tax['gold'];
					array_push( $needs, array( 
						'good' => $good, 
						'amount' => $amount, 
						'gold' => $gold

					));
				}
			}
			
			array_push( $this->consumptions, array( 
				'type' => $social, 
				'max' => $max,
				'needs' => $needs

			));
		}
	}

	protected function extractProductions( $xml )
	{
		foreach( $xml as $production ) 
		{
			$id      = (int) $production[0]['id'];
			$name    = (string) $production[0]['name'];
			$time    = (int) $production[0]['productionTime'];
			$output  = $this->splitGoods( (string) $production[0]['outputGood'] );
			$input   = $this->splitGoods( (string) $production[0]['inputGood'] );

			array_push( $this->productions, array( 
				'id' => $id, 
				'name' => $name,
				'time' => $time,
				'output' => $output,
				'input' => $input

			));
		}
	}

	protected function extractBuildings( $xml )
	{
		foreach( $xml as $building )
		{
			$costs        = array();
			$consumptions = array();
			$id           = (int) $building['id'];
			$name         = (string) $building['name'];
			$type         = (string) $building['type'];
			$production   = (string) $building['production'];
			
			if( isset( $building->Consumption ))
			{
				$consumptions = array( 
					'good' => (string) $building->Consumption['good'],
					'amount' => (string) $building->Consumption['amount']
					
				);
			}

			if( isset( $building->Consumption ))
			{
				foreach( $building->Costs->Cost as $cost )
				{
					$costType   = (string) $cost['type'];
					$costAmount = (int) $cost['amount'];

					if( strtolower( $costType ) !== 'coins' )
					{
						$costName = (string) $cost['name'];
					
					}
					else
					{
						$costName = $costType;

					}

					array_push( $costs, array( 
						'type' => $costType, 
						'name' => $costName, 
						'amount' => $costAmount

					));
				}
			}

			array_push( $this->buildings, array( 
				'id' => $id, 
				'name' => $name,
				'type' => $type, 
				'production' => $production, 
				'consumptions' => $consumptions,
				'costs' => $costs

			));
		}
	}

	protected function splitGoods( $input )
	{
		$output = array();

		if( strpos( $input, ' ' ) !== false )
		{
			if( strpos( $input, ',' ) !== false )
			{
				$tmp = explode( ',', $input );
				
				foreach( $tmp as $item )
				{
					$good = explode( ' ', trim( $item ));
					array_push( $output, array( 'good' => $good[0], 'qty' => $good[1] ));
					
				}
			}
			else
			{
				$good = explode( ' ', $input );
				array_push( $output, array( 'good' => $good[0], 'qty' => $good[1] ));
				
			}
		}
		
		return $output;

	}

	public function serverPath()
	{
		return $_SERVER['DOCUMENT_ROOT'];
		
	}
}