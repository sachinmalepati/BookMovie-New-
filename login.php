
<?php session_start();

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
       <li><a href="home.php">Movies</a></li>
      <li><a href="signup.php">Sign Up</a></li>
      <li class="active"><a href="login.php">Login</a></li> 
      <li><a href="contact.php">ContactUs</a></li> 
    </ul>
  </div>
</nav>
 </div>  

 <br>
 <br>
 <br>
 <br>

  <b><p class="about" align="center"> Book Your Movie Here </p></b>
  
  <br>
  <br>
   <div class="row">
      <div class="col-md-2" ></div>
      <div class="col-md-8" >    <div class="wrapper">
    <form class="form-signin" action="login.php" method="post">       
      <h2 class="form-signin-heading">Login</h2>
      <br>
       
      <input type="text" class="form-control" name="username" placeholder="UserName" />
       <br>
        
      <input type="password" class="form-control" name="password" placeholder="Password" />      
      <br>
       
      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Login</button>   
    </form>
<?php

$host="localhost";
$username="root"; 
$password=""; 
$db_name="BookMovie"; 

mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


if(isset($_POST['submit'])){ 
$myusername=$_POST['username']; 
$mypassword=$_POST['password'];
if($username!='' ||$password!='' ){ 


$sql="SELECT * FROM userinfo WHERE UserName='$myusername' and Password='$mypassword'";
$result=mysql_query($sql);


$count=mysql_num_rows($result);
if($myusername == 'Admin' and $mypassword =='admin22')
{
  header("location:admin.php");
  $_SESSION['admin'] = $myusername;
  break;
}
if($count==1){

 $_SESSION['username'] = $myusername;
 $result = mysql_query("SELECT UserId FROM userinfo WHERE UserName='$myusername'");
 $row = mysql_fetch_row($result);
 $_SESSION['id'] = $row[0];
header("location:user.php");
}
else {
echo " <br> <br> <b>Wrong Username or Password</b>";
}
}
}
?>
  </div></div>


  </div></div>
      <div class="col-md-2" ></div>
    </div>



  


 
    </body>

</html>