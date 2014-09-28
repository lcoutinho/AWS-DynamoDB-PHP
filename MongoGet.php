<?

class MongoGet {

    private $connection;

    public function __construct()
    {
        $this->mongoConnect();
    }

    public function getData($collection)
    {
        $collection = $this->connection->Echo->$collection;
        $cursor = $collection->find();

        $data = array();

        foreach($cursor as $row) {
            $data[] = $row;
        }

        return $data;
    }
    
    public function setCollection($collection)
    {
        $this->collection = $collection;
    }

    private function mongoConnect()
    {
        $this->connection = new MongoClient( "mongodb://yourhosthere" );
    }

}