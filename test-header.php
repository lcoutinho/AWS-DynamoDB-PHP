<?

require './aws-autoloader.php';
require './MongoGet.php';

set_time_limit(0);

use \Aws\DynamoDb\DynamoDbClient;

$client = \Aws\DynamoDb\DynamoDbClient::factory(array(
    'key' 		=> 'YOUR_KEY',
    'secret' 	=> 'SHHH_ITS_YOUR_SECRET',
    'region' 	=> 'YOUR_REGION', # us-west-x, us-east-x, etc
    'base_url' 	=> 'http://localhost:8000' # you can change the port if your DynamoDB port varies
));

$collection = "TestData";

// just a function to help with output on the page
function nEcho($str) {
    echo "{$str}<br>\n";
}

echo "<pre>"; // these are just so you can read output