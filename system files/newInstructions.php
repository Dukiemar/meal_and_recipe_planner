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
    
    <div class = "instructions">
        <h5> Enter your step instructions here:</h5>

			<form id="instructionsForm" method="post" action="makeStep.php">
				<fieldset>
					<div class="input-field col s6">
					 <input id="input_text" name="stepNo" type="text" length="5">
				     <label for="input_text">Add step no.</label>
				   </div>
				   
				   <div class="input-field col s12">
					 <textarea id="textarea1" name="stepDescription" class="materialize-textarea"></textarea>
					 <label for="textarea1">Place your step instruction here...</label>
				  </div>
				  </fieldset>
					<input class="btn waves-effect waves-light" type="submit" value = "Next Step" src="loginButton.png" alt="Submit Form" name="nextstep" id= "newstep"/>
					<input class="btn waves-effect waves-light" type="submit" src="loginButton.png" alt="Submit Form" name="makestep" id= "newstep"/> 
			</form>
		</div>
		</div>
		</div>
    
</body>
	
</html>