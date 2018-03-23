<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Play GetMe Game</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
	<!-- <link rel="stylesheet" type="text/css" media="screen" href="main.css" /> -->
	<!-- <script src="main.js"></script> -->
</head>
<body>
	<div class="container-fluid col-xs-1" align="center"> 
		<div id="game_info_container">
			<h1>GetMe How to play</h1>
			<p>
					1-First you have to select the level at which you want to play.<br>
					2-Enter your name by which we save your score in the database.<br>
					3-Try to find the number choosen by system in least number of tries<br>
					4-Enter your response in the box given.<br>
					5-We provide you the hint for your entered number.<br>
					6-Lets see in how many number of tries you can find the number.<br> 
			</p> 
		</div>
	
		<div id="heading_container">
			    <h3>Select your option for game </h3>
		</div>
	
    	<form action="middle.php" method="post" >
            <label>Select your lavel:</label>
            <select name="range">
			<option value="10">BIGGINER</option>
			<option value="50">EASY</option>
			<option value="100">MIDIUM</option>
			<option value="500">HARD</option>
			</select>
            <br><br>
            <label>Enter your name:</label>
            <input type="text" name = "username"/>
            <input class="btn btn-primary" type="submit" value="play now"</input>
    	</form>
			<br>
			<a href="/"><button class="btn btn-danger"> Exit game </button></a>	
	</div>
</body>
</html>
