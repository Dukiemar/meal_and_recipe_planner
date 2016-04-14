<?php	
	session_start();
	$userName = $_SESSION["username"];
?>

<html>
    <head>
        <title> Kitchen </title>
    </head>
    
    <body>
        
        <?php
            $servername = getenv('IP');
            $username = getenv('C9_USER');
            $password = "";
            $database = "c9";
            $dbport = 3306;
        
        
        	// Create connection
            // $db = new mysqli($servername, $username, $password, $database, $dbport);
        	$db=mysqli_connect($servername, $username, $password, $database, $dbport);
        	
            // Check connection
            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            } 
            //echo "Connected successfully (".$db->host_info.")";
        
        	if (!$db){
        		die("Error with connecting:  " .mysql_error());
        	}
        	
        	mysqli_select_db($db,"c9");
        	$userID = $_SESSION["user_id"];
        	//echo $userID;
	        //Queries
	        //Getting Ingredient names and Quantities from 
            $query = "SELECT `kitchen_id` FROM `kitchen` WHERE `user_id` = '$userID'";
            $result = mysqli_query($db, $query);
            
            if (mysqli_num_rows($result) > 0){
                while ($row = mysqli_fetch_assoc($result)){
                    $kid = $row["kitchen_id"];
                }
            }
            //ingredient_name from ingredient -- quantity from ingredient_kitchen -- measurement_name from measurement
            $query2 = "SELECT ingredient.ingredient_name, measurement.measurement_name, ingredient_kitchen.kitchen_quantity FROM ingredient JOIN ingredient_kitchen ON ingredient.ingredient_id = ingredient_kitchen.ingredient_id JOIN measurement ON ingredient_kitchen.measurement_id = measurement.measurement_id";
            $result2 = mysqli_query($db, $query2);
            
            if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                    echo " - Ingredient Name: " . $row["ingredient_name"]. " - Measurement: " . $row["measurement_name"]. " - Quantity: " . $row["kitchen_quantity"] . "<br>";
                }
            } else {
                echo "0 results";
            }
            
            
            
        ?>
        <a href="home.php">
          <input class="bk" type="submit" src="bk" alt="Submit Form" name="bk" id= "bk" value="Back"/>
        </a>
        
    </body>
</html>