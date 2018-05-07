<?php 


 require 'vendor/autoload.php';
 $collection = (new MongoDB\Client("mongodb://127.0.0.1:27017"))->test->movie;

// connect
//$m = new MongoClient();
/*
// select a database
$db = $m->test;

// select a collection (analogous to a relational database's table)
$collection = $db->movie;

// add a record
$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
$collection->insert($document);

// add another record, with a different "shape"
$document = array( "title" => "XKCD", "online" => true );
$collection->insert($document);

// find everything in the collection
$cursor = $collection->find();

// iterate through the results
foreach ($cursor as $document) {
    echo $document["title"] . "\n";
}
*/
?>


