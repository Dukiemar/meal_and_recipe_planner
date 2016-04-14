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

	if(isset($_POST['btn_upload'])){

	if (!$db){
		die("Error with connecting:  " .mysql_error());
	}


	mysqli_select_db($db,"c9");
	
	
	$filetemp=$_FILES["file_img"]["tmp_name"];
	$filename=$_FILES["file_img"]["name"];
	$filetype=$_FILES["file_img"]["type"];
	$filepath="/home/ubuntu/workspace/pics/".$filename;
						
	move_uploaded_file($filetemp,$filepath);
						
						$sql= "insert into meal(`category_id`,`meal_name`,`serving_size`,`meal_image`) VALUES ('$_POST[category]','$_POST[Mealname]','$_POST[serving]','$filename')";
						mysqli_query($db, $sql);
						$recipeID = mysqli_insert_id($db);
						
						
						$sql2= "insert into recipe_meal(`recipe_id`,`meal_id`) VALUES ($_POST[recipe],'$recipeID')";
	}					mysqli_query($db, $sql2);
	?>
</body>
</html>