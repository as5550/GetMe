
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Play the game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" type="text/css" media="screen" href="css/play-style.css"/> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- <script src="main.js"></script> -->
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" />
</head>
<body>
    <divclass="container-fluid col-xs-10" align="center">
         <div id = "heading_container">
            <h1>Play GetMe</h1>
        </div>
        <div>

            <?php
            // database interaction code
                include('connection.php');  // this return $conn as the connection name
                session_start();
                $username = $_SESSION['username'];
                echo "Welcome MR $username"."<br/>";
                $range = $_SESSION['range'];

                    // code to calculate level
                    switch ($range) {
                        case "10":
                            $level = "BIGGINER";
                            break;
                        case "50":
                            $level = "EASY";
                            break;
                        case "100":
                            $level = "MIDIUM";
                            break;
                        case "500":
                            $level = "HARD";
                            break;
                        default:
                            $level = "dont know";
                            break;
                    }

                    echo "your range is 0 to $range"."<br/>";
                    $rn = $_SESSION['rn']; //store a random number genrated by system

                    $uin = $_POST['user_input_number'];  //store number intered by user
                    echo "you enter the number $uin"."<br/>";
                    $count = $_SESSION['count'];

                    // checking for maximum number of tries
                    if($count >= $range)
                    {   ?>
                            <p class="alert alert-warning">You reach maximum number of tries </p>
                        <?php
                    }

                    // main code which return help string for each tried number 
                    if($uin == $rn)       // this is for if number entered by user is answer
                    {
                        $count += 1;
                        ?>
                        <p class="alert alert-success">You got answer in  <?php print("$count");  ?> tries.</p>
                        <?php
                        $insert_query = "INSERT into board (username, notr, level) VALUES('$username', '$count','$level')";
                        $conn->query($insert_query);
                        $help_str = "";
                    } 
                    elseif ((0<=$uin) and ($uin<=(2/3)*$rn))
                    {
                        $count+=1;
                        $help_str = "You are far behind the number";
                    }
                    elseif (((2/3)*$rn<=$uin) and ($uin<=$rn))
                    {
                        $count+=1;
                        $help_str = "You are close behind the number";
                    }
                    elseif (($rn<=$uin) and ($uin<=($rn+(($range-$rn)*(1/3)))))
                    {
                        $count+=1;
                       $help_str = "You are close after the number";
                    }
                    elseif ((($rn+(($range-$rn)/3))<=$uin) and ($uin<=$range))
                    {
                        $count+=1;
                        $help_str = "You are far after the number";
                    }
                    else
                    {
                        $help_str = "We do not know where you are";
                        $count += 1;
                    }
                    if($help_str != "")
                    {
                        ?>
                            <p class="alert alert-info"> <?php print("$help_str"); ?></p>
                            <p class="alert alert-warning"> <?php print("your number of tries is $count"); ?></p>
                            
                        <?php
                    }
                    $_SESSION['count'] = $count;
                    ?>
        </div>
        <br>
        <div id = "play_container">
            <form action = "<?php $_PHP_SELF ?>", method="post"> 
                <label>Enter your answer:</label>
                <input type="text" name="user_input_number"/>
                <input type="submit" value = "submit answer" class="btn btn-primary"/>
            </form>
        </div>
        
        <div id="exit_button_container">
            <a href="/getme/"><button class="btn btn-danger"> Exit game </button></a>
        </div>
            <h3> Scoreboard</h3>
        <div class="table table-responsive table-hover table-bordered" align="center">
            <table>
            <tr>
                <th>Sr No.</th>
                <th>Usernames</th>
                <th>Number of tries</th>
                <th>Level of Game</th>
            </tr>
            <?php
            $qury = "select * from board"; // board is name of record table in the database
            $result = $conn->query($qury);
		    if($result->num_rows>0){
			    while($row = $result->fetch_object())
			        {
		    ?>
			<tr>
				<td><?=$row->id?></td>
				<td><?=$row->username?></td>
                <td><?=$row->notr?></td>
                <td><?=$row->level?></td>
			</tr>
				<?php } } ?>
            </table>
        </div>
    </div>
</body>
</html>


