<?php
session_start();
$username = $_SESSION['username'];
$range = $_SESSION['range'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Start playing game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="css/play_first_time-style.css"/> -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
    <!-- <script src="main.js"></script> -->
</head>
<body>
    <div class="container-fluid col-xs-1" align="center">
            <h2>Let's find the number</h2>
            <div id = "welcome_user">
                <p> <?php   echo "Welcome MR $username in the game"."<br/>";  ?> </p>
                <p> <?php   echo "The number is between 0 to $range"."<br/>";  ?>  </p>
            </div>

        
            <div id = "play_container">
                <form action = "play.php", method="post"> 
                    <label>Enter your answer:</label>
                    <input type="text" name="user_input_number"/>
                    <input type="submit" value = "Submit answer" class="btn btn-primary"/>
                </form>
            </div>
            <br>
		    <a href="/getme/"><button class="btn btn-danger"> Exit game </button></a>
    </div> 
</body>
</html>
