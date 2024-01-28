<?php 
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


$sql = 'SELECT * FROM products';
$statement = $conn->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if($results)
{
       echo json_encode($results);
        
} else
{
   echo json_encode(array('message' => 'No Record Found', 'status' => false));
}

?>