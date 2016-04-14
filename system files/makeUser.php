<!DOCTYPE html>
<html>
	<head>
		<title> New User </title>
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
	$db=mysqli_connect($servername, $username, $password, $database, $dbport);
	
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";

	if(isset($_POST['action'])){

	if (!$db){
		die("Error with connecting:  " .mysql_error());
	}


	mysqli_select_db($db,"c9");

 	$insert1 = "INSERT INTO `user` (`username`, `password`, `last_name`, `first_name`) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[last_name]', '$_POST[first_name]')";
 	mysqli_query($db, $insert1);
 	$userid = mysqli_insert_id($db);
 	$insert2 = "INSERT INTO `kitchen` (`user_id`) VALUES ('$userid')";
	mysqli_query($db, $insert2);
	
	//mysqli_query($db, "CALL makeUser('$_POST[username]', '$_POST[password]', '$_POST[last_name]', '$_POST[first_name]' )");
 	
	
	header("Location: index.php");

	echo("insertion complete");


	mysqli_close ($db);
	}

	?>
</body>
</html>