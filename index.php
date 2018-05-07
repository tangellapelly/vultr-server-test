<?php 

error_reporting(1);
 require 'vendor/autoload.php';
 $collection = (new MongoDB\Client("mongodb://127.0.0.1:27017"))->test->movie;

// add a record
$document = array( "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
$collection->insert($document);

// add another record, with a different "shape"
$document = array( "title" => "XKCD", "online" => true );
$collection->insert($document);

// find everything in the collection
$cursor = $collection->find();

/* iterate through the results
foreach ($cursor as $document) {
    echo $document["title"] . "\n";
}*/

?>


