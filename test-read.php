<?

include('test-header.php');

nEcho("Fetching data...");

$results = $client->scan(array(
    'TableName' => $collection,
    'Limit' => 1000000
    ));

var_dump($results);

nEcho("Script ending...");

include("test-footer.php");