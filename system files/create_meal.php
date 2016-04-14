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

			<form id="file_upload" method="post" action="upload.php" enctype="multipart/form-data">
					MealImage: <input type="file" name="file_img" id="fileToUpload"/></br>
					Meal Name: <input size="30" type="text" name="Mealname"/><br/><br/>
					<!--Category: <input size="20" type="text" name="description"/><br/><br/>-->
					
					<select  name="category" class="browser-default col s12 l6">
										<?php
										$measure="select distinct category_name,category_id from category"; 
										// distinct
										$vals = mysqli_query($db,$measure);
										
										while ($row = mysqli_fetch_assoc($vals)){
											echo "<option value=$row[category_id]>$row[category_name]</option>";
										}
									
										?>
									</select>
									<br/><br><br/><br><br/><br>
					
					<select  name="recipe" class="browser-default col s12 l6">
										<?php
										$measure="select distinct recipe_id,recipe_name from recipe"; 
										// distinct
										$vals = mysqli_query($db,$measure);
										
										while ($row = mysqli_fetch_assoc($vals)){
											echo "<option value=$row[recipe_id]>$row[recipe_name]</option>";
										}
									
										?>
									</select>
									<br/><br><br/><br><br/><br>
					
					Serving Size: <input size="30" type="text" name="serving"/><br/><br/>
					
					
					

					<input class="btn waves-effect waves-light" type="submit" src="loginButton.png" alt="Submit Form" name="btn_upload" value="Upload" id= "newrecipe"/> 

			</form>
			
			<?php
			// 		if(isset($_POST['btn_upload']))
			// 		{
			// 			$filetemp=$_FILES["file_img"]["tmp_name"];
			// 			$filename=$_FILES["file_img"]["name"];
			// 			$filetype=$_FILES["file_img"]["type"];
			// 			$filepath="/pics/".$filename;
						
			// 			move_uploaded_file($filetemp,$filepath);
						
			// 			$sql= "insert into meal(`category_id`,`meal_name`,`serving_size`,`meal_image`) VALUES ('1','Fried Chicken','2','$filename')";
			// 		}
			?>
			</div>
		</div>
		</div>
	</body>
</html>