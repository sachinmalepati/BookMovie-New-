


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
        <li><a href="home.php">Movies</a></li>
      <li class="active"><a href="signup.php">Sign Up</a></li>
      <li><a href="login.php">Login</a></li>
      <li><a href="contact.php">ContactUs</a></li>  
     
    </ul>
  </div>

</nav>


 </div>  
 <br>
 <br>
 <br>
 <br>

  <b><p class="about" align="center"> Book Your Movie Here  </p> </b>
  
  <br>
  <br>
   <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-8" >    <div class="wrapper">
      
    <form class="form-signin" action="signup.php" method="post">       
      <h2 class="form-signin-heading">Sign Up</h2>
      <br>
       
      <input type="text" class="form-control" name="username" placeholder="UserName" />
       <br>
        
      <input type="email" class="form-control" name="email" placeholder="Email ID" />      
      <br>
      
      <input type="number" class="form-control" name="number" placeholder="Phone Number" />      
      <br>

      <input type="password" class="form-control" name="password" placeholder="Password" />      
      <br>

      <input type="password" class="form-control" name="confirm_password" placeholder="Confirm Password" />      
      <br>
 
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign Up</button>   
    </form>
  </div></div>


  </div></div>
      <div class="col-md-2" ></div>
    </div>


<?php
$connection = mysql_connect("localhost", "root", ""); 
$db = mysql_select_db("BookMovie", $connection); 
if(isset($_POST['submit'])){ 

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$number =$_POST['number'];
$cpass = $_POST['confirm_password'];
if($username!='' ||$password!='' || $email!='' || $cpass!='' || $number!='' ){
    if($password != $cpass)
    {
      echo "<br> <br> "."<b><p style='margin-left:220px;'> <br> Please Re-Enter The Password Correctly</p> </b>";
    }
    else
    {
      $query = mysql_query("insert into userinfo(UserName, Password, EmailId , PhoneNumber) 
        values ('$username', '$password', '$email' , '$number') ");
      echo mysql_error();

      echo "<br> <br> "."<b><p style='margin-left:220px;'> You Have Successfully Signed Up! <br> Happy Movie Booking NewBie!"."</p> </b>";
    }
}
else
{
  echo "<br> <br> "."<b><p style='margin-left:220px;'> <br> Please Enter All The Details</p> </b>";
}
}
?>
  


 
    </body>

</html>