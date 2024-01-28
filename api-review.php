<?php 

include "config.php";
header('Content-Type: application/json');
header('Access-Control-Allow_Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control_Allow-Headers: Access-Control_Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$review_name = $data['rev-name'];
$review_email = $data['rev-email'];
$review_text = $data['rev-txt'];
$product_id = $data['pro-name']; 

$sql = "INSERT INTO reviews(customer_name, email, review_text, 	product_id ) VALUES ('{$review_name}', '{$review_email}', '{$review_text}', '$product_id')";

$statement = $conn->prepare($sql);
if($statement->execute())
{
    echo json_encode(array('message' => 'Data Inserted Successfully', 'status' => true));
} else
{
    echo json_encode(array('message' => 'Data Not Inserted', 'status' => false));
}

?>