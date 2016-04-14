<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;
    
	// Create connection
	$db = mysqli_connect($servername, $recipe_name, $recipe_description,$calorie_count,$instruction_id, $database, $dbport);
	
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }
    
    else{
        echo "Connected successfully (".$db->host_info.")";

	    if (!$db){
		    die("Error with connecting:  " .mysql_error());
	    }
	    
	    else{
	        mysqli_select_db($db,"c9");
	        for($i=1; $i<=1000000; $i++){
	            $insert1 = "INSERT INTO `recipe` (`recipe_name`, `recipe_description`, `calorie_count`, `instruction_id`) VALUES ($i, $i, $i, $i)";
	            mysqli_query($db, $insert1);
	        }
	    }     
	
	   mysqli_close ($db);
	}
?>