<?php
session_start();
$username = $_SESSION['username'];
echo "Welcome MR $username"."<br/>";
$range = $_SESSION['range'];
echo "your range is $range"."<br/>";
?>

<html>
<head>
    <title>get_me_play.php</title>
</head>
<body>
    <div id = "heading_container">
    </div>

    <div id = "play_board">
        <div id = "play_container">
            <form action = "play.php", method="post"> 
                <label>Enter your answer:</label>
                <input type="text" name="user_input_number"/>
                <input type="submit" value = "submit answer"/>
            </form>
        </div>
        <div id="exit_button_container">
		<a href="/getme/"><button> Exit game </button></a>
        <div id = "board_container">
        </div>
    </div>
</body>
</html>
