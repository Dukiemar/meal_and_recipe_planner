<?php
    session_start();
    if (empty($_SESSION['username'])){
        header("Location: index.php");
    }
?>
<html>
    <header>
        <title>View Meal Plan</title>
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
        <script type="text/javascript">
	    function getMeal(){
	        var value = $("#get_meal").val();
	        var jsonObject;
	        $.get(
	            "returnMealsForView.php",
    	        {"recipe": value},
    	        function(data){
    	            var sumCalories = 0;
    	            jsonObject = jQuery.parseJSON(data);
    	            for(i=0; i<jsonObject.length; i++){
    	                document.getElementById("result"+i).innerHTML = jsonObject[i].meal_name;
    	                sumCalories += Number(jsonObject[i].calories);
    	            }
    	            document.getElementById("sumOfCalories").innerHTML = sumCalories;
    	        }
	         );
	    }
	    </script>	   
    </header>
    
    <body onload="getMeal()">
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
                    <li><a href="view_plan.php">View Meal Plan</a></li>
                    <li><a href="kitchen.php">Kitchen</a></li>
                    <li><a href="calendar.php">Calendar</a></li>
                    <li><a href="user_profile.php"><?php echo $_SESSION["username"]?></a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <table id="myTable" class="highlight bordered">
                        <thead>
                            <tr>
                                <th data-field="sunday">Sunday</th>
                                <th data-field="monday">Monday</th>
                                <th data-field="tuesday">Tuesday</th>
                                <th data-field="wednesday">Wednesday</th>
                                <th data-field="thursday">Thursday</th>
                                <th data-field="friday">Friday</th>
                                <th data-field="saturday">Saturday</th>
                            </tr>
                        </thead>    
                        <tbody>
                            <tr>
                                <td><span id="result0">null</span></td>
                                <td><span id="result1">null</span></td>
                                <td><span id="result2">null</span></td>
                                <td><span id="result3">null</span></td>
                                <td><span id="result4">null</span></td>
                                <td><span id="result5">null</span></td>
                                <td><span id="result6">null</span></td>
                            </tr>
                            <tr>
                                <td><span id="result7">null</span></td>
                                <td><span id="result8">null</span></td>
                                <td><span id="result9">null</span></td>
                                <td><span id="result10">null</span></td>
                                <td><span id="result11">null</span></td>
                                <td><span id="result12">null</span></td>
                                <td><span id="result13">null</span></td>
                            </tr>
                            <tr>
                                <td><span id="result14">null</span></td>
                                <td><span id="result15">null</span></td>
                                <td><span id="result16">null</span></td>
                                <td><span id="result17">null</span></td>
                                <td><span id="result18">null</span></td>
                                <td><span id="result19">null</span></td>
                                <td><span id="result20">null</span></td>
                            </tr>
                        </tbody>
                    </table>
            </div>
        </div>
	</body>
</html>
