<?php 
include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow_Origin: *');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control_Allow-Headers: Access-Control_Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$id   = $data['pro_id'];
$product_name = $data['pro_name'];
$product_price  = $data['pro_price'];
$product_description = $data['pro_description'];

$sql = "UPDATE products SET product_name = '{$product_name}', product_price = $product_price, product_description = '{$product_description}' WHERE id = {$id}";

$statement = $conn->prepare($sql);
if($statement->execute())
{
    echo json_encode(array('message' => 'Data Updated Successfully', 'status' => true));
} else
{
    echo json_encode(array('message' => 'Data Not Updated', 'status' => false));
}

    
 




?>