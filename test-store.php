<?

include('test-header.php');

nEcho("Creating table(s)...");

// create test table

$client->createTable(array(
'TableName' => $collection,
'AttributeDefinitions' => array(
        array(
            'AttributeName' => 'id',
            'AttributeType' => 'N'
        )
    ),
    'KeySchema' => array(
        array(
            'AttributeName' => 'id',
            'KeyType'       => 'HASH'            
        )
    ),
    'ProvisionedThroughput' => array(
        'ReadCapacityUnits'  => 10,
        'WriteCapacityUnits' => 20
    )
));

$result = $client->describeTable(array(
    'TableName' => $collection
));

nEcho("Done creating table...");

// you could replace this block with non-Mongo code
nEcho("Getting data from Mongo...");

// instantiate class and get data
$mGet = new MongoGet();
$results = $mGet->getData($collection);

nEcho ("Done retrieving Mongo data...");

nEcho ("Inserting data...");

$i = 0;
foreach($results as $result) {
    $insertResult = $client->putItem(array(
        'TableName' => $collection,
        'Item' => $client->formatAttributes(array(
            'id'    => $i,
            'date'  => $result['date'],
            'value' => $result['value'],
            )),
        'ReturnConsumedCapacity' => 'TOTAL'
    ));

    $i++;
}

nEcho("Done Inserting, script ending...");

include("test-footer.php");