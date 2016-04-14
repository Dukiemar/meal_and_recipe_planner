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
    
    $recipe_name = $_POST["get_recipe"];
    
    $sql1 = "SELECT * FROM recipe where recipe_name = '$recipe_name'";
    $result1 = $conn->query($sql1);
    $r1 = array();
    
    if ($result1->num_rows > 0) {
    // output data of each row
        while($row1 = $result1->fetch_assoc()) {
            $r1[] = $row1;
        }
        // header("Location: search_recipe_result.php");
    } 
    
    foreach($r1 as $item){
       $instruction_id = $item["recipe_id"]; 
    };
    
    $sq2 = "SELECT * FROM step WHERE instruction_id = '$instruction_id'";
    $result2 = $conn->query($sq2);
     $r2 = array();
    
    if ($result2->num_rows > 0) {
        while($row2 = $result2->fetch_assoc()) {
            $r2[] = $row2;
        }
    } 
    
    
    $conn->close();
    $jsonObject1 = json_encode($r1, true);
    $jsonObject2 = json_encode($r2, true);
?>

<html>
    <header>
        <title>View Recipe</title>
        <script src="/js/jquery-2.2.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <style type="text/css">
            nav form {
                margin-left: 180px;
                width: 400px;
            }
        </style>
    </header>
    
    <body>
        <nav class="purple lighten-2">
            <div class="nav-wrapper">
                <div class="col s2">
            		<a href="#" class="brand-logo"><img class="circle responsive-img" src="logoLarge.jpg" style="width:90px;height:65px;"></img></a>
            	</div>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li>
                        <form action="search_recipe.php" method="POST">
                           <div class="input-field">
                              <input name="get_recipe" id="get_recipe" type="search" required placeholder="Search Recipes.....">
                              <label for="get_recipe"><i class="material-icons">search</i></label>
                              <i class="material-icons">close</i>
                            </div>
                        </form>
                    </li>
                    
                    <li><a href="home.php">Home</a></li>
                    <li><a href="newRecipeForm.php">Add Recipe</a></li>
                    <li><a href="view_meal_plan.php">View Meal Plan</a></li>
                    <li><a href="kitchen.php">Kitchen</a></li>
                    <li><a href="calendar.php">Calendar</a></li>
                    <li><a href="user_profile.php"><?php echo $_SESSION["username"]?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                   <div id="result">
                        <?php 
                            $j1 =  json_decode($jsonObject1, true); 
                            $j2 =  json_decode($jsonObject2, true);
                            foreach($j1 as $item1){
                                echo "
                                    <div class='row'>
                                        <div class='large'>
                                            <div class='card purple lighten-2'>
                                                <div class='card-content white-text'>
                                                    <span class='card-title'>".$item1['recipe_name']."</span>
                                                    <p>".$item1['recipe_description']."</p>
                                                </div>
                                                <hr>
                                                <div class='card-action'>
                                                    <p style='text-align:left;'>Calories: ".$item1['calorie_count']."</p>";
                            }
                            foreach($j2 as $item2){
                                echo "<p style='text-align:left;'>Step ".$item2['step_number'].": " .$item2['step_description']."</p>";
                            }
                            
                            echo "
                                                </div>
                                            </div>
                                       </div>
                                    </div>
                            ";
                        ?>
                   </div>
                </div>
            </div> 
        </div> 
    </body>
</html>