<?php	
	session_start();
?>
<!DOCTYPE html>
<html>
	<head>
	    <title> Instructions </title>
	    <script src="/js/jquery-2.2.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        </style>
	</head>
<body class="purple lighten-3">
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
						$db=mysqli_connect($servername, $username, $password, $database, $dbport);
						
						mysqli_select_db($db,"c9");
						
				?>
    
    <div class = "instructions">
        <h5> Enter your instructions here:</h5>

			<form id="instructionsForm" method="post" action="recMk.php">
				<table class="table table-bordered table-condensed" id="myTable">
					    <tbody>
					    	<H5>Ingredients</h5>
					    	<thead>
			                <tr>
			                    <th>Quantity (eg.1/2)</th>
			                    <th>Measurement(eg. cups)</th>
			                    <th>Ingredient (eg. Flour)</th>
			                </tr>
				            </thead>
					        <tr>
					           <td><input type="text" name='quantity' class="form-control" /></td>
					           <td>	<select  name='measure' class="browser-default col s12 l6">
										<?php
										$measure="select distinct measurement_name,measurement_id from measurement"; 
										// distinct
										$vals = mysqli_query($db,$measure);
										
										while ($row = mysqli_fetch_assoc($vals)){
											echo "<option value=$row[measurement_id]>$row[measurement_name]</option>";
										}
									
										?>
									</select>
								</td>
					           <td>	<select  name='item' class="browser-default col s12 l6">
										<?php
										$dropdown="select distinct ingredient_name,ingredient_id from ingredient"; 
										// distinct
										$items = mysqli_query($db,$dropdown);
										
										while ($row = mysqli_fetch_assoc($items)){
											echo "<option value=$row[ingredient_id]>$row[ingredient_name]</option>";
										}
									
										?>
									</select>
								</td>
					        </tr>
					        </tbody>
					        </table>
					
					<input class="btn waves-effect waves-light" type="submit" value = "Next Step" src="loginButton.png" alt="Submit Form" name="nextI" id= "newstep"/>
					<input class="btn waves-effect waves-light" type="submit" src="loginButton.png" alt="Submit Form" name="makeI" id= "newstep"/> 

				</fieldset>

			</form>
		</div>
		</div>
		</div>
    
</body>
	
</html>