<?php
	//include('login.php'); // Includes Login Script

	// if(isset($_SESSION['login_user'])){
	// 	header("location: home.php");
	// }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<script src="/js/jquery-2.2.2.min.js"></script>
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Tangerine|Inconsolata|Droid+Sans">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>
	<body class="pink">
		<div id="login-page" class="row" style="width:500px;height:100%;">
			<div class="col s12 z-depth-6 card-panel">
				<div class="row">
          			<div class="input-field col s12 center">
            			<p class="center login-form-text">Login Here</p>
          			</div>
        		</div>
				<form action="login.php" method="post">
					<div class="row margin">
						<div class="input-field col s12">
							<i class="material-icons prefix">account_circle</i>
							<input id="name" name="username" type="text" class="validate">
							<label for="name" data-error="wrong" data-success="right">Username</label>
						</div>
					</div>
					
					<div class="row margin">
						<div class="input-field col s12">
							<i class="material-icons prefix">lock_outline</i>
							<input id="password" name="password" type="password" class="validate">
							<label for="password" data-error="wrong" data-success="right">Password:</label>
							
							<div>
								<button class="btn waves-effect waves-light col s12" type="submit" name="action">Enter</button>
							</div>
						</div>
					</div>
					<!-- <span><?php #echo $error; ?></span> -->
				</form>
				<div class="row">
          			<div class="input-field col s12 center">
            			<p class="margin medium-small"><a href="newUserForm.php">Register Now!</a></p>
          			</div>
          		</div>
			</div>
		</div>
	</body>
</html>