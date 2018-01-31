<?php
session_start();

$_SESSION['username'] = $_POST['username'];

$_SESSION['range'] = $_POST['range'];

$range = $_SESSION['range'];

$_SESSION['rn'] = rand(0, $range);

$rn = $_SESSION['rn'];   //store a random number genrated by system

$_SESSION['count'] = 0;    //session varible count for storing number of retries

$count = $_SESSION['count'];

header ('location:play_first_time.php');

?>
