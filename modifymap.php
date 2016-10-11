<?php
session_start();
$movieid=$_POST['movieid'];
$smap=$_POST['str'];
$seatnum = $_POST['seatnumber'];
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("BookMovie", $connection); 
$result = mysql_query("UPDATE seatmap SET Map='$smap' where MovieId=$movieid") or die('Unable to run query:');
//$mp=mysql_fetch_array($result);
$abc=$_SESSION['id'];
mysql_query("INSERT INTO tickets(UserId,MovieId,Seat) VALUES ($abc , $movieid , '$seatnum' )");
echo mysql_error();
//echo json_encode($emparr);
?>