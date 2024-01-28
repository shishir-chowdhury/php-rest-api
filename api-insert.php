<?php 
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow_Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control_Allow-Headers: Access-Control_Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$product_name = $data['pro_name'];
$product_price = $data['pro_price'];
$product_description = $data['pro_description'];

$sql = "INSERT INTO products(product_name, product_price, product_description) VALUES ('{$product_name }', {$product_price }, '{$product_description}')";

$statement = $conn->prepare($sql);
if($statement->execute())
{
    echo json_encode(array('message' => 'Data Inserted Successfully', 'status' => true));
} else
{
    echo json_encode(array('message' => 'Data Not Inserted', 'status' => false));
}

    
 




?>