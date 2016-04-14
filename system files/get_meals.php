<?php
    session_start();
    if (empty($_SESSION['username'])){
        header("Location: index.php");
    }
?>
<?php
    if($_REQUEST["get_meal"]){
        $recipe = $_REQUEST['get_meal'];
    }
    
    $servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    // $dbport = 3306;

	$conn = new mysqli($servername, $username, $password, $database);
	
	if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    
    //Get meals
    $sql = "SELECT * FROM meal_list ORDER BY RAND() LIMIT 21";
    $result = $conn->query($sql);
    $r = array();
    
    //If meals exists
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $r[] = $row;
        }
        
        //Find the last meal plan 
        $sql = "SELECT meal_plan.meal_plan_id, meal_plan.meal_plan_date FROM meal_plan ORDER BY meal_plan.meal_plan_id DESC LIMIT 1";
        $result2 = $conn->query($sql);
        $r2 = array();
        
        //If there is a last meal plan
        if($result2->num_rows > 0){
            while($row2 = $result2->fetch_assoc()){
                $r2[] = $row2; 
                
            //Check if user is allowed to generate another meal 
                //Take date last stored date of meal plan from database
                $d = strtotime("+1 week", strtotime($row2["meal_plan_date"]));
                if(strtotime(date("Y-m-d", $d)) < strtotime("today")){
                    $sq3 = "INSERT INTO meal_plan (meal_plan_date) VALUES (CURDATE())";
                    $conn->query($sq3); 
                    
                    //Add all meal_plan_id and meal_id to db
                    $increment_id = (intval($r2[0]["meal_plan_id"])+1);
                    $id = $_SESSION["user_id"];
                    
                    $sql5 = "INSERT INTO user_meal_plan (meal_plan_id, user_id) VALUES ('$increment_id', '$id)";
                    $conn->query($sql5);
                    
                    foreach($r as $item3){
                        $sql4 = "INSERT INTO meal_and_plan (meal_plan_id, meal_id) VALUES ('$increment_id', '$item3[meal_id]')";
                        $conn->query($sql4);
                    }
                }
            }
        }
    } 
    
    else {
        echo "0";
    }
    
    echo json_encode($r);
    $conn->close();
?>