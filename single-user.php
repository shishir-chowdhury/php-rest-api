<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Single Products</title>
</head>
<body>
    <!-- Header -->
    <div style="width: 24%; margin: auto;
    margin-top: 100px;" class="page-header"> 
            <h1>PHP REST API</h1>
    </div>
<?php 
    include "config.php";

    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = {$id}";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row)
?>

<div>
    <table class="single-table">
        
    		<img style="width: 450px;"  class="img-tag" src="https://returntofreedom.org/wp-content/uploads/shop-placeholder.png">
            
    	
    	<tr>
    		<td>Product Name</td>
    		<td><?php echo $row['product_name']?></td>
    	</tr>
    	<tr>
    		<td>Product Price(Tk)</td>
    		<td><?php echo $row['product_price'] ?></td>
    	</tr>
    	<tr>
    		<td>Description</td>
    		<td><?php echo $row['product_description'] ?></td>
    	</tr>
        <tr>
            <td>Add Some Review:</td> 
    		<td><textarea name="" id="txt-area" cols="30" rows="10"></textarea></td>
        </tr>
        
    		
    	
    </table>
</div>
    
</body>
</html>