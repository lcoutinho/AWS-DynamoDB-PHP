<?

include("test-header.php");


nEcho("Getting list of tables...");

// get all tables in the database

$results = $client->listTables(array(
    'Limit' => 100
    )
);

print_r($results);

// remove all tables from the database

nEcho("Removing all tables from the database...");

foreach($results['TableNames'] as $result) {
    $result = $client->deleteTable(array(
        'TableName' => $result
    ));

    nEcho("{$result} removed.");
}

nEcho("All tables removed, script ending...");

include("test-footer.php");