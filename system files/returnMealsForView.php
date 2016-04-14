<?php
    session_start();
    if (empty($_SESSION['username'])){
        header("Location: index.php");
    }
?>

<?php
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

	$conn = new mysqli($servername, $username, $password, $database, $dbport);
	
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    $sql = "SELECT meal_plan.meal_plan_id, meal_plan.meal_plan_date FROM meal_plan JOIN user_meal_plan WHERE meal_plan.meal_plan_id=user_meal_plan.meal_plan_id AND user_id='$_SESSION[user_id]' ORDER BY meal_plan.meal_plan_id DESC LIMIT 1";
    $result = $conn->query($sql);
    $r = array();
    $r2 = array();
    
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $r[] = $row;
            
            $id = $r[0]["meal_plan_id"];
            
            $sq = "SELECT meal.meal_name FROM meal JOIN meal_and_plan JOIN meal_plan WHERE meal.meal_id=meal_and_plan.meal_id AND meal_and_plan.meal_plan_id=meal_plan.meal_plan_id AND meal_plan.meal_plan_id='$id'";
            $result2 = $conn->query($sq);
            
            if($result2->num_rows > 0){
                while($row2 = $result2->fetch_assoc()){
                    $r2[] = $row2;
                }
            }
            echo json_encode($r2);
        }
    }
    
    $conn->close();
?>