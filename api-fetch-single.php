<?php 

header('Content-Type: application/json');
header('Access-Control-allow-Origin: *');
include "config.php";
$data = json_decode(file_get_contents("php://input"), true);
$product_id = $data['pro_id'];

$sql = "SELECT * FROM products WHERE id = {$product_id}";
$statement = $conn->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if($results)
{
        echo json_encode($results);
    
} else 
{
    echo json_encode(array('message' => 'No Record Found', 'status'=>false ));
} 
?>