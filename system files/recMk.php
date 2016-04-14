<?php	
	session_start();
	$userName = $_SESSION["username"];
	$r_id = $_SESSION["recipe_id"];
	echo $r_id;
?>

<!DOCTYPE html>
<html>
	<head>
		<title> New Step </title>
	</head>

	<body>

	<?php

	$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;


	$db=mysqli_connect($servername, $username, $password, $database, $dbport);
	
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";


	if(isset($_POST['nextI'])){

	if (!$db){
		die("Error with connecting:  " .mysql_error());
	}
	
	mysqli_select_db($db,"c9");
	
	$r_id= $_SESSION["recipe_id"];
	
	
	// Queries :
	$insert_measure="INSERT INTO `ingredient_recipe` (`ingredient_id`,`recipe_id`,`measurement_id`,`recipe_quantity`) VALUES ('$_POST[item]','$r_id','$_POST[measure]','$_POST[quantity]')";
	if(mysqli_query($db, $insert_measure)) {
	echo "New record created successfully";
	} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	
	echo $resulti;
	header("Location: recIn.php");

	echo("insertion complete");
	mysqli_close ($db);
	}
	
	//Finish entering steps
	
	if(isset($_POST['makeI'])){

		if (!$db){
			die("Error with connecting:  " .mysql_error());
		}
	
	mysqli_select_db($db,"c9");
	
	// Queries :
	
	//measure iD to be use instead of name
	$insert_measure="INSERT INTO `ingredient_recipe` (`ingredient_id`,`recipe_id`,`measurement_name`,`recipe_quantity`) VALUES ('$_POST[item]','$r_id','$_POST[measure]','$_POST[quantity]')";
	if(mysqli_query($db, $insert_measure)) {
	echo "New record created successfully";
	} else {
     echo "Error: " . $sql . "<br>" . mysqli_error($db);
	}
	
	header("Location: newInstructions.php");
	echo("insertion complete");
	echo $_SESSION["r_id"];
	mysqli_close ($db);
	}


	?>
</body>
</html>