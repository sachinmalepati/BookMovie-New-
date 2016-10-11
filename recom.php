<?php
session_start();
if(!isset($_SESSION['id']))
{
  header('Location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title> BOOK MOVIE</title>
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
      <a class="navbar-brand" href="#">Movies Playing Now</a>
    </div>
        <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
        <?php 
        if(!isset($_SESSION['id'])){
      echo '<li class="active"><a href="home.php">Movies</a></li>';
      echo  '<li><a href="signup.php">Sign Up</a></li>';
      echo '<li><a href="login.php">Login</a></li>'; 
     echo '<li><a href="contact.php">ContactUs</a></li>';
   }
     else {
        echo '<li class="active"><a href="recom.php">Recommended</a></li>';
        echo '<li><a href="home.php">Movies</a></li>';
      echo '<li><a href="logout.php">LogOut</a></li>'; 
     echo '<li><a href="contact.php">ContactUs</a></li>';
      } 
      ?>
    </ul>
  </div>

</nav>


 </div>  
 <br>
 <br>
 <br>
 <br>

  <b><p class="about" align="center"> Movies Recommended For You </p></b>
  
  <br>
  <br>

 
      <div class="col-md-2" ></div>
    </div>

    <div class="container">
  <?php
  $connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("BookMovie", $connection); // Selecting Database from Server 
$result = mysql_query("SELECT * FROM movieinfo ") or die('Unable to run query:');

$counter = mysql_num_rows($result);

echo "<div class='col-md-1'> </div>";

echo "<div class='col-md-7'> ";
if ($counter > 0) {
while ($row = mysql_fetch_array($result)) {
  echo "<a href='movie.php?movieid=".$row['MovieId']."'>";
  echo " <div class='thumbnail'>";
  echo "<br>";
  echo "<b><h1 align='center'>".$row['MovieName']."</h1></b>"."<br> ";
  echo "</a>";
  echo '<img src="data:image/jpeg;base64,'.base64_encode( $row['MoviePoster'] ).'" width="200px" height="200px" />';
  //echo "<p class='about1'>".$row['MovieDesc']."</p>";
  echo "<br><br>";

  echo "</div>";

}

}
echo "</div>";
echo "<div class='col-md-6'> </div>";
mysql_close($connection);
  ?>

</div>

  


 
    </body>

</html>
