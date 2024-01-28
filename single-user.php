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
    margin-top: 50px;" class="page-header"> 
            <h1>Single Product Info</h1>
            <a href="index.html"><button class="all-products">All Products</button></a>
    </div>
<?php 
    include "config.php";

    $product_id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id = {$product_id}";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $row)
?>

<div>
    <table class="single-table">
        
    		<img style="width: 461px; height:300px"  class="img-tag" src="https://images.pexels.com/photos/90946/pexels-photo-90946.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1">
            <caption>Dummy Image</caption>
            
    	
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
    </table>
    <button style="background-color: lightcoral;" class="review-btn">Submit Review</button>

         <!-- Modal Section -->
    <div id="modal">
        <div style="height: 400px;" id="modal-form">
            <h2 style="text-align:center">Submit Review</h2>
            <table style="margin: auto;">
                <form id="edit-form">
                        <tr>
                            <td>Name:</td>
                            <td>
                                <input type="text" hidden name="pro-name" value="<?php echo $product_id;?>" >
                                <input name="rev-name" class="tr-modal" type="text">
                            </td>
                        </tr>
                        <tr>
                            <td>Email:</td>
                            <td><input name="rev-email" class="tr-modal" type="email"></td>
                        </tr>
                        <tr class="tr-modal">
                            <td>Write a review:</td>
                            <td>
                                <textarea name="rev-txt" class="tr-modal" name="" id="txt-area" cols="30" rows="10"></textarea>
                            </td>
                        </tr>
                        <tr class="tr-modal">
                            <td></td>
                            <td>
                                <input class="tr-modal" type="submit" id="revw-submit" value="Submit">
                            </td>
                        </tr>
  
                </form>
                <div id="error-message"></div>
                <div id="success-message"></div>
            </table>
            <div id="close-btn">
                x
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
    $(document).ready(function()
    { 
        // Show success and error message
        function message(message, status)
        {
            if(status == true)
            {
                $("#success-message").html(message).slideDown();
                $("#error-message").slideUp();
                setTimeout(() => {
                    $("#success-message").slideUp()
                }, 4000);
            } else if (status == false)
            {
                $("#error-message").html(message).slideDown();
                $("#success-message").slideUp();
                setTimeout(() => {
                    $("#error-message").slideUp()
                }, 4000);
            }
        }

        // Function for form data to JSON object
        function jsonData(targetForm)
        {
            // Get all data from the input field as a array
            var arr = $(targetForm).serializeArray();
            
            // set key and value on the object
            var obj = {};
            for(var a=0; a < arr.length; a++)
            {
                if(arr[a].value == "")
                {
                    return false;
                }
                obj[arr[a].name] = arr[a].value;
            }
            // Convert the object to JSON
            var JSON_string = JSON.stringify(obj);
            return JSON_string;
        }
        // Product review 
        $('.review-btn').on("click", function()
        {
            $("#modal").show();
            $("#revw-submit").on("click", function(e){
            e.preventDefault();
            var jsonObj = jsonData("#edit-form");
            console.log(jsonObj);
            if(jsonObj == false)
            {
                message("All Fields Are Required!!!!", false);
            } else 
            {
                $.ajax
                ({
                    url: "http://localhost/php-rest-api/api-review.php",
                    type: "POST",
                    data: jsonObj,
                    success: function(data)
                    {
                        
                        message(data.message, data.status);
                        
                        // Reset the form
                        if(data.status == true)
                        {
                            $("#modal").hide();

                        }

                    }

                });
            }
            });
        })

        //Hide Modal Box
        $("#close-btn").on("click", function(){
            $("#modal").hide();
        });

    });

</script>
    
</body>
</html>