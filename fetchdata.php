<?php

require_once('dbConfig.php');

$id    = $_GET['id'];

$result = array();

if($id){

  $filter = ['_id' => new MongoDB\BSON\ObjectID($id)];

  $options = [];

  $query = new MongoDB\Driver\Query($filter,$options);

  $cursor = $manager->executeQuery('onlinestore.products', $query);

  foreach($cursor as $row){

    $result ['product_name'] = $row->product_name;

    $result ['price']        = $row->price;

    $result ['category']     = $row->category;

    $result ['id']           = $id;

  }

  echo json_encode($result);

}
