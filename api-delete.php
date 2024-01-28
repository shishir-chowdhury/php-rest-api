<?php 

include "config.php";
header('Content-Type: application/json');
header('Access-Control-allow-Origin: *');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control_Allow-Headers: Access-Control_Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

$data = json_decode(file_get_contents("php://input"), true);

$product_id = $data['pro_id'];

$sql = "DELETE FROM students WHERE id = {$product_id}";
$statement = $conn->prepare($sql);


if($statement->execute())
{
    echo json_encode(array('message' => 'Record Deleted Successfully', 'status'=> true ));
} else 
{
    echo json_encode(array('message' => 'Data Not Delete', 'status'=>false ));
} 
?>