<?php	
	session_start();
	$userName = $_SESSION["username"];
?>

<!DOCTYPE html>
<html>
	<head>
		<title> New Recipe </title>
	</head>

	<body>

		<p> You have successfully created an account </p>

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
    echo "Connected successfully (".$db->host_info.")";

	if(isset($_POST['makerecipe'])){

	if (!$db){
		die("Error with connecting:  " .mysql_error());
	}


	mysqli_select_db($db,"c9");
	
	/*$query = "SELECT `user_id` FROM `user` WHERE `username` = '$userName'";
	$result = mysqli_query($db, $query);
	
	$row_userid = mysqli_fetch_assoc($result);
	$add = print_r($row_userid);*/
	$userID = $_SESSION["user_id"];

	$insertRecipe = "INSERT INTO `recipe` (`user_id`,`recipe_name`,`calorie_count` ) VALUES ('$userID', '$_POST[name]', '$_POST[calories]')";
	mysqli_query($db, $insertRecipe);
	$recipeID = mysqli_insert_id($db);
	
	$insertRecipeuser = "INSERT INTO `user_recipe` (`user_id`, `recipe_id`,`creation_date`) VALUES ('$userID', '$recipeID',CURDATE())";
	$insertInstruction = "INSERT INTO `instruction` (`recipe_id`) VALUES ('$recipeID')";
	mysqli_query($db, $insertInstruction);
	
	$instr = mysqli_insert_id($db);
		
	mysqli_query($db, $insertRecipeuser);
	
	
	$userName = $_SESSION["username"];
	$_SESSION["instruction_id"] = $instr;
	$_SESSION["recipe_id"] = $recipeID;
	echo $userID;
	echo("insertion complete");
	mysqli_close ($db);
	header("Location: recIn.php");
	}

	?>
</body>
</html>