<?php
$movieid=$_POST['movieid'];
$connection = mysql_connect("localhost", "root", "");
$db = mysql_select_db("BookMovie", $connection); 
$result = mysql_query("SELECT Map FROM seatmap where MovieId=$movieid") or die('Unable to run query:');
$mp=mysql_fetch_array($result);
echo $mp[0];
$emparr=array();
while($row=mysql_fetch_assoc($result)){
	$emparr[]=$row;
}
//echo json_encode($emparr);
?>
