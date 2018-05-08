






<?php

require_once('dbConfig.php');

$flag    = isset($_GET['flag'])?intval($_GET['flag']):0;

$message ='';

if($flag){

  $message = $messages[$flag];

}

$filter = [];

$options = [
    'sort' => ['_id' => -1],
];

$query = new MongoDB\Driver\Query($filter, $options);

$cursor = $manager->executeQuery('onlinestore.products', $query);



?>




<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <title>Produts table</title>
  </head>
  <body>
  <div class="container">
  <div class="row">
  <form id="form1" name='form1' action="record_add.php" method="post">

<input type='hidden' name='id' id='id' value="" />

 <table>

 <tr>

   <td><input type='text' name='product_name' id='product_name' placeholder="Product Name" /></td>

   <td><input type='text' name='price' id='price' placeholder="Price" /></td>

  <td><input type='text' name='category' id='category' placeholder="Category" /></td>

 <td><input class='btn' type='submit' name='btn' id='btn' value="Add Records" /></td>

  </tr>

</table>

</form>
</div>
  <table class='table table-bordered'>
   <thead>

      <tr>
            <th>#</th>

            <th>Prodcut</th>

            <th>Price</th>

             <th>Category</th>
    
            <th>Action</th>

      </tr>
  
   </thead>

    <?php 

    $i =1; 

    foreach ($cursor as $document) {   ?>

      <tr>

      <td><?php echo $i; ?></td>

      <td><?php echo $document->product_name;  ?></td>

      <td><?php echo $document->price;  ?></td>        
    
     <td><?php echo $document->category;  ?></td>
      
     <td><a class='editlink' data-id=<?php echo $document->_id; ?> 
             href='javascript:void(0)'>Edit</a> |
        <a onClick ='return confirm("Do you want to remove this
                     record?");' 
        href='record_delete.php?id=<?php echo $document->_id;  ?>'>Delete</td>

      </tr>

     <?php $i++;  

  } 

  ?>

</table>
</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
    <script src='https://code.jquery.com/jquery-3.1.1.min.js'><script>

      $(function() {

        $('.editlink').on('click', function(){

          var id = $(this).data('id');

          $.ajax({

            method: "GET",

            url: "fetchdata.php",

            data: { id:  id },

          }).done(function( data ) {

            $('#id').val(data[0]['_id']);

            $('#product_name').val(data[0]['product_name']);

            $('#price').val(data[0]['price']);

            $('#category').val(data[0]['category']);

            $("#subbtn").val('Edit Product');

            $('#form1').attr('action', '/edit');

          });

        });

      });</script>
  </body>
</html>