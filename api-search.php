<?php 

include "config.php";
header('Content-Type: application/json');
header('Access-Control-allow-Origin: *');

$data = json_decode(file_get_contents("php://input"), true);
$search_value = $data['search'];

$sql = "SELECT * FROM products WHERE name LIKE '%{$search_value}%'";
$statement = $conn->prepare($sql);
$statement->execute();
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
if($results)
{
    foreach($results as $row)
    {
        echo json_encode($row);
    }
} else 
{
    echo json_encode(array('message' => 'No Record Found', 'status'=>false ));
} 
?>