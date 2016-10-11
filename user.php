<?php 
session_start();
if(!isset($_SESSION['username']))
{
  session_destroy();
  header("location: login.php");
}
?>
<!DOCTYPE html>

<html lang="en">
  <head>
    <title> SPACE BLOGS </title>
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
      <a class="navbar-brand" href="#">BOOK MOVIE</a>
    </div>

    <ul class="nav navbar-nav navbar-right collapse navbar-collapse" id="myNavbar">
      <li class="active"><a href="user.php">Home</a></li>
      <li><a href="home.php" name="blog" id="blog">BookMovie</a></li>  
      <li><a href="logout.php">LogOut</a></li> 
    </ul>
  </div>
</nav>
 </div>  
 <br>
 <br>
 <br>
 <br>
 
 <div class="container">
  <b><p class="about"> Welcome <?php
  echo $_SESSION['username']." ...."; ?> </p> </b>
  </div>
  <br>
  <br>
<div class="container">
  
</div>
 
    </body>

</html>

