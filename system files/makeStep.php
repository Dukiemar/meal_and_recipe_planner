<?php	
	session_start();
	$userName = $_SESSION["username"];
	$i_id = $_SESSION["instruction_id"];
	echo $i_id;
?>

<!DOCTYPE html>
<html>
	<head>
		<title> New Step </title>
	</head>

	<body>

		<p> You have successfully created a step </p>

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

	if(isset($_POST['nextstep'])){

	if (!$db){
		die("Error with connecting:  " .mysql_error());
	}
	
	mysqli_select_db($db,"c9");
	
	// Queries :
	$stepInsert = "INSERT INTO step (instruction_id, step_number, step_description) VALUES ('$i_id', '$_POST[stepNo]', '$_POST[stepDescription]')";
	$resulti = mysqli_query($db, $stepInsert);
	
	echo $resulti;
	header("Location: newInstructions.php");

	echo("insertion complete");
	mysqli_close ($db);
	}
	
	//Finish entering steps
	
	if(isset($_POST['makestep'])){

		if (!$db){
			die("Error with connecting:  " .mysql_error());
		}
	
	mysqli_select_db($db,"c9");
	
	// Queries :
	$stepInsert = "INSERT INTO step (instruction_id, step_number, step_description) VALUES ('$i_id', '$_POST[stepNo]', '$_POST[stepDescription]')";
	$resulti = mysqli_query($db, $stepInsert);
	
	
	header("Location: home.php");
	echo("insertion complete");
	echo $_SESSION["instruction_id"];
	mysqli_close ($db);
	}

	?>
</body>
</html>