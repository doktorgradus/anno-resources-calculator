var result_amount = 0;
var chain         = [];
var production    = [];
var resultChain   = [];
var language      = 2; // 0: de, 1: en, 2:ru

jQuery( '.consumptions legend' ).html( 'Consumptions per ' + jQuery( '#time' ).val() + ' minutes' );

jQuery( 'input' ).on( 'keyup', function()
{
    var value = jQuery( this ).val();
    var id    = jQuery( this ).attr( 'id' );

    if( value != 0 )
    {
        switch( id )
        {
            case 'peasant_houses':
                jQuery( '#peasants' ).val( value * 8 );
                break;

            case 'citizen_houses':
                jQuery( '#citizens' ).val( value * 15 );
                break;

            case 'patrician_houses':
                jQuery( '#patricians' ).val( value * 25 );
                break;

            case 'nobleman_houses':
                jQuery( '#noblemans' ).val( value * 40 );
                break;

            case 'peasants':
                jQuery( '#peasant_houses' ).val( Math.ceil( value / 8 ));
                break;

            case 'citizens':
                jQuery( '#citizen_houses' ).val( Math.ceil( value / 15 ));
                break;

            case 'patricians':
                jQuery( '#patrician_houses' ).val( Math.ceil( value / 25 ));
                break;

            case 'noblemans':
                jQuery( '#nobleman_houses' ).val( Math.ceil( value / 40 ));
                break;
            case 'time':
                jQuery( '.consumptions legend' ).html( 'Consumptions per ' + jQuery( '#time' ).val() + ' minutes' );
                break;

        }
    }

    calculateConsumptions();

});

function calculateConsumptions()
{
    result_amount = 0;
    resultChain   = [];
    chain         = [];
    production    = [];

    var table = '<table class="table table-hover">';
        table += '<thead><tr><th>Item</th><th>Units</th></tr></thead>';
        table += '<tbody>';

    for( var i = 0; i < items.length; i++ ) 
    {
        var production = calculateConsumptionAmount( items[i][0], items[i][3] );

        if( production > 0 )
        {
            table += '<tr><td><img src="/data/icons/goods/' + items[i][1] + '.png" alt="' + items[i][2][language] + '" title="' + items[i][2][language] + '">' + items[i][2][language] + '</td><td>' + production + '</td></tr>';

        }
    }

    table += '</tbody>';
    table += '</table>';
    jQuery( '#result_consumptions' ).html( table );
}

function calculateConsumptionAmount( item, amounts ) 
{
    var time                  = (document.getElementById('time') != null) ? document.getElementById('time').value : 0;
    var peasants              = (document.getElementById('peasants') != null) ? document.getElementById('peasants').value : 0;
    var citizens              = (document.getElementById('citizens') != null) ? document.getElementById('citizens').value : 0;
    var patricians            = (document.getElementById('patricians') != null) ? document.getElementById('patricians').value : 0;
    var noblemans             = (document.getElementById('noblemans') != null) ? document.getElementById('noblemans').value : 0;
    var imperials             = (document.getElementById('imperials') != null) ? document.getElementById('imperials').value : 0;
    var gameTicks             = time * 2;
    var consumptionPeasants   = amounts[0] * peasants;
    var consumptionCitizens   = amounts[1] * citizens;
    var consumptionPatricians = amounts[2] * patricians;
    var consumptionNoblemans  = amounts[3] * noblemans;
    var consumptionImperials  = amounts[4] * imperials;

    var consumptionTotal = Math.ceil(
    (
        consumptionPeasants + consumptionCitizens 
            + consumptionPatricians 
            + consumptionNoblemans 
            + consumptionImperials
    ) * gameTicks );

    result_amount = consumptionTotal;
    
    calculateProduction( item );

    return consumptionTotal;

}

function calculateProduction( item ) 
{
    var time = 0;

    chain.push( item );
    buildChain( item );

    production = [];

    var buildings = [];
    for( var i = 0; i < chain.length; i++ ) 
    {
        var current = chain[i]; 
        
        for( var j = 0; j < productionData.length; j++ )
        {
            if(productionData[j][0] == current ) 
            {
                production.push( [current, productionData[j][2], result_amount] );

            }
        }
    }

    calculateBuildings();

}

function buildChain( item ) 
{
    for( var i = 0; i < productionData.length; i++ ) 
    {
        if( productionData[i][0] == item && productionData[i][3].length > 0 ) 
        {
            for( var j = 0; j < productionData[i][3].length; j++ ) 
            {
                chain.push( productionData[i][3][j] );
                buildChain( productionData[i][3][j] );

            }
        }
    }
}

function calculateBuildings() 
{
    var totalTime = document.getElementById( 'time' ).value * 60; // min ==> sec;

    //resultChain = [];

    for( var i = 0; i < production.length; i++ ) 
    {
        var productionTime      = production[i][1];
        var totalAmount         = production[i][2];
        var productionPerPeriod = totalTime / productionTime;
        var buildingCount       = 1;
        var buildingName        = '';

        if( productionPerPeriod < result_amount ) 
        {
            while( productionPerPeriod < result_amount ) 
            {
                buildingCount++;
                productionPerPeriod = totalTime / ( productionTime / buildingCount );

            }
        }

        for( var j = 0; j < productionData.length; j++ ) 
        {
            if( productionData[j][0] == production[i][0] ) 
            {
                buildingName = productionData[j][1][language];
                break;

            }
        }

        resultChain.push( [buildingName, buildingCount, productionPerPeriod, production[i][0]] );

    }


    var result = '';

    /*for( var k = 0; k < resultChain.length; k++ ) 
    {
        result += '<p>Городу надо ' + resultChain[k][1] 
                + ' ' + resultChain[k][0] 
                + ' чтобы сделать ' + Math.round( resultChain[k][2], 0 ) 
                + ' из требуемых ' + result_amount 
                + ' ' + resultChain[k][3] 
                + ' за ' + ( totalTime / 60 ) + ' минут</p>';

    }

    document.getElementById('result_chain').innerHTML = result;*/

}