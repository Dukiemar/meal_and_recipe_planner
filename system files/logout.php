<?php
session_start();
session_destroy();
?>
<html>
    <header>
        <title>Home</title>
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
                    
                    <li><a href="index.php">Login</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col s12 center">
                   <div id="result"></div>
                </div>
            </div> 
        </div>        
    </body>
</html>