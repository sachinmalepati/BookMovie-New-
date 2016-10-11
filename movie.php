<?php 
session_start();
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title> BOOK MOVIE </title>
   <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <!-- jQuery 1.11.1 (Compatible with countdown timer - DO NOT change order of scripts) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="style_sheet.css">
   <link rel="icon" type="image/jpg" sizes="16x16" href="images/logo.jpg">


  </head>

  <body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span> 
      </button>
      <a class="navbar-brand" href="#">Book Movie</a>
    </div>

    <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
      <li class="active"><a href="user.php">Home</a></li>
        </ul>
  </div>
</nav>
<br>
 <br>
 <br>
 <br>
 <div class="container">
  </div>
 
  <br>
 <br>
 <br>
<?php
$movieid = $_GET['movieid'];
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("BookMovie", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT * FROM movieinfo where MovieId=$movieid") or die('Unable to run query:');

$counter = mysql_num_rows($result);

if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
  echo '<div class="row">';
  echo '<div class="col-md-1" > </div>';
  echo '<div class="col-md-9">';
  echo "<a href='movie.php?movieid=".$row['MovieId']."'>";
  echo "<div class='panel panel-primary '>";
  echo " <div class='panel-body'>";
  echo "<br>";
  echo "<b><h1>".$row['MovieName']."</h1></b>"."<br> ";
  echo "</a>";
  echo "<b><p class='about1'>".$row['MovieHero']."</p></b>";
  echo "<b><p class='about1'>".$row['MovieHeroine']."</p></b>";
  echo "<b><p class='about1'>".$row['MovieDirector']."</p></b>";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['MoviePoster'] ).'" width="200px" height="200px" />';
  echo "<p class='about1'>".$row['MovieDesc']."</p>";
  echo '<a href="seatmap.php?movieid='.$row['MovieId'].'"><input type="submit" class="btn btn-info" value="Book Now"> </a>';
  echo "</div> </div>";
  echo "<br><br><br><br>";
  echo "</div>";
  echo "</div>";
  echo '<div class="col-md-1"> </div>';

}

}

?>
    
</body>

</html>
