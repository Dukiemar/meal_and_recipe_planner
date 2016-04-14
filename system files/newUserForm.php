<?php
    session_start();
    if (empty($_SESSION['username'])){
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Register</title>
		<script src="/js/jquery-2.2.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        </style>
	</head>

	<body class="pink">
		
		<nav class="pink darken-2">
            <div class="nav-wrapper">
            	<div class="col s2">
            		<a href="#" class="brand-logo"><img class="circle responsive-img" src="logoLarge.jpg" style="width:90px;height:65px;"></img></a>
            	</div>
                
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                   	<li><a href="index.php">Back</a></li>
                </ul>
            </div>
        </nav>
		
		<div id="login-page" class="row" style="width:500px;height:100%;">
			<div class="col s12 z-depth-6 card-panel">
				<div class="row">
          			<div class="input-field col s12 center">
            			<p class="center login-form-text">Registration</p>
          			</div>
        		</div>

				<form id="loginForm" method="post" action="makeUser.php">
					
					<div class="row margin">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="username" name="username" type="text" class="validate">
							<label for="username" data-error="wrong" data-success="right">Username</label>
						</div>
					</div>
					
					<div class="row margin">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock_outline</i>
							<input id="password" name="password" type="password" class="validate">
							<label for="password" data-error="wrong" data-success="right">Password</label>
						</div>
					</div>
					
					<div class="row margin">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="first_name" name="first_name" type="text" class="validate">
							<label for="first_name" data-error="wrong" data-success="right">First Name</label>
						</div>
					</div>
					<div class="row margin">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="last_name" name="last_name" type="text" class="validate">
							<label for="last_name" data-error="wrong" data-success="right">Last Name</label>
						</div>
					</div>
					
					<!--<div class="row margin">-->
					<!--	<div class="input-field col s12">-->
					<!--		<i class="material-icons prefix">directions</i>-->
					<!--		<input id="street" name="street" type="text" class="validate">-->
					<!--		<label for="street" data-error="wrong" data-success="right">Street</label>-->
					<!--	</div>-->
					<!--</div>-->
					<div class="row margin">
						<div class="input-field col s12">
							<!--<i class="material-icons prefix">near_me</i>-->
							<!--<input id="city" name="city" type="text" class="validate">-->
							<!--<label for="city" data-error="wrong" data-success="right">City</label>-->
							
							<div>
								<button class="btn waves-effect waves-light col s12" type="submit" name="action">
									<i class="material-icons left">send</i>
									Submit
									<i class="material-icons right">send</i>
								</button>
							</div>
							
						</div>
					</div>
				</form>
			</div>
		</div>
<?php

if(isset($_POST['submit'])){

	$servername = getenv('IP');
    $username = getenv('C9_USER');
    $password = "";
    $database = "c9";
    $dbport = 3306;

	// Create connection
    $db = new mysqli($servername, $username, $password, $database, $dbport);

    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully (".$db->host_info.")";
	
	session_start();
	mysql_close($db);
}
?>

</body>
</html>