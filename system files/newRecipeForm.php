<?php	
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Add Recipe</title>
		<script src="/js/jquery-2.2.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        </style>
	</head>

	<body class="purple lighten-3">
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
		<div id="recipe-page" class="row" style="width:500px;height:100%;">
			<div class="col s12 z-depth-6 card-panel">
				<div class="row">
          			<div class="input-field col s12 center">
            			<p class="center login-form-text">Add Recipe</p>
          			</div>
        		</div>
        		
        		
        		<?php
						$userName = $_SESSION["username"];
						$servername = getenv('IP');
					    $username = getenv('C9_USER');
					    $password = "";
					    $database = "c9";
					    $dbport = 3306;
					
					
						// Create connection
					    // $db = new mysqli($servername, $username, $password, $database, $dbport);
						$db=mysqli_connect($servername, $username, $password, $database, $dbport);
						
						mysqli_select_db($db,"c9");
						
				?>
		<div class = "login">
			<p> Please fill out all fields below </p>

			<form id="loginForm" method="post" action="makeRecipe.php">
				<fieldset>
					Recipe Name: <input size="30" type="text" name="name"/><br/><br/>
					<!--Description: <input size="20" type="text" name="description"/><br/><br/>-->
					Calorie Count: <input size="30" type="text" name="calories"/><br/><br/>
					
					 <?php
					// 	$userName = $_SESSION["username"];
					// 	$servername = getenv('IP');
					//     $username = getenv('C9_USER');
					//     $password = "";
					//     $database = "test";
					//     $dbport = 3306;
					
					
					// 	// Create connection
					//     // $db = new mysqli($servername, $username, $password, $database, $dbport);
					// 	$db=mysqli_connect($servername, $username, $password, $database, $dbport);
						
					// 	mysqli_select_db($db,"test");
						
					// 	echo "<tr>";
					// 		echo "<td>";
					// 		    //Creating ingredient column
					// 			$select = "Select ingredient_name From ingredient";
					// 			$result = mysqli_query($db,$select);
					// 			echo "<select name='recipetest1'>";
					// 			while ($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
					// 				echo "<option value='". $row['ingredient_id'] . "'>" . $row['ingredient_name']. "</option>";
					// 			}
					// 			echo "</select>";
					// 		echo "</td>";
							
					// 		echo "<td>";
					// 			//Creating Measurement column
					// 			$select2 = "Select measurement_name From measurement";
					// 			$result2 = mysqli_query($db,$select2);
					// 			echo "<select name='measurement1'>";
					// 			while ($row = mysqli_fetch_array($result2,MYSQLI_ASSOC)){
					// 				echo "<option value='". $row['measurement_name'] . "'>" . $row['measurement_name']. "</option>";
					// 			}
					// 			echo "</select>";
					// 		echo "</td>";
							
					// 		echo "<td>";
					// 			//Creating Quantity Column
					// 			echo "<input type='text' name='quantity'>";
					// 		echo "</td>";
							
					// 	echo "</tr><br>";
					// 	echo "<p> Enter Instructions Next: </p>";
						
						
					// ?>

					<input class="btn waves-effect waves-light" type="submit" src="loginButton.png" alt="Submit Form" name="makerecipe" id= "newrecipe"/> 

				</fieldset>

			</form>
			</div>
		</div>
		</div>
	</body>
</html>