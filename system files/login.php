<?php
    session_start();
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

	$conn = new mysqli($servername, $username, $password, $database, $dbport);
	$userName = $_POST['username'];
    $password = $_POST['password'];
	
    $idcheck = "SELECT * FROM user WHERE username LIKE '$userName' AND password LIKE '$password'";
    $result = $conn->query($idcheck);
    $r = array();
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $r[] = $row;
            $_SESSION["username"] = $r[0]["username"];
            $_SESSION["user_id"] = $r[0]["user_id"];
            
        }
        $conn->close();
        header("Location: home.php");
    }
    
    else{
        $conn->close();
        header("Location: home.php");
    }
?>

<!--<!DOCTYPE html>-->
<!--<html>  -->
<!--    <head>-->
<!--    </head>-->
<!--    <body>-->
    //     <?php
        
    //     $servername = getenv('IP');
    //     $username = getenv('C9_USER');
    //     $password = "";
    //     $database = "c9";
    //     $dbport = 3306;
        
    // 	$db=mysqli_connect($servername, $username, $password, $database, $dbport);
        
    //     $userName = $_POST['username'];
    //     $password = $_POST['password'];
        
        
    //     mysqli_select_db($db,"c9");

        
    //     $idcheck = "SELECT * FROM user WHERE username LIKE '$userName' AND password LIKE '$password'";
    //     $loginquery = mysqli_query($db, $idcheck);
        
        
    //     if(mysqli_num_rows($loginquery) == 0){
    //     	header("Location: index.php");
    //     }
        
    //     else{
    //     	header("Location: home.php");
    //     }
    //     echo 'test';
        
    //     mysqli_close ($db);
    //     ?>
<!--    </body>-->
<!--</html>-->