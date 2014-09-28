<?

include("MongoGet.php");

$mGet = new MongoGet();

echo "<pre>";

$results = $mGet->getData();

var_dump($results);

echo "</pre>";