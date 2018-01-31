<html>
<head>
	<title>About GetMe Game</title> 
</head>

<body>

	<div id="game_info_container">
		<h1>About this game</h1>
		<p>all content info </p> 
	</div>
	
	<div id="heading_container">
		    <h1>Select your options for game </h1>
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
            <label>Enter your name</label>
            <input type="text" name = "username"/>
            <input type="submit" value="play now"</input>
    </form>
	
	<div id="exit_button_container">
		<a href="/"><button> Exit game </button></a>
	</div>

</body>
</html>

