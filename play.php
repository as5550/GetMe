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

echo "your range is $range"."<br/>";
$rn = $_SESSION['rn']; //store a random number genrated by system

$uin = $_POST['user_input_number'];  //store number intered by user
echo "you enter the number $uin"."<br/>";
$count = $_SESSION['count'];

// checking for maximum number of tries
if($count >= $range)
{
    print("you reach maximum number of tries"."<br/>");
}

// main code which return help string for each tried number 
if($uin == $rn)
{
    $count += 1;
    print("You got answer in $count tries");
    $insert_query = "INSERT into board (username, notr, level) VALUES('$username', '$count','$level')";
    $conn->query($insert_query);
}
elseif ((0<=$uin) and ($uin<=(2/3)*$rn))
{
    $count+=1;
    print('you are far behind the number');
}
elseif (((2/3)*$rn<=$uin) and ($uin<=$rn))
{
    $count+=1;
    print('you are close behind the number');
}
elseif (($rn<=$uin) and ($uin<=($rn+(($range-$rn)*(1/3)))))
{
    $count+=1;
    print('you are close after the number');
}
elseif ((($rn+(($range-$rn)/3))<=$uin) and ($uin<=$range))
{
    $count+=1;
    print('you are far after the number');
}
else
{
    print('we do not know where you are');
    $count += 1;
}
print("<br/>"."your number of tries is $count");
$_SESSION['count'] = $count;
?>
<html>
    <head>
        <title>get_me_play.php</title>
        <link href="css/play.css" rel="stylesheet" type="text/css" media="all"/>
    </head>

    <body>
        <div id = "heading_container">
            <h1> Get Me Play </h1>
        </div>
        
        <div id = "play_container">
            <form action = "<?php $_PHP_SELF ?>", method="post"> 
                <label>Enter your answer:</label>
                <input type="text" name="user_input_number"/>
                <input type="submit" value = "submit answer"/>
            </form>
        </div>
        
        <div id="exit_button_container">
            <a href="/getme/"><button> Exit game </button></a>
        </div>

        <div id = "record_board_container">
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

    </body>

</html>
